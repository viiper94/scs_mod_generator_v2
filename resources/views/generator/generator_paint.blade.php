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
                            <label for="color-select-chassis">@lang('general.pick_chassis')</label>
                            <div class="ui search dropdown chassis" id="color-select-chassis">
                                <input type="hidden" name="chassis" required>
                                <div class="default text">@lang('general.choose_chassis')</div>
                                <i class="dropdown icon right"></i>
                                <div class="menu">
                                    <div class="item" data-value="paintable">@lang('general.paintable_chassis')</div>
                                    @foreach($chassis_list as $chassis)
                                        <div class="item @if(!$chassis->mp_support)
                                                tooltipped" data-tooltip="@lang('general.mp_no_support')@endif"
                                             data-value="{{$chassis->alias}}" data-position="left">
                                            @lang($game.'_trailers.'.$chassis->alias)
                                            @if($chassis->isDLCContent())
                                                <span class="right tooltipped hint"
                                                      data-tooltip="@lang('dlc_list.'.$chassis->dlc->name)"
                                                      data-position="right">
                                                    [{{ $chassis->dlc->short_name }}]
                                                </span>
                                            @endif
                                            @if(!$chassis->mp_support)
                                                <s class="left hint">MP</s>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
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
        @if(!$hasUserAcceptLanguage)
            @include('generator.translate')
        @endif
        <section class="trailer-generator">
            @include('layout.discord')
        </section>
    </div>
    <div class="fixed-action-btn tooltipped" data-tooltip="@lang('general.how_to')">
        <a class="mdc-fab mdc-ripple modal-trigger" href="#how" id="how-to">
            <span class="mdc-fab__icon">?</span>
        </a>
    </div>

    @include('generator.how_to_paint')

@endsection