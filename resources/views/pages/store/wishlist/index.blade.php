@php use Illuminate\Support\Facades\Storage; @endphp

<x-layouts.app>

    <div class="bg-base-200 min-h-screen">

        {{-- ========================================================= --}}
        {{-- PAGE HEADER                                                --}}
        {{-- ========================================================= --}}

        <section class="border-b border-base-content/10 bg-base-100">

            <div class="container mx-auto px-4 py-10 lg:py-14">

                <div class="flex flex-col gap-6 sm:flex-row sm:items-end sm:justify-between">

                    <div>

                        <div class="mb-3 flex items-center gap-2 text-primary">

                            <i
                                data-lucide="heart"
                                class="size-5 fill-current"
                            ></i>

                            <span class="text-sm font-semibold uppercase tracking-widest">
                                Your garage
                            </span>

                        </div>


                        <h1 class="text-3xl font-black tracking-tight sm:text-4xl">
                            Favorite Products
                        </h1>


                        <p class="mt-3 max-w-xl text-base-content/60">
                            Keep track of the parts you like and add them to your cart whenever you're ready.
                        </p>

                    </div>


                    {{-- ================================================= --}}
                    {{-- PRODUCT COUNT                                     --}}
                    {{-- ================================================= --}}

                    <div
                        class="flex items-center gap-3 self-start rounded-2xl border border-base-content/10 bg-base-200 px-5 py-3 sm:self-auto"
                    >

                        <div
                            class="flex size-10 items-center justify-center rounded-xl bg-primary text-primary-content"
                        >

                            <i
                                data-lucide="heart"
                                class="size-5 fill-current"
                            ></i>

                        </div>


                        <div>

                            {{-- Global wishlist total --}}
                            <div
                                class="text-xl font-black"
                                x-text="$store.wishlist.count"
                            ></div>


                            <div class="text-xs text-base-content/50">
                                Saved products
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        {{-- ========================================================= --}}
        {{-- MAIN                                                       --}}
        {{-- ========================================================= --}}

        <main
            class="container mx-auto px-4 py-8 lg:py-12"
            x-data="{
                pageProductCount: {{ $products->count() }}
            }"
        >

            {{-- ===================================================== --}}
            {{-- FAVORITE PRODUCTS                                     --}}
            {{-- ===================================================== --}}

            <div x-show="pageProductCount > 0">

                <div class="grid gap-5">

                    @foreach($products as $product)

                        <article
                            id="wishlist-product-{{ $product->id }}"
                            class="group relative overflow-hidden rounded-2xl border border-base-content/10 bg-base-100 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-xl"
                        >

                            <div class="flex h-full flex-col lg:flex-row">

                                {{-- ================================================= --}}
                                {{-- PRODUCT IMAGE                                     --}}
                                {{-- ================================================= --}}

                                <a
                                    href="{{ route('product.show', $product->slug) }}"
                                    class="relative flex h-64 shrink-0 items-center justify-center overflow-hidden bg-base-200 p-6 sm:h-72 lg:h-80 lg:w-72 lg:p-8"
                                >

                                    @unless($product->stock > 0)

                                        <div class="absolute left-4 top-4 z-10">

                                            <span class="badge badge-error badge-sm font-bold">
                                                SOLD OUT
                                            </span>

                                        </div>

                                    @endunless


                                    <img
                                        src="{{ Storage::url($product->primaryImage->image_path) }}"
                                        alt="{{ $product->name }}"
                                        class="max-h-full max-w-full object-contain transition duration-500 group-hover:scale-105"
                                    >

                                </a>


                                {{-- ================================================= --}}
                                {{-- PRODUCT CONTENT                                   --}}
                                {{-- ================================================= --}}

                                <div class="flex min-w-0 flex-1 flex-col p-5 sm:p-7 lg:min-h-80">

                                    {{-- ================================================= --}}
                                    {{-- TOP CONTENT                                      --}}
                                    {{-- ================================================= --}}

                                    <div class="relative flex-1">


                                        {{-- ================================================= --}}
                                        {{-- DELETE / REMOVE BUTTON                         --}}
                                        {{-- ================================================= --}}

                                        <div
                                            x-data="{
                                                loading: false,

                                                removeProduct() {

                                                    if (this.loading) {
                                                        return;
                                                    }

                                                    this.loading = true;


                                                    axios.post(
                                                        '{{ route('products.toggle-like', $product) }}'
                                                    )

                                                    .then(response => {

                                                        if (!response.data.success) {
                                                            return;
                                                        }


                                                        // -----------------------------------------
                                                        // Get new total wishlist count
                                                        // -----------------------------------------

                                                        const totalWishlistCount =
                                                            response.data.total_wishlist_count;


                                                        // -----------------------------------------
                                                        // Update global wishlist store
                                                        // -----------------------------------------

                                                        $store.wishlist.remove(
                                                            response.data.productId,
                                                            totalWishlistCount
                                                        );


                                                        // -----------------------------------------
                                                        // Remove this product from the page
                                                        // -----------------------------------------

                                                        const productElement =
                                                            document.getElementById(
                                                                'wishlist-product-{{ $product->id }}'
                                                            );


                                                        if (productElement) {

                                                            productElement.remove();

                                                        }


                                                        // -----------------------------------------
                                                        // Decrease current page product count
                                                        // -----------------------------------------

                                                        pageProductCount--;


                                                        // -----------------------------------------
                                                        // Entire wishlist is now empty
                                                        // -----------------------------------------

                                                        if (totalWishlistCount === 0) {

                                                            pageProductCount = 0;

                                                            return;

                                                        }


                                                        // -----------------------------------------
                                                        // Current page became empty but products
                                                        // still exist on another page.
                                                        // Go back to page 1.
                                                        // -----------------------------------------

                                                        if (pageProductCount === 0) {

                                                            window.location.href =
                                                                '{{ route('wishlist.index') }}';

                                                        }

                                                    })

                                                    .catch(error => {

                                                        if (error.response?.status === 401) {

                                                            window.location.href =
                                                                '{{ route('login') }}';

                                                            return;

                                                        }


                                                        console.error(
                                                            'Wishlist remove error:',
                                                            error
                                                        );

                                                    })

                                                    .finally(() => {

                                                        this.loading = false;

                                                    });

                                                }
                                            }"
                                            class="absolute right-0 top-0"
                                        >

                                            <button
                                                type="button"
                                                @click="removeProduct()"
                                                :disabled="loading"
                                                class="btn btn-ghost btn-circle text-base-content/40 hover:bg-error hover:text-error-content"
                                            >

                                                <i
                                                    data-lucide="trash-2"
                                                    class="size-5"
                                                ></i>

                                            </button>

                                        </div>


                                        <div class="pr-12">

                                            {{-- ================================================= --}}
                                            {{-- CATEGORY + STOCK                               --}}
                                            {{-- ================================================= --}}

                                            <div class="mb-2 flex flex-wrap items-center gap-2">

                                                <span class="badge badge-outline badge-sm">
                                                    {{ $product->category->name }}
                                                </span>


                                                @if($product->stock > 0)

                                                    <span class="flex items-center gap-1 text-xs text-success">

                                                        <span class="size-2 rounded-full bg-success"></span>

                                                        In stock
                                                        ({{ $product->stock }} available)

                                                    </span>

                                                @else

                                                    <span class="flex items-center gap-1 text-xs text-error">

                                                        <span class="size-2 rounded-full bg-error"></span>

                                                        Out of stock

                                                    </span>

                                                @endif

                                            </div>


                                            {{-- ================================================= --}}
                                            {{-- PRODUCT NAME                                   --}}
                                            {{-- ================================================= --}}

                                            <a
                                                href="{{ route('product.show', $product->slug) }}"
                                                class="line-clamp-2 text-xl font-bold leading-tight transition hover:text-primary sm:text-2xl"
                                            >
                                                {{ $product->name }}
                                            </a>


                                            {{-- ================================================= --}}
                                            {{-- DESCRIPTION                                    --}}
                                            {{-- ================================================= --}}

                                            <p
                                                class="mt-3 line-clamp-3 max-w-2xl text-sm leading-relaxed text-base-content/60"
                                            >
                                                {{ $product->description }}
                                            </p>

                                        </div>

                                    </div>


                                    {{-- ================================================= --}}
                                    {{-- BOTTOM                                             --}}
                                    {{-- ================================================= --}}

                                    <div
                                        class="mt-7 flex flex-col gap-5 border-t border-base-content/10 pt-5 sm:flex-row sm:items-end sm:justify-between"
                                    >

                                        {{-- ================================================= --}}
                                        {{-- PRICE                                             --}}
                                        {{-- ================================================= --}}

                                        <div class="shrink-0">

                                            <div
                                                class="text-xs font-medium uppercase tracking-wider text-base-content/40"
                                            >
                                                Price
                                            </div>


                                            @if($product->sale_price)

                                                <div class="flex items-center gap-2">

                                                    <div class="mt-1 text-2xl font-black text-primary">
                                                        {{ config('shop.currency_symbol') }}{{ $product->sale_price }}
                                                    </div>

                                                    <div class="text-sm line-through opacity-50">
                                                        {{ config('shop.currency_symbol') }}{{ $product->price }}
                                                    </div>

                                                </div>

                                            @else

                                                <div class="mt-1 text-2xl font-black text-primary">
                                                    {{ config('shop.currency_symbol') }}{{ $product->price }}
                                                </div>

                                            @endif

                                        </div>


                                        {{-- ================================================= --}}
                                        {{-- ACTIONS                                           --}}
                                        {{-- ================================================= --}}

                                        <div class="flex flex-col gap-2 sm:flex-row">

                                            @if($product->stock > 0)

                                                <button
                                                    type="button"
                                                    class="btn btn-primary"
                                                >

                                                    <i
                                                        data-lucide="shopping-cart"
                                                        class="size-4"
                                                    ></i>

                                                    Add to Cart

                                                </button>

                                            @else

                                                <button
                                                    type="button"
                                                    class="btn btn-disabled"
                                                >

                                                    <i
                                                        data-lucide="shopping-cart"
                                                        class="size-4"
                                                    ></i>

                                                    Out of Stock

                                                </button>

                                            @endif


                                            <a
                                                href="{{ route('product.show', $product->slug) }}"
                                                class="btn btn-outline"
                                            >

                                                View Product

                                                <i
                                                    data-lucide="arrow-up-right"
                                                    class="size-4"
                                                ></i>

                                            </a>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </article>

                    @endforeach


                    {{-- ================================================= --}}
                    {{-- PAGINATION                                        --}}
                    {{-- ================================================= --}}

                    <div
                        class="mt-2"
                        x-show="pageProductCount > 0"
                    >
                        {{ $products->links() }}
                    </div>

                </div>

            </div>


            {{-- ===================================================== --}}
            {{-- EMPTY FAVORITES                                       --}}
            {{-- ===================================================== --}}

            <section
                x-show="$store.wishlist.count === 0"
                x-cloak
                class="overflow-hidden rounded-3xl border border-base-content/10 bg-base-100"
            >

                <div
                    class="flex min-h-[460px] flex-col items-center justify-center px-6 py-16 text-center sm:px-12"
                >

                    {{-- ================================================= --}}
                    {{-- ICON                                                --}}
                    {{-- ================================================= --}}

                    <div
                        class="mb-8 flex size-20 items-center justify-center rounded-2xl border border-base-content/10 bg-base-200"
                    >

                        <i
                            data-lucide="heart"
                            class="size-8 text-base-content/40"
                        ></i>

                    </div>


                    {{-- ================================================= --}}
                    {{-- EYEBROW                                             --}}
                    {{-- ================================================= --}}

                    <span
                        class="mb-3 text-xs font-bold uppercase tracking-[0.2em] text-primary"
                    >
                        Your garage
                    </span>


                    {{-- ================================================= --}}
                    {{-- HEADING                                             --}}
                    {{-- ================================================= --}}

                    <h2
                        class="max-w-lg text-3xl font-black tracking-tight sm:text-4xl"
                    >
                        Nothing saved yet
                    </h2>


                    {{-- ================================================= --}}
                    {{-- DESCRIPTION                                         --}}
                    {{-- ================================================= --}}

                    <p
                        class="mt-4 max-w-md text-sm leading-7 text-base-content/60 sm:text-base"
                    >
                        Save the parts you're interested in and come back to them
                        whenever you're ready.
                    </p>


                    {{-- ================================================= --}}
                    {{-- CTA                                                 --}}
                    {{-- ================================================= --}}

                    <div class="mt-8">

                        <a
                            href="{{ route('home.index') }}"
                            class="btn btn-primary btn-lg px-8"
                        >

                            <i
                                data-lucide="shopping-bag"
                                class="size-5"
                            ></i>

                            Start Shopping

                        </a>

                    </div>

                </div>

            </section>

        </main>

    </div>

</x-layouts.app>
