{{-- New Arrivals --}}
@props(['newArrivalsProducts'])
<section class="py-16 bg-base-100">
    <div class="max-w-7xl mx-auto px-4">

        <!-- Section Heading -->
        <div class="mb-10 flex items-center justify-between">
            <h2 class="text-4xl font-bold text-primary">
                New Arrivals
            </h2>

            <a href="#"
               class="btn btn-primary btn-outline">
                View All
            </a>
        </div>


        <!-- Carousel Wrapper -->
        <div class="relative px-16">

            <div
                id="hs-carousel"
                class="relative overflow-visible"
                data-hs-carousel='{
                    "loadingClasses":"opacity-0",
                    "isAutoPlay":true,
                    "isInfiniteLoop":true,
                    "dotsItemClasses":"hs-carousel-active:bg-primary hs-carousel-active:border-primary size-3 border border-base-content/30 rounded-full cursor-pointer",
                    "slidesQty":{
                        "xs":1,
                        "sm":2,
                        "md":3,
                        "lg":4
                    }
                }'>


                <div class="hs-carousel relative w-full min-h-[430px] overflow-hidden rounded-xl">


                    <div
                        class="hs-carousel-body absolute inset-0 flex flex-nowrap transition-transform duration-700 -mx-3 opacity-0">

                        @foreach($newArrivalsProducts as $product)
                            <div class="hs-carousel-slide px-3">

                                <x-products.moving-carousel-card :product="$product"
                                                                 :badge="['text' => 'NEW', 'color' => 'badge-primary']"/>

                            </div>

                        @endforeach
                    </div>

                </div>


                <!-- LEFT ARROW -->
                <button
                    type="button"
                    class="hs-carousel-prev absolute -left-16 top-1/2 -translate-y-1/2 z-20
                           size-12 rounded-full
                           bg-base-300
                           shadow-lg
                           hover:bg-primary
                           hover:text-primary-content
                           transition">


                    <svg
                        class="size-6 mx-auto"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M15 18l-6-6 6-6"/>

                    </svg>

                </button>


                <!-- RIGHT ARROW -->
                <button
                    type="button"
                    class="hs-carousel-next absolute -right-16 top-1/2 -translate-y-1/2 z-20
                           size-12 rounded-full
                           bg-base-300
                           shadow-lg
                           hover:bg-primary
                           hover:text-primary-content
                           transition">


                    <svg
                        class="size-6 mx-auto"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 18l6-6-6-6"/>

                    </svg>

                </button>


                {{-- Pagination --}}
                <div class="hs-carousel-pagination flex justify-center gap-2 mt-8"></div>


            </div>

        </div>

    </div>
</section>
