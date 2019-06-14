@extends('admin.layout.admin')

@section('content')


    <form method="post" enctype="multipart/form-data">
        <div class="flex-center" style="flex: 1; align-items: center; flex-direction: column;">

            <div class="card" style="width: 600px;">
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
                    <div class="row center" style="margin-left: 1rem;">
                        <div class="mdc-form-field mdc-form-field--inline">
                            <label for="game_ets2">ETS2</label>
                            <div class="mdc-radio">
                                <input class="mdc-radio__native-control" type="radio" id="game_ets2" name="game"
                                       value="ets2" @if($chassis->game == 'ets2') checked @endif>
                                <div class="mdc-radio__background">
                                    <div class="mdc-radio__outer-circle"></div>
                                    <div class="mdc-radio__inner-circle"></div>
                                </div>
                            </div>
                            <div class="mdc-radio">
                                <input class="mdc-radio__native-control" type="radio" id="game_ats" name="game"
                                       value="ats" @if($chassis->game == 'ats') checked @endif>
                                <div class="mdc-radio__background">
                                    <div class="mdc-radio__outer-circle"></div>
                                    <div class="mdc-radio__inner-circle"></div>
                                </div>
                            </div>
                            <label for="game_ats">ATS</label>
                        </div>
                    </div>
                    <div class="row no-margin">
                        <div class="mdc-text-field mdc-text-field--outlined">
                            <input type="text" id="alias" class="mdc-text-field__input" name="alias" value="{{ $chassis->alias }}" required>
                            <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label for="alias" class="mdc-floating-label">Alias</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row no-margin">
                        <div class="mdc-text-field mdc-text-field--outlined">
                            <input type="text" id="alias_short" class="mdc-text-field__input" name="alias_short" value="{{ $chassis->alias_short }}">
                            <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label for="alias_short" class="mdc-floating-label">Short Alias</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row no-margin">
                        <div class="mdc-text-field mdc-text-field--outlined">
                            <input type="text" id="accessory_subgroup" class="mdc-text-field__input" name="accessory_subgroup" value="{{ $chassis->accessory_subgroup }}">
                            <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label for="accessory_subgroup" class="mdc-floating-label">Accessory subgroup</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row no-margin">
                        <div class="mdc-text-field mdc-text-field--outlined">
                            <input type="text" id="alias_short_paint" class="mdc-text-field__input" name="alias_short_paint" value="{{ $chassis->alias_short_paint }}">
                            <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label for="alias_short_paint" class="mdc-floating-label">Short Alias (Галерея)</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row no-margin">
                        <div class="mdc-text-field mdc-text-field--outlined">
                            <input type="text" id="default_paint_job" class="mdc-text-field__input" name="default_paint_job" value="{{ $chassis->default_paint_job }}">
                            <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label for="default_paint_job" class="mdc-floating-label">Def стандартного скіна (якщо є)</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                            </div>
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
                    <div class="row no-margin" style="margin-left: 1rem;">
                        <div class="mdc-form-field col s12">
                            <div class="mdc-checkbox">
                                <input type="checkbox"
                                       class="mdc-checkbox__native-control"
                                       id="supports_wheels" name="supports_wheels" {{ $chassis->supports_wheels ? 'checked' : '' }}>
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
                            <label for="supports_wheels">Підтримує зміну колес</label>
                        </div>
                        <div class="mdc-form-field col s12">
                            <div class="mdc-checkbox">
                                <input type="checkbox"
                                       class="mdc-checkbox__native-control"
                                       id="coupled" name="coupled" {{ $chassis->coupled ? 'checked' : '' }}>
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
                            <label for="coupled">Подвійний/потрійний причіп</label>
                        </div>
                        <div class="mdc-form-field col s12">
                            <div class="mdc-checkbox">
                                <input type="checkbox"
                                       class="mdc-checkbox__native-control"
                                       id="with_accessory" name="with_accessory" {{ $chassis->with_accessory ? 'checked' : '' }}>
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
                            <label for="with_accessory">З аксесуаром</label>
                        </div>
                        <div class="mdc-form-field col s12">
                            <div class="mdc-checkbox">
                                <input type="checkbox"
                                       class="mdc-checkbox__native-control"
                                       id="with_paint_job" name="with_paint_job" {{ $chassis->with_paint_job ? 'checked' : '' }}>
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
                            <label for="with_paint_job">Із скіном</label>
                        </div>
{{--                        <div class="mdc-form-field col s12">--}}
{{--                            <div class="mdc-checkbox">--}}
{{--                                <input type="checkbox"--}}
{{--                                       class="mdc-checkbox__native-control"--}}
{{--                                       id="trailer_owned" name="trailer_owned" {{ $chassis->trailer_owned ? 'checked' : '' }}>--}}
{{--                                <div class="mdc-checkbox__background">--}}
{{--                                    <svg class="mdc-checkbox__checkmark"--}}
{{--                                         viewBox="0 0 24 24">--}}
{{--                                        <path class="mdc-checkbox__checkmark-path"--}}
{{--                                              fill="none"--}}
{{--                                              d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>--}}
{{--                                    </svg>--}}
{{--                                    <div class="mdc-checkbox__mixedmark"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <label for="trailer_owned">trailer_owned</label>--}}
{{--                        </div>--}}
                        <div class="mdc-form-field col s12">
                            <div class="mdc-checkbox">
                                <input type="checkbox"
                                       class="mdc-checkbox__native-control"
                                       id="can_random" name="can_random" {{ $chassis->can_random ? 'checked' : '' }}>
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
                            <label for="can_random">Використовувати для випадкового підбору</label>
                        </div>
                        <div class="mdc-form-field col s12">
                            <div class="mdc-checkbox">
                                <input type="checkbox"
                                       class="mdc-checkbox__native-control"
                                       id="can_empty" name="can_empty" {{ $chassis->can_empty ? 'checked' : '' }}>
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
                            <label for="can_empty">Може бути пустим</label>
                        </div>
                        <div class="mdc-form-field col s12">
                            <div class="mdc-checkbox">
                                <input type="checkbox"
                                       class="mdc-checkbox__native-control"
                                       id="can_all_companies" name="can_all_companies" {{ $chassis->can_all_companies ? 'checked' : '' }}>
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
                            <label for="can_all_companies">Має скіни компаній</label>
                        </div>
                        <div class="mdc-form-field col s12">
                            <div class="mdc-checkbox">
                                <input type="checkbox"
                                       class="mdc-checkbox__native-control"
                                       id="mp_support" name="mp_support" {{ $chassis->mp_support ? 'checked' : '' }}>
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
                            <label for="mp_support">Підтримується в МП</label>
                        </div>
                        <div class="mdc-form-field col s12">
                            <div class="mdc-checkbox">
                                <input type="checkbox"
                                       class="mdc-checkbox__native-control"
                                       id="active" name="active" {{ $chassis->active ? 'checked' : '' }}>
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
{{--                <div class="card-action">--}}
{{--                    <div class="row no-margin">--}}
{{--                        <button type="submit" class="mdc-button mdc-button--unelevated col s12"><b>Зберегти</b></button>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>

            <div class="trailers">
                <div class="card" style="width: 600px;" id="trailer-0" data-id="0">
                    <div class="card-content">
                        <div class="row">
                            <h5 class="card-title center">Основний причіп</h5>
                        </div>
                        <div class="row no-margin">
                            <div class="mdc-text-field mdc-text-field--outlined">
                                <input type="text" id="def_0" class="mdc-text-field__input" name="def_0" value="{{ $chassis->def }}" required>
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label for="def_0" class="mdc-floating-label">Def</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row no-margin">
                            <div class="mdc-text-field mdc-text-field--outlined">
                                <input type="text" id="body_0" class="mdc-text-field__input" name="body_0" value="{{ $chassis->body }}">
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label for="body_0" class="mdc-floating-label">Body</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row no-margin">
                            <div class="mdc-text-field mdc-text-field--outlined">
                                <input type="number" id="axles_0" class="mdc-text-field__input" name="axles_0" value="{{ $chassis->axles }}" required>
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label for="axles_0" class="mdc-floating-label">Кількість осей</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row no-margin accessories">
                            <div class="col s12"><p>Аксесуари</p></div>
                            <div id="accessory-0-0">
                                <div class="col s12 m4">
                                    <div class="mdc-text-field mdc-text-field--outlined">
                                        <input type="text" id="acc_0_0_name" class="mdc-text-field__input" name="accessories[0][0][name]" value="{{ $chassis->axles }}">
                                        <div class="mdc-notched-outline">
                                            <div class="mdc-notched-outline__leading"></div>
                                            <div class="mdc-notched-outline__notch">
                                                <label for="acc_0_0_name" class="mdc-floating-label">Назва</label>
                                            </div>
                                            <div class="mdc-notched-outline__trailing"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s11 m7">
                                    <div class="mdc-text-field mdc-text-field--outlined">
                                        <input type="text" id="acc_0_0_def" class="mdc-text-field__input" name="accessories[0][0][def]" value="{{ $chassis->axles }}">
                                        <div class="mdc-notched-outline">
                                            <div class="mdc-notched-outline__leading"></div>
                                            <div class="mdc-notched-outline__notch">
                                                <label for="acc_0_0_def" class="mdc-floating-label">def</label>
                                            </div>
                                            <div class="mdc-notched-outline__trailing"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s1" style="line-height: 80px;">
                                    <a style="cursor: pointer;" class="acc-remove"><i class="material-icons notranslate red-text">minimize</i></a>
                                </div>
                            </div>
                        </div>
                        <a style="cursor: pointer;" class="col s12 mdc-button acc-add" data-current-index="0">Додати аксесуар</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <a style="cursor: pointer;" class="btn mdc-button mdc-button--unelevated" id="trailer-add" data-current-index="0">Додати причіп</a>
            </div>
        </div>

        <div class="fixed-action-btn">
            <button class="mdc-fab tooltipped" type="submit" data-tooltip="Зберегти">
                <span class="material-icons mdc-fab__icon">save</span>
            </button>
        </div>
    </form>

    <script type="text/html" id="acc_template">
        <div id="accessory-%t_id%-%a_id%">
            <div class="col s12 m4">
                <div class="mdc-text-field mdc-text-field--outlined">
                    <input type="text" id="acc_%t_id%_%a_id%_name" class="mdc-text-field__input" name="accessories[%t_id%][%a_id%][name]">
                    <div class="mdc-notched-outline">
                        <div class="mdc-notched-outline__leading"></div>
                        <div class="mdc-notched-outline__notch">
                            <label for="acc_%t_id%_%a_id%_name" class="mdc-floating-label">Назва</label>
                        </div>
                        <div class="mdc-notched-outline__trailing"></div>
                    </div>
                </div>
            </div>
            <div class="col s11 m7">
                <div class="mdc-text-field mdc-text-field--outlined">
                    <input type="text" id="acc_%t_id%_%a_id%_def" class="mdc-text-field__input" name="accessories[%t_id%][%a_id%][def]">
                    <div class="mdc-notched-outline">
                        <div class="mdc-notched-outline__leading"></div>
                        <div class="mdc-notched-outline__notch">
                            <label for="acc_%t_id%_%a_id%_def" class="mdc-floating-label">def</label>
                        </div>
                        <div class="mdc-notched-outline__trailing"></div>
                    </div>
                </div>
            </div>
            <div class="col s1" style="line-height: 80px;">
                <a style="cursor: pointer;" class="acc-remove"><i class="material-icons notranslate red-text">minimize</i></a>
            </div>
        </div>
    </script>

    <script type="text/html" id="trailer_template">
        <div class="card" style="width: 600px;" id="trailer-%t_id%" data-id="%t_id%">
            <div class="card-content">
                <div class="row">
                    <h5 class="card-title center">причіп</h5>
                </div>
                <div class="row no-margin">
                    <div class="mdc-text-field mdc-text-field--outlined">
                        <input type="text" id="def_%t_id%" class="mdc-text-field__input" name="def_%t_id%">
                        <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                                <label for="def_%id%" class="mdc-floating-label">Def</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                        </div>
                    </div>
                </div>
                <div class="row no-margin">
                    <div class="mdc-text-field mdc-text-field--outlined">
                        <input type="text" id="body_%t_id%" class="mdc-text-field__input" name="body_%t_id%">
                        <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                                <label for="body_%t_id%" class="mdc-floating-label">Body</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                        </div>
                    </div>
                </div>
                <div class="row no-margin">
                    <div class="mdc-text-field mdc-text-field--outlined">
                        <input type="number" id="axles_%t_id%" class="mdc-text-field__input" name="axles_%t_id%">
                        <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                                <label for="axles_%t_id%" class="mdc-floating-label">Кількість осей</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                        </div>
                    </div>
                </div>
                <div class="row no-margin accessories">
                    <div class="col s12"><p>Аксесуари</p></div>
                    <div id="accessory-%t_id%-0">
                        <div class="col s12 m4">
                            <div class="mdc-text-field mdc-text-field--outlined">
                                <input type="text" id="acc_%t_id%_0_name" class="mdc-text-field__input" name="accessories[%t_id%][0][name]">
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label for="acc_%t_id%_0_name" class="mdc-floating-label">Назва</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col s11 m7">
                            <div class="mdc-text-field mdc-text-field--outlined">
                                <input type="text" id="acc_%t_id%_0_def" class="mdc-text-field__input" name="accessories[%t_id%][0][def]">
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label for="acc_%t_id%_0_def" class="mdc-floating-label">def</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col s1" style="line-height: 80px;">
                            <a style="cursor: pointer;" class="acc-remove"><i class="material-icons notranslate red-text">minimize</i></a>
                        </div>
                    </div>
                </div>
                <a style="cursor: pointer;" class="col s12 mdc-button acc-add" data-current-index="0">Додати аксесуар</a>
            </div>
            <div class="card-action">
                <a style="cursor: pointer;" class="btn mdc-button mdc-button--unelevated trailer-remove">Видалити причіп</a>
            </div>
        </div>
    </script>

@endsection