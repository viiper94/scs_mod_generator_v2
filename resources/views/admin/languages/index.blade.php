@extends('admin.layout.admin')

@section('content')

    <div class="row" style="width: 100%;">
        <table class="highlight col s12 m10 offset-m1 responsive-table">
            <thead>
                <th></th>
                <th>Назва</th>
                <th>Локаль</th>
                <th></th>
            </thead>
            <tbody>
            @foreach($languages as $item)
                <tr @if(!$item->active)class="grey darken-2 black-text" @endif>
                    <td><img src="{{ asset('assets/img/langs/'.$item->locale.'.png') }}" style="width: 32px; height: 32px;"></td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->locale }}</td>
                    <td style="white-space: nowrap" class="right-align">
                        @if($item->locale == 'en')
                            <a href="{{ route('languages') }}/upload"
                               class="mdc-icon-button material-icons notranslate green-text"
                               onclick="return confirm('Вивантажити файл en.json на платформу OneSky?')">file_upload</a>
                        @else
                            <a href="{{ route('languages') }}/download/{{ $item->locale }}"
                               class="mdc-icon-button material-icons notranslate"
                               onclick="return confirm('Завантажити переклади з платформи OneSky?')">file_download</a>
                        @endif
                        <a href="{{ route('languages') }}/toggle/{{ $item->id }}" class="mdc-icon-button material-icons notranslate">
                            visibility_{{ $item->active ? 'off' : 'on' }}
                        </a>
                        <a href="{{ route('languages') }}/delete/{{ $item->id }}" class="mdc-icon-button material-icons notranslate"
                           onclick="return confirm('Видалити мову?')">delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="fixed-action-btn">
        <a class="mdc-fab tooltipped" data-tooltip="Додати мову" href="{{ route('languages') }}/add">
            <span class="material-icons mdc-fab__icon">add</span>
        </a>
    </div>

@endsection