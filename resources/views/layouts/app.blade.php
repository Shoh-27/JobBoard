<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gradient-to-br from-gray-900 via-blue-900 to-black text-gray-100">
<div class="min-h-screen flex flex-col">

    {{-- Navigation --}}
    <div class="sticky top-0 z-50">
        @include('layouts.navigation')
    </div>

    {{-- Page Heading --}}
    @isset($header)
        <header class="bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h1 class="text-2xl font-semibold text-white">{{ $header }}</h1>
            </div>
        </header>
    @endisset

    {{-- Page Content --}}
    <main class="flex-grow">
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <div class="bg-gray-800 rounded-lg shadow p-6">
                @yield('content')
            </div>
        </div>
    </main>

    {{-- Footer --}}
    <footer class="bg-gray-900 mt-auto text-gray-400 py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
        </div>
    </footer>

</div>
</body>
</html>
