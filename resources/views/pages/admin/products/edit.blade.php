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
                href="{{ route('show.product', $product) }}"
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


    {{-- ========================================================= --}}
    {{-- Product Form --}}
    {{-- ========================================================= --}}

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
                            value="{{ old('sale_price', $product->sale_price) }}"
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
        {{-- Product Images --}}
        {{-- ========================================================= --}}

        <div
            x-data="{
        files: [],

        previewFiles(event) {

            this.files.forEach(file => {
                URL.revokeObjectURL(file.url)
            })

            this.files = Array.from(event.target.files).map(file => ({
                file: file,
                name: file.name,
                size: (file.size / 1024 / 1024).toFixed(2),
                url: URL.createObjectURL(file),
            }))
        },

        removeFile(index) {

            const file = this.files[index]

            if (!file) {
                return
            }

            // Release the preview URL
            URL.revokeObjectURL(file.url)

            // Remove the file from Alpine's preview list
            this.files.splice(index, 1)

            // Rebuild the actual file input so the removed
            // file is also removed from the submitted form.
            const dataTransfer = new DataTransfer()

            this.files.forEach(item => {
                dataTransfer.items.add(item.file)
            })

            this.$refs.images.files = dataTransfer.files
        },

        clearPreviews() {

            this.files.forEach(file => {
                URL.revokeObjectURL(file.url)
            })

            this.files = []

            this.$refs.images.value = ''
        }
    }"
            class="rounded-box border border-base-content/10 bg-base-100 p-6 shadow-sm"
        >

            {{-- Section Header --}}
            <div class="mb-6">

                <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">

                    <div>

                        <h2 class="text-lg font-semibold">
                            Product Images
                        </h2>

                        <p class="mt-1 text-sm text-base-content/60">
                            Manage existing product images or upload additional images.
                        </p>

                    </div>


                    {{-- Current Image Count --}}
                    <div class="badge badge-ghost gap-1.5 self-start px-3 py-3">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="size-3.5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.5"
                                d="M4.5 5.25h15A2.25 2.25 0 0 1 21.75 7.5v9A2.25 2.25 0 0 1 19.5 18.75h-15A2.25 2.25 0 0 1 2.25 16.5v-9A2.25 2.25 0 0 1 4.5 5.25Z"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.5"
                                d="m3.75 15 4.72-4.72a2.25 2.25 0 0 1 3.182 0l1.098 1.098 1.348-1.348a2.25 2.25 0 0 1 3.182 0L20.25 13.5"
                            />
                        </svg>

                        {{ $product->images->count() }}
                        {{ Str::plural('image', $product->images->count()) }}

                    </div>

                </div>

            </div>


            {{-- ===================================================== --}}
            {{-- Existing Images --}}
            {{-- ===================================================== --}}

            @if ($product->images->count())

                <div class="mb-8">

                    <div class="mb-5 flex items-center gap-3">

                        <div class="h-px flex-1 bg-base-content/10"></div>

                        <span class="text-xs font-bold uppercase tracking-widest text-base-content/40">
                    Current Images
                </span>

                        <div class="h-px flex-1 bg-base-content/10"></div>

                    </div>


                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">

                        @foreach($product->images as $image)

                            <div
                                class="
                            group relative overflow-hidden rounded-2xl
                            border bg-base-100
                            shadow-sm transition-all duration-300
                            hover:-translate-y-1 hover:shadow-xl

                            {{ $image->is_primary
                                ? 'border-primary/50 ring-2 ring-primary/20'
                                : 'border-base-content/10'
                            }}
                        "
                            >

                                {{-- Primary Badge --}}
                                @if($image->is_primary)

                                    <div class="absolute left-3 top-3 z-20">

                                        <div
                                            class="badge badge-primary gap-1.5 px-3 py-3 font-semibold shadow-lg"
                                        >

                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="size-3.5"
                                                fill="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    d="m12 2 2.94 5.95 6.56.95-4.75 4.63 1.12 6.53L12 16.98l-5.87 3.08 1.12-6.53L2.5 8.9l6.56-.95L12 2Z"
                                                />
                                            </svg>

                                            Primary

                                        </div>

                                    </div>

                                @endif


                                {{-- Image --}}
                                <div class="relative aspect-[4/3] overflow-hidden bg-base-300">

                                    <img
                                        src="{{ Storage::disk('public')->url($image->image_path) }}"
                                        alt="Product Image"
                                        class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                                    >


                                    {{-- Bottom Gradient --}}
                                    <div
                                        class="pointer-events-none absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-black/40 to-transparent opacity-0 transition duration-300 group-hover:opacity-100"
                                    ></div>

                                </div>


                                {{-- Image Actions --}}
                                <div
                                    class="flex min-h-16 items-center justify-between gap-3 border-t border-base-content/10 bg-base-100 p-3"
                                >

                                    @unless($image->is_primary)

                                        <button
                                            type="submit"
                                            form="primary-form"
                                            formaction="{{ route('admin.product-images.set-primary', $image->id) }}"
                                            class="btn btn-sm btn-outline btn-primary gap-2"
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
                                                    d="m12 3 2.78 5.63 6.22.9-4.5 4.38 1.06 6.2L12 17.18l-5.56 2.93 1.06-6.2L3 9.53l6.22-.9L12 3Z"
                                                />
                                            </svg>

                                            Set Primary

                                        </button>

                                    @else

                                        <div class="flex items-center gap-2 text-sm font-semibold text-primary">

                                    <span
                                        class="flex size-8 items-center justify-center rounded-full bg-primary/10"
                                    >

                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="size-4"
                                            fill="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                d="m12 2 2.94 5.95 6.56.95-4.75 4.63 1.12 6.53L12 16.98l-5.87 3.08 1.12-6.53L2.5 8.9l6.56-.95L12 2Z"
                                            />
                                        </svg>

                                    </span>

                                            <span>
                                        Primary
                                    </span>

                                        </div>

                                    @endunless


                                    {{-- Delete --}}
                                    <button
                                        type="submit"
                                        form="delete-form"
                                        formaction="{{ route('admin.product-images.destroy', $image->id) }}"
                                        class="btn btn-sm btn-ghost text-error hover:bg-error/10 hover:text-error"
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
                                                d="M6 7.5h12m-10.5 0v10.75A1.75 1.75 0 0 0 9.25 20h5.5a1.75 1.75 0 0 0 1.75-1.75V7.5M9.5 7.5V5.75A1.75 1.75 0 0 1 11.25 4h1.5a1.75 1.75 0 0 1 1.75 1.75V7.5"
                                            />
                                        </svg>

                                        Delete

                                    </button>

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>

            @else

                {{-- Empty State --}}
                <div
                    class="mb-8 rounded-2xl border border-dashed border-base-content/15 bg-base-200/50 p-8 text-center"
                >

                    <div
                        class="mx-auto mb-4 flex size-14 items-center justify-center rounded-2xl bg-base-100 shadow-sm"
                    >

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
                                d="M2.25 15.75 5.25 12.75a2.25 2.25 0 0 1 3.182 0l3.318 3.318m0 0 1.318-1.318a2.25 2.25 0 0 1 3.182 0l3.5 3.5M3.75 19.5h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Z"
                            />
                        </svg>

                    </div>

                    <p class="font-semibold">
                        No product images yet
                    </p>

                    <p class="mt-1 text-sm text-base-content/50">
                        Upload images below to add them to this product.
                    </p>

                </div>

            @endif


            {{-- ===================================================== --}}
            {{-- Upload New Images --}}
            {{-- ===================================================== --}}

            <div>

                <div class="mb-5 flex items-center gap-3">

                    <div class="h-px flex-1 bg-base-content/10"></div>

                    <span class="text-xs font-bold uppercase tracking-widest text-base-content/40">
                Add Images
            </span>

                    <div class="h-px flex-1 bg-base-content/10"></div>

                </div>


                {{-- Upload Area --}}
                <label
                    for="images"
                    class="
                group block cursor-pointer
                rounded-2xl border-2 border-dashed
                border-base-content/15
                bg-base-200/60
                p-8 text-center
                transition-all duration-300
                hover:border-primary/40
                hover:bg-base-200
            "
                >

                    <div
                        class="
                    mx-auto mb-4 flex size-16
                    items-center justify-center
                    rounded-2xl bg-base-100
                    shadow-sm
                    transition duration-300
                    group-hover:scale-105
                    group-hover:bg-primary/10
                "
                    >

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="size-8 text-base-content/50 transition group-hover:text-primary"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.5"
                                d="M2.25 15.75 5.25 12.75a2.25 2.25 0 0 1 3.182 0l3.318 3.318m0 0 1.318-1.318a2.25 2.25 0 0 1 3.182 0l1.318-1.318a2.25 2.25 0 0 1 3.182 0l3.5 3.5M3.75 19.5h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Z"
                            />
                        </svg>

                    </div>


                    <span class="block font-semibold">
                Upload Product Images
            </span>

                    <span class="mt-1 block text-sm text-base-content/60">
                Select one or more images to add to this product.
            </span>


                    <span class="btn btn-outline btn-sm mt-5">
                Choose Images
            </span>


                    {{-- SAME INPUT / FUNCTIONALITY --}}
                    <input
                        type="file"
                        name="images[]"
                        id="images"
                        x-ref="images"
                        multiple
                        accept="image/*"
                        class="sr-only"
                        @change="previewFiles($event)"
                    >


                    <p class="mt-4 text-xs text-base-content/50">
                        JPG, PNG, WEBP and other supported image formats.
                    </p>

                </label>


                {{-- Validation --}}
                @error('images')

                <p class="mt-3 text-sm text-error">
                    {{ $message }}
                </p>

                @enderror

                @error('images.*')

                <p class="mt-3 text-sm text-error">
                    {{ $message }}
                </p>

                @enderror


                {{-- ================================================= --}}
                {{-- Selected Image Preview --}}
                {{-- ================================================= --}}

                <div
                    x-show="files.length > 0"
                    x-cloak
                    x-transition
                    class="mt-6"
                >

                    {{-- Preview Header --}}
                    <div class="mb-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

                        <div>

                            <h3 class="font-semibold">
                                Selected Images
                            </h3>

                            <p class="mt-0.5 text-xs text-base-content/50">
                                Preview the images before updating the product.
                            </p>

                        </div>


                        <div class="flex items-center gap-2">

                            <div class="badge badge-primary gap-1 px-3 py-3">

                                <span x-text="files.length"></span>

                                <span x-show="files.length === 1">
                            image
                        </span>

                                <span x-show="files.length !== 1">
                            images
                        </span>

                            </div>


                            {{-- Clear All --}}
                            <button
                                type="button"
                                class="btn btn-ghost btn-xs text-error hover:bg-error/10"
                                @click="clearPreviews()"
                            >
                                Clear
                            </button>

                        </div>

                    </div>


                    {{-- Preview Grid --}}
                    <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-4">

                        <template
                            x-for="(file, index) in files"
                            :key="file.url"
                        >

                            <div
                                class="
                            group relative overflow-hidden rounded-2xl
                            border border-base-content/10
                            bg-base-100
                            shadow-sm
                            transition-all duration-300
                            hover:-translate-y-0.5
                            hover:shadow-lg
                        "
                            >

                                {{-- Preview Image --}}
                                <div class="relative aspect-square overflow-hidden bg-base-300">

                                    <img
                                        :src="file.url"
                                        :alt="file.name"
                                        class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                                    >


                                    {{-- Image Number --}}
                                    <div
                                        class="
                                    absolute left-2 top-2
                                    flex size-7 items-center
                                    justify-center
                                    rounded-full
                                    bg-base-100/90
                                    text-xs font-bold
                                    shadow backdrop-blur
                                "
                                        x-text="index + 1"
                                    ></div>


                                    {{-- New Badge --}}
                                    <div class="absolute right-2 top-2">

                                <span
                                    class="badge badge-sm bg-base-100/90 text-base-content shadow backdrop-blur"
                                >
                                    New
                                </span>

                                    </div>


                                    {{-- Remove Image --}}
                                    <button
                                        type="button"
                                        @click="removeFile(index)"
                                        class="
                                    absolute right-2 bottom-2
                                    flex size-8 items-center justify-center
                                    rounded-full
                                    bg-error text-error-content
                                    shadow-lg
                                    opacity-0
                                    transition-all duration-200
                                    hover:scale-110
                                    group-hover:opacity-100
                                "
                                        title="Remove image"
                                        aria-label="Remove image"
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
                                                d="M6 18 18 6M6 6l12 12"
                                            />
                                        </svg>

                                    </button>

                                </div>


                                {{-- File Information --}}
                                <div
                                    class="border-t border-base-content/10 bg-base-100 px-3 py-2.5"
                                >

                                    <p
                                        class="truncate text-xs font-medium"
                                        :title="file.name"
                                        x-text="file.name"
                                    ></p>

                                    <p class="mt-0.5 text-xs text-base-content/50">

                                        <span x-text="file.size"></span>
                                        MB

                                    </p>

                                </div>

                            </div>

                        </template>

                    </div>


                    {{-- Preview Notice --}}
                    <div
                        class="mt-4 flex items-start gap-2 rounded-xl bg-info/10 px-4 py-3 text-sm text-info"
                    >

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="mt-0.5 size-4 shrink-0"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.5"
                                d="M13 16h-1v-4h-1m1-4h.01M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Z"
                            />
                        </svg>

                        <span>
                    These previews are local only. The images will be uploaded when you click
                    <strong>Update Product</strong>.
                </span>

                    </div>

                </div>

            </div>

        </div>
        {{-- ========================================================= --}}
        {{-- Form Actions --}}
        {{-- ========================================================= --}}

        <div
            class="flex flex-col-reverse gap-2 border-t border-base-content/10 pt-6 sm:flex-row sm:items-center sm:justify-between"
        >

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


    {{-- ========================================================= --}}
    {{-- Existing Image Action Forms --}}
    {{-- ========================================================= --}}

    <form id="primary-form" method="POST" class="hidden">

        @csrf

        @method('PATCH')

    </form>


    <form id="delete-form" method="POST" class="hidden">

        @csrf

        @method('DELETE')

    </form>

</x-layouts.admin-layout>
