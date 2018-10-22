@extends('layout.app')

@section('content')

    <div class="flex-center" style="flex: 1; align-items: center; flex-direction: column;">
        <section class="paint-generator">
            @if(Request::input('d') && file_exists(public_path().'/download/'.Request::input('d').'.scs') && $errors->isEmpty())
                @include('generator.download')
            @endif
            @if(!$errors->isEmpty())
                @include('generator.warning')
            @endif
            @include('generator.ie')
        </section>
        <div class="card paint-generator">
            <form method="POST" action="{{route('color_generator')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-content">
                    <div class="row"><h5 class="card-title center">ETS2 @lang('general.truck_paint_job_generator')</h5></div>
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
                        @include('generator.colors_hex_rgb_scs')
                    </div>

                    @include('generator.trmp_fix')
                    @include('generator.advanced')

                </div>
                <div class="card-action">
                    <div class="row no-margin">
                        <input type="hidden" name="target" value="ets2">
                        <button type="submit" class="mdc-button mdc-button--raised mdc-ripple col s12" disabled id="generate-color-btn">
                            <i class="material-icons mdc-button__icon notranslate">send</i>
                            <b>@lang('general.proceed')</b>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="fixed-action-btn tooltipped" data-tooltip="@lang('general.how_to')">
        <a class="mdc-fab mdc-ripple modal-trigger" href="#how" id="how-to">
            <span class="mdc-fab__icon">?</span>
        </a>
    </div>

    @include('generator.how_to_paint')

@endsection