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
                    <div class="row">
                        <div class="input-field col s12 no-margin">
                            <i class="material-icons prefix">title</i>
                            <input id="title" type="text" name="title" required>
                            <label for="title">Назва*</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 no-margin">
                            <i class="material-icons prefix">language</i>
                            <input id="locale" type="text" name="locale" required>
                            <label for="locale">Локаль*</label>
                        </div>
                    </div>
                    <div class="row" style="margin-left: 1rem;">
                        <p>
                            <label>
                                <input type="checkbox" class="filled-in" name="active">
                                <span>Активна</span>
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