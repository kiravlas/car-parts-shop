<!doctype html>
<html lang="en" data-theme="forest" class="scroll-smooth">
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
<body class="relative" id="top">


{{--Announcment marquee--}}

<div
    class="relative sticky top-0 z-50 overflow-hidden border-y border-secondary/20 bg-base-100 before:pointer-events-none before:absolute before:inset-y-0 before:start-0 before:z-2 before:w-16 before:bg-[linear-gradient(to_right,var(--color-background),transparent)] after:pointer-events-none after:absolute after:inset-y-0 after:end-0 after:z-2 after:w-16 after:bg-[linear-gradient(to_left,var(--color-background),transparent)]">
    <div
        class="marquee-track-x [animation:marquee-x_40s_linear_infinite] hover:[animation-play-state:paused] flex w-max gap-4 py-2.5">
        <div class="flex items-center justify-center gap-10 ps-4 text-sm text-gray-800 dark:text-neutral-200">
            <span class="inline-flex items-center justify-center gap-2 whitespace-nowrap"><span aria-hidden="true"><i
                        data-lucide="van"
                        class="size-3.5"></i></span> Fast delivery on all orders</span>
            <span class="inline-flex items-center justify-center gap-2 whitespace-nowrap"><span aria-hidden="true"><i
                        data-lucide="wrench" class="size-3.5"></i></span> Quality auto parts you can trust</span>
            <span class="inline-flex items-center justify-center gap-2 whitespace-nowrap"><span aria-hidden="true"><i
                        data-lucide="lock-keyhole" class="size-3.5"></i> </span> Secure checkout & safe payments</span>
            <span class="inline-flex items-center justify-center gap-2 whitespace-nowrap"><span aria-hidden="true"><i
                        data-lucide="handshake" class="size-3.5"></i> </span> Expert support for finding the right part</span>
        </div>

        <div class="flex items-center gap-10 ps-4 text-sm text-gray-800 dark:text-neutral-200">
            <span class="inline-flex items-center gap-2 whitespace-nowrap"><span aria-hidden="true"><i data-lucide="van"
                                                                                                       class="size-3.5"></i></span> Fast delivery on all orders</span>
            <span class="inline-flex items-center gap-2 whitespace-nowrap"><span aria-hidden="true"><i
                        data-lucide="wrench" class="size-3.5"></i></span> Quality auto parts you can trust</span>
            <span class="inline-flex items-center gap-2 whitespace-nowrap"><span aria-hidden="true"><i
                        data-lucide="lock-keyhole" class="size-3.5"></i> </span> Secure checkout & safe payments</span>
            <span class="inline-flex items-center gap-2 whitespace-nowrap"><span aria-hidden="true"><i
                        data-lucide="handshake" class="size-3.5"></i> </span> Expert support for finding the right part</span>
        </div>

    </div>
</div>
</div>

{{--Green-Navigation-1--}}

