<div class="navbar-fixed">
    <nav class="nav-extended no-shadow">
        <div class="nav-left">
            <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons notranslate">menu</i></a>
            <a href="/" class="logo hide-on-small-only"></a>
        </div>
        @yield('navbar-content')
        <div class="nav-right">
            <a class="tooltipped material-icons notranslate mdc-icon-button" id="toggle-dark"
               data-tooltip="@lang('general.dark_theme')" data-position="bottom">
                @if(isset($_COOKIE['dark_theme']) && $_COOKIE['dark_theme'] == 'true')brightness_high
                @else brightness_low
                @endif
            </a>
            <a class="tooltipped material-icons notranslate mdc-icon-button" href="#lang" id="lang-sw"
               data-tooltip="@lang('general.languages')" data-position="bottom">language</a>
            @guest
                <a href="{{ route('login') }}" class="mdc-button mdc-button--unelevated">@lang('user.login')</a>
            @else
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
            @endguest
        </div>
    </nav>
</div>

<nav id="slide-out" class="sidenav sidenav-fixed no-shadow">
    <ul style="flex: 1">
        <li @if(Request::is('/'))class="active"@endif>
            <a href="{{url('/')}}"><i class="truck-icons truck-eu"></i>@lang('general.ets2') @lang('general.trailer_generator')</a>
        </li>
        <li @if(Request::is('ats'))class="active"@endif>
            <a href="{{url('/', 'ats')}}"><i class="truck-icons truck-us"></i>@lang('general.ats') @lang('general.trailer_generator')</a>
        </li>
        <li class="divider"></li>
        <li @if(Request::is('gallery'))class="active"@endif>
            <a href="{{route('gallery')}}"><i class="material-icons notranslate">photo_library</i>@lang('general.trailers_gallery')</a>
        </li>
{{--        <li class="divider"></li>--}}
{{--        <li>--}}
{{--            <ul class="collapsible collapsible-accordion">--}}
{{--                <li @if(Request::is('mods/ets2') || Request::is('mods/ats'))class="active"@endif>--}}
{{--                    <a class="collapsible-header waves-effect"><i class="material-icons notranslate">build</i>@lang('general.static_mods')</a>--}}
{{--                    <div class="collapsible-body">--}}
{{--                        <ul>--}}
{{--                            <li @if(Request::is('mods/ets2'))class="active"@endif>--}}
{{--                                <a href="{{route('static_mods', ['game' => 'ets2'])}}">@lang('general.ets2')</a>--}}
{{--                            </li>--}}
{{--                            <li @if(Request::is('mods/ats'))class="active"@endif>--}}
{{--                                <a href="{{route('static_mods', ['game' => 'ats'])}}">@lang('general.ats')</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
        @can('admin')
            <li class="divider"></li>
            <li>
                <a href="{{route('trailers')}}">
                    <i class="material-icons notranslate">developer_mode</i>@lang('admin.admin_title')
                </a>
            </li>
        @endcan
    </ul>
    <div class="nav-footer">
        <span><a href="http://steamcommunity.com/id/viiper94/" target="_blank">Mayday</a> - @lang('general.current_version'): <b>3.4</b></span>
    </div>
</nav>
