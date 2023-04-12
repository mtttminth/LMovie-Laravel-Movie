<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $contents = Content::with('user')->get();
        return view('home.index', ['contents' => $contents]);
    }

    public function show()
    {
        $contents = Content::with('id')->get();
        return view('home.show', ['contents' => $contents]);
    }
}
