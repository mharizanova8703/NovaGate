@extends('layouts.app')

<div id="popcorn-wrapper" style="position: absolute; top: 0; left: 0; width: 100%; pointer-events: none; z-index: 0;">
    @for ($i = 0; $i < 20; $i++) <img src="{{ asset('images/popcorn.png') }}" class="popcorn"
        style="position: absolute; top: -100px; width: 80px;" alt="Popcorn">
        @endfor
</div>

@section('content')
<div id="profile-section" class="container">

    <div class="d-flex align-items-center gap-4 mb-4">
        <div class="row">
            <div class="col-6">
                @if(auth()->user()->profile_image)
                <img src="{{ asset(auth()->user()->profile_image) }}" width="80" height="80"
                    style="border-radius: 50%; object-fit: cover; border: 2px solid #fff;" alt="Profile Image">
                @else
                <img src="{{ asset('images/default-avatar.png') }}" width="80" height="80"
                    style="border-radius: 50%; object-fit: cover; border: 2px solid #fff;" alt="Default Avatar">
                @endif
            </div>
            <div class="col-6">
                <h2 class="m-0 bebas-neue-regular">Update Profile</h2>
            </div>
        </div>


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

        <div class="mb-3">
            <label>Change Profile Image</label>
            <input type="file" name="profile_image" class="form-control mt-2">
        </div>

        <button type="submit" class="btn-red ">Update Profile</button>
    </form>
</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const popcorns = document.querySelectorAll('.popcorn');

        popcorns.forEach(pop => {
            const startX = Math.random() * window.innerWidth;
            const wiggle = (Math.random() - 0.5) * 100;
            const fallDuration = 2 + Math.random() * 2;
            const delay = Math.random() * 2;

            pop.style.left = `${startX}px`;

            gsap.to(pop, {
                duration: fallDuration,
                y: window.innerHeight + 100,
                x: `+=${wiggle}`,
                opacity: 1,
                delay: delay,
                ease: "power2.out",
                repeat: -1,
                repeatDelay: 1 + Math.random(),
                yoyo: false,
            });
        });
    });
</script>
@endpush