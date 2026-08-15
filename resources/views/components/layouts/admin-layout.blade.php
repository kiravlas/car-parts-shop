<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>{{ config('app.name') }}</title>
</head>
<body>
<div class="drawer lg:drawer-open">
    <input id="my-drawer-4" type="checkbox" class="drawer-toggle inline"/>

    {{-- =========================================================
        DRAWER CONTENT
    ========================================================== --}}
    <div class="drawer-content">

        {{-- =====================================================
            NAVBAR
        ====================================================== --}}
        <nav class="navbar w-full bg-base-300 border-b border-base-content/10">

            {{-- Sidebar toggle --}}
            <label
                for="my-drawer-4"
                aria-label="open sidebar"
                class="btn btn-square btn-ghost drawer-button"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    stroke-linejoin="round"
                    stroke-linecap="round"
                    stroke-width="2"
                    fill="none"
                    stroke="currentColor"
                    class="my-1.5 inline-block size-4"
                >
                    <path d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path>
                    <path d="M9 4v16"></path>
                    <path d="M14 10l2 2l-2 2"></path>
                </svg>
            </label>

            {{-- Page title --}}
            <div class="px-4 font-semibold">
                Dashboard
            </div>

            {{-- Navbar right --}}
            <div class="ml-auto flex items-center gap-2">

                {{-- Admin dropdown --}}
                <div class="dropdown dropdown-end">

                    <div
                        tabindex="0"
                        role="button"
                        class="btn btn-ghost gap-2"
                    >

                        <div class="avatar placeholder">

                            <div class="bg-primary text-primary-content w-8 rounded-full">
                                <span>A</span>
                            </div>

                        </div>

                        <span class="hidden sm:inline">
                            Admin
                        </span>

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="size-4"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path d="m6 9 6 6 6-6"/>
                        </svg>

                    </div>


                    <ul
                        tabindex="0"
                        class="menu dropdown-content bg-base-200 rounded-box z-50 mt-3 w-52 p-2 shadow"
                    >

                        <li>
                            <a>
                                Profile
                            </a>
                        </li>

                        <div class="divider my-1"></div>

                        <li>
                            <a class="text-error">
                                Logout
                            </a>
                        </li>

                    </ul>

                </div>

            </div>

        </nav>


        {{-- =====================================================
            MAIN DASHBOARD
        ====================================================== --}}
        <main class="p-4 md:p-6 lg:p-8 space-y-6">
            @if (session('success'))
                <div role="alert" class="alert alert-success mb-4">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6 shrink-0"
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

                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if (session('error'))
                <div role="alert" class="alert alert-error mb-4">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6 shrink-0"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>

                    <span>{{ session('error') }}</span>
                </div>
            @endif
            {{$slot}}
        </main>

    </div>


    {{-- =========================================================
        SIDEBAR
    ========================================================== --}}
    <div class="drawer-side is-drawer-close:overflow-visible">

        <label
            for="my-drawer-4"
            aria-label="close sidebar"
            class="drawer-overlay"
        ></label>


        <div
            class="flex min-h-full flex-col items-start bg-base-200
                   is-drawer-close:w-14
                   is-drawer-open:w-64"
        >

            <ul class="menu w-full grow">


                {{-- =================================================
                    DASHBOARD
                ================================================== --}}
                <li>

                    <button
                        class="is-drawer-close:tooltip is-drawer-close:tooltip-right active"
                        data-tip="Dashboard"
                    >

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            stroke-linejoin="round"
                            stroke-linecap="round"
                            stroke-width="2"
                            fill="none"
                            stroke="currentColor"
                            class="my-1.5 inline-block size-4"
                        >
                            <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"></path>
                            <path
                                d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        </svg>

                        <span class="is-drawer-close:hidden">
                            Dashboard
                        </span>

                    </button>

                </li>


                {{-- =================================================
                    PRODUCTS
                ================================================== --}}
                <li>

                    <button
                        class="is-drawer-close:tooltip is-drawer-close:tooltip-right"
                        data-tip="Products"
                    >

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            stroke-linejoin="round"
                            stroke-linecap="round"
                            stroke-width="2"
                            fill="none"
                            stroke="currentColor"
                            class="my-1.5 inline-block size-4"
                        >
                            <path d="m16.5 9.4-9-5.19"></path>
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <path d="m3.3 7 8.7 5 8.7-5"></path>
                            <path d="M12 22V12"></path>
                        </svg>

                        <span class="is-drawer-close:hidden">
                            Products
                        </span>

                    </button>

                </li>


                {{-- =================================================
                    CATEGORIES
                ================================================== --}}
                <li>

                    <button
                        class="is-drawer-close:tooltip is-drawer-close:tooltip-right"
                        data-tip="Categories"
                    >

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            stroke-linejoin="round"
                            stroke-linecap="round"
                            stroke-width="2"
                            fill="none"
                            stroke="currentColor"
                            class="my-1.5 inline-block size-4"
                        >
                            <path d="M20 12V8a2 2 0 0 0-2-2h-5l-2-2H6a2 2 0 0 0-2 2v4"></path>
                            <path d="M4 12h16"></path>
                            <path d="M4 12v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-6"></path>
                        </svg>

                        <span class="is-drawer-close:hidden">
                            Categories
                        </span>

                    </button>

                </li>


                {{-- =================================================
                    ORDERS
                ================================================== --}}
                <li>

                    <button
                        class="is-drawer-close:tooltip is-drawer-close:tooltip-right"
                        data-tip="Orders"
                    >

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            stroke-linejoin="round"
                            stroke-linecap="round"
                            stroke-width="2"
                            fill="none"
                            stroke="currentColor"
                            class="my-1.5 inline-block size-4"
                        >
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>

                        <span class="is-drawer-close:hidden">
                            Orders
                        </span>

                    </button>

                </li>


                {{-- =================================================
                    USERS & ROLES
                ================================================== --}}
                <li>

                    <button
                        class="is-drawer-close:tooltip is-drawer-close:tooltip-right"
                        data-tip="Users & Roles"
                    >

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            stroke-linejoin="round"
                            stroke-linecap="round"
                            stroke-width="2"
                            fill="none"
                            stroke="currentColor"
                            class="my-1.5 inline-block size-4"
                        >
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>

                        <span class="is-drawer-close:hidden">
                            Users & Roles
                        </span>

                    </button>

                </li>


                {{-- =================================================
                    STORE
                ================================================== --}}
                <li class="menu-title mt-4 is-drawer-close:hidden">
                    Store
                </li>


                {{-- View Store --}}
                <li>
                    <a href="{{route('home.index')}}">
                        <button
                            class="is-drawer-close:tooltip is-drawer-close:tooltip-right"
                            data-tip="View Store"
                        >

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                stroke-linejoin="round"
                                stroke-linecap="round"
                                stroke-width="2"
                                fill="none"
                                stroke="currentColor"
                                class="my-1.5 inline-block size-4"
                            >
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>

                            <span class="is-drawer-close:hidden">
                            View Store
                        </span>

                        </button>
                    </a>
                </li>


            </ul>

        </div>

    </div>

</div>

</body>
</html>
