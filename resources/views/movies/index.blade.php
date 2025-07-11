@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Trending Movies</h1>
    <form action="{{ route('movies.search') }}" method="GET" role="search" aria-label="Search Movies">
        <label for="movie-search" class="visually-hidden">Search for a movie</label>
        <input
            type="text"
            id="movie-search"
            name="query"
            placeholder="Search for a movie..."
            class="search-input"
        >
        <button type="submit" class="search-btn" aria-label="Submit movie search">
            🔍
        </button>
    </form>
    
    <div class="row">

        @foreach($movies as $movie)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" class="card-img-top" alt="{{ $movie['title'] }}">
                <div class="card-body">
                    <h5 class="card-title d-flex align-items-center">
                        {{ $movie['title'] }}
                      
                    </h5>
                    <p class="card-text">{{ \Illuminate\Support\Str::limit($movie['overview'], 100) }}</p>
                    <a href="{{ route('movies.show', $movie['id']) }}">
                      click
                    </a>
                </div>
                <livewire:watchlist-button :tmdbId="$movie['id']" />
            </div>
        </div>
        @endforeach
        
    </div>
</div>
@endsection
