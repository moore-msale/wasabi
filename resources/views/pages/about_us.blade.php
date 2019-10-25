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
    <div class="content-blog content-scroll" id="content-blog">
        <div class="container h-100-desk">
        <div class="row align-items-center justify-content-end h-100-desk">
            <div class="col-12 text-white ">
                <h2 class="pb-3">
                    Бренд суши маркета «Васаби» основан в Бишкеке в 2018 году друзьями Баймырза и Бакыт
                </h2>

                <p>
                    Меню «Васаби» создается большой командой профессионалов во главе с бренд-шефом. Ключевой особенностью концепции ресторана является обширное авторское меню, которое насчитывает более 100 позиций и регулярно обновляется. Особое внимание в «Васаби» уделяется качеству ингредиентов и технологиям приготовления.
                </p>
                <p>
                    Суши маркет Васаби выделяется своим простым интерьером, в которым мы постарались дать гостям максимум, что нужно для полноценного время провождения. Стены с иероглифами, стилизованные панно, большие столы — все сделано своими руками. Основные наши усилия мы делаем именно на кухню, так как считаем, что это наше достижение и наша гордость, которую мы с каждым разом поднимаем на новый уровень.
                </p>

            </div>
        </div>
        </div>
        @include('_partials.footer')
    </div>

    </div>
    </div>
@endsection
