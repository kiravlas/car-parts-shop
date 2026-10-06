{{-- Product Categories --}}
<section class="py-8">
    <div class="mx-auto max-w-7xl space-y-10 px-4">
        {{-- Product Categories Header --}}
        <div>
            <h1 class="text-start text-5xl font-bold text-primary">
                Browse Categories
            </h1>
        </div>

        {{-- Product Categories Grid --}}
        <div class="grid grid-cols-3 grid-rows-4 gap-4 max-md:grid-cols-1 max-md:grid-rows-none">
            {{-- Category 1 - Brakes --}}
            <div
                class="group row-span-2 overflow-hidden rounded-2xl border border-base-300 bg-base-100 shadow-lg transition-all duration-500 hover:-translate-y-1 hover:border-primary hover:shadow-2xl hover:shadow-primary/30 max-md:row-span-1 max-md:min-h-[280px]"
            >
                <a
                    href="{{ route('products.index', ['category' => 'brake-system']) }}"
                    class="relative block h-full"
                >
                    <figure class="h-full overflow-hidden">
                        <img
                            src="{{ asset('images/categories-grid/car-brake-5.webp') }}"
                            alt="Brake System"
                            class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110 max-md:min-h-[280px]"
                        >
                    </figure>

                    {{-- Dark Overlay --}}
                    <div class="absolute inset-0 bg-black/20 transition-all duration-500 group-hover:bg-black/60"></div>

                    {{-- Center Content --}}
                    <div class="absolute inset-0 flex items-center justify-center p-6 text-center text-white">
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

                            <div
                                class="mt-5 translate-y-3 font-semibold opacity-0 transition-all duration-500 group-hover:translate-y-0 group-hover:opacity-100 max-md:translate-y-0 max-md:opacity-100">
                                Explore →
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Category 2 - Engine --}}
            <div
                class="group overflow-hidden rounded-2xl border border-base-300 bg-base-100 shadow-lg transition-all duration-500 hover:border-primary hover:shadow-xl hover:shadow-primary/20"
            >
                <a
                    href="{{ route('products.index', ['category' => 'engine-and-drivetrain']) }}"
                    class="block h-full"
                >
                    <figure class="h-40 overflow-hidden max-md:h-48">
                        <img
                            src="{{ asset('images/categories-grid/Car_Fuel_Pump__Understanding_Its_Role_and_How_to_Maintain_It.webp/') }}"
                            alt="Engine and Drivetrain"
                            class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110"
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

            {{-- Category 3 - Wheels --}}
            <div
                class="group row-span-2 overflow-hidden rounded-2xl border border-base-300 bg-base-100 shadow-lg transition-all duration-500 hover:-translate-y-1 hover:border-primary hover:shadow-2xl hover:shadow-primary/30 max-md:row-span-1 max-md:min-h-[280px]"
            >
                <a
                    href="{{ route('products.index', ['category' => 'wheels-and-tyres']) }}"
                    class="relative block h-full"
                >
                    <figure class="h-full overflow-hidden">
                        <img
                            src="{{ asset('images/categories-grid/wheels7.webp') }}"
                            alt="Wheels and Tires"
                            class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110 max-md:min-h-[280px]"
                        >
                    </figure>

                    {{-- Dark Overlay --}}
                    <div class="absolute inset-0 bg-black/20 transition-all duration-500 group-hover:bg-black/60"></div>

                    {{-- Center Content --}}
                    <div class="absolute inset-0 flex items-center justify-center p-6 text-center text-white">
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

                            <div
                                class="mt-5 translate-y-3 font-semibold opacity-0 transition-all duration-500 group-hover:translate-y-0 group-hover:opacity-100 max-md:translate-y-0 max-md:opacity-100">
                                Explore →
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Category 4 - Electrical --}}
            <div
                class="group col-start-2 row-start-2 row-span-2 overflow-hidden rounded-2xl border border-base-300 bg-base-100 shadow-lg transition-all duration-500 hover:-translate-y-1 hover:border-primary hover:shadow-2xl hover:shadow-primary/30 max-md:col-start-auto max-md:row-start-auto max-md:row-span-1 max-md:min-h-[280px]"
            >
                <a
                    href="{{ route('products.index', ['category' => 'electrical-and-ignition']) }}"
                    class="relative block h-full"
                >
                    <figure class="h-full overflow-hidden">
                        <img
                            src="{{ asset('images/categories-grid/light3.webp') }}"
                            alt="Electrical and Ignition"
                            class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110 max-md:min-h-[280px]"
                        >
                    </figure>

                    {{-- Dark Overlay --}}
                    <div class="absolute inset-0 bg-black/20 transition-all duration-500 group-hover:bg-black/60"></div>

                    {{-- Center Content --}}
                    <div class="absolute inset-0 flex items-center justify-center p-6 text-center text-white">
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

                            <div
                                class="mt-5 translate-y-3 font-semibold opacity-0 transition-all duration-500 group-hover:translate-y-0 group-hover:opacity-100 max-md:translate-y-0 max-md:opacity-100">
                                Explore →
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Category 5 - Body & Interior --}}
            <div
                class="group col-start-1 overflow-hidden rounded-2xl border border-base-300 bg-base-100 shadow-lg transition-all duration-500 hover:border-primary hover:shadow-xl hover:shadow-primary/20 max-md:col-start-auto"
            >
                <a
                    href="{{ route('products.index', ['category' => 'body-and-interior']) }}"
                    class="block h-full"
                >
                    <figure class="h-40 overflow-hidden max-md:h-48">
                        <img
                            src="{{ asset('images/categories-grid/body.webp') }}"
                            alt="Body and Interior"
                            class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110"
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

            {{-- Category 6 - Fuel & Exhaust --}}
            <div
                class="group col-start-3 overflow-hidden rounded-2xl border border-base-300 bg-base-100 shadow-lg transition-all duration-500 hover:border-primary hover:shadow-xl hover:shadow-primary/20 max-md:col-start-auto"
            >
                <a
                    href="{{ route('products.index', ['category' => 'fuel-and-exhaust']) }}"
                    class="block h-full"
                >
                    <figure class="h-40 overflow-hidden max-md:h-48">
                        <img
                            src="{{ asset('images/categories-grid/fuel-exhaust.webp') }}"
                            alt="Fuel and Exhaust"
                            class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110"
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

            {{-- Free Shipping Banner --}}
            <div
                class="group relative col-span-3 overflow-hidden rounded-2xl bg-base-100 transition-all duration-500 max-md:col-span-1">
                <div class="relative h-64 overflow-hidden max-md:h-72">
                    {{-- Truck Image --}}
                    <img
                        src="{{ asset('images/categories-grid/truck2.webp') }}"
                        alt="Delivery truck"
                        class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105"
                    >

                    {{-- Dark Overlay --}}
                    <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/40 to-transparent"></div>

                    {{-- Content --}}
                    <div class="absolute inset-y-0 left-0 flex items-center p-8 md:p-12 max-md:p-4">
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
                                href="{{ route('categories.index') }}"
                                class="btn btn-primary mt-6"
                            >
                                Browse all Categories
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
