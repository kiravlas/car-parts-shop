<x-layouts.admin-layout>

    {{-- ========================================================= --}}
    {{-- PAGE HEADER                                                --}}
    {{-- ========================================================= --}}

    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div>

            <div class="flex items-center gap-2">

                <div
                    class="flex size-9 items-center justify-center rounded-xl bg-primary/10 text-primary"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="size-5"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path d="M3 6h18"/>
                        <path d="M3 12h18"/>
                        <path d="M3 18h18"/>
                    </svg>
                </div>

                <h1 class="text-2xl font-bold tracking-tight">
                    Categories
                </h1>

            </div>

        </div>


        {{-- Add Category --}}
        <a
            href="{{ route('admin.categories.create') }}"
            class="btn btn-primary shadow-sm"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="size-5"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
            >
                <path d="M12 5v14"/>
                <path d="M5 12h14"/>
            </svg>

            Add Category
        </a>

    </div>


    {{-- ========================================================= --}}
    {{-- CATEGORIES CARD                                           --}}
    {{-- ========================================================= --}}

    <div
        class="overflow-hidden rounded-2xl border border-base-content/10 bg-base-100 shadow-sm"
    >

        {{-- Card Header --}}
        <div
            class="flex flex-col gap-3 border-b border-base-content/10 bg-base-200/40 px-5 py-4 sm:flex-row sm:items-center sm:justify-between"
        >

            <div>

                <h2 class="font-semibold">
                    Product Categories
                </h2>

            </div>

            <div class="text-sm text-base-content/50">

                {{ $categories->total() }}

                {{ Str::plural('category', $categories->total()) }}

            </div>

        </div>


        {{-- ===================================================== --}}
        {{-- TABLE                                                  --}}
        {{-- ===================================================== --}}

        <div class="overflow-x-auto">

            <table class="table">

                <thead class="bg-base-200/60">

                <tr class="border-b border-base-content/10">

                    <th class="w-20 text-xs font-semibold uppercase tracking-wider text-base-content/50">
                        ID
                    </th>

                    <th class="text-xs font-semibold uppercase tracking-wider text-base-content/50">
                        Category
                    </th>

                    <th class="text-xs font-semibold uppercase tracking-wider text-base-content/50">
                        Slug
                    </th>

                    <th class="text-xs font-semibold uppercase tracking-wider text-base-content/50">
                        Products
                    </th>

                    <th class="text-xs font-semibold uppercase tracking-wider text-base-content/50">
                        Created
                    </th>

                    <th class="text-right text-xs font-semibold uppercase tracking-wider text-base-content/50">
                        Actions
                    </th>

                </tr>

                </thead>


                <tbody>

                @forelse($categories as $category)

                    @include(
                        'pages.admin.categories._category-row',
                        [
                            'category' => $category,
                            'level' => 0,
                        ]
                    )

                @empty

                    {{-- Empty State --}}
                    <tr>

                        <td colspan="6">

                            <div class="flex flex-col items-center justify-center px-6 py-20 text-center">

                                <div
                                    class="mb-5 flex size-16 items-center justify-center rounded-2xl bg-primary/10 text-primary"
                                >

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="size-8"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.7"
                                    >
                                        <path d="M20 20H4a2 2 0 0 1-2-2V6"/>
                                        <path d="M4 4h6l2 2h8a2 2 0 0 1 2 2v10"/>
                                    </svg>

                                </div>

                                <h3 class="text-lg font-semibold">
                                    No categories yet
                                </h3>

                                <p class="mt-1 max-w-sm text-sm text-base-content/50">
                                    Create your first category to start organizing your products.
                                </p>

                                <a
                                    href="{{ route('admin.categories.create') }}"
                                    class="btn btn-primary btn-sm mt-6"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="size-4"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                    >
                                        <path d="M12 5v14"/>
                                        <path d="M5 12h14"/>
                                    </svg>

                                    Add Category
                                </a>

                            </div>

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>


        {{-- ===================================================== --}}
        {{-- PAGINATION                                             --}}
        {{-- ===================================================== --}}

        @if($categories->hasPages())

            <div class="border-t border-base-content/10 bg-base-200/30 px-5 py-4">

                {{ $categories->links() }}

            </div>

        @endif

    </div>

</x-layouts.admin-layout>
