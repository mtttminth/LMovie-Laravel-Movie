<?php

namespace App\Services;

use App\Models\Content;
use App\Models\Link;

class ContentService
{

    public function storeContent($contentData, array $genres, $contentLinks): Content
    {
        $content = auth()->user()->contents()->save($contentData);

        $content->genres()->attach($genres);

        foreach ($contentLinks->link_urls as $key => $link_url) {
            $link = new Link();
            $link->link_service = $contentLinks->link_services[$key];
            $link->link_type = $contentLinks->link_types[$key];
            $link->link_url = $contentLinks->link_urls[$key];
            $content->links()->save($link);
        }
        return $content;
    }
}
