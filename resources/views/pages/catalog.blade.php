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
            <div class="col-lg-9 col-12 content-scroll">
                <div class="row py-4 px-lg-5 px-2">
                    <div class="col-12 px-0 mb-4">
                        <h2 class="catalog-header text-white font-weight-bold">Роллы</h2>
                        <div class="col-12 px-0 pt-2">
                        <span>
                            <img src="{{ asset('images/filter.svg') }}" alt=""><span class="text-white catalog-option ml-2">Фильтр</span>
                        </span>
                            <a href="{{ route('catalog', array_merge(request()->query(), ['sort' => request()->sort == 'desc' ? 'asc' : 'desc']))}}">
                        <span class="ml-lg-5 ml-4">
                            <img src="{{ asset(request('sort') == 'desc' ? 'images/sortup.svg' : 'images/sortdown.svg') }}" alt=""><span class="text-white catalog-option ml-2">Сортировать по цене</span>
                        </span>
                            </a>
                            <span class="float-right">
                            <img src="{{ asset('images/remove.svg') }}" alt=""><span class="text-white catalog-option ml-2">Сбросить фильтры</span>
                        </span>
                        </div>
                    </div>
                    {{--@dd($products)--}}
                    @foreach($products as $product)
                        @include('_partials.product-card')
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @foreach($products as $product)
    @include('modals.product')
    @endforeach
@endsection

