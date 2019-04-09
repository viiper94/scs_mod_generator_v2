@extends('layout.app')

@section('content')

    <div class="flex-center" style="flex: 1; align-items: center; flex-direction: column;">
        <div class="card" style="width: 450px;">
            <form method="POST" action="{{route('password.email')}}">
                @csrf
                <div class="card-content">
                    <div class="row">
                        <h5 class="card-title center">@lang('user.reset_password')</h5>
                        @if (session('status'))
                            <h6 class="center">{{ session('status') }}</h6>
                        @endif
                    </div>
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
                </div>
                <div class="card-action">
                    <div class="row no-margin">
                        <button type="submit" class="mdc-button mdc-button--unelevated col s12"><b>@lang('user.submit_password_reset')</b></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
