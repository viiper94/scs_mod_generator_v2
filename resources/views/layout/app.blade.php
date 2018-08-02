<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('layout.header')
    <title>{{ I18n::t('title') }}</title>
</head>
<body @if(isset($_COOKIE['dark_theme']) && $_COOKIE['dark_theme'] == 'true')class="mdc-theme--dark" @endif>
    <header>
        @include('layout.navbar')
    </header>

    <main>
        @yield('content')
    </main>

        @include('layout.languages')

    <footer>
        @include('layout.footer')
    </footer>
</body>
</html>