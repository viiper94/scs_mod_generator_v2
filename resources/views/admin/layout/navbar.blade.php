<div class="navbar-fixed">
    <nav class="nav-extended no-shadow">
        <div class="nav-left">
            <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons notranslate">menu</i></a>
            <a href="/" class="logo"></a>
        </div>
        @yield('navbar-content')
        <div class="nav-right">
            <a class="tooltipped material-icons notranslate mdc-icon-button" id="toggle-dark"
               data-tooltip="@lang('general.dark_theme')" data-position="bottom">
                @if(isset($_COOKIE['dark_theme']) && $_COOKIE['dark_theme'] == 'true')brightness_high
                @else brightness_low
                @endif
            </a>
            <a href="#" class="user-view" data-target="profile-actions">
                <img class="circle" src="{{ '/images/users/'.Auth::user()->image }}">
            </a>
            <div class="dropdown-content" id="profile-actions">
                <div class="flex user-info">
                    <a href="{{ route('profile') }}"><img class="circle user-image" src="{{ '/images/users/'.Auth::user()->image }}"></a>
                    <div class="menu-right">
                        <span class="user-name">{{ Auth::user()->name }}</span>
                        <span class="user-email">{{ Auth::user()->email }}</span>
                        <a href="{{ route('profile') }}" style="width: 100%;"
                                                                                    class="mdc-button mdc-button--dense mdc-button--unelevated">
                            <i class="material-icons mdc-button__icon notranslate">perm_identity_filled</i>
                            @lang('user.profile')
                        </a>
                    </div>
                </div>
                <div class="user-actions">
                    <a href="{{ route('profile_edit') }}" class="mdc-button mdc-button--outlined">@lang('user.profile_edit')</a>
                    <a href="{{ route('logout') }}" class="mdc-button mdc-button--outlined"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">@lang('user.logout')</a>
                    <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </nav>
</div>

<nav id="slide-out" class="sidenav sidenav-fixed no-shadow">
    <ul>
        <li><a class="waves-effect" href="{{url('/')}}"><i class="material-icons notranslate">settings_backup_restore</i>До генератора</a></li>
        <li class="divider"></li>
        {{--<li @if(Request::is('admin'))class="active"@endif>--}}
            {{--<a href="{{route('admin')}}"><i class="material-icons notranslate">home</i>Головна</a>--}}
        {{--</li>--}}
        <li @if(Request::is('admin/trailers'))class="active"@endif>
            <a href="{{route('trailers')}}"><i class="material-icons notranslate">local_shipping</i>Шассі</a>
        </li>
        <li @if(Request::is('admin/accessories'))class="active"@endif>
            <a href="{{route('accessories')}}"><i class="material-icons notranslate">category</i>Аксесуари</a>
        </li>
        <li @if(Request::is('admin/paints'))class="active"@endif>
            <a href="{{route('paints')}}"><i class="material-icons notranslate">texture</i>Скіни</a>
        </li>
        <li @if(Request::is('admin/companies'))class="active"@endif>
            <a href="{{route('companies')}}"><i class="material-icons notranslate">account_balance</i>Компанії</a>
        </li>
        <li @if(Request::is('admin/wheels'))class="active"@endif>
            <a href="{{route('wheels')}}"><i class="material-icons notranslate">adjust</i>Колеса</a>
        </li>
        <li @if(Request::is('admin/dlc'))class="active"@endif>
            <a href="{{route('dlc')}}"><i class="material-icons notranslate">extension</i>DLC</a>
        </li>
        <li class="divider"></li>
        <li @if(Request::is('admin/mods'))class="active"@endif>
            <a href="{{route('mods')}}"><i class="material-icons notranslate">build</i>Модифікації</a>
        </li>
        <li @if(Request::is('admin/static_mods'))class="active"@endif>
            <a href="{{route('admin_static_mods')}}"><i class="material-icons notranslate">build</i>Статичні модифікації</a>
        </li>
        <li class="divider"></li>
        <li @if(Request::is('admin/languages'))class="active"@endif>
            <a href="{{route('languages')}}"><i class="material-icons notranslate">language</i>Мови</a>
        </li>
        <li @if(Request::is('admin/users'))class="active"@endif>
            <a href="{{route('users')}}"><i class="material-icons notranslate">people</i>Користувачі</a>
        </li>
    </ul>
</nav>
<a href="#" data-target="slide-out" class="sidenav-trigger hide-on-large-only"><i class="material-icons notranslate">menu</i></a>