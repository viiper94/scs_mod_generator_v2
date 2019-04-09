@extends('admin.layout.admin')

@section('navbar-content')

    @include('admin.search')

@endsection

@section('content')

    {{ $companies->appends(['q' => Request::input('q')])->links('layout.pagination') }}

    <div class="row no-margin">
        <div class="col m10 offset-m1 s12">
            @if(count($companies) > 0)
                <h5 class="light">Показано {{ count($companies) }} компаній</h5>
            @else
                <h5 class="light">Немає жодної компанії</h5>
            @endif
        </div>
    </div>

    <div class="row no-margin">
        <div class="col m10 offset-m1 s12">
            <table class="highlight responsive-table">
                <thead>
                <th>Назва</th>
                <th>Name</th>
                <th>DLC</th>
                <th>Гра</th>
                <th></th>
                </thead>
                <tbody>
                @foreach($companies as $company)
                    <tr @if(!$company->active)class="grey darken-2 black-text" @endif>
                        <td>@lang($company->game.'_companies_paints.'.$company->name)</td>
                        <td>{{ $company->name }}</td>
                        <td>
                            @if($company->isDLCContent())
                                @lang('dlc_list.'.$company->dlc->name)
                            @else
                                —
                            @endif
                        </td>
                        <td>@lang('general.'.$company->game)</td>
                        <td style="white-space: nowrap" class="right-align">
                            <a href="{{ route('companies') }}/edit/{{ $company->id }}" class="mdc-icon-button material-icons notranslate">edit</a>
                            <a href="{{ route('companies') }}/toggle/{{ $company->id }}" class="mdc-icon-button material-icons notranslate">
                                visibility_{{ $company->active ? 'off' : 'on' }}
                            </a>
                            <a href="{{ route('companies') }}/copy/{{ $company->id }}" class="mdc-icon-button material-icons notranslate"
                               onclick="return confirm('Створити копію компанії?')">file_copy</a>
                            <a href="{{ route('companies') }}/delete/{{ $company->id }}" class="mdc-icon-button material-icons notranslate"
                               onclick="return confirm('Видалити компанію?')">delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{ $companies->appends(['q' => Request::input('q')])->links('layout.pagination') }}

    <div class="fixed-action-btn">
        <a class="mdc-fab tooltipped" data-tooltip="Додати нову компанію" href="{{ route('companies') }}/add">
            <span class="material-icons mdc-fab__icon">add</span>
        </a>
    </div>

@endsection