<x-layouts.app>
    <div class="min-h-screen bg-base-300 py-8 sm:py-10">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            {{-- Breadcrumbs --}}
            <div class="breadcrumbs mb-6 text-sm text-base-content/60">
                <ul>
                    <li>
                        <a href="{{ route('home.index') }}" class="transition-colors hover:text-primary">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('categories.index') }}" class="transition-colors hover:text-primary">
                            Categories
                        </a>
                    </li>
                    <li class="text-base-content">Products</li>
                </ul>
            </div>

            {{-- Page Header --}}
            <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <div class="mb-2 flex items-center gap-2">
                        <span class="h-1.5 w-8 rounded-full bg-primary"></span>
                        <span class="text-xs font-bold uppercase tracking-[0.2em] text-primary">
                            Store
                        </span>
                    </div>

                    <h1 class="text-3xl font-black tracking-tight sm:text-4xl">
                        All Products
                    </h1>

                    <p class="mt-2 max-w-xl text-sm text-base-content/60 sm:text-base">
                        Find the right parts for your vehicle.
                    </p>
                </div>

                {{-- Total Products --}}
                <div class="badge badge-lg border-base-content/10 bg-base-100 px-4 py-4 shadow-sm">
                    <span class="font-semibold">{{ $products->total() }}</span>
                    <span class="ml-1 text-base-content/60">
                        {{ Str::plural('product', $products->total()) }}
                    </span>
                </div>
            </div>

            {{-- Store Content --}}
            <div class="grid grid-cols-1 gap-8 lg:grid-cols-[260px_minmax(0,1fr)]">

                {{-- Filter Sidebar --}}
                <aside class="lg:top-24 lg:self-start">
                    <div class="card border border-base-content/10 bg-base-100 shadow-xl">
                        <div class="card-body p-5">

                            {{-- Filter Header --}}
                            <div class="mb-5 flex items-center gap-3">
                                <div
                                    class="flex size-10 shrink-0 items-center justify-center rounded-xl bg-primary/10 text-primary">
                                    <i data-lucide="sliders-horizontal" class="size-5"></i>
                                </div>

                                <div>
                                    <h2 class="font-bold">Filter Products</h2>
                                    <p class="text-xs text-base-content/50">Narrow down your search</p>
                                </div>
                            </div>

                            {{-- Filter Form --}}
                            <form action="{{ route('products.index') }}" method="GET" class="space-y-5">

                                {{-- Search --}}
                                <div class="form-control">
                                    <label class="label px-0">
                                        <span class="label-text text-xs font-semibold uppercase tracking-wider">
                                            Search
                                        </span>
                                    </label>

                                    <label
                                        class="input input-bordered flex items-center gap-3 bg-base-200/50 focus-within:border-primary">
                                        <i data-lucide="search" class="size-4 shrink-0 text-base-content/40"></i>
                                        <input
                                            type="text"
                                            name="search"
                                            placeholder="Search products..."
                                            value="{{ request('search') }}"
                                            class="min-w-0 grow"
                                        >
                                    </label>
                                </div>

                                {{-- Category --}}
                                <div class="form-control">
                                    <label class="label px-0">
                                        <span class="label-text text-xs font-semibold uppercase tracking-wider">
                                            Category
                                        </span>
                                    </label>

                                    <select
                                        name="category"
                                        class="select select-bordered w-full bg-base-200 focus:border-primary"
                                    >
                                        <option value="">All Categories</option>

                                        @foreach ($categories as $category)
                                            <option
                                                value="{{ $category->slug }}"
                                                @selected(request('category') == $category->slug)
                                            >
                                                {{ $category->name }}
                                            </option>

                                            @foreach ($category->children as $subcategory)
                                                <option
                                                    value="{{ $subcategory->slug }}"
                                                    @selected(request('category') == $subcategory->slug)
                                                >
                                                    — {{ $subcategory->name }}
                                                </option>
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>

                                {{-- Sort --}}
                                <div class="form-control">
                                    <label class="label px-0">
                                        <span class="label-text text-xs font-semibold uppercase tracking-wider">
                                            Sort By
                                        </span>
                                    </label>

                                    <select
                                        name="sort"
                                        class="select select-bordered w-full bg-base-200 focus:border-primary"
                                    >
                                        <option
                                            value="latest" {{ request('sort', 'latest') === 'latest' ? 'selected' : '' }}>
                                            Latest Arrivals
                                        </option>
                                        <option
                                            value="popularity" {{ request('sort') === 'popularity' ? 'selected' : '' }}>
                                            Most Popular
                                        </option>
                                        <option
                                            value="price_asc" {{ request('sort') === 'price_asc' ? 'selected' : '' }}>
                                            Price: Low to High
                                        </option>
                                        <option
                                            value="price_desc" {{ request('sort') === 'price_desc' ? 'selected' : '' }}>
                                            Price: High to Low
                                        </option>
                                        <option value="name_asc" {{ request('sort') === 'name_asc' ? 'selected' : '' }}>
                                            Name: A-Z
                                        </option>
                                        <option
                                            value="name_desc" {{ request('sort') === 'name_desc' ? 'selected' : '' }}>
                                            Name: Z-A
                                        </option>
                                    </select>
                                </div>

                                {{-- Boolean Filters --}}
                                <label class="label">
                                    <input
                                        type="checkbox"
                                        name="is_new_arrival"
                                        {{ request('is_new_arrival') ? 'checked' : '' }}
                                        onchange="this.form.submit()"
                                        class="checkbox checkbox-primary"
                                    >
                                    New Arrivals Only
                                </label>

                                <label class="label">
                                    <input
                                        type="checkbox"
                                        name="on_sale"
                                        {{ request('on_sale') ? 'checked' : '' }}
                                        onchange="this.form.submit()"
                                        class="checkbox checkbox-primary"
                                    >
                                    On Sale Products Only
                                </label>

                                <label class="label">
                                    <input
                                        type="checkbox"
                                        name="in_stock"
                                        {{ request('in_stock') ? 'checked' : '' }}
                                        onchange="this.form.submit()"
                                        class="checkbox checkbox-primary"
                                    >
                                    In Stock Only
                                </label>

                                {{-- Price Range --}}
                                <div
                                    x-data="{
                                        minPrice: '{{ request('min_price') }}',
                                        maxPrice: '{{ request('max_price') }}',
                                        get invalidRange() {
                                            return this.minPrice !== ''
                                                && this.maxPrice !== ''
                                                && Number(this.minPrice) > Number(this.maxPrice);
                                        }
                                    }"
                                    class="rounded-2xl border border-base-content/10 bg-base-200/40 p-4"
                                >
                                    <div class="mb-4 flex items-center gap-2">
                                        <div
                                            class="flex size-8 shrink-0 items-center justify-center rounded-lg bg-primary/10 text-primary">
                                            <i data-lucide="badge-dollar-sign" class="size-4"></i>
                                        </div>

                                        <div>
                                            <h3 class="text-sm font-bold">Price Range</h3>
                                            <p class="text-xs text-base-content/50">Set your preferred range</p>
                                        </div>
                                    </div>

                                    <div class="space-y-4">

                                        {{-- Minimum --}}
                                        <div class="form-control">
                                            <label class="label px-0">
                                                <span class="label-text text-xs font-semibold uppercase tracking-wider">
                                                    Minimum
                                                </span>
                                            </label>

                                            <label
                                                class="input input-bordered flex items-center gap-2 bg-base-100 transition-colors focus-within:border-primary"
                                                :class="invalidRange ? 'border-error focus-within:border-error' : ''"
                                            >
                                                <span class="font-semibold text-base-content/40">
                                                    {{ config('shop.currency_symbol') }}
                                                </span>

                                                <input
                                                    type="number"
                                                    name="min_price"
                                                    x-model="minPrice"
                                                    min="0"
                                                    max="50000"
                                                    step="1"
                                                    placeholder="0"
                                                    class="min-w-0 grow"
                                                >
                                            </label>
                                        </div>

                                        {{-- Maximum --}}
                                        <div class="form-control">
                                            <label class="label px-0">
                                                <span class="label-text text-xs font-semibold uppercase tracking-wider">
                                                    Maximum
                                                </span>
                                            </label>

                                            <label
                                                class="input input-bordered flex items-center gap-2 bg-base-100 transition-colors focus-within:border-primary"
                                                :class="invalidRange ? 'border-error focus-within:border-error' : ''"
                                            >
                                                <span class="font-semibold text-base-content/40">
                                                    {{ config('shop.currency_symbol') }}
                                                </span>

                                                <input
                                                    type="number"
                                                    name="max_price"
                                                    x-model="maxPrice"
                                                    min="0"
                                                    max="50000"
                                                    step="1"
                                                    placeholder="50,000"
                                                    class="min-w-0 grow"
                                                >
                                            </label>
                                        </div>
                                    </div>

                                    <div class="mt-3 space-y-1 text-xs">
                                        <div class="flex justify-between text-base-content/40">
                                            <span>
                                                Minimum: {{ config('shop.currency_symbol') }}0
                                            </span>
                                            <span>
                                                Maximum: {{ config('shop.currency_symbol') }}50,000
                                            </span>
                                        </div>

                                        <span
                                            x-show="invalidRange"
                                            x-cloak
                                            class="block font-medium text-error"
                                        >
                                            Minimum price cannot exceed maximum price.
                                        </span>
                                    </div>
                                </div>

                                {{-- Actions --}}
                                <div class="flex gap-2 pt-1">
                                    <button
                                        type="submit"
                                        class="btn btn-primary flex-1 shadow-lg shadow-primary/20"
                                    >
                                        <i data-lucide="search" class="size-4"></i>
                                        Filter
                                    </button>

                                    @if(
                                        request('search') ||
                                        request('category') ||
                                        request('min_price') ||
                                        request('max_price') ||
                                        request('is_new_arrival') ||
                                        request('on_sale') ||
                                        request('in_stock') ||
                                        (request('sort') && request('sort') !== 'latest')
                                    )
                                        <a
                                            href="{{ route('products.index') }}"
                                            class="btn btn-ghost border border-base-content/10"
                                            title="Clear filters"
                                        >
                                            <i data-lucide="x" class="size-4"></i>
                                        </a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </aside>

                {{-- Products --}}
                <section class="min-w-0">

                    {{-- Active Filters --}}
                    @if(
                        request('search') ||
                        request('category') ||
                        request('min_price') ||
                        request('max_price') ||
                        request('is_new_arrival') ||
                        request('on_sale') ||
                        request('in_stock') ||
                        (request('sort') && request('sort') !== 'latest')
                    )
                        <div class="mb-6 flex flex-wrap items-center gap-2">
                            <span class="mr-1 text-xs font-bold uppercase tracking-wider text-base-content/50">
                                Active filters:
                            </span>

                            @if(request('search'))
                                <div class="badge badge-outline gap-1 py-3">
                                    <i data-lucide="search" class="size-3"></i>
                                    {{ request('search') }}
                                </div>
                            @endif

                            @if(request('category'))
                                @php
                                    $selectedCategory = $categories->firstWhere('slug', request('category'));

                                    if (!$selectedCategory) {
                                        $selectedCategory = $categories
                                            ->flatMap(fn ($category) => $category->children)
                                            ->firstWhere('slug', request('category'));
                                    }
                                @endphp

                                @if($selectedCategory)
                                    <div class="badge badge-outline gap-1 py-3">
                                        <i data-lucide="tag" class="size-3"></i>
                                        {{ $selectedCategory->name }}
                                    </div>
                                @endif
                            @endif

                            @if(request('min_price') || request('max_price'))
                                <div class="badge badge-outline gap-1 py-3">
                                    <i data-lucide="badge-dollar-sign" class="size-3"></i>

                                    @if(request('min_price'))
                                        {{ config('shop.currency_symbol') }}{{ number_format(request('min_price')) }}
                                    @else
                                        {{ config('shop.currency_symbol') }}0
                                    @endif

                                    <span class="text-base-content/30">–</span>

                                    @if(request('max_price'))
                                        {{ config('shop.currency_symbol') }}{{ number_format(request('max_price')) }}
                                    @else
                                        {{ config('shop.currency_symbol') }}50,000+
                                    @endif
                                </div>
                            @endif

                            @if(request('is_new_arrival'))
                                <div class="badge badge-outline gap-1 py-3">
                                    <i data-lucide="sparkles" class="size-3"></i>
                                    New Arrivals
                                </div>
                            @endif

                            @if(request('on_sale'))
                                <div class="badge badge-outline gap-1 py-3">
                                    <i data-lucide="badge-percent" class="size-3"></i>
                                    On Sale
                                </div>
                            @endif

                            @if(request('in_stock'))
                                <div class="badge badge-outline gap-1 py-3">
                                    <i data-lucide="package-check" class="size-3"></i>
                                    In Stock
                                </div>
                            @endif

                            @if(request('sort') && request('sort') !== 'latest')
                                <div class="badge badge-outline gap-1 py-3">
                                    <i data-lucide="arrow-up-down" class="size-3"></i>

                                    @switch(request('sort'))
                                        @case('price_asc')
                                            Price: Low to High
                                            @break
                                        @case('price_desc')
                                            Price: High to Low
                                            @break
                                        @case('name_asc')
                                            Name: A-Z
                                            @break
                                        @case('name_desc')
                                            Name: Z-A
                                            @break
                                        @case('popularity')
                                            Most Popular
                                            @break
                                    @endswitch
                                </div>
                            @endif
                        </div>
                    @endif

                    {{-- Product Grid --}}
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-3">
                        @forelse($products as $product)
                            <x-products.product-card :product="$product"/>
                        @empty
                            <div class="col-span-full">
                                <div class="card border border-base-content/10 bg-base-100 shadow-xl">
                                    <div class="card-body items-center py-20 text-center">
                                        <div
                                            class="mb-5 flex size-20 items-center justify-center rounded-full bg-base-200 text-base-content/30">
                                            <i data-lucide="package-search" class="size-10"></i>
                                        </div>

                                        <h3 class="text-xl font-bold">
                                            No products found
                                        </h3>

                                        <p class="mt-1 max-w-md text-sm text-base-content/50">
                                            We couldn't find any products matching your current filters.
                                            Try changing your search or price range.
                                        </p>

                                        <a
                                            href="{{ route('products.index') }}"
                                            class="btn btn-primary mt-5"
                                        >
                                            Clear Filters
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    {{-- Pagination --}}
                    @if($products->hasPages())
                        <div class="mt-10 flex justify-center">
                            <div class="rounded-2xl border border-base-content/10 bg-base-100 p-2 shadow-lg">
                                {{ $products->links() }}
                            </div>
                        </div>
                    @endif

                </section>
            </div>
        </div>
    </div>
</x-layouts.app>
