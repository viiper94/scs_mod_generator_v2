<nav class="sidenav sidenav-fixed" style="text-transform: uppercase; width: 350px;">
    <ul class="top-menu">
        <li>
            <div class="user-view" style="min-height: 200px;">
                <div class="background">
                    <img src="{{ asset('assets/img/bg.jpg') }}" style="width: 100%;">
                </div>
                @if(Auth::check())
                    <a href="#user"><img class="circle" src="assets/img/logo.png"></a>
                    <a href="#name"><span class="white-text name">{{ Auth::user()->name }}</span></a>
                @endif
            </div>
        </li>
        <li @if(Request::is('/'))class="active"@endif>
            <a class="waves-effect" href="{{url('/')}}"><i class="truck-icons truck-eu"></i>@lang('general.ets2_trailer_generator')</a>
        </li>
        <li @if(Request::is('ats'))class="active"@endif>
            <a class="waves-effect" href="{{url('/', 'ats')}}"><i class="truck-icons truck-us"></i>@lang('general.ats_trailer_generator')</a>
        </li>
        <li @if(Request::is('gallery'))class="active"@endif>
            <a class="waves-effect" href="{{route('gallery')}}"><i class="material-icons notranslate">photo_library</i>@lang('general.trailers_gallery')</a>
        </li>
    </ul>
    <ul class="bottom-menu">
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