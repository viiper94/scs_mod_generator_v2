@extends('layout.app')

@section('content')

    <div class="flex-center profile-container">
        <div class="card profile">
            <form action="{{route('save_profile')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-content">
                    <div class="row"><h5 class="card-title center">@lang('user.profile_edit')</h5></div>
                    <div class="row center">
                        <div class="img-wrapper col s12">
                            @if($user->image && file_exists(public_path('images/users/'.$user->image)))
                                <img src="{{ asset('images/users/'.$user->image) }}" class="img-responsive circle" style="height: 200px; width: 200px; object-fit: cover;">
                            @else
                                <img src="{{ asset('images/users/default.jpg') }}" class="img-responsive circle" style="height: 200px; width: 200px; object-fit: cover;">
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="file-field input-field mdc-button mdc-button--raised" style="margin: 0 auto;">
                            <div class="input-wrapper">
                                <i class="material-icons mdc-button__icon notranslate" style="font-size: 2em; padding-top: 2px;">file_upload</i>
                                <input type="file" name="img" id="image" accept="image/jpeg, image/png"
                                       data-size="@lang('validation.custom.img.max')"
                                       data-dimensions="@lang('validation.custom.img.dimensions')">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path right" type="text" id="image-path" placeholder="@lang('general.upload_image')" readonly>
                            </div>
                        </div>
                        @if($errors->has('img'))
                            <p class="invalid-text center" style="color: #f00; font-size: 12px">{{ $errors->first('img') }}</p>
                        @endif
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">person_outline</i>
                            <input id="name" type="text" name="name" @if($errors->has('name'))class="invalid" @endif value="{{ $user->name }}" required>
                            <label for="name">@lang('user.name')</label>
                            @if($errors->has('name'))
                                <span class="helper-text" data-error="{{ $errors->first('name') }}" data-success=""></span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 no-margin">
                            <i class="material-icons prefix">mail_outline</i>
                            <input id="email" type="email" name="email" @if($errors->has('email'))class="invalid" @endif value="{{ $user->email }}" required>
                            <label for="email">@lang('user.email')</label>
                            @if($errors->has('email'))
                                <span class="helper-text" data-error="{{ $errors->first('email') }}" data-success=""></span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-action">
                    <div class="row no-margin">
                        <div class="col s12 center">
                            @if($user->steamid64)
                                <a href="https://steamcommunity.com/profiles/{{ $user->steamid64 }}"
                                   class="no-margin" target="_blank">@lang('user.my_steam')</a>
                            @else
                                <a href="{{ route('profile.steam') }}" class="no-margin">@lang('user.link_steam')</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-action">
                    <div class="row no-margin">
                        <button type="submit" class="mdc-button mdc-button--raised mdc-ripple col s12"><b>@lang('user.save_profile')</b></button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card password">
            <form action="{{route('save_password')}}" method="post">
                @csrf
                <div class="card-content">
                    <div class="row"><h5 class="card-title center">@lang('user.password_edit')</h5></div>
                    @if($user->hasOldPassword())
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">lock_outline</i>
                                <input id="old_password" type="password" name="old_password" @if($errors->has('old_password'))class="invalid" @endif required>
                                <label for="old_password">@lang('user.old_password')</label>
                                @if($errors->has('old_password'))
                                    <span class="helper-text" data-error="{{ $errors->first('old_password') }}" data-success=""></span>
                                @endif
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="input-field col s12 no-margin">
                            <i class="material-icons prefix">lock</i>
                            <input id="new_password" type="password" name="new_password" required>
                            <label for="new_password">@lang('user.new_password')</label>
                            @if($errors->has('new_password'))
                                <span class="helper-text" data-error="{{ $errors->first('new_password') }}" data-success=""></span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 no-margin">
                            <i class="material-icons prefix">lock</i>
                            <input id="new_password_confirmation" type="password" name="new_password_confirmation" required>
                            <label for="new_password_confirmation">@lang('user.new_password_confirmation')</label>
                        </div>
                    </div>
                </div>
                <div class="card-action">
                    <div class="row no-margin">
                        <button type="submit" class="mdc-button mdc-button--raised mdc-ripple col s12"><b>@lang('user.save_password')</b></button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card settings">
            <form action="{{ route('save_settings') }}" method="post">
                @csrf
                <div class="card-content">
                    <div class="row"><h5 class="card-title center">@lang('user.profile_settings')</h5></div>
                    @php $user_dlc = explode(',', $user->owned_dlc) @endphp
                    @foreach($dlc_list as $game => $types)
                        <div class="row">
                            <label class="col s12">@lang('user.choose_owned_dlc') - {{ $game == 'ets2' ? 'Euro Truck Simulator 2' : 'American Truck Simulator' }}</label>
                            @foreach($types as $type)
                                <div class="col s12 @if($game == 'ets2')m6 @endif">
                                    @foreach($type as $dlc)
                                        <div class="{{$dlc->name}}">
                                            <div class="mdc-switch">
                                                <input type="checkbox" id="{{$dlc->name}}"
                                                       class="mdc-switch__native-control" name="dlc[{{$dlc->name}}]"
                                                    @if(in_array($dlc->name, $user_dlc)) checked @endif>
                                                <div class="mdc-switch__background">
                                                    <div class="mdc-switch__knob"></div>
                                                </div>
                                            </div>
                                            <label for="{{$dlc->name}}" class="mdc-switch-label">
                                                @lang('dlc_list.'.$dlc->name)
                                                @if(!$dlc->mp_support)
                                                    (@lang('general.mp_no_support'))
                                                @endif
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                    <div class="row">
                        <div class="input-field col s12 m4">
                            <i class="material-icons prefix">language</i>
                            <select name="lang" id="lang" class="icons">
                                @foreach($languages as $locale => $data)
                                    <option value="{{ $locale }}" data-icon="/assets/img/langs/{{ $locale }}.png"
                                            @if($user->language == $locale ||
                                            !$user->language && \Illuminate\Support\Facades\App::isLocale($locale))selected @endif
                                    >{{ $data['title'] }}</option>
                                @endforeach
                            </select>
                            <label>@lang('user.choose_lang')</label>
                        </div>
                    </div>
                </div>
                <div class="card-action">
                    <div class="row no-margin center">
                        <button type="submit" class="mdc-button mdc-button--raised mdc-ripple"><b>@lang('user.save_settings')</b></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection