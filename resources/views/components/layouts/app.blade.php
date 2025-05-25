<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/c9e07e65b6.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@alpinejs/focus@3.x.x/dist/cdn.min.js" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

        <title>{{ $title ?? 'Etilesa' }}</title>
        @vite(['resources/css/app.css' , 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class= "bg-gray-50">

        @if (!request()->is('login' ) && !request()->is('register') && !request()->is('forgot-page') && !request()->is('password-reset'))
        @livewire('partials.navbar')
        @endif
        <main>
        {{ $slot }}
        </main>
        @if (!request()->is('login') && !request()->is('register') && !request()->is('forgot-page') && !request()->is('password-reset')) 
        @livewire('partials.footer')
        @endif
        @livewireScripts
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
        <x-livewire-alert::scripts />
    </body>
</html>
