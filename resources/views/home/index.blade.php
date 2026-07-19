<!doctype html>
<html lang="en" data-theme="forest">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Need 4 Parts</title>

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
</head>
<body>

<div class="navbar bg-base-100 shadow-sm">
    <div class="navbar-start">
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16"/>
                </svg>
            </div>
            <ul
                tabindex="-1"
                class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                <li><a>Item 1</a></li>
                <li>
                    <a>Parent</a>
                    <ul class="p-2">
                        <li><a>Submenu 1</a></li>
                        <li><a>Submenu 2</a></li>
                    </ul>
                </li>
                <li><a>Item 3</a></li>
            </ul>
        </div>
        <a class="cursor-pointer"> <img src="{{asset('images/logo.png')}}" alt="Need 4 Parts"
                                        class="h-10 rounded-3xl transition-transform duration-100 active:scale-95">
        </a>
    </div>
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-1">
            <li><a>Item 1</a></li>
            <li>
                <details>
                    <summary>Parent</summary>
                    <ul class="p-2 bg-base-100 w-40 z-1">
                        <li><a>Submenu 1</a></li>
                        <li><a>Submenu 2</a></li>
                    </ul>
                </details>
            </li>
            <li><a>Item 3</a></li>
        </ul>
    </div>
    <div class="navbar-end">
        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                <div class="indicator">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <span class="badge badge-sm indicator-item">8</span>
                </div>
            </div>
            <div
                tabindex="0"
                class="card card-compact dropdown-content bg-base-100 z-1 mt-3 w-52 shadow">
                <div class="card-body">
                    <span class="text-lg font-bold">8 Items</span>
                    <span class="text-info">Subtotal: $999</span>
                    <div class="card-actions">
                        <button class="btn btn-primary btn-block">View cart</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="hero min-h-screen relative overflow-hidden">

    <!-- Video background -->
    <video
        class="absolute inset-0 w-full h-full object-cover"
        autoplay
        muted
        loop
        playsinline>
        <source src="{{ asset('videos/car.mp4') }}" type="video/mp4">
    </video>

    <!-- Dark overlay -->
    <div class="hero-overlay absolute inset-0"></div>

    <!-- Content -->
    <div class="hero-content relative z-10 text-neutral-content text-center">
        <div class="max-w-md">
            <h1 class="mb-5 text-5xl font-bold">
                Need 4 Parts
            </h1>

            <p class="mb-5">
                Find the right parts for your car.
            </p>

            <button class="btn btn-primary">
                Get Started
            </button>
        </div>
    </div>

</div>

<section class="max-w-4xl mx-auto my-10 px-4 text-center">
    <h2 class="text-2xl md:text-5xl font-semibold italic text-primary">
        Your trusted source for automotive parts and components
    </h2>

    <p class="mt-6 text-xl font-medium italic text-base-content/90 leading-relaxed">
        Need 4 Parts helps drivers, mechanics, and automotive businesses find reliable replacement parts for passenger
        cars and commercial vehicles. We connect customers with quality components from trusted suppliers to make every
        repair easier.
    </p>

    <p class="mt-5 text-lg italic text-base-content/70 leading-8">
        From everyday passenger vehicles to light commercial vans, Need 4 Parts is here to help you find the right part
        with confidence. Whatever your vehicle needs, we're committed to helping you get back on the road.
    </p>
</section>

<section class="max-w-4xl mx-auto my-16 px-4">
    <h2 class="text-3xl md:text-4xl font-semibold italic text-primary text-center mb-8">
        Frequently Asked Questions
    </h2>

    <div class="space-y-4">

        <div class="collapse collapse-arrow bg-base-100 border border-base-300">
            <input type="radio" name="parts-accordion" checked="checked"/>

            <div class="collapse-title font-semibold">
                What kind of automotive parts can I find on Need 4 Parts?
            </div>

            <div class="collapse-content text-sm">
                Need 4 Parts helps you find a wide range of automotive components, including engine parts,
                suspension components, braking systems, electrical parts, and other replacement products for
                passenger cars and commercial vehicles.
            </div>
        </div>


        <div class="collapse collapse-arrow bg-base-100 border border-base-300">
            <input type="radio" name="parts-accordion"/>

            <div class="collapse-title font-semibold">
                How do I know if a part is compatible with my vehicle?
            </div>

            <div class="collapse-content text-sm">
                To find the right component, provide your vehicle details such as make, model, year, and engine
                specifications. Our goal is to help you identify parts that match your vehicle requirements.
            </div>
        </div>


        <div class="collapse collapse-arrow bg-base-100 border border-base-300">
            <input type="radio" name="parts-accordion"/>

            <div class="collapse-title font-semibold">
                Do you supply parts for commercial vehicles?
            </div>

            <div class="collapse-content text-sm">
                Yes. Need 4 Parts supports both passenger vehicles and commercial vehicles, helping businesses
                and individual customers find reliable components for different vehicle types.
            </div>
        </div>


        <div class="collapse collapse-arrow bg-base-100 border border-base-300">
            <input type="radio" name="parts-accordion"/>

            <div class="collapse-title font-semibold">
                Why choose Need 4 Parts?
            </div>

            <div class="collapse-content text-sm">
                We focus on providing quality automotive components, a simple buying experience, and reliable
                support to help you find the parts you need quickly and confidently.
            </div>
        </div>

    </div>
</section>


<footer class="footer sm:footer-horizontal bg-base-200 text-base-content p-10">
    <aside>
        <img src="{{asset('images/logo.png')}}" alt="Need 4 Parts" class="h-10 rounded-3xl">
        <p>
            <strong>Need 4 Parts</strong>
            <br>
            Connecting drivers with quality automotive parts.
        </p>
    </aside>
    <nav>
        <h6 class="footer-title">Services</h6>
        <a class="link link-hover">Branding</a>
        <a class="link link-hover">Design</a>
        <a class="link link-hover">Marketing</a>
        <a class="link link-hover">Advertisement</a>
    </nav>
    <nav>
        <h6 class="footer-title">Company</h6>
        <a class="link link-hover">About us</a>
        <a class="link link-hover">Contact</a>
        <a class="link link-hover">Jobs</a>
        <a class="link link-hover">Press kit</a>
    </nav>
    <nav>
        <h6 class="footer-title">Legal</h6>
        <a class="link link-hover">Terms of use</a>
        <a class="link link-hover">Privacy policy</a>
        <a class="link link-hover">Cookie policy</a>
    </nav>
</footer>
</body>
</html>
