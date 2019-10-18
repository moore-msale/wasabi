@extends('layouts.app')
@push('styles')
    @push('styles')
        <style>
            body
            {
                background-image: url({{ asset('images/mainbg.png') }});
                background-size:cover;
            }
        </style>
    @endpush
@endpush
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 py-5">
                <h2 class="text-white text-center">Личный кабинет</h2>
            </div>
            <div class="col-4 bg-dark p-4" style="border-right:1px solid red;">
                <h4 class="text-white text-center pb-3">
                    {{ $user->name }}
                </h4>
                <h5 class="text-white text-center">
                    Актуальное:
                </h5>
                <p class="text-white pt-3">
                    Вам доступна скидка в 20%. Акция "Добро пожаловать": Все пользователи зарегистрированные на нашем сайте получают скидку на первый заказ в размере 20%.
                </p>
            </div>
            <div class="col-8 bg-dark p-4">
                <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
                    <li class="nav-item mr-2 border-0">
                        <a class="nav-link active text-white" id="favourite-tab" data-toggle="tab" href="#favourite" role="tab" aria-controls="home" aria-selected="true">Избранные</a>
                    </li>
                    <li class="nav-item border-0">
                        <a class="nav-link text-white" id="history-tab" data-toggle="tab" href="#history" role="tab" aria-controls="profile" aria-selected="false">История</a>
                    </li>
                </ul>
                <div class="tab-content pt-4 px-3" id="myTabContent">
                    <div class="tab-pane fade show active" id="favourite" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row ">
                        @foreach(\Illuminate\Support\Facades\Auth::user()->products as $product)
                            @include('_partials.product-card')
                        @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="profile-tab">...</div>
                </div>
            </div>
        </div>
    </div>
@endsection
@foreach(\Illuminate\Support\Facades\Auth::user()->products as $product)
    @include('modals.product')
@endforeach