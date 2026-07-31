{{--Promotion Carousel + Product of the day--}}

<section class="py-16 bg-base-200">

    <div class="max-w-7xl mx-auto px-4">

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">


            {{-- Promotion Carousel --}}
            <div
                id="hs-carousel"
                class="relative lg:col-span-3"
                data-hs-carousel='{
        "loadingClasses":"opacity-0",
        "isAutoPlay":true,
        "isInfiniteLoop":true,
        "dotsItemClasses":"size-3 rounded-full border border-base-content/30 cursor-pointer transition-all duration-300 hs-carousel-active:w-8 hs-carousel-active:bg-primary hs-carousel-active:border-primary"
    }'>

                <!-- Carousel -->
                <div
                    class="hs-carousel relative h-[380px] w-full overflow-hidden rounded-2xl border border-base-300 bg-base-100 shadow-2xl">

                    <!-- Slides -->
                    <div
                        class="hs-carousel-body absolute inset-0 flex flex-nowrap transition-transform duration-700 opacity-0">

                        <!-- Slide 1 -->
                        <div class="hs-carousel-slide">
                            <img
                                src="{{ asset('images/promo/summer-sail-1.png') }}"
                                alt="Summer Sale"
                                class="h-full w-full object-fill">
                        </div>

                        <!-- Slide 2 -->
                        <div class="hs-carousel-slide">
                            <img
                                src="{{ asset('images/promo/summer-sail-2.png') }}"
                                alt="Brake Parts"
                                class="h-full w-full object-fill">
                        </div>

                        <!-- Slide 3 -->
                        <div class="hs-carousel-slide">
                            <img
                                src="{{ asset('images/promo/summer-sail-3.png') }}"
                                alt="Engine Oil"
                                class="h-full w-full object-fill">
                        </div>

                    </div>

                </div>

                <!-- Previous -->
                <button
                    type="button"
                    class="hs-carousel-prev absolute left-5 top-1/2 z-20 h-11 w-11 -translate-y-1/2 items-center justify-center rounded-full border border-base-300 bg-base-100/80 text-base-content shadow-lg backdrop-blur transition-all duration-300 hover:scale-110 hover:border-primary hover:bg-primary hover:text-primary-content hidden md:flex">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="size-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m15 18-6-6 6-6"/>
                    </svg>

                </button>

                <!-- Next -->
                <button
                    type="button"
                    class="hs-carousel-next absolute right-5 top-1/2 z-20 h-11 w-11 -translate-y-1/2 items-center justify-center rounded-full border border-base-300 bg-base-100/80 text-base-content shadow-lg backdrop-blur transition-all duration-300 hover:scale-110 hover:border-primary hover:bg-primary hover:text-primary-content hidden md:flex">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="size-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6"/>
                    </svg>

                </button>

                <!-- Pagination -->
                <div
                    class="hs-carousel-pagination absolute bottom-5 left-1/2 z-20 flex -translate-x-1/2 gap-2"></div>

            </div>


            {{-- Product of the day card--}}

            <div class="card w-full bg-base-100 shadow-xl border border-base-300">

                <figure class="h-52">
                    <img
                        src="https://images.unsplash.com/photo-1542282088-fe8426682b8f"
                        alt="Luxury car"
                        class="h-full w-full object-cover">
                </figure>

                <div class="card-body">
                    <div
                        x-data="{
        hours: 10,
        minutes: 24,
        seconds: 59,

        start() {
            setInterval(() => {

                if (this.seconds > 0) {
                    this.seconds--
                }
                else {

                    this.seconds = 59

                    if (this.minutes > 0) {
                        this.minutes--
                    }
                    else {

                        this.minutes = 59

                        if (this.hours > 0) {
                            this.hours--
                        }
                        else {
                            this.hours = 0
                            this.minutes = 0
                            this.seconds = 0
                        }

                    }
                }

            }, 1000)
        }
    }"
                        x-init="start()"
                        class="flex items-center justify-between"
                    >


    <span class="badge badge-accent">
        SALE
    </span>


                        <span class="countdown font-mono text-2xl">

        <span
            :style="`--value:${hours}`"
            aria-live="polite"
            :aria-label="hours">
        </span>

        :

        <span
            :style="`--value:${minutes}`"
            aria-live="polite"
            :aria-label="minutes">
        </span>

        :

        <span
            :style="`--value:${seconds}`"
            aria-live="polite"
            :aria-label="seconds">
        </span>

    </span>


                    </div>


                    <h2 class="card-title">
                        Alloy Wheels
                    </h2>

                    <p class="text-sm opacity-70">
                        Lightweight aluminum wheels.
                    </p>

                    <div class="mt-auto flex justify-between items-center">
                        <span class="text-xl font-bold text-primary">
                            $399
                        </span>

                        <button class="btn btn-primary">
                            View
                        </button>
                    </div>

                </div>

            </div>


        </div>

    </div>

</section>
