<!-- resources/views/layouts/app.blade.php -->
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="manifest" href="/favicon/site.webmanifest">
    <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffc40d">
    <meta name="theme-color" content="#ffffff">

    <!-- Style & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-main min-h-screen flex flex-col">
    <div id="app">
        <!-- Header -->
        @if (!in_array(Route::currentRouteName(), ['login', 'register', 'password.request', 'password.confirm', 'password.reset']))
            @include('layouts.header')
        @endif

        <!-- Main Content -->
        <main class="flex-grow py-4">
            @yield('content')
        </main>

        <!-- Footer -->
        @include('layouts.footer')
    </div>
    @stack('scripts')
</body>
</html>
