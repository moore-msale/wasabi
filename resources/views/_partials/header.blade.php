<nav class="navbar navbar-expand-md black shadow-sm" id="menu">
    <div class="container-fluid">
        <span class="mr-4 d-lg-none d-block" onclick="openNav()">
  <img src="{{ asset('images/burger.png') }}" alt="">
        </span>
        <a class="navbar-brand d-lg-block d-none" href="{{ url('/home') }}">
            <img class="img-fluid" src="{{ asset('images/logo.png') }}" alt="">
        </a>
        <a class="w-auto d-lg-none d-block" href="{{ url('/home') }}">
            <img class="w-75" src="{{ asset('images/logo.png') }}" alt="">
        </a>
        {{--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
            {{--<span class="navbar-toggler-icon"></span>--}}
        {{--</button>--}}

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <div class="navbar-nav mr-auto d-lg-block d-none">
                <a href="tel:996 0505 41 07 07">
                <img class="img-fluid mr-2 ml-5" src="{{ asset('images/phone.svg') }}" alt=""><span class="menu-phone">+996 (0505) 410 707</span>
                </a>
            </div>

            <ul class="navbar-nav mx-auto">
                <li class="mx-3">
                    <a class="point" href="/stock">
                    Акции
                    </a>
                </li>
                <li class="mx-3">
                    <a class="point" href="{{ route('about_us') }}">
                    О нас
                    </a>
                </li>
                <li class="mx-3">
                    <a class="point" href="/delivery">
                    Доставка
                    </a>
                </li>
                @guest
                    <li class="mx-3">
                       <a class="point" href="{{ route('login') }}"> <i class="fas fa-user pr-2"></i>{{ __('ВХОД') }}</a>
                    </li>
                    {{--@if (Route::has('register'))--}}
                        {{--<li class="nav-item">--}}
                            {{--<a class="nav-link" href="{{ route('register') }}">{{ __('РЕГИСТРАЦИЯ') }}</a>--}}
                        {{--</li>--}}
                    {{--@endif--}}
                @else
                    <li class="nav-item dropdown mx-3">
                        <a id="navbarDropdown" class="point dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fas fa-user pr-2"></i>{{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('profile') }}">
                                {{ __('Личный кабинет') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Выйти') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item px-3 mr-4 pt-1 position-relative mx-2">
                    <a href="{{ route('cart.checkout') }}" class="text-fut-book cart d-flex align-items-center" style="text-decoration: none; color: #444444;">
                        {{--<div class="badge badge-danger rounded-circle small shadow position-absolute cart-count justify-content-center align-items-center" style="width: 21px; height: 21px;top: -7px; right: 5px;"></div>--}}
                        {{--<i style="color: #444;" class="fas carts fa-cart-plus fa-lg icon-flip"></i>--}}
                        <img class="icon-flip" style="color: white; height:28px; width: 28px; margin-top:-5px;" src="{{ asset('images/cart.svg') }}" alt="">
                        <div class="bg-danger py-2 px-3 ml-3 text-white cart-count" style="border-radius: 2px 0px 0px 2px;">

                        </div>
                        <div class="bg-dark py-2 px-3 text-white cart-total" style="border-radius: 0px 2px 2px 0px;">
                        </div>
                    </a>
                </li>
                <li class="nav-item dropdown d-none mx-2 ">
                    <a class="nav-link text-light align-self-center dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{strtoupper(App::getLocale())}}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="">
                            EN
                        </a>
                        <a class="dropdown-item" href="">
                            RU
                        </a>
                    </div>
                </li>
            </ul>
        </div>
        @if($agent->isPhone())

            @guest
                <span class="mx-1">
                    <a class="point" style="" href="{{ route('login') }}"> <i class="fas fa-user fa-lg pr-2"></i></a>
                </span>
                {{--@if (Route::has('register'))--}}
                {{--<li class="nav-item">--}}
                {{--<a class="nav-link" href="{{ route('register') }}">{{ __('РЕГИСТРАЦИЯ') }}</a>--}}
                {{--</li>--}}
                {{--@endif--}}
            @else
                <span class="nav-item dropdown mx-1">
                    <a id="navbarDropdown" class="point dropdown-toggle mobile-avatar" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="fas fa-user fa-lg pr-2"></i><span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('profile') }}">
                            {{ __('Личный кабинет') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Выйти') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </span>
            @endguest
                <li class="position-relative mx-1">
                    <a href="{{ route('cart.checkout') }}" class="text-fut-book cart d-flex align-items-center" style="text-decoration: none; color: #444444;">
                        <div class="text-white cart-total pr-1" style="font-size: 13px; transform: translateY(-10px)"></div>
                        <div class="badge badge-danger rounded-circle small shadow position-absolute cart-count justify-content-center align-items-center" style="width: 21px; height: 21px;top: -7px; right: -12px;"></div>
                        {{--<i style="color: #444;" class="fas carts fa-cart-plus fa-lg icon-flip"></i>--}}
                        <img class="icon-flip" style="color: white; height:22px; width: 22px; margin-top:-23px;" src="{{ asset('images/cart.svg') }}" alt="">
                        {{--<div class="bg-danger py-2 px-3 ml-3 text-white cart-count" style="border-radius: 2px 0px 0px 2px;">--}}

                        {{--</div>--}}
                        {{--<div class="bg-dark py-2 px-3 text-white cart-total" style="border-radius: 0px 2px 2px 0px;">--}}
                        {{--</div>--}}
                    </a>
                </li>

        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <ul class="nav nav-tabs picker" id="myTab" role="tablist">
                    <li class="nav-item bg-dark w-50 text-center">
                        <a class="nav-link active py-3 mb-0 point border-0 text-white" id="category-tab" data-toggle="tab" href="#category" role="tab" aria-controls="home" aria-selected="true">КАТЕГОРИИ</a>
                    </li>
                    <li class="nav-item w-50 bg-dark text-center">
                        <a class="nav-link py-3 mb-0 point border-0 text-white" id="ingredient-tab" data-toggle="tab" href="#ingredient" role="tab" aria-controls="profile" aria-selected="false">ИНГРЕДИЕНТЫ</a>
                    </li>
                </ul>
                <div class="sidebar">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="category" role="tabpanel" aria-labelledby="home-tab">
                            @foreach(\App\Category::all() as $category)
                                {{--@if(count($category->products))--}}
                                <a href="{{ route('catalog_m',array('pos' => $loop->index, 'type' => 'category')) }}">
                                    <div class="p-3 my-1" {{--style="background: linear-gradient(180deg, #242424 0%, #333333 53.12%, #242424 100%);"--}}>
                                        <img class="img-fluid" style="width:70px;" src="{{ asset('storage/'.$category->image) }}" alt=""><span class="pl-4 point">{{ $category->name }}</span>
                                    </div>
                                </a>
                                {{--@endif--}}
                            @endforeach
                        </div>
                        <div class="tab-pane fade" id="ingredient" role="tabpanel" aria-labelledby="profile-tab">
                            @foreach(\App\Type::all() as $type)
{{--                                @if(count($type->products))--}}
                                <a href="{{ route('catalog_m',array('pos' => $loop->index, 'type' => 'type')) }}">
                                    <div class="p-3 my-1" {{--style="background: linear-gradient(180deg, #242424 0%, #333333 53.12%, #242424 100%);"--}}>
                                        <img class="img-fluid" style="width:70px;" src="{{ asset('storage/'.$type->image) }}" alt=""><span class="pl-4 point">{{ $type->name }}</span>
                                    </div>
                                </a>
                                {{--@endif--}}
                            @endforeach
                        </div>
                    </div>
            </div>
        </div>
            @endif
    </div>
</nav>
