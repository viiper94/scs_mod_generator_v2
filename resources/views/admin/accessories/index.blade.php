@extends('admin.layout.admin')

@section('content')

    @include('admin.search')

    <div class="row no-margin">
        <div class="col m12">
            @if(count($accessories) > 0)
                <h5 class="light">Показано {{ count($accessories) }} аксесуарів</h5>
            @else
                <h5 class="light">Немає жодного аксесуару</h5>
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
                @foreach($accessories as $accessory)
                    <tr @if(!$accessory->active)class="grey darken-2 black-text" @endif>
                        <td>@lang($accessory->game.'_accessories.'.$accessory->alias)</td>
                        <td>{{ $accessory->def }}</td>
                        <td>@lang($accessory->game.'_trailers.'.$accessory->chassis)</td>
                        <td>{{ $accessory->dlc_id ? trans('dlc_list.'.$accessory->dlc->name) : '—' }}</td>
                        <td>@lang('general.'.$accessory->game)</td>
                        <td style="white-space: nowrap" class="right-align">
                            <a href="{{ route('accessories') }}/edit/{{ $accessory->id }}" class="mdc-button mdc-button--raised mdc-ripple">
                                <i class="material-icons mdc-button__icon notranslate">edit</i>
                            </a>
                            <a href="{{ route('accessories') }}/delete/{{ $accessory->id }}" class="mdc-button mdc-ripple mdc-button--raised red"
                               onclick="return confirm('Видалити аксесуар?')">
                                <i class="material-icons mdc-button__icon notranslate">delete</i>
                            </a>
                            <a href="{{ route('accessories') }}/toggle/{{ $accessory->id }}" class="mdc-button mdc-ripple mdc-button--raised blue">
                                <i class="material-icons mdc-button__icon notranslate">visibility_{{ $accessory->active ? 'off' : 'on' }}</i>
                            </a>
                            <a href="{{ route('accessories') }}/copy/{{ $accessory->id }}" class="mdc-button mdc-ripple mdc-button--raised green"
                               onclick="return confirm('Створити копію аксесуару?')">
                                <i class="material-icons mdc-button__icon notranslate">file_copy</i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{ $accessories->appends(['q' => Request::input('q')])->links('layout.pagination') }}

    <div class="fixed-action-btn tooltipped" data-tooltip="Додати новий аксесуар">
        <a class="mdc-fab mdc-ripple" href="{{ route('accessories') }}/add">
            <span class="material-icons mdc-fab__icon">add</span>
        </a>
    </div>

@endsection