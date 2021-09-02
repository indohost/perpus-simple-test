@extends('layouts.app')

@section('navbar')
    @include('layouts.user.navbar');
@endsection()

@section('title')
    Buku
@endsection()

@section('content')
    <div class="container">
        @foreach ($regBooks as $regBook)
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('storage/books/' . $regBook->book->b_image) }}" alt="" class="card-img-top" alt="Card image cap" style=" height:320px;">
                <div class="card-body">
                    <p class="card-text text-center">{{ $regBook->book->b_title }}</p>
                    <p class="card-text"><i class="bi bi-calendar-date"></i> {{ $regBook->book->b_year }}</p>
                    <p class="card-text"><i class="bi bi-pin-map"></i> {{ $regBook->rack->r_location }}</p>
                </div>
            </div>
    </div>
    @endforeach

@endsection()
