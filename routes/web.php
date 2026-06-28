<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PopularityMovieController;

Route::get('/popularity-movies', [PopularityMovieController::class, 'index'])->name('movies.popularity');