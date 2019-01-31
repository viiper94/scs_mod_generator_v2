@extends('admin.layout.admin')

@section('content')

    
    <div class="flex-center" style="flex: 1; align-items: center; flex-direction: column;">

        <div class="card" style="width: 600px;">
            <form method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-content">
                    <div class="row">
                        <h5 class="card-title center">
                            @if($chassis->game && $chassis->alias)
                                @lang($chassis->game.'_trailers.'.$chassis->alias)
                            @else
                                Додати нове шассі
                            @endif
                        </h5>
                    </div>
                    <div class="row" style="margin-left: 1rem;">
                        <p class="col s6 center">
                            <label>
                                <input class="with-gap" name="game" type="radio" value="ets2" @if($chassis->game == 'ets2')checked @endif>
                                <span>ETS2</span>
                            </label>
                        </p>
                        <p class="col s6 center">
                            <label>
                                <input class="with-gap" name="game" type="radio" value="ats" @if($chassis->game == 'ats')checked @endif>
                                <span>ATS</span>
                            </label>
                        </p>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 no-margin">
                            <input id="def" type="text" name="def" value="{{ $chassis->def }}" required>
                            <label for="def">Def*</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 no-margin">
                            <input id="alias" type="text" name="alias" value="{{ $chassis->alias }}" required>
                            <label for="alias">Alias*</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 no-margin">
                            <input id="alias_short" type="text" name="alias_short" value="{{ $chassis->alias_short }}">
                            <label for="alias_short">Short Alias</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 no-margin">
                            <input id="alias_short_paint" type="text" name="alias_short_paint" value="{{ $chassis->alias_short_paint }}">
                            <label for="alias_short_paint">Short Alias (Галерея)</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 no-margin">
                            <input id="axles" type="number" name="axles" value="{{ $chassis->axles }}" required>
                            <label for="axles">Кількість осей*</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 no-margin">
                            <input id="default_paint_job" type="text" name="default_paint_job" value="{{ $chassis->default_paint_job }}">
                            <label for="default_paint_job">Def стандартного скіна (якщо є)</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 no-margin wheels">
                            <select name="wheels_id" required>
                                @foreach($wheels as $wheel)
                                    <option value="{{ $wheel->id }}"
                                        @if($chassis->wheels_id == $wheel->id) selected @endif>@lang($wheel->game.'_wheels.'.$wheel->alias) (@lang('general.'.$wheel->game))
                                    </option>
                                @endforeach
                            </select>
                            <label>Колеса*</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 no-margin wheels">
                            <select name="dlc_id">
                                <option value="">Без DLC</option>
                                @foreach($dlc as $item)
                                    <option value="{{ $item->id }}"
                                        @if($chassis->dlc_id == $item->id) selected @endif>@lang('dlc_list.'.$item->name) (@lang('general.'.$item->game))
                                    </option>
                                @endforeach
                            </select>
                            <label>DLC</label>
                        </div>
                    </div>
                    <div class="row" style="margin-left: 1rem;">
                        <p>
                            <label>
                                <input type="checkbox" class="filled-in" name="supports_wheels" {{ $chassis->supports_wheels ? 'checked' : '' }}>
                                <span>Підтримує зміну колес</span>
                            </label>
                        </p>
                        <p>
                            <label>
                                <input type="checkbox" class="filled-in" name="coupled" {{ $chassis->coupled ? 'checked' : '' }}>
                                <span>Подвійний/потрійний причіп</span>
                            </label>
                        </p>
                        <p>
                            <label>
                                <input type="checkbox" class="filled-in" name="with_accessory" {{ $chassis->with_accessory ? 'checked' : '' }}>
                                <span>З аксесуаром</span>
                            </label>
                        </p>
                        <p>
                            <label>
                                <input type="checkbox" class="filled-in" name="with_paint_job" {{ $chassis->with_paint_job ? 'checked' : '' }}>
                                <span>Із скіном</span>
                            </label>
                        </p>
                        <p>
                            <label>
                                <input type="checkbox" class="filled-in" name="can_random" {{ $chassis->can_random ? 'checked' : '' }}>
                                <span>Використовувати для випадкового підбору</span>
                            </label>
                        </p>
                        <p>
                            <label>
                                <input type="checkbox" class="filled-in" name="mp_support" {{ $chassis->mp_support ? 'checked' : '' }}>
                                <span>Підтримується в МП</span>
                            </label>
                        </p>
                        <p>
                            <label>
                                <input type="checkbox" class="filled-in" name="active" {{ $chassis->active ? 'checked' : '' }}>
                                <span>Активний</span>
                            </label>
                        </p>
                    </div>
                </div>
                <div class="card-action">
                    <div class="row no-margin">
                        <button type="submit" class="mdc-button mdc-button--raised mdc-ripple col s12"><b>Зберегти</b></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection