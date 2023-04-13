<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContentRequest;
use App\Models\Content;
use App\Models\Genre;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class MovieController extends Controller
{

    public function index()
    {
        $movies = Content::where('content_type', 'movie')->get();
        return view('admin.movie.index', ['movies' => $movies]);
    }

    public function show(Content $content)
    {
        //
    }

    public function create()
    {
        $genres = Genre::all();
        return view('admin.movie.create', ['genres' => $genres]);
    }

    public function store(ContentRequest $request)
    {
        // The incoming request is valid...

        // Retrieve the validated input data...
        // $content = $request->validated();

        // Retrieve a portion of the validated input data...
        $content = new Content($request->safe()->except('genres', 'view'));
        auth()->user()->contents()->save($content);

        $content->genres()->attach(request('genres'));


        return back();
    }
    public function check_slug(Request $request)
    {
        $slug = SlugService::createSlug(Genre::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }
}
