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
<div  id="profile" class="container">
    <div class="col-lg-8 col-12 mx-auto">
<div class="d-flex align-items-center gap-3 mb-4">
    @if(auth()->user()->profile_image)
        <img src="{{ asset('storage/' . auth()->user()->profile_image) }}"
             class="rounded-circle"
             style="width: 100px; height: 100px; object-fit: cover;"
             alt="Profile Image">
    @endif
    <h2 class="m-0 text-white">Update Profile</h2>
</div>


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

        <button type="submit" class="button-red mt-4">Update Profile</button>
    </form>
    </div>
</div>
@endsection
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const popcorns = document.querySelectorAll('.popcorn');

        popcorns.forEach((pop, index) => {
            const startX = Math.random() * window.innerWidth;
            const wiggle = (Math.random() - 0.5) * 100; // -50px to +50px wiggle during fall
            const fallDuration = 2 + Math.random() * 2; // between 2s and 4s
            const delay = Math.random() * 2; // random delay up to 2s

            pop.style.left = `${startX}px`;

            gsap.to(pop, {
                duration: fallDuration,
                y: window.innerHeight + 100,
                x: `+=${wiggle}`,
                opacity: 1,
                delay: delay,
                ease: "power2.out",
                repeat: -1,
                repeatDelay: 1 + Math.random(), // slight pause before looping again
                yoyo: false,
            });
        });
    });
</script>

@endpush
