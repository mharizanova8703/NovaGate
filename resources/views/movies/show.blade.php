@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $movie['title'] }}</h1>
    <p>{{ $movie['overview'] }}</p>
    <p><strong>Release Date:</strong> {{ $movie['release_date'] }}</p>
    <p><strong>Runtime:</strong> {{ $movie['runtime'] }} min</p>

    @if(isset($movie['homepage']))
        <p><a href="{{ $movie['homepage'] }}" target="_blank">Official Site</a></p>
    @endif

    <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}">
    @if(isset($movie['videos']['results'][0]))
    <div class="mb-4">
        <h4>Trailer</h4>
        <iframe width="100%" height="400" 
            src="https://www.youtube.com/embed/{{ $movie['videos']['results'][0]['key'] }}" 
            frameborder="0" allowfullscreen></iframe>
    </div>
@endif
@if(isset($movie['credits']['cast']))
    <div>
        <h4>Top Cast</h4>
        <ul class="list-unstyled d-flex flex-wrap">
            @foreach(array_slice($movie['credits']['cast'], 0, 5) as $cast)
                <li class="me-3 text-center">
                    <img src="https://image.tmdb.org/t/p/w185{{ $cast['profile_path'] }}" width="100" class="rounded">
                    <div>{{ $cast['name'] }}</div>
                    <small class="text-muted">{{ $cast['character'] }}</small>
                </li>
            @endforeach
        </ul>
    </div>
@endif
<ul>
    <li><strong>Release Date:</strong> {{ $movie['release_date'] }}</li>
    <li><strong>Runtime:</strong> {{ $movie['runtime'] }} minutes</li>
    <li><strong>Genres:</strong> 
        @foreach($movie['genres'] as $genre)
            {{ $genre['name'] }}@if (!$loop->last), @endif
        @endforeach
    </li>
    <li><strong>Rating:</strong> {{ $movie['vote_average'] }}/10</li>
</ul>
</div>
@endsection
