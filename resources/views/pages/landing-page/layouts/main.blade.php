<!DOCTYPE html>
<html class="scroll-smooth" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('https://www.smknegeri1garut.sch.id/tampilan/img/logo.png') }}" type="image/x-icon" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>   
        AOS.init(); 
   </script>
    @include('utils.sweetalert.link')
    @vite('resources/css/app.css')
    @yield('additional_links')
</head>

<body class="overflow-x-hidden">
    {{-- Navbar --}}
    @include('pages.landing-page.layouts.navbar')

    <div class="px-8 mx-auto mt-32 lg:px-[100px]">
        @yield('content')

        {{-- Footer --}}
        @include('pages.landing-page.layouts.footer')
    </div>

    @include('utils.sweetalert.script')
    @vite(['resources/js/app.js', 'resources/js/base/navbar.js'])
    @yield('additional_scripts')
    {{-- Sweetalert --}}
    @include('sweetalert::alert')
</body>

</html>
