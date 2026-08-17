@php use Illuminate\Support\Facades\Storage; @endphp
<x-layouts.admin-layout>

    {{-- Page Header --}}
    <div class="mb-6">

        {{-- Breadcrumbs --}}
        <div class="breadcrumbs mb-2 text-sm">
            <ul>
                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        Dashboard
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.products.index') }}">
                        Products
                    </a>
                </li>

                <li>
                    Edit
                </li>
            </ul>
        </div>

        <div class="flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold">
                    Edit Product
                </h1>

                <p class="mt-1 text-sm text-base-content/60">
                    Update product information, pricing, inventory, and images.
                </p>
            </div>

            {{-- View Store --}}
            <a
                href="#"
                target="_blank"
                class="btn btn-ghost btn-sm"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="size-4"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.5"
                        d="M2.25 12s3.75-6.75 9.75-6.75S21.75 12 21.75 12s-3.75 6.75-9.75 6.75S2.25 12 2.25 12Z"
                    />

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.5"
                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                    />
                </svg>

                View Product
            </a>
        </div>

    </div>


    {{-- Form --}}
    <form
        action="{{ route('admin.products.update', $product) }}"
        method="POST"
        enctype="multipart/form-data"
        class="max-w-5xl space-y-6"
    >

        @csrf
        @method('PUT')


        {{-- ========================================================= --}}
        {{-- Basic Information --}}
        {{-- ========================================================= --}}

        <div class="rounded-box border border-base-content/10 bg-base-100 p-6 shadow-sm">

            <div class="mb-6">
                <h2 class="text-lg font-semibold">
                    Basic Information
                </h2>

                <p class="mt-1 text-sm text-base-content/60">
                    Update the basic information about this product.
                </p>
            </div>


            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                {{-- Product Name --}}
                <div class="form-control">

                    <label for="name" class="label">
                        <span class="label-text font-semibold">
                            Product Name
                            <span class="text-error">*</span>
                        </span>
                    </label>

                    <input
                        type="text"
                        name="name"
                        id="name"
                        value="{{ old('name', $product->name) }}"
                        placeholder="e.g. Front Brake Disc"
                        class="input input-bordered w-full @error('name') input-error @enderror"
                        required
                        autofocus
                    >

                    @error('name')
                    <label class="label">
                            <span class="label-text-alt text-error">
                                {{ $message }}
                            </span>
                    </label>
                    @enderror

                </div>


                {{-- Category --}}
                <div class="form-control">

                    <label for="category_id" class="label">
                        <span class="label-text font-semibold">
                            Category
                            <span class="text-error">*</span>
                        </span>
                    </label>

                    <select
                        name="category_id"
                        id="category_id"
                        class="select select-bordered w-full @error('category_id') select-error @enderror"
                        required
                    >

                        <option value="">
                            Select a category
                        </option>

                        @foreach ($categories as $category)

                            <option
                                value="{{ $category->id }}"
                                @selected(old('category_id', $product->category_id) == $category->id)
                            >
                                {{ $category->name }}
                            </option>

                        @endforeach

                    </select>

                    @error('category_id')
                    <label class="label">
                            <span class="label-text-alt text-error">
                                {{ $message }}
                            </span>
                    </label>
                    @enderror

                </div>

            </div>


            {{-- Description --}}
            <div class="form-control mt-6">

                <label for="description" class="label">
                    <span class="label-text font-semibold">
                        Description
                    </span>
                </label>

                <textarea
                    name="description"
                    id="description"
                    rows="5"
                    placeholder="Describe the product, its features, compatibility, and other useful information..."
                    class="textarea textarea-bordered w-full @error('description') textarea-error @enderror"
                >{{ old('description', $product->description) }}</textarea>

                @error('description')
                <label class="label">
                        <span class="label-text-alt text-error">
                            {{ $message }}
                        </span>
                </label>
                @enderror

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- Pricing & Inventory --}}
        {{-- ========================================================= --}}

        <div class="rounded-box border border-base-content/10 bg-base-100 p-6 shadow-sm">

            <div class="mb-6">
                <h2 class="text-lg font-semibold">
                    Pricing & Inventory
                </h2>

                <p class="mt-1 text-sm text-base-content/60">
                    Manage the product price and available inventory.
                </p>
            </div>


            <div class="grid grid-cols-1 gap-6 md:grid-cols-3">

                {{-- Price --}}
                <div class="form-control">

                    <label for="price" class="label">
                        <span class="label-text font-semibold">
                            Price ($)
                            <span class="text-error">*</span>
                        </span>
                    </label>

                    <label
                        class="input input-bordered flex items-center gap-2 @error('price') input-error @enderror"
                    >

                        <span class="text-base-content/50">
                            $
                        </span>

                        <input
                            type="number"
                            name="price"
                            id="price"
                            step="0.01"
                            min="0"
                            value="{{ old('price', $product->price) }}"
                            placeholder="29.99"
                            class="grow"
                            required
                        >

                    </label>

                    @error('price')
                    <label class="label">
                            <span class="label-text-alt text-error">
                                {{ $message }}
                            </span>
                    </label>
                    @enderror

                </div>


                {{-- Sale Price --}}
                <div class="form-control">

                    <label for="sale_price" class="label">
                        <span class="label-text font-semibold">
                            Sale Price ($)
                        </span>
                    </label>

                    <label
                        class="input input-bordered flex items-center gap-2 @error('sale_price') input-error @enderror"
                    >

                        <span class="text-base-content/50">
                            $
                        </span>

                        <input
                            type="number"
                            name="sale_price"
                            id="sale_price"
                            step="0.01"
                            min="0"
                            value="{{ old(
                                'sale_price',
                                $product->sale_price
                            ) }}"
                            placeholder="Leave blank"
                            class="grow"
                        >

                    </label>

                    @error('sale_price')
                    <label class="label">
                            <span class="label-text-alt text-error">
                                {{ $message }}
                            </span>
                    </label>
                    @enderror

                </div>


                {{-- Stock --}}
                <div class="form-control">

                    <label for="stock" class="label">
                        <span class="label-text font-semibold">
                            Stock Quantity
                            <span class="text-error">*</span>
                        </span>
                    </label>

                    <input
                        type="number"
                        name="stock"
                        id="stock"
                        min="0"
                        value="{{ old('stock', $product->stock) }}"
                        placeholder="0"
                        class="input input-bordered w-full @error('stock') input-error @enderror"
                        required
                    >

                    @error('stock')
                    <label class="label">
                            <span class="label-text-alt text-error">
                                {{ $message }}
                            </span>
                    </label>
                    @enderror

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- Storefront Settings --}}
        {{-- ========================================================= --}}

        <div class="rounded-box border border-base-content/10 bg-base-100 p-6 shadow-sm">

            <div class="mb-6">
                <h2 class="text-lg font-semibold">
                    Storefront Settings
                </h2>

                <p class="mt-1 text-sm text-base-content/60">
                    Control how this product is highlighted in your store.
                </p>
            </div>


            {{-- New Arrival --}}
            <label
                for="is_new_arrival"
                class="flex cursor-pointer items-start gap-4 rounded-lg border border-base-content/10 bg-base-200 p-4 transition hover:border-primary/30"
            >

                <input
                    type="checkbox"
                    name="is_new_arrival"
                    id="is_new_arrival"
                    value="1"
                    class="checkbox checkbox-primary mt-0.5"
                    @checked(old('is_new_arrival', $product->is_new_arrival))
                >

                <span>

                    <span class="block font-semibold">
                        Mark as New Arrival
                    </span>

                    <span class="mt-1 block text-sm text-base-content/60">
                        Display this product in the New Arrivals section of the storefront.
                    </span>

                </span>

            </label>

        </div>


        {{-- ========================================================= --}}
        {{-- Existing Product Images --}}
        {{-- ========================================================= --}}

        <div class="rounded-box border border-base-content/10 bg-base-100 p-6 shadow-sm">

            <div class="mb-6">
                <div class="flex items-start justify-between gap-4">

                    <div>
                        <h2 class="text-lg font-semibold">
                            Product Images
                        </h2>

                        <p class="mt-1 text-sm text-base-content/60">
                            Manage the images currently associated with this product.
                        </p>
                    </div>

                    <div class="badge badge-ghost">
                        {{ $product->images->count() }}
                        {{ Str::plural('image', $product->images->count()) }}
                    </div>

                </div>
            </div>


            {{-- Existing Images --}}
            @if ($product->images->isNotEmpty())

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">

                    @foreach ($product->images as $image)

                        <div
                            class="group relative overflow-hidden rounded-xl border border-base-content/10 bg-base-200">

                            {{-- Image --}}
                            <div class="aspect-square overflow-hidden bg-base-300">

                                <img
                                    src="{{ Storage::disk('public')->url($image->image_path) }}"
                                    alt="{{ $product->name }}"
                                    class="h-full w-full object-cover transition duration-300 group-hover:scale-105"
                                >

                            </div>


                            {{-- Primary Badge --}}
                            @if ($image->is_primary)
                                <div class="absolute left-3 top-3">
        <span class="badge badge-primary gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-3.5" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m12 3 2.09 6.26L21 10.5l-5 4.5 1.5 6.5-5.5-3.25L6.5 21.5 8 15l-5-4.5 6.91-1.24L12 3Z"/>
            </svg>
            Primary
        </span>
                                </div>
                            @endif


                            {{-- Delete Button --}}
                            <div class="absolute right-3 top-3">

                                <button
                                    type="button"
                                    class="btn btn-error btn-sm btn-square shadow-lg"
                                    title="Delete image"
                                    onclick="deleteImageModal{{ $image->id }}.showModal()"
                                >

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="size-4"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M6 7h12m-10 0v12h8V7M9 7V4h6v3m-7 4v5m4-5v5"
                                        />
                                    </svg>

                                </button>

                            </div>


                            {{-- Image Footer --}}
                            <div class="flex items-center justify-between border-t border-base-content/10 px-3 py-2">

                                <span class="truncate text-xs text-base-content/50">
                                    Image {{ $loop->iteration }}
                                </span>

                                @if ($image->is_primary)
                                    <span class="text-xs font-medium text-primary">
                                        Main image
                                    </span>
                                @endif

                            </div>

                        </div>


                        {{-- Delete Confirmation Modal --}}
                        <dialog
                            id="deleteImageModal{{ $image->id }}"
                            class="modal"
                        >

                            <div class="modal-box">

                                <h3 class="text-lg font-bold">
                                    Delete Image?
                                </h3>

                                <p class="py-4 text-sm text-base-content/70">
                                    Are you sure you want to delete this image?
                                    This action cannot be undone.
                                </p>

                                <div class="modal-action">

                                    <form method="dialog">
                                        <button class="btn btn-ghost">
                                            Cancel
                                        </button>
                                    </form>

                                    {{-- UI only: connect this action to your image-delete route --}}
                                    <button
                                        type="button"
                                        class="btn btn-error"
                                    >
                                        Delete Image
                                    </button>

                                </div>

                            </div>

                            <form method="dialog" class="modal-backdrop">
                                <button>
                                    close
                                </button>
                            </form>

                        </dialog>

                    @endforeach

                </div>

            @else

                {{-- No Images --}}
                <div class="rounded-box border-2 border-dashed border-base-content/10 bg-base-200 p-8 text-center">

                    <div class="mx-auto mb-4 flex size-14 items-center justify-center rounded-full bg-base-100">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="size-7 text-base-content/40"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.5"
                                d="m2.25 15.75 3.318-3.318a2.25 2.25 0 0 1 3.182 0L12 15.682m0 0 1.318-1.318a2.25 2.25 0 0 1 3.182 0L20.25 18m-16.5 1.5h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Z"
                            />
                        </svg>

                    </div>

                    <p class="font-semibold">
                        No product images
                    </p>

                    <p class="mt-1 text-sm text-base-content/60">
                        Upload some images using the section below.
                    </p>

                </div>

            @endif

        </div>


        {{-- ========================================================= --}}
        {{-- Upload New Images --}}
        {{-- ========================================================= --}}

        <div class="rounded-box border border-base-content/10 bg-base-100 p-6 shadow-sm">

            <div class="mb-6">

                <h2 class="text-lg font-semibold">
                    Upload New Images
                </h2>

                <p class="mt-1 text-sm text-base-content/60">
                    Add additional images to this product.
                </p>

            </div>


            <div
                class="rounded-box border-2 border-dashed border-base-content/20 bg-base-200 p-8 text-center transition hover:border-primary/50"
            >

                <div class="mx-auto mb-4 flex size-14 items-center justify-center rounded-full bg-base-100">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="size-7 text-base-content/50"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.5"
                            d="M12 16.5V7.5m0 0-3.75 3.75M12 7.5l3.75 3.75M6.75 19.5h10.5a3 3 0 0 0 3-3v-1.5a3 3 0 0 0-3-3h-.75m-9.75 0H6a3 3 0 0 0-3 3v1.5a3 3 0 0 0 3 3Z"
                        />
                    </svg>

                </div>


                <label
                    for="images"
                    class="block cursor-pointer"
                >

                    <span class="block font-semibold">
                        Upload Product Images
                    </span>

                    <span class="mt-1 block text-sm text-base-content/60">
                        Select one or more new images.
                    </span>

                </label>


                <input
                    type="file"
                    name="images[]"
                    id="images"
                    multiple
                    accept="image/*"
                    class="file-input file-input-bordered mt-4 w-full max-w-md"
                >


                <p class="mt-3 text-xs text-base-content/50">
                    Existing images will remain unchanged unless you delete them.
                </p>


                @error('images')
                <p class="mt-2 text-sm text-error">
                    {{ $message }}
                </p>
                @enderror

                @error('images.*')
                <p class="mt-2 text-sm text-error">
                    {{ $message }}
                </p>
                @enderror

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- Form Actions --}}
        {{-- ========================================================= --}}

        <div
            class="flex flex-col-reverse gap-2 border-t border-base-content/10 pt-6 sm:flex-row sm:items-center sm:justify-between">
            <a
                href="{{ route('admin.products.index') }}"
                class="btn btn-ghost"
            >
                Cancel
            </a>


            <div class="flex flex-col gap-2 sm:flex-row">


                <button
                    type="submit"
                    class="btn btn-primary"
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="size-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M5 13l4 4L19 7"
                        />
                    </svg>

                    Update Product

                </button>

            </div>

        </div>

    </form>

</x-layouts.admin-layout>
