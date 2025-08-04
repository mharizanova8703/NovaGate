@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex">
        <div class="col-lg-5">
    <h1 class="bebas-neue-regular ">{{ $movie['title'] }}</h1>
    <p>{{ $movie['overview'] }}</p>
    <p><strong>Release Date:</strong> {{ $movie['release_date'] }}</p>
    <p><strong>Runtime:</strong> {{ $movie['runtime'] }} min</p>

    @if(isset($movie['homepage']))
        <p><a href="{{ $movie['homepage'] }}" target="_blank">Official Site</a></p>
    @endif
      @if(isset($movie['credits']['cast']))
    <div>
        <h4 class="bebas-neue-regular ">Top Cast</h4>
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
    @endif
        </div>
         <div class="col-lg-4 col-10">
            
    <img class="w-100" src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}">

        </div>
    </div>
    <div class="col-12">
         @if(isset($movie['videos']['results'][0]))
    <div class="mb-4">
        <h4 class="bebas-neue-regular ">Trailer</h4>
        <iframe width="100%" height="400" 
            src="https://www.youtube.com/embed/{{ $movie['videos']['results'][0]['key'] }}" 
            frameborder="0" allowfullscreen></iframe>
    </div>
    @endif
    </div>



<div class="row">
    <div class="">
    <section class="mt-5 col-12">
        <h2 class="text-xl font-bold mb-4 bebas-neue-regular ">User Reviews</h2>

        @forelse (\App\Models\Review::where('tmdb_id', $movie['id'])->where('is_approved', true)->latest()->get() as $review)
            <div class="mb-4 p-4 border  bg-white shadow">
                <p class="text-sm text-gray-800">{{ $review->content }}</p>
                <p class="text-xs text-gray-500 mt-2">
                    Posted by {{ $review->user->name ?? 'Anonymous' }} on {{ $review->created_at->format('M d, Y') }}
                </p>
            </div>
        @empty
            <p class="text-gray-600">No reviews yet. Be the first to write one!</p>
        @endforelse
    </section>

    @auth
    <livewire:submit-user-review :tmdbId="$movie['id']" />
    @else
        <p class="text-sm  mt-4">
            <a href="{{ route('login') }}" class="text-purple-600 underline">Log in</a> to submit a review.
        </p>
    @endauth
    </div>
</div>


</div>
@endsection
