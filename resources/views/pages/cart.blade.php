{{--@dd($total)--}}
    <?php
    $agent = New \Jenssegers\Agent\Agent();
    ?>

    <div class="container-fluid">
        @if(count($cartItems))
        <div class="row justify-content-end">
    @if(!$agent->isPhone())
        @include('_partials.sidebar')
    @endif
            <div class="p-lg-5 p-0 content-blog pb-lg-0 pb-5" id="content-blog">
                <div class="py-4 px-lg-5 px-2">
                    <div class="px-0 mb-3">
                        <h2 class="catalog-header text-white font-weight-bold text-uppercase pb-4">Корзина заказа</h2>
                        @foreach($cartItems as $item)
                            {{--@dd($item->attributes[0])--}}
                        @if(!$agent->isPhone())
                            <div class="row p-1 bg-dark mt-1">
                                <div class="col-lg-2 col-4">
                                    <div class="basket-image w-100" style="background-image: url({{ asset('storage/'.str_replace('\\', '/', $item->attributes[0])) }})">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-3 d-flex align-items-center">
                                    <span class="product-header text-white font-weight-bold">
                                        {{ $item->name }}
                                    </span>
                                </div>
                                <div class="col-lg-2 col-md-3 col-6 my-3 my-md-0">
                                    <div class="d-flex ml-auto ml-md-0 justify-content-between align-items-center h-100">
                                        <span class="pointer cart-btn rounded-circle shadow p-2 remove_book d-flex justify-content-center align-items-center" data-id="{{ $item->id }}">-</span>
                                        <span class="mx-2 text-white">{{ $item->quantity }}</span>
                                        <span class="pointer cart-btn rounded-circle shadow buy_book p-2 d-flex justify-content-center align-items-center" data-id="{{ $item->id }}">+</span>
                                    </div>
                                </div>
                                <div class="col-2 d-lg-block d-none"></div>
                                <div class="col-lg-2 col-2 d-flex align-items-center">
                                    <span class="product-price text-white font-weight-bold">
                                        {{ $item->price }} сом
                                    </span>
                                </div>
                                <div class="col-1 d-flex align-items-center">
                                    <span class="product-price text-white font-weight-bold delete_book" data-id="{{ $item->id }}" style="cursor: pointer;">
                                        <i class="fas fa-times"></i>
                                    </span>
                                </div>
                            </div>
                            @else
                                @include('_partials.mobile_cart')
                            @endif
                            @endforeach
                    </div>

                    <p class="product-header text-white float-right font-weight-bold">
                        Итого: <span class="ml-2"> {{ $total }} сом</span>
                    </p>
                    <div class="mt-5 pt-5">
                        <a href="{{ route('cart.checkout', ['token' => Session::has('token') ? Session::get('token') : uniqid(), 'continue' => true]) }}">
                        <button class="btn btn-danger text-white float-right">
                            Оформить заказ <i class="fas fa-long-arrow-alt-right ml-2"></i>
                        </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @else
            @if(!$agent->isPhone())
                @include('_partials.sidebar')
            @endif
            <div class="row justify-content-center align-items-center" style="height:80vh;">
                <div class="text-center">
                <p class="h3 text-white">Корзина пуста!</p>
                    @if(!$agent->isPhone())
                <div class="col-12"></div>
                <a href="{{ route('catalog',array('category' => 1)) }}">
                <button class="btn btn-danger text-white float-right mt-4">
                    Перейти в корзину <i class="fas fa-long-arrow-alt-right ml-2"></i>
                </button>
                </a>
                        @else
                        <div class="col-12"></div>
                        <a href="{{ route('catalog_m',array('pos' => 0, 'type' => 'category')) }}">
                            <button class="btn btn-danger text-white float-right mt-4">
                                Перейти в корзину <i class="fas fa-long-arrow-alt-right ml-2"></i>
                            </button>
                        </a>
                    @endif
                </div>

            </div>
        @endif
    </div>

<script>
    $('.close-nav').click( function () {
        document.getElementById("mySidenav").style.left = "-16.6%";
        $('.close-nav').hide(100);
        $('.open-nav').show(100);
        document.getElementById("content-blog").style.width = "98%";
        $('.collona-product').addClass('full');
        $('.collona-product').removeClass('short');
    });
    $('.open-nav').click( function () {
        document.getElementById("mySidenav").style.left = "0%";
        $('.close-nav').show(100);
        $('.open-nav').hide(100);
        document.getElementById("content-blog").style.width = "82.3%";
        $('.collona-product').addClass('short');
        $('.collona-product').removeClass('full');

    });

</script>