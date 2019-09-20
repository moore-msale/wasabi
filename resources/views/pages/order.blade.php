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
                        <form action="">
                        <div class="row p-4 bg-dark">
                            <div class="col-lg-6 p-2">
                                <div class="md-form">
                                    <input type="text" name="name" id="name" class="form-control">
                                    <label for="name">Ваше имя*</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-2">
                                <div class="md-form">
                                    <input type="text" name="phone" id="phone" class="form-control">
                                    <label for="phone">Телефон*</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-2">
                                <div class="md-form">
                                    <input type="text" name="email" id="email" class="form-control">
                                    <label for="email">Email*</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-2">
                                <div class="md-form">
                                    <input type="text" name="address" id="address" class="form-control">
                                    <label for="address">Адрес доставки*</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-2">
                                <div class="md-form">
                                    <textarea id="message" name="message" class="form-control md-textarea" rows="3"></textarea>
                                    <label for="message">Ваши пожелания</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-2">
                                <div class="d-flex">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="need">
                                        <label class="custom-control-label text-white" for="need">Как можно быстрее</label>
                                    </div>
                                    <div class="custom-control custom-checkbox ml-3">
                                        <input type="checkbox" class="custom-control-input" id="time">
                                        <label class="custom-control-label text-white" for="time">Определенное время</label>
                                    </div>
                                </div>
                                <div class="d-flex align-items-end h-75">
                                    <button class="btn btn-danger text-white">
                                        Отправить <i class="fas fa-long-arrow-alt-right ml-2"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection