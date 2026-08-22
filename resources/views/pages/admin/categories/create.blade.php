<x-layouts.admin-layout>

    {{-- ========================================================= --}}
    {{-- PAGE HEADER                                                --}}
    {{-- ========================================================= --}}

    <div class="mb-6">

        <div class="breadcrumbs mb-2 text-sm">
            <ul>

                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        Dashboard
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.categories.index') }}">
                        Categories
                    </a>
                </li>

                <li>
                    Create
                </li>

            </ul>
        </div>


        <h1 class="text-2xl font-bold">
            Create Category
        </h1>

        <p class="mt-1 text-sm text-base-content/60">
            Add a new category or subcategory to your store.
        </p>

    </div>


    {{-- ========================================================= --}}
    {{-- FORM                                                       --}}
    {{-- ========================================================= --}}

    <form
        action="{{ route('admin.categories.store') }}"
        method="POST"
        class="max-w-lg rounded-box border border-base-content/10 bg-base-200 p-6 shadow-sm"
    >

        @csrf


        {{-- ===================================================== --}}
        {{-- CATEGORY NAME                                          --}}
        {{-- ===================================================== --}}

        <div class="form-control">

            <label
                for="name"
                class="label"
            >
                <span class="label-text font-semibold">
                    Category Name
                </span>
            </label>

            <input
                type="text"
                name="name"
                id="name"
                value="{{ old('name') }}"
                placeholder="e.g. Brake Systems"
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


        {{-- ===================================================== --}}
        {{-- PARENT CATEGORY                                        --}}
        {{-- ===================================================== --}}

        <div class="form-control mt-5">

            <label
                for="parent_id"
                class="label"
            >
                <span class="label-text font-semibold">
                    Parent Category
                </span>
            </label>


            <select
                name="parent_id"
                id="parent_id"
                class="select select-bordered w-full @error('parent_id') select-error @enderror"
            >

                {{-- Main category option --}}
                <option value="">
                    None — Main Category
                </option>


                {{-- Existing categories --}}
                @foreach($categories as $category)

                    <option
                        value="{{ $category->id }}"
                        @selected(old('parent_id') == $category->id)
                    >
                        {{ $category->name }}
                    </option>

                @endforeach

            </select>


            <label class="label">

                <span class="label-text-alt text-base-content/50">
                    Leave this empty to create a main category.
                </span>

            </label>


            @error('parent_id')

            <label class="label pt-0">

                    <span class="label-text-alt text-error">
                        {{ $message }}
                    </span>

            </label>

            @enderror

        </div>


        {{-- ===================================================== --}}
        {{-- EXPLANATION                                            --}}
        {{-- ===================================================== --}}

        <div class="alert mt-5 bg-base-100">

            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="size-5 shrink-0 text-primary"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M13 16h-1v-4h-1m1-8h.01M12 20a8 8 0 1 0 0-16 8 8 0 0 0 0 16z"
                />
            </svg>

            <div class="text-sm">

                <p class="font-semibold">
                    How categories work
                </p>

                <p class="mt-1 text-base-content/60">
                    Leave the parent empty for a main category.
                    Select a category to create a subcategory under it.
                </p>

            </div>

        </div>


        {{-- ===================================================== --}}
        {{-- BUTTONS                                                 --}}
        {{-- ===================================================== --}}

        <div class="mt-6 flex gap-2">

            <button
                type="submit"
                class="btn btn-primary"
            >
                Save Category
            </button>


            <a
                href="{{ route('admin.categories.index') }}"
                class="btn btn-ghost"
            >
                Cancel
            </a>

        </div>

    </form>

</x-layouts.admin-layout>
