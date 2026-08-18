<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description"
        content="Desmárcate y haz que tu creatividad sobresalga. Destaca con originalidad y autenticidad.">

    <link rel="icon" href="{{ asset('img/favicon-unmarked-v2.png') }}" type="image/x-icon" />

    <title>{{ config('app.name', 'UNMARKED') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Scripts -->

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-LFXSLX7KNG"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-LFXSLX7KNG');
    </script>

    @livewireStyles
    @vite(['resources/css/app.css', 'resources/css/custom.css', 'resources/js/app.js',  'resources/css/filepond.min.css', 'resources/css/trix.css'])
</head>


<body class="font-primary antialiased bg-fondo selection:bg-[#8563ed] selection:text-white text-grayd flex flex-col min-h-screen">

    @if (auth()->check())
        @if (!auth()->user()->email_verified_at)
            <div class="bg-secondary w-full text-white text-center py-2">
                Revisa tu bandeja de entrada y haz clic en el enlace de verificación para activar tu perfil de Unmarked.
            </div>
        @endif
    @endif

    @include('layouts.navbar')
    @if (Route::currentRouteName() == 'home')
        @include('layouts.hero')
    @endif
    <main>
        {{ $slot }}
    </main>
    @include('layouts.footer')
    @livewireScripts
    @stack('js')
    @stack('css')
</body>

</html>
