<nav id="slide-out" class="sidenav sidenav-fixed" style="text-transform: uppercase; width: 350px;">
    <ul class="top-menu">
        <li><a class="waves-effect" href="{{url('/')}}"><i class="material-icons notranslate">settings_backup_restore</i>До генератора</a></li>
        <li @if(Request::is('admin'))class="active"@endif>
            <a class="waves-effect" href="{{route('admin')}}"><i class="material-icons notranslate">home</i>Головна</a>
        </li>
        <li @if(Request::is('admin/trailers'))class="active"@endif>
            <a class="waves-effect" href="{{route('trailers')}}"><i class="material-icons notranslate">local_shipping</i>Причепи</a>
        </li>
        <li @if(Request::is('admin/accessories'))class="active"@endif>
            <a class="waves-effect" href="{{route('accessories')}}"><i class="material-icons notranslate">category</i>Аксесуари</a>
        </li>
        <li @if(Request::is('admin/paint_jobs'))class="active"@endif>
            <a class="waves-effect" href="{{route('paint_jobs')}}"><i class="material-icons notranslate">texture</i>Скіни</a>
        </li>
        <li @if(Request::is('admin/wheels'))class="active"@endif>
            <a class="waves-effect" href="{{route('wheels')}}"><i class="material-icons notranslate">adjust</i>Колеса</a>
        </li>
        <li @if(Request::is('admin/dlc'))class="active"@endif>
            <a class="waves-effect" href="{{route('dlc')}}"><i class="material-icons notranslate">add_shopping_cart</i>DLC</a>
        </li>
        <li @if(Request::is('admin/mods'))class="active"@endif>
            <a class="waves-effect" href="{{route('mods')}}"><i class="material-icons notranslate">build</i>Модифікації</a>
        </li>
    </ul>
    <ul class="bottom-menu">
        <li style="padding: 0 32px;">
            <div class="mdc-switch" style="margin-right: 18px;">
                <input type="checkbox" id="toggle-dark" class="mdc-switch__native-control" @if(isset($_COOKIE['dark_theme']) && $_COOKIE['dark_theme'] == 'true') checked @endif>
                <div class="mdc-switch__background">
                    <div class="mdc-switch__knob"></div>
                </div>
            </div>
            <label for="toggle-dark" class="mdc-switch-label" style="font-weight: 500;">@lang('general.dark_theme')</label>
        </li>
    </ul>
</nav>
<a href="#" data-target="slide-out" class="sidenav-trigger hide-on-large-only"><i class="material-icons notranslate">menu</i></a>