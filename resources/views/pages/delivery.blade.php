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
            <div class="content-blog content-scroll" id="content-blog" style="height: 90vh;">
    <div class="container" style="height: 90vh;">
        <div class="row align-items-center justify-content-center h-100">
            <div class="col-10 text-white">
                <h2 class="pb-3 text-center" style="font-size:30px;"> Условия Доставки</h2>
                <div class="d-flex align-items-center pt-4">
                    <img class="mr-3" style="width:60px; height:60px;" src="{{ asset('images/take-away.svg') }}" alt=""> <span class="text-white" style="font-size:22px;">
                    Стоимость доставки – 50 сом. При заказе на сумму свыше 700 сом, доставка бесплатная.
                    </span>
                </div>

                <div class="d-flex align-items-center pt-4">
                    <img class="mr-3" style="width:60px; height:60px;" src="{{ asset('images/clock.svg') }}" alt=""> <span class="text-white" style="font-size:22px;">
                    Время доставки в течении 1 часа. В часы пик доставка может быть дольше.
                    </span>
                </div>

                <div class="d-flex align-items-center pt-4">
                    <img class="mr-3" style="width:60px; height:60px;" src="{{ asset('images/sushi.svg') }}" alt=""> <span class="text-white" style="font-size:22px;">
                    Минимальный заказ – 200 сом. О доставке в отдаленные районы уточняйте у оператора.
                    </span>
                </div>
            </div>

        </div>
    </div>
    @include('_partials.footer')
            </div>
        </div>
    </div>

@endsection