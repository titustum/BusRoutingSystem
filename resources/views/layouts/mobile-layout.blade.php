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

        <link rel="stylesheet" href="{{ asset('build/assets/app-bJNOHcVv.css') }}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
        {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    </head>
    <body class="font-sans antialiased">

        @isset($header)
        
        <nav class="py-3 border-b bg-white px-3 flex items-center justify-between shadow-md fixed top-0 w-full">
            <a href="/">
                <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
            </a>

            {{-- <div class="text-orange-600 uppercase font-['Righteous']">{{ $header }}</div> --}}

            <a href="{{ route('profile.edit') }}">
               <i class="fas fa-2x fa-user-circle"></i>
            </a>
        </nav>
        @endisset
            {{ $slot }}
    </body>
</html>
