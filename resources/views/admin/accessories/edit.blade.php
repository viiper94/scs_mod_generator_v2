@extends('admin.layout.admin')

@section('content')

    
    <div class="flex-center" style="flex: 1; align-items: center; flex-direction: column;">

        <div class="card" style="width: 600px;">
            <form method="post">
                @csrf
                <div class="card-content">
                    <div class="row">
                        <h5 class="card-title center">
                            @if($accessory->game && $accessory->alias)
                                @lang($accessory->game.'_accessories.'.$accessory->alias)
                            @else
                                Додати новий аксесуар
                            @endif
                        </h5>
                    </div>
                    <div class="row" style="margin-left: 1rem;">
                        <p class="col s6 center">
                            <label>
                                <input class="with-gap" name="game" type="radio" value="ets2" @if($accessory->game == 'ets2')checked @endif>
                                <span>ETS2</span>
                            </label>
                        </p>
                        <p class="col s6 center">
                            <label>
                                <input class="with-gap" name="game" type="radio" value="ats" @if($accessory->game == 'ats')checked @endif>
                                <span>ATS</span>
                            </label>
                        </p>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 no-margin">
                            <input id="def" type="text" name="def" value="{{ $accessory->def }}" required>
                            <label for="def">Def*</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 no-margin">
                            <input id="alias" type="text" name="alias" value="{{ $accessory->alias }}" required>
                            <label for="alias">Alias*</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 no-margin">
                            <input id="chassis" type="text" name="chassis" value="{{ $accessory->chassis }}">
                            <label for="chassis">Chassis</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 no-margin wheels">
                            <select name="dlc[]" multiple>
                                <option value="" disabled>Без DLC</option>
                                @foreach($dlc as $item)
                                    @php $acc_dlcs = $accessory->getDLCs(true); @endphp
                                    <option value="{{ $item->id }}"
                                            @if(in_array($item->name, $acc_dlcs)) selected @endif>@lang('dlc_list.'.$item->name)</option>
                                @endforeach
                            </select>
                            <label>DLC</label>
                        </div>
                    </div>
                    <div class="row" style="margin-left: 1rem;">
                        <p>
                            <label>
                                <input type="checkbox" class="filled-in" name="active" {{ $accessory->active ? 'checked' : '' }}>
                                <span>Активний аксесуар</span>
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