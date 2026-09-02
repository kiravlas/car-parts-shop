@php use Illuminate\Support\Facades\Storage; @endphp
<x-layouts.app>
    <div class="min-h-screen bg-base-300 py-10">

        <div class="mx-auto max-w-7xl px-4">

            {{-- ========================================================= --}}
            {{-- BREADCRUMBS                                               --}}
            {{-- ========================================================= --}}

            <div class="breadcrumbs mb-6 text-sm text-base-content/60">

                <ul>

                    <li>
                        <a
                            href="{{ route('home.index') }}"
                            class="transition-colors hover:text-primary"
                        >
                            Home
                        </a>
                    </li>

                    <li>
                        <a href="{{route('categories.index')}}"
                           class="transition-colors hover:text-primary"
                        >
                            Categories
                        </a>
                    </li>

                    <li class="transition-colors hover:text-primary">
                        <a href="{{route('products.index')}}">Products</a>
                    </li>

                    <li class="text-base-content">
                        {{$product->name}}
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


                                    @foreach($product->images as $image)

                                        <div class="hs-carousel-slide">

                                            <div
                                                class="flex h-full items-center justify-center p-8">

                                                <img
                                                    src="{{Storage::url($image->image_path)}}"
                                                    class="max-h-full object-contain"
                                                    alt="{{ $product->name }}">

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


                                    @foreach($product->images as $image)

                                        <div
                                            class="
                                        hs-carousel-pagination-item
                                        shrink-0
                                        size-20
                                        rounded-xl
                                        overflow-hidden
                                        border-3
                                        border-base-300
                                        cursor-pointer
                                        hs-carousel-active:border-primary
                                        ">


                                            <img
                                                src="{{Storage::url($image->image_path)}}"
                                                class="h-full w-full object-cover" alt="{{ $product->name }}">


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

                                {{$product->name}}

                            </h1>

                            <div class="divider"></div>


                            {{-- Price --}}
                            <div class="flex items-center gap-2">

                                @if($product->sale_price)
                                    <span class="text-4xl font-bold text-primary">
                                                {{ config('shop.currency_symbol') }}{{ number_format($product->sale_price, 2) }}
                                            </span>

                                    <span class="text-lg text-base-content/40 line-through">
                                                {{ config('shop.currency_symbol') }}{{ number_format($product->price, 2) }}
                                            </span>
                                @else

                                    <span class="text-4xl font-bold text-primary">

                                 {{config('shop.currency_symbol')}}{{number_format($product->price, 2)}}

                            </span>
                                @endif


                            </div>


                            {{-- Stock --}}
                            <div class="mt-4">

                                @if($product->stock > 0)
                                    <span class="badge badge-success">In Stock</span>
                                @else
                                    <span class="badge badge-error">Out Of Stock</span>
                                @endif

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
                                    class="btn btn-primary btn-lg"
                                    {{ $product->stock === 0 ? 'disabled' : '' }}
                                >

                                    Add To Cart

                                </button>


                                <button
                                    class="btn btn-outline btn-lg ">

                                    ♡ Add To Wishlist

                                </button>


                            </div>


                        </div>


                    </div>


                </div>


            </div>


        </div>


    </div>


</x-layouts.app>
