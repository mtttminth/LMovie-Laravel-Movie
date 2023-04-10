<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFilmRequest;
use App\Models\Film;


use Illuminate\Http\Request;

class MovieController extends Controller
{

    public function index()
    {
        // $movies = Film::with('type')->all();
        return view('admin.movie.index');
    }

    public function show(Film $film)
    {
        return view('film-view', ['film' => $film]);
    }

    public function create()
    {
        return view('admin.movie.create');
    }

    public function store(StoreFilmRequest $request)
    {
        // dd(request()->all());

        auth()->user()->films()->create($request->validated());

        return back();
    }
}
