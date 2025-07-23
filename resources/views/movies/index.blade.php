@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex flex-column flex-md-row align-items-start justify-content-between py-4">
        <h1 class="me-md-4 mb-3 mb-md-0">Trending Movies</h1>

        <form action="{{ route('movies.search') }}" method="GET" role="search" aria-label="Search Movies"
            class="d-flex flex-column flex-sm-row">
            <label for="movie-search" class="visually-hidden">Search for a movie</label>

            <input type="text" id="movie-search" name="query" placeholder=" Search for a movie..."
                class="search-input mb-2 mb-sm-0 me-sm-2">

            <button type="submit" class="search-btn" aria-label="Submit movie search">
                search 🔍
            </button>
        </form>
    </div>

    </form>

    <div class="row">

        @foreach($movies as $movie)
       <div class="col-md-3 col-12 mb-4">
    <div class="card position-relative border-0">
        <div class="position-relative">
            <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" class="card-img-top" alt="{{ $movie['title'] }}">
           
        </div>
      <div class="card-body">
    <div class="d-flex justify-content-between align-items-start">
        <h5 class="card-title mb-0">{{ $movie['title'] }}</h5>
        <livewire:watchlist-button :tmdbId="$movie['id']" />
    </div>

    <p class="card-text mt-2">{{ \Illuminate\Support\Str::limit($movie['overview'], 100) }}</p>

    <div class="py-4">
        <a href="{{ route('movies.show', $movie['id']) }}" class="button-info">Movie Info</a>
    </div>
</div>

    </div>
</div>

        @endforeach

    </div>
</div>
@endsection