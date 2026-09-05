@php use Illuminate\Support\Facades\Storage; @endphp
<x-layouts.app>
    <div class="min-h-screen bg-base-300 py-10">

        <div class="mx-auto max-w-7xl px-4">

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
                           class="transition-colors hover:text-primary"
                        >
                            Categories
                        </a>
                    </li>

                    <li class="transition-colors hover:text-primary">
                        <a href="{{route('products.index')}}">Products</a>
                    </li>

                    <li class="text-base-content">
                        {{$product->name}}
                    </li>

                </ul>

            </div>

            @session('success')
            <div role="alert" class="alert alert-success mb-4">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6 shrink-0"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M5 13l4 4L19 7"
                    />
                </svg>

                <span>{{ session('success') }}</span>
            </div>

            @endsession

            {{-- Product --}}
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
                class="grid gap-10 lg:grid-cols-2">


                {{-- Gallery --}}
                <div>


                    <div
                        data-hs-carousel='{
                        "loadingClasses": "opacity-0"
                    }'
                        class="relative">


                        <div class="hs-carousel flex flex-col sm:flex-row gap-4">


                            {{-- Main image --}}
                            <div
                                class="sm:order-2 relative grow overflow-hidden min-h-[500px] rounded-3xl bg-base-100 shadow-xl">


                                <div
                                    class="hs-carousel-body absolute inset-0 flex flex-nowrap transition-transform duration-700 opacity-0">


                                    @foreach($product->images as $image)

                                        <div class="hs-carousel-slide">

                                            <div
                                                class="flex h-full items-center justify-center p-8">

                                                <img
                                                    src="{{Storage::url($image->image_path)}}"
                                                    class="max-h-full object-contain"
                                                    alt="{{ $product->name }}">

                                            </div>

                                        </div>

                                    @endforeach


                                </div>


                                {{-- Arrows --}}
                                <button
                                    type="button"
                                    class="hs-carousel-prev hs-carousel-disabled:opacity-50 absolute top-1/2 left-4 flex size-12 -translate-y-1/2 items-center justify-center rounded-full bg-base-100 shadow-xl">

                                    ❮

                                </button>


                                <button
                                    type="button"
                                    class="hs-carousel-next hs-carousel-disabled:opacity-50 absolute top-1/2 right-4 flex size-12 -translate-y-1/2 items-center justify-center rounded-full bg-base-100 shadow-xl">

                                    ❯

                                </button>


                            </div>


                            {{-- Thumbnails --}}
                            <div class="sm:order-1">


                                <div
                                    class="
                                hs-carousel-pagination
                                flex
                                flex-row
                                sm:flex-col
                                gap-3
                                overflow-x-auto
                                sm:max-h-[500px]
                                ">


                                    @foreach($product->images as $image)

                                        <div
                                            class="
                                        hs-carousel-pagination-item
                                        shrink-0
                                        size-20
                                        rounded-xl
                                        overflow-hidden
                                        border-3
                                        border-base-300
                                        cursor-pointer
                                        hs-carousel-active:border-primary
                                        ">


                                            <img
                                                src="{{Storage::url($image->image_path)}}"
                                                class="h-full w-full object-cover" alt="{{ $product->name }}">


                                        </div>

                                    @endforeach


                                </div>


                            </div>


                        </div>


                    </div>


                </div>


                {{-- Product Information --}}
                <div>


                    <div
                        class="card border border-base-300 bg-base-100 shadow-xl">


                        <div class="card-body">


                            <div class="badge badge-primary">
                                Bosch
                            </div>


                            <h1 class="mt-4 text-4xl font-bold">

                                {{$product->name}}

                            </h1>

                            <div class="divider"></div>


                            {{-- Price --}}
                            <div class="flex items-center gap-2">

                                @if($product->sale_price)
                                    <span class="text-4xl font-bold text-primary">
                                                {{ config('shop.currency_symbol') }}{{ number_format($product->sale_price, 2) }}
                                            </span>

                                    <span class="text-lg text-base-content/40 line-through">
                                                {{ config('shop.currency_symbol') }}{{ number_format($product->price, 2) }}
                                            </span>
                                @else

                                    <span class="text-4xl font-bold text-primary">

                                 {{config('shop.currency_symbol')}}{{number_format($product->price, 2)}}

                            </span>
                                @endif


                            </div>


                            {{-- Stock --}}
                            <div class="mt-4">

                                @if($product->stock > 0)
                                    <span class="badge badge-success">In Stock</span>
                                @else
                                    <span class="badge badge-error">Out Of Stock</span>
                                @endif

                            </div>


                            {{-- Buttons --}}
                            <div class="mt-6 flex flex-col gap-3">

                                @if($product->isAlreadyInCart())
                                    {{-- A clean, minimalist layout state that won't clash with your session popups --}}
                                    <div class="mt-6 flex flex-col gap-3">
                                        <div class="text-sm font-medium text-success flex items-center gap-1.5 px-1">
                                            <span class="badge badge-success badge-sm text-white">✓</span>
                                            This item is in your cart
                                        </div>

                                        <a href="{{ route('cart.index') }}" class="btn btn-primary btn-lg w-full">
                                            View Your Cart
                                        </a>
                                    </div>
                                @else
                                    {{-- Display the standard selection inputs and submission form if the product is not in the cart --}}
                                    <form action="{{ route('cart.store') }}" method="post" class="mt-6">
                                        @csrf

                                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                                        {{-- Quantity Selection Group --}}
                                        <div class="mb-4">
                                            <label class="label">
                                                <span class="label-text font-semibold">Quantity</span>
                                            </label>

                                            <input
                                                type="number"
                                                name="quantity"
                                                value="1"
                                                min="1"
                                                max="{{ $product->stock }}"
                                                class="input input-bordered w-32 bg-base-200 text-base-content"
                                            >
                                        </div>

                                        <button
                                            type="submit"
                                            class="btn btn-primary btn-lg w-full {{ $product->stock === 0 ? 'btn-disabled cursor-not-allowed' : '' }}"
                                            {{ $product->stock === 0 ? 'disabled' : '' }}
                                        >
                                            Add To Cart
                                        </button>
                                    </form>
                                @endif


                                <button
                                    type="button"
                                    @click="toggleLike()"
                                    :disabled="loading"
                                    class="btn btn-outline btn-lg w-full gap-2"
                                >
    <span
        x-show="loading"
        class="loading loading-spinner loading-sm"
    ></span>

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="size-4 transition-colors duration-200"
                                        :class="isLiked
            ? 'fill-red-500 text-red-500'
            : 'fill-none text-base-content/50'"
                                    >
                                        <path
                                            d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78L12 21.23l8.84-8.84a5.5 5.5 0 0 0 0-7.78z"
                                        />
                                    </svg>

                                    <span
                                        x-text="isLiked ? 'Remove From Wishlist' : 'Add To Wishlist'"
                                    ></span>
                                </button>


                            </div>


                        </div>


                    </div>


                </div>


            </div>


        </div>


    </div>


</x-layouts.app>
