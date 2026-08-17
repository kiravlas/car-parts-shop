<div class="navbar bg-base/90 backdrop-blur-md shadow-sm sticky top-10 z-30">
    <div class="navbar-start gap-3">

        {{-- Logo --}}
        <a
            href="{{ route('home.index') }}"
            class="shrink-0 cursor-pointer"
        >
            <img
                src="{{ asset('images/logo.png') }}"
                alt="Need 4 Parts"
                class="h-10 rounded-3xl transition-transform duration-100 active:scale-95"
            >
        </a>


        {{-- Radio Player --}}
        <div
            id="radio-player-widget"
            class="flex items-center"
        >
            <div
                class="flex items-center gap-2 rounded-full
                   border border-base-content/10
                   bg-base-200/60
                   px-1.5 py-1
                   shadow-sm
                   backdrop-blur"
            >

                {{-- Play / Pause --}}
                <button
                    type="button"
                    id="radio-toggle"
                    class="btn btn-primary btn-circle btn-sm"
                    aria-label="Play radio"
                >

                    {{-- Play --}}
                    <i
                        id="radio-play-icon"
                        data-lucide="play"
                        class="size-4"
                    ></i>

                    {{-- Pause --}}
                    <i
                        id="radio-pause-icon"
                        data-lucide="pause"
                        class="hidden size-4"
                    ></i>

                </button>


                {{-- Radio information --}}
                <div class="hidden sm:block min-w-0 pr-2">

                    <div class="flex items-center gap-2">

                    <span class="text-xs font-bold whitespace-nowrap">
                        Metalcore Radio
                    </span>

                        <span
                            id="radio-status"
                            class="badge badge-ghost badge-xs"
                        >
                        Ready
                    </span>

                    </div>

                    <p class="text-[10px] text-base-content/50">
                        laut.fm
                    </p>

                </div>

            </div>


            {{-- Audio --}}
            <audio
                id="radio-audio"
                preload="none"
            >
                <source
                    src="https://stream.laut.fm/metalcore"
                    type="audio/mpeg"
                >

                Your browser does not support the audio element.
            </audio>

        </div>

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

    <div class="navbar-end flex items-center gap-3">

        @auth

            {{-- User dropdown --}}
            <div class="dropdown dropdown-end">

                <div
                    tabindex="0"
                    role="button"
                    class="btn btn-ghost gap-2"
                >

                    {{-- Avatar --}}
                    <div class="avatar placeholder">

                        @if (auth()->user()->avatar)

                            <div class="w-8 rounded-full">
                                <img
                                    src="{{ Storage::url(auth()->user()->avatar) }}"
                                    alt="{{ auth()->user()->name }}"
                                >
                            </div>

                        @else

                            <div
                                class="w-8 rounded-full bg-primary text-primary-content"
                            >
                        <span>
                            {{ collect(explode(' ', auth()->user()->name))
                                ->map(fn ($name) => strtoupper(substr($name, 0, 1)))
                                ->take(2)
                                ->implode('') }}
                        </span>
                            </div>

                        @endif

                    </div>

                    {{-- Name --}}
                    <span class="hidden sm:inline">
                {{ auth()->user()->name }}
            </span>

                    {{-- Chevron --}}
                    <i
                        data-lucide="chevron-down"
                        class="size-4"
                    ></i>

                </div>


                {{-- Dropdown --}}
                <ul
                    tabindex="0"
                    class="menu dropdown-content
                   bg-base-200 rounded-box z-50
                   mt-3 w-52 p-2 shadow"
                >

                    {{-- Dashboard --}}
                    <li>
                        <a href="{{ url('/admin/dashboard') }}">
                            <i data-lucide="layout-dashboard" class="size-4"></i>
                            Dashboard
                        </a>
                    </li>

                    {{-- Account --}}
                    <li>
                        <a href="{{ route('profile.show') }}">
                            <i data-lucide="user" class="size-4"></i>
                            Account
                        </a>
                    </li>


                    <div class="divider my-1"></div>


                    {{-- Logout --}}
                    <li>
                        <form
                            method="POST"
                            action="{{ route('logout') }}"
                        >
                            @csrf

                            <button
                                type="submit"
                                class="text-error w-full"
                            >
                                <i
                                    data-lucide="log-out"
                                    class="size-4"
                                ></i>

                                Logout
                            </button>
                        </form>
                    </li>

                </ul>

            </div>

        @endauth

        @guest

            <a
                href="{{ route('login') }}"
                class="btn btn-ghost btn-circle hidden md:inline-flex"
                aria-label="Login"
            >
                <i data-lucide="log-in"></i>
            </a>

        @endguest


        {{-- Wishlist --}}
        <a
            href="#"
            class="btn btn-ghost btn-circle hidden md:inline-flex"
            aria-label="Wishlist"
        >
            <i data-lucide="heart"></i>
        </a>


        {{-- Compare --}}
        <a
            href="#"
            class="btn btn-ghost btn-circle hidden md:inline-flex"
            aria-label="Compare"
        >
            <i data-lucide="scale"></i>
        </a>

        {{-- Search --}}
        <a
            href="#"
            class="btn btn-ghost btn-circle hidden md:inline-flex"
            aria-label="Search"
        >
            <i data-lucide="search"></i>
        </a>


        {{-- Cart --}}
        <a
            href="#"
            class="btn btn-ghost btn-circle"
            aria-label="Shopping cart"
        >
            <i data-lucide="shopping-cart"></i>
        </a>


        {{-- Mobile Menu --}}
        <button
            class="btn sm:hidden"
            popovertarget="my-megamenu-4"
        >
            Menu
        </button>

    </div>


</div>

