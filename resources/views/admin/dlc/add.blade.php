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
                    <div class="row" style="margin-left: 1rem;">
                        <p class="col s6 center">
                            <label>
                                <input class="with-gap" name="game" type="radio" value="ets2">
                                <span>ETS2</span>
                            </label>
                        </p>
                        <p class="col s6 center">
                            <label>
                                <input class="with-gap" name="game" type="radio" value="ats">
                                <span>ATS</span>
                            </label>
                        </p>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 no-margin">
                            <i class="material-icons prefix">title</i>
                            <input id="name" type="text" name="name" required>
                            <label for="name">Name*</label>
                        </div>
                    </div>
                    <div class="row" style="margin-left: 1rem;">
                        <p>
                            <label>
                                <input type="checkbox" class="filled-in" name="active">
                                <span>Активне</span>
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