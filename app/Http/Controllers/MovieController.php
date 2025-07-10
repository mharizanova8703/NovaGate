<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    // Show trending movies
    public function index()
    {
        $response = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/trending/movie/week');

        $movies = $response->json()['results'] ?? [];

        return view('movies.index', compact('movies'));
    }

    // Show movie details
    public function show($id)
    {
        $movie = Http::withToken(config('services.tmdb.token'))
            ->get("https://api.themoviedb.org/3/movie/{$id}?append_to_response=videos,credits")
            ->json();

        return view('movies.show', compact('movie'));
    }
    public function search()
    {
        $searchQuery = request('query');

        $response = Http::withToken(config('services.tmdb.token'))
            ->get("https://api.themoviedb.org/3/search/movie", [
                'query' => $searchQuery,
            ]);

        $movies = $response->json()['results'] ?? [];

        return view('movies.index', compact('movies'));
    }
}
