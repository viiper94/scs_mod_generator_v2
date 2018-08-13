@extends('layout.app')

@section('content')

<div class="container flex-center" style="flex: 1; align-items: center; flex-direction: column;">
    <div class="card" style="max-width: 450px;">
        <form method="POST" action="{{route('register')}}">
            @csrf
            <div class="card-content">
                <div class="row"><h5 class="card-title center">@lang('user.register')</h5></div>
                <div class="row">
                    <div class="input-field col s12 no-margin">
                        <i class="material-icons prefix">person_outline</i>
                        <input id="name" type="text" name="name" @if($errors->has('name'))class="invalid" @endif value="{{ old('name') }}" required>
                        <label for="name">@lang('user.name')</label>
                        @if($errors->has('name'))
                            <span class="helper-text" data-error="{{ $errors->first('name') }}" data-success=""></span>
                        @endif
                    </div>
                </div>
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
                    <div class="input-field col s12 no-margin">
                        <i class="material-icons prefix">lock_outline</i>
                        <input id="password_confirmation" type="password" name="password_confirmation" required>
                        <label for="password_confirmation">@lang('user.confirm_password')</label>
                    </div>
                </div>
            </div>
            <div class="card-action">
                <div class="row no-margin">
                    <button type="submit" class="mdc-button mdc-button--raised mdc-ripple col s12"><b>@lang('user.register_now')</b></button>
                    <div class="input-field col s12">
                        <p class="center">@lang('user.already_have_account') <a href="{{ route('login') }}">@lang('user.login')</a></p>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
