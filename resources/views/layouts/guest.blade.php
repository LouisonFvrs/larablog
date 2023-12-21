<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <script src="https://kit.fontawesome.com/c080bb4bb6.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased">
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div class="w-full sm:max-w-md sm:w-4/5 md:w-3/5 lg:w-2/3 xl:w-1/2 mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        @auth
            @include('layouts.navigation')
        @endauth

        @guest
            @if (Route::has('login'))
                <livewire:welcome.navigation />
            @endif
        @endguest
        {{ $slot }}
    </div>
</div>
</body>
</html>
