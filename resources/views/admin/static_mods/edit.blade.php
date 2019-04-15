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
                    <div class="row center" style="margin-left: 1rem;">
                        <div class="mdc-form-field mdc-form-field--inline">
                            <label for="game_ets2">ETS2</label>
                            <div class="mdc-radio">
                                <input class="mdc-radio__native-control" type="radio" id="game_ets2" name="game"
                                       value="ets2" @if($mod->game == 'ets2') checked @endif>
                                <div class="mdc-radio__background">
                                    <div class="mdc-radio__outer-circle"></div>
                                    <div class="mdc-radio__inner-circle"></div>
                                </div>
                            </div>
                            <div class="mdc-radio">
                                <input class="mdc-radio__native-control" type="radio" id="game_ats" name="game"
                                       value="ats" @if($mod->game == 'ats') checked @endif>
                                <div class="mdc-radio__background">
                                    <div class="mdc-radio__outer-circle"></div>
                                    <div class="mdc-radio__inner-circle"></div>
                                </div>
                            </div>
                            <label for="game_ats">ATS</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col m12">
                            <label>Завантажте файл (.scs)*</label>
                            <div class="file-field input-field mdc-button mdc-button--outlined">
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
                            <div class="file-field input-field mdc-button mdc-button--outlined">
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
                    <div class="row no-margin">
                        <div class="mdc-text-field mdc-text-field--outlined">
                            <input type="url" id="external_link" class="mdc-text-field__input" name="external_link" value="{{ $mod->external_link }}">
                            <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label for="external_link" class="mdc-floating-label">Зовнішнє посилання</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row no-margin">
                        <div class="mdc-text-field mdc-text-field--outlined">
                            <input type="text" id="title_en" class="mdc-text-field__input" name="title_en" value="{{ $mod->title_en }}" required>
                            <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label for="title_en" class="mdc-floating-label">Назва EN</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row no-margin">
                        <div class="mdc-text-field mdc-text-field--outlined">
                            <input type="text" id="title_ru" class="mdc-text-field__input" name="title_ru" value="{{ $mod->title_ru }}" required>
                            <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label for="title_ru" class="mdc-floating-label">Назва РУС</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row no-margin">
                        <div class="mdc-text-field mdc-text-field--textarea mdc-text-field--outlined">
                            <textarea id="description_en" class="mdc-text-field__input" name="description_en" rows="10">{{ $mod->description_en }}</textarea>
                            <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label for="description_en" class="mdc-floating-label">Опис EN</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row no-margin">
                        <div class="mdc-text-field mdc-text-field--textarea mdc-text-field--outlined">
                            <textarea id="description_ru" class="mdc-text-field__input" name="description_ru" rows="10">{{ $mod->description_ru }}</textarea>
                            <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label for="description_ru" class="mdc-floating-label">Опис РУС</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row no-margin">
                        <div class="mdc-text-field mdc-text-field--outlined">
                            <input type="text" id="tested_ver" class="mdc-text-field__input" name="tested_ver" value="{{ $mod->tested_ver }}" required>
                            <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label for="tested_ver" class="mdc-floating-label">Протестовано на версії гри</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                            </div>
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
                    <div class="row no-margin">
                        <div class="mdc-form-field col s12">
                            <div class="mdc-checkbox">
                                <input type="checkbox"
                                       class="mdc-checkbox__native-control"
                                       id="active" name="active" {{ $mod->active ? 'checked' : '' }}>
                                <div class="mdc-checkbox__background">
                                    <svg class="mdc-checkbox__checkmark"
                                         viewBox="0 0 24 24">
                                        <path class="mdc-checkbox__checkmark-path"
                                              fill="none"
                                              d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
                                    </svg>
                                    <div class="mdc-checkbox__mixedmark"></div>
                                </div>
                            </div>
                            <label for="active">Активний</label>
                        </div>
                    </div>
                </div>
                <div class="card-action">
                    <div class="row no-margin">
                        <button type="submit" class="mdc-button mdc-button--unelevated col s12"><b>Зберегти</b></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection