<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $movieCount = Content::where('content_type', 'movie')->count();
        return view('admin.index', ['movieCount' => $movieCount]);
    }
}
