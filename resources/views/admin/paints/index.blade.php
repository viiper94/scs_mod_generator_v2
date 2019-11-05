@extends('admin.layout.admin')

@section('navbar-content')

    @include('admin.search')

@endsection

@section('content')

    {{ $paints->appends(['q' => Request::input('q'), 'chassis' => Request::input('chassis')])->links('layout.pagination') }}

    <div class="row no-margin">
        <div class="col m12">
            @if(count($paints) > 0)
                <h5 class="light">Показано {{ count($paints) }} скінів</h5>
            @else
                <h5 class="light">Немає жодного скіна</h5>
            @endif
        </div>
    </div>

    <div class="row no-margin">
        <div class="col m12">
            <table class="highlight responsive-table">
                <thead>
                <th>Alias</th>
                <th>Look</th>
                <th>Def</th>
                <th><a href="{{ route('paints') }}">Chassis</a></th>
                <th>Фарбується</th>
                <th class="center">DLC</th>
                <th>Гра</th>
                <th></th>
                </thead>
                <tbody>
                @foreach($paints as $paint)
                    <tr @if(!$paint->active)class="grey darken-2 black-text" @endif>
                        <td>@lang($paint->game.'_companies_paints.'.$paint->alias)</td>
                        <td>{{ $paint->look }}</td>
                        <td>{{ $paint->def }}</td>
                        <td>
                            <a href="{{ route('paints', ['chassis' => $paint->chassis]) }}">
                                @if($paint->chassisObj)
                                    @lang($paint->game.'_trailers.'.$paint->chassisObj->alias)
                                @else
                                    {{ $paint->chassis }}
                                @endif
                            </a>
                        </td>
                        <td class="center">{{ $paint->with_color ? '+' : '—' }}</td>
                        <td class="center">
                            @if($paint->isDLCContent())
                                @lang('dlc_list.'.$paint->dlc->name)
                            @else
                                —
                            @endif
                        </td>
                        <td>@lang('general.'.$paint->game)</td>
                        <td style="white-space: nowrap" class="right-align">
                            <a href="{{ route('paints') }}/edit/{{ $paint->id }}" class="mdc-icon-button material-icons notranslate">edit</a>
                            <a href="{{ route('paints') }}/toggle/{{ $paint->id }}" class="mdc-icon-button material-icons notranslate">
                                visibility_{{ $paint->active ? 'off' : 'on' }}
                            </a>
                            <a href="{{ route('paints') }}/copy/{{ $paint->id }}" class="mdc-icon-button material-icons notranslate"
                               onclick="return confirm('Створити копію скіна?')">file_copy</a>
                            <a href="{{ route('paints') }}/delete/{{ $paint->id }}" class="mdc-icon-button material-icons notranslate"
                               onclick="return confirm('Видалити скін?')">delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{ $paints->appends(['q' => Request::input('q'), 'chassis' => Request::input('chassis')])->links('layout.pagination') }}

    <div class="fixed-action-btn">
        <a class="mdc-fab tooltipped" data-tooltip="Додати новий скін" href="{{ route('paints') }}/add">
            <span class="material-icons mdc-fab__icon">add</span>
        </a>
    </div>

@endsection
