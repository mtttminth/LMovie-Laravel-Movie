<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilmRequest;
use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;

class MovieController extends Controller
{

    public function index()
    {
        $movies = Film::where('type', '=', 'movie')->get();
        return view('admin.movie.index', ['movies' => $movies]);
    }

    public function show(Film $film)
    {
        return view('film-view', ['film' => $film]);
    }

    public function create()
    {
        $genres = Genre::all();
        return view('admin.movie.create', compact('genres'));
    }

    public function store(FilmRequest $request)
    {
        // The incoming request is valid...

        // Retrieve the validated input data...
        $film = $request->validated();

        // Retrieve a portion of the validated input data...
        $film = new Film($request->safe()->except('genres'));
        auth()->user()->films()->save($film);

        if (request()->has('genres')) {
            $film->genres()->attach(request('genres'));
        }

        return back();
    }
}
