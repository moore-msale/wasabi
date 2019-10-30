
    <?php
    $agent = New \Jenssegers\Agent\Agent();
    ?>

    <div class="container-fluid px-0">
        @if(count($cartItems))
                    <div class="py-4">
                        <div class="px-0 mb-3">
                            <h2 class="catalog-header text-white font-weight-bold text-uppercase pb-4 px-3">Ваш заказ</h2>
                            <div class="products-bar" style="overflow-y: auto; height:40vh;">
                            @foreach($cartItems as $item)
                                {{--@dd($item->attributes[0])--}}
                                <div class="col-lg-12 px-lg-4 p-1 bg-dark">
                                    <div class="row py-1">

                                        <div class="col-4 pl-0">
                                            <div class="d-flex align-items-center h-100">
                                            <span class="product-header text-white font-weight-bold">
                                                {{ $item->name }}
                                            </span>
                                            </div>
                                        </div>
                                        <div class="col-4 px-0">
                                            <div class="d-flex align-items-center h-100">
                                            <span class="product-price text-center text-white font-weight-bold">
                                                {{ $item->price }} сом
                                            </span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="d-flex align-items-center h-100">
                                                <div class="d-flex text-light mr-auto ml-md-0 justify-content-between align-items-center" style="width: 100px;">
                                                    <span class="pointer cart-btn rounded shadow-sm p-2 remove_book d-flex justify-content-center align-items-center" data-id="{{ $item->id }}">-</span>
                                                    <span class="mx-2 grey darken-4 d-flex justify-content-center align-items-center rounded p-2" style="width: 30px; height: 30px;">{{ $item->quantity }}</span>
                                                    <span class="pointer cart-btn rounded shadow-sm buy_book p-2 d-flex justify-content-center align-items-center" data-id="{{ $item->id }}">+</span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>

                        <p class="product-header text-white float-right font-weight-bold mr-4">
                            Итого: <span class="ml-2"> {{ $total }} сом</span>
                        </p>
                        <div class="mt-5 pt-5 pl-1">
                            @if(!$agent->isPhone())
                                <a href="{{ route('cart.checkout', ['token' => Session::has('token') ? Session::get('token') : uniqid()]) }}">
                                    <button class="w-100 mx-auto btn btn-danger text-white">
                                        Перейти в корзину <i class="fas fa-long-arrow-alt-right ml-2"></i>
                                    </button>
                                </a>
                            @else
                                <a class="w-100" href="{{ route('cart.checkout', ['token' => Session::has('token') ? Session::get('token') : uniqid()]) }}">
                                    <button class="w-100 btn btn-danger text-white mx-auto">
                                        Перейти в корзину <i class="fas fa-long-arrow-alt-right ml-2"></i>
                                    </button>
                                </a>
                            @endif
                        </div>
                    </div>
        @else
            <div class="row justify-content-center align-items-center" style="height:80vh;">
                <div class="text-center">
                    <p class="h3 text-white">Корзина пуста!</p>
                    @if(!$agent->isPhone())
                        <div class="col-12"></div>
                        <a href="{{ route('catalog',array('category' => 1)) }}">
                            <button class="btn btn-danger text-white float-right mt-4">
                                Перейти в каталог <i class="fas fa-long-arrow-alt-right ml-2"></i>
                            </button>
                        </a>
                    @else
                        <div class="col-12"></div>
                        <a href="{{ route('catalog_m',array('pos' => 0, 'type' => 'category')) }}">
                            <button class="btn btn-danger text-white float-right mt-4">
                                Перейти в каталог <i class="fas fa-long-arrow-alt-right ml-2"></i>
                            </button>
                        </a>
                    @endif
                </div>

            </div>
        @endif
    </div>