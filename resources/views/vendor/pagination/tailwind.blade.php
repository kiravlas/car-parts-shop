@if ($paginator->hasPages())

    <nav
        role="navigation"
        aria-label="{{ __('Pagination Navigation') }}"
        class="flex flex-col items-center justify-between gap-4 sm:flex-row"
    >

        {{-- Results information --}}
        <p class="text-sm text-base-content/60">
            {!! __('Showing') !!}

            @if ($paginator->firstItem())

                <span class="font-medium text-base-content">
                    {{ $paginator->firstItem() }}
                </span>

                {!! __('to') !!}

                <span class="font-medium text-base-content">
                    {{ $paginator->lastItem() }}
                </span>

            @else

                <span class="font-medium text-base-content">
                    {{ $paginator->count() }}
                </span>

            @endif

            {!! __('of') !!}

            <span class="font-medium text-base-content">
                {{ $paginator->total() }}
            </span>

            {!! __('results') !!}
        </p>


        {{-- Pagination --}}
        <div class="join">

            {{-- Previous --}}
            @if ($paginator->onFirstPage())

                <span
                    class="join-item btn btn-sm btn-disabled"
                    aria-disabled="true"
                    aria-label="{{ __('pagination.previous') }}"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="size-4"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path d="m15 18-6-6 6-6"/>
                    </svg>
                </span>

            @else

                <a
                    href="{{ $paginator->previousPageUrl() }}"
                    rel="prev"
                    class="join-item btn btn-sm btn-ghost"
                    aria-label="{{ __('pagination.previous') }}"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="size-4"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path d="m15 18-6-6 6-6"/>
                    </svg>
                </a>

            @endif


            {{-- Pagination Elements --}}
            @foreach ($elements as $element)

                {{-- Three dots --}}
                @if (is_string($element))

                    <span class="join-item btn btn-sm btn-disabled">
                        {{ $element }}
                    </span>

                @endif


                {{-- Page numbers --}}
                @if (is_array($element))

                    @foreach ($element as $page => $url)

                        @if ($page == $paginator->currentPage())

                            <span
                                class="join-item btn btn-sm btn-primary"
                                aria-current="page"
                            >
                                {{ $page }}
                            </span>

                        @else

                            <a
                                href="{{ $url }}"
                                class="join-item btn btn-sm btn-ghost"
                                aria-label="{{ __('Go to page :page', ['page' => $page]) }}"
                            >
                                {{ $page }}
                            </a>

                        @endif

                    @endforeach

                @endif

            @endforeach


            {{-- Next --}}
            @if ($paginator->hasMorePages())

                <a
                    href="{{ $paginator->nextPageUrl() }}"
                    rel="next"
                    class="join-item btn btn-sm btn-ghost"
                    aria-label="{{ __('pagination.next') }}"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="size-4"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path d="m9 18 6-6-6-6"/>
                    </svg>
                </a>

            @else

                <span
                    class="join-item btn btn-sm btn-disabled"
                    aria-disabled="true"
                    aria-label="{{ __('pagination.next') }}"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="size-4"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path d="m9 18 6-6-6-6"/>
                    </svg>
                </span>

            @endif

        </div>

    </nav>

@endif
