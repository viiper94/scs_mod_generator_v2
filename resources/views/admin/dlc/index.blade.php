@extends('admin.layout.admin')

@section('content')

    <div class="row" style="width: 100%;">
        <table class="highlight col s12 m10 offset-m1 responsive-table">
            <thead>
                <th>Назва</th>
                <th>Name</th>
                <th>Гра</th>
                <th></th>
            </thead>
            <tbody>
            @foreach($dlc as $item)
                <tr @if(!$item->active)class="grey darken-2 black-text" @endif>
                    <td>@lang('dlc_list.'.$item->name)</td>
                    <td>{{ $item->name }}</td>
                    <td>@lang('general.'.$item->game)</td>
                    <td style="white-space: nowrap" class="right-align">
                        <a href="{{ route('dlc') }}/delete/{{ $item->id }}" class="mdc-button mdc-ripple mdc-button--raised red white-text"
                           onclick="return confirm('Видалити DLC?')">
                            <i class="material-icons mdc-button__icon notranslate">delete</i>
                        </a>
                        <a href="{{ route('dlc') }}/toggle/{{ $item->id }}" class="mdc-button mdc-ripple mdc-button--raised blue">
                            <i class="material-icons mdc-button__icon notranslate">visibility_{{ $item->active ? 'off' : 'on' }}</i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="fixed-action-btn tooltipped" data-tooltip="Додати нове DLC">
        <a class="mdc-fab mdc-ripple" href="{{ route('dlc') }}/add">
            <span class="material-icons mdc-fab__icon">add</span>
        </a>
    </div>

@endsection