<?php

namespace App\Http\Controllers;

use App\Models\Film;


use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function show(Film $film)
    {
        return view('film-view', ['film' => $film]);
    }

    public function create()
    {
        return view('admin.movie.create');
    }

    public function store()
    {
        // dd(request()->all());
        $data = request()->validate([
            'title' => 'required',
            'cover' => 'nullable',
            'image' => 'nullable',
            'description' => 'required',
            'type' => 'required',
            'release_year' => 'required',
            'rating' => 'required',
            'publish' => 'required|boolean',
            'feature' => 'required|boolean',
            'member_only' => 'required|boolean',
        ]);
        auth()->user()->films()->create($data);

        return back();
    }
}
