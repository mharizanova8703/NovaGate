@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Trending Movies</h1>
    <div class="row">
        @foreach($movies as $movie)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" class="card-img-top" alt="{{ $movie['title'] }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $movie['title'] }}</h5>
                    <p class="card-text">{{ \Illuminate\Support\Str::limit($movie['overview'], 100) }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection