@extends('admin.layout.admin')

@section('content')

    @if($errors->any())
        <div class="row" style="width: 100%;">
            <div class="col s12 m10 offset-m1">
                @include('admin.warning')
            </div>
        </div>
    @endif
    @if(session()->get('success'))
        <div class="row" style="width: 100%;">
            <div class="col s12 m10 offset-m1">
                @include('admin.success')
            </div>
        </div>
    @endif

    <div class="row" style="width: 100%;">
        <div class="col s12 m10 offset-m1">
            <div class="card-panel search">
                <form method="get">
                    <div class="input-field no-margin">
                        <i class="material-icons prefix">search</i>
                        <input type="search" name="q" placeholder="Шукати шассі">
                    </div>
                </form>
            </div>
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
                                @if($chassis->with_accessory)<i class="material-icons mdc-button__icon notranslate">category</i>@endif
                                @if($chassis->with_paint_job)<i class="material-icons mdc-button__icon notranslate">texture</i>@endif
                                {{ $chassis->alias }}
                            </p>
                        </div>
                        <div class="card-action">
                            <a href="{{ route('trailers') }}/edit/{{ $chassis->id }}" class="mdc-button mdc-button--raised mdc-ripple black-text">
                                <i class="material-icons mdc-button__icon notranslate">edit</i>Редагувати
                            </a>
                            <a href="{{ route('trailers') }}/delete/{{ $chassis->id }}" class="mdc-button mdc-ripple mdc-button--raised red white-text"
                                onclick="return confirm('Видалити причіп?')">
                                <i class="material-icons mdc-button__icon notranslate">delete</i>Видалити
                            </a>
                            <a href="{{ route('trailers') }}/toggle/{{ $chassis->id }}" class="mdc-button mdc-ripple">
                                <i class="material-icons mdc-button__icon notranslate">visibility_{{ $chassis->active ? 'off' : 'on' }}</i>
                                {{ $chassis->active ? 'Сховати' : 'Показати' }}
                            </a>
                            <a href="{{ route('trailers') }}/copy/{{ $chassis->id }}" class="mdc-button mdc-ripple"
                               onclick="return confirm('Створити копію причіпа?')">
                                <i class="material-icons mdc-button__icon notranslate">file_copy</i>Копіювати
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="fixed-action-btn tooltipped" data-tooltip="Додати нове шассі">
        <a class="mdc-fab mdc-ripple" href="{{ route('trailers') }}/add">
            <span class="material-icons mdc-fab__icon">add</span>
        </a>
    </div>

@endsection