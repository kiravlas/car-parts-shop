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
        <label
            for="search-drawer"
            class="btn btn-ghost btn-circle hidden md:inline-flex"
            aria-label="Open search"
        >
            <i data-lucide="search"></i>
        </label>


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

{{-- ========================================================= --}}
{{-- Search Drawer                                             --}}
{{-- ========================================================= --}}

<div class="drawer drawer-end z-[99]">

    <input
        id="search-drawer"
        type="checkbox"
        class="drawer-toggle"
    />

    <div class="drawer-content">
        {{-- Empty --}}
    </div>


    <div class="drawer-side">

        {{-- Overlay --}}
        <label
            for="search-drawer"
            aria-label="Close search"
            class="drawer-overlay"
        ></label>


        {{-- ================================================= --}}
        {{-- Drawer                                             --}}
        {{-- ================================================= --}}

        <div
            class="h-full w-full max-w-md
           overflow-y-auto
           bg-base-100
           border-l border-base-content/10
           shadow-2xl"
        >

            {{-- ================================================= --}}
            {{-- Header                                            --}}
            {{-- ================================================= --}}

            <div
                class="flex items-center justify-between
                       border-b border-base-content/10
                       px-6 py-5"
            >

                <div>

                    <div class="flex items-center gap-2">

                        <i
                            data-lucide="search"
                            class="size-5 text-primary"
                        ></i>

                        <h2 class="text-lg font-bold">
                            Find Parts
                        </h2>

                    </div>

                    <p class="mt-1 text-sm text-base-content/60">
                        Search parts for your vehicle
                    </p>

                </div>


                {{-- Close --}}
                <label
                    for="search-drawer"
                    class="btn btn-ghost btn-sm btn-circle"
                    aria-label="Close search"
                >
                    <i data-lucide="x"></i>
                </label>

            </div>


            {{-- ================================================= --}}
            {{-- Search Content                                    --}}
            {{-- ================================================= --}}

            <div class="space-y-6 p-6">


                {{-- ================================================= --}}
                {{-- Vehicle Finder                                   --}}
                {{-- ================================================= --}}

                <section>

                    <div class="mb-3">

                        <h3 class="flex items-center gap-2 font-semibold">

                            <i
                                data-lucide="car-front"
                                class="size-4 text-primary"
                            ></i>

                            Find by vehicle

                        </h3>

                        <p class="mt-1 text-xs text-base-content/60">
                            Select your vehicle to find compatible parts.
                        </p>

                    </div>


                    <form
                        action="#"
                        method="GET"
                        class="space-y-3"
                    >

                        {{-- Make --}}
                        <label class="form-control">

                            <div class="label py-1">
                                <span class="label-text text-sm font-medium">
                                    Make
                                </span>
                            </div>

                            <select
                                name="make"
                                class="select select-bordered w-full"
                            >
                                <option value="" disabled selected>
                                    Select make
                                </option>

                                <option>BMW</option>
                                <option>Mercedes-Benz</option>
                                <option>Audi</option>
                                <option>Volkswagen</option>
                                <option>Toyota</option>
                                <option>Honda</option>
                                <option>Ford</option>
                            </select>

                        </label>


                        {{-- Model --}}
                        <label class="form-control">

                            <div class="label py-1">
                                <span class="label-text text-sm font-medium">
                                    Model
                                </span>
                            </div>

                            <select
                                name="model"
                                class="select select-bordered w-full"
                            >
                                <option value="" disabled selected>
                                    Select model
                                </option>

                                <option>3 Series</option>
                                <option>5 Series</option>
                                <option>C-Class</option>
                                <option>E-Class</option>
                                <option>A4</option>
                                <option>Golf</option>
                            </select>

                        </label>


                        {{-- Year + Engine --}}
                        <div class="grid grid-cols-2 gap-3">

                            {{-- Year --}}
                            <label class="form-control">

                                <div class="label py-1">
                                    <span class="label-text text-sm font-medium">
                                        Year
                                    </span>
                                </div>

                                <select
                                    name="year"
                                    class="select select-bordered w-full"
                                >
                                    <option value="" disabled selected>
                                        Year
                                    </option>

                                    @for ($year = date('Y'); $year >= 1990; $year--)
                                        <option value="{{ $year }}">
                                            {{ $year }}
                                        </option>
                                    @endfor

                                </select>

                            </label>


                            {{-- Engine --}}
                            <label class="form-control">

                                <div class="label py-1">
                                    <span class="label-text text-sm font-medium">
                                        Engine
                                    </span>
                                </div>

                                <select
                                    name="engine"
                                    class="select select-bordered w-full"
                                >
                                    <option value="" disabled selected>
                                        Engine
                                    </option>

                                    <option>1.4 Petrol</option>
                                    <option>1.6 Petrol</option>
                                    <option>2.0 Petrol</option>
                                    <option>2.0 Diesel</option>
                                    <option>3.0 Diesel</option>
                                </select>

                            </label>

                        </div>


                        {{-- Search button --}}
                        <button
                            type="submit"
                            class="btn btn-primary w-full"
                        >
                            <i
                                data-lucide="search"
                                class="size-4"
                            ></i>

                            Find Compatible Parts
                        </button>

                    </form>

                </section>


                {{-- ================================================= --}}
                {{-- Divider                                           --}}
                {{-- ================================================= --}}

                <div class="divider my-0 text-xs text-base-content/40">
                    OR SEARCH DIRECTLY
                </div>


                {{-- ================================================= --}}
                {{-- VIN Search                                        --}}
                {{-- ================================================= --}}

                <section>

                    <div class="mb-3">

                        <h3 class="flex items-center gap-2 font-semibold">

                            <i
                                data-lucide="scan-line"
                                class="size-4 text-primary"
                            ></i>

                            Search by VIN

                        </h3>

                        <p class="mt-1 text-xs text-base-content/60">
                            Find parts specifically for your vehicle.
                        </p>

                    </div>


                    <form
                        action="#"
                        method="GET"
                    >

                        <div class="join w-full">

                            <input
                                type="text"
                                name="vin"
                                maxlength="17"
                                placeholder="Enter 17-character VIN"
                                class="input input-bordered join-item w-full uppercase"
                            >

                            <button
                                type="submit"
                                class="btn btn-primary join-item"
                            >
                                Search
                            </button>

                        </div>

                    </form>

                </section>


                {{-- ================================================= --}}
                {{-- Part Number                                        --}}
                {{-- ================================================= --}}

                <section>

                    <div class="mb-3">

                        <h3 class="flex items-center gap-2 font-semibold">

                            <i
                                data-lucide="hash"
                                class="size-4 text-primary"
                            ></i>

                            Search by part number

                        </h3>

                        <p class="mt-1 text-xs text-base-content/60">
                            Enter an OEM or manufacturer part number.
                        </p>

                    </div>


                    <form
                        action="#"
                        method="GET"
                    >

                        <div class="join w-full">

                            <input
                                type="text"
                                name="part_number"
                                placeholder="e.g. 34116792219"
                                class="input input-bordered join-item w-full"
                            >

                            <button
                                type="submit"
                                class="btn btn-primary join-item"
                            >
                                Search
                            </button>

                        </div>

                    </form>

                </section>


                {{-- ================================================= --}}
                {{-- Product Name                                       --}}
                {{-- ================================================= --}}

                <section>

                    <div class="mb-3">

                        <h3 class="flex items-center gap-2 font-semibold">

                            <i
                                data-lucide="package-search"
                                class="size-4 text-primary"
                            ></i>

                            Search by name

                        </h3>

                        <p class="mt-1 text-xs text-base-content/60">
                            Search our catalog by product name.
                        </p>

                    </div>


                    <form
                        action="#"
                        method="GET"
                    >

                        <label class="input input-bordered flex w-full items-center gap-2">

                            <i
                                data-lucide="search"
                                class="size-4 text-base-content/50"
                            ></i>

                            <input
                                type="search"
                                name="q"
                                placeholder="Brake pads, oil filter..."
                                class="grow"
                            >

                            <button
                                type="submit"
                                class="btn btn-primary btn-sm"
                            >
                                Search
                            </button>

                        </label>

                    </form>

                </section>


            </div>

        </div>

    </div>

</div>
