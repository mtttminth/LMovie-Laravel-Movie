<?php

namespace App\Services;

use App\Models\Content;
use App\Models\Link;

class ContentService
{
    public function storeContent(array $contentData): Content
    {
        return auth()->user()->contents()->create($contentData);
    }

    public function updateContent(Content $content, array $contentData): Content
    {
        $content->update($contentData);
        return $content;
    }

    public function deleteContent(Content $content): void
    {
        $content->genres()->detach();
        $content->delete();
    }

    public function syncGenres($content, array $genres): void
    {
        $content->genres()->sync($genres);
    }

    public function storeLinks($content, array $linkData): void
    {
        $content->contentLinks()->delete();
        foreach ($linkData['link_urls'] as $key => $link_url) {
            $link = new Link([
                'link_provider' => $linkData['link_providers'][$key],
                'link_type' => $linkData['link_types'][$key],
                'link_url' => $link_url,
            ]);

            $content->contentLinks()->save($link);
        }
    }
}
