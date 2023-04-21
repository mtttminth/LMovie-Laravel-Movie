<?php

namespace App\Services;


use App\Models\Link;

class ContentService
{

    public function storeLink($content, $contentLinks): void
    {
        foreach ($contentLinks->link_urls as $key => $link_url) {
            $link = new Link();
            $link->link_service = $contentLinks->link_services[$key];
            $link->link_type = $contentLinks->link_types[$key];
            $link->link_url = $contentLinks->link_urls[$key];
            $content->links()->save($link);
        }
    }

    public function updateLink($movie, $contentLinks): void
    {
        $movie->links()->delete();
        foreach ($contentLinks->link_urls as $key => $link_url) {
            $link = new Link();
            $link->link_service = $contentLinks->link_services[$key];
            $link->link_type = $contentLinks->link_types[$key];
            $link->link_url = $contentLinks->link_urls[$key];
            $movie->links()->save($link);
        }
    }
}

// $links = [];
        // foreach ($contentLinks->link_urls as $key => $link_url)
        //     $movie->links()->delete(); // Delete old links
        // $movie->links()->create([
        //     'link_service' => $contentLinks->link_services[$key],
        //     'link_type' => $contentLinks->link_types[$key],
        //     'link_url' => $contentLinks->link_urls[$key]
        // ]);
