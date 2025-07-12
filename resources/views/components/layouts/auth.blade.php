<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'Page Title' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet"/>
    <link rel="icon" type="image/x-icon" href="/AppLogo/Logo.png">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-200  text-[#1b1b18] flex items-center lg:justify-center min-h-screen flex-col">

<div
    class="flex items-start justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0"
>
    <main
        class="flex w-full flex-col-reverse justify-center lg:max-w-4xl md:max-w-xl sm:max-w-lg max-w-md lg:flex-row"
    >
        <a wire:navigate href="{{ route('home') }}"
           class="flex items-center absolute top-5 left-5 z-10 border border-[#FF4D30] px-3 py-1.5 rounded-md text-[#FF4D30] bg-white hover:underline">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="sm:h-6 sm:w-6 h-4 w-4">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18">
                </path>
            </svg>
            <span class="ml-1 font-bold sm:text-lg text-base">Home</span>
        </a>


        <section class="flex justify-center w-full">
            <img src="/images/auth_background.jpg" class="w-full h-full object-cover fixed">
            <div class="mx-auto max-w-3lg px-6 lg:px-8 absolute py-20">
                <div class="flex justify-center gap-x-5 items-center lg:mb-11 mb-8">
                    <img src="/AppLogo/Logo.png" class="w-20 h-20 object-cover">
                    <span class="text-white text-4xl font-bold">BYTE ZONE</span>
                </div>

                {{ $slot }}
            </div>
        </section>
    </main>

</div>

@livewireScripts

</body>
</html>
