<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Styles & Scripts via Vite -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    @livewireScripts
</head>

<body>
    <div id="app">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-md shadow-sm sticky-top">
            <div class="container-fluid">
              

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left -->
                    <ul class="navbar-nav me-auto">
                        @auth
                        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('profile') }}">Profile</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('movies.index') }}">Movies</a></li>
                        <li class="nav-item pt-2">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </li>
                        @endauth
                    </ul>

                    <!-- Right -->
                    <ul class="navbar-nav ms-auto">
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        @endif
                        @if (Route::has('register'))
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main    id="main" class="py-4">
            <section class="trivia-section container-fluid py-5 m-0">
                <div class="text-center mb-3">
                    <span class="badge  px-3 py-2 fs-5">Score: <span id="score">0</span>/1</span>
                </div>
                <h2 class="text-center py-5 bebas-neue-regular font-xxmd "> Movie Buff Challenge</h2>
                <div class="">
                    <!-- Trivia Card -->
                    <div class="row  d-flex justify-content-center mx-auto">
                        <!-- Card 1 -->
                        <div class="col-md-4 d-flex">
                            <div class="card trivia-card p-3 shadow-sm w-100 h-100">
                                <h5 class="mb-3">Which movie won Best Picture in 1994?</h5>
                                <ul class="list-unstyled">
                                    <li><button class="btn  w-100 my-1">The Shawshank
                                            Redemption</button></li>
                                    <li><button class="btn  w-100  w-100 my-1">Pulp Fiction</button></li>
                                    <li><button class="btn  w-100  w-100 my-1 correct">Forrest Gump</button>
                                    </li>
                                    <li><button class="btn  w-100  w-100 my-1">Four Weddings and a
                                            Funeral</button></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="col-md-4 d-flex">
                            <div class="card trivia-card p-3 shadow-sm w-100 h-100">
                                <h5 class="mb-3">Who directed *Inception* (2010)?</h5>
                                <ul class="list-unstyled">
                                    <li><button class="btn  w-100 my-1 correct">Christopher
                                            Nolan</button></li>
                                    <li><button class="btn  w-100 my-1">Steven Spielberg</button>
                                    </li>
                                    <li><button class="btn  w-100 my-1">Martin Scorsese</button></li>
                                    <li><button class="btn  w-100 my-1">James Cameron</button></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="col-md-4 d-flex">
                            <div class="card trivia-card p-3 shadow-sm w-100 h-100">
                                <h5 class="mb-3">Which actor played Iron Man?</h5>
                                <ul class="list-unstyled">
                                    <li><button class="btn  w-100 my-1">Chris Evans</button></li>
                                    <li><button class="btn  w-100 my-1 correct">Robert Downey
                                            Jr.</button></li>
                                    <li><button class="btn  w-100 my-1">Mark Ruffalo</button></li>
                                    <li><button class="btn  w-100 my-1">Chris Hemsworth</button></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </main>

        <x-footer />
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>



    @stack('scripts')
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    let score = 0;
    const totalQuestions = 3;

    document.querySelectorAll(".trivia-card").forEach(card => {
      const buttons = card.querySelectorAll("button");

      buttons.forEach(button => {
        button.addEventListener("click", () => {
          if (card.classList.contains("answered")) return;

          const isCorrect = button.classList.contains("correct");
          button.classList.add("text-black", "text-black", isCorrect ? "btn-success" : "btn-danger");

          buttons.forEach(btn => btn.disabled = true);
          card.classList.add("answered");

          if (isCorrect) {
            score++;
            document.getElementById("score").textContent = score;

            // 🎉 Trigger confetti if they get all answers correct
            if (score === totalQuestions) {
              confetti({
                particleCount: 150,
                spread: 90,
                origin: { y: 0.6 }
              });
            }
          }
        });
      });
    });
  });
</script>
</body>

</html>