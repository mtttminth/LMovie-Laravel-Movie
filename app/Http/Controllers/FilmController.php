<?php

namespace App\Http\Controllers;

use App\Models\Film;


use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function show(Film $film)
    {
        return view('film-view', ['film' => $film]);
    }

    public function create()
    {
        return view('admin.film.create');
    }

    public function store()
    {
        // dd(request()->all());
        $inputs = request()->validate([
            'title' => 'required',
            'film_image' => 'nullable',
            'genre' => 'required',
            'description' => 'nullable',
            'type' => 'required',
            'release_year' => 'nullable',
            'imdb_rating' => 'required',
            'publish' => 'required|boolean',
            'member_only' => 'required|boolean',
        ]);
        auth()->user()->films()->create($inputs);

        return back();
    }
}