<div class="hidden lg:flex items-center min-h-8 bg-neutral text-neutral-content">
    <div class="flex-1">

        <button class="btn btn-link">Discounts</button>
        <button class="btn btn-link">Top Sellers</button>
        <button class="btn btn-link">New Arrivals</button>
        <button class="btn btn-link">Categories</button>

    </div>

    <div class="flex items-center justify-center space-x-0.5 mr-2">
        <div class="flex items-center space-x-1.5">

            <!-- Emails -->
            <div class="dropdown dropdown-hover z-40">
                <div tabindex="0" role="button" class="btn m-1">
                    <i data-lucide="mails" class="size-4"></i>
                    Contact
                </div>

                <ul tabindex="-1" class="dropdown-content menu bg-base-100 rounded-box z-50 min-w-90 p-2 shadow-lg">
                    <li><a class="flex items-center justify-between"><strong>General Inquiries: </strong>
                            info@need4parts.com</a></li>
                    <li><a class="flex items-center justify-between"><strong>Sales Department: </strong>
                            sales@need4parts.com</a></li>
                    <li><a class="flex items-center justify-between"><strong>Customer Support: </strong>
                            support@need4parts.com</a></li>
                </ul>
            </div>

            <!-- Social Media -->
            <div class="dropdown dropdown-hover z-40">
                <div tabindex="0" role="button" class="btn m-1">
                    <i data-lucide="users" class="size-4"></i>
                    Follow Us
                </div>

                <ul tabindex="-1" class="dropdown-content menu bg-base-100 rounded-box z-50 min-w-60 p-2 shadow-lg">
                    <li><a class="flex items-center justify-between">Facebook
                            <svg class="size-4" fill="#0866FF" role="img" viewBox="0 0 24 24"
                                 xmlns="http://www.w3.org/2000/svg">
                                <title>
                                    Facebook</title>
                                <path
                                    d="M9.101 23.691v-7.98H6.627v-3.667h2.474v-1.58c0-4.085 1.848-5.978 5.858-5.978.401 0 .955.042 1.468.103a8.68 8.68 0 0 1 1.141.195v3.325a8.623 8.623 0 0 0-.653-.036 26.805 26.805 0 0 0-.733-.009c-.707 0-1.259.096-1.675.309a1.686 1.686 0 0 0-.679.622c-.258.42-.374.995-.374 1.752v1.297h3.919l-.386 2.103-.287 1.564h-3.246v8.245C19.396 23.238 24 18.179 24 12.044c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.628 3.874 10.35 9.101 11.647Z"/>
                            </svg>
                        </a></li>

                    <li><a class="flex items-center justify-between">Instagram
                            <svg role="img" class="size-4" fill="#FF0069" viewBox="0 0 24 24"
                                 xmlns="http://www.w3.org/2000/svg"><title>
                                    Instagram</title>
                                <path
                                    d="M7.0301.084c-1.2768.0602-2.1487.264-2.911.5634-.7888.3075-1.4575.72-2.1228 1.3877-.6652.6677-1.075 1.3368-1.3802 2.127-.2954.7638-.4956 1.6365-.552 2.914-.0564 1.2775-.0689 1.6882-.0626 4.947.0062 3.2586.0206 3.6671.0825 4.9473.061 1.2765.264 2.1482.5635 2.9107.308.7889.72 1.4573 1.388 2.1228.6679.6655 1.3365 1.0743 2.1285 1.38.7632.295 1.6361.4961 2.9134.552 1.2773.056 1.6884.069 4.9462.0627 3.2578-.0062 3.668-.0207 4.9478-.0814 1.28-.0607 2.147-.2652 2.9098-.5633.7889-.3086 1.4578-.72 2.1228-1.3881.665-.6682 1.0745-1.3378 1.3795-2.1284.2957-.7632.4966-1.636.552-2.9124.056-1.2809.0692-1.6898.063-4.948-.0063-3.2583-.021-3.6668-.0817-4.9465-.0607-1.2797-.264-2.1487-.5633-2.9117-.3084-.7889-.72-1.4568-1.3876-2.1228C21.2982 1.33 20.628.9208 19.8378.6165 19.074.321 18.2017.1197 16.9244.0645 15.6471.0093 15.236-.005 11.977.0014 8.718.0076 8.31.0215 7.0301.0839m.1402 21.6932c-1.17-.0509-1.8053-.2453-2.2287-.408-.5606-.216-.96-.4771-1.3819-.895-.422-.4178-.6811-.8186-.9-1.378-.1644-.4234-.3624-1.058-.4171-2.228-.0595-1.2645-.072-1.6442-.079-4.848-.007-3.2037.0053-3.583.0607-4.848.05-1.169.2456-1.805.408-2.2282.216-.5613.4762-.96.895-1.3816.4188-.4217.8184-.6814 1.3783-.9003.423-.1651 1.0575-.3614 2.227-.4171 1.2655-.06 1.6447-.072 4.848-.079 3.2033-.007 3.5835.005 4.8495.0608 1.169.0508 1.8053.2445 2.228.408.5608.216.96.4754 1.3816.895.4217.4194.6816.8176.9005 1.3787.1653.4217.3617 1.056.4169 2.2263.0602 1.2655.0739 1.645.0796 4.848.0058 3.203-.0055 3.5834-.061 4.848-.051 1.17-.245 1.8055-.408 2.2294-.216.5604-.4763.96-.8954 1.3814-.419.4215-.8181.6811-1.3783.9-.4224.1649-1.0577.3617-2.2262.4174-1.2656.0595-1.6448.072-4.8493.079-3.2045.007-3.5825-.006-4.848-.0608M16.953 5.5864A1.44 1.44 0 1 0 18.39 4.144a1.44 1.44 0 0 0-1.437 1.4424M5.8385 12.012c.0067 3.4032 2.7706 6.1557 6.173 6.1493 3.4026-.0065 6.157-2.7701 6.1506-6.1733-.0065-3.4032-2.771-6.1565-6.174-6.1498-3.403.0067-6.156 2.771-6.1496 6.1738M8 12.0077a4 4 0 1 1 4.008 3.9921A3.9996 3.9996 0 0 1 8 12.0077"/>
                            </svg>
                        </a>
                    </li>
                    <li><a class="flex items-center justify-between">YouTube
                            <svg class="size-4" fill="#FF0000" role="img" viewBox="0 0 24 24"
                                 xmlns="http://www.w3.org/2000/svg"><title>YouTube</title>
                                <path
                                    d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                            </svg>
                        </a>
                    </li>
                    <li><a class="flex items-center justify-between">Linkdn
                            <svg class="size-4" fill="#000000" version="1.1" id="Layer_1"
                                 xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 382 382" xml:space="preserve"><g id="SVGRepo_bgCarrier"
                                                                               stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path style="fill:#0077B7;"
                                          d="M347.445,0H34.555C15.471,0,0,15.471,0,34.555v312.889C0,366.529,15.471,382,34.555,382h312.889 C366.529,382,382,366.529,382,347.444V34.555C382,15.471,366.529,0,347.445,0z M118.207,329.844c0,5.554-4.502,10.056-10.056,10.056 H65.345c-5.554,0-10.056-4.502-10.056-10.056V150.403c0-5.554,4.502-10.056,10.056-10.056h42.806 c5.554,0,10.056,4.502,10.056,10.056V329.844z M86.748,123.432c-22.459,0-40.666-18.207-40.666-40.666S64.289,42.1,86.748,42.1 s40.666,18.207,40.666,40.666S109.208,123.432,86.748,123.432z M341.91,330.654c0,5.106-4.14,9.246-9.246,9.246H286.73 c-5.106,0-9.246-4.14-9.246-9.246v-84.168c0-12.556,3.683-55.021-32.813-55.021c-28.309,0-34.051,29.066-35.204,42.11v97.079 c0,5.106-4.139,9.246-9.246,9.246h-44.426c-5.106,0-9.246-4.14-9.246-9.246V149.593c0-5.106,4.14-9.246,9.246-9.246h44.426 c5.106,0,9.246,4.14,9.246,9.246v15.655c10.497-15.753,26.097-27.912,59.312-27.912c73.552,0,73.131,68.716,73.131,106.472 L341.91,330.654L341.91,330.654z"></path>
                                </g></svg>
                        </a>
                    </li>
                    <li><a class="flex items-center justify-between">Telegram
                            <svg class="size-4" fill="#26A5E4" role="img" viewBox="0 0 24 24"
                                 xmlns="http://www.w3.org/2000/svg"><title>Telegram</title>
                                <path
                                    d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"/>
                            </svg>
                        </a>
                    </li>
                    <li><a class="flex items-center justify-between">Tik Tok
                            <svg class="size-4" fill="#000000" role="img" viewBox="0 0 24 24"
                                 xmlns="http://www.w3.org/2000/svg"><title>TikTok</title>
                                <path
                                    d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Phone -->
            <div class="dropdown dropdown-hover z-40">
                <div tabindex="0" role="button" class="btn m-1">
                    <i data-lucide="phone-call" class="size-4"></i>
                    Call us
                </div>

                <ul tabindex="-1" class="dropdown-content menu bg-base-100 rounded-box z-50 w-60 p-2 shadow-lg">
                    <li><a>Sales +(373) 61-21-00-21</a></li>
                    <li><a>Support +(373) 61-21-00-22</a></li>
                </ul>
            </div>

            <!-- Schedule -->
            <div class="dropdown dropdown-hover z-40">
                <div tabindex="0" role="button" class="btn m-1">
                    <i data-lucide="clipboard-clock" class="size-4"></i>

                    Today's hours: 9:00 to 18:00

                    <div class="inline-grid *:[grid-area:1/1]">
                        <div class="status status-success animate-ping"></div>
                        <div class="status status-success"></div>
                    </div>
                </div>

                <ul tabindex="-1" class="dropdown-content menu bg-base-100 rounded-box z-50 w-64 p-2 shadow-lg">

                    <li>
                        <a class="justify-between">
                            Monday
                            <span class="badge badge-info">09:00 - 18:00</span>
                        </a>
                    </li>

                    <li>
                        <a class="justify-between">
                            Tuesday
                            <span class="badge badge-success">09:00 - 18:00</span>
                        </a>
                    </li>

                    <li>
                        <a class="justify-between">
                            Wednesday
                            <span class="badge badge-success">08:00 - 17:00</span>
                        </a>
                    </li>

                    <li>
                        <a class="justify-between">
                            Thursday
                            <span class="badge badge-success">09:00 - 18:00</span>
                        </a>
                    </li>

                    <li>
                        <a class="justify-between">
                            Friday
                            <span class="badge badge-success">09:00 - 18:00</span>
                        </a>
                    </li>

                    <li>
                        <a class="justify-between">
                            Saturday
                            <span class="badge badge-error">Closed</span>
                        </a>
                    </li>

                    <li>
                        <a class="justify-between">
                            Sunday
                            <span class="badge badge-error">Closed</span>
                        </a>
                    </li>

                </ul>
            </div>

        </div>

        <div class="flex items-center space-x-2">
            <button class="btn btn-outline btn-xs">
                <a class="link"><span class="fi fi-md"></span> Md</a>
            </button>

            <button class="btn btn-outline btn-xs">
                <a class="link"><span class="fi fi-ru"></span> Ru</a>
            </button>

            <button class="btn btn-outline btn-xs">
                <a class="link"><span class="fi fi-gb"></span> En</a>
            </button>
        </div>

    </div>
