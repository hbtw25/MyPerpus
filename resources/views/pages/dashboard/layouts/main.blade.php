<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('assets/logo/high-resolutions/logo-square.png') }}" type="image/x-icon" />
    <title>Tyzals - @yield('title')</title>

    @include('pages.dashboard.partials.mazer-link')
    @include('utils.sweetalert.link')
    @yield('additional_links')
</head>

<body class="light">
    <script src="{{ asset('mazer/assets/static/js/initTheme.js') }}"></script>

    <div id="app">
        @include('pages.dashboard.layouts.sidebar')

        <div id="main" class='layout-navbar navbar-fixed'>
            @include('pages.dashboard.layouts.navbar')

            <div id="main-content">
                <div class="page-heading">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    @include('pages.dashboard.partials.mazer-script')
    @include('utils.sweetalert.script')
    @yield('additional_scripts')
</body>

</html>
