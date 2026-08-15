<x-layouts.admin-layout>

    {{-- Page Header --}}
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
                    Edit
                </li>
            </ul>
        </div>

        <h1 class="text-2xl font-bold">
            Edit Category
        </h1>

        <p class="mt-1 text-sm text-base-content/60">
            Update the category information.
        </p>

    </div>


    {{-- Form --}}
    <form
        action="{{ route('admin.categories.update', $category) }}"
        method="POST"
        class="max-w-lg rounded-box border border-base-content/10 bg-base-200 p-6 shadow-sm"
    >

        @csrf
        @method('PUT')


        {{-- Category Name --}}
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
                value="{{ old('name', $category->name) }}"
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


        {{-- Buttons --}}
        <div class="mt-6 flex gap-2">

            <button
                type="submit"
                class="btn btn-primary"
            >
                Update Category
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
