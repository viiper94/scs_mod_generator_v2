@extends('layout.app')

@section('content')

    <div class="container">
        @if(Request::input('d') && file_exists(public_path().'/download/'.Request::input('d').'.scs'))
            @include('generator.download')
        @endif
        @if($errors->isNotEmpty())
            {{ dump($errors) }}
            @include('generator.warning')
        @endif
        @include('generator.ie')
        <section class="card">
            <form action="{{route('generator')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="card-content">
                    <div class="row">
                        <div class="col s12">
                            <div class="mdc-text-field">
                                <input type="text" id="title" class="browser-default mdc-text-field__input" name="title">
                                <label for="title" class="mdc-text-field__label">@lang('general.mod_title')</label>
                                <div class="mdc-text-field__bottom-line"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="chassis">
                        <div class="col s12">
                            <label for="select-chassis">@lang('general.pick_chassis')</label>
                            <select class="browser-default ui search dropdown chassis" id="select-chassis" name="chassis" required>
                                <option selected value="">@lang('general.choose_chassis')</option>
                                <option value="paintable">@lang('general.paintable_chassis')</option>
                                @foreach($chassis_list as $chassis)
                                    <option value="{{$chassis->alias}}">@lang($game.'_trailers.'.$chassis->alias)
                                        @if($chassis->isDLCContent()) - @lang('dlc_list.'.$chassis->dlc->name) @endif
                                    </option>
                               @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row" id="accessory" style="display: none">
                        <div class="col s12">
                            <label class="for-select">@lang('general.pick_accessory')</label>
                        </div>
                        <div class="col s12">
                            <div class="mdc-switch">
                                <input type="checkbox" id="all_accessories" data-target="accessory" class="mdc-switch__native-control" />
                                <div class="mdc-switch__background">
                                    <div class="mdc-switch__knob"></div>
                                </div>
                            </div>
                            <label for="all_accessories" class="mdc-switch-label">@lang('general.show_all_accessories')</label>
                        </div>
                    </div>
                    <div class="row" id="paint" style="display: none">
                        <div class="col s12">
                            <label class="for-select">@lang('general.pick_paint')</label>
                        </div>
                        <div class="colors" style="display: none;">
                            <div class="col s12 palette">
                                <div class="input-field inline" style="height: 26px; min-width: 170px;">
                                    <input type="color" name="color" value="#ffffff" id="color_palette">
                                </div>
                                <span class="offset-m3">@lang('general.pick_color')</span>
                            </div>
                            <div class="col s12 hex">
                                <div class="mdc-text-field">
                                    <input type="text" id="color_hex" class="browser-default mdc-text-field__input" name="color[hex]" value="#ffffff" maxlength="7" style="text-transform: uppercase;">
                                    <label for="color_hex" class="mdc-text-field__label">HEX</label>
                                    <div class="mdc-text-field__bottom-line"></div>
                                </div>
                                <span>@lang('general.type_color_hex')</span>
                            </div>
                            <div class="col s12 rgb">
                                <div class="mdc-text-field inline">
                                    <input type="text" id="color_rgb_r" class="browser-default mdc-text-field__input" name="color[rgb][r]" min="0" max="255" value="255" maxlength="3">
                                    <label for="color_rgb_r" class="mdc-text-field__label">R</label>
                                    <div class="mdc-text-field__bottom-line"></div>
                                </div>
                                <div class="mdc-text-field inline">
                                    <input type="text" id="color_rgb_g" class="browser-default mdc-text-field__input" name="color[rgb][g]" min="0" max="255" value="255" maxlength="3">
                                    <label for="color_rgb_g" class="mdc-text-field__label">G</label>
                                    <div class="mdc-text-field__bottom-line"></div>
                                </div>
                                <div class="mdc-text-field inline">
                                    <input type="text" id="color_rgb_b" class="browser-default mdc-text-field__input" name="color[rgb][b]" min="0" max="255" value="255" maxlength="3">
                                    <label for="color_rgb_b" class="mdc-text-field__label">B</label>
                                    <div class="mdc-text-field__bottom-line"></div>
                                </div>
                                <span class="offset-m3">@lang('general.type_color_rgb')</span>
                            </div>
                            <div class="col s12 scs">
                                <div class="mdc-text-field inline">
                                    <input type="text" id="color_scs_r" class="browser-default mdc-text-field__input" name="color[scs][r]" value="1">
                                    <label for="color_scs_r" class="mdc-text-field__label">R</label>
                                    <div class="mdc-text-field__bottom-line"></div>
                                </div>
                                <div class="mdc-text-field inline">
                                    <input type="text" id="color_scs_g" class="browser-default mdc-text-field__input" name="color[scs][g]" value="1">
                                    <label for="color_scs_g" class="mdc-text-field__label">G</label>
                                    <div class="mdc-text-field__bottom-line"></div>
                                </div>
                                <div class="mdc-text-field inline">
                                    <input type="text" id="color_scs_b" class="browser-default mdc-text-field__input" name="color[scs][b]" value="1">
                                    <label for="color_scs_b" class="mdc-text-field__label">B</label>
                                    <div class="mdc-text-field__bottom-line"></div>
                                </div>
                                <span class="offset-m3">@lang('general.type_color_scs')</span>
                            </div>
                        </div>
                        <div class="col s12">
                            <div class="mdc-switch">
                                <input type="checkbox" id="all_paints" data-target="paint" class="mdc-switch__native-control" />
                                <div class="mdc-switch__background">
                                    <div class="mdc-switch__knob"></div>
                                </div>
                            </div>
                            <label for="all_paints" class="mdc-switch-label">@lang('general.show_all_paints')</label>
                        </div>
                    </div>
                    <section class="advanced row" style="margin-bottom: 0;">
                        <ul class="collapsible z-depth-0 col s12">
                            <li>
                                <div class="collapsible-header grey-text"><i class="material-icons notranslate">arrow_drop_down</i>@lang('general.advanced')</div>
                                <div class="collapsible-body">
                                    <label>@lang('general.image_upload')</label>
                                    <div class="file-field input-field mdc-button mdc-button--raised">
                                        <div class="input-wrapper">
                                            <i class="material-icons mdc-button__icon notranslate" style="font-size: 2em; padding-top: 2px;">file_upload</i>
                                            <input type="file" name="img" id="image" accept="image/jpeg, image/png"
                                                   data-size="@lang('general.max_file_size_5')"
                                                   data-dimensions="@lang('general.max_dimensions_3000')">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path right" type="text" id="image-path" placeholder="@lang('general.upload_image')" readonly>
                                        </div>
                                    </div>
                                    <div class="mdc-text-field weight">
                                        <input type="text" id="weight" class="browser-default mdc-text-field__input" name="weight">
                                        <label for="weight" class="mdc-text-field__label">@lang('general.trailer_weight')</label>
                                        <div class="mdc-text-field__bottom-line"></div>
                                    </div>
                                    <div class="wheels input-field" style="display: none;">
                                        <select class="icons" name="wheels">
                                            <option value="" selected>@lang('general.w_default')</option>
                                            @foreach($wheels as $wheel)
                                                <option value="{{$wheel->def}}" data-icon="assets/img/wheels/{{$game}}/{{$wheel->alias}}.jpg">
                                                    @lang($game.'_wheels.'.$wheel->alias)
                                                </option>
                                            @endforeach
                                        </select>
                                        <label>@lang('general.select_wheels')</label>
                                    </div>
                                    <div class="dlc">
                                        <label>@lang('general.include_dlc'):</label>
                                        @foreach($dlc_list as $dlc)
                                            <div class="{{$dlc->name}}">
                                                <div class="mdc-switch">
                                                    <input type="checkbox" id="dlc_{{$dlc->name}}" data-target="paint"
                                                           class="mdc-switch__native-control" name="dlc[{{$dlc->name}}]">
                                                    <div class="mdc-switch__background">
                                                        <div class="mdc-switch__knob"></div>
                                                    </div>
                                                </div>
                                                <label for="dlc_{{$dlc->name}}" class="mdc-switch-label">@lang('dlc_list.'.$dlc->name)</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </section>
                </div>
                <div class="card-action row center-on-small-only">
                    <input type="hidden" name="target" value="{{$game}}">
                    <button class="mdc-button mdc-button--raised mdc-ripple left-med-and-up" id="generate-btn" type="submit"
                            onclick="return confirm('@lang('general.are_you_sure')')" disabled style="min-width: 200px">
                        <i class="material-icons mdc-button__icon notranslate">send</i><b>@lang('general.proceed')</b>
                    </button>
                </div>
            </form>
        </section>
        @if(!$hasUserAcceptLanguage)
            @include('generator.translate')
        @endif
        <section class="card-panel grey-text">
            <span class="card-title">
                <i class="material-icons left notranslate">warning</i>
                @lang('general.beta_notification')
            </span>
        </section>
    </div>
    <div class="fixed-action-btn tooltipped" data-tooltip="@lang('general.how_to')">
        <a class="mdc-fab mdc-ripple modal-trigger" href="#how" id="how-to">
            <span class="mdc-fab__icon">?</span>
        </a>
    </div>

    @include('generator.modal')

@endsection