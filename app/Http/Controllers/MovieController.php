<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContentRequest;
use App\Models\Content;
use App\Models\Genre;
use App\Models\Link;
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
        // dd($request);
        // The incoming request is valid...

        // Retrieve the validated input data...
        // $content = $request->validated();

        // Retrieve a portion of the validated input data...
        $content = new Content($request->safe()->except('genres', 'view', 'services', 'link_types', 'link_urls'));
        auth()->user()->contents()->save($content);

        $content->genres()->attach(request('genres'));

        // Add Link to Movie
        $currentMovie = Content::find($content->id);

        foreach ($request->link_urls as $key => $link_url) {
            $link = new Link();
            $link->service = $request->services[$key];
            $link->link_type = $request->link_types[$key];
            $link->link_url = $request->link_urls[$key];
            $currentMovie->links()->save($link);
        }

        return back();
    }

    public function check_slug(Request $request)
    {
        $slug = SlugService::createSlug(Content::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
