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
        <div class="container-fluid">
                <div class="row justify-content-end">
                        @if(!$agent->isPhone())
                        @include('_partials.sidebar')
                        @endif
                        <div class="px-0 main-adder content-scroll pb-4 content-blog" id="content-blog">
                                 <div class="container-fluid">
                                        <div class="row">
                                                <div class="col-lg-4 col-12 p-3">
                                                        <div class="adder p-4 text-center" style="background-image: url({{asset('images/first-ad.png')}})">
                                                                <p class="font-weight-bold text-white text-uppercase adder-header mb-5">
                                                                        Ролл «Яки унаги рору» в подарок
                                                                </p>
                                                                <img class="w-50 py-3" src="{{ asset('images/adder.png') }}" alt="">
                                                                <p class="adder-text text-white px-5 mt-5">с 3 по 9 июня самым активным участникам проекта «Активный гражданин»</p>
                                                        </div>
                                                </div>
                                                <div class="col-lg-4 col-12 p-3">
                                                        <div class="adder p-4 my-lg-0 my-5" style="background-image: url({{ asset('images/adder2.png') }})">
                                                                <p class="font-weight-bold text-white text-uppercase adder-header">
                                                                        Ролл «Яки унаги рору» в подарок
                                                                </p>
                                                                <p class="adder-text text-white">с 3 по 9 июня самым активным участникам проекта «Активный гражданин»</p>

                                                        </div>
                                                </div>
                                                <div class="col-lg-4 col-12 p-3">
                                                        <div class="adder p-4 my-lg-0 my-5 text-center d-flex align-items-center" style="background-image: url({{asset('images/adder3.png')}})">
                                                                <p class="font-weight-bold text-white text-uppercase adder-header pr-5 mr-3">
                                                                        Ролл «Яки унаги рору» в подарок
                                                                </p>
                                                                {{--<img class="img-fluid pt-2 pb-3" src="{{ asset('images/adder.png') }}" alt="">--}}
                                                                <p class="text-white font-weight-bold" style="font-size:35px;">-50%</p>
                                                        </div>
                                                </div>
                                                <div class="col-lg-6 col-12 p-3">
                                                        <div class="adder p-4" style="background-image: url({{ asset('images/adder4.png') }})">
                                                                <p class="font-weight-bold text-white text-uppercase adder-header text-right">
                                                                        Ролл «Яки унаги <br> рору» в подарок
                                                                </p>
                                                                <p class="text-white font-weight-bold mb-0" style="font-size:35px;">-50%</p>
                                                                <p class="adder-text text-white col-lg-5 col-12 mb-0">с 3 по 9 июня самым активным участникам проекта «Активный гражданин»</p>
                                                        </div>
                                                </div>
                                                <div class="col-lg-6 col-12 p-3">
                                                        <div class="adder p-4" style="background-image: url({{ asset('images/adder5.png') }})">
                                                                {{--<p class="font-weight-bold text-white text-uppercase adder-header text-right">--}}
                                                                        {{--Ролл «Яки унаги <br> рору» в подарок--}}
                                                                {{--</p>--}}
                                                                <p class="text-white font-weight-bold mb-0 pt-5 mt-3" style="font-size:35px;">-50%</p>
                                                                <p class="adder-text text-white col-lg-5 col-12 mb-0">с 3 по 9 июня самым активным участникам проекта «Активный гражданин»</p>
                                                        </div>
                                                </div>
                                                <div class="col-12">
                                                        <p class="catalog-header text-light font-weight-bold pt-4 px-5">
                                                                Меню
                                                        </p>
                                                        <div class="owl-one owl-carousel">
                                                                @foreach(\App\Category::all() as $category)
                                                                        @if(count($category->products))
                                                                <div class="item grey darken-4 text-center p-4">
                                                                        <a href="{{ route('catalog',array('category' => $category->id)) }}">
                                                                                <p class="point" style="height:20px;">{{ $category->name }}</p>
                                                                        <img class="img-fluid" src="{{ asset('storage/'.$category->image) }}" alt="">
                                                                        </a>
                                                                </div>
                                                                        @endif
                                                                @endforeach
                                                        </div>
                                                </div>
                                        </div>
                                 </div>
                        </div>

                </div>
        </div>
@endsection
