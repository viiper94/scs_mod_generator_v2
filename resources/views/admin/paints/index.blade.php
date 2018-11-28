@extends('admin.layout.admin')

@section('content')

    @include('admin.search')

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
                <th>Def</th>
                <th>Chassis</th>
                <th>DLC</th>
                <th>Гра</th>
                <th></th>
                </thead>
                <tbody>
                @foreach($paints as $paint)
                    <tr @if(!$paint->active)class="grey darken-2 black-text" @endif>
                        <td>@lang($paint->game.'_companies_paints.'.$paint->alias)</td>
                        <td>{{ $paint->def }}</td>
                        <td>
                            @if($paint->chassisObj)
                                @lang($paint->game.'_trailers.'.$paint->chassisObj->alias)
                            @else
                                {{ $paint->chassis }}
                            @endif
                        </td>
                        <td>
                            @if($paint->isDLCContent())
                                @lang('dlc_list.'.$paint->dlc->name)
                            @else
                                —
                            @endif
                        </td>
                        <td>@lang('general.'.$paint->game)</td>
                        <td style="white-space: nowrap" class="right-align">
                            <a href="{{ route('paints') }}/edit/{{ $paint->id }}" class="mdc-button mdc-button--raised mdc-ripple">
                                <i class="material-icons mdc-button__icon notranslate">edit</i>
                            </a>
                            <a href="{{ route('paints') }}/delete/{{ $paint->id }}" class="mdc-button mdc-ripple mdc-button--raised red"
                               onclick="return confirm('Видалити скін?')">
                                <i class="material-icons mdc-button__icon notranslate">delete</i>
                            </a>
                            <a href="{{ route('paints') }}/toggle/{{ $paint->id }}" class="mdc-button mdc-ripple mdc-button--raised blue">
                                <i class="material-icons mdc-button__icon notranslate">visibility_{{ $paint->active ? 'off' : 'on' }}</i>
                            </a>
                            <a href="{{ route('paints') }}/copy/{{ $paint->id }}" class="mdc-button mdc-ripple mdc-button--raised green"
                               onclick="return confirm('Створити копію скіна?')">
                                <i class="material-icons mdc-button__icon notranslate">file_copy</i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{ $paints->appends(['q' => Request::input('q')])->links('layout.pagination') }}

    <div class="fixed-action-btn tooltipped" data-tooltip="Додати новий скін">
        <a class="mdc-fab mdc-ripple" href="{{ route('paints') }}/add">
            <span class="material-icons mdc-fab__icon">add</span>
        </a>
    </div>

@endsection