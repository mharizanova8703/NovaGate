@extends('layouts.app')

@section('content')
<div  id="profile" class="container">
    <div class="col-lg-8 col-12 mx-auto">
    <h2 class="py-4">Update Profile</h2>

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
            <img src="{{ asset('storage/' . auth()->user()->profile_image) }}" width="100">
            @endif
            <input type="file" name="profile_image" class="form-control mt-2">
        </div>

        <button type="submit" class="button-red mt-4">Update Profile</button>
    </form>
    </div>
</div>
@endsection