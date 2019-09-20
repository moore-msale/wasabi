<nav class="navbar navbar-expand-md black shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img class="img-fluid" src="{{ asset('images/logo.png') }}" alt="">
        </a>
        {{--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
            {{--<span class="navbar-toggler-icon"></span>--}}
        {{--</button>--}}

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <div class="navbar-nav mr-auto d-lg-block d-none">
                <img class="img-fluid mr-2 ml-5" src="{{ asset('images/phone.svg') }}" alt=""><span class="menu-phone">+996 (772) 123 456</span>
            </div>

            <ul class="navbar-nav mx-auto">
                <li class="mx-3">
                    <a class="point" href="">
                    Акции
                    </a>
                </li>
                <li class="mx-3">
                    <a class="point" href="{{ route('about_us') }}">
                    О нас
                    </a>
                </li>
                <li class="mx-3">
                    <a class="point" href="">
                    Доставка
                    </a>
                </li>
                @guest
                    <li class="mx-3">
                       <a class="point" href="{{ route('login') }}"> <img class="pr-2" src="{{ asset('images/login.svg') }}" alt="">{{ __('ВХОД') }}</a>
                    </li>
                    {{--@if (Route::has('register'))--}}
                        {{--<li class="nav-item">--}}
                            {{--<a class="nav-link" href="{{ route('register') }}">{{ __('РЕГИСТРАЦИЯ') }}</a>--}}
                        {{--</li>--}}
                    {{--@endif--}}
                @else
                    <li class="nav-item dropdown mx-3">
                        <a id="navbarDropdown" class="point dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                <li class="nav-item cart-info">
                    <span>1</span>
                    <span>1000 сом</span>
                </li>
                <li class="nav-item dropdown d-flex mx-2 ">
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
        <button class="hamburger" onclick="openNav()" type="button">
  <span class="hamburger-box">
    <span class="hamburger-inner"></span>
  </span>
        </button>
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
                            @for($i = 0; $i < 9; $i++)
                                <div class="p-3">
                                    <img class="img-fluid" style="width:70px;" src="{{ asset('images/category.png') }}" alt=""><span class="pl-4 point">РОЛЛЫ</span>
                                </div>
                            @endfor
                        </div>
                        <div class="tab-pane fade" id="ingredient" role="tabpanel" aria-labelledby="profile-tab">
                            @for($i = 0; $i < 9; $i++)
                                <div class="p-3">
                                    <img class="img-fluid" style="width:70px;" src="{{ asset('images/ingredient.png') }}" alt=""><span class="pl-4 point">ХРЕНЬ</span>
                                </div>
                            @endfor
                        </div>
                    </div>
            </div>
        </div>
            @endif
    </div>
</nav>
