<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/cart.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-material-datetimepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    @stack('styles')
</head>
<body>

@include('_partials.header')

    <div id="app">
        <main class="py-0 position-relative">
            @yield('content')
        </main>
    </div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/owl.carousel.js') }}"></script>
<script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap-material-datetimepicker.js') }}"></script>
@stack('scripts')
<script>
    $('.empty-like').on('click', function (e) {
        e.preventDefault();
        let btn = $(e.currentTarget);
        let id = btn.data('id');
        if(btn.hasClass('like'))
        {
            btn.removeClass('like');
            console.log(1);
            $.ajax({
                url: 'unliked',
                method: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id,
                },
                success: data => {
                    console.log("like");
                },
                error: () => {
                    console.log(" fucking shit!");
                }
            })
        }
        else if(!btn.hasClass('like'))
        {
            btn.addClass('like');
            console.log(0);
            $.ajax({
            url: 'liked',
            method: 'POST',
            data: {
            "_token": "{{ csrf_token() }}",
                "id": id,
            },
            success: data => {
            console.log("like");
            },
            error: () => {
            console.log(" fucking shit!");
            }
            })

        }
    })
</script>
<script>
    $('#time').click( function () {
        let status = $('#time').is(':checked') ? true : false;
        console.log(status);
        if(status == true)
        {
            $('#dtime').show(300);
        }
        else
        {
            $('#dtime').hide(300);
        }
    });

</script>
<script>
    $(document).ready(function() {
        $('.date-format').bootstrapMaterialDatePicker({minDate : new Date(), format : 'dddd DD MMMM YYYY - HH:mm' });
    });
</script>
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
<script>
    let token = "{{ Session::has('token') ? Session::get('token') : uniqid() }}";

    let url = $('.cart').attr('href');
    url += '?token=' + token;
    $('.cart').attr('href', url);

    function fetchCart() {
        $.ajax({
            url: '{{ route('cart.index') }}',
            data: {
                token: token
            },
            success: data => {
                console.log(data);
                let result = freshCartHtml(data.html, data.total, data.totalprice);
                result.find('.buy_book').each((index, item) => {
                    registerCartBuyButtons($(item));
                });
                result.find('.remove_book').each((index, item) => {
                    registerCartRemoveButtons($(item));
                });
                result.find('.delete_book').each((index, item) => {
                    registerCartDeleteButtons($(item));
                });
            },
            error: () => {
                console.log('error');
            }
        });
    }

    function registerCartBuyButtons(data) {

        data.click(e => {
            e.preventDefault();
            console.log('registered');

            let btn = $(e.currentTarget);
            let id = btn.data('id');
            let cart = null;

            $.ajax({
                url: '{{ route('cart.add') }}',
                data: {
                    product_id: id,
                    count: 1,
                    token: token
                },
                success: data => {
                    btn.addClass('btn-success').delay(2000).queue(function(){
                        btn.removeClass("btn-success").dequeue();
                    });
                    $('.carts').addClass('btn-success');
                    doBounce($('.cart-count'), 3, '5px', 90);
                    cart = fetchCart();
                },
                error: () => {
                    console.log('error');
                }
            });
        });
    }
    function doBounce(element, times, distance, speed) {
        for(var i = 0; i < times; i++) {
            element.animate({marginTop: '-='+distance}, speed)
                .animate({marginTop: '+='+distance}, speed);
        }
    }
    function registerCartRemoveButtons(data) {

        data.click(e => {
            e.preventDefault();
            console.log('registered');

            let btn = $(e.currentTarget);
            let id = btn.data('id');
            let cart = null;

            $.ajax({
                url: '{{ route('cart.remove') }}',
                data: {
                    product_id: id,
                    count: 1,
                    token: token
                },
                success: data => {
                    cart = fetchCart();
                },
                error: () => {
                    console.log('error');
                }
            });
        });
    }

    function registerCartDeleteButtons(data) {

        data.click(e => {
            e.preventDefault();
            console.log('registered');

            let btn = $(e.currentTarget);
            let id = btn.data('id');
            let cart = null;

            $.ajax({
                url: '{{ route('cart.delete') }}',
                data: {
                    product_id: id,
                    token: token
                },
                success: data => {
                    cart = fetchCart();
                },
                error: () => {
                    console.log('error');
                }
            })
        });
    }

    $('.buy_book').each((index, item) => {
        registerCartBuyButtons($(item));
    });

    $('.remove_book').each((index, item) => {
        registerCartRemoveButtons($(item));
    });

    $('.delete_book').each((index, item) => {
        registerCartDeleteButtons($(item));
    });

    function freshCartHtml(html, total, totalprice) {
        total > 0 ? $('.cart-count').addClass('d-flex').html(total) : $('.cart-count').addClass('d-flex').html(total);
        totalprice > 0 ? $('.cart-total').addClass('d-flex').html(totalprice + ' сом') : $('.cart-total').addClass('d-flex').html(totalprice + ' сом');
        return $('.modal-body-cart').html(html);
    }

    fetchCart();

    // $('.cart').click(e => {
    //     e.preventDefault();
    //     $('#cart-modal').modal('show');
    //     // freshCartHtml(fetchedCart);
    // });


</script>
<script>
    var owl = $('.owl-one');
    owl.owlCarousel({
        margin: 10,
        loop: true,
        // autoplay:true,
        // autoplayTimeout:5000,
        // autoplaySpeed: 1500,
        // autoplayHoverPause:true,
        responsive: {
            0: {
                items: 2
            },
            700: {
                items: 8
            }
        }
    })
</script>
<script>
    function openNav() {
        document.getElementById("mySidenav").style.right = "0px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.right = "-380px";
    }
</script>
</body>
</html>
