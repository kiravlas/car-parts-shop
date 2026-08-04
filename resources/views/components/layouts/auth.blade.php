<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="forest">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-base-300">

<div class="min-h-screen flex items-center justify-center px-4 py-10">

    <div class="w-full max-w-md">
        <div class="mb-8 text-center">

            <a href="{{ route('home.index') }}">
                <img
                    src="{{ asset('images/logo.png') }}"
                    alt="Need4Parts"
                    class="mx-auto h-16 w-auto rounded-4xl">
            </a>

            <p class="mt-2 text-base-content/70">
                Best parts for every journey.
            </p>

        </div>
        {{ $slot }}

    </div>

</div>

</body>
</html>
