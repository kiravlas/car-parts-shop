@php use Illuminate\Support\Facades\Storage; @endphp

<x-layouts.app>
    <div class="min-h-screen bg-base-300 py-6 sm:py-10">
        <div class="mx-auto max-w-7xl px-3 sm:px-4">

            {{-- Breadcrumbs --}}
            <div class="breadcrumbs mb-4 overflow-x-auto text-xs text-base-content/60 sm:mb-6 sm:text-sm">
                <ul class="flex-nowrap whitespace-nowrap">
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
                    <li>
                        <a href="{{ route('products.index') }}" class="transition-colors hover:text-primary">
                            Products
                        </a>
                    </li>
                    <li class="max-w-[160px] truncate text-base-content sm:max-w-none">
                        {{ $product->name }}
                    </li>
                </ul>
            </div>

            @session('success')
            <div role="alert" class="alert alert-success mb-4 text-sm sm:text-base">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 sm:h-6 sm:w-6"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M5 13l4 4L19 7"/>
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
                        if (this.loading) return;

                        this.loading = true;

                        axios.post('{{ route('products.toggle-like', $product) }}')
                            .then(response => {
                                if (!response.data.success) return;

                                this.isLiked = response.data.is_liked;
                                this.likesCount = response.data.likes_count;

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

                                console.error('Wishlist error:', error);
                            })
                            .finally(() => {
                                this.loading = false;
                            });
                    }
                }"
                class="grid gap-6 lg:grid-cols-2 lg:gap-10"
            >

                {{-- Gallery --}}
                <div>
                    <div
                        data-hs-carousel='{
                            "loadingClasses": "opacity-0"
                        }'
                        class="relative"
                    >
                        <div class="hs-carousel flex flex-col gap-4 sm:flex-row">

                            {{-- Main image --}}
                            <div
                                class="relative min-h-[360px] grow overflow-hidden rounded-2xl bg-base-100 shadow-xl sm:min-h-[500px] sm:order-2 sm:rounded-3xl">
                                <div
                                    class="hs-carousel-body absolute inset-0 flex flex-nowrap opacity-0 transition-transform duration-700">
                                    @foreach($product->images as $image)
                                        <div class="hs-carousel-slide">
                                            <div class="flex h-full items-center justify-center p-4 sm:p-8">
                                                <img
                                                    src="{{ Storage::url($image->image_path) }}"
                                                    class="max-h-full object-contain"
                                                    alt="{{ $product->name }}"
                                                >
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <button
                                    type="button"
                                    class="hs-carousel-prev hs-carousel-disabled:opacity-50 absolute top-1/2 left-2 flex size-10 -translate-y-1/2 items-center justify-center rounded-full bg-base-100 shadow-xl sm:left-4 sm:size-12"
                                >
                                    ❮
                                </button>

                                <button
                                    type="button"
                                    class="hs-carousel-next hs-carousel-disabled:opacity-50 absolute top-1/2 right-2 flex size-10 -translate-y-1/2 items-center justify-center rounded-full bg-base-100 shadow-xl sm:right-4 sm:size-12"
                                >
                                    ❯
                                </button>
                            </div>

                            {{-- Thumbnails --}}
                            <div class="sm:order-1">
                                <div
                                    class="hs-carousel-pagination flex flex-row gap-2 overflow-x-auto pb-1 sm:max-h-[500px] sm:flex-col sm:gap-3 sm:overflow-x-visible sm:pb-0">
                                    @foreach($product->images as $image)
                                        <div
                                            class="hs-carousel-pagination-item hs-carousel-active:border-primary size-16 shrink-0 cursor-pointer overflow-hidden rounded-lg border-2 border-base-300 sm:size-20 sm:rounded-xl sm:border-3">
                                            <img
                                                src="{{ Storage::url($image->image_path) }}"
                                                class="h-full w-full object-cover"
                                                alt="{{ $product->name }}"
                                            >
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                {{-- Product Information --}}
                <div>
                    <div class="card border border-base-300 bg-base-100 shadow-xl">
                        <div class="card-body p-5 sm:p-6">

                            <div class="badge badge-primary">
                                Bosch
                            </div>

                            <h1 class="mt-3 text-2xl font-bold leading-tight sm:mt-4 sm:text-4xl">
                                {{ $product->name }}
                            </h1>

                            <div class="divider my-3 sm:my-4"></div>

                            {{-- Price --}}
                            <div class="flex flex-wrap items-center gap-x-2 gap-y-1">
                                @if($product->sale_price)
                                    <span class="text-3xl font-bold text-primary sm:text-4xl">
                                        {{ config('shop.currency_symbol') }}{{ number_format($product->sale_price, 2) }}
                                    </span>

                                    <span class="text-base text-base-content/40 line-through sm:text-lg">
                                        {{ config('shop.currency_symbol') }}{{ number_format($product->price, 2) }}
                                    </span>
                                @else
                                    <span class="text-3xl font-bold text-primary sm:text-4xl">
                                        {{ config('shop.currency_symbol') }}{{ number_format($product->price, 2) }}
                                    </span>
                                @endif
                            </div>

                            {{-- Stock --}}
                            <div class="mt-3 sm:mt-4">
                                @if($product->stock > 0)
                                    <span class="badge badge-success">In Stock</span>
                                @else
                                    <span class="badge badge-error">Out Of Stock</span>
                                @endif
                            </div>

                            {{-- Buttons --}}
                            <div class="mt-5 flex flex-col gap-3 sm:mt-6">

                                @if($product->isAlreadyInCart())

                                    <div class="flex flex-col gap-3">
                                        <div class="flex items-center gap-1.5 px-1 text-sm font-medium text-success">
                                            <span class="badge badge-success badge-sm text-white">✓</span>
                                            This item is in your cart
                                        </div>

                                        <a href="{{ route('cart.index') }}" class="btn btn-primary btn-lg w-full">
                                            View Your Cart
                                        </a>
                                    </div>

                                @else

                                    <form action="{{ route('cart.store') }}" method="post">
                                        @csrf

                                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                                        <div class="mb-4">
                                            <label class="label px-0">
                                                <span class="label-text font-semibold">Quantity</span>
                                            </label>

                                            <input
                                                type="number"
                                                name="quantity"
                                                value="1"
                                                min="1"
                                                max="{{ $product->stock }}"
                                                class="input input-bordered w-full bg-base-200 text-base-content sm:w-32"
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

                                {{-- Wishlist --}}
                                <button
                                    type="button"
                                    @click="toggleLike()"
                                    :disabled="loading"
                                    class="btn btn-outline btn-lg w-full gap-2"
                                >
                                    <span x-show="loading" class="loading loading-spinner loading-sm"></span>

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
                                            d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78L12 21.23l8.84-8.84a5.5 5.5 0 0 0 0-7.78z"/>
                                    </svg>

                                    <span x-text="isLiked ? 'Remove From Wishlist' : 'Add To Wishlist'"></span>
                                </button>

                            </div>
                        </div>
                    </div>

                    {{-- Product Description --}}
                    <div class="mt-6 sm:mt-10">
                        <div class="card border border-base-300 bg-base-100 shadow-xl">
                            <div class="card-body p-5 sm:p-6">

                                <h2 class="text-xl font-bold text-primary sm:text-2xl">
                                    Product Description
                                </h2>

                                <div class="divider my-2"></div>

                                <div class="text-sm leading-7 text-base-content/80 sm:text-base sm:leading-relaxed">
                                    {{ $product->description }}
                                </div>

                                <div class="mt-6">
                                    <button
                                        type="button"
                                        class="btn btn-primary w-full"
                                        onclick="order_modal.showModal()"
                                    >
                                        Order now!
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- Order Modal --}}
    <dialog
        id="order_modal"
        class="modal"
        x-data="{
            email: '',
            loading: false,
            success: false,
            error: null,

            submitOrder() {
                if (this.loading) return;

                this.loading = true;
                this.error = null;

                axios.post('{{ route('assignment.orders.store') }}', {
                    email: this.email,
                    product_name: @js($product->name)
                })
                .then(response => {
                    if (response.data.status === 'success') {
                        this.success = true;
                        this.email = '';
                    }
                })
                .catch(error => {
                    if (error.response?.status === 422) {
                        this.error = 'Please enter a valid email address.';
                    } else {
                        this.error = 'Something went wrong. Please try again.';
                    }
                })
                .finally(() => {
                    this.loading = false;
                });
            }
        }"
    >
        <div class="modal-box w-11/12 max-w-lg">

            {{-- Success --}}
            <template x-if="success">
                <div class="py-4 text-center">
                    <div
                        class="mx-auto mb-4 flex size-14 items-center justify-center rounded-full bg-success/10 text-success">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="size-8"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>

                    <h3 class="text-xl font-bold text-success sm:text-2xl">
                        Order request sent!
                    </h3>

                    <p class="mt-2 text-sm text-base-content/70 sm:text-base">
                        Our sales team will contact you shortly.
                    </p>

                    <button
                        type="button"
                        onclick="order_modal.close()"
                        class="btn btn-primary mt-6 w-full"
                    >
                        Close
                    </button>
                </div>
            </template>

            {{-- Form --}}
            <template x-if="!success">
                <div>
                    <h3 class="text-xl font-bold text-primary sm:text-2xl">
                        Order {{ $product->name }}
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-base-content/70 sm:text-base">
                        Leave your email and our sales team will contact you to help you place your order.
                    </p>

                    <template x-if="error">
                        <div class="alert alert-error mt-4 text-sm">
                            <span x-text="error"></span>
                        </div>
                    </template>

                    <form
                        @submit.prevent="submitOrder()"
                        class="mt-6"
                    >
                        <label for="order_email" class="label px-0">
                            <span class="label-text font-semibold">
                                Email address
                            </span>
                        </label>

                        <input
                            id="order_email"
                            type="email"
                            x-model="email"
                            placeholder="you@example.com"
                            class="input input-bordered w-full bg-base-200"
                            required
                            :disabled="loading"
                        >

                        <div class="modal-action flex-col-reverse gap-2 sm:flex-row sm:justify-end">
                            <button
                                type="button"
                                onclick="order_modal.close()"
                                class="btn btn-ghost w-full sm:w-auto"
                                :disabled="loading"
                            >
                                Cancel
                            </button>

                            <button
                                type="submit"
                                class="btn btn-primary w-full sm:w-auto"
                                :disabled="loading"
                            >
                                <span
                                    x-show="loading"
                                    class="loading loading-spinner loading-sm"
                                ></span>

                                <span x-text="loading ? 'Sending...' : 'Submit'"></span>
                            </button>
                        </div>
                    </form>
                </div>
            </template>

        </div>

        {{-- Close modal when clicking outside --}}
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>

</x-layouts.app>
