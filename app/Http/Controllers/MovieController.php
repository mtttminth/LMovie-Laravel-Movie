<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContentRequest;
use App\Models\Content;
use App\Models\Genre;
use App\Models\Link;
use App\Services\ContentService;
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

    public function store(ContentRequest $request, ContentService $contentService)
    {
        $contentData = new Content($request->safe()->except('genres', 'view', 'link_services', 'link_types', 'link_urls'));

        $genres = $request->genres;

        $contentLinks = new Link($request->safe()->only('link_services', 'link_types', 'link_urls'));

        //Store Movie, Attach Genres && Add Links
        $contentService->storeContent($contentData, $genres, $contentLinks);

        return back();
    }

    public function check_slug(Request $request)
    {
        $slug = SlugService::createSlug(Content::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
