@if($errors->any())
    <div class="card-panel red darken-2 black-text">
        <span class="card-title">
            <i class="material-icons notranslate left">warning</i><b>{{ $errors->first() }}</b>
        </span>
    </div>
@endif