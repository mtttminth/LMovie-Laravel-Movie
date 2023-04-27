<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Genre;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class SlugController extends Controller
{
    public function checkMovieSlug(Request $request)
    {
        $slug = SlugService::createSlug(Content::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    public function checkGenreSlug(Request $request)
    {
        $slug = SlugService::createSlug(Genre::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
