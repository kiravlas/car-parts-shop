{{--Product Categories--}}

<section class="py-8 ">
    <div class="max-w-7xl mx-auto px-4 space-y-10">
        {{--Product Categories Header--}}
        <div>
            <h1 class="text-primary text-5xl font-bold text-start">Browse Categories</h1>
        </div>

        {{--Product Categories Grid--}}
        <div class="grid grid-cols-3 grid-rows-4 gap-4">
            {{--Categories--}}
            {{-- Category 1 --}}
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
    ">

                <a href="{{ route('show.category', ['category'=>'brakes']) }}"
                   class="relative block h-full">


                    <figure class="h-full overflow-hidden">

                        <img
                            src="https://images.unsplash.com/photo-1487754180451-c456f719a1fc?auto=format&fit=crop&w=1200&q=80"
                            alt="Brakes"
                            class="
                h-full
                w-full
                object-cover
                transition-transform
                duration-700
                group-hover:scale-110
                ">

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
            ">
                    </div>


                    {{-- CENTER CONTENT --}}
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
            ">


                        <div>


                <span class="badge badge-primary mb-4">
                    CATEGORY
                </span>


                            <h3 class="text-3xl font-bold drop-shadow-lg">
                                Brakes
                            </h3>


                            <p class="mt-3 text-white/90 drop-shadow">
                                Brake Pads, Rotors,
                                Calipers & Suspension Parts.
                            </p>


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
                    ">

                                Explore →

                            </div>


                        </div>


                    </div>


                </a>


            </div>

            {{-- Category 2 --}}
            <div
                class="group overflow-hidden rounded-2xl border border-base-300 bg-base-100 shadow-lg transition-all duration-500 hover:border-primary hover:shadow-primary/20 hover:shadow-xl">

                <a href="{{ route('show.category', ['category'=>'engine']) }}"
                   class="block h-full">

                    <figure class="h-40 overflow-hidden">

                        <img
                            src="https://images.unsplash.com/photo-1489824904134-891ab64532f1?auto=format&fit=crop&w=1200&q=80"
                            alt="Engine Parts"
                            class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">

                    </figure>

                    <div class="card-body">

            <span class="badge badge-secondary w-fit">
                ENGINE
            </span>

                        <h3 class="card-title text-2xl">
                            Engine Parts
                        </h3>

                        <p class="text-base-content/70">
                            Filters,
                            Timing Kits,
                            Pistons &
                            Pumps.
                        </p>

                        <div class="mt-3 flex items-center gap-2 font-semibold text-primary">

                            Explore

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="size-5 transition-all duration-300 group-hover:translate-x-1"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M9 5l7 7-7 7"/>

                            </svg>

                        </div>

                    </div>

                </a>

            </div>


            {{-- Category 3 --}}
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
    ">

                <a href="{{ route('show.category', ['category'=>'wheels']) }}"
                   class="relative block h-full">

                    <figure class="h-full overflow-hidden">

                        <img
                            src="https://images.unsplash.com/photo-1552519507-da3b142c6e3d?auto=format&fit=crop&w=1200&q=80"
                            alt="Wheels"
                            class="
                h-full
                w-full
                object-cover
                transition-transform
                duration-700
                group-hover:scale-110
                ">

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
            ">
                    </div>

                    {{-- CENTER CONTENT --}}
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
            ">

                        <div>

                <span class="badge badge-accent mb-4">
                    CATEGORY
                </span>

                            <h3 class="text-3xl font-bold drop-shadow-lg">
                                Wheels & Tires
                            </h3>

                            <p class="mt-3 text-white/90 drop-shadow">
                                Alloy Wheels,
                                Performance Tires &
                                Accessories.
                            </p>

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
                    ">

                                Explore →

                            </div>

                        </div>

                    </div>

                </a>

            </div>
            {{-- Category 4 --}}
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
    ">

                <a href="{{ route('show.category', ['category'=>'lighting']) }}"
                   class="relative block h-full">

                    <figure class="h-full overflow-hidden">

                        <img
                            src="https://images.unsplash.com/photo-1542362567-b07e54358753?auto=format&fit=crop&w=1200&q=80"
                            alt="Lighting"
                            class="
                h-full
                w-full
                object-cover
                transition-transform
                duration-700
                group-hover:scale-110
                ">

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
            ">
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
            ">

                        <div>

                <span class="badge badge-info mb-4">
                    CATEGORY
                </span>

                            <h3 class="text-3xl font-bold drop-shadow-lg">
                                Lighting
                            </h3>

                            <p class="mt-3 text-white/90 drop-shadow">
                                LED Headlights,
                                Tail Lights,
                                Fog Lamps &
                                Xenon Upgrades.
                            </p>

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
                    ">

                                Explore →

                            </div>

                        </div>

                    </div>

                </a>

            </div>

            {{-- Category 5 --}}
            <div
                class="col-start-1 overflow-hidden rounded-2xl border border-base-300 bg-base-100 shadow-lg transition-all duration-500 hover:border-primary hover:shadow-primary/20 hover:shadow-xl group">

                <a href="{{ route('show.category', ['category'=>'interior']) }}"
                   class="block h-full">

                    <figure class="h-40 overflow-hidden">

                        <img
                            src="https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?auto=format&fit=crop&w=1200&q=80"
                            alt="Interior"
                            class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">

                    </figure>

                    <div class="card-body">

            <span class="badge badge-success w-fit">
                INTERIOR
            </span>

                        <h3 class="card-title text-2xl">
                            Interior Accessories
                        </h3>

                        <p class="text-base-content/70">
                            Seat Covers,
                            Floor Mats,
                            Steering Wheels &
                            Premium Accessories.
                        </p>

                        <div class="mt-3 flex items-center gap-2 font-semibold text-primary">

                            Explore

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="size-5 transition-all duration-300 group-hover:translate-x-1"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M9 5l7 7-7 7"/>

                            </svg>

                        </div>

                    </div>

                </a>

            </div>


            {{-- Category 6 --}}
            <div
                class="col-start-3 overflow-hidden rounded-2xl border border-base-300 bg-base-100 shadow-lg transition-all duration-500 hover:border-primary hover:shadow-primary/20 hover:shadow-xl group">

                <a href="{{ route('show.category', ['category'=>'performance']) }}"
                   class="block h-full">

                    <figure class="h-40 overflow-hidden">

                        <img
                            src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?auto=format&fit=crop&w=1200&q=80"
                            alt="Performance"
                            class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">

                    </figure>

                    <div class="card-body">

            <span class="badge badge-warning w-fit">
                PERFORMANCE
            </span>

                        <h3 class="card-title text-2xl">
                            Performance Parts
                        </h3>

                        <p class="text-base-content/70">
                            Turbo Kits,
                            Air Intakes,
                            Exhaust Systems &
                            Sport Components.
                        </p>

                        <div class="mt-3 flex items-center gap-2 font-semibold text-primary">

                            Explore

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="size-5 transition-all duration-300 group-hover:translate-x-1"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M9 5l7 7-7 7"/>

                            </svg>

                        </div>

                    </div>

                </a>

            </div>
            {{-- Free Shipping Banner --}}
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
    ">


                <div class="relative h-64 overflow-hidden">


                    {{-- Truck Image --}}
                    <img
                        src="https://images.unsplash.com/photo-1586191582151-f73872dfd183?auto=format&fit=crop&w=1600&q=80"
                        alt="Delivery truck"
                        class="
            h-full
            w-full
            object-cover
            transition-transform
            duration-700
            group-hover:scale-105
            ">


                    {{-- Dark overlay --}}
                    <div
                        class="
            absolute
            inset-0
            bg-gradient-to-r
            from-black/80
            via-black/40
            to-transparent
            ">
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
            ">


                        <div class="max-w-lg text-white">


                <span class="badge badge-primary mb-4">
                    FREE DELIVERY
                </span>


                            <h2 class="text-4xl font-bold drop-shadow-lg">
                                Fast Shipping For Every Order
                            </h2>


                            <p class="mt-3 text-white/90">
                                Get your car parts delivered quickly
                                and safely straight to your garage.
                            </p>


                            <a href="#"
                               class="
                   btn
                   btn-primary
                   mt-6
                   ">

                                Shop Now

                            </a>


                        </div>


                    </div>


                </div>


            </div>

            {{--            end of grid--}}

        </div>
    </div>

</section>
