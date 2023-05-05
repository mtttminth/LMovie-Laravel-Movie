<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContentRequest;
use App\Http\Requests\UpdateContentRequest;
use App\Models\Content;
use App\Models\Genre;
use App\Models\Link;
use App\Models\LinkProvider;
use App\Services\ContentService;
use Illuminate\Http\Request;

class MovieController extends Controller
{

    public function index()
    {
        return view('admin.movie.index');
    }

    public function show(Content $content)
    {
        //
    }

    public function create()
    {
        $genres = Genre::all();
        $link_providers = LinkProvider::all();
        return view('admin.movie.create', ['genres' => $genres, 'link_providers' => $link_providers,]);
    }

    public function store(StoreContentRequest $request, ContentService $contentService)
    {
        $movieData = $request->movieData();
        $genres = $request->genreIds();
        $linkData = $request->linkData();

        $movie = $contentService->storeContent($movieData);
        $contentService->syncGenres($movie, $genres);

        if ($request->has('link_urls')) {
            $contentService->storeLinks($movie, $linkData);
        }

        session()->flash('movie-created-message', $movieData['title'] . ' created');
        return redirect()->route('movies.index');
    }

    public function edit(Content $movie)
    {
        $genres = Genre::all();
        $link_providers = LinkProvider::all();
        $links = Link::where('content_id', $movie->id)->get();
        return view('admin.movie.edit', ['movie' => $movie, 'genres' => $genres, 'links' => $links, 'link_providers' => $link_providers]);
    }

    public function update(UpdateContentRequest $request, ContentService $contentService, Content $movie)
    {
        $movieData = $request->movieData();
        $genres = $request->genreIds();
        $linkData = $request->linkData();

        $contentService->updateContent($movie, $movieData);
        $contentService->syncGenres($movie, $genres);

        if ($request->has('link_urls')) {
            $contentService->storeLinks($movie, $linkData);
        }

        session()->flash('movie-updated-message', $movie['title'] . ' updated');
        return redirect()->route('movies.index');
    }


    public function destroy(Content $movie, ContentService $contentService)
    {
        $contentService->deleteContent($movie);

        session()->flash('movie-deleted-message', $movie['title'] . ' was deleted');
        return redirect()->route('movies.index');
    }
}
