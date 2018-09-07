@extends('admin.layout.admin')

@section('content')

    <div class="row no-margin">
        <div class="col s12 m10 offset-m1">
            @if(count($wheels) > 0)
                <h5 class="light">Показано {{ count($wheels) }} колес</h5>
            @else
                <h5 class="light">Немає жодного колеса</h5>
            @endif
        </div>
    </div>
    <div class="row">
        @foreach($wheels as $wheel)
            <div class="col s12 m10 offset-m1">
                <div class="card horizontal hoverable">
                    <div class="card-image no-img_horizontal"
                         style="background-image: url(/assets/img/wheels/{{ $wheel->game }}/{{ $wheel->alias }}.jpg );
                         @if(!$wheel->active)opacity: .2; @endif"></div>
                    <div class="card-stacked">
                        <div class="card-content">
                            <h5 class="card-title">
                                @if(!$wheel->active) <i class="material-icons mdc-button__icon notranslate">visibility_off</i> @endif
                                @lang($wheel->game.'_wheels.'.$wheel->alias)
                            </h5>
                            <p>{{ $wheel->alias }}</p>
                        </div>
                        <div class="card-action">
                            <a href="{{ route('wheels') }}/edit/{{ $wheel->id }}" class="mdc-button mdc-button--raised mdc-ripple black-text">
                                <i class="material-icons mdc-button__icon notranslate">edit</i>Редагувати
                            </a>
                            <a href="{{ route('wheels') }}/delete/{{ $wheel->id }}" class="mdc-button mdc-ripple mdc-button--raised red white-text"
                                onclick="return confirm('Видалити колесо?')">
                                <i class="material-icons mdc-button__icon notranslate">delete</i>Видалити
                            </a>
                            <a href="{{ route('wheels') }}/toggle/{{ $wheel->id }}" class="mdc-button mdc-ripple">
                                <i class="material-icons mdc-button__icon notranslate">visibility_{{ $wheel->active ? 'off' : 'on' }}</i>
                                {{ $wheel->active ? 'Сховати' : 'Показати' }}
                            </a>
                            <a href="{{ route('wheels') }}/copy/{{ $wheel->id }}" class="mdc-button mdc-ripple"
                               onclick="return confirm('Створити копію колеса?')">
                                <i class="material-icons mdc-button__icon notranslate">file_copy</i>Копіювати
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="fixed-action-btn tooltipped" data-tooltip="Додати нове колесо">
        <a class="mdc-fab mdc-ripple" href="{{ route('wheels') }}/add">
            <span class="material-icons mdc-fab__icon">add</span>
        </a>
    </div>

@endsection