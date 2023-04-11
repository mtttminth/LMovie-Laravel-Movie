<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $films = Film::with('user')->get();
        return view('home', ['films' => $films]);
    }
}
