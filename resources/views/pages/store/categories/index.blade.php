<x-layouts.app>

    {{-- ========================================================= --}}
    {{-- SHOP CATEGORIES                                           --}}
    {{-- ========================================================= --}}

    <section class="bg-base-200 py-8 lg:py-12">

        <div class="container mx-auto px-4">

            {{-- ================================================= --}}
            {{-- SECTION HEADER                                    --}}
            {{-- ================================================= --}}

            <div class="mb-8 lg:mb-10">

                {{-- ========================================================= --}}
                {{-- BREADCRUMBS                                               --}}
                {{-- ========================================================= --}}

                <div class="breadcrumbs mb-6 text-sm text-base-content/60">

                    <ul>

                        <li>
                            <a
                                href="{{ route('home.index') }}"
                                class="transition-colors hover:text-primary"
                            >
                                Home
                            </a>
                        </li>

                        <li>
                            <a href="{{route('categories.index')}}"
                               class="text-base-content"
                            >
                                Categories
                            </a>
                        </li>

                    </ul>

                </div>

                <div class="mb-3 flex items-center gap-2 text-primary">

                    <div class="flex size-8 items-center justify-center rounded-lg bg-primary/10">

                        <i
                            data-lucide="layers-3"
                            class="size-4"
                        ></i>

                    </div>

                    <span class="text-xs font-bold uppercase tracking-[0.2em]">
                        Shop by category
                    </span>

                </div>


                <div class="flex flex-col gap-3 lg:flex-row lg:items-end lg:justify-between">

                    <div>

                        <h1 class="text-3xl font-black tracking-tight sm:text-4xl lg:text-5xl">
                            Find the right parts
                        </h1>

                        <p class="mt-2 max-w-2xl text-sm leading-relaxed text-base-content/60 sm:text-base">
                            Explore our automotive categories and find the parts you need for your vehicle.
                        </p>

                    </div>


                    {{-- Category count --}}
                    <div
                        class="hidden items-center gap-2 rounded-full border border-base-content/10 bg-base-100 px-4 py-2 text-sm shadow-sm sm:flex">

                        <i
                            data-lucide="grid-3x3"
                            class="size-4 text-primary"
                        ></i>

                        <span class="font-semibold">
                            {{ $categories->count() }}
                        </span>

                        <span class="text-base-content/50">
                            categories
                        </span>

                    </div>

                </div>

            </div>


            {{-- ================================================= --}}
            {{-- CATEGORY GRID                                     --}}
            {{-- ================================================= --}}

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">

                @foreach($categories as $category)

                    <a
                        href="{{ route('products.index', ['category' => $category->slug]) }}"
                        class="group relative flex min-h-[190px] flex-col justify-between overflow-hidden rounded-3xl border border-base-content/10 bg-base-100 p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-primary/30 hover:shadow-xl"
                    >

                        {{-- Subtle background decoration --}}
                        <div
                            class="pointer-events-none absolute -right-10 -top-10 size-32 rounded-full bg-primary/5 transition-transform duration-500 group-hover:scale-150"
                        ></div>


                        {{-- ================================================= --}}
                        {{-- TOP                                                --}}
                        {{-- ================================================= --}}

                        <div class="relative flex items-start justify-between">

                            {{-- Category icon --}}
                            <div
                                class="flex size-12 items-center justify-center rounded-2xl bg-primary/10 text-primary transition-all duration-300 group-hover:bg-primary group-hover:text-primary-content"
                            >

                                <i
                                    data-lucide="cog"
                                    class="size-6 transition-transform duration-500 group-hover:rotate-45"
                                ></i>

                            </div>


                            {{-- Arrow --}}
                            <div
                                class="flex size-9 items-center justify-center rounded-full border border-base-content/10 text-base-content/50 transition-all duration-300 group-hover:border-primary group-hover:bg-primary group-hover:text-primary-content"
                            >

                                <i
                                    data-lucide="arrow-up-right"
                                    class="size-4 transition-transform duration-300 group-hover:translate-x-0.5 group-hover:-translate-y-0.5"
                                ></i>

                            </div>

                        </div>


                        {{-- ================================================= --}}
                        {{-- CONTENT                                            --}}
                        {{-- ================================================= --}}

                        <div class="relative mt-8">

                            <h2
                                class="text-xl font-black tracking-tight transition-colors duration-300 group-hover:text-primary"
                            >
                                {{ $category->name }}
                            </h2>


                            @if($category->children->isNotEmpty())

                                <div class="mt-3 flex flex-wrap gap-1.5">

                                    @foreach($category->children->take(4) as $child)

                                        <span
                                            class="rounded-full border border-base-content/10 bg-base-200 px-2.5 py-1 text-[11px] font-medium text-base-content/60 transition-colors duration-300 group-hover:border-primary/20"
                                        >
                                            {{ $child->name }}
                                        </span>

                                    @endforeach


                                    @if($category->children->count() > 4)

                                        <span
                                            class="rounded-full bg-primary/10 px-2.5 py-1 text-[11px] font-bold text-primary"
                                        >
                                            +{{ $category->children->count() - 4 }}
                                        </span>

                                    @endif

                                </div>

                            @else

                                <p class="mt-2 text-sm text-base-content/40">
                                    Browse available products
                                </p>

                            @endif

                        </div>

                    </a>

                @endforeach

            </div>

        </div>

    </section>

</x-layouts.app>
