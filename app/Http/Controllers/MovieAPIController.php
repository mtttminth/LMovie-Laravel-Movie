<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class MovieAPIController extends Controller
{
    public function getMovies()
    {
        $query = Content::select('id', 'cover', 'title', 'slug');
        return datatables($query)
            ->editColumn('cover', function ($movie) {
                return '<img src="' . $movie->cover . '" alt="Movie Cover" width="50">';
            })
            ->addColumn('edit_url', function ($movie) {
                return route('movies.edit', $movie->slug);
            })
            ->addColumn('delete_url', function ($movie) {
                return route('movies.destroy', $movie->slug);
            })
            ->rawColumns(['cover'])
            ->make(true);
    }
}
