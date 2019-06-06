<div class="card-panel nav-search no-margin hide-on-small-only">
    <form method="get">
        <div class="input-field no-margin">
            <button type="submit" class="mdc-icon-button material-icons prefix">search</button>
            <input type="search" name="q" placeholder="@lang('general.search')" value="{{ Request::input('q') }}">
            <a href="{{ route(Route::currentRouteName()) }}" class="mdc-icon-button material-icons clear"
                @if(Request::input('q')) style="display: block;" @endif>clear</a>
        </div>
    </form>
</div>