@extends('layout.app')

@section('content')

    <div class="flex-center" style="flex: 1; align-items: center; flex-direction: column;">
        <div class="card" style="max-width: 450px;">
            <form method="POST" action="{{route('login')}}">
                @csrf
                <div class="card-content">
                    <div class="row"><h5 class="card-title center">@lang('user.login')</h5></div>
                    <div class="row">
                        <div class="input-field col s12 no-margin">
                            <i class="material-icons prefix">mail_outline</i>
                            <input id="email" type="email" name="email" @if($errors->has('email'))class="invalid" @endif value="{{ old('email') }}" required>
                            <label for="email">@lang('user.email')</label>
                            @if($errors->has('email'))
                                <span class="helper-text" data-error="{{ $errors->first('email') }}" data-success=""></span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 no-margin">
                            <i class="material-icons prefix">lock_outline</i>
                            <input id="password" type="password" name="password" @if($errors->has('password'))class="invalid" @endif required>
                            <label for="password">@lang('user.password')</label>
                            @if($errors->has('password'))
                                <span class="helper-text" data-error="{{ $errors->first('password') }}" data-success=""></span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <p style="margin-left: 1.1rem;">
                            <label>
                                <input type="checkbox" class="filled-in" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <span>@lang('user.remember_me')</span>
                            </label>
                        </p>
                    </div>
                </div>
                <div class="card-action">
                    <div class="row no-margin">
                        <button type="submit" class="mdc-button mdc-button--raised mdc-ripple col s12"><b>@lang('user.login')</b></button>
                        <div class="input-field col s12 center">
                            <a href="{{ route('password.request') }}" class="no-margin">@lang('user.forgot_password')</a>
                        </div>
                        <div class="input-field col s12">
                            <p class="center">@lang('user.dont_have_account') <a href="{{ route('register') }}" class="no-margin">@lang('user.register')</a></p>
                        </div>
                    </div>
                </div>
                <div class="card-action center">
                    <a href="{{ route('auth.steam') }}" class="mdc-button mdc-button--raised mdc-ripple social-login-btn social-login-btn_steam"></a>
                    <a href="#" class="mdc-button mdc-button--raised mdc-ripple social-login-btn social-login-btn_google"></a>
                </div>
            </form>
        </div>
    </div>

@endsection
