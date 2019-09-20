@extends('layouts.app')
@push('styles')
    <style>
        body
        {
            background-color: #000000;
            background-size:cover;
        }
    </style>
@endpush
@section('content')
    <?php
    $agent = New \Jenssegers\Agent\Agent();
    ?>

    <div class="container-fluid">
        <div class="row">
    @if(!$agent->isPhone())
        @include('_partials.sidebar')
    @endif
            <div class="col-lg-7 col-12">
                <div class="py-4 px-lg-5 px-2">
                    <div class="px-0 mb-3">
                        <h2 class="catalog-header text-white font-weight-bold text-uppercase pb-4">Корзина заказа</h2>
                            <div class="row p-1 bg-dark">
                                <div class="col-lg-2 col-4">
                                    <div class="basket-image w-100" style="background-image: url({{ asset('images/product.png') }})">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-3 d-flex align-items-center">
                                    <span class="product-header text-white font-weight-bold">
                                        Гинза маки
                                    </span>
                                </div>
                                <div class="col-2 d-lg-block d-none"></div>
                                <div class="col-lg-3 col-2 d-flex align-items-center">
                                    <span class="product-price text-white font-weight-bold">
                                        365 сом
                                    </span>
                                </div>
                                <div class="col-1 d-flex align-items-center">
                                    <span class="product-price text-white font-weight-bold">
                                        <i class="fas fa-times"></i>
                                    </span>
                                </div>
                            </div>
                    </div>
                    <span>
                        <img src="{{ asset('images/add.svg') }}" alt=""><span class="product-header text-white ml-2 font-weight-bold">Добавить</span>
                    </span>
                    <span class="product-header text-white float-right font-weight-bold">
                        Итого: <span class="ml-2"> 1268</span>
                    </span>
                    <div class="mt-4">
                        <button class="btn btn-danger text-white float-right">
                            Оформить заказ <i class="fas fa-long-arrow-alt-right ml-2"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection