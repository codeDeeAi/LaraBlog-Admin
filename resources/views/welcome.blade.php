@extends('layout.layout')

@section('content')
    

        <div class="flex-center position-ref full-height">

            <div class="content">
                <img src="/imgs/books-3.jpg" class="home-img" alt="image">
                <div class="title m-b-md">
                Welcome to the Bookshelf
                </div>

               
            </div>
        </div>
        {{-- Vue JS  --}}
        <div id="app">
            <main-app></main-app>
        </div>
@endsection