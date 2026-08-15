<x-layouts.admin-layout>
    {{-- Page Header --}}
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div>
            <h1 class="text-2xl font-bold">
                Categories
            </h1>

            <p class="mt-1 text-sm text-base-content/60">
                Manage the categories used to organize your products.
            </p>

            
        </div>

        <a
            href="{{ route('admin.categories.create') }}"
            class="btn btn-primary"
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


    {{-- Categories Card --}}
    <div class="rounded-box border border-base-content/10 bg-base-200">


        {{-- Table --}}
        <div class="overflow-x-auto">

            <table class="table">

                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Products</th>
                    <th>Created</th>
                    <th class="text-right">Actions</th>
                </tr>
                </thead>


                <tbody>

                @forelse($categories as $category)

                    <tr class="hover">

                        {{-- ID --}}
                        <td class="text-base-content/50">
                            #{{ $category->id }}
                        </td>


                        {{-- Name --}}
                        <td>

                            <div class="flex items-center gap-3">

                                <span class="font-medium">
                                    {{ $category->name }}
                                </span>

                            </div>

                        </td>


                        {{-- Slug --}}
                        <td>
                            <code class="rounded bg-base-300 px-2 py-1 text-sm">
                                {{ $category->slug }}
                            </code>
                        </td>


                        {{-- Products --}}
                        <td>

                            <span class="badge badge-ghost">
                                {{ $category->products_count }}
                                {{ Str::plural('product', $category->products_count) }}
                            </span>

                        </td>


                        {{-- Created --}}
                        <td class="text-sm text-base-content/60">
                            {{ $category->created_at->format('M d, Y') }}
                        </td>


                        {{-- Actions --}}
                        <td>

                            <div class="flex justify-end gap-1">

                                {{-- Edit --}}
                                <a
                                    href="{{ route('admin.categories.edit', $category) }}"
                                    class="btn btn-sm btn-ghost"
                                    title="Edit category"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="size-4"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                    >
                                        <path d="M12 20h9"/>
                                        <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"/>
                                    </svg>

                                    <span class="hidden sm:inline">
                                        Edit
                                    </span>
                                </a>


                                {{-- Delete --}}
                                <form
                                    action="{{ route('admin.categories.destroy', $category) }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this category?')"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-ghost text-error"
                                        title="Delete category"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="size-4"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                        >
                                            <path d="M3 6h18"/>
                                            <path d="M8 6V4h8v2"/>
                                            <path d="M19 6v14H5V6"/>
                                            <path d="M10 11v5"/>
                                            <path d="M14 11v5"/>
                                        </svg>

                                        <span class="hidden sm:inline">
                                            Delete
                                        </span>
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="6">

                            <div class="flex flex-col items-center justify-center py-16 text-center">

                                <div
                                    class="mb-4 flex size-14 items-center justify-center rounded-full bg-primary/10 text-primary">

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="size-7"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                    >
                                        <path d="M20 20H4a2 2 0 0 1-2-2V6"/>
                                        <path d="M4 4h6l2 2h8a2 2 0 0 1 2 2v10"/>
                                    </svg>

                                </div>

                                <h3 class="font-semibold">
                                    No categories yet
                                </h3>

                                <p class="mt-1 text-sm text-base-content/60">
                                    Create your first category to organize your products.
                                </p>

                                <a
                                    href="{{ route('admin.categories.create') }}"
                                    class="btn btn-primary btn-sm mt-5"
                                >
                                    Add Category
                                </a>

                            </div>

                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

    {{ $categories->links() }}
</x-layouts.admin-layout>
