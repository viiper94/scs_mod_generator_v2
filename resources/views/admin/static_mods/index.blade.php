@extends('admin.layout.admin')

@section('navbar-content')

    @include('admin.search')

@endsection

@section('content')

    {{ $mods->appends(['q' => Request::input('q')])->links('layout.pagination') }}

    <div class="row no-margin">
        <div class="col s12 m10 offset-m1">
            @if(count($mods) > 0)
                <div class="col m6 s12">
                    <h5 class="light">Показано {{ count($mods) }} модифікацій</h5>
                </div>
            @else
                <h5 class="light">Немає жодної модифікації</h5>
            @endif
        </div>
    </div>

    <div class="row no-margin">
        @foreach($mods as $mod)
            <div class="col s12 m10 offset-m1">
                <div class="card horizontal hoverable">
                    <div class="card-image no-img_horizontal"
                         style="background-image: url(/{{ $mod->image_path }}/{{ $mod->image ?? 'default.jpg' }});
                         @if(!$mod->active)opacity: .2; @endif"></div>
                    <div class="card-stacked">
                        <div class="card-content">
                            @if(!$mod->active) <i class="material-icons mdc-button__icon notranslate">visibility_off</i> @endif
                            <p style="line-height: 24px;">Назва EN: <b>{{ $mod->title_en }}</b></p>
                            <p style="line-height: 24px;">Назва РУС: <b>{{ $mod->title_ru }}</b></p>
                            <p style="line-height: 24px;">Гра: <b>@lang('general.'.$mod->game)</b></p>
                            <p style="line-height: 24px;">Опис EN: <b>{{ $mod->description_en }}</b></p>
                            <p style="line-height: 24px;">Опис РУС: <b>{{ $mod->description_ru }}</b></p>
                            <p style="line-height: 24px;">Протестовано на версії: <b>{{ $mod->tested_ver }}</b></p>
                            <p style="line-height: 24px;">Створено: <b>{{ $mod->created_at }}</b></p>
                            <p style="line-height: 24px;">Оновлено: <b>{{ $mod->updated_at }}</b></p>
                            @if($mod->isDLCContent())
                                <p style="line-height: 24px;" class="grey-text"><b>
                                    @foreach($mod->getDLCs(true) as $dlc)
                                        @lang('dlc_list.'.$dlc)<br>
                                    @endforeach
                                </b></p>
                            @endif
                        </div>
                        <div class="card-action">
                            @if($mod->external_link)
                                <a href="{{ $mod->external_link }}" target="_blank" class="mdc-button mdc-button--unelevated btn green">
                                    <i class="material-icons mdc-button__icon notranslate">file_download</i>
                                    @lang('general.download_mod')
                                </a>
                            @else
                                <a href="/{{ $mod->path }}/{{ $mod->file_name }}" class="mdc-button mdc-button--unelevated btn green">
                                    <i class="material-icons mdc-button__icon notranslate">file_download</i>
                                    @lang('general.download_mod')
                                </a>
                            @endif
                            <a href="{{ route('admin_static_mods') }}/edit/{{ $mod->id }}" class="mdc-button mdc-button--unelevated btn">
                                <i class="material-icons mdc-button__icon notranslate">edit</i>Редагувати
                            </a>
                            <a href="{{ route('admin_static_mods') }}/delete/{{ $mod->id }}" class="mdc-button mdc-button--unelevated btn red white-text"
                               onclick="return confirm('Видалити причіп?')">
                                <i class="material-icons mdc-button__icon notranslate">delete</i>Видалити
                            </a>
                            <a href="{{ route('admin_static_mods') }}/toggle/{{ $mod->id }}" class="mdc-button mdc-button--outlined btn">
                                <i class="material-icons mdc-button__icon notranslate">visibility_{{ $mod->active ? 'off' : 'on' }}</i>
                                {{ $mod->active ? 'Сховати' : 'Показати' }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{ $mods->appends(['q' => Request::input('q')])->links('layout.pagination') }}

    <div class="fixed-action-btn">
        <a class="mdc-fab tooltipped" data-tooltip="Додати новий мод" href="{{ route('admin_static_mods') }}/add">
            <span class="material-icons mdc-fab__icon">add</span>
        </a>
    </div>

@endsection