<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContentRequest;
use App\Http\Requests\UpdateContentRequest;
use App\Models\Content;
use App\Models\Genre;
use App\Models\Link;
use App\Services\ContentService;
use Illuminate\Http\Request;

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

    public function store(StoreContentRequest $request, ContentService $contentService)
    {
        $contentLinks = new Link($request->safe()->only(['link_services', 'link_types', 'link_urls']));

        $content = auth()->user()->contents()->create($request->safe()->except(['genres', 'view', 'link_services', 'link_types', 'link_urls']));
        $content->genres()->attach($request->genres);
        $contentService->storeLink($content, $contentLinks);

        session()->flash('movie-created-message', $content['title'] . ' created');
        return back();
    }

    public function edit(Content $movie)
    {
        $genres = Genre::all();
        $links = Link::where('content_id', $movie->id)->get();
        return view('admin.movie.edit', ['movie' => $movie, 'genres' => $genres, 'links' => $links]);
    }

    public function update(UpdateContentRequest $request, ContentService $contentService, Content $movie)
    {
        $movie->update($request->safe()->except(['genres', 'view', 'link_services', 'link_types', 'link_urls']));
        $movie->genres()->sync($request->genres);

        $contentLinks = new Link($request->safe()->only(['link_services', 'link_types', 'link_urls']));
        $contentService->updateLink($movie, $contentLinks);

        session()->flash('movie-updated-message', $movie['title'] . ' updated');
        return redirect()->route('movies.index');
    }


    public function destroy(Content $movie, Request $request)
    {
        $movie->genres()->detach();
        $movie->delete();

        $request->session()->flash('movie-deleted-message', $movie['title'] . ' was deleted');
        return back();
    }
}
