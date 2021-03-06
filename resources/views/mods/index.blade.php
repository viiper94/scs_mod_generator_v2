@extends('layout.app')

@section('title', trans('general.mods_title').' | '.trans('general.title'))

@section('meta-description')
    <meta name="description" content="@lang('general.mods_description')">
@endsection

@section('meta-keywords')
    <meta name="keywords" content="моды для мп, ets2, ats, truckersmp, моды для ets2mp, моды для atsmp, как найти прицеп на конвой, как взять груз на конвой,
                                    mods for mp, mods for multiplayer, find a trailer, scsoftware, convoy trailer, 750hp, All Truck 750HP for Multiplayer,
                                    sounds mods, engine mods, paint mods, ets2mp, atsmp">
@endsection

@section('navbar-content')

    @include('admin.search')

@endsection

@section('content')

    <div class="row no-margin">
        @if(count($mods) > 0)
            @foreach($mods as $i => $mod)
                @if($i%3 == 0)
                    <div class="clearfix hide-on-large-only show-on-extra-large"></div>
                @endif
                @if($i%2 == 0)
                    <div class="clearfix hide-on-extra-large-only"></div>
                @endif
                <div class="col xl4 l6 s12">
                    <div class="card hoverable">
                        <div class="card-image">
                            <img class="materialboxed" width="100%"
                                 src="/{{ $mod->image_path }}/{{ $mod->image ?? 'default.jpg' }}">
                        </div>
                        <div class="card-content">
                            @if($mod->isDlcContent())
                                <p style="line-height: 1.7em">
                                    <i class="material-icons notranslate left">add</i>@lang('mods.mod_required_dlc')
                                    @foreach(explode(',', $mod->dlc) as $key)
                                        @if(key_exists($key, $dlc)) <b>@lang('dlc_list.'.$dlc[$key]['name'])</b> @endif
                                    @endforeach
                                </p>
                            @endif
                            <h5 class="card-title">
                                {{ $mod->getTitle() }}
                                <span class="new badge black-text" data-badge-caption="">@lang('general.'.$mod->game)</span>
                            </h5>
                            <p>{!! nl2br($mod->getDescription()) !!}</p>
                            <p class="grey-text">@lang('mods.tested_on_ver'): <b>{{ $mod->tested_ver }}</b></p>
                        </div>
                        <div class="card-action">
                            @if($mod->external_link)
                                <a href="{{ $mod->external_link }}" target="_blank" class="mdc-button mdc-button--unelevated btn">
                                    <i class="material-icons mdc-button__icon notranslate">launch</i>
                                    @lang('general.download_mod')
                                </a>
                            @else
                                <a href="/{{ $mod->path }}/{{ $mod->file_name }}" class="mdc-button mdc-button--unelevated btn">
                                    <i class="material-icons mdc-button__icon notranslate">file_download</i>
                                    @lang('general.download_mod')
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <h5 class="center">@lang('general.no_results')</h5>
        @endif

    </div>

    {{ $mods->appends(['q' => Request::input('q')])->links('layout.pagination') }}

@endsection