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

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    @stack('styles')
</head>
<body>

@include('_partials.header')

    <div id="app">
        <main class="py-0">
            @yield('content')
        </main>
    </div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/owl.carousel.js') }}"></script>
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
