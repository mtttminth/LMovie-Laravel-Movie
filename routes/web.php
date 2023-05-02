<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LinkProviderController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SlugController;
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
    //Check Slug
    Route::get('movies/check-slug', [SlugController::class, 'checkMovieSlug'])
        ->name('movies.check_slug');
    Route::get('genres/check-slug', [SlugController::class, 'checkGenreSlug'])
        ->name('genres.check_slug');
    Route::get('link_providers/check-slug', [SlugController::class, 'checkLinkProviderSlug'])
        ->name('link_providers.check_slug');

    Route::resources([
        'movies' => MovieController::class,
        'genres' => GenreController::class,
        'link_providers' => LinkProviderController::class,
    ]);
});
