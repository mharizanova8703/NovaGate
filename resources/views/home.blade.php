@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">


                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="text-center ">
                        <h1 class="bebas-neue-regular">Welcome<br> {{ Auth::user()->name }}</h1>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection