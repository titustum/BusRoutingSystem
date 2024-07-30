@props(["header"])


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">


        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('build/assets/app-fO0wVZxQ.css') }}">
        <script src="{{ asset('build/assets/app-Bg1aHGgo.js') }}" defer></script>

    </head>
    <body class="font-sans antialiased">

        <div class="max-w-lg mx-auto border-x">
            @isset($header)

            <nav class="fixed top-0 flex items-center justify-between w-full max-w-lg px-6 py-1 bg-white border-b">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="block w-auto h-10 text-gray-800 fill-current" />
                </a>

                <a href="{{ route('profile.edit') }}">
                <i class="fas fa-2x fa-user-circle"></i>
                </a>
            </nav>
            @endisset
            {{ $slot }}
        </div>
    </body>
</html>
