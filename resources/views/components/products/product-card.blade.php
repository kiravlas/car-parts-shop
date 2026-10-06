@php
    use Illuminate\Support\Facades\Storage;
@endphp

@props(['product'])

<div
    x-data="{
        productId: {{ $product->id }},

        get isLiked() {
            return $store.wishlist.isLiked(this.productId);
        },

        likesCount: {{ $product->likedByUsers()->count() }},
        loading: false,

        toggleLike() {
            if (this.loading) {
                return;
            }

            this.loading = true;

            axios.post('{{ route('products.toggle-like', $product) }}')
                .then(response => {
                    if (!response.data.success) {
                        return;
                    }

                    $store.wishlist.update(
                        response.data.productId,
                        response.data.is_liked,
                        response.data.total_wishlist_count
                    );

                    this.likesCount = response.data.likes_count;
                })
                .catch(error => {
                    if (error.response?.status === 401) {
                        window.location.href = '{{ route('login') }}';
                        return;
                    }

                    console.error('Wishlist error:', error);
                })
                .finally(() => {
                    this.loading = false;
                });
        }
    }"
    class="group card relative h-full overflow-hidden border border-base-content/10 bg-base-100 shadow-md transition-all duration-300 hover:-translate-y-1 hover:shadow-xl"
>
    {{-- Whole Card Link --}}
    <a
        href="{{ route('products.show', $product->slug) }}"
        class="absolute inset-0 z-0"
        aria-label="View {{ $product->name }}"
    ></a>

    {{-- Product Image --}}
    <figure class="pointer-events-none relative z-10 h-64 overflow-hidden bg-base-200">
        @if($product->primaryImage)
            <img
                src="{{ Storage::url($product->primaryImage->image_path) }}"
                alt="{{ $product->name }}"
                class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
            >
        @else
            <div class="flex h-full w-full items-center justify-center">
                <div class="text-center text-base-content/30">
                    <i
                        data-lucide="image-off"
                        class="mx-auto mb-2 size-10"
                    ></i>

                    <span class="text-sm">
                        No image
                    </span>
                </div>
            </div>
        @endif

        {{-- Image Overlay --}}
        <div
            class="pointer-events-none absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent"
        ></div>

        {{-- New Arrival --}}
        @if($product->is_new_arrival)
            <span
                class="badge badge-primary absolute left-4 top-4 border-0 font-bold shadow-lg"
            >
                New Arrival
            </span>
        @endif

        {{-- Wishlist --}}
        <button
            type="button"
            @click.stop="toggleLike()"
            :disabled="loading"
            class="btn btn-circle btn-sm pointer-events-auto absolute right-3 top-3 z-20 border border-base-content/10 bg-base-100/95 shadow-sm backdrop-blur transition-all duration-200 hover:scale-105 hover:bg-base-100"
            :aria-label="isLiked ? 'Remove from wishlist' : 'Add to wishlist'"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="size-4 transition-all duration-200"
                :class="isLiked
                    ? 'fill-red-500 text-red-500'
                    : 'fill-none text-base-content/60'"
            >
                <path
                    d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78L12 21.23l8.84-8.84a5.5 5.5 0 0 0 0-7.78z"
                />
            </svg>
        </button>
    </figure>

    {{-- Product Content --}}
    <div class="card-body pointer-events-none relative z-10 gap-3 p-5">

        {{-- Category / Stock Status --}}
        <div class="flex items-center justify-between gap-2">
            <span
                class="min-w-0 truncate text-xs font-semibold uppercase tracking-[0.15em] text-base-content/40"
            >
                {{ $product->category?->name ?? 'Uncategorized' }}
            </span>

            @if($product->stock > 0)
                <span class="flex shrink-0 items-center gap-1 text-xs text-success">
                    <span class="size-1.5 rounded-full bg-success"></span>

                    In stock
                </span>
            @else
                <span class="flex shrink-0 items-center gap-1 text-xs text-error">
                    <span class="size-1.5 rounded-full bg-error"></span>

                    Out of stock
                </span>
            @endif
        </div>

        {{-- Product Name --}}
        <h2
            class="line-clamp-2 text-lg font-bold leading-tight transition-colors duration-200 group-hover:text-primary"
        >
            {{ $product->name }}
        </h2>

        {{-- Description --}}
        @if($product->description)
            <p class="line-clamp-2 text-sm leading-relaxed text-base-content/50">
                {{ $product->description }}
            </p>
        @endif

        {{-- Price --}}
        <div class="flex items-center gap-2">
            @if($product->sale_price)
                <span class="text-xl font-black text-primary">
                    {{ config('shop.currency_symbol') }}{{ number_format($product->sale_price, 2) }}
                </span>

                <span class="text-xs text-base-content/40 line-through">
                    {{ config('shop.currency_symbol') }}{{ number_format($product->price, 2) }}
                </span>
            @else
                <span class="text-xl font-black text-primary">
                    {{ config('shop.currency_symbol') }}{{ number_format($product->price, 2) }}
                </span>
            @endif
        </div>

        {{-- Stock / Likes --}}
        <div class="mt-1 flex items-center justify-between gap-3">

            {{-- Stock --}}
            <div class="flex items-center gap-1.5 text-xs text-base-content/50">
                <i
                    data-lucide="package-check"
                    class="size-3.5 text-success"
                ></i>

                <span>
                    {{ $product->stock }} pcs left
                </span>
            </div>

            {{-- Wishlist Count --}}
            <div class="flex items-center gap-1 text-xs text-base-content/50">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="size-3.5 transition-all duration-200"
                    :class="isLiked
                        ? 'fill-red-500 text-red-500'
                        : 'fill-none text-base-content/50'"
                >
                    <path
                        d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78L12 21.23l8.84-8.84a5.5 5.5 0 0 0 0-7.78z"
                    />
                </svg>

                <span
                    x-text="likesCount"
                    class="font-bold"
                ></span>
            </div>
        </div>

        {{-- View Product --}}
        <span class="btn btn-primary btn-sm mt-2 w-full gap-2">
            <i
                data-lucide="shopping-basket"
                class="size-4"
            ></i>

            View Product
        </span>
    </div>
</div>
