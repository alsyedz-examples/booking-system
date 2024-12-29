<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name')  }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('/favicon.ico') }}">
    <meta name="title" content="{{ config('app.name') }}">
    <meta name="description" content="Lorem ipsum delor">
    <meta name="keywords" content="{{ config('app.name') }}">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="{{ config('app.locale') }}">
    <meta name="author" content="Syed Naeem">
    @vite('resources/css/app.css')
    @livewireStyles
    @stack('styles')
</head>
<body class="font-sans text-gray-800 bg-gray-100">
<header class="bg-white md:bg-transparent shadow md:shadow-none">
    <section class="container mx-auto flex flex-col justify-between py-6 sm:px-6 lg:px-8">
        <x-nav/>
    </section>
</header>
<main class="border-y-2 border-primary-500">
    <section class="container mx-auto min-h-screen py-6 sm:px-6 lg:px-8">
        @yield('content')
    </section>
</main>
<footer class="bg-white md:bg-transparent shadow md:shadow-none">
    <section class="container mx-auto flex flex-col justify-between py-6 sm:px-6 lg:px-8">
        <x-footer/>
    </section>
</footer>
</body>
</html>
