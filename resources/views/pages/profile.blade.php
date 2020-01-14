@extends('layouts.app')
@push('styles')
    @push('styles')
        <style>
            body
            {
                background-image: url({{ asset('images/mainbg.png') }});
                background-attachment: fixed;
                background-size:cover;
            }
        </style>
    @endpush
@endpush
@section('content')
    <?php
    $agent = New \Jenssegers\Agent\Agent();
    ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 py-5">
                <h2 class="text-white text-center">Личный кабинет</h2>
            </div>
            <div class="col-lg-4 col-12 bg-dark p-4" style="border-right:1px solid red;">
                <h4 class="text-white text-center pb-3">
                    {{ $user->name }}
                </h4>
                {{--@dd($user->role->name == 'admin')--}}
                <h5 class="text-white text-center">
                    Актуальное:
                </h5>
                @if(\Illuminate\Support\Facades\Auth::user()->stock != 1)
                <p class="text-white pt-3">
                    Вам доступна скидка в 20%. Акция "Добро пожаловать": Все пользователи зарегистрированные на нашем сайте получают скидку на первый заказ в размере 20%.
                </p>
                @endif
            </div>
            <div class="col-lg-8 col-12 bg-dark py-4 px-0">
                <ul class="nav nav-tabs border-0" id="myTab" role="tablist">

                    <li class="nav-item mr-2 border-0 ml-auto">
                        <a class="nav-link active text-white" id="favourite-tab" data-toggle="tab" href="#favourite" role="tab" aria-controls="home" aria-selected="true">Избранные</a>
                    </li>
                    <li class="nav-item border-0 mr-auto">
                        <a class="nav-link text-white" id="history-tab" data-toggle="tab" href="#history" role="tab" aria-controls="profile" aria-selected="false">История заказов</a>
                    </li>
                </ul>
                <div class="tab-content pt-4 px-3" id="myTabContent">
                    <div class="tab-pane fade show active" id="favourite" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                        @foreach(\Illuminate\Support\Facades\Auth::user()->products as $product)
                            @if(!$agent->isPhone())
                                @include('_partials.product-profile')
                            @else
                                @include('_partials.product_card_mobile')
                            @endif
                        @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="order-content">
                            @foreach(\App\Cart::where('user_id',\Illuminate\Support\Facades\Auth::id())->get() as $basket)
                                <div class="p-4 mt-3" style="background-color:#292929; border: 1px solid #363636; box-sizing: border-box;">
                                    <div class="row border-bottom">
                                        @if($agent->isPhone())
                                            <div class="col-12 text-white">
                                                <p>
                                                    Имя: {{ $basket->name }}
                                                </p>
                                                <p>
                                                    Email: {{ $basket->email }}
                                                </p>
                                                <p>
                                                    Номер телефон: {{ $basket->phone }}
                                                </p>
                                                <p>
                                                    Адрес доставки: {{ $baket->address }}
                                                </p>
                                                <p>
                                                    Дата доставки: {{ $basket->date }}
                                                </p>
                                                <p>
                                                    Комментарий: {{ $basket->comment }}
                                                </p>
                                            </div>
                                        @else
                                            <div class="col-4 text-white">
                                                <p>
                                                    Имя:
                                                </p>
                                                <p>
                                                    Email:
                                                </p>
                                                <p>
                                                    Номер телефон:
                                                </p>
                                                <p>
                                                    Адрес доставки:
                                                </p>
                                                <p>
                                                    Дата доставки:
                                                </p>
                                                <p>
                                                    Комментарий:
                                                </p>
                                            </div>
                                            <div class="col-6 text-white">
                                                <p>
                                                    {{ $basket->name }}
                                                </p>
                                                <p>
                                                    {{ $basket->email }}
                                                </p>
                                                <p>
                                                    {{ $basket->phone }}
                                                </p>
                                                <p>
                                                    Адрес доставки: {{ $baket->address }}
                                                </p>
                                                <p>
                                                    {{ $basket->date }}
                                                </p>
                                                <p>
                                                    {{ $basket->comment }}
                                                </p>
                                            </div>
                                        @endif

                                    </div>
                                    <div class="basket-content pt-3">
                                        <div class="row text-white">
                                            <div class="col-4">
                                                <p>
                                                    Название
                                                </p>
                                            </div>
                                            <div class="col-4">
                                                <p>
                                                    Кол-во
                                                </p>
                                            </div>
                                            <div class="col-4">
                                                <p>
                                                    Цена
                                                </p>
                                            </div>
                                        </div>
                                        @foreach($basket->cart as $cart)
                                            <div class="row text-white">
                                                <div class="col-4">
                                                    <p>
                                                        {{ $cart['name'] }}
                                                    </p>
                                                </div>
                                                <div class="col-4">
                                                    <p>
                                                     {{ $cart['quantity'] }}
                                                    </p>
                                                </div>
                                                <div class="col-4">
                                                    {{ $cart['price'] }} сом
                                                </div>
                                            </div>
                                        @endforeach
                                        @if($basket->promo)

                                            <p class="font-weight-bold text-white">
                                                Промокод: {{ $basket->promo }}  - Скидка: {{ $basket->discount }}%
                                            </p>
                                        @endif
                                        <div class="total">
                                            <p class="font-weight-bold text-white">
                                                Итого: {{ $basket->total }} сом
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@foreach(\Illuminate\Support\Facades\Auth::user()->products as $product)
    @include('modals.product')
@endforeach