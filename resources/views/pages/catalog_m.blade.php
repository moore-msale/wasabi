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
            <div class="content-scroll position-relative content-blog" id="content-blog">
                    <div class="row py-4 px-lg-5 pl-4 w-100">
                        <div class="col-12 px-0 mb-4">
                            <h2 class="catalog-header text-white font-weight-bold">Роллы</h2>
                            <div class="col-12 px-0 pt-2">
                        <span>
                            <a data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            <img src="{{ asset('images/filter.svg') }}" alt=""><span class="text-white catalog-option ml-2">Фильтр</span>
                            </a>
                        </span>
                                <span class="float-right">
                                <a href="{{ route('catalog_m', array_merge(request()->query()))}}">
                            <img src="{{ asset('images/remove.svg') }}" alt=""><span class="text-white catalog-option ml-2">Сбросить фильтры</span>
                                </a>
                        </span>
                            </div>
                        </div>
                        <div class="collapse col-12" id="collapseExample">
                            <div class="card card-body mb-3 bg-transparent d-flex px-0">
                                {{--@dd(request()->query())--}}
                                <form action="{{ route('catalog_m_filter', array_merge(request()->query())) }}" method="POST">
                                    @csrf
                                    <div style="max-width:none!important; width:100%; overflow-x: auto;">
                                        <div class="d-flex" style="width:max-content;">
                                            @if(request()->query('type') == 'category')
                                            @foreach(\App\Type::all() as $type)
                                                @if(count($type->products))
                                                    <div class="custom-control custom-checkbox pr-3">
                                                        <input type="checkbox" name="{{ $type->id }}" class="custom-control-input" id="{{ $type->name }}">
                                                        <label class="custom-control-label text-white" for="{{ $type->name }}">{{ $type->name }}</label>
                                                    </div>
                                                @endif
                                            @endforeach
                                            @else
                                                @foreach(\App\Category::all() as $type)
                                                    @if(count($type->products))
                                                        <div class="custom-control custom-checkbox pr-3">
                                                            <input type="checkbox" name="{{ $type->id }}" class="custom-control-input" id="{{ $type->name }}">
                                                            <label class="custom-control-label text-white" for="{{ $type->name }}">{{ $type->name }}</label>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                            {{--<input type="" name="type" value="{{ request()->query() }}">--}}
                                        </div>
                                    </div>
                                    <div class="pt-3">
                                        <button class="btn btn-danger btn-filter m-0" type="submit">Применить</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                        <div class="px-0" id="pick">
                            {{--@dd($items)--}}
                        @foreach($items as $item)
                            @if(count($item->products))
                        <div class="mobile-bar d-md-none d-block" id="mobile-bar-{{$loop->index}}" style="max-width: none!important; overflow-x: auto; width:100%;">
                            <div class="text-white mt-2 pl-2" style="width:max-content;">
                                <?php
                                    $id = $loop->index;
                                ?>
{{--                                @dd(request()->query())--}}
                                @if(request()->query('type') == 'category')
                                @foreach(\App\Category::all() as $category2)
                                    {{--@if(count($category->products))--}}
                                    <a href="#mobile-bar-{{$loop->index }}" class="cat-points point {{ $item->id == $category2->id ? 'choice' : ''}}" id="{{ $item->id == $category2->id ? $id : ''}}">{{ $category2->name }}</a>
                                    {{--@endif--}}
                                @endforeach
                                @else
                                @foreach(\App\Type::all() as $category2)
                                            {{--@if(count($category->products))--}}
                                            <a href="#mobile-bar-{{$loop->index }}" class="cat-points point {{ $item->id == $category2->id ? 'choice' : ''}}" id="{{ $item->id == $category2->id ? $id : ''}}">{{ $category2->name }}</a>
                                            {{--@endif--}}
                                @endforeach
                                @endif
                            </div>
                        </div>
                                {{--@dd($tipers)--}}
                            @foreach($item->products as $product)
                                @if(request()->query('type') == 'category')
                                @if(count($tipers))
                                    @foreach($tipers as $tiper)
                                        @if($product->types->contains($tiper->id))
                                                    @include('_partials.product_card_mobile')
                                        @endif
                                    @endforeach
                                @else
                                            @include('_partials.product_card_mobile')
                                @endif
                                    @elseif(request()->query('type') == 'type')
                                    @if(count($tipers))
                                        @foreach($tipers as $tiper)
                                            @if($product->categories->contains($tiper->id))
                                                    @include('_partials.product_card_mobile')
                                            @endif
                                        @endforeach
                                    @else
                                                @include('_partials.product_card_mobile')
                                    @endif
                                @endif
                            @endforeach
                            @endif
                        @endforeach
                        </div>
            </div>
        </div>
    </div>
    @if(isset($pos))
        <div id="pos" data-parent="{{$pos}}" style="display:none;"></div>
    @endif

    @foreach($items as $item)
        @foreach($item->products as $product)
            @include('modals.product')
        @endforeach
    @endforeach
@push('scripts')
    <script>
        $(document).ready(function () {
            let count = {{ count($items) }};
            // console.log($('#4').length);
            for (let i = 0; i < count; i++)
            {

                if($('#' + i).length == 1)
                {
                let check = $('#' + i).offset().left;
                $('#mobile-bar-' + i).scrollLeft(check -15);
            }
            }
        })
    </script>
    @if(isset($pos))
    <script>
        $(document).ready(function () {
            let pos = $('#pos').data('parent');
            let check = $('#mobile-bar-' + pos).offset().top;
            window.scrollTo(0,check-40);
            // console.log(check);
        })
    </script>
    @endif

@endpush
@endsection

