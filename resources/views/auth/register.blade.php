@extends('layouts.app')
@push('styles')
    @push('styles')
        <style>
            body
            {
                background-image: url({{ asset('images/mainbg.png') }});
                background-size:cover;
            }
        </style>
    @endpush
@endpush
@section('content')
<div class="container" style="height:85vh;">
    <div class="row justify-content-center align-items-center h-100">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-white bg-danger text-center" style="font-size:25px;">{{ __('Регистрация') }}</div>

                <div class="card-body bg-dark">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="text-center">
                            <img class="py-4" src="{{ asset('images/logo.png') }}" alt="">
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right text-white">{{ __('Ваше имя') }}</label>

                            <div class="col-md-7">
                                <input placeholder="Имя" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right text-white">{{ __('Ваш Email') }}</label>

                            <div class="col-md-7">
                                <input placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right text-white">{{ __('Пароль') }}</label>

                            <div class="col-md-7">
                                <input placeholder="Пароль" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right text-white">{{ __('Подтвердите пароль') }}</label>

                            <div class="col-md-7">
                                <input placeholder="Подтвердите пароль" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-danger">
                                    {{ __('Отправить') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
