@extends('layouts.app')
@push('styles')
    <style>
        body
        {
            background-image: url({{ asset('images/mainbg.png') }});
            background-size:cover;
        }
    </style>
@endpush
@section('content')


    <div class="container">
        <div class="row justify-content-center align-items-center" style="height:90vh;">
            <div class="text-center">
            <h2 class="text-white">
                Спасибо {{$user['name']}}! ваш заказ оформлен!
            </h2>
                <h4 class="text-white">
                    Наш оператор свяжется с вами в ближайшее время.
                </h4>
                <i class="far fa-check-circle fa-4x mt-3" style="color:#69ff5b;"></i>
            </div>

        </div>
    </div>


    @push('scripts')
        <script>
            $(document).ready(function () {
                setTimeout(redirector, 10000);
            });
        </script>
        <script>
            function redirector() {
                console.log(1);
                window.location.href = "/";
            }
        </script>
    @endpush
@endsection