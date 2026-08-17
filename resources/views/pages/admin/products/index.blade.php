<x-layouts.admin-layout>

    {{-- Page Header --}}
    <div class="mb-6">
        {{--Bread Crumbs--}}
        <div class="breadcrumbs mb-2 text-sm">
            <ul>
                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        Dashboard
                    </a>
                </li>

                <li>
                    Products
                </li>
            </ul>
        </div>

        <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            {{--Section Header --}}
            <div>
                <h1 class="text-2xl font-bold">
                    Products
                </h1>

                <p class="mt-1 text-sm text-base-content/60">
                    Manage the products in your store.
                </p>
            </div>
            {{--Add Product button--}}
            <a
                href="{{ route('admin.products.create') }}"
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

                Add Product
            </a>

        </div>

    </div>

    {{-- Products Table --}}
    <div class="rounded-box border border-base-content/10 bg-base-100 shadow-sm">

        {{-- Mobile horizontal scrolling --}}
        <div class="overflow-x-auto">

            <table class="table">

                {{-- Table Header --}}
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th class="text-right">Actions</th>
                </tr>
                </thead>


                {{-- Table Body --}}
                <tbody>

                @forelse ($products as $product)

                    <tr class="hover">

                        {{-- Product --}}
                        <td>

                            <div class="flex items-center gap-4">

                                {{-- Thumbnail --}}
                                <div class="shrink-0">

                                    @if ($product->primaryImage)

                                        <div class="avatar">
                                            <div class="size-14 rounded-lg">
                                                <img
                                                    src="{{ Storage::url($product->primaryImage->image_path) }}"
                                                    alt="{{ $product->name }}"
                                                >
                                            </div>
                                        </div>

                                    @else

                                        <div
                                            class="flex size-14 items-center justify-center rounded-lg bg-base-200 text-base-content/40"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="size-7"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="1.5"
                                                    d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.409 2.409M3.75 19.5h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-9.75h.008v.008H12v-.008Z"
                                                />
                                            </svg>
                                        </div>

                                    @endif

                                </div>


                                {{-- Name + Badges --}}
                                <div>

                                    <div class="font-semibold">
                                        {{ $product->name }}
                                    </div>

                                    <div class="mt-1 flex flex-wrap gap-1">

                                        @if ($product->sale_price)
                                            <span class="badge badge-error badge-sm">
                                                    SALE
                                                </span>
                                        @endif

                                        @if ($product->is_new_arrival)
                                            <span class="badge badge-success badge-sm">
                                                    NEW
                                                </span>
                                        @endif

                                    </div>

                                </div>

                            </div>

                        </td>


                        {{-- Category --}}
                        <td>

                                <span class="badge badge-ghost">
                                    {{ $product->category->name }}
                                </span>

                        </td>


                        {{-- Price --}}
                        <td>

                            @if ($product->sale_price)

                                <div class="font-semibold text-error">
                                    {{$product->formatted_sale_price}}
                                </div>

                                <div class="text-xs text-base-content/50 line-through">
                                    {{$product->formatted_price}}
                                </div>

                            @else

                                <span class="font-semibold">
                                    {{$product->formatted_price}}
                                    </span>

                            @endif

                        </td>


                        {{-- Stock --}}
                        <td>

                            @if ($product->stock > 0)

                                <div class="flex items-center gap-2">

                                        <span class="badge badge-success badge-sm">
                                            In Stock
                                        </span>

                                    <span class="text-sm text-base-content/70">
                                            {{ $product->stock }}
                                        </span>

                                </div>

                            @else

                                <span class="badge badge-error badge-sm">
                                        Out of Stock
                                    </span>

                            @endif

                        </td>


                        {{-- Actions --}}
                        <td>

                            <div class="flex justify-end gap-2">

                                {{-- Edit --}}
                                <a
                                    href="{{ route('admin.products.edit', $product) }}"
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
                                            stroke-width="2"
                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Z"
                                        />
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M19.5 7.125 16.875 4.5M18 14.25V19.5A2.25 2.25 0 0 1 15.75 21.75H5.25A2.25 2.25 0 0 1 3 19.5V9A2.25 2.25 0 0 1 5.25 6.75H10.5"
                                        />
                                    </svg>

                                    Edit
                                </a>


                                {{-- Delete --}}
                                <form
                                    action="{{ route('admin.products.destroy', $product) }}"
                                    method="POST"
                                    onsubmit="return confirm('Delete this product and all its images permanently?');"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-ghost btn-sm text-error hover:bg-error/10"
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
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0C7.91 2.613 7 3.597 7 4.777v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"
                                            />
                                        </svg>

                                        Delete
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>
                    {{--Empty State--}}
                @empty

                    {{-- Empty State --}}
                    <tr>
                        <td colspan="5">

                            <div class="flex flex-col items-center justify-center py-16 text-center">

                                <div class="mb-4 rounded-full bg-base-200 p-4">

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="size-10 text-base-content/40"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.5"
                                            d="m20.25 7.5-.625 10.25a2.25 2.25 0 0 1-2.245 2.113H6.62a2.25 2.25 0 0 1-2.245-2.113L3.75 7.5m16.5 0-2.06-3.183A2.25 2.25 0 0 0 16.31 3H7.69a2.25 2.25 0 0 0-1.88 1.317L3.75 7.5m16.5 0v.75A2.25 2.25 0 0 1 18 10.5H6a2.25 2.25 0 0 1-2.25-2.25V7.5m4.5 3v6m3-6v6m3-6v6"
                                        />
                                    </svg>

                                </div>

                                <h3 class="text-lg font-semibold">
                                    No products found
                                </h3>

                                <p class="mt-1 max-w-md text-sm text-base-content/60">
                                    Your store doesn't have any products yet.
                                    Add your first product to start building your catalog.
                                </p>

                            </div>

                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>


    {{-- Pagination --}}
    @if ($products->hasPages())
        <div class="mt-6">
            {{ $products->links() }}
        </div>
    @endif

</x-layouts.admin-layout>
