{{--Product Categories--}}

<section class="py-8 ">
    <div class="max-w-7xl mx-auto px-4 space-y-10">
        {{--Product Categories Header--}}
        <div>
            <h1 class="text-primary text-5xl font-bold text-start">Browse Categories</h1>
        </div>

        {{-- Product Categories Grid --}}
        <div class="grid grid-cols-3 grid-rows-4 gap-4 max-md:grid-cols-1 max-md:grid-rows-none">

            {{-- CATEGORY 1 - BRAKES--}}

            <div
                class="
            row-span-2
            group
            overflow-hidden
            rounded-2xl
            border
            border-base-300
            bg-base-100
            shadow-lg
            transition-all
            duration-500
            hover:-translate-y-1
            hover:border-primary
            hover:shadow-primary/30
            hover:shadow-2xl

            max-md:row-span-1
            max-md:min-h-[280px]
        "
            >

                <a
                    href="{{ route('category.show', ['category' => 'brake-system']) }}"
                    class="relative block h-full"
                >

                    <figure class="h-full overflow-hidden">

                        <img
                            src="{{ asset('images/categories-grid/car-brake-5.webp') }}"
                            alt="Brake System"
                            class="
                        h-full
                        w-full
                        object-cover
                        transition-transform
                        duration-700
                        group-hover:scale-110
                        max-md:min-h-[280px]
                    "
                        >

                    </figure>


                    {{-- Dark overlay on hover --}}
                    <div
                        class="
                    absolute
                    inset-0
                    bg-black/20
                    transition-all
                    duration-500
                    group-hover:bg-black/60
                "
                    >
                    </div>


                    {{-- Center Content --}}
                    <div
                        class="
                    absolute
                    inset-0
                    flex
                    items-center
                    justify-center
                    p-6
                    text-center
                    text-white
                "
                    >

                        <div>

                    <span class="badge badge-primary mb-4">
                        BRAKES
                    </span>


                            <h3 class="text-3xl font-bold drop-shadow-lg max-md:text-2xl">
                                Brake System
                            </h3>


                            <p class="mt-3 text-white/90 drop-shadow max-md:text-sm">
                                Brake Pads, Rotors,
                                Calipers & Suspension Parts.
                            </p>


                            {{-- Explore --}}
                            <div
                                class="
                            mt-5
                            font-semibold
                            opacity-0
                            translate-y-3
                            transition-all
                            duration-500
                            group-hover:opacity-100
                            group-hover:translate-y-0

                            max-md:translate-y-0
                            max-md:opacity-100
                        "
                            >
                                Explore →
                            </div>

                        </div>

                    </div>

                </a>

            </div>


            {{-- CATEGORY 2 - ENGINE--}}

            <div
                class="
            group
            overflow-hidden
            rounded-2xl
            border
            border-base-300
            bg-base-100
            shadow-lg
            transition-all
            duration-500
            hover:border-primary
            hover:shadow-primary/20
            hover:shadow-xl
        "
            >

                <a
                    href="{{ route('category.show', ['category' => 'engine-and-drivetrain']) }}"
                    class="block h-full"
                >

                    <figure class="h-40 overflow-hidden max-md:h-48">

                        <img
                            src="{{ asset('images/categories-grid/Car_Fuel_Pump__Understanding_Its_Role_and_How_to_Maintain_It.webp/') }}"
                            alt="Engine and Drivetrain"
                            class="
                        h-full
                        w-full
                        object-cover
                        transition-transform
                        duration-700
                        group-hover:scale-110
                    "
                        >

                    </figure>


                    <div class="card-body">

                <span class="badge badge-secondary w-fit">
                    ENGINE
                </span>


                        <h3 class="card-title text-2xl max-md:text-xl">
                            Engine and Drivetrain
                        </h3>


                        <p class="text-base-content/70 max-md:text-sm">
                            Filters,
                            Timing Kits,
                            Pistons &
                            Pumps.
                        </p>


                        <div class="mt-3 flex items-center gap-2 font-semibold text-primary">

                            Explore

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="size-5 transition-all duration-300 group-hover:translate-x-1"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 5l7 7-7 7"
                                />

                            </svg>

                        </div>

                    </div>

                </a>

            </div>


            {{-- CATEGORY 3 - WHEELS--}}

            <div
                class="
            row-span-2
            group
            overflow-hidden
            rounded-2xl
            border
            border-base-300
            bg-base-100
            shadow-lg
            transition-all
            duration-500
            hover:-translate-y-1
            hover:border-primary
            hover:shadow-primary/30
            hover:shadow-2xl

            max-md:row-span-1
            max-md:min-h-[280px]
        "
            >

                <a
                    href="{{ route('category.show', ['category' => 'wheels-and-tyres']) }}"
                    class="relative block h-full"
                >

                    <figure class="h-full overflow-hidden">

                        <img
                            src="{{ asset('images/categories-grid/wheels7.webp') }}"
                            alt="Wheels and Tires"
                            class="
                        h-full
                        w-full
                        object-cover
                        transition-transform
                        duration-700
                        group-hover:scale-110
                        max-md:min-h-[280px]
                    "
                        >

                    </figure>


                    {{-- Dark overlay --}}
                    <div
                        class="
                    absolute
                    inset-0
                    bg-black/20
                    transition-all
                    duration-500
                    group-hover:bg-black/60
                "
                    >
                    </div>


                    {{-- Center Content --}}
                    <div
                        class="
                    absolute
                    inset-0
                    flex
                    items-center
                    justify-center
                    p-6
                    text-center
                    text-white
                "
                    >

                        <div>

                    <span class="badge badge-accent mb-4">
                        Wheels
                    </span>


                            <h3 class="text-3xl font-bold drop-shadow-lg max-md:text-2xl">
                                Wheels & Tires
                            </h3>


                            <p class="mt-3 text-white/90 drop-shadow max-md:text-sm">
                                Alloy Wheels,
                                Performance Tires &
                                Accessories.
                            </p>


                            {{-- Explore --}}
                            <div
                                class="
                            mt-5
                            font-semibold
                            opacity-0
                            translate-y-3
                            transition-all
                            duration-500
                            group-hover:opacity-100
                            group-hover:translate-y-0

                            max-md:translate-y-0
                            max-md:opacity-100
                        "
                            >
                                Explore →
                            </div>

                        </div>

                    </div>

                </a>

            </div>


            {{-- CATEGORY 4 - ELECTRICAL --}}

            <div
                class="
            row-span-2
            row-start-2
            col-start-2
            group
            overflow-hidden
            rounded-2xl
            border
            border-base-300
            bg-base-100
            shadow-lg
            transition-all
            duration-500
            hover:-translate-y-1
            hover:border-primary
            hover:shadow-primary/30
            hover:shadow-2xl

            max-md:row-span-1
            max-md:row-start-auto
            max-md:col-start-auto
            max-md:min-h-[280px]
        "
            >

                <a
                    href="{{ route('category.show', ['category' => 'electrical-and-ignition']) }}"
                    class="relative block h-full"
                >

                    <figure class="h-full overflow-hidden">

                        <img
                            src="{{ asset('images/categories-grid/light3.webp') }}"
                            alt="Electrical and Ignition"
                            class="
                        h-full
                        w-full
                        object-cover
                        transition-transform
                        duration-700
                        group-hover:scale-110
                        max-md:min-h-[280px]
                    "
                        >

                    </figure>


                    {{-- Dark overlay --}}
                    <div
                        class="
                    absolute
                    inset-0
                    bg-black/20
                    transition-all
                    duration-500
                    group-hover:bg-black/60
                "
                    >
                    </div>


                    {{-- Center Content --}}
                    <div
                        class="
                    absolute
                    inset-0
                    flex
                    items-center
                    justify-center
                    p-6
                    text-center
                    text-white
                "
                    >

                        <div>

                    <span class="badge badge-info mb-4">
                        Electrical
                    </span>


                            <h3 class="text-3xl font-bold drop-shadow-lg max-md:text-2xl">
                                Electrical and Ignition
                            </h3>


                            <p class="mt-3 text-white/90 drop-shadow max-md:text-sm">
                                LED Headlights,
                                Tail Lights,
                                Fog Lamps &
                                Xenon Upgrades.
                            </p>


                            {{-- Explore --}}
                            <div
                                class="
                            mt-5
                            font-semibold
                            opacity-0
                            translate-y-3
                            transition-all
                            duration-500
                            group-hover:opacity-100
                            group-hover:translate-y-0

                            max-md:translate-y-0
                            max-md:opacity-100
                        "
                            >
                                Explore →
                            </div>

                        </div>

                    </div>

                </a>

            </div>


            {{-- CATEGORY 5 - BODY & INTERIOR--}}

            <div
                class="
            col-start-1
            overflow-hidden
            rounded-2xl
            border
            border-base-300
            bg-base-100
            shadow-lg
            transition-all
            duration-500
            hover:border-primary
            hover:shadow-primary/20
            hover:shadow-xl
            group

            max-md:col-start-auto
        "
            >

                <a
                    href="{{ route('category.show', ['category' => 'body-and-interior']) }}"
                    class="block h-full"
                >

                    <figure class="h-40 overflow-hidden max-md:h-48">

                        <img
                            src="{{ asset('images/categories-grid/body.webp') }}"
                            alt="Body and Interior"
                            class="
                        h-full
                        w-full
                        object-cover
                        transition-transform
                        duration-700
                        group-hover:scale-110
                    "
                        >

                    </figure>


                    <div class="card-body">

                <span class="badge badge-success w-fit">
                    Body
                </span>


                        <h3 class="card-title text-2xl max-md:text-xl">
                            Body and Interior
                        </h3>


                        <p class="text-base-content/70 max-md:text-sm">
                            Seat Covers,
                            Floor Mats,
                            Steering Wheels &
                            Premium Accessories.
                        </p>


                        <div class="mt-3 flex items-center gap-2 font-semibold text-primary">

                            Explore

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="size-5 transition-all duration-300 group-hover:translate-x-1"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 5l7 7-7 7"
                                />

                            </svg>

                        </div>

                    </div>

                </a>

            </div>


            {{-- CATEGORY 6 - FUEL & EXHAUST--}}

            <div
                class="
            col-start-3
            overflow-hidden
            rounded-2xl
            border
            border-base-300
            bg-base-100
            shadow-lg
            transition-all
            duration-500
            hover:border-primary
            hover:shadow-primary/20
            hover:shadow-xl
            group

            max-md:col-start-auto
        "
            >

                <a
                    href="{{ route('category.show', ['category' => 'fuel-and-exhaust']) }}"
                    class="block h-full"
                >

                    <figure class="h-40 overflow-hidden max-md:h-48">

                        <img
                            src="{{ asset('images/categories-grid/fuel-exhaust.webp') }}"
                            alt="Fuel and Exhaust"
                            class="
                        h-full
                        w-full
                        object-cover
                        transition-transform
                        duration-700
                        group-hover:scale-110
                    "
                        >

                    </figure>


                    <div class="card-body">

                <span class="badge badge-warning w-fit">
                    Fuel
                </span>


                        <h3 class="card-title text-2xl max-md:text-xl">
                            Fuel and Exhaust
                        </h3>


                        <p class="text-base-content/70 max-md:text-sm">
                            Turbo Kits,
                            Air Intakes,
                            Exhaust Systems &
                            Sport Components.
                        </p>


                        <div class="mt-3 flex items-center gap-2 font-semibold text-primary">

                            Explore

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="size-5 transition-all duration-300 group-hover:translate-x-1"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 5l7 7-7 7"
                                />

                            </svg>

                        </div>

                    </div>

                </a>

            </div>


            {{-- FREE SHIPPING BANNER--}}

            <div
                class="
            col-span-3
            group
            relative
            overflow-hidden
            rounded-2xl
            bg-base-100
            transition-all
            duration-500

            max-md:col-span-1
        "
            >

                <div class="relative h-64 overflow-hidden max-md:h-72">

                    {{-- Truck Image --}}
                    <img
                        src="{{ asset('images/categories-grid/truck2.webp') }}"
                        alt="Delivery truck"
                        class="
                    h-full
                    w-full
                    object-cover
                    transition-transform
                    duration-700
                    group-hover:scale-105
                "
                    >


                    {{-- Dark overlay --}}
                    <div
                        class="
                    absolute
                    inset-0
                    bg-gradient-to-r
                    from-black/80
                    via-black/40
                    to-transparent
                "
                    >
                    </div>


                    {{-- Content --}}
                    <div
                        class="
                    absolute
                    inset-y-0
                    left-0
                    flex
                    items-center
                    p-8
                    md:p-12

                    max-md:p-4
                "
                    >

                        <div class="max-w-lg text-white">

                    <span class="badge badge-primary mb-4">
                        FREE DELIVERY
                    </span>


                            <h2 class="text-4xl font-bold drop-shadow-lg max-md:text-3xl">
                                Fast Shipping For Every Order
                            </h2>


                            <p class="mt-3 text-white/90 max-md:text-sm">
                                Get your car parts delivered quickly
                                and safely straight to your garage.
                            </p>


                            <a
                                href="#"
                                class="
                            btn
                            btn-primary
                            mt-6
                        "
                            >
                                Browse all Categories
                            </a>

                        </div>

                    </div>

                </div>

            </div>


            {{-- End of grid --}}

        </div>

    </div>

</section>
