{{--Hero Section --}}
<div class="hero min-h-screen relative overflow-hidden">

    <!-- Video background -->
    <video
        class="absolute inset-0 w-full h-full object-cover"
        autoplay
        muted
        loop
        playsinline>
        <source src="{{ asset('videos/car.mp4') }}" type="video/mp4">
    </video>

    <!-- Dark overlay -->
    <div class="hero-overlay absolute inset-0"></div>

    <!-- Content -->
    <div class="hero-content relative z-10 w-full text-neutral-content text-center">
        <div class="w-full max-w-xs">
            <h1 class="mb-5 text-5xl font-bold">
                Need 4 Parts
            </h1>

            <p class="mb-5">
                Find the right parts for <strong>your</strong> car.
            </p>

            <!-- Search by vehicle form -->
            <div class="aura aura-dual w-full">
                <button
                    type="button"
                    class="hs-collapse-toggle btn btn-neutral w-full justify-between"
                    id="hs-collapse"
                    aria-expanded="false"
                    aria-controls="hs-collapse-heading"
                    data-hs-collapse="#hs-collapse-heading">

    <span class="flex items-center gap-2">
        <i data-lucide="tool-case" class="size-5"></i>
        Search Parts by Vehicle
    </span>

                    <svg
                        class="hs-collapse-open:rotate-180 transition-transform size-5"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 9l6 6 6-6"/>
                    </svg>

                </button>
            </div>

            <div id="hs-collapse-heading"
                 class="hs-collapse hidden w-full overflow-hidden transition-[height] duration-300"
                 aria-labelledby="hs-collapse" role="region">
                <div class="mt-5">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-2">

                        <select class="select select-bordered w-full">
                            <option disabled selected>Select Make</option>
                            <option>Toyota</option>
                            <option>BMW</option>
                            <option>Mercedes-Benz</option>
                            <option>Audi</option>
                            <option>Volkswagen</option>
                        </select>

                        <select class="select select-bordered w-full">
                            <option disabled selected>Select Model</option>
                            <option>Corolla</option>
                            <option>Camry</option>
                            <option>RAV4</option>
                        </select>

                        <select class="select select-bordered w-full">
                            <option disabled selected>Select Year</option>
                            <option>2024</option>
                            <option>2023</option>
                            <option>2022</option>
                            <option>2021</option>
                        </select>

                        <select class="select select-bordered w-full">
                            <option disabled selected>Select Engine</option>
                            <option>1.6 Petrol</option>
                            <option>2.0 Diesel</option>
                            <option>1.8 Hybrid</option>
                        </select>

                    </div>

                    <button class="btn btn-primary w-full mt-6">
                        Search Compatible Parts
                    </button>

                </div>
            </div>
            <!-- End Collapse -->
            <div class="divider my-8">OR</div>

            <div class="mt-8 mb-5">
                <p class="text-sm uppercase tracking-widest text-base-content/80">
                    Already know what you need?
                </p>
            </div>


            <div class="join w-full mb-5">
                <input
                    class="input input-bordered join-item flex-1"
                    placeholder="Enter part number (e.g. 06A115561B)">

                <button class="btn btn-primary join-item">
                    <i data-lucide="search" class="size-4"></i>
                </button>
            </div>
            <div class="join w-full mb-5">
                <input
                    class="input input-bordered join-item flex-1"
                    placeholder="Enter VIN number (17-character code)">

                <button class="btn btn-primary join-item">
                    <i data-lucide="car-front" class="size-4"></i>
                </button>
            </div>

            <div class="join w-full">
                <input
                    class="input input-bordered join-item flex-1"
                    placeholder="Enter product name">

                <button class="btn btn-primary join-item">
                    <i data-lucide="shopping-basket" class="size-4"></i>
                </button>
            </div>

        </div>
    </div>

</div>

