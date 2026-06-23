<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Top10Controller;


Route::get('/top10', [Top10Controller::class, 'topMovies']);