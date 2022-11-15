<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SeriesController;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Series;
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

Route::get('/', function () {
    $movies = Movie::inRandomOrder()->whereNotNull('poster')->limit(5)->get();
    $series = Series::inRandomOrder()->whereNotNull('poster')->limit(5)->get();

    return view('home', ['movies' => $movies, 'series' => $series]);
});

Route::get('/movies', [MovieController::class, 'list']);
Route::get('/movies/random', [MovieController::class, 'random']);
Route::get('/movies/{id}', [MovieController::class, 'show']);

Route::get('/series', [SeriesController::class, 'list']);
Route::get('/series/random', [SeriesController::class, 'random']);
Route::get('/series/{id}', [SeriesController::class, 'show']);

Route::get('/genres', [GenreController::class, 'list']);
