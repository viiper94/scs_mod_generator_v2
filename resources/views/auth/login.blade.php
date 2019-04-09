@extends('layout.app')

@section('content')

    <div class="flex-center" style="flex: 1; align-items: center; flex-direction: column;">
        <div class="card login" style="max-width: 450px;">
            <form method="POST" action="{{route('login')}}">
                @csrf
                <div class="card-content">
                    <div class="row"><h5 class="card-title center">@lang('user.login')</h5></div>
                    <div class="row no-margin">
                        <div class="mdc-text-field mdc-text-field--with-leading-icon mdc-text-field--outlined">
                            <i class="material-icons mdc-text-field__icon" tabindex="0" role="button">mail_outline</i>
                            <input type="email" id="email" class="mdc-text-field__input" name="email" value="{{ old('email') }}" required>
                            <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label for="email" class="mdc-floating-label">@lang('user.email')</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                            </div>
                        </div>
                        @if($errors->has('email'))
                            <div class="mdc-text-field-helper-line">
                                <div class="mdc-text-field-helper-text">{{ $errors->first('email') }}</div>
                            </div>
                        @endif
                    </div>
                    <div class="row no-margin">
                        <div class="mdc-text-field mdc-text-field--with-leading-icon mdc-text-field--outlined">
                            <i class="material-icons mdc-text-field__icon" tabindex="0" role="button">lock_outline</i>
                            <input type="password" id="password" class="mdc-text-field__input" name="password" required>
                            <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label for="password" class="mdc-floating-label">@lang('user.password')</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                            </div>
                        </div>
                        @if($errors->has('password'))
                            <div class="mdc-text-field-helper-line">
                                <div class="mdc-text-field-helper-text">{{ $errors->first('password') }}</div>
                            </div>
                        @endif
                    </div>
                    <div class="row no-margin">
                        <div class="mdc-form-field">
                            <div class="mdc-checkbox">
                                <input type="checkbox"
                                       class="mdc-checkbox__native-control"
                                       id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <div class="mdc-checkbox__background">
                                    <svg class="mdc-checkbox__checkmark"
                                         viewBox="0 0 24 24">
                                        <path class="mdc-checkbox__checkmark-path"
                                              fill="none"
                                              d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
                                    </svg>
                                    <div class="mdc-checkbox__mixedmark"></div>
                                </div>
                            </div>
                            <label for="remember">@lang('user.remember_me')</label>
                        </div>
                    </div>
                </div>
                <div class="card-action">
                    <div class="row no-margin">
                        <button type="submit" class="mdc-button mdc-button--unelevated col s12"><b>@lang('user.login')</b></button>
                        <a class="col s12 center" href="{{ route('password.request') }}">@lang('user.forgot_password')</a>
                        <p class="center col s12">@lang('user.dont_have_account')
                            <a href="{{ route('register') }}">@lang('user.register')</a>
                        </p>
                    </div>
                </div>
                <div class="card-action center">
                    <a href="{{ route('auth.steam') }}" class="mdc-button mdc-button--outlined social-login-btn social-login-btn_steam no-margin"></a>
                    <a href="{{ route('auth.google') }}" class="mdc-button mdc-button--outlined social-login-btn social-login-btn_google no-margin"></a>
                </div>
            </form>
        </div>
    </div>

@endsection
