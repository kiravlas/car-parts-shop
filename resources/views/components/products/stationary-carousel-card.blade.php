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

    <figure class="relative h-56 overflow-hidden bg-base-200">

        <img
            src="{{ Storage::url($product->primaryImage->image_path) }}"
            alt="{{ $product->name }}"
            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
        >

        {{-- Soft Image Overlay --}}
        <div
            class="pointer-events-none absolute inset-0 bg-gradient-to-t from-black/15 via-transparent to-transparent"
        ></div>


        {{-- ===================================================== --}}
        {{-- HOT BADGE                                               --}}
        {{-- ===================================================== --}}

        @if($badge)

            <span
                class="badge {{ $badge['color'] }} badge-sm absolute left-4 top-4 border-0 px-3 font-semibold shadow-sm"
            >
                {{ $badge['text'] }}
            </span>

        @endif


        {{-- ===================================================== --}}
        {{-- WISHLIST BUTTON                                         --}}
        {{-- ===================================================== --}}

        <button
            @click="toggleLike()"
            type="button"
            class="btn btn-circle btn-sm absolute right-4 top-4 border border-base-content/10 bg-base-100/95 shadow-md backdrop-blur transition-all duration-200 hover:scale-105 hover:bg-base-100"
            :disabled="loading"
            aria-label="Add to wishlist"
        >

            {{-- Liked --}}
            <span
                x-show="isLiked"
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
                class="flex items-center justify-center"
            >

                <i
                    data-lucide="heart-plus"
                    class="size-4 text-base-content/50"
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

                <span class="badge badge-primary badge-lg px-3 font-bold">
                    {{ config('shop.currency_symbol') }}{{ $product->sale_price }}
                </span>

                <span class="text-sm text-base-content/40 line-through">
                    {{ config('shop.currency_symbol') }}{{ $product->price }}
                </span>

            @else

                <span class="badge badge-primary badge-lg px-3 font-bold">
                    {{ config('shop.currency_symbol') }}{{ $product->price }}
                </span>

            @endif

        </div>

        {{-- ===================================================== --}}
        {{-- PRODUCT NAME                                            --}}
        {{-- ===================================================== --}}

        <h2
            class="card-title line-clamp-2 min-h-12 text-base font-bold leading-snug transition-colors duration-200 group-hover:text-primary"
        >
            {{ $product->name }}
        </h2>


        {{-- ===================================================== --}}
        {{-- RATING / STOCK                                          --}}
        {{-- ===================================================== --}}

        <div
            class="flex items-center gap-3 border-t border-base-content/10 pt-3 text-xs text-base-content/60"
        >

            <div class="flex items-center gap-1">

                <i
                    data-lucide="star"
                    class="size-3.5 fill-yellow-400 text-yellow-400"
                ></i>

                <span class="font-semibold text-base-content/70">
                    4.9
                </span>

            </div>


            <span class="h-3 w-px bg-base-content/10"></span>


            <div class="flex items-center gap-1">

                <i
                    data-lucide="square-check"
                    class="size-3.5 text-success"
                ></i>

                <span>
                    {{ $product->stock }} pcs left
                </span>

            </div>

        </div>


        {{-- ===================================================== --}}
        {{-- WISHLIST COUNT                                          --}}
        {{-- ===================================================== --}}

        <div
            class="flex items-center gap-1.5 text-xs text-base-content/50"
        >

            <i
                data-lucide="heart"
                class="size-3.5"
                :class="isLiked ? 'fill-red-500 text-red-500' : ''"
            ></i>

            <span
                x-text="likesCount"
                class="font-bold text-base-content/70"
            ></span>

            <span
                x-text="likesCount === 1
                    ? 'person added this to wishlist'
                    : 'people added this to wishlist'"
            ></span>

        </div>


        {{-- ===================================================== --}}
        {{-- VIEW PRODUCT                                            --}}
        {{-- ===================================================== --}}

        <a
            href="{{ route('product.show', $product->slug) }}"
            class="btn btn-primary btn-sm mt-2 w-full gap-2 shadow-sm transition-all duration-200 hover:shadow-md"
        >

            <i
                data-lucide="shopping-basket"
                class="size-4"
            ></i>

            View Product

        </a>

    </div>

</div>
