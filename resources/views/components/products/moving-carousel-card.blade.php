@php use Illuminate\Support\Facades\Storage; @endphp

@props([
    'product',
    'badge' => null,
])

<div
    x-data="{
        productId: {{ $product->id }},
        isLiked: $store.wishlist.isLiked({{ $product->id }}),
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

                    // Update this card
                    this.isLiked = response.data.is_liked;
                    this.likesCount = response.data.likes_count;

                    // Update global wishlist store
                    $store.wishlist.update(
                        response.data.productId,
                        response.data.is_liked,
                        response.data.total_wishlist_count
                    );

                })

                .catch(error => {

                    if (error.response?.status === 401) {

                        window.location.href = '{{ route('login') }}';

                        return;
                    }

                    console.error(
                        'Wishlist error:',
                        error
                    );

                })

                .finally(() => {

                    this.loading = false;

                });

        }
    }"
    class="group card h-full overflow-hidden border border-base-content/10 bg-base-100 shadow-md transition-all duration-300 hover:-translate-y-1 hover:shadow-xl"
>

    {{-- ========================================================= --}}
    {{-- PRODUCT IMAGE                                             --}}
    {{-- ========================================================= --}}

    <figure class="relative h-52 overflow-hidden bg-base-200">

        {{-- Product Image --}}
        <img
            src="{{ Storage::url($product->primaryImage->image_path) }}"
            alt="{{ $product->name }}"
            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
        >


        {{-- Image Overlay --}}
        <div
            class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent"
        ></div>


        {{-- ===================================================== --}}
        {{-- BADGE                                                  --}}
        {{-- ===================================================== --}}

        @if($badge)

            <span
                class="badge {{ $badge['color'] }} absolute left-3 top-3 border-0 text-xs font-bold shadow-sm"
            >
                {{ $badge['text'] }}
            </span>

        @endif


        {{-- ===================================================== --}}
        {{-- WISHLIST BUTTON                                        --}}
        {{-- ===================================================== --}}

        <button
            type="button"
            @click="toggleLike()"
            :disabled="loading"
            class="btn btn-circle btn-sm absolute right-3 top-3 border border-base-content/10 bg-base-100/95 shadow-sm backdrop-blur transition-all duration-200 hover:scale-105 hover:bg-base-100"
            aria-label="Add to wishlist"
        >

            {{-- Liked --}}
            <span
                x-show="isLiked"
                x-cloak
                class="flex items-center justify-center"
            >

                <i
                    data-lucide="heart"
                    class="size-4 fill-red-500 text-red-500"
                ></i>

            </span>


            {{-- Not liked --}}
            <span
                x-show="!isLiked"
                x-cloak
                class="flex items-center justify-center"
            >

                <i
                    data-lucide="heart-plus"
                    class="size-4 text-base-content/60"
                ></i>

            </span>

        </button>

    </figure>


    {{-- ========================================================= --}}
    {{-- PRODUCT CONTENT                                           --}}
    {{-- ========================================================= --}}

    <div class="card-body gap-3 p-5">


        {{-- ===================================================== --}}
        {{-- PRICE                                                  --}}
        {{-- ===================================================== --}}

        <div class="flex items-center gap-2">

            @if($product->sale_price)

                <span class="text-xl font-black text-primary">
                    {{ config('shop.currency_symbol') }}{{ $product->sale_price }}
                </span>

                <span class="text-xs line-through text-base-content/40">
                    {{ config('shop.currency_symbol') }}{{ $product->price }}
                </span>

            @else

                <span class="text-xl font-black text-primary">
                    {{ config('shop.currency_symbol') }}{{ $product->price }}
                </span>

            @endif

        </div>


        {{-- ===================================================== --}}
        {{-- CATEGORY                                               --}}
        {{-- ===================================================== --}}

        <div class="flex items-center gap-2">

            <span
                class="text-xs font-semibold uppercase tracking-[0.15em] text-base-content/40"
            >
                {{ $product->category->name }}
            </span>


            @if($product->stock > 0)

                <span class="flex items-center gap-1 text-xs text-success">

                    <span class="size-1.5 rounded-full bg-success"></span>

                    In stock

                </span>

            @else

                <span class="flex items-center gap-1 text-xs text-error">

                    <span class="size-1.5 rounded-full bg-error"></span>

                    Out of stock

                </span>

            @endif

        </div>


        {{-- ===================================================== --}}
        {{-- PRODUCT NAME                                           --}}
        {{-- ===================================================== --}}

        <h2
            class="card-title text-base leading-tight transition-colors duration-200 group-hover:text-primary"
        >
            {{ $product->name }}
        </h2>


        {{-- ===================================================== --}}
        {{-- STOCK / LIKES                                          --}}
        {{-- ===================================================== --}}

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
            <div
                class="flex items-center gap-1 text-xs text-base-content/50"
            >

                <i
                    data-lucide="heart"
                    class="size-3.5"
                    :class="isLiked ? 'fill-red-500 text-red-500' : ''"
                ></i>

                <span
                    x-text="likesCount"
                    class="font-bold"
                ></span>

            </div>

        </div>


        {{-- ===================================================== --}}
        {{-- VIEW PRODUCT                                           --}}
        {{-- ===================================================== --}}

        <a
            href="{{ route('product.show', $product->slug) }}"
            class="btn btn-primary btn-sm mt-2 w-full gap-2"
        >

            <i
                data-lucide="shopping-basket"
                class="size-4"
            ></i>

            View Product

        </a>

    </div>

</div>
