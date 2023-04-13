<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('home');
Route::get('/content', [HomeController::class, 'show'])->name('content');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/admin', [AdminDashboardController::class, 'index'])
        ->name('admin.index');
});

Route::middleware('auth')->prefix('admin')->group(function () {
    // Movies
    Route::get('movies/check_slug', [MovieController::class, 'check_slug'])
        ->name('movies.checkSlug');
    Route::resource('movies', MovieController::class);

    // Genres
    Route::get('genres/check_slug', [GenreController::class, 'check_slug'])
        ->name('genres.checkSlug');
    Route::resource('genres', GenreController::class);
});
