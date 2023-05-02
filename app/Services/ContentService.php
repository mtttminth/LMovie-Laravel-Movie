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
        // detach all related genres
        $content->genres()->detach();

        // delete the content
        $content->delete();
    }

    public function syncGenres($content, array $genres): void
    {
        $content->genres()->sync($genres);
    }

    public function storeLinks($content, array $linkData): void
    {
        foreach ($linkData['link_urls'] as $key => $link_url) {
            $link = new Link([
                'link_provider' => $linkData['link_providers'][$key],
                'link_type' => $linkData['link_types'][$key],
                'link_url' => $link_url,
            ]);

            $content->links()->save($link);
        }
    }
}



// public function storeMovie(array $movieData): Content
//     {
//         return auth()->user()->contents()->create($movieData);
//     }

//     public function updateMovie(Content $movie, array $movieData): Content
//     {
//         $movie->update($movieData);
//         return $movie;
//     }

//     public function deleteMovie(Content $movie): void
//     {
//         $movie->genres()->detach();
//         $movie->delete();
//     }

//     public function syncGenres($movie, array $genres): void
//     {
//         $movie->genres()->sync($genres);
//     }

//     public function storeLinks($movie, array $linkData): void
//     {
//         $movie->links()->delete();
//         foreach ($linkData['link_urls'] as $key => $link_url) {
//             $link = new Link([
//                 'link_provider' => $linkData['link_providers'][$key],
//                 'link_type' => $linkData['link_types'][$key],
//                 'link_url' => $link_url,
//             ]);

//             $movie->links()->save($link);
//         }
//     }
