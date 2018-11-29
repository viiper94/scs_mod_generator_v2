<div class="row no-margin">
    <div class="col s12 m10 offset-m1">
        <div class="card-panel search">
            <form method="get">
                <div class="input-field no-margin">
                    <i class="material-icons prefix">search</i>
                    <input type="search" name="q" placeholder="@lang('general.search')" value="{{ Request::input('q') }}">
                    @if(Request::input('q'))
                        <a href="{{ route(Route::currentRouteName()) }}"
                            class="mdc-icon-button material-icons"
                            style="line-height: 45px; text-align: center;">clear</a>
                    @else
                        <button type="submit" class="mdc-icon-button material-icons">send</button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>