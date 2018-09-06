<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('layout.header')
    <title>@lang('admin.admin_title') @lang('general.title')</title>
</head>
<body class="admin-panel @if(isset($_COOKIE['dark_theme']) && $_COOKIE['dark_theme'] == 'true')mdc-theme--dark @endif">

    <header>
        @include('admin.layout.navbar')
    </header>
    <div class="wrapper flex">
        <main style="display: flex; flex-direction: column; flex: 1">
            @yield('content')
        </main>
    </div>

    @include('layout.scripts')

    @include('admin.layout.alert')

</body>
</html>