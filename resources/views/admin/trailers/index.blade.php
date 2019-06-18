@extends('admin.layout.admin')

@section('navbar-content')
    @include('admin.search')
@endsection

@section('content')

    {{ $chassis_list->appends(['q' => Request::input('q')])->links('layout.pagination') }}

    <div class="row no-margin">
        <div class="col s12 m10 offset-m1">
            @if(count($chassis_list) > 0)
                <h5 class="light">Показано {{ count($chassis_list) }} шассі</h5>
            @else
                <h5 class="light">Немає жодного шассі</h5>
            @endif
        </div>
    </div>
    <div class="row">
        @foreach($chassis_list as $chassis)
            <div class="col s12 m10 offset-m1">
                <div class="card horizontal hoverable">
                    <div class="card-image no-img_horizontal"
                         style="background-image: url(/assets/img/trailers/{{ $chassis->alias_short }}/{{$chassis->alias_short}}.jpg );
                         @if(!$chassis->active)opacity: .2; @endif"></div>
                    <div class="card-stacked">
                        <div class="card-content">
                            <h5 class="card-title">
                                @if(!$chassis->active) <i class="material-icons mdc-button__icon notranslate">visibility_off</i> @endif
                                @lang($chassis->game.'_trailers.'.$chassis->alias)
                            </h5>
                            <p style="line-height: 24px;">
                                @if($chassis->with_accessory)<i class="material-icons mdc-button__icon notranslate left">category</i>@endif
                                @if($chassis->with_paint_job)<i class="material-icons mdc-button__icon notranslate left">texture</i>@endif
                                @if(!$chassis->mp_support)<s><b>MP</b></s>@endif
                                {{ $chassis->alias }}
                            </p>
                        </div>
                        <div class="card-action">
                            <a href="{{ route('trailers') }}/edit/{{ $chassis->id }}" class="mdc-button mdc-button--unelevated btn edit-chassis">
                                <i class="material-icons mdc-button__icon notranslate">edit</i>Редагувати
                            </a>
                            <a href="{{ route('trailers') }}/delete/{{ $chassis->id }}" class="mdc-button mdc-button--unelevated red btn white-text"
                                onclick="return confirm('Видалити причіп?')">
                                <i class="material-icons mdc-button__icon notranslate">delete</i>Видалити
                            </a>
                            <a href="{{ route('trailers') }}/toggle/{{ $chassis->id }}" class="mdc-button mdc-button--outlined btn">
                                <i class="material-icons mdc-button__icon notranslate">visibility_{{ $chassis->active ? 'off' : 'on' }}</i>
                                {{ $chassis->active ? 'Сховати' : 'Показати' }}
                            </a>
                            <a href="{{ route('trailers') }}/copy/{{ $chassis->id }}" class="mdc-button mdc-button--outlined  btn"
                               onclick="return confirm('Створити копію причіпа?')">
                                <i class="material-icons mdc-button__icon notranslate">file_copy</i>Копіювати
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{ $chassis_list->appends(['q' => Request::input('q')])->links('layout.pagination') }}

    <div class="fixed-action-btn">
        <a class="mdc-fab tooltipped" data-tooltip="Додати нове шассі" href="{{ route('trailers') }}/add">
            <span class="material-icons mdc-fab__icon">add</span>
        </a>
    </div>

@endsection