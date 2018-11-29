@extends('admin.layout.admin')

@section('content')

    @include('admin.search')

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
                            <a href="{{ route('companies') }}/edit/{{ $company->id }}" class="mdc-button mdc-button--raised mdc-ripple">
                                <i class="material-icons mdc-button__icon notranslate">edit</i>
                            </a>
                            <a href="{{ route('companies') }}/delete/{{ $company->id }}" class="mdc-button mdc-ripple mdc-button--raised red"
                               onclick="return confirm('Видалити компанію?')">
                                <i class="material-icons mdc-button__icon notranslate">delete</i>
                            </a>
                            <a href="{{ route('companies') }}/toggle/{{ $company->id }}" class="mdc-button mdc-ripple mdc-button--raised blue">
                                <i class="material-icons mdc-button__icon notranslate">visibility_{{ $company->active ? 'off' : 'on' }}</i>
                            </a>
                            <a href="{{ route('companies') }}/copy/{{ $company->id }}" class="mdc-button mdc-ripple mdc-button--raised green"
                               onclick="return confirm('Створити копію компанії?')">
                                <i class="material-icons mdc-button__icon notranslate">file_copy</i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{ $companies->appends(['q' => Request::input('q')])->links('layout.pagination') }}

    <div class="fixed-action-btn tooltipped" data-tooltip="Додати нову компанію">
        <a class="mdc-fab mdc-ripple" href="{{ route('companies') }}/add">
            <span class="material-icons mdc-fab__icon">add</span>
        </a>
    </div>

@endsection