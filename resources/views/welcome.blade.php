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
                                         <div class="owl-two owl-carousel d-lg-none d-block">
                                             <?php
                                             $i = 1;
                                             ?>
                                                 @foreach(\App\Stock::all() as $stock)
                                                         @if($i == 1)
                                                                 <div class="col-lg-4 col-12 p-3">
                                                                         <div class="adder p-4 text-center"
                                                                              style="background-image: url({{asset('images/first-ad.png')}})">
                                                                                 <p class="font-weight-bold text-white text-uppercase adder-header mb-5">
                                                                                         {{ $stock->name }}
                                                                                         <img class="w-50 py-3 mx-auto"
                                                                                              src="{{ asset('images/adder.png') }}"
                                                                                              alt="">
                                                                                 <p class="adder-text text-white px-5 mt-5 text-about">{{ $stock->description }}</p>

                                                                         </div>
                                                                 </div>
                                                         @elseif($i == 2)
                                                                 <div class="col-lg-4 col-12 p-3">
                                                                         <div class="adder p-4 my-lg-0"
                                                                              style="background-image: url({{ asset('images/adder2.png') }})">
                                                                                 <p class="font-weight-bold text-white text-uppercase adder-header">
                                                                                         {{ $stock->name }}
                                                                                 </p>
                                                                                 <p class="adder-text text-white text-about">{{ $stock->description }}</p>

                                                                         </div>
                                                                 </div>
                                                         @elseif($i == 3)
                                                                 <div class="col-lg-4 col-12 p-3">
                                                                         <div class="adder p-4 my-lg-0 text-center d-flex align-items-center"
                                                                              style="background-image: url({{asset('images/adder3.png')}})">
                                                                                 <p class="text-white text-about adder-text w-50">
                                                                                         {{ $stock->description }}
                                                                                 </p>
                                                                                 {{--<img class="img-fluid pt-2 pb-3" src="{{ asset('images/adder.png') }}" alt="">--}}

                                                                         </div>
                                                                 </div>
                                                         @endif
                                                 <?php
                                                 $i = $i + 1;
                                                 if($i == 4)
                                                 {
                                                     $i = 1;
                                                 }
                                                 ?>
                                                 @endforeach
                                         </div>
                                     <div class="d-lg-block d-none">
                                     <div class="row">
                                         <?php
                                         $i = 1;
                                         ?>
                                         @foreach(\App\Stock::all() as $stock)
                                             @if($i == 1)
                                                 <div class="col-lg-4 col-12 p-3">
                                                     <div class="adder p-4 text-center"
                                                          style="background-image: url({{asset('images/first-ad.png')}})">
                                                         <p class="font-weight-bold text-white text-uppercase adder-header mb-5">
                                                             {{ $stock->name }}
                                                             <img class="w-50 py-3 mx-auto"
                                                                  src="{{ asset('images/adder.png') }}"
                                                                  alt="">
                                                         <p class="adder-text text-white px-5 mt-5 text-about">{{ $stock->description }}</p>

                                                     </div>
                                                 </div>
                                             @elseif($i == 2)
                                                 <div class="col-lg-4 col-12 p-3">
                                                     <div class="adder p-4 my-lg-0"
                                                          style="background-image: url({{ asset('images/adder2.png') }})">
                                                         <p class="font-weight-bold text-white text-uppercase adder-header">
                                                             {{ $stock->name }}
                                                         </p>
                                                         <p class="adder-text text-white text-about">{{ $stock->description }}</p>

                                                     </div>
                                                 </div>
                                             @elseif($i == 3)
                                                 <div class="col-lg-4 col-12 p-3">
                                                     <div class="adder p-4 my-lg-0 text-center d-flex align-items-center"
                                                          style="background-image: url({{asset('images/adder3.png')}})">
                                                         <p class="text-white text-about adder-text w-50 pr-5">
                                                             {{ $stock->description }}
                                                         </p>
                                                         {{--<img class="img-fluid pt-2 pb-3" src="{{ asset('images/adder.png') }}" alt="">--}}

                                                     </div>
                                                 </div>
                                             @endif
                                             <?php
                                             $i = $i + 1;
                                             if($i == 4)
                                             {
                                                 $i = 1;
                                             }
                                             ?>
                                         @endforeach
                                     </div>
                                     </div>
                                        <div class="row">

                                                <div class="col-12 d-lg-block d-none">
                                                        <p class="catalog-header text-light font-weight-bold pt-4 px-5">
                                                                Меню
                                                        </p>
                                                        <div class="owl-one owl-carousel">
                                                                @foreach(\App\Category::all() as $category)
                                                                        {{--@if(count($category->products))--}}
                                                                                <div class="item grey darken-4 text-center p-4 cat">
                                                                                        <a href="{{ route('catalog',array('category' => $category->id)) }}">
                                                                                                <p class="point"
                                                                                                   style="height:20px;">{{ $category->name }}</p>
                                                                                                <img class="img-fluid"
                                                                                                     src="{{ asset('storage/'.$category->image) }}"
                                                                                                     alt="">
                                                                                        </a>
                                                                                </div>
                                                                        {{--@endif--}}
                                                                @endforeach
                                                        </div>
                                                </div>
                                        </div>
                                 </div>
                                @include('_partials.footer')
                        </div>

                </div>
        </div>

@endsection
