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
    class="group card h-full bg-base-100 border border-base-300 shadow-md transition-all duration-300 hover:-translate-y-1 hover:shadow-xl"
>

    {{-- Product Image --}}
    <figure class="relative h-44 overflow-hidden">

        <img
            src="{{Storage::url($product->primaryImage->image_path)}}"
            alt="{{$product->name}}"
            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
        >

        {{-- Hot Badge --}}
        @if($badge)
            <span class="badge {{$badge['color']}} badge-xs absolute top-3 left-3">
                {{$badge['text']}}
            </span>
        @endif

        {{-- Wishlist Button --}}
        <button
            @click="toggleLike()"
            type="button"
            class="btn btn-circle btn-xs absolute top-3 right-3 border-0 bg-base-100/90 hover:bg-base-100 flex items-center justify-center"
            :disabled="loading"
        >

            {{-- Liked --}}
            <span
                x-show="isLiked"
                class="flex items-center justify-center"
            >

        <i
            data-lucide="heart"
            class="size-4 text-red-500 fill-red-500"
        ></i>

    </span>


            {{-- Not liked --}}
            <span
                x-show="!isLiked"
                class="flex items-center justify-center"
            >

        <i
            data-lucide="heart-plus"
            class="size-4 text-gray-400"
        ></i>

    </span>

        </button>

    </figure>

    {{-- Product Content --}}
    <div class="card-body gap-3">

        {{-- Price --}}
        <div class="flex items-center gap-2">
            @if($product->sale_price)
                <span class="badge badge-primary badge-lg">
                    {{ config('shop.currency_symbol') }}{{ $product->sale_price }}
                </span>
                <span class="text-sm line-through opacity-50">
                    {{ config('shop.currency_symbol') }}{{ $product->price }}
                </span>
            @else
                <span class="badge badge-primary badge-lg">
                    {{ config('shop.currency_symbol') }}{{ $product->price }}
                </span>
            @endif
        </div>

        <p class="text-xs uppercase tracking-widest text-base-content/50">
            Brembo
        </p>

        {{-- Product Name --}}
        <h2 class="card-title text-base leading-tight">
            {{$product->name}}
        </h2>

        {{-- Description --}}
        <p class="line-clamp-2 text-sm text-base-content/70">
            High-performance ceramic brake pads for smooth and quiet braking.
        </p>

        {{-- Rating / Stock --}}
        <div class="flex items-center gap-2 text-xs">
            <i data-lucide="star" class="size-3 fill-yellow-400 text-yellow-400"></i>
            <span>4.9</span>
            <i data-lucide="square-check" class="size-3 text-success"></i>
            <span>{{$product->stock}} pcs left</span>
        </div>

        {{-- Delivery --}}
        <div class="flex items-center gap-2 text-xs">
            <i data-lucide="truck" class="size-3 text-primary"></i>
            <span>Delivery Today</span>
        </div>

        {{-- Dynamic Likes Count Indicator --}}
        <div class="text-xs text-base-content/60 flex items-center gap-1 mt-1">
            <span x-text="likesCount" class="font-bold"></span>
            <span x-text="likesCount === 1 ? 'person added this to wishlist' : 'people added this to wishlist'"></span>
        </div>

        {{-- View Product --}}
        <a
            href="{{ route('product.show', $product->slug) }}"
            class="btn btn-primary btn-sm mt-auto w-full inline-flex items-center justify-center gap-2"
        >
            <i data-lucide="shopping-basket" class="size-4"></i>
            View Product
        </a>

    </div>
</div>
