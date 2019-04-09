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
        <section class="card trailer-generator overflow-visible">
            <form action="{{route('generator')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="card-content">
                    <div class="row"><h5 class="card-title center bold">@lang('general.'.$game) @lang('general.trailer_generator')</h5></div>
                    <div class="row">
                        <div class="col s12">
                            <div class="mdc-text-field">
                                <input type="text" id="title" class="browser-default mdc-text-field__input" name="title">
                                <div class="mdc-line-ripple"></div>
                                <label for="title" class="mdc-floating-label">@lang('general.mod_title')</label>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="chassis">
                        <div class="col s12">
                            <label for="select-chassis">@lang('general.pick_chassis')</label>
                            <div class="ui search dropdown chassis" id="select-chassis">
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
                    <div class="row" id="accessory" style="display: none">
                        <div class="col s12">
                            <label class="for-select">@lang('general.pick_accessory')</label>
                        </div>
                        <div class="col s12">
                            <div class="mdc-switch" id="accessories_switch">
                                <div class="mdc-switch__track"></div>
                                <div class="mdc-switch__thumb-underlay">
                                    <div class="mdc-switch__thumb">
                                        <input type="checkbox" id="all_accessories" data-target="accessory" class="mdc-switch__native-control" />
                                    </div>
                                </div>
                            </div>
                            <label for="all_accessories">@lang('general.show_all_accessories')</label>
                        </div>
                    </div>
                    <div class="row" id="paint" style="display: none">
                        <div class="col s12">
                            <label class="for-select">@lang('general.pick_paint')</label>
                        </div>
                        <div class="col s12">
                            <div class="mdc-switch" id="paint_switch">
                                <div class="mdc-switch__track"></div>
                                <div class="mdc-switch__thumb-underlay">
                                    <div class="mdc-switch__thumb">
                                        <input type="checkbox" id="all_paints" data-target="paint" class="mdc-switch__native-control" />
                                    </div>
                                </div>
                            </div>
                            <label for="all_paints">@lang('general.show_all_paints')</label>
                        </div>
                    </div>
                    <div class="colors row" style="display: none;">
                        <div class="col s12 palette">
                            <input type="color" name="color" value="#ffffff" id="color_palette">
                            <span class="offset-m3">@lang('general.pick_color')</span>
                        </div>
                        @include('generator.colors_hex_rgb_scs')
                    </div>

                    @include('generator.advanced')

                </div>
                <div class="card-action">
                    <div class="row no-margin">
                        <input type="hidden" name="target" value="{{$game}}">
                        <button class="mdc-button mdc-button--unelevated col s12" id="generate-btn" type="submit"
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
        <section class="trailer-generator">
            @include('layout.discord')
        </section>
    </div>
    <div class="fixed-action-btn">
        <a class="mdc-fab modal-trigger tooltipped" data-tooltip="@lang('general.how_to')" href="#how" id="how-to">
            <span class="mdc-fab__icon">?</span>
        </a>
    </div>

    @include('generator.how_to_trailer')

@endsection