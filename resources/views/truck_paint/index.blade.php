@extends('layout.app')

@section('content')

    <div class="flex-center" style="flex: 1; align-items: center; flex-direction: column;">
        <div class="card" style="width: 600px;">
            <form method="POST" action="{{route('color_generator')}}">
                @csrf
                <div class="card-content">
                    <div class="row"><h5 class="card-title center">@lang('general.truck_paint_job_generator')</h5></div>
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
                            <select class="browser-default ui search dropdown chassis" id="color-select-chassis" name="chassis" required>
                                <option selected value="">@lang('general.choose_chassis')</option>
                                <option value="paintable">@lang('general.paintable_chassis')</option>
                                @foreach($chassis_list as $chassis)
                                    <option value="{{$chassis->alias}}">@lang('ets2_trailers.'.$chassis->alias)
                                        @if($chassis->isDLCContent()) - @lang('dlc_list.'.$chassis->dlc->name) @endif
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="colors row">
                        <label class="col s12" for="select-chassis">@lang('general.pick_color')</label>
                        <div class="col s12 m6 palette">
                            <div class="input-field" style="height: 26px; min-width: 170px;">
                                <input type="color" name="color" value="#ffffff" id="color_palette">
                            </div>
                        </div>
                        <div class="col s12 m6">
                            <div class="mdc-switch">
                                <input type="checkbox" id="advanced_color" class="mdc-switch__native-control">
                                <div class="mdc-switch__background">
                                    <div class="mdc-switch__knob"></div>
                                </div>
                            </div>
                            <label for="advanced_color" class="mdc-switch-label">@lang('general.advanced_color')</label>
                        </div>
                    </div>
                    <div class="colors color-advanced row" style="display: none;">
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
                </div>
                <div class="card-action">
                    <div class="row no-margin">
                        <input type="hidden" name="target" value="ets2">
                        <button type="submit" class="mdc-button mdc-button--raised mdc-ripple col s12">
                            <i class="material-icons mdc-button__icon notranslate">send</i>
                            <b>@lang('general.proceed')</b>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection