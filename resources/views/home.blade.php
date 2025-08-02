@extends('layouts.app')

@section('content')
<div id="home-page" class="container-fluid p-0 m-0">

    {{-- Welcome Section --}}
    <section class="d-flex justify-content-center align-items-center py-5">
        <div class="col-md-6 text-center">
            <img src="/images/banner-log-in.jpg" alt="NovaGate Logo" class="img-fluid mb-4">
        </div>
        <div class="col-md-6 text-center">
            <h1 class="welcome-title bebas-neue-regular">Welcome to NovaGate</h1>
            <p class="lead">Your gateway to the world of movies and entertainment.</p>
            <h1 class="welcome-title bebas-neue-regular">Welcome<br>{{ Auth::user()->name }}</h1>
        </div>
    </section>

    {{-- Card Sections --}}
    <section class="d-flex flex-column flex-md-row align-items-center justify-content-center gap-5 py-5 card-section">
        <div class="col-md-4 text-center">
            <img class="w-100 card-svg" src="/images/one-card.svg" alt="Charlie Chaplin">
        </div>
        <div class="col-md-5 card-info text-white">
            <h2 class="mb-3 bebas-neue-regular position-relative font-xxl  mx-auto">
                Charlie Chaplin
                <svg class="underline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 10">
                    <path d="M0 5 Q50 0 100 5 T200 5" stroke="white" stroke-width="2" fill="transparent" />
                </svg>
            </h2>

            <p class="font-xsm">
                Did you know? Charlie Chaplin was one of the most iconic figures of the silent film era, known for his
                character “The Tramp.”
                He directed, produced, and starred in most of his films, bringing humor and social commentary to
                audiences worldwide.
            </p>
        </div>
    </section>

    <section
        class="d-flex flex-column flex-md-row-reverse align-items-center justify-content-center gap-5 py-5 card-section">
        <div class="col-md-5 text-center">
            <img class="card-svg" src="/images/two-card.svg" alt="Popcorn">
        </div>
        <div class="col-md-5 card-info text-white">
            <h2 class="mb-3 bebas-neue-regular font-xl">🍿 Popcorn in Cinemas</h2>
            <p>
                Popcorn became a cinema staple during the Great Depression because it was cheap and easy to make,
                becoming inseparable from the movie-going experience.
            </p>
        </div>
    </section>

    <section class="d-flex flex-column flex-md-row align-items-center justify-content-center gap-5 py-5 card-section">
        <div class="col-md-5 text-center">
            <img class="card-svg" src="/images/three-card.svg" alt="Longest Movie">
        </div>
        <div class="col-md-5 card-info text-white ">
            <h2 class="mb-3 bebas-neue-regular font-xl">🎞️ Longest Movie Ever</h2>
            <p>
                The longest movie ever made is “Logistics,” running for an astonishing 85 hours. It follows the
                manufacturing process of a pedometer in real-time.
            </p>
        </div>
    </section>

</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
    gsap.registerPlugin(ScrollTrigger);

    // Card fade-in effect
    gsap.utils.toArray(".card-svg").forEach((card) => {
        gsap.from(card, {
            opacity: 0.7,   // start slightly faded
            scale: 0.75,
            duration: 1,
            ease: "power5.out",
            scrollTrigger: {
                trigger: card,
                start: "top 85%",
                toggleActions: "play none none reverse"
            }
        });
    });

    // Text opacity transition
    gsap.utils.toArray(".card-info").forEach((info, i) => {
        const direction = i % 2 === 0 ? 50 : -50; // alternate slide direction
        gsap.fromTo(info, 
            { opacity: 0, x: direction }, 
            {
                opacity: 1,
                x: 0,
                duration: 1,
                ease: "power2.out",
                scrollTrigger: {
                    trigger: info,
                    start: "top 80%",
                    toggleActions: "play none none reverse"
                }
            }
        );
    });
});
</script>
@endpush