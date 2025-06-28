<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function index()
    {
        $response = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/trending/movie/week');

        $movies = $response->json()['results'] ?? [];

        return view('movies.index', compact('movies'));
    }
}
