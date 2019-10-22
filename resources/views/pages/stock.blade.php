@extends('layouts.app')
@push('styles')
    <style>
        body
        {
            background-image: url({{ asset('images/mainbg.png') }});
            background-size:cover;
        }
    </style>
@endpush
@section('content')
    <div class="container" style="height: 90vh;">
        <div class="row justify-content-center">
            @foreach($stocks as $stock)
            <div class="col-4 h-100">
                <div class="stock-img" style="background-image: url({{ asset('storage/'.str_replace('\\', '/', $stock->image)) }})"></div>
                <div>
                    <h3 class="py-3 text-white text-center">
                        {{ $stock->name }}
                    </h3>
                    <p class="text-white">
                        {{ $stock->description }}
                    </p>
                </div>
            </div>
                @endforeach
        </div>
    </div>
@endsection