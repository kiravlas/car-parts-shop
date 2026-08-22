{{--On Sale--}}
@props(['onSaleProducts'])
<section class="py-16 bg-base-300">

    <div class="max-w-7xl mx-auto px-4">

        <div class="mb-10 flex items-center justify-between">

            <h2 class="text-4xl font-bold text-primary">
                On Sale
            </h2>

            <a href="#" class="btn btn-outline btn-primary">
                View All
            </a>

        </div>

    </div>

    <div class="max-w-[92rem] mx-auto px-4">

        <div class="relative px-16">

            <div
                id="top-sellers-carousel"
                class="relative overflow-visible"
                data-hs-carousel='{
                    "loadingClasses":"opacity-0",
                    "isAutoPlay":false,
                    "isInfiniteLoop":false,
                    "dotsItemClasses":"hs-carousel-active:bg-primary hs-carousel-active:border-primary size-3 rounded-full border border-base-content/30 cursor-pointer",
                    "slidesQty":{
                        "xs":1,
                        "sm":2,
                        "md":3,
                        "lg":4
                    },
                    "slidesPerMove":1
                }'>

                <div class="hs-carousel relative w-full min-h-[480px] overflow-hidden">

                    <div
                        class="hs-carousel-body absolute inset-0 flex flex-nowrap transition-transform duration-500 -mx-2 opacity-0">

                        {{-- Cards --}}

                        @foreach($onSaleProducts as $product)
                            <div class="hs-carousel-slide px-2">

                                <x-products.stationary-carousel-card :product="$product"
                                                                     :badge="['text' => 'SALE', 'color' => 'badge-warning']"/>

                            </div>

                        @endforeach

                    </div>

                </div>

                {{-- LEFT ARROW --}}
                <button
                    type="button"
                    class="hs-carousel-prev absolute -left-16 top-1/2 z-20 flex size-12 -translate-y-1/2 items-center justify-center rounded-full bg-base-100 shadow-xl transition-all duration-300 hover:scale-105 hover:cursor-pointer hover:bg-primary hover:text-primary-content disabled:cursor-not-allowed disabled:opacity-30 disabled:hover:bg-base-100 disabled:hover:text-base-content disabled:hover:scale-100">

                    <i data-lucide="chevron-left" class="size-6"></i>

                </button>

                {{-- RIGHT ARROW --}}
                <button
                    type="button"
                    class="hs-carousel-next absolute -right-16 top-1/2 z-20 flex size-12 -translate-y-1/2 items-center justify-center rounded-full bg-base-100 shadow-xl transition-all duration-300 hover:cursor-pointer hover:scale-105 hover:bg-primary hover:text-primary-content disabled:cursor-not-allowed disabled:opacity-30 disabled:hover:bg-base-100 disabled:hover:text-base-content disabled:hover:scale-100">

                    <i data-lucide="chevron-right" class="size-6"></i>

                </button>

            </div>

        </div>

    </div>

</section>
