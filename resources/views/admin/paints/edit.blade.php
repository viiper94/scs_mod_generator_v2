@extends('admin.layout.admin')

@section('content')

    
    <div class="flex-center" style="flex: 1; align-items: center; flex-direction: column;">

        <div class="card" style="width: 600px;">
            <form method="post">
                @csrf
                <div class="card-content">
                    <div class="row">
                        <h5 class="card-title center">
                            @if($paint->game && $paint->alias)
                                @lang($paint->game.'_companies_paints.'.$paint->alias)
                            @else
                                Додати новий скін
                            @endif
                        </h5>
                    </div>
                    <div class="row" style="margin-left: 1rem;">
                        <p class="col s6 center">
                            <label>
                                <input class="with-gap" name="game" type="radio" value="ets2" @if($paint->game == 'ets2')checked @endif>
                                <span>ETS2</span>
                            </label>
                        </p>
                        <p class="col s6 center">
                            <label>
                                <input class="with-gap" name="game" type="radio" value="ats" @if($paint->game == 'ats')checked @endif>
                                <span>ATS</span>
                            </label>
                        </p>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 no-margin">
                            <input id="def" type="text" name="def" value="{{ $paint->def }}" required>
                            <label for="def">Def*</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 no-margin">
                            <input id="alias" type="text" name="alias" value="{{ $paint->alias }}" required>
                            <label for="alias">Alias*</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 no-margin">
                            <input id="look" type="text" name="look" value="{{ $paint->look }}" required>
                            <label for="look">Look*</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 no-margin">
                            <input id="chassis" type="text" name="chassis" value="{{ $paint->chassis }}">
                            <label for="chassis">Chassis</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 no-margin wheels">
                            <select name="dlc_id">
                                <option value="">Без DLC</option>
                                @foreach($dlc as $item)
                                    <option value="{{ $item->id }}"
                                        @if($paint->dlc_id == $item->id) selected @endif>@lang('dlc_list.'.$item->name)
                                    </option>
                                @endforeach
                            </select>
                            <label>DLC</label>
                        </div>
                    </div>
                    <div class="row" style="margin-left: 1rem;">
                        <p>
                            <label>
                                <input type="checkbox" class="filled-in" name="active" {{ $paint->active ? 'checked' : '' }}>
                                <span>Активний скін</span>
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