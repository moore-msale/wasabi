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
                        <div class="px-0 main-adder content-scroll content-blog" id="content-blog">
                                 <div class="container-fluid">
                                        <div class="row">
                                                <?php
                                                        $i = 1;
                                                ?>
                                                @foreach(\App\Stock::all() as $stock)
                                                        @if($i == 1)
                                                <div class="col-lg-4 col-12 p-3 d-flex align-items-center">
                                                        <div class="adder p-4 text-center">
                                                                <p class="font-weight-bold text-white text-uppercase adder-header mb-4">
                                                                        {{ $stock->name }}
                                                                </p>
                                                                <img class="py-3" style="max-height: 280px;" src="{{ asset('storage/'.str_replace('\\', '/', $stock->image)) }}" alt="">
                                                                <p class="adder-text text-white px-5 mt-4">{{ $stock->description }}</p>
                                                        </div>
                                                </div>
                                                                @elseif($i == 2)
                                                        <div class="col-lg-4 col-12 p-3 d-flex align-items-center">
                                                                <div class="adder p-4 text-center">
                                                                        <img class="py-3" style="max-height: 280px;" src="{{ asset('storage/'.str_replace('\\', '/', $stock->image)) }}" alt="">
                                                                        <p class="font-weight-bold text-white text-uppercase adder-header mb-3">
                                                                                {{ $stock->name }}
                                                                        </p>
                                                                        <p class="adder-text text-white mt-4">{{ $stock->description }}</p>
                                                                </div>
                                                        </div>
                                                                @elseif($i == 3)
                                                                        <div class="col-lg-4 col-12 p-3 d-flex align-items-center">
                                                                                <div class="adder p-4 text-center">
                                                                                        <img class="py-3" style="max-height: 280px;" src="{{ asset('storage/'.str_replace('\\', '/', $stock->image)) }}" alt="">
                                                                                        <p class="font-weight-bold text-white text-uppercase adder-header mb-3">
                                                                                                {{ $stock->name }}
                                                                                        </p>
                                                                                        <p class="adder-text text-white mt-4">{{ $stock->description }}</p>
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
                                @include('_partials.footer')
                        </div>

                </div>
        </div>

@endsection
