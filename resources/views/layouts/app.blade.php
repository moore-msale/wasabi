<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <title>Wasabi суши - меню «Wasabi» создается большой командой профессионалов во главе с бренд-шефом</title>
    <meta name="description" content="Доставка суши и роллов в Бишкеке. Всегда только свежие продукты.">
    <meta name="keywords" content="суши, суши бишкек, роллы, роллы бишкек, японская кухня бишкек, японская кухня, суши весла, суши рум, фрешбокс, империя пиццы, империя суши, две палочки, суши роллы, суши роллы бишкек, доставка суши, доставка суши круглосуточно, бишкек, доставка суши бишкек, доставка еды бишкек, суши роллы бишкек, суши роллы, васаби, васаби суши, васаби суши бишкек, суши васаби, суши маркет, суши маркет бишкек" />
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
    <style>
        body
        {
            background-color:black;
        }
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            /*background-color:grey;*/
            background-color: #000000 ;
            background-repeat: no-repeat;
            background-size: cover;
            /*background-color: #FFF;*/
            background-position: center;
        }
    </style>
    @stack('styles')
</head>
<body>
@include('alertify::alertify')
<div class="preloader">
    <img style="position: absolute; top:50%; left:50%; transform: translate(-50%, -50%);" class="img-fluid" src="{{ 'images/logo.png' }}" alt="">
</div>
@include('_partials.header')

    <div id="app">
        <main class="py-0 position-relative pt-lg-0 pt-5">
            @yield('content')
        </main>
    </div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/owl.carousel.js') }}"></script>
<script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap-material-datetimepicker.js') }}"></script>
<script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>
@stack('scripts')
<script>
    $(document).ready(function() {
        $('.preloader').fadeOut('slow').delay(500);
    });
</script>
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
                    console.log("");
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
            console.log("");
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
    $('.close-nav').on('click', function () {
        document.getElementById("mySidenav").style.left = "-16.6%";
        setTimeout(function () {
            $('.close-nav').hide(100);
            $('.open-nav').show(100);
            document.getElementById("content-blog").style.width = "98%";
            $('.collona-product').addClass('full');
            $('.collona-product').removeClass('short');
        },300);
        $('#content-blog').addClass('fader');
            setTimeout(function() {


                $('#content-blog').removeClass("fader");
            }, 600);
            // $('#content-blog').removeClass('fader');

    });
    $('.open-nav').on('click', function () {
        document.getElementById("mySidenav").style.left = "0%";
        $('.close-nav').show(100);
        $('.open-nav').hide(100);
        setTimeout(function () {
            document.getElementById("content-blog").style.width = "82.3%";
            $('.collona-product').addClass('short');
            $('.collona-product').removeClass('full');
        },300);
        $('#content-blog').addClass('fader');
        setTimeout(function () {


            $('#content-blog').removeClass("fader");
        },600);


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
                let result = freshCartHtml(data.html, data.total, data.totalprice, data.modalhtml);
                result.forEach( function (element) {
                    element.find('.buy_book').each((index, item) => {
                        registerCartBuyButtons($(item));
                    });
                    element.find('.remove_book').each((index, item) => {
                        registerCartRemoveButtons($(item));
                    });
                    element.find('.delete_book').each((index, item) => {
                        registerCartDeleteButtons($(item));
                    });
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

            // console.log(parseInt(count) + 1);

            $.ajax({
                url: '{{ route('cart.add') }}',
                data: {
                    product_id: id,
                    count: 1,
                    token: token
                },
                success: data => {
                    // btn.addClass('btn-success').delay(2000).queue(function(){
                    //     btn.removeClass("btn-success").dequeue();
                    // });
                    let count = $('.counter-' + btn.data('id')).html();

                    $('.counter-' + btn.data('id')).html(parseInt(count) + 1);
                    // $('.carts').addClass('btn-success');
                    // doBounce($('.cart-count'), 3, '5px', 90);
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
                    let count = $('.counter-' + btn.data('id')).html();
                    if(parseInt(count) != 0)
                    {
                        $('.counter-' + btn.data('id')).html(parseInt(count) - 1);
                        console.log(parseInt(count) + 1);
                    }
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

    function freshCartHtml(html, total, totalprice, modalhtml) {
        total > 0 ? $('.cart-count').addClass('d-flex').html(total) : $('.cart-count').addClass('d-flex').html(total);
        totalprice > 0 ? $('.cart-total').addClass('d-flex').html(totalprice + ' сом') : $('.cart-total').addClass('d-flex').html(totalprice + ' сом');

        console.log([$('.modal-body-cart').html(html), $('.modal-cart').html(modalhtml)]);
        return [$('.modal-body-cart').html(html), $('.modal-cart').html(modalhtml)];
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
                items: 7
            }
        }
    })
</script>
<script>
    var owl = $('.owl-two');
    owl.owlCarousel({
        margin: 10,
        loop: true,
        autoplay:true,
        autoplayTimeout:10000,
        // autoplaySpeed: 1500,
        // autoplayHoverPause:true,
        responsive: {
            0: {
                items: 1
            }
        }
    })
</script>
<script>
    function openNav() {
        document.getElementById("mySidenav").style.right = "0px";
        $('.open-sidebar').hide();
        $('.close-sidebar').show();
    }

    function closeNav() {
        document.getElementById("mySidenav").style.right = "-100%";
        $('.open-sidebar').show();
        $('.close-sidebar').hide();
    }
</script>


<script type="text/javascript">
    $(document).ready(function(){
        $("#pick").on("click","a", function (event) {
            event.preventDefault();
            var id  = $(this).attr('href'),
                top = $(id).offset().top;
            $('body,html').animate({scrollTop: top}, 500);
        });
    });
</script>{{--<script>--}}
    {{--$('.buy_book').on('click', function (e) {--}}
        {{--let btn = $(e.currentTarget);--}}
        {{--let count = $('.counter-' + btn.data('id')).html();--}}
        {{--$('.counter-' + btn.data('id')).html(parseInt(count) + 1);--}}
        {{--console.log(parseInt(count) + 1);--}}
    {{--})--}}
{{--</script>--}}
{{--<script>--}}
    {{--$('.remove_book').on('click', function (e) {--}}
        {{--let btn = $(e.currentTarget);--}}
        {{--let count = $('.counter-' + btn.data('id')).html();--}}
        {{--if(parseInt(count) != 0)--}}
        {{--{--}}
            {{--$('.counter-' + btn.data('id')).html(parseInt(count) - 1);--}}
            {{--console.log(parseInt(count) + 1);--}}
        {{--}--}}

    {{--})--}}
{{--</script>--}}

</body>
</html>
