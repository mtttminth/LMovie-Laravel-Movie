<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class MovieAPIController extends Controller
{
    public function getMovies()
    {
        $query = Content::where('content_type', 'movie')->select('id', 'cover', 'title', 'slug');
        return datatables($query)
            ->editColumn('cover', function ($movie) {
                return '<img src="' . $movie->cover . '" alt="Movie Cover" width="50">';
            })
            ->addColumn('actions', function ($movie) {
                $editUrl = route('movies.edit', $movie->slug);
                $deleteUrl = route('movies.destroy', $movie->slug);

                return [
                    'edit_url' => $editUrl,
                    'delete_url' => $deleteUrl
                ];
            })
            ->rawColumns(['cover'])
            ->toJson();
    }
}