</div>

{{--Main-Navigation-2--}}

<div class="navbar bg-base/90 backdrop-blur-md shadow-sm sticky top-10 z-30">
    <div class="navbar-start">
        <a class="cursor-pointer">
            <img src="{{asset('images/logo.png')}}" alt="Need 4 Parts"
                 class="h-10 rounded-3xl transition-transform duration-100 active:scale-95">
        </a>

    </div>

    <div class="navbar-center">
        <div class="megamenu max-sm:megamenu-vertical megamenu-full" id="my-megamenu-4" popover>

            <span class="megamenu-active"></span>

            <!-- Shop -->
            <button popovertarget="d1">Shop</button>

            <div id="d1" popover>
                <div class="flex max-sm:flex-col items-start">
                    <ul class="menu w-full md:menu-horizontal">

                        <li>
                            <a>Engine & Maintenance</a>
                            <ul>
                                <li><a>Air Filters</a></li>
                                <li><a>Oil Filters</a></li>
                                <li><a>Spark Plugs</a></li>
                                <li><a>Timing Belts</a></li>
                                <li><a>Engine Oil</a></li>
                            </ul>
                        </li>

                        <li>
                            <a>Brakes & Suspension</a>
                            <ul>
                                <li><a>Brake Pads</a></li>
                                <li><a>Brake Discs</a></li>
                                <li><a>Shock Absorbers</a></li>
                                <li><a>Control Arms</a></li>
                                <li><a>Wheel Bearings</a></li>
                            </ul>
                        </li>

                        <li>
                            <a>Electrical</a>
                            <ul>
                                <li><a>Batteries</a></li>
                                <li><a>Alternators</a></li>
                                <li><a>Starters</a></li>
                                <li><a>Sensors</a></li>
                                <li><a>Headlight Bulbs</a></li>
                            </ul>
                        </li>

                    </ul>

                    <img
                        src="{{asset('images/nav-shop.png')}}"
                        class="md:max-w-sm max-md:hidden"
                        alt="Automotive Parts">
                </div>
            </div>

            <!-- Brands -->
            <button popovertarget="d2">Brands</button>

            <div id="d2" popover>
                <div class="flex max-sm:flex-col items-start">
                    <ul class="menu w-full md:menu-horizontal">

                        <li>
                            <a>Popular Brands</a>
                            <ul>
                                <li><a>Bosch</a></li>
                                <li><a>MANN-FILTER</a></li>
                                <li><a>Brembo</a></li>
                                <li><a>NGK</a></li>
                                <li><a>Valeo</a></li>
                                <li><a>Sachs</a></li>
                            </ul>
                        </li>

                        <li>
                            <a>Shop By</a>
                            <ul>
                                <li><a>Vehicle Make</a></li>
                                <li><a>OEM Number</a></li>
                                <li><a>VIN Search</a></li>
                                <li><a>New Arrivals</a></li>
                                <li><a>Special Offers</a></li>
                                <li><a>Best Sellers</a></li>
                            </ul>
                        </li>

                    </ul>

                    <img
                        src="{{asset('images/nav-brand.png')}}"
                        class="md:max-w-sm max-md:hidden "
                        alt="Car Brands">
                </div>
            </div>

            <!-- Company -->
            <button popovertarget="d3">Company</button>

            <div id="d3" popover>
                <div class="flex max-sm:flex-col items-start">

                    <ul class="menu w-full md:menu-horizontal">

                        <li>
                            <a>About</a>
                            <ul>
                                <li><a>About Us</a></li>
                                <li><a>Our Mission</a></li>
                                <li><a>Careers</a></li>
                                <li><a>Blog</a></li>
                            </ul>
                        </li>

                        <li>
                            <a>Customer Service</a>
                            <ul>
                                <li><a>Contact Us</a></li>
                                <li><a>Shipping Information</a></li>
                                <li><a>Returns & Refunds</a></li>
                                <li><a>Warranty</a></li>
                                <li><a>FAQ</a></li>
                            </ul>
                        </li>

                        <li>
                            <a>Legal</a>
                            <ul>
                                <li><a>Privacy Policy</a></li>
                                <li><a>Terms & Conditions</a></li>
                                <li><a>Cookie Policy</a></li>
                            </ul>
                        </li>

                    </ul>

                    <img
                        src="{{asset('images/nav-about-us.png')}}"
                        class="md:max-w-sm max-md:hidden "
                        alt="Car Brands">

                </div>
            </div>

        </div>
    </div>

    <div class="navbar-end">
        <a class="btn">Login</a>
        <button class="btn sm:hidden" popovertarget="my-megamenu-4">
            Menu
        </button>
    </div>
