@extends('layouts.app')

@section('content')
<div id="home-page" class="container-fluid p-0 m-0">

    {{-- Welcome Section --}}
    <section class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-center  text-center bg-red p-0">
        <div class="col-md-6 col-12 text-center">
            <img src="/images/banner-log-in.jpg" alt="NovaGate Logo" class="img-fluid p-0">
        </div>
        <div class="col-md-6 col-12 text-center py-5">
            <h1 class="welcome-title bebas-neue-regular">Welcome<br>{{ Auth::user()->name }}</h1>
        </div>
    </section>

@php
  $cards = [
    [
      'img' => '/images/one-card.svg',
      'imgAlt' => 'Charlie Chaplin silhouette holding a cane',
      'title' => 'Charlie Chaplin',
      'id' => 'chaplin-intro',
      'text' => "Did you know? Charlie Chaplin defined silent-era comedy with 'The Tramp'—acting, directing, and producing while blending humor and social critique.",
      'reverse' => false,
    ],
    [
      'img' => '/images/two-card.svg',
      'imgAlt' => 'Classic film reel and popcorn',
      'title' => '1939 – The Wizard of Oz',
      'id' => 'chaplin-ua',
      'text' => 'One of the first films to use Technicolor so vividly — audiences were stunned when Dorothy opened the door to Oz.',
      'reverse' => true,
    ],
    [
      'img' => '/images/three-card.svg',
      'imgAlt' => 'Projector beam with film strip',
      'title' => '1977 – Star Wars (A New Hope)',
      'id' => 'chaplin-sound-era',
      'text' => "Revolutionized visual effects and sound design, setting new standards for space epics.",
      'reverse' => false,
    ],
  ];
@endphp

@foreach ($cards as $card)
  <section
    class="d-flex {{ $card['reverse'] ? 'flex-md-row-reverse' : 'flex-md-row' }} flex-column align-items-center justify-content-center gap-5 py-5 card-section"
    role="region" aria-labelledby="{{ $card['id'] }}">
    <div class="col-md-5 col-12 text-center">
      <img class="card-svg"
           src="{{ $card['img'] }}"
           alt="{{ $card['imgAlt'] }}"
           width="640" height="480"
           loading="lazy" decoding="async">
    </div>

    <div class="col-md-5 col-12 card-info text-white">
      <h2 id="{{ $card['id'] }}" class="mb-3 bebas-neue-regular position-relative font-xxl mx-auto">
        {{ $card['title'] }}
        <svg class="underline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 10"
             aria-hidden="true" focusable="false">
          <path d="M0 5 Q50 0 100 5 T200 5" stroke="white" stroke-width="2" fill="transparent" />
        </svg>
      </h2>
      <p class="font-xsm">{{ $card['text'] }}</p>
    </div>
  </section>
@endforeach


</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", () => {
    // Respect reduced motion
    const reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

    if (reduceMotion) {
      // Instantly reveal content without animation
      document.querySelectorAll(".card-svg, .card-info").forEach(el => {
        el.style.opacity = 1;
        el.style.transform = "none";
      });
      return;
    }

    gsap.registerPlugin(ScrollTrigger);

    // Images
    gsap.utils.toArray(".card-svg").forEach((card) => {
      gsap.from(card, {
        opacity: 0.7,
        scale: 0.75,
        duration: 0.9,
        ease: "power3.out",
        scrollTrigger: {
          trigger: card,
          start: "top 85%",
          toggleActions: "play none none reverse"
        }
      });
    });

    // Text — alternate slide direction based on DOM order
    gsap.utils.toArray(".card-info").forEach((info, i) => {
      const xOffset = (i % 2 === 0) ? 50 : -50;
      gsap.fromTo(info,
        { opacity: 0, x: xOffset },
        {
          opacity: 1, x: 0, duration: 0.9, ease: "power2.out",
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