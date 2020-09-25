@extends('layout.layout')

@section('content')
    

        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <img src="/imgs/books-3.jpg" class="home-img" alt="image">
                <div class="title m-b-md">
                New view
                </div>

               
            </div>
        </div>
    
@endsection