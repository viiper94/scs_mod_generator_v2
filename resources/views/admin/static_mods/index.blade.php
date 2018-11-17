@extends('admin.layout.admin')

@section('content')

    @include('admin.search')

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
                         style="background-image: url(/{{ $mod->image_path }}/{{ $mod->image }});
                         @if(!$mod->active)opacity: .2; @endif"></div>
                    <div class="card-stacked">
                        <div class="card-content">
                            <h5 class="card-title">
                                @if(!$mod->active) <i class="material-icons mdc-button__icon notranslate">visibility_off</i> @endif
                                {{ $mod->title }}
                            </h5>
                            <p style="line-height: 24px;">
                                {{ $mod->description }}
                            </p>
                            <a href="/{{ $mod->path }}/{{ $mod->file_name }}" class="mdc-button mdc-button--raised mdc-ripple black-text">
                                <i class="material-icons mdc-button__icon notranslate">cloud_download</i>Завантажити
                            </a>
                        </div>
                        <div class="card-action">
                            <a href="{{ route('admin_static_mods') }}/edit/{{ $mod->id }}" class="mdc-button mdc-button--raised mdc-ripple black-text">
                                <i class="material-icons mdc-button__icon notranslate">edit</i>Редагувати
                            </a>
                            <a href="{{ route('admin_static_mods') }}/delete/{{ $mod->id }}" class="mdc-button mdc-ripple mdc-button--raised red white-text"
                               onclick="return confirm('Видалити причіп?')">
                                <i class="material-icons mdc-button__icon notranslate">delete</i>Видалити
                            </a>
                            <a href="{{ route('admin_static_mods') }}/toggle/{{ $mod->id }}" class="mdc-button mdc-ripple">
                                <i class="material-icons mdc-button__icon notranslate">visibility_{{ $mod->active ? 'off' : 'on' }}</i>
                                {{ $mod->active ? 'Сховати' : 'Показати' }}
                            </a>
                            <a href="{{ route('admin_static_mods') }}/copy/{{ $mod->id }}" class="mdc-button mdc-ripple"
                               onclick="return confirm('Створити копію?')">
                                <i class="material-icons mdc-button__icon notranslate">file_copy</i>Копіювати
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{ $mods->appends(['q' => Request::input('q')])->links('layout.pagination') }}

    <div class="fixed-action-btn tooltipped" data-tooltip="Додати новий мод">
        <a class="mdc-fab mdc-ripple" href="{{ route('admin_static_mods') }}/add">
            <span class="material-icons mdc-fab__icon">add</span>
        </a>
    </div>

@endsection