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

<section class="max-w-5xl mx-auto my-20 px-4 text-center">

    <h2 class="text-4xl md:text-6xl font-bold text-primary">
        Find the Right Parts.
    </h2>

    <p class="mt-6 text-xl text-base-content/70 max-w-2xl mx-auto">
        Quality automotive parts for passenger cars and commercial vehicles from trusted suppliers.
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

{{-- Need4Parts Customer Reviews Marquee --}}

<div
    class="relative flex flex-col gap-3 overflow-hidden
    before:pointer-events-none before:absolute before:inset-y-0 before:start-0 before:z-10 before:w-24
    before:bg-[linear-gradient(to_right,hsl(var(--b2)),transparent)]
    after:pointer-events-none after:absolute after:inset-y-0 after:end-0 after:z-10 after:w-24
    after:bg-[linear-gradient(to_left,hsl(var(--b2)),transparent)]">

    @php
        $reviews = [
            [
                'name' => 'Alex M.',
                'initials' => 'AM',
                'text' => 'Found the exact brake pads for my Toyota. Fast delivery and the parts matched perfectly.'
            ],
            [
                'name' => 'Maria K.',
                'initials' => 'MK',
                'text' => 'The search by car model is amazing. Found my air filter in less than a minute.'
            ],
            [
                'name' => 'Daniel R.',
                'initials' => 'DR',
                'text' => 'Good prices and real information about parts. Much better than random marketplaces.'
            ],
            [
                'name' => 'Victor P.',
                'initials' => 'VP',
                'text' => 'Ordered suspension parts for my BMW. Everything arrived safely and quickly.'
            ],
            [
                'name' => 'Elena S.',
                'initials' => 'ES',
                'text' => 'Finally a shop where I know the part will fit my vehicle.'
            ],
            [
                'name' => 'Andrei C.',
                'initials' => 'AC',
                'text' => 'VIN search helped me avoid buying the wrong component. Very useful feature.'
            ],
            [
                'name' => 'Chris T.',
                'initials' => 'CT',
                'text' => 'Delivery was fast and support helped me choose the correct oil and filters.'
            ],
            [
                'name' => 'Sergiu V.',
                'initials' => 'SV',
                'text' => 'Bought headlights and filters. Great quality and fair prices.'
            ],
        ];
    @endphp


    {{-- First Row --}}
    <div class="flex overflow-hidden">

        <div
            class="flex w-max gap-4 py-2
            [animation:marquee-x_60s_linear_infinite]
            hover:[animation-play-state:paused]">

            @foreach(array_merge($reviews, $reviews) as $review)

                <figure
                    class="w-72 shrink-0 rounded-xl border border-base-300
                    bg-base-100 p-4 shadow-md">

                    <div class="flex items-center gap-3">

                        <div class="avatar placeholder">
                            <div
                                class="size-10 rounded-full
                                bg-success text-success-content">
                                <span class="text-sm">
                                    {{ $review['initials'] }}
                                </span>
                            </div>
                        </div>


                        <div class="min-w-0">

                            <p class="truncate text-sm font-semibold text-base-content">
                                {{ $review['name'] }}
                            </p>

                            <p class="truncate text-xs text-base-content/60">
                                Verified buyer
                            </p>

                        </div>

                    </div>


                    <div class="mt-3 text-success text-sm">
                        ★★★★★
                    </div>


                    <blockquote class="mt-2 text-sm text-base-content/70">
                        {{ $review['text'] }}
                    </blockquote>


                </figure>

            @endforeach

        </div>

    </div>


    {{-- Second Row --}}
    <div class="flex overflow-hidden">

        <div
            class="flex w-max gap-4 py-2
            [animation:marquee-x_60s_linear_infinite]
            [animation-direction:reverse]
            hover:[animation-play-state:paused]">


            @foreach(array_merge($reviews, $reviews) as $review)

                <figure
                    class="w-72 shrink-0 rounded-xl border border-base-300
                    bg-base-100 p-4 shadow-md">

                    <div class="flex items-center gap-3">

                        <div class="avatar placeholder">

                            <div
                                class="size-10 rounded-full
                                bg-success text-success-content">

                                <span class="text-sm">
                                    {{ $review['initials'] }}
                                </span>

                            </div>

                        </div>


                        <div class="min-w-0">

                            <p class="truncate text-sm font-semibold text-base-content">
                                {{ $review['name'] }}
                            </p>

                            <p class="truncate text-xs text-base-content/60">
                                Verified buyer
                            </p>

                        </div>

                    </div>


                    <div class="mt-3 text-success text-sm">
                        ★★★★★
                    </div>


                    <blockquote class="mt-2 text-sm text-base-content/70">
                        {{ $review['text'] }}
                    </blockquote>


                </figure>

            @endforeach


        </div>

    </div>


</div>

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
