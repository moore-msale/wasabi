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

<div class="container" style="height:90vh;">
    <div class="row py-5 justify-content-center h-100 align-items-center">
        <div class="text-center">
        <h2 class="text-white">
            Рассылка отправленна успешно!
        </h2>
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
            window.location.href = "{{route('massmail')}}";
        }
    </script>
@endpush
@endsection