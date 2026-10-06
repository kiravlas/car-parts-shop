{{-- Blog --}}
<section class="bg-base-200 py-16">
    <div class="mx-auto max-w-7xl px-4">
        {{-- Heading --}}
        <div class="mb-12 flex items-center justify-between">
            <h2 class="text-4xl font-bold text-primary">
                Blog
            </h2>

            <a
                href="#"
                class="flex items-center gap-2 font-semibold text-primary hover:underline"
            >
                Learn more
                <i data-lucide="arrow-right" class="size-5"></i>
            </a>
        </div>

        {{-- Articles --}}
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 xl:grid-cols-3">
            {{-- Article Card --}}
            <article class="card bg-base-100 shadow-xl">
                <figure>
                    <img
                        src="https://images.unsplash.com/photo-1487754180451-c456f719a1fc"
                        alt="Car maintenance"
                        class="h-64 w-full object-cover"
                    >
                </figure>

                <div class="card-body">
                    <div class="flex items-center gap-3">
                        <img
                            src="https://i.pravatar.cc/100?img=12"
                            alt="Alex Carter"
                            class="size-10 rounded-full"
                        >

                        <div>
                            <p class="text-sm font-semibold">
                                Alex Carter
                            </p>

                            <p class="text-sm text-base-content/60">
                                Automotive Expert
                            </p>
                        </div>
                    </div>

                    <h3 class="card-title mt-4">
                        How to choose the right brake parts
                    </h3>

                    <p class="text-base-content/70">
                        Discover the main differences between brake pads,
                        discs and calipers before buying replacements.
                    </p>

                    <div class="card-actions mt-4 justify-end">
                        <a href="#" class="btn btn-primary btn-sm">
                            Read More
                        </a>
                    </div>
                </div>
            </article>

            {{-- Article Card --}}
            <article class="card bg-base-100 shadow-xl">
                <figure>
                    <img
                        src="https://images.unsplash.com/photo-1492144534655-ae79c964c9d7"
                        alt="Car engine"
                        class="h-64 w-full object-cover"
                    >
                </figure>

                <div class="card-body">
                    <div class="flex items-center gap-3">
                        <img
                            src="https://i.pravatar.cc/100?img=33"
                            alt="Mark Wilson"
                            class="size-10 rounded-full"
                        >

                        <div>
                            <p class="text-sm font-semibold">
                                Mark Wilson
                            </p>

                            <p class="text-sm text-base-content/60">
                                Mechanic
                            </p>
                        </div>
                    </div>

                    <h3 class="card-title mt-4">
                        Signs your engine needs maintenance
                    </h3>

                    <p class="text-base-content/70">
                        Learn common engine problems and which parts should
                        be checked first.
                    </p>

                    <div class="card-actions mt-4 justify-end">
                        <a href="#" class="btn btn-primary btn-sm">
                            Read More
                        </a>
                    </div>
                </div>
            </article>

            {{-- Article Card --}}
            <article class="card bg-base-100 shadow-xl">
                <figure>
                    <img
                        src="https://images.unsplash.com/photo-1486262715619-67b85e0b08d3"
                        alt="Car repair"
                        class="h-64 w-full object-cover"
                    >
                </figure>

                <div class="card-body">
                    <div class="flex items-center gap-3">
                        <img
                            src="https://i.pravatar.cc/100?img=47"
                            alt="Emma Stone"
                            class="size-10 rounded-full"
                        >

                        <div>
                            <p class="text-sm font-semibold">
                                Emma Stone
                            </p>

                            <p class="text-sm text-base-content/60">
                                Car Specialist
                            </p>
                        </div>
                    </div>

                    <h3 class="card-title mt-4">
                        OEM vs aftermarket parts
                    </h3>

                    <p class="text-base-content/70">
                        Understand which replacement parts are better for
                        performance and reliability.
                    </p>

                    <div class="card-actions mt-4 justify-end">
                        <a href="#" class="btn btn-primary btn-sm">
                            Read More
                        </a>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>
