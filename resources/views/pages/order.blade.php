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
        <div class="row justify-content-center">
            {{--@if(!$agent->isPhone())--}}
                {{--@include('_partials.sidebar')--}}
            {{--@endif--}}
            <div class="col-lg-7 col-12">
                <div class="py-4 px-lg-5 px-2">
                    <div class="px-0 mb-3">
                        <h2 class="catalog-header text-white font-weight-bold text-uppercase pb-4">Оформление заказа</h2>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item mr-2 border-0 ml-auto">
                                <a class="nav-link active text-white" id="delivery" data-toggle="tab" href="#deliverys" role="tab" aria-controls="home" aria-selected="true">Доставка</a>
                            </li>
                            <li class="nav-item border-0 mr-auto">
                                <a class="nav-link text-white" id="take-out" data-toggle="tab" href="#take-outs" role="tab" aria-controls="profile" aria-selected="false">Самовывоз</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="deliverys" role="tabpanel" aria-labelledby="home-tab">
                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf
                                    <div class="row p-4 bg-dark">
                                        <div class="col-lg-6 p-2">
                                            <div class="md-form">
                                                <input placeholder="Ваше имя*" type="text" name="name" id="name" class="form-control text-white" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 p-2">
                                            <div class="md-form">
                                                <input placeholder="Телефон*" type="text" name="phone" id="phone" class="form-control text-white" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 p-2">
                                            <div class="md-form">
                                                <input placeholder="Email*" type="text" name="email" id="email" class="form-control text-white" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 p-2">
                                            <div class="md-form">
                                                <input placeholder="Адрес доставки*" type="text" name="address" id="address" class="form-control text-white" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 p-2">
                                            <div class="md-form">
                                                <textarea placeholder="Ваши пожелания" id="message" name="message" class="form-control md-textarea text-white" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 p-2">
                                            <div class="md-form">
                                                <input placeholder="Промокод" type="text" name="promo" id="promo" class="form-control text-white">
                                            </div>
                                            <div class="d-flex">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="need" id="need">
                                                    <label class="custom-control-label text-white" for="need">Как можно быстрее</label>
                                                </div>
                                                <div class="custom-control custom-checkbox ml-3">
                                                    <input type="checkbox" class="custom-control-input time-check" name="time" id="time">
                                                    <label class="custom-control-label text-white" for="time">Определенное время</label>
                                                </div>
                                            </div>
                                            <div class="shower w-100">
                                                <div class="md-form">
                                                    <input placeholder="Время доставки*" type="text" name="dtime" id="dtime" class="form-control date-format text-white">
                                                </div>
                                            </div>
                                            <input type="hidden" name="type" value="1">
                                            <div class="d-flex justify-content-end">
                                                <button class="btn btn-danger text-white" type="submit">
                                                    Отправить <i class="fas fa-long-arrow-alt-right ml-2"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <p class="text-white pt-3">
                                                Условия доставки:
                                            </p>
                                            <p class="text-white">
                                                Стоимость доставки – 50 сом. При заказе на сумму свыше 700 сом, доставка бесплатная.
                                            </p>
                                            <p class="text-white">
                                                Время доставки в течении 1 часа. В часы пик доставка может быть дольше.
                                            </p>
                                            <p class="text-white">
                                                Минимальный заказ – 200 сом. О доставке в отдаленные районы уточняйте у оператора.
                                            </p>
                                            <p class="text-white">
                                                При первой покупке покупке после регистрации на сайте скидка 20%, скидка не складывается со скидкой от промокода или других акций.
                                            </p>
                                        </div>
                                    </div>
                                </form></div>
                            <div class="tab-pane fade" id="take-outs" role="tabpanel" aria-labelledby="profile-tab">
                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf
                                    <div class="row p-4 bg-dark">
                                        <div class="col-lg-6 p-2">
                                            <div class="md-form">
                                                <input placeholder="Ваше имя*" type="text" name="name" id="name" class="form-control text-white" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 p-2">
                                            <div class="md-form">
                                                <input placeholder="Телефон*" type="text" name="phone" id="phone" class="form-control text-white" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 p-2">
                                            <div class="md-form">
                                                <input placeholder="Email*" type="text" name="email" id="email" class="form-control text-white" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 p-2">
                                            <div class="md-form">
                                                <input placeholder="Заказ на время*" type="text" name="dtime" id="dtime" class="form-control date-format text-white d-block" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 p-2">
                                            <input type="hidden" name="type" value="2">
                                            <div class="d-flex justify-content-end">
                                                <button class="btn btn-danger text-white" type="submit">
                                                    Отправить <i class="fas fa-long-arrow-alt-right ml-2"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <p class="text-white pt-3">
                                                Акция:
                                            </p>
                                            <p class="text-white">
                                                Забери свой заказ сам и получи 10% (действует до 31-декабря)
                                            </p>
                                            <p class="text-white">
                                                При первой покупке после регистрации на сайте скидка 20%, скидка не складывается со скидкой от промокода или других акций.
                                            </p>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12 px-0">
                <div class="py-4 px-lg-5 px-2">
                    <div class="px-0 mb-3">
                        <h2 class="catalog-header text-white font-weight-bold text-uppercase pb-4">Корзина заказа</h2>
                        <div class="p-4 bg-dark">
                            @foreach($cartItems as $item)
                            <div class="row">
                                <div class="col-6">
                                    <span class="text-white">{{ $item->name }}</span>
                                </div>
                                <div class="col-3">
                                    <span class="text-white">{{ $item->quantity }}</span>
                                </div>
                                <div class="col-3">
                                    <span class="text-white">{{ $item->price }} сом</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <p class="product-header text-white float-right font-weight-bold mt-3 p-3">
                            Итого: <span class="ml-2"> {{ $total }} сом</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
@endpush
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/localization/messages_ru.js">
    </script>


@endpush