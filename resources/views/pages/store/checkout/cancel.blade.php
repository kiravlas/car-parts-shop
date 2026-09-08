<x-layouts.app>

    <section class="min-h-[70vh] bg-base-300 px-4 py-16 sm:py-20">

        <div class="mx-auto flex max-w-2xl items-center justify-center">

            <div class="card w-full border border-base-300 bg-base-100 shadow-xl">

                <div class="card-body items-center p-8 text-center sm:p-12">

                    {{-- Cancel Icon --}}
                    <div class="mb-6 flex size-20 items-center justify-center rounded-full bg-warning/10">
                        <div
                            class="flex size-14 items-center justify-center rounded-full bg-warning text-warning-content">
                            <i
                                data-lucide="arrow-left"
                                class="size-8"
                            ></i>
                        </div>
                    </div>

                    {{-- Heading --}}
                    <h1 class="text-3xl font-bold tracking-tight sm:text-4xl">
                        Payment Cancelled
                    </h1>

                    {{-- Cart Notice --}}
                    <div class="mt-8 w-full rounded-xl border border-base-300 bg-base-200 p-5">

                        <div class="flex items-center justify-center gap-2 text-warning">
                            <i
                                data-lucide="shopping-cart"
                                class="size-5"
                            ></i>

                            <span class="font-semibold">
                                Your Cart Is Still Here
                            </span>
                        </div>

                        <p class="mt-2 text-sm text-base-content/60">
                            Forgot to add something? Continue shopping and come back
                            whenever you're ready to complete your purchase.
                        </p>

                    </div>

                    {{-- Actions --}}
                    <div class="mt-8 flex w-full flex-col gap-3 sm:flex-row sm:justify-center">

                        <a
                            href="{{ route('cart.index') }}"
                            class="btn btn-primary gap-2"
                        >
                            <i
                                data-lucide="shopping-cart"
                                class="size-4"
                            ></i>

                            Return to Cart
                        </a>

                        <a
                            href="{{ route('products.index') }}"
                            class="btn btn-outline gap-2"
                        >
                            <i
                                data-lucide="shopping-bag"
                                class="size-4"
                            ></i>

                            Continue Shopping
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </section>

</x-layouts.app>
