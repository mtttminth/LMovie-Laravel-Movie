<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $films = Film::all();
        return view('home', ['films' => $films]);
    }
}
