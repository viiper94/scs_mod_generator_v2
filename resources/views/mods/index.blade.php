@extends('layout.app')

@section('content')

    @include('admin.search')

    <div class="row no-margin">
        @foreach($mods as $mod)
            <div class="col l4 m6 s12">
                <div class="card hoverable">
                    <div class="card-image">
                        <img class="materialboxed" width="100%"
                             src="/{{ $mod->image_path }}/{{ $mod->image ?? 'default.jpg' }}">
                    </div>
                    <div class="card-content">
                        @if($mod->isDlcContent())
                            <p class="grey-text">
                                <i class="material-icons notranslate left">add</i>@lang('mods.mod_required_dlc')
                                @foreach(explode(',', $mod->dlc) as $key)
                                    @if(key_exists($key, $dlc)) <b>@lang('dlc_list.'.$dlc[$key]['name'])</b>, @endif
                                @endforeach
                            </p>
                        @endif
                        <h5 class="card-title">
                            {{ $mod->getTitle() }}
                            <span class="new badge black-text" data-badge-caption="">@lang('general.'.$mod->game)</span>
                        </h5>
                        <p>{{ $mod->getDescription() }}</p>
                        <p class="grey-text">@lang('mods.tested_on_ver'): <b>{{ $mod->tested_ver }}</b></p>
                    </div>
                    <div class="card-action">
                        <a href="/{{ $mod->path }}/{{ $mod->file_name }}" class="mdc-button mdc-button--raised mdc-ripple black-text">
                            <i class="material-icons mdc-button__icon notranslate">file_download</i>
                            @lang('general.download_mod')
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{ $mods->appends(['q' => Request::input('q')])->links('layout.pagination') }}

@endsection