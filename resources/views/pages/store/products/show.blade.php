<x-layouts.app>
    <div class="min-h-screen bg-base-300 py-10">

        <div class="mx-auto max-w-7xl px-4">


            {{-- Breadcrumb --}}
            <div class="breadcrumbs mb-8 text-sm">

                <ul>

                    <li>
                        <a href="{{ route('home.index') }}">
                            Home
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            Brake Parts
                        </a>
                    </li>

                    <li>
                        Brake Pads
                    </li>

                </ul>

            </div>


            {{-- Product --}}
            <div class="grid gap-10 lg:grid-cols-2">


                {{-- Gallery --}}
                <div>


                    <div
                        data-hs-carousel='{
                        "loadingClasses": "opacity-0"
                    }'
                        class="relative">


                        <div class="hs-carousel flex flex-col sm:flex-row gap-4">


                            {{-- Main image --}}
                            <div
                                class="sm:order-2 relative grow overflow-hidden min-h-[500px] rounded-3xl bg-base-100 shadow-xl">


                                <div
                                    class="hs-carousel-body absolute inset-0 flex flex-nowrap transition-transform duration-700 opacity-0">


                                    @foreach([
                                        'product-1.jpg',
                                        'product-2.jpg',
                                        'product-3.jpg',
                                        'product-4.jpg'
                                    ] as $image)

                                        <div class="hs-carousel-slide">

                                            <div
                                                class="flex h-full items-center justify-center p-8">

                                                <img
                                                    src="{{ asset('images/products/'.$image) }}"
                                                    class="max-h-full object-contain"
                                                    alt="Product image">

                                            </div>

                                        </div>

                                    @endforeach


                                </div>


                                {{-- Arrows --}}
                                <button
                                    type="button"
                                    class="hs-carousel-prev hs-carousel-disabled:opacity-50 absolute top-1/2 left-4 flex size-12 -translate-y-1/2 items-center justify-center rounded-full bg-base-100 shadow-xl">

                                    ❮

                                </button>


                                <button
                                    type="button"
                                    class="hs-carousel-next hs-carousel-disabled:opacity-50 absolute top-1/2 right-4 flex size-12 -translate-y-1/2 items-center justify-center rounded-full bg-base-100 shadow-xl">

                                    ❯

                                </button>


                            </div>


                            {{-- Thumbnails --}}
                            <div class="sm:order-1">


                                <div
                                    class="
                                hs-carousel-pagination
                                flex
                                flex-row
                                sm:flex-col
                                gap-3
                                overflow-x-auto
                                sm:max-h-[500px]
                                ">


                                    @foreach([
                                        'product-1.jpg',
                                        'product-2.jpg',
                                        'product-3.jpg',
                                        'product-4.jpg'
                                    ] as $image)

                                        <div
                                            class="
                                        hs-carousel-pagination-item
                                        shrink-0
                                        size-20
                                        rounded-xl
                                        overflow-hidden
                                        border
                                        border-base-300
                                        cursor-pointer
                                        hs-carousel-active:border-primary
                                        ">


                                            <img
                                                src="{{ asset('images/products/'.$image) }}"
                                                class="h-full w-full object-cover">


                                        </div>

                                    @endforeach


                                </div>


                            </div>


                        </div>


                    </div>


                </div>


                {{-- Product Information --}}
                <div>


                    <div
                        class="card border border-base-300 bg-base-100 shadow-xl">


                        <div class="card-body">


                            <div class="badge badge-primary">
                                Bosch
                            </div>


                            <h1 class="mt-4 text-4xl font-bold">

                                Premium Brake Pads

                            </h1>


                            {{-- Rating --}}
                            <div class="mt-3 flex items-center gap-3">


                                <div class="rating rating-sm">

                                    <input
                                        type="radio"
                                        class="mask mask-star-2 bg-orange-400"
                                        checked>


                                    <input
                                        type="radio"
                                        class="mask mask-star-2 bg-orange-400">


                                    <input
                                        type="radio"
                                        class="mask mask-star-2 bg-orange-400">


                                    <input
                                        type="radio"
                                        class="mask mask-star-2 bg-orange-400">


                                    <input
                                        type="radio"
                                        class="mask mask-star-2 bg-orange-400">

                                </div>


                                <span class="text-sm text-base-content/60">

                                4.8 (126 reviews)

                            </span>


                            </div>


                            <div class="divider"></div>


                            {{-- Price --}}
                            <div>

                            <span class="text-4xl font-bold text-primary">

                                $79.99

                            </span>


                            </div>


                            {{-- Stock --}}
                            <div class="mt-4">


                            <span class="badge badge-success">

                                In Stock

                            </span>


                                <span class="ml-2 text-sm text-base-content/60">

                                Ships within 24 hours

                            </span>


                            </div>


                            {{-- Quantity --}}
                            <div class="mt-6">


                                <label class="label">

                                    Quantity

                                </label>


                                <input
                                    type="number"
                                    value="1"
                                    min="1"
                                    class="input input-bordered w-32">


                            </div>


                            {{-- Buttons --}}
                            <div class="mt-6 flex flex-col gap-3">


                                <button
                                    class="btn btn-primary btn-lg">

                                    Add To Cart

                                </button>


                                <button
                                    class="btn btn-outline btn-lg">

                                    ♡ Add To Wishlist

                                </button>


                            </div>


                        </div>


                    </div>


                </div>


            </div>


            {{-- Details --}}
            <div class="mt-10 grid gap-6 lg:grid-cols-3">


                <div class="card border border-base-300 bg-base-100 shadow-xl lg:col-span-2">

                    <div class="card-body">


                        <h2 class="card-title text-2xl">

                            Product Description

                        </h2>


                        <p class="leading-relaxed text-base-content/70">


                            Premium brake pads designed for reliable stopping
                            power and long-lasting performance.
                            Manufactured using high quality materials.


                        </p>


                    </div>


                </div>


                {{-- Compatibility --}}
                <div class="card border border-base-300 bg-base-100 shadow-xl">


                    <div class="card-body">


                        <h2 class="card-title">

                            Compatible Vehicles

                        </h2>


                        <div class="mt-4 space-y-3">


                            <div class="rounded-xl border border-base-300 p-3">

                                BMW 3 Series
                                <br>

                                <span class="text-sm text-base-content/60">
                                2015-2020
                            </span>

                            </div>


                            <div class="rounded-xl border border-base-300 p-3">

                                Audi A4
                                <br>

                                <span class="text-sm text-base-content/60">
                                2016-2021
                            </span>

                            </div>


                        </div>


                    </div>


                </div>


            </div>


            {{-- Specifications --}}
            <div class="card mt-6 border border-base-300 bg-base-100 shadow-xl">


                <div class="card-body">


                    <h2 class="card-title">

                        Specifications

                    </h2>


                    <div class="overflow-x-auto">


                        <table class="table">


                            <tbody>


                            <tr>

                                <td>
                                    Brand
                                </td>

                                <td>
                                    Bosch
                                </td>

                            </tr>


                            <tr>

                                <td>
                                    Material
                                </td>

                                <td>
                                    Ceramic
                                </td>

                            </tr>


                            <tr>

                                <td>
                                    Warranty
                                </td>

                                <td>
                                    2 Years
                                </td>

                            </tr>


                            </tbody>


                        </table>


                    </div>


                </div>


            </div>


        </div>


    </div>

    {{-- ============================================================
     Customer Reviews
============================================================ --}}
    <section class="mt-10">

        <div class="rounded-3xl border border-base-300 bg-base-100 shadow-xl">

            {{-- Header --}}
            <div class="border-b border-base-300 p-8">

                <h2 class="text-3xl font-bold">
                    Customer Reviews
                </h2>

                <p class="mt-2 text-base-content/70">
                    See what other customers think before buying.
                </p>

            </div>


            {{-- Summary --}}
            <div class="grid gap-10 border-b border-base-300 p-8 lg:grid-cols-3">

                {{-- Overall rating --}}
                <div class="text-center">

                    <div class="text-6xl font-black text-primary">

                        4.8

                    </div>

                    <div class="rating rating-lg mt-4">

                        @for($i = 1; $i <= 5; $i++)

                            <input
                                type="radio"
                                class="mask mask-star-2 bg-warning"
                                checked>

                        @endfor

                    </div>

                    <p class="mt-3 text-base-content/60">

                        Based on 126 reviews

                    </p>

                </div>


                {{-- Rating bars --}}
                <div class="space-y-4">

                    @foreach([
                        [5,90],
                        [4,7],
                        [3,2],
                        [2,1],
                        [1,0],
                    ] as [$stars,$percent])

                        <div class="flex items-center gap-4">

                        <span class="w-8 text-sm">

                            {{ $stars }}★

                        </span>

                            <progress
                                class="progress progress-success w-full"
                                value="{{ $percent }}"
                                max="100">

                            </progress>

                            <span class="w-10 text-right text-sm">

                            {{ $percent }}%

                        </span>

                        </div>

                    @endforeach

                </div>


                {{-- CTA --}}
                <div class="flex flex-col justify-center">

                    <h3 class="text-xl font-bold">

                        Share your experience

                    </h3>

                    <p class="mt-3 text-base-content/70">

                        Your review helps other drivers choose the right part.

                    </p>

                    <button
                        onclick="review_modal.showModal()"
                        class="btn btn-primary mt-6">

                        Write Review

                    </button>

                </div>

            </div>


            {{-- Reviews --}}
            <div class="space-y-6 p-8">

                @foreach(range(1,3) as $review)

                    <div class="rounded-2xl border border-base-300 p-6 transition hover:border-primary hover:shadow-lg">

                        <div class="flex flex-col justify-between gap-6 md:flex-row">

                            <div class="flex gap-4">

                                <div class="avatar">

                                    <div class="w-14 rounded-full">

                                        <img
                                            src="https://ui-avatars.com/api/?name=John+Doe"
                                            alt="Avatar">

                                    </div>

                                </div>


                                <div>

                                    <div class="flex flex-wrap items-center gap-2">

                                        <h3 class="font-bold">

                                            John Doe

                                        </h3>

                                        <div class="badge badge-success badge-sm">

                                            Verified Purchase

                                        </div>

                                    </div>


                                    <div class="rating rating-sm mt-2">

                                        @for($i=1;$i<=5;$i++)

                                            <input
                                                type="radio"
                                                class="mask mask-star-2 bg-warning"
                                                checked>

                                        @endfor

                                    </div>

                                </div>

                            </div>


                            <div class="text-sm text-base-content/60">

                                July 28, 2026

                            </div>

                        </div>


                        <h4 class="mt-6 text-xl font-semibold">

                            Excellent quality!

                        </h4>

                        <p class="mt-3 leading-7 text-base-content/70">

                            Brake pads fit perfectly, installation was simple,
                            and braking performance improved immediately.
                            Fast shipping and great packaging.
                            Highly recommended.

                        </p>


                        <div class="mt-6 flex items-center gap-4">

                            <button class="btn btn-outline btn-sm">

                                👍 Helpful

                            </button>

                            <span class="text-sm text-base-content/60">

                            18 people found this helpful

                        </span>

                        </div>

                    </div>

                @endforeach

            </div>


            {{-- Footer --}}
            <div class="border-t border-base-300 p-8 text-center">

                <button class="btn btn-outline btn-primary">

                    Load More Reviews

                </button>

            </div>

        </div>


        {{-- ============================================================
             Write Review Modal
        ============================================================ --}}
        <dialog
            id="review_modal"
            class="modal">

            <div class="modal-box max-w-2xl">

                <h3 class="text-2xl font-bold">

                    Write a Review

                </h3>


                <form class="mt-8 space-y-6">

                    <div>

                        <label class="label">

                            Rating

                        </label>

                        <div class="rating rating-lg">

                            @for($i=1;$i<=5;$i++)

                                <input
                                    type="radio"
                                    name="rating"
                                    class="mask mask-star-2 bg-warning">

                            @endfor

                        </div>

                    </div>


                    <div>

                        <label class="label">

                            Title

                        </label>

                        <input
                            type="text"
                            class="input input-bordered w-full"
                            placeholder="Excellent quality">

                    </div>


                    <div>

                        <label class="label">

                            Your Review

                        </label>

                        <textarea
                            rows="6"
                            class="textarea textarea-bordered w-full"
                            placeholder="Tell other customers about your experience..."></textarea>

                    </div>


                    <div class="modal-action">

                        <form method="dialog">

                            <button class="btn">

                                Cancel

                            </button>

                        </form>

                        <button
                            type="submit"
                            class="btn btn-primary">

                            Submit Review

                        </button>

                    </div>

                </form>

            </div>

        </dialog>

    </section>

</x-layouts.app>
