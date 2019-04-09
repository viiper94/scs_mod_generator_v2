@extends('admin.layout.admin')

@section('navbar-content')

    @include('admin.search')

@endsection

@section('content')

    {{ $accessories->appends(['q' => Request::input('q')])->links('layout.pagination') }}

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
                        <td>@lang($accessory->game.'_trailers.'.$accessory->chassisObj->alias)</td>
                        <td>
                            @if($accessory->isDLCContent())
                                @foreach($accessory->getDLCs(true) as $dlc)
                                    @lang('dlc_list.'.$dlc)<br>
                                @endforeach
                            @else
                                —
                            @endif
                        </td>
                        <td>@lang('general.'.$accessory->game)</td>
                        <td style="white-space: nowrap" class="right-align">
                            <a href="{{ route('accessories') }}/edit/{{ $accessory->id }}" class="mdc-icon-button material-icons notranslate">edit</a>
                            <a href="{{ route('accessories') }}/toggle/{{ $accessory->id }}" class="mdc-icon-button material-icons notranslate">
                                visibility_{{ $accessory->active ? 'off' : 'on' }}
                            </a>
                            <a href="{{ route('accessories') }}/copy/{{ $accessory->id }}" class="mdc-icon-button material-icons notranslate"
                               onclick="return confirm('Створити копію аксесуару?')">file_copy</a>
                            <a href="{{ route('accessories') }}/delete/{{ $accessory->id }}" class="mdc-icon-button material-icons notranslate"
                               onclick="return confirm('Видалити аксесуар?')">delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{ $accessories->appends(['q' => Request::input('q')])->links('layout.pagination') }}

    <div class="fixed-action-btn">
        <a class="mdc-fab tooltipped" data-tooltip="Додати новий аксесуар" href="{{ route('accessories') }}/add">
            <span class="material-icons mdc-fab__icon">add</span>
        </a>
    </div>

@endsection