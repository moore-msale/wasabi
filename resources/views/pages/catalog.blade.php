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
    <?php
    $agent = New \Jenssegers\Agent\Agent();
    ?>

    <div class="container-fluid">
        <div class="row justify-content-end">
            @if(!$agent->isPhone())
                @include('_partials.sidebar')
            @endif
            <div class="content-scroll position-relative content-blog" id="content-blog">
                <div class="row py-4 px-lg-5 pl-2 w-100">
                    <div class="col-12 px-0 mb-4">
                        <h2 class="catalog-header text-white font-weight-bold">Роллы</h2>
                        <div class="col-12 px-0 pt-2">
                        <span>
                            <a data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            <img src="{{ asset('images/filter.svg') }}" alt=""><span class="text-white catalog-option ml-2">Фильтр</span>
                            </a>
                        </span>
                            <a class="d-lg-inline d-none" href="{{ route('catalog', array_merge(request()->query(), ['sort' => request()->sort == 'desc' ? 'asc' : 'desc']))}}">
                        <span class="ml-lg-5 ml-4">
                            <img src="{{ asset(request('sort') == 'desc' ? 'images/sortup.svg' : 'images/sortdown.svg') }}" alt=""><span class="text-white catalog-option ml-2">Сортировать</span>
                        </span>
                            </a>
                            <span class="float-right">
                                <a href="{{ route('catalog', array_merge(request()->query()))}}">
                            <img src="{{ asset('images/remove.svg') }}" alt=""><span class="text-white catalog-option ml-2">Сбросить фильтры</span>
                                </a>
                        </span>
                        </div>
                    </div>
                    <div class="collapse col-12" id="collapseExample">
                        <div class="card card-body mb-3 bg-transparent d-flex px-0">
                            <form action="{{ route('catalog_filter', array_merge(request()->query())) }}" method="POST">
                                @csrf
                                <div style="max-width:none!important; width:100%; overflow-x: auto;">
                                <div class="d-flex" style="width:max-content;">
                                @foreach(\App\Type::all() as $type)
                                    @if(count($type->products))
                                        <div class="custom-control custom-checkbox pr-3">
                                            <input type="checkbox" name="{{ $type->id }}" class="custom-control-input" id="{{ $type->name }}">
                                            <label class="custom-control-label text-white" for="{{ $type->name }}">{{ $type->name }}</label>
                                        </div>
                                    @endif
                                @endforeach
                                    {{--<input type="" name="type" value="{{ request()->query() }}">--}}
                                </div>
                                </div>
                                <div class="pt-3">
                                <button class="btn btn-danger btn-filter m-0" type="submit">Применить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="mobile-bar d-md-none d-block" style="max-width: none!important; overflow-x: auto; width:100%;">
                        <div class="text-white mt-2 pl-2" style="width:max-content;">
                        @foreach(\App\Category::all() as $category)
                                @if(count($category->products))
                                <a href="{{ route('catalog',array('category' => $category->id)) }}" class="cat-points point {{ request()->query('category') == $category->id ? 'choice' : ''}}">{{ $category->name }}</a>
                                @endif
                        @endforeach
                        </div>
                    </div>
                    @if(!$agent->isPhone())
                        @foreach($products as $product)
                            @include('_partials.product-card')
                        @endforeach
                    @else
                        @foreach($products as $product)
                            @include('_partials.product_card_mobile')
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

    @foreach($products as $product)
    @include('modals.product')
    @endforeach
@endsection
@push('scripts')
    <script>
        $(document).ready( function () {
            let id = {{$product->id}}
            console.log($('.counter-' + id).html());
            if(parseInt($('.counter-' + id).html()) >= 0)
            {

            }
            else
            {
                $('.counter-' + id).html(0);
            }
            console.log({{$product->id}});
        })
    </script>
@endpush

