@extends('defaultLayout')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ elixir('css/auth/loginRegister.css') }}"/>
@endpush

@section('pageContent')
    <form class="login-form" action="{{ url('/login') }}" method="POST">
        {{ csrf_field() }}

        <div class="form-element">
            <label class="form-element__label" for="email">Email</label>

            <div class="form-element__input-field">
                <input id="email" class="input-text{{ $errors->has('email') ? ' input-text--error' : '' }}" type="email" name="email" value="{{ old('email') }}" placeholder="you@example.com">

                @if ($errors->has('email'))
                    <span class="form-element__error-message">
                        {{ $errors->first('email') }}
                    </span>
                @endif
            </div>
        </div>

        <div class="form-element">
            <label class="form-element__label" for="password">Password</label>

            <div class="form-element__input-field">
                <input id="password" class="input-text{{ $errors->has('password') ? ' input-text--error' : '' }}" type="password" name="password" placeholder="Password">

                @if ($errors->has('password'))
                    <span class="form-element__error-message">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-element">
            <input id="remember-me-checkbox" class="form-element__remember-checkbox" type="checkbox" name="remember">
            <label for="remember-me-checkbox" class="form-element__remember-label">Keep me logged in</label>
        </div>

        <div class="form-element form-element--buttons-container">
            <button class="form-element__button" type="submit">Login</button>
            <a class="form-element__link" href="{{ url('/password/reset') }}">Forgot password?</a>
        </div>
    </form>
@endsection
