@extends('admin.layout.admin')

@section('content')


    <div class="flex-center" style="flex: 1; align-items: center; flex-direction: column;">

        <div class="card" style="width: 600px;">
            <form method="post">
                @csrf
                <div class="card-content">
                    <div class="row">
                        <h5 class="card-title center">
                            @if($company->game && $company->name)
                                @lang($company->game.'_companies_paints.'.$company->name)
                            @else
                                Додати нову компанію
                            @endif
                        </h5>
                    </div>
                    <div class="row" style="margin-left: 1rem;">
                        <p class="col s6 center">
                            <label>
                                <input class="with-gap" name="game" type="radio" value="ets2" @if($company->game == 'ets2')checked @endif>
                                <span>ETS2</span>
                            </label>
                        </p>
                        <p class="col s6 center">
                            <label>
                                <input class="with-gap" name="game" type="radio" value="ats" @if($company->game == 'ats')checked @endif>
                                <span>ATS</span>
                            </label>
                        </p>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 no-margin">
                            <input id="name" type="text" name="name" value="{{ $company->name }}" required>
                            <label for="name">Name*</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 no-margin wheels">
                            <select name="dlc_id">
                                <option value="">Без DLC</option>
                                @foreach($dlc as $item)
                                    <option value="{{ $item->id }}"
                                            @if($company->dlc_id == $item->id) selected @endif>@lang('dlc_list.'.$item->name) (@lang('general.'.$item->game))
                                    </option>
                                @endforeach
                            </select>
                            <label>DLC</label>
                        </div>
                    </div>
                    <div class="row" style="margin-left: 1rem;">
                        <p>
                            <label>
                                <input type="checkbox" class="filled-in" name="active" {{ $company->active ? 'checked' : '' }}>
                                <span>Активна компанія</span>
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