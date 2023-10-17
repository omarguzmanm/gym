<!DOCTYPE html>
{{-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> --}}
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Future Fit - @yield('title')</title>

    <!-- Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.bunny.net"> --}}
    {{-- <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    @livewireStyles

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<style>
    @media (max-width: 770px) {
        .custom-height {
            min-height: 100vh;
        }
    }
</style>

<body class="{{request()->routeIs('login') ? 'bg-gray-200' : 'bg-gray-50'}}">
    {{-- <div class="font-sans text-gray-900 antialiased"> --}}
    @include('landing-page.partials.navbar')

    <div>
        {{ $slot }}
    </div>
    @if (!request()->routeIs('login'))
        @include('landing-page.partials.footer')
    @endif
    
    @livewireScripts


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
</body>

</html>
