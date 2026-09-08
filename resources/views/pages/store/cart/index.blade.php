@php
    use Illuminate\Support\Facades\Storage;
@endphp

<x-layouts.app>

    <style>
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
            appearance: textfield;
        }
    </style>


    <div
        class="min-h-screen bg-base-200 text-base-content"
        x-data="{
            grandTotal: '{{ number_format($grandTotal, 2) }}',

            cartIsEmpty:
                {{ $cartItems->isEmpty() ? 'true' : 'false' }},

            cartItemCount:
                {{ $cartItems->count() }},

            cartQuantity:
                {{ $cartItems->sum('quantity') }}
        }"
    >

        <main class="mx-auto max-w-6xl px-4 py-8 sm:px-6 lg:px-8 lg:py-12">

            {{-- ========================================================= --}}
            {{-- CART                                                       --}}
            {{-- ========================================================= --}}
            @session('error')
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
            @endsession
            <div
                x-show="!cartIsEmpty"
                x-cloak
                class="grid grid-cols-1 items-start gap-6 lg:grid-cols-3"
            >

                {{-- ===================================================== --}}
                {{-- CART ITEMS                                               --}}
                {{-- ===================================================== --}}

                <div class="space-y-4 lg:col-span-2">

                    <div class="space-y-4">

                        @foreach($cartItems as $item)

                            @php
                                $unitPrice =
                                    $item->product->sale_price
                                    ?? $item->product->price;
                            @endphp


                            <article
                                x-data="{
                                    quantity: {{ $item->quantity }},

                                    subtotal:
                                        '{{ number_format(
                                            $unitPrice * $item->quantity,
                                            2
                                        ) }}',

                                    isRemoved: false,

                                    loading: false,

                                    updating: false,


                                    // -------------------------------------------------
                                    // UPDATE QUANTITY
                                    // -------------------------------------------------

                                    updateQuantity() {

                                        if (
                                            this.updating ||
                                            this.isRemoved
                                        ) {
                                            return;
                                        }


                                        let newQuantity =
                                            parseInt(this.quantity);


                                        if (
                                            isNaN(newQuantity) ||
                                            newQuantity < 1
                                        ) {
                                            newQuantity = 1;
                                        }


                                        const maxQuantity =
                                            {{ $item->product->stock }};


                                        if (
                                            maxQuantity > 0 &&
                                            newQuantity > maxQuantity
                                        ) {
                                            newQuantity =
                                                maxQuantity;
                                        }


                                        this.quantity =
                                            newQuantity;

                                        this.updating = true;


                                        axios.put(
                                            '{{ route(
                                                'cart.update',
                                                $item
                                            ) }}',
                                            {
                                                quantity:
                                                    newQuantity
                                            }
                                        )

                                        .then(response => {

                                            if (
                                                !response.data.success
                                            ) {
                                                return;
                                            }


                                            // Update this item's subtotal
                                            this.subtotal =
                                                response.data.itemSubtotal;


                                            // Update cart page total
                                            grandTotal =
                                                response.data.grandTotal;


                                            // Update cart page quantity
                                            cartQuantity =
                                                response.data.cartQuantity;


                                            // Update cart page row count
                                            cartItemCount =
                                                response.data.cartItemCount;


                                            // Update empty state
                                            cartIsEmpty =
                                                response.data.cartIsEmpty;


                                            // IMPORTANT:
                                            // Update navbar immediately.
                                            $store.cart.updateCount(
                                                response.data.cartQuantity
                                            );

                                        })

                                        .catch(error => {

                                            console.error(
                                                'Update failed:',
                                                error
                                            );


                                            if (
                                                error.response &&
                                                error.response.status === 422
                                            ) {

                                                this.quantity =
                                                    {{ $item->quantity }};

                                            }

                                        })

                                        .finally(() => {

                                            this.updating = false;

                                        });

                                    },


                                    // -------------------------------------------------
                                    // DECREASE
                                    // -------------------------------------------------

                                    decreaseQuantity() {

                                        if (
                                            this.quantity > 1 &&
                                            !this.updating
                                        ) {

                                            this.quantity--;

                                            this.updateQuantity();

                                        }

                                    },


                                    // -------------------------------------------------
                                    // INCREASE
                                    // -------------------------------------------------

                                    increaseQuantity() {

                                        if (
                                            this.quantity <
                                                {{ $item->product->stock }}
                                            &&
                                            !this.updating
                                        ) {

                                            this.quantity++;

                                            this.updateQuantity();

                                        }

                                    },


                                    // -------------------------------------------------
                                    // REMOVE
                                    // -------------------------------------------------

                                    removeItem() {

                                        if (
                                            this.loading ||
                                            this.isRemoved
                                        ) {
                                            return;
                                        }


                                        this.loading = true;


                                        axios.delete(
                                            '{{ route(
                                                'cart.destroy',
                                                $item
                                            ) }}'
                                        )

                                        .then(response => {

                                            if (
                                                !response.data.success
                                            ) {
                                                return;
                                            }


                                            /*
                                             * Remove only this card visually.
                                             *
                                             * No transform or scale.
                                             * This keeps the image stable.
                                             */
                                            this.isRemoved = true;


                                            // Update total
                                            grandTotal =
                                                response.data.grandTotal;


                                            // Update cart page row count
                                            cartItemCount =
                                                response.data.cartItemCount;


                                            // Update total quantity
                                            cartQuantity =
                                                response.data.cartQuantity;


                                            // IMPORTANT:
                                            // Update navbar immediately.
                                            $store.cart.updateCount(
                                                response.data.cartQuantity
                                            );


                                            /*
                                             * Wait until the fade-out
                                             * finishes before showing
                                             * the empty cart.
                                             */
                                            setTimeout(() => {

                                                cartIsEmpty =
                                                    response.data.cartIsEmpty;

                                            }, 300);

                                        })

                                        .catch(error => {

                                            console.error(
                                                'Removal failed:',
                                                error
                                            );


                                            this.loading = false;

                                        });

                                    }
                                }"

                                x-show="!isRemoved"

                                x-transition:leave="
                                    transition-opacity
                                    duration-300
                                    ease-out
                                "

                                x-transition:leave-start="opacity-100"

                                x-transition:leave-end="opacity-0"

                                class="group overflow-hidden rounded-2xl border border-base-content/10 bg-base-100 shadow-sm transition-shadow duration-300 hover:shadow-lg"
                            >

                                <div
                                    class="flex flex-col gap-5 p-4 sm:flex-row sm:p-5"
                                >

                                    {{-- ================================================= --}}
                                    {{-- PRODUCT IMAGE                                      --}}
                                    {{-- ================================================= --}}

                                    <a
                                        href="{{ route(
                                            'product.show',
                                            $item->product->slug
                                        ) }}"

                                        class="group/image relative h-48 w-full shrink-0 overflow-hidden rounded-xl bg-base-200 sm:h-36 sm:w-36"
                                    >

                                        @if($item->product->primaryImage)

                                            <img
                                                src="{{ Storage::url(
                                                    $item->product
                                                        ->primaryImage
                                                        ->image_path
                                                ) }}"

                                                alt="{{ $item->product->name }}"

                                                class="block h-full w-full object-cover transition-transform duration-500 group-hover/image:scale-105"
                                            >

                                        @else

                                            <div
                                                class="flex h-full w-full items-center justify-center text-xs text-base-content/35"
                                            >
                                                No Image
                                            </div>

                                        @endif

                                    </a>


                                    {{-- ================================================= --}}
                                    {{-- PRODUCT DETAILS                                    --}}
                                    {{-- ================================================= --}}

                                    <div
                                        class="flex min-w-0 flex-1 flex-col"
                                    >

                                        {{-- Category / Stock --}}
                                        <div
                                            class="mb-2 flex flex-wrap items-center gap-2"
                                        >

                                            <span
                                                class="badge badge-outline badge-sm"
                                            >
                                                {{ $item->product->category->name }}
                                            </span>


                                            @if($item->product->stock > 0)

                                                <span
                                                    class="flex items-center gap-1 text-xs text-success"
                                                >

                                                    <span
                                                        class="size-1.5 rounded-full bg-success"
                                                    ></span>

                                                    In stock

                                                </span>

                                            @else

                                                <span
                                                    class="flex items-center gap-1 text-xs text-error"
                                                >

                                                    <span
                                                        class="size-1.5 rounded-full bg-error"
                                                    ></span>

                                                    Out of stock

                                                </span>

                                            @endif

                                        </div>


                                        {{-- Product Name --}}
                                        <a
                                            href="{{ route(
                                                'product.show',
                                                $item->product->slug
                                            ) }}"

                                            class="line-clamp-2 text-lg font-bold leading-tight transition-colors hover:text-primary sm:text-xl"
                                        >
                                            {{ $item->product->name }}
                                        </a>


                                        {{-- Description --}}
                                        <p
                                            class="mt-2 line-clamp-2 text-sm leading-6 text-base-content/50"
                                        >
                                            {{ $item->product->description }}
                                        </p>


                                        {{-- Controls --}}
                                        <div
                                            class="mt-auto flex flex-col gap-4 pt-5 sm:flex-row sm:items-end sm:justify-between"
                                        >

                                            {{-- Quantity --}}
                                            <div>

                                                <label
                                                    class="mb-2 block text-xs font-semibold uppercase tracking-wider text-base-content/40"
                                                >
                                                    Quantity
                                                </label>


                                                <div
                                                    class="join border border-base-content/10 bg-base-200"
                                                >

                                                    {{-- Minus --}}
                                                    <button
                                                        type="button"

                                                        @click="
                                                            decreaseQuantity()
                                                        "

                                                        :disabled="
                                                            updating ||
                                                            quantity <= 1
                                                        "

                                                        class="btn btn-sm join-item border-0 bg-transparent hover:bg-base-300 disabled:opacity-40"
                                                    >
                                                        −
                                                    </button>


                                                    {{-- Input --}}
                                                    <input
                                                        type="number"

                                                        x-model.number="quantity"

                                                        @change="
                                                            updateQuantity()
                                                        "

                                                        min="1"

                                                        max="{{ $item->product->stock }}"

                                                        :disabled="updating"

                                                        class="input input-sm join-item w-14 border-0 bg-transparent text-center font-bold focus:outline-none disabled:opacity-60"
                                                    >


                                                    {{-- Plus --}}
                                                    <button
                                                        type="button"

                                                        @click="
                                                            increaseQuantity()
                                                        "

                                                        :disabled="
                                                            updating ||
                                                            quantity >= {{ $item->product->stock }}
                                                        "

                                                        class="btn btn-sm join-item border-0 bg-transparent hover:bg-base-300 disabled:opacity-40"
                                                    >
                                                        +
                                                    </button>

                                                </div>

                                            </div>


                                            {{-- Price --}}
                                            <div
                                                class="flex items-end justify-between gap-6 sm:block sm:text-right"
                                            >

                                                <div>

                                                    <div
                                                        class="text-xs font-medium uppercase tracking-wider text-base-content/40"
                                                    >
                                                        Subtotal
                                                    </div>


                                                    <div
                                                        class="mt-1 text-xl font-black text-primary sm:text-2xl"
                                                    >

                                                        {{ config(
                                                            'shop.currency_symbol'
                                                        ) }}

                                                        <span
                                                            x-text="subtotal"
                                                        ></span>

                                                    </div>

                                                </div>


                                                <div
                                                    class="text-xs text-base-content/40"
                                                >

                                                    {{ config(
                                                        'shop.currency_symbol'
                                                    ) }}{{ number_format(
                                                        $unitPrice,
                                                        2
                                                    ) }}

                                                    each

                                                </div>

                                            </div>

                                        </div>

                                    </div>


                                    {{-- ================================================= --}}
                                    {{-- REMOVE BUTTON                                     --}}
                                    {{-- ================================================= --}}

                                    <div
                                        class="flex shrink-0 items-start justify-end"
                                    >

                                        <button
                                            type="button"

                                            @click="
                                                removeItem()
                                            "

                                            :disabled="
                                                loading ||
                                                updating
                                            "

                                            class="btn btn-ghost btn-circle text-base-content/35 transition-colors hover:bg-error hover:text-error-content"

                                            title="Remove item"
                                        >

                                            <template x-if="!loading">

                                                <i
                                                    data-lucide="trash-2"
                                                    class="size-5"
                                                ></i>

                                            </template>


                                            <template x-if="loading">

                                                <span
                                                    class="loading loading-spinner loading-sm"
                                                ></span>

                                            </template>

                                        </button>

                                    </div>

                                </div>

                            </article>

                        @endforeach

                    </div>

                </div>


                {{-- ===================================================== --}}
                {{-- ORDER SUMMARY                                           --}}
                {{-- ===================================================== --}}

                <aside
                    class="sticky top-6 overflow-hidden rounded-2xl border border-base-content/10 bg-base-100 shadow-sm"
                >

                    <div
                        class="border-b border-base-content/10 p-6"
                    >

                        <div class="flex items-center gap-3">

                            <div
                                class="flex size-10 items-center justify-center rounded-xl bg-primary text-primary-content"
                            >

                                <i
                                    data-lucide="receipt"
                                    class="size-5"
                                ></i>

                            </div>


                            <div>

                                <h2 class="text-lg font-black">
                                    Order Summary
                                </h2>

                                <p
                                    class="text-xs text-base-content/50"
                                >
                                    Your current selection
                                </p>

                            </div>

                        </div>

                    </div>


                    <div class="p-6">

                        {{-- Total quantity --}}
                        <div
                            class="flex justify-between text-sm"
                        >

                            <span
                                class="text-base-content/60"
                            >
                                Items
                            </span>


                            <span
                                class="font-semibold"
                                x-text="cartQuantity"
                            ></span>

                        </div>


                        <div
                            class="my-5 border-t border-base-content/10"
                        ></div>


                        {{-- Total --}}
                        <div
                            class="flex items-end justify-between gap-4"
                        >

                            <div>

                                <div
                                    class="text-sm font-semibold text-base-content/60"
                                >
                                    Estimated Total
                                </div>

                                <div
                                    class="mt-1 text-xs text-base-content/40"
                                >
                                    Taxes and shipping calculated at checkout
                                </div>

                            </div>


                            <div
                                class="shrink-0 text-2xl font-black text-primary"
                            >

                                {{ config(
                                    'shop.currency_symbol'
                                ) }}

                                <span
                                    x-text="grandTotal"
                                ></span>

                            </div>

                        </div>
                        {{-- Checkout --}}
                        <form action="{{route('checkout.store')}}" method="post">
                            @csrf
                            <button
                                type="submit"
                                class="btn btn-primary mt-6 w-full gap-2 uppercase tracking-wider shadow-sm"
                            >

                                Proceed to Checkout

                                <i
                                    data-lucide="arrow-right"
                                    class="size-4"
                                ></i>

                            </button>

                        </form>


                        {{-- Continue Shopping --}}
                        <a
                            href="{{ route('products.index') }}"
                            class="btn btn-ghost mt-2 w-full"
                        >
                            Continue Shopping
                        </a>


                        {{-- Trust --}}
                        <div
                            class="mt-6 flex items-start gap-3 rounded-xl border border-base-content/10 bg-base-200 p-4"
                        >

                            <i
                                data-lucide="shield-check"
                                class="mt-0.5 size-4 shrink-0 text-success"
                            ></i>

                            <p
                                class="text-xs leading-5 text-base-content/50"
                            >
                                Your order details are securely processed
                                and your cart is saved for checkout.
                            </p>

                        </div>

                    </div>

                </aside>

            </div>


            {{-- ========================================================= --}}
            {{-- EMPTY CART                                                 --}}
            {{-- ========================================================= --}}

            <section
                x-show="cartIsEmpty"
                x-cloak

                x-transition:enter="
                    transition-all
                    duration-500
                    ease-out
                "

                x-transition:enter-start="
                    opacity-0
                    translate-y-3
                "

                x-transition:enter-end="
                    opacity-100
                    translate-y-0
                "

                class="overflow-hidden rounded-3xl border border-base-content/10 bg-base-100 shadow-sm"
            >

                <div
                    class="flex min-h-[480px] flex-col items-center justify-center px-6 py-16 text-center sm:px-12"
                >

                    <div
                        class="mb-8 flex size-20 items-center justify-center rounded-2xl border border-base-content/10 bg-base-200"
                    >

                        <i
                            data-lucide="shopping-cart"
                            class="size-9 text-base-content/35"
                        ></i>

                    </div>


                    <span
                        class="mb-3 text-xs font-bold uppercase tracking-[0.2em] text-primary"
                    >
                        Your garage
                    </span>


                    <h2
                        class="text-3xl font-black tracking-tight sm:text-4xl"
                    >
                        Your cart is empty
                    </h2>


                    <p
                        class="mt-4 max-w-md text-sm leading-7 text-base-content/60 sm:text-base"
                    >
                        Looks like you haven't added any parts yet.
                        Explore our collection and find what your car needs.
                    </p>


                    <div class="mt-8">

                        <a
                            href="{{ route('products.index') }}"
                            class="btn btn-primary btn-lg gap-2 px-8 shadow-sm"
                        >

                            <i
                                data-lucide="shopping-bag"
                                class="size-5"
                            ></i>

                            Browse Car Parts

                        </a>

                    </div>

                </div>

            </section>

        </main>

    </div>

</x-layouts.app>
