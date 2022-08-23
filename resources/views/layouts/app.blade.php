<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('tituloPagina')</title>
    @include('layouts.frontend.css')

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-jet-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('frontend.menu-principal')

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @include('layouts.frontend.js')
    @stack('modals')
    @livewireScripts
    @stack('script')
</body>

</html>
