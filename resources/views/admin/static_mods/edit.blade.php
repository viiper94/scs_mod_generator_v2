@extends('admin.layout.admin')

@section('content')


    <div class="flex-center" style="flex: 1; align-items: center; flex-direction: column;">

        <div class="card" style="width: 600px;">
            <form method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-content">
                    <div class="row">
                        <h5 class="card-title center">
                            @if($mod->game && $mod->title)
                                {{ $mod->title }}
                            @else
                                Додати новий мод
                            @endif
                        </h5>
                    </div>
                    <div class="row" style="margin-left: 1rem;">
                        <p class="col s6 center">
                            <label>
                                <input class="with-gap" name="game" type="radio" value="ets2" @if($mod->game == 'ets2')checked @endif>
                                <span>ETS2</span>
                            </label>
                        </p>
                        <p class="col s6 center">
                            <label>
                                <input class="with-gap" name="game" type="radio" value="ats" @if($mod->game == 'ats')checked @endif>
                                <span>ATS</span>
                            </label>
                        </p>
                    </div>
                    <div class="row">
                        <div class="col m12">
                            <label>Завантажте файл (.scs)*</label>
                            <div class="file-field input-field mdc-button mdc-button--raised">
                                <div class="input-wrapper">
                                    <i class="material-icons mdc-button__icon notranslate" style="font-size: 2em; padding-top: 2px;">add_file</i>
                                    <input type="file" name="file" id="file" accept=".scs, .zip">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path right" type="text" id="image-path" placeholder="Завантажити файл" readonly>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col m12">
                            <label>@lang('general.image_upload')</label>
                            <div class="file-field input-field mdc-button mdc-button--raised">
                                <div class="input-wrapper">
                                    <i class="material-icons mdc-button__icon notranslate" style="font-size: 2em; padding-top: 2px;">add_photo_alternate</i>
                                    <input type="file" name="img" id="image" accept="image/jpeg, image/png"
                                           data-size="@lang('validation.custom.img.max')"
                                           data-dimensions="@lang('validation.custom.img.dimensions')">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path right" type="text" id="image-path" placeholder="@lang('general.upload_image')" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 no-margin">
                            <input id="title_en" type="text" name="title_en" value="{{ $mod->title_en }}" required>
                            <label for="title_en">Назва EN*</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 no-margin">
                            <input id="title_ru" type="text" name="title_ru" value="{{ $mod->title_ru }}">
                            <label for="title_ru">Назва РУС</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 no-margin">
                            <textarea id="description_en" name="description_en"
                                      class="materialize-textarea">{{ $mod->description_en }}</textarea>
                            <label for="description_en">Опис EN</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 no-margin">
                            <textarea id="description_ru" name="description_ru"
                                      class="materialize-textarea">{{ $mod->description_ru }}</textarea>
                            <label for="description_ru">Опис РУС</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 no-margin">
                            <input id="tested_ver" type="text" name="tested_ver" value="{{ $mod->tested_ver }}" required>
                            <label for="tested_ver">Протестовано на версії гри*</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 no-margin wheels">
                            <select name="dlc[]" multiple>
                                <option value="" disabled>Без DLC</option>
                                @foreach($dlc as $item)
                                    @php $mod_dlcs = $mod->getDLCs(true); @endphp
                                    <option value="{{ $item->id }}"
                                            @if(in_array($item->name, $mod_dlcs)) selected @endif>@lang('dlc_list.'.$item->name)</option>
                                @endforeach
                            </select>
                            <label>DLC</label>
                        </div>
                    </div>
                    <div class="row" style="margin-left: 1rem;">
                        <p>
                            <label>
                                <input type="checkbox" class="filled-in" name="active" {{ $mod->active ? 'checked' : '' }}>
                                <span>Активний мод</span>
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