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
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 py-5">
                <h2 class="text-white text-center">Личный кабинет</h2>
            </div>
            <div class="col-lg-6 col-12 bg-dark p-4" style="border-right:1px solid red;">
                <h4 class="text-white text-center pb-3">
                    Зарегистрированные клиенты
                </h4>
                {{--@dd($user->role->name == 'admin')--}}
                @if($agent->isPhone())
                    @foreach(\App\User::all() as $value)
                        @if($value->role->name != 'admin')
                    <div class="p-2" style="border-bottom: 1px solid #56595d;">
                        <p class="text-white">
                            Имя: {{ $value->name }}
                        </p>
                        <p class="text-white">
                            Email: {{ $value->email }}
                        </p>
                        <p class="text-white">
                            Номер телефона: {{ $value->phone }}
                        </p>
                        <p class="text-white">
                            Кол-во заказов: {{ count(\App\Cart::where('user_id', $value->id)->get()) }}
                        </p>
                    </div>
                            @endif
                    @endforeach
                    @else
                <div class="row p-3">
                    <div class="col-3 text-white">
                        Имя
                    </div>
                    <div class="col-3 text-white">
                        Email
                    </div>
                    <div class="col-3 text-white">
                        Номер телефона
                    </div>
                    <div class="col-3 text-white">
                        Кол-во заказов
                    </div>
                </div>
                @foreach(\App\User::all() as $value)
                    @if($value->role->name != 'admin')
                    <div class="row p-3 user-point" style="cursor:pointer;" data-toggle="modal" data-target="#usercarts-{{ $value->id }}">
                        <div class="col-3 text-white">
                            {{ $value->name }}
                        </div>
                        <div class="col-3 text-white">
                            {{ $value->email }}
                        </div>
                        <div class="col-3 text-white">
                            {{ $value->phone }}
                        </div>
                        <div class="col-3 text-white">
                            {{ count(\App\Cart::where('user_id', $value->id)->get()) }}
                        </div>
                    </div>
                    @endif
                @endforeach
                    @endif
            </div>
            <div class="col-lg-6 col-12 bg-dark pb-4 px-lg-5 px-3">

                <h2 class="text-white text-center pb-3 pt-4">
                    Заказы
                </h2>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item mr-3">
                        <a class="nav-link active text-white" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Зарегистированные пользователи</a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link text-white" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Не зарегистрированные пользователи</a>
                    </li>

                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h4 class="text-white text-center pb-3 pt-4">
                            Заказы зарегистрированных клиентов
                        </h4>
                        <div class="order-content">
                            @foreach($carts as $basket)
                                @isset($basket->user_id)
                                    <div class="p-lg-4 p-1 mt-3" style="background-color:#292929; border: 1px solid #363636; box-sizing: border-box;">
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
                                                        Дата доставки: {{ $basket->date }}
                                                    </p>
                                                    <p>
                                                        Комментарий: {{ $basket->comment }}
                                                    </p>
                                                    <p>
                                                        Дата оформления заказа: {{ $basket->created_at }}
                                                    </p>
                                                    @if(isset($basket->user_id))
                                                        <p class="font-weight-bold">
                                                            Зарегистрирован: Да
                                                        </p>
                                                    @else
                                                        <p class="font-weight-bold">
                                                            Зарегистрирован: Нет
                                                        </p>
                                                    @endif
                                                </div>
                                            @else
                                                <div class="col-4 text-white">
                                                    <p>
                                                        Имя:
                                                    </p>
                                                    @if($basket->email)
                                                        <p>
                                                            Email:
                                                        </p>
                                                    @endif
                                                    <p>
                                                        Номер телефон:
                                                    </p>
                                                    <p>
                                                        Дата доставки:
                                                    </p>
                                                    @if($basket->comment)
                                                        <p>
                                                            Комментарий:
                                                        </p>
                                                    @endif
                                                    <p>
                                                        Дата оформления заказа:
                                                    </p>
                                                    @if(isset($basket->user_id))
                                                        <p>
                                                            Зарегистрирован:
                                                        </p>
                                                    @else
                                                        <p>
                                                            Зарегистрирован:
                                                        </p>
                                                    @endif
                                                </div>
                                                <div class="col-6 text-white">
                                                    <p>
                                                        {{ $basket->name }}
                                                    </p>
                                                    @if($basket->email)
                                                        <p>
                                                            {{ $basket->email }}
                                                        </p>
                                                    @endif
                                                    <p>
                                                        {{ $basket->phone }}
                                                    </p>
                                                    <p>
                                                        {{ $basket->date }}
                                                    </p>
                                                    @if($basket->comment)
                                                        <p>
                                                            {{ $basket->comment }}
                                                        </p>
                                                    @endif
                                                    <p>
                                                        {{ $basket->created_at }}
                                                    </p>
                                                    @if(isset($basket->user_id))
                                                        <p class="font-weight-bold">
                                                            да
                                                        </p>
                                                    @else
                                                        <p class="font-weight-bold">
                                                            нет
                                                        </p>
                                                    @endif
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
                                @endisset
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <h4 class="text-white text-center pb-3 pt-4">
                            Заказы не зарегистрированных клиентов
                        </h4>
                        <div class="order-content">
                            @foreach($carts as $basket)
                                @empty($basket->user_id)
                                    <div class="p-lg-4 p-1 mt-3" style="background-color:#292929; border: 1px solid #363636; box-sizing: border-box;">
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
                                                        Дата доставки: {{ $basket->date }}
                                                    </p>
                                                    <p>
                                                        Комментарий: {{ $basket->comment }}
                                                    </p>
                                                    <p>
                                                        Дата оформления заказа: {{ $basket->created_at }}
                                                    </p>
                                                    @if(isset($basket->user_id))
                                                        <p class="font-weight-bold">
                                                            Зарегистрирован: Да
                                                        </p>
                                                    @else
                                                        <p class="font-weight-bold">
                                                            Зарегистрирован: Нет
                                                        </p>
                                                    @endif
                                                </div>
                                            @else
                                                <div class="col-4 text-white">
                                                    <p>
                                                        Имя:
                                                    </p>
                                                    @if($basket->email)
                                                        <p>
                                                            Email:
                                                        </p>
                                                    @endif
                                                    <p>
                                                        Номер телефон:
                                                    </p>
                                                    <p>
                                                        Дата доставки:
                                                    </p>
                                                    @if($basket->comment)
                                                        <p>
                                                            Комментарий:
                                                        </p>
                                                    @endif
                                                    <p>
                                                        Дата оформления заказа:
                                                    </p>
                                                    @if(isset($basket->user_id))
                                                        <p>
                                                            Зарегистрирован:
                                                        </p>
                                                    @else
                                                        <p>
                                                            Зарегистрирован:
                                                        </p>
                                                    @endif
                                                </div>
                                                <div class="col-6 text-white">
                                                    <p>
                                                        {{ $basket->name }}
                                                    </p>
                                                    @if($basket->email)
                                                        <p>
                                                            {{ $basket->email }}
                                                        </p>
                                                    @endif
                                                    <p>
                                                        {{ $basket->phone }}
                                                    </p>
                                                    <p>
                                                        {{ $basket->date }}
                                                    </p>
                                                    @if($basket->comment)
                                                        <p>
                                                            {{ $basket->comment }}
                                                        </p>
                                                    @endif
                                                    <p>
                                                        {{ $basket->created_at }}
                                                    </p>
                                                    @if(isset($basket->user_id))
                                                        <p class="font-weight-bold">
                                                            да
                                                        </p>
                                                    @else
                                                        <p class="font-weight-bold">
                                                            нет
                                                        </p>
                                                    @endif
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
                                @endempty
                            @endforeach
                        </div>
                    </div>
                </div>

        </div>
        <!-- New -->
    </div>
    </div>
@endsection
@foreach(\App\User::all() as $value)
    @if($value->role->name != 'admin')
        @include('modals.user_orders')
    @endif
@endforeach