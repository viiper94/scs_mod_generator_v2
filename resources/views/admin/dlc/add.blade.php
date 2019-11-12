@extends('admin.layout.admin')

@section('content')


    <div class="flex-center" style="flex: 1; align-items: center; flex-direction: column;">

        <div class="card" style="width: 600px;">
            <form method="post">
                @csrf
                <div class="card-content">
                    <div class="row">
                        <h5 class="card-title center">Додати нове DLC</h5>
                    </div>
                    <div class="row center" style="margin-left: 1rem;">
                        <div class="mdc-form-field mdc-form-field--inline">
                            <label for="game_ets2">ETS2</label>
                            <div class="mdc-radio">
                                <input class="mdc-radio__native-control" type="radio" id="game_ets2" name="game"
                                       value="ets2">
                                <div class="mdc-radio__background">
                                    <div class="mdc-radio__outer-circle"></div>
                                    <div class="mdc-radio__inner-circle"></div>
                                </div>
                            </div>
                            <div class="mdc-radio">
                                <input class="mdc-radio__native-control" type="radio" id="game_ats" name="game"
                                       value="ats">
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
                            <input type="text" id="name" class="mdc-text-field__input" name="name" required>
                            <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label for="name" class="mdc-floating-label">Name</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row no-margin">
                        <div class="mdc-text-field mdc-text-field--outlined">
                            <input type="text" id="short_name" class="mdc-text-field__input" name="short_name" required>
                            <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label for="short_name" class="mdc-floating-label">Short Name</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 no-margin wheels">
                            <label>Тип DLC</label>
                            <select name="type">
                                @foreach($types as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row no-margin" style="margin-left: 1rem;">
                        <div class="mdc-form-field col s12">
                            <div class="mdc-checkbox">
                                <input type="checkbox"
                                       class="mdc-checkbox__native-control"
                                       id="mp_support" name="mp_support">
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
                                       id="active" name="active">
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
                            <label for="active">Активне DLC</label>
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
