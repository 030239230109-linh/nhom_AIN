<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class Top10Controller extends Controller
{
    public function topMovies()
    {
        $topMovies = DB::table('movies')
            ->join('ratings', 'movies.id', '=', 'ratings.movieId')
            ->select(
                'movies.id',
                'movies.title',
                DB::raw('AVG(ratings.rating) as avg_rating'),
                DB::raw('COUNT(ratings.movieId) as total_ratings')
            )
            ->groupBy('movies.id', 'movies.title')
            ->orderBy('avg_rating', 'desc')
            ->limit(10)
            ->get();

        return view('ratings.top10', compact('topMovies'));
    }
}