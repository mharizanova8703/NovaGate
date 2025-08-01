<footer class="bg-dark text-white mt-5 py-4">
    <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
        <!-- Left: Logo or App Name -->
        <div class="mb-3 mb-md-0">
            <h5 class="m-0">🎬 MovieApp</h5>
            <small class="text-muted">Your ultimate movie tracker</small>
        </div>

        <!-- Center: Navigation Links -->
        <div class="d-flex gap-3 mb-3 mb-md-0">
            <a href="{{ route('movies.index') }}" class="text-white text-decoration-none">Movies</a>
            <a href="/about" class="text-white text-decoration-none">About</a>
            <a href="/contact" class="text-white text-decoration-none">Contact</a>
        </div>

        <!-- Right: Social Icons -->
        <div class="d-flex gap-3">
            <a href="#" class="text-white"><i class="bi bi-facebook"></i></a>
            <a href="#" class="text-white"><i class="bi bi-twitter"></i></a>
            <a href="#" class="text-white"><i class="bi bi-instagram"></i></a>
        </div>
    </div>

    <div class="text-center mt-3">
        <small>&copy; {{ date('Y') }} MovieApp. All rights reserved.</small>
    </div>
</footer>
