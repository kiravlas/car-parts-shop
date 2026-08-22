@props([
    'product',
    'badge' => null,

])

<div class="card bg-base-200 shadow-xl h-full">

    <figure class="h-52">

        {{-- Wishlist --}}
        <button
            type="button"
            class="btn btn-circle btn-xs absolute top-3 right-3 border-0 bg-base-100/90 hover:bg-base-100"
        >
            <i
                data-lucide="heart-plus"
                class="size-4 text-red-500"
            ></i>
        </button>

        <img
            src="{{Storage::url($product->primaryImage->image_path)}}"
            alt="{{$product->name}}"
            class="h-full w-full object-cover">
    </figure>


    <div class="card-body">

                                    <span class="badge {{$badge['color']}} w-fit">
                                        {{ $badge['text'] }}
                                    </span>

        <h2 class="card-title mt-2">
            {{$product->name}}
        </h2>


        <div class="mt-auto flex items-center justify-between pt-4">


            @if($product->sale_price)
                <div class="flex items-center gap-1.5">
                    <span class="text-xl font-bold text-primary">
                    {{ config('shop.currency_symbol') }}{{ $product->sale_price }}
                </span>

                    <span class="text-xs line-through opacity-50">
                    {{ config('shop.currency_symbol') }}{{ $product->price }}
                </span>
                </div>

            @else
                <span class="text-xl font-bold text-primary">
                                            {{ config('shop.currency_symbol') }}{{ $product->price }}
                                        </span>
            @endif


            <a href="{{ route('product.show', $product->slug) }}" class="btn btn-primary">
                View
            </a>

        </div>

    </div>

</div>
