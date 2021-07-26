<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title> {{ $title }} | {{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}" />

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ mix('css/cdsolec.css') }}">
        
        @stack('styles')

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="antialiased">
        @if (empty($header))
            @include("web.header")
        @else
            {{ $header }}
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        @include("web.footer")

        @stack('modals')
        
        @stack('scripts')

        @livewireScripts
    </body>
    <script type="text/javascript" src="{{ asset('js/jquery-2.1.1.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.menu-aim.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/modernizr.js') }}"></script>

</html>