</div>

{{--Hero Section --}}
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

{{--Introduction --}}

<section class="max-w-5xl mx-auto my-20 px-4 text-center">

    <h2 class="text-4xl md:text-6xl font-bold text-primary">
        Find the Right Parts.
    </h2>

    <p class="mt-6 text-xl text-base-content/70 max-w-2xl mx-auto">
        Quality automotive parts for passenger cars and commercial vehicles from trusted suppliers.
    </p>

</section>

{{--F.A.Q--}}

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


{{--Brand marquee--}}

@php
    $brands = [
       'toyota.svg',
       'bmw.svg',
       'mercedes.svg',
       'audi.svg',
       'volkswagen.svg',
       'ford.svg',
       'bosch.svg',
       'mann.svg'
   ];
@endphp

{{--Scroll to top buttton--}}

{{--<div class="w-10 h-8 pt-4"><i data-lucide="arrow-up-from-dot"></i></div>--}}

<a
    href="#top"
    class="fixed bottom-6 right-6 flex h-11 w-11 items-center justify-center rounded-xl bg-primary text-primary-content shadow-xl hover:scale-105 transition">
    <i data-lucide="arrow-up" class="size-5"></i>
</a>

{{--Footer 1--}}

<footer class="footer sm:footer-horizontal bg-base-200 text-base-content p-10">
    <aside>
        <img src="{{asset('images/logo.png')}}" alt="Need 4 Parts" class="h-10 rounded-3xl">
        <p>
            Connecting drivers with quality automotive parts. © {{ date('Y') }}.
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
