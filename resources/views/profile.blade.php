@extends('layouts.app')

<div id="popcorn-wrapper" style="position: absolute; top: 0; left: 0; width: 100%; pointer-events: none; z-index: 0;">
    @for ($i = 0; $i < 20; $i++) <img src="{{ asset('images/popcorn.png') }}" class="popcorn"
        style="position: absolute; top: -100px; width: 80px;" alt="Popcorn">
        @endfor
</div>

@section('content')
<div id="profile-section">
<div class="container profile-section">


    <div class="d-flex align-items-center gap-4 mt-5 mb-4">
        <!-- Avatar -->
        <div>
            @if(auth()->user()->profile_image)
            <img src="{{ asset(auth()->user()->profile_image) }}" width="80" height="80"
                style="border-radius: 50%; object-fit: cover; border: 2px solid #fff;" alt="Profile Image">
            @else
            <img src="{{ asset('images/default-avatar.png') }}" width="80" height="80"
                style="border-radius: 50%; object-fit: cover; border: 2px solid #fff;" alt="Default Avatar">
            @endif
        </div>

        <!-- Name -->
        <div>
            <h2 class="m-0 bebas-neue-regular">{{ old('name', Auth::user()->name) }}</h2>
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
            <label class="form-label d-block">Change Profile Image</label>

            <label for="profileUpload" class="btn ">
                <i class="bi bi-upload me-2"></i>Choose Image
            </label>

            <input type="file" name="profile_image" id="profileUpload" class="d-none">
        </div>
        <div class="mx-auto pt-4">
            <button type="submit" class="btn-red ">Update Profile</button>

        </div>
        </div>
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
            const delay = Math.random() * 4;

            pop.style.left = `${startX}px`;

            gsap.to(pop, {
              duration: fallDuration,
  y: window.innerHeight + 100,
  x: `+=${wiggle}`,
  opacity: 1,
  delay: delay,
  ease: "power2.out"
            });
        });
    });
    document.addEventListener("DOMContentLoaded", () => {
    const fileInput = document.getElementById("profileUpload");
    const label = document.querySelector("label[for='profileUpload']");

    fileInput.addEventListener("change", function () {
      const fileName = this.files[0]?.name || "Choose Image";
      label.innerHTML = `<i class="bi bi-upload me-2"></i>${fileName}`;
    });
  });
</script>
@endpush