<!doctype html>
<html lang="en" data-theme="forest" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    >
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta
        name="description"
        content="Need 4 Parts — quality automotive parts for every journey, with reliable products, competitive prices, and fast delivery."
    >

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Need 4 Parts</title>

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
</head>

<body
    id="top"
    class="relative"
    x-data
    x-init="
        $store.wishlist.initData(
            @js(auth()->check()
                ? auth()->user()->likedProducts()->pluck('products.id')->toArray()
                : []
            ),
            {{ auth()->check()
                ? auth()->user()->likedProducts()->count()
                : 0
            }}
        );

        $store.cart.initData(
            {{ auth()->check()
                ? auth()->user()->cartItems()->sum('quantity')
                : 0
            }}
        );
    "
>
<x-navigation.header/>

<main>
    {{ $slot }}
</main>

<x-ui.scroll-to-top-btn/>

<x-footer/>
</body>
</html>
