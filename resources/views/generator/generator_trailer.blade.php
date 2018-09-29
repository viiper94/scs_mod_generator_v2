@extends('layout.app')

@section('content')

    <div class="flex-center" style="flex: 1; align-items: center; flex-direction: column;">
        <section class="trailer-generator">
            @if(Request::input('d') && file_exists(public_path().'/download/'.Request::input('d').'.scs') && $errors->isEmpty())
                @include('generator.download')
            @endif
            @if($errors->isNotEmpty())
                @include('generator.warning')
            @endif
            @include('generator.ie')
        </section>
        <section class="card trailer-generator">
            <form action="{{route('generator')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="card-content">
                    <div class="row"><h5 class="card-title center">@lang('general.'.$game) @lang('general.trailer_generator')</h5></div>
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
                                        @if($chassis->isDLCContent())
                                            - @lang('dlc_list.'.$chassis->dlc->name)
                                            @if(!$chassis->dlc->mp_support)
                                                (@lang('general.mp_no_support'))
                                            @endif
                                        @endif
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
                            @include('generator.colors_hex_rgb_scs')
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
                    @include('generator.advanced')
                </div>
                <div class="card-action">
                    <div class="row no-margin">
                        <input type="hidden" name="target" value="{{$game}}">
                        <button class="mdc-button mdc-button--raised mdc-ripple left-med-and-up col s12" id="generate-btn" type="submit"
                                onclick="return confirm('@lang('general.are_you_sure')')" disabled style="min-width: 200px">
                            <i class="material-icons mdc-button__icon notranslate">send</i><b>@lang('general.proceed')</b>
                        </button>
                    </div>
                </div>
            </form>
        </section>
        @if(!$hasUserAcceptLanguage)
            @include('generator.translate')
        @endif
    </div>
    <div class="fixed-action-btn tooltipped" data-tooltip="@lang('general.how_to')">
        <a class="mdc-fab mdc-ripple modal-trigger" href="#how" id="how-to">
            <span class="mdc-fab__icon">?</span>
        </a>
    </div>

    @include('generator.how_to_trailer')

@endsection