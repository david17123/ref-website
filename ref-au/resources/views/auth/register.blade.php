@extends('defaultLayout')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ elixir('css/auth/loginRegister.css') }}"/>
@endpush

@section('pageContent')
    <form class="login-form" action="{{ url('/register') }}" method="POST">
        {{ csrf_field() }}

        <div class="form-element">
            <label class="form-element__label" for="name">Name</label>

            <div class="form-element__input-field">
                <input id="name" type="text" class="input-text{{ $errors->has('name') ? ' input-text--error' : '' }}" name="name" value="{{ old('name') }}" placeholder="John Sample">

                @if ($errors->has('name'))
                    <span class="form-element__error-message">
                        {{ $errors->first('name') }}
                    </span>
                @endif
            </div>
        </div>

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
            <label class="form-element__label" for="password-confirm">Confirm Password</label>

            <div class="form-element__input-field">
                <input id="password-confirm" class="input-text{{ $errors->has('password_confirmation') ? ' input-text--error' : '' }}" type="password" name="password_confirmation" placeholder="Retype password">

                @if ($errors->has('password_confirmation'))
                    <span class="form-element__error-message">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-element form-element--buttons-container">
            <button class="form-element__button" type="submit">Register</button>
        </div>
    </form>
@endsection
