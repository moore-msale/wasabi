@extends('layouts.app')
@push('styles')
    <style>
        body
        {
            background-image: url({{ asset('images/mainbg.png') }});
            background-size:cover;
        }
        .content-blog
        {
            width:100%;
        }
        .sidebar-blog
        {
            left:-16.6%;
        }
        .open-nav
        {
            display:block;
        }
        .close-nav
        {
            display: none;
        }
    </style>
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-end">
            @if(!$agent->isPhone())
                @include('_partials.sidebar')
            @endif
            <div class="content-blog content-scroll pl-0 main-adder" id="content-blog" style="height: 90vh;">
    <div class="container">
        <div class="row justify-content-center pt-5">
            @foreach($stocks as $stock)
            <div class="col-lg-4 col-12 h-100">
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
                @include('_partials.footer')
            </div>
        </div>
    </div>
@endsection