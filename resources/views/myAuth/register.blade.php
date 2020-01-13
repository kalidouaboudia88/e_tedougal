@extends('layouts.authentication')
@section('content')
    <form method="POST" action="{{ route('register') }}" class="login100-form validate-form">
        <div class="card-header login100-form-title">{{ __('Register') }}</div>
        @csrf
        <div class="wrap-input100 validate-input">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror input100" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="{{__('name')}}">
            <span class="focus-input100"></span><span class="symbol-input100"><i class="fa fa-envelope" aria-hidden="true"></i></span>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="wrap-input100 validate-input">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror input100" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('E-Mail Address') }}">
                <span class="focus-input100"></span><span class="symbol-input100"><i class="fa fa-at" aria-hidden="true"></i></span>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
        <div class="wrap-input100 validate-input">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror input100" name="password" required autocomplete="new-password" placeholder="{{__('Password')}}">
            <span class="focus-input100"></span><span class="symbol-input100"><i class="fa fa-user-lock" aria-hidden="true"></i></span>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="wrap-input100 validate-input">
                <input id="password-confirm" type="password" class="form-control input100" name="password_confirmation" required autocomplete="new-password" placeholder="{{__('Confirm Password')}}"><span class="focus-input100"></span><span class="symbol-input100"><i class="fa fa-user-lock" aria-hidden="true"></i></span>
        </div>

        <div class="form-group row mb-0">
            <div class="container-login100-form-btn">
                <button type="submit" class="btn btn-primary login100-form-btn">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
        <div class="text-center p-t-12">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </div>
    </form>

@endsection
