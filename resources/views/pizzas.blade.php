@extends('layout.layout')

@section('content')
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                   Pizzas List
                </div>

                {{-- @for ($i = 0; $i < count($pizzas); $i++)
            <p>{{ $pizzas[$i]['type'] }}</p>
            <p> {{ $i }} </p>
                @endfor --}}

                @foreach ($pizzas as $pizza )
                    <div>
                        {{ $pizza['type'] }}, {{ $pizza['data'] }},  {{ $pizza['price'] }}
                    </div>
                    @if ($loop->first)
                        <p>I am the first loop</p>
                    @elseif($loop->last)
                    <p>I am the last loop</p>
                    @else
                    <p>I am in between</p>
                    @endif
                @endforeach
            <p></p>
            </div>
        </div>
@endsection
