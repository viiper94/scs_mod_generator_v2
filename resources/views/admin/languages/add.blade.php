@extends('admin.layout.admin')

@section('content')

    
    <div class="flex-center" style="flex: 1; align-items: center; flex-direction: column;">

        <div class="card" style="width: 400px;">
            <form method="post">
                @csrf
                <div class="card-content">
                    <div class="row">
                        <h5 class="card-title center">Додати нову мову</h5>
                    </div>
                    <div class="row no-margin">
                        <div class="mdc-text-field mdc-text-field--outlined">
                            <input type="text" id="title" class="mdc-text-field__input" name="title" required>
                            <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label for="title" class="mdc-floating-label">Назва</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row no-margin">
                        <div class="mdc-text-field mdc-text-field--outlined">
                            <input type="text" id="locale" class="mdc-text-field__input" name="locale" required>
                            <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label for="locale" class="mdc-floating-label">Локаль</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row no-margin" style="margin-left: 1rem;">
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
                            <label for="active">Активна мова</label>
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