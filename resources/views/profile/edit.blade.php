@extends('layout.app')

@section('title')
    @lang('user.profile_edit') -
@endsection

@section('content')

    <div class="flex-center profile-container overflow-visible">
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
                        <div class="file-field input-field mdc-button mdc-button--outlined" style="margin: 0 auto;">
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
                    <div class="row no-margin">
                        <div class="mdc-text-field mdc-text-field--with-leading-icon mdc-text-field--outlined">
                            <i class="material-icons mdc-text-field__icon" tabindex="0" role="button">person_outline</i>
                            <input type="text" id="name" class="mdc-text-field__input" name="name" value="{{ $user->name }}" required>
                            <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label for="name" class="mdc-floating-label">@lang('user.name')</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                            </div>
                        </div>
                        @if($errors->has('name'))
                            <div class="mdc-text-field-helper-line">
                                <div class="mdc-text-field-helper-text">{{ $errors->first('name') }}</div>
                            </div>
                        @endif
                    </div>
                    <div class="row no-margin">
                        <div class="mdc-text-field mdc-text-field--with-leading-icon mdc-text-field--outlined">
                            <i class="material-icons mdc-text-field__icon" tabindex="0" role="button">mail_outline</i>
                            <input id="email" type="email" name="email" class="mdc-text-field__input" value="{{ $user->email }}" required>
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
                <div class="row">
                    <div class="col s12 center" style="font-weight: bold; ">
                        @if($user->steamid64)
                            <a href="https://steamcommunity.com/profiles/{{ $user->steamid64 }}"
                               class="mdc-button" target="_blank">@lang('user.my_steam')</a>
                        @else
                            <a href="{{ route('profile.steam') }}" class="mdc-button">@lang('user.link_steam')</a>
                        @endif
                    </div>
                </div>
                <div class="card-action">
                    <div class="row no-margin">
                        <button type="submit" class="mdc-button mdc-button--unelevated col s12"><b>@lang('user.save_profile')</b></button>
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
                        <div class="row no-margin">
                            <div class="mdc-text-field mdc-text-field--with-leading-icon mdc-text-field--outlined">
                                <i class="material-icons mdc-text-field__icon" tabindex="0" role="button">lock_outline</i>
                                <input id="old_password" type="password" name="old_password" class="mdc-text-field__input" required>
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label for="old_password" class="mdc-floating-label">@lang('user.old_password')</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div>
                            @if($errors->has('old_password'))
                                <div class="mdc-text-field-helper-line">
                                    <div class="mdc-text-field-helper-text">{{ $errors->first('old_password') }}</div>
                                </div>
                            @endif
                        </div>
                    @endif
                    <div class="row no-margin">
                        <div class="mdc-text-field mdc-text-field--with-leading-icon mdc-text-field--outlined">
                            <i class="material-icons mdc-text-field__icon" tabindex="0" role="button">lock</i>
                            <input id="new_password" type="password" name="new_password" class="mdc-text-field__input" required>
                            <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label for="new_password" class="mdc-floating-label">@lang('user.new_password')</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                            </div>
                        </div>
                        @if($errors->has('new_password'))
                            <div class="mdc-text-field-helper-line">
                                <div class="mdc-text-field-helper-text">{{ $errors->first('new_password') }}</div>
                            </div>
                        @endif
                    </div>
                    <div class="row no-margin">
                        <div class="mdc-text-field mdc-text-field--with-leading-icon mdc-text-field--outlined">
                            <i class="material-icons mdc-text-field__icon" tabindex="0" role="button">lock</i>
                            <input id="new_password_confirmation" type="password" name="new_password_confirmation"
                                   class="mdc-text-field__input" required>
                            <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label for="new_password_confirmation" class="mdc-floating-label">@lang('user.new_password_confirmation')</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-action">
                    <div class="row no-margin">
                        <button type="submit" class="mdc-button mdc-button--unelevated col s12"><b>@lang('user.save_password')</b></button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card settings overflow-visible">
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
                                            <div class="mdc-form-field">
                                                <div class="mdc-checkbox">
                                                    <input type="checkbox" name="dlc[{{ $dlc->id }}]"
                                                           class="mdc-checkbox__native-control"
                                                           id="dlc_{{$dlc->name}}"
                                                           @if(in_array($dlc->id, $user_dlc)) checked @endif>
                                                    <div class="mdc-checkbox__background">
                                                        <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                            <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"></path>
                                                            <path d="M0 0h24v24H0z" fill="none"></path>
                                                        </svg>
                                                        <div class="mdc-checkbox__mixedmark"></div>
                                                    </div>
                                                </div>
                                                <label for="dlc_{{$dlc->name}}">
                                                    @lang('dlc_list.'.$dlc->name)
                                                    @if(!$dlc->mp_support)
                                                        <s class="hint tooltipped" data-tooltip="@lang('general.mp_no_support')" data-position="bottom"><b>MP</b></s>
                                                    @endif
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                    <div class="row">
                        <div class="input-field col s12 m5 inline">
                            <label for="select-lang">@lang('user.choose_lang')</label>
                            <select name="lang" id="select-lang" class="icons">
                                @foreach($languages as $locale => $data)
                                    <option value="{{ $locale }}" data-icon="/assets/img/langs/{{ $locale }}.png" @if($user->language == $locale ||
                                         !$user->language && \Illuminate\Support\Facades\App::isLocale($locale))selected @endif>{{ $data['title'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-action">
                    <div class="row no-margin center">
                        <button type="submit" class="mdc-button mdc-button--unelevated"><b>@lang('user.save_settings')</b></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection