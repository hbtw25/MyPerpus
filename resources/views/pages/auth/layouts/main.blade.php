<!DOCTYPE html>
<html class="scroll-smooth" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tyzals - @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('assets/logo/high-resolutions/logo-square.png') }}" type="image/x-icon" />

    @vite('resources/css/app.css')
    @yield('additional_links')
</head>

<body class="overflow-x-hidden">
    <div class="container h-screen px-10 mx-auto md:px-16">
        @yield('content')
    </div>

    @vite('resources/js/app.js')
    @yield('additional_scripts')
</body>

</html>
