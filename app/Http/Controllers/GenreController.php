<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGenreRequest;
use App\Http\Requests\UpdateGenreRequest;
use App\Models\Genre;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return view('admin.genre.index', compact('genres'));
    }

    public function create()
    {
        return view('admin.genre.create');
    }

    public function store(StoreGenreRequest $request)
    {
        $genre = Genre::create($request->validated());

        session()->flash('movie-created-message', $genre['title'] . ' created');
        return redirect()->route('genres.index');
    }

    public function edit(Genre $genre)
    {
        return view('admin.genre.edit', compact('genre'));
    }

    public function update(UpdateGenreRequest $request, Genre $genre)
    {
        $genre->update($request->validated());

        session()->flash('genre-updated-message', $genre['title'] . ' updated');
        return redirect()->route('genres.index');
    }

    public function destroy(Genre $genre)
    {
        $genre->contents()->detach();
        $genre->delete();

        session()->flash('genre-deleted-message', $genre['title'] . ' was deleted');
        return redirect()->route('genres.index');
    }
}
