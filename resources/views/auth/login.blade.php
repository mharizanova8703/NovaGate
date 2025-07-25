@extends('layouts.app')

@section('content')
<div class="container-fluid m-0 p-0" id="log-in-page-main">
    <div class="row justify-content-center p-0 m-0 min-vh-100">
        <div class="col-md-6 p-0 m-0 align-items-stretch">
            <img class="w-100" src="{{ asset('images/banner-movie.png') }}" alt="Banner Movie">
        </div>
        <div id="log-in-page" class="col-md-6 p-0 m-0  d-flex justify-content-center align-items-center ">

            <div class="card border-0 py-4">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{
                                old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember" data-bs-toggle="tooltip"
                                data-bs-placement="right"
                                title="Stay logged in on this device. Don’t use on public computers.">
                                {{ __('Remember Me') }}
                                <i class="bi bi-info-circle ms-1"></i>
                            </label>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="button-black ">
                                {{ __('Login') }}
                            </button>
                        </div>

                        @if (Route::has('password.request'))
                        <div class="text-center mt-2">
                            <a class="text-white" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </div>
                        @endif
                    </form>
                </div>

            </div>
        </div>
        <div class="col-12">
            <img class="w-100 h-1" src="{{ asset('images/bg-lg-in.svg') }}" alt="Banner Movie">
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    });
</script>
@endpush