<x-layouts.app>
    {{--    hello from categories show page--}}
    {{--    Category: {{$category}}--}}
    {{--    <a href="{{route('show.product', ['product' =>'best-wheel'])}}">go to product</a>--}}

    <div class="min-h-screen bg-base-300 py-10">

        <div class="mx-auto max-w-7xl px-4">


            {{-- Breadcrumbs --}}
            <div class="breadcrumbs mb-6 text-sm">

                <ul>

                    <li>
                        <a href="{{ route('home.index') }}">
                            Home
                        </a>
                    </li>

                    <li>
                        Categories
                    </li>

                    <li>
                        Brake Parts
                    </li>

                </ul>

            </div>


            {{-- Category Hero --}}
            <section
                class="hero overflow-hidden rounded-3xl bg-base-100 shadow-xl mb-10">

                <div class="hero-content py-14 text-center">

                    <div class="max-w-3xl">

                        <div class="badge badge-primary badge-lg">
                            Category
                        </div>


                        <h1 class="mt-5 text-4xl font-bold md:text-5xl">

                            Brake Parts

                        </h1>


                        <p class="mt-4 text-base-content/70">

                            Premium brake pads, rotors,
                            calipers and braking components
                            for every vehicle.

                        </p>

                    </div>

                </div>

            </section>


            {{-- Toolbar --}}
            <div class="mb-8 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">


                <div>

                    <h2 class="text-3xl font-bold">

                        Brake Parts

                    </h2>


                    <p class="text-base-content/70">

                        Showing 24 products

                    </p>

                </div>


                <select
                    class="select select-bordered w-full md:w-56">

                    <option>
                        Sort: Featured
                    </option>

                    <option>
                        Price: Low to High
                    </option>

                    <option>
                        Price: High to Low
                    </option>

                    <option>
                        Newest
                    </option>

                </select>


            </div>


            {{-- Main Content --}}
            <div class="grid gap-8 lg:grid-cols-4">


                {{-- Filters --}}
                <aside
                    class="card hidden h-fit border border-base-300 bg-base-100 shadow-xl lg:block">


                    <div class="card-body">


                        <h2 class="card-title">
                            Filters
                        </h2>


                        <div class="divider"></div>


                        {{-- Brand --}}
                        <div>

                            <h3 class="mb-3 font-semibold">
                                Brand
                            </h3>


                            <div class="space-y-3">


                                <label class="flex items-center gap-3">

                                    <input
                                        type="checkbox"
                                        class="checkbox checkbox-primary">


                                    <span>
                                    Bosch
                                </span>

                                </label>


                                <label class="flex items-center gap-3">

                                    <input
                                        type="checkbox"
                                        class="checkbox checkbox-primary">


                                    <span>
                                    Brembo
                                </span>

                                </label>


                                <label class="flex items-center gap-3">

                                    <input
                                        type="checkbox"
                                        class="checkbox checkbox-primary">


                                    <span>
                                    TRW
                                </span>

                                </label>


                                <label class="flex items-center gap-3">

                                    <input
                                        type="checkbox"
                                        class="checkbox checkbox-primary">


                                    <span>
                                    ATE
                                </span>

                                </label>


                            </div>

                        </div>


                        <div class="divider"></div>


                        {{-- Price --}}
                        <div>


                            <h3 class="mb-3 font-semibold">
                                Price Range
                            </h3>


                            <input
                                type="range"
                                min="0"
                                max="500"
                                class="range range-primary">


                            <div class="mt-2 flex justify-between text-sm">

                            <span>
                                $0
                            </span>

                                <span>
                                $500
                            </span>

                            </div>


                        </div>


                        <div class="divider"></div>


                        {{-- Availability --}}
                        <div>


                            <h3 class="mb-3 font-semibold">
                                Availability
                            </h3>


                            <label class="flex items-center gap-3">

                                <input
                                    type="checkbox"
                                    class="checkbox checkbox-primary">


                                <span>
                                In Stock
                            </span>

                            </label>


                        </div>


                    </div>


                </aside>


                {{-- Products --}}
                <div class="lg:col-span-3">


                    <div
                        class="grid gap-6 sm:grid-cols-2 xl:grid-cols-3">


                        {{-- Product 1 --}}
                        <div
                            class="group card overflow-hidden border border-base-300 bg-base-100 shadow-lg transition-all duration-300 hover:border-primary hover:shadow-xl">


                            <figure class="h-56 overflow-hidden">


                                <img
                                    src="https://placehold.co/600x400"
                                    alt="Brake Pads"
                                    class="h-full w-full object-cover transition duration-500 group-hover:scale-110">


                            </figure>


                            <div class="card-body">


                                <div class="badge badge-outline">
                                    Bosch
                                </div>


                                <h2 class="card-title mt-2">

                                    Premium Brake Pads

                                </h2>


                                <p class="text-base-content/70">

                                    High performance brake pads
                                    for everyday driving.

                                </p>


                                <div class="mt-3 flex items-center justify-between">


                                <span class="text-2xl font-bold text-primary">

                                    $79.99

                                </span>


                                    <div class="rating rating-sm">

                                        <input
                                            type="radio"
                                            class="mask mask-star-2 bg-orange-400"
                                            checked>

                                        <input
                                            type="radio"
                                            class="mask mask-star-2 bg-orange-400">

                                        <input
                                            type="radio"
                                            class="mask mask-star-2 bg-orange-400">

                                        <input
                                            type="radio"
                                            class="mask mask-star-2 bg-orange-400">

                                        <input
                                            type="radio"
                                            class="mask mask-star-2 bg-orange-400">

                                    </div>


                                </div>


                                <div class="card-actions mt-5">

                                    <a
                                        href="#"
                                        class="btn btn-primary btn-block">

                                        View Product

                                    </a>

                                </div>


                            </div>


                        </div>


                        {{-- Duplicate cards for now --}}
                        @for($i = 0; $i < 5; $i++)

                            <div
                                class="group card overflow-hidden border border-base-300 bg-base-100 shadow-lg transition-all duration-300 hover:border-primary hover:shadow-xl">


                                <figure class="h-56 overflow-hidden">

                                    <img
                                        src="https://placehold.co/600x400"
                                        alt="Product"
                                        class="h-full w-full object-cover transition duration-500 group-hover:scale-110">

                                </figure>


                                <div class="card-body">


                                    <div class="badge badge-outline">
                                        Brembo
                                    </div>


                                    <h2 class="card-title">
                                        Brake Component
                                    </h2>


                                    <p class="text-base-content/70">
                                        Quality automotive part.
                                    </p>


                                    <div class="flex items-center justify-between">


                                    <span class="text-xl font-bold text-primary">
                                        $49.99
                                    </span>


                                    </div>


                                    <a
                                        href="#"
                                        class="btn btn-primary btn-block mt-4">

                                        View Product

                                    </a>


                                </div>


                            </div>

                        @endfor


                    </div>


                    {{-- Pagination --}}
                    <div class="mt-12 flex justify-center">


                        <div class="join">


                            <button class="join-item btn">
                                «
                            </button>


                            <button class="join-item btn btn-primary">
                                1
                            </button>


                            <button class="join-item btn">
                                2
                            </button>


                            <button class="join-item btn">
                                3
                            </button>


                            <button class="join-item btn">
                                »
                            </button>


                        </div>


                    </div>


                </div>


            </div>


        </div>

    </div>
</x-layouts.app>
