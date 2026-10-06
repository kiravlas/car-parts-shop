{{-- New Arrivals --}}
@props(['newArrivalsProducts'])

<section class="bg-base-100 py-16">
    <div class="mx-auto max-w-7xl px-4">
        {{-- Section Heading --}}
        <div class="mb-10 flex items-center justify-between">
            <h2 class="text-4xl font-bold text-primary">
                New Arrivals
            </h2>

            <a
                href="{{ route('products.index', ['is_new_arrival' => 'on']) }}"
                class="btn btn-outline btn-primary"
            >
                View All
            </a>
        </div>

        {{-- Carousel --}}
        <div class="relative px-16 max-[424px]:px-4">
            <div
                id="new-arrivals-carousel"
                class="new-arrivals-carousel relative overflow-visible"
                data-hs-carousel='{
                    "loadingClasses": "",
                    "isAutoPlay": true,
                    "isInfiniteLoop": true,
                    "dotsItemClasses": "hs-carousel-active:bg-primary hs-carousel-active:border-primary size-3 border border-base-content/30 rounded-full cursor-pointer",
                    "slidesQty": {
                        "xs": 1,
                        "sm": 2,
                        "md": 3,
                        "lg": 4
                    }
                }'
            >
                <div class="hs-carousel relative min-h-[430px] w-full overflow-hidden rounded-xl">
                    <div
                        class="hs-carousel-body absolute inset-0 -mx-3 flex flex-nowrap opacity-0 transition-transform duration-700"
                    >
                        @foreach($newArrivalsProducts as $product)
                            <div class="hs-carousel-slide px-3">
                                <x-products.moving-carousel-card
                                    :product="$product"
                                    :badge="['text' => 'NEW', 'color' => 'badge-primary']"
                                />
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Pagination --}}
                <div
                    class="hs-carousel-pagination absolute -bottom-10 left-1/2 z-20 flex -translate-x-1/2 items-center gap-1.5"
                ></div>

                {{-- Left Arrow --}}
                <button
                    type="button"
                    class="
                        hs-carousel-prev absolute z-20 flex shrink-0 items-center justify-center rounded-full shadow-xl
                        transition-all duration-300
                        disabled:cursor-not-allowed disabled:opacity-30
                        min-[425px]:-left-16 min-[425px]:top-1/2 min-[425px]:size-12 min-[425px]:-translate-y-1/2 min-[425px]:bg-base-300
                        min-[425px]:hover:scale-105 min-[425px]:hover:cursor-pointer min-[425px]:hover:bg-primary min-[425px]:hover:text-primary-content
                        min-[425px]:disabled:hover:scale-100 min-[425px]:disabled:hover:bg-base-300 min-[425px]:disabled:hover:text-base-content
                        max-[424px]:bottom-[-4.05rem] max-[424px]:left-1/2 max-[424px]:top-auto max-[424px]:size-8 max-[424px]:-translate-x-[8rem] max-[424px]:-translate-y-1/2 max-[424px]:bg-base-300
                        max-[424px]:hover:scale-105 max-[424px]:hover:bg-primary max-[424px]:hover:text-primary-content
                        max-[424px]:disabled:hover:scale-100 max-[424px]:disabled:hover:bg-base-300 max-[424px]:disabled:hover:text-base-content
                    "
                >
                    <i data-lucide="chevron-left" class="size-4 min-[425px]:size-6"></i>
                </button>

                {{-- Right Arrow --}}
                <button
                    type="button"
                    class="
                        hs-carousel-next absolute z-20 flex shrink-0 items-center justify-center rounded-full shadow-xl
                        transition-all duration-300
                        disabled:cursor-not-allowed disabled:opacity-30
                        min-[425px]:-right-16 min-[425px]:top-1/2 min-[425px]:size-12 min-[425px]:-translate-y-1/2 min-[425px]:bg-base-300
                        min-[425px]:hover:scale-105 min-[425px]:hover:cursor-pointer min-[425px]:hover:bg-primary min-[425px]:hover:text-primary-content
                        min-[425px]:disabled:hover:scale-100 min-[425px]:disabled:hover:bg-base-300 min-[425px]:disabled:hover:text-base-content
                        max-[424px]:bottom-[-4.05rem] max-[424px]:left-1/2 max-[424px]:right-auto max-[424px]:top-auto max-[424px]:size-8 max-[424px]:translate-x-[6rem] max-[424px]:-translate-y-1/2 max-[424px]:bg-base-300
                        max-[424px]:hover:scale-105 max-[424px]:hover:bg-primary max-[424px]:hover:text-primary-content
                        max-[424px]:disabled:hover:scale-100 max-[424px]:disabled:hover:bg-base-300 max-[424px]:disabled:hover:text-base-content
                    "
                >
                    <i data-lucide="chevron-right" class="size-4 min-[425px]:size-6"></i>
                </button>
            </div>
        </div>
    </div>
</section>
