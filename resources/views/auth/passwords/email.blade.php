@extends('layout.app')

@section('content')

    <div class="flex-center" style="flex: 1; align-items: center; flex-direction: column;">
        <div class="card" style="width: 450px;">
            <form method="POST" action="{{route('password.email')}}">
                @csrf
                <div class="card-content">
                    <div class="row">
                        <h5 class="card-title center">@lang('user.reset_password')</h5>@if (session('status'))
                            <h6 class="center">{{ session('status') }}</h6>
                        @endif

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
                </div>
                <div class="card-action">
                    <div class="row no-margin">
                        <button type="submit" class="btn waves-effect col s12 yellow darken-1 black-text"><b>@lang('user.submit_password_reset')</b></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
