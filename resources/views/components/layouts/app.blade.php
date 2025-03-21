<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/c9e07e65b6.js" crossorigin="anonymous"></script>

        <title>{{ $title ?? 'Etilesa' }}</title>
        @vite(['resources/css/app.css' , 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class= "bg-gray-50 dark:bg-slate-700">

        @if (!request()->is('login') )
        @livewire('partials.navbar')
        @endif
        <main>
        {{ $slot }}
        </main>
        @if (!request()->is('login') )
        @livewire('partials.footer')
        @endif
        @livewireScripts
    </body>
</html>
