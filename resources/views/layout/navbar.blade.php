<nav id="slide-out" class="sidenav sidenav-fixed">
    <ul class="top-menu">
        @if(Auth::check())
            <li>
                <div class="user-view" style="min-height: 100px;">
                    <a href="{{ route('profile') }}">
                        @if(Auth::user()->image && file_exists(public_path('images/users/'.Auth::user()->image)))
                            <img class="circle" src="{{ '/images/users/'.Auth::user()->image }}">
                        @else
                            <img class="circle" src="{{ '/images/users/default.jpg' }}">
                        @endif
                        <span class="name center">{{ Auth::user()->name }}</span></a>
                </div>
            </li>
        @endif
        <li @if(Request::is('/'))class="active"@endif>
            <a class="waves-effect" href="{{url('/')}}"><i class="truck-icons truck-eu"></i>@lang('general.ets2') @lang('general.trailer_generator')</a>
        </li>
        <li @if(Request::is('ats'))class="active"@endif>
            <a class="waves-effect" href="{{url('/', 'ats')}}"><i class="truck-icons truck-us"></i>@lang('general.ats') @lang('general.trailer_generator')</a>
        </li>
        <li @if(Request::is('color'))class="active"@endif>
            <a class="waves-effect" href="{{route('color')}}"><i class="material-icons notranslate">format_paint</i>@lang('general.truck_paint_job_generator')</a>
        </li>
        <li @if(Request::is('gallery'))class="active"@endif>
            <a class="waves-effect" href="{{route('gallery')}}"><i class="material-icons notranslate">photo_library</i>@lang('general.trailers_gallery')</a>
        </li>
        <li @if(Request::is('mods/ets2') || Request::is('mods/ats'))class="active"@endif>
            <ul class="collapsible collapsible-accordion">
                <li @if(Request::is('mods/ets2') || Request::is('mods/ats'))class="active"@endif>
                    <a class="collapsible-header waves-effect"><i class="material-icons notranslate">build</i>@lang('general.static_mods')</a>
                    <div class="collapsible-body">
                        <ul>
                            <li @if(Request::is('mods/ets2'))class="active"@endif>
                                <a href="{{route('static_mods', ['game' => 'ets2'])}}">@lang('general.ets2')</a>
                            </li>
                            <li @if(Request::is('mods/ats'))class="active"@endif>
                                <a href="{{route('static_mods', ['game' => 'ats'])}}">@lang('general.ats')</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </li>
        @can('admin')
            <li>
                <a class="waves-effect" href="{{route('trailers')}}">
                    <i class="material-icons notranslate">developer_mode</i>@lang('admin.admin_title')
                </a>
            </li>
        @endcan
    </ul>
    <ul class="bottom-menu">
        <li class="divider" style="margin: 0 32px; background-color: #9b9b9b;"></li>
        @guest
            <li @if(Request::is('login'))class="active"@endif>
                <a class="waves-effect" href="{{route('login')}}"><i class="material-icons notranslate">how_to_reg</i>@lang('user.login')</a>
            </li>
            <li @if(Request::is('register'))class="active"@endif>
                <a class="waves-effect" href="{{route('register')}}"><i class="material-icons notranslate">person_add</i>@lang('user.register')</a>
            </li>
        @else
            <li @if(Request::is('profile'))class="active"@endif>
                <a class="waves-effect" href="{{route('profile')}}"><i class="material-icons notranslate">person</i>@lang('user.profile')</a>
            </li>
            <li>
                <a class="waves-effect" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="material-icons notranslate">exit_to_app</i>@lang('user.logout')
                </a>
                <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        @endguest
        <li><a class="waves-effect" href="#lang" id="lang-sw"><i class="material-icons notranslate">language</i>@lang('general.languages')</a></li>
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