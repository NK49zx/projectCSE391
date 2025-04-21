<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Re:CODE</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts and Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        @stack('styles')
    </head>
    <body class="font-sans antialiased flex flex-col min-h-screen">
        @include('components.loading-overlay')
        
        <div class="flex-grow">
            @yield('content')
        </div>
        
        @include('components.footer')
        
        <!-- Loading Screen Script -->
        <script src="{{ asset('js/loading-screen.js') }}"></script>
        
        @stack('scripts')
    </body>
</html> 