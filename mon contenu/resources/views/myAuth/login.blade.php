@extends('layouts.authentication')

@section('content')
    <form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
        <span class="login100-form-title">{{__('Member Login')}}</span>
        @csrf
        <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
            {{--<input class="input100" type="text" name="email" placeholder="Email">--}}
            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror input100" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>
            <span class="focus-input100"></span>
            <span class="symbol-input100"><i class="fa fa-envelope" aria-hidden="true"></i></span>
            @error('email')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        <div class="form-group row ">
            <div class="wrap-input100 validate-input" data-validate = "Password is required">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror input100" name="password" required autocomplete="current-password" placeholder="{{__('Password')}}">
                <span class="focus-input100"></span>
                <span class="symbol-input100"><i class="fa fa-lock" aria-hidden="true"></i></span>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group row mb-0">
            <div class="container-login100-form-btn">
                <button type="submit" class="btn btn-primary login100-form-btn">
                    {{ __('Login') }}
                </button>
            </div>
        </div>
        <div class="text-center p-t-12">
            @if (Route::has('password.request'))
                <a class="btn btn-link txt2" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
            @if (Route::has('register'))
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
        </div>
    </form>
@endsection
