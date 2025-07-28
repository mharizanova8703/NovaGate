@extends('layouts.app')

<div id="popcorn-wrapper" style="position: absolute; top: 0; left: 0; width: 100%; pointer-events: none; z-index: 0;">
    @for ($i = 0; $i < 20; $i++)
        <img src="{{ asset('images/popcorn.png') }}"
             class="popcorn"
             style="position: absolute; top: -100px; width: 60px;"
             alt="Popcorn">
    @endfor
</div>

@section('content')
<div class="container">
    <h2>Update Profile</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ auth()->user()->email }}">
        </div>

        <div class="mb-3">
            <label>Address</label>
            <input type="text" name="address" class="form-control" value="{{ auth()->user()->address }}">
        </div>

        <div class="mb-3">
            <label>Profile Image</label><br>
@if(auth()->user()->profile_image)
    <img src="{{ asset(auth()->user()->profile_image) }}" width="100" alt="Profile Image">
@else
    <img src="{{ asset('images/default-avatar.png') }}" width="100" alt="Default Avatar">
@endif

            <input type="file" name="profile_image" class="form-control mt-2">
        </div>

        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
</div>
@endsection
