<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContentRequest;
use App\Models\Content;
use App\Models\Genre;
use App\Models\Link;
use App\Services\ContentService;

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
        $contentLinks = new Link($request->safe()->only('link_services', 'link_types', 'link_urls'));

        $content = auth()->user()->contents()->create($request->safe()->except('genres', 'view', 'link_services', 'link_types', 'link_urls'));
        $content->genres()->attach($request->genres);
        $contentService->storeLink($content, $contentLinks);

        session()->flash('movie-created-message', $content['title'] . ' created');

        return back();
    }

    public function edit(Content $movie)
    {
        $genres = Genre::all();
        return view('admin.movie.edit', ['movie' => $movie, 'genres' => $genres]);
    }

    public function update(Content $movie)
    {
        $inputs = request()->validate([
            'title' => 'required|min:8|max:255',
            'post_image' => 'file',
            'body' => 'required'
        ]);
        if (request('post_image')) {
            $inputs['post_image'] = request('post_image')->store('images');
            $post->post_image = $inputs['post_image'];
        }
        $post->title = $inputs['title'];
        $post->body = $inputs['body'];

        //authorization policy
        $this->authorize('update', $post);

        $post->update();

        session()->flash('post-updated-message', $inputs['title'] . ' was updated');

        return redirect()->route('post.index');
    }


    public function destroy(Post $post, Request $request)
    {
        //authorization policy
        $this->authorize('delete', $post);
        $post->delete();

        $request->session()->flash('post-deleted-message', $post['title'] . ' was deleted');

        return back();
    }
}
