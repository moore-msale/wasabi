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
</head>
<body class="vh-100">

<div id="app" class="vh-100">
    <main style="background-image: url({{ asset('images/mainbg.png') }}); background-position: center; background-repeat: no-repeat; background-size: cover;" class="py-0 vh-100">
        <div class="container">
            <div class="row align-items-center justify-content-center vh-100">
                <div class="col-auto text-light text-center">
                    <img src="{{ asset('images/logo.png') }}" alt="">
                    <h1 class="font-weight-bold mt-4">Сайт находится в стадии разработки</h1>
                    <p class="lead mt-3">Подождите немного</p>
                </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>
