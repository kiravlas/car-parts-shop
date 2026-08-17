<x-layouts.admin-layout>

    {{-- Page Header --}}
    <div class="mb-6">
        {{--Breadcrumbs--}}
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
                    Create
                </li>
            </ul>
        </div>

        <h1 class="text-2xl font-bold">
            Create New Product
        </h1>

    </div>


    {{-- Form --}}
    <form
        action="{{ route('admin.products.store') }}"
        method="POST"
        enctype="multipart/form-data"
        class="max-w-5xl space-y-6"
    >

        @csrf


        {{-- Basic Information --}}
        <div class="rounded-box border border-base-content/10 bg-base-100 p-6 shadow-sm">

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
                        value="{{ old('name') }}"
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
                                @selected(old('category_id') == $category->id)
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
                >{{ old('description') }}</textarea>

                @error('description')
                <label class="label">
                        <span class="label-text-alt text-error">
                            {{ $message }}
                        </span>
                </label>
                @enderror

            </div>

        </div>


        {{-- Pricing & Inventory --}}
        <div class="rounded-box border border-base-content/10 bg-base-100 p-6 shadow-sm">

            <div class="mb-6">
                <h2 class="text-lg font-semibold">
                    Pricing & Inventory
                </h2>

                <p class="mt-1 text-sm text-base-content/60">
                    Set the product price and available inventory.
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
                            value="{{ old('price') }}"
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
                            value="{{ old('sale_price') }}"
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
                        value="{{ old('stock', 0) }}"
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


        {{-- Storefront Settings --}}
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
                    @checked(old('is_new_arrival', false))
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


        {{-- Product Images --}}
        <div class="rounded-box border border-base-content/10 bg-base-100 p-6 shadow-sm">

            <div class="mb-6">
                <h2 class="text-lg font-semibold">
                    Product Images
                </h2>

                <p class="mt-1 text-sm text-base-content/60">
                    Upload one or more images for this product.
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
                            d="M2.25 15.75 5.25 12.75a2.25 2.25 0 0 1 3.182 0l3.318 3.318m0 0 1.318-1.318a2.25 2.25 0 0 1 3.182 0l3.5 3.5M3.75 19.5h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm13.5-11.25h.008v.008h-.008V8.25Z"
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
                        Select multiple images if needed.
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
                    The first selected image will automatically be used as the primary thumbnail.
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


        {{-- Form Actions --}}
        <div class="flex flex-col-reverse gap-2 border-t border-base-content/10 pt-6 sm:flex-row sm:justify-end">

            <a
                href="{{ route('admin.products.index') }}"
                class="btn btn-ghost"
            >
                Cancel
            </a>

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
                        d="M12 4v16m8-8H4"
                    />
                </svg>

                Save Product
            </button>

        </div>

    </form>

</x-layouts.admin-layout>
