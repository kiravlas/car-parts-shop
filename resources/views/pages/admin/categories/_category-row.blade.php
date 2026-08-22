@php
    $isMain = $level === 0;
@endphp


{{-- CATEGORY ROW--}}

<tr
    class="
        border-b border-base-content/5
        transition-colors

        {{ $isMain
            ? 'bg-primary/[0.035] hover:bg-primary/[0.07]'
            : 'hover:bg-base-200/50'
        }}
    "
>

    {{-- ID--}}

    <td>

        <span
            class="
                font-mono text-xs
                {{ $isMain
                    ? 'font-medium text-base-content/40'
                    : 'text-base-content/25'
                }}
            "
        >
            #{{ $category->id }}
        </span>

    </td>


    {{-- CATEGORY--}}

    <td>

        <div
            class="flex items-center gap-3"
            style="padding-left: {{ $level * 1.5 }}rem;"
        >

            {{-- Tree connector --}}
            @if($level > 0)

                <div class="shrink-0 text-base-content/20">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="size-5"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.5"
                    >
                        <path d="M5 5v10a4 4 0 0 0 4 4h10"/>
                    </svg>

                </div>

            @endif


            {{-- Folder --}}
            <div
                class="
                    flex shrink-0 items-center justify-center rounded-lg
                    {{ $isMain
                        ? 'size-9 bg-primary/10 text-primary'
                        : 'size-8 bg-base-200 text-base-content/50'
                    }}
                "
            >

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="{{ $isMain ? 'size-4.5' : 'size-4' }}"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path d="M20 20H4a2 2 0 0 1-2-2V6"/>
                    <path d="M4 4h6l2 2h8a2 2 0 0 1 2 2v10"/>
                </svg>

            </div>


            {{-- Name --}}
            <div class="min-w-0">

                <div class="flex items-center gap-2">

                    <span
                        class="
                            truncate
                            {{ $isMain
                                ? 'font-semibold text-base-content'
                                : 'font-medium text-base-content/80'
                            }}
                        "
                    >
                        {{ $category->name }}
                    </span>


                    @if($isMain)

                        <span class="badge badge-primary badge-xs">
                            Main
                        </span>

                    @else

                        <span class="badge badge-ghost badge-xs">
                            Subcategory
                        </span>

                    @endif

                </div>


                @if($isMain)

                    <div class="mt-0.5 text-xs text-base-content/40">
                        Parent category
                    </div>

                @endif

            </div>

        </div>

    </td>


    {{-- SLUG--}}

    <td>

        <code class="rounded-md bg-base-200 px-2 py-1 font-mono text-xs text-base-content/50">
            {{ $category->slug }}
        </code>

    </td>


    {{-- PRODUCTS--}}

    <td>

        <span
            class="
                badge badge-sm gap-1
                {{ $isMain
                    ? 'badge-primary'
                    : 'badge-ghost'
                }}
            "
        >

            {{ $category->total_products_count ?? 0 }}

            {{ Str::plural(
                'product',
                $category->total_products_count ?? 0
            ) }}

        </span>

    </td>


    {{-- CREATED--}}

    <td class="whitespace-nowrap">

        <span
            class="
                text-sm
                {{ $isMain
                    ? 'text-base-content/50'
                    : 'text-base-content/40'
                }}
            "
        >
            {{ $category->created_at->format('M d, Y') }}
        </span>

    </td>


    {{-- ACTIONS--}}

    <td>

        <div class="flex justify-end gap-1">

            {{-- Edit --}}
            <a
                href="{{ route('admin.categories.edit', $category) }}"
                class="btn btn-sm btn-ghost hover:bg-primary/10 hover:text-primary"
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
                    <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1-1-4Z"/>
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
                    class="btn btn-sm btn-ghost text-error hover:bg-error/10"
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


{{-- CHILDREN--}}

@foreach($category->descendants as $child)

    @include(
        'pages.admin.categories._category-row',
        [
            'category' => $child,
            'level' => $level + 1,
        ]
    )

@endforeach
