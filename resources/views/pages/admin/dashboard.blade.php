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

                {{-- Notifications --}}
                <button class="btn btn-ghost btn-circle">

                    <div class="indicator">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="size-5"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9"></path>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                        </svg>

                        <span class="badge badge-xs badge-primary indicator-item"></span>

                    </div>

                </button>


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


            {{-- =================================================
                DASHBOARD HEADER
            ================================================== --}}
            <section>

                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                    <div>

                        <h1 class="text-2xl md:text-3xl font-bold">
                            Welcome back, Admin
                        </h1>

                        <p class="text-base-content/60 mt-1">
                            Here's what's happening with your store today.
                        </p>

                    </div>


                    <a href="#" class="btn btn-primary">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="size-5"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path d="M12 5v14"></path>
                            <path d="M5 12h14"></path>
                        </svg>

                        Add Product

                    </a>

                </div>

            </section>


            {{-- =================================================
                OVERVIEW STATS
            ================================================== --}}
            <section class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">


                {{-- Products --}}
                <div class="stat bg-base-200 rounded-box border border-base-content/10">

                    <div class="stat-figure text-primary">

                        <div class="rounded-full bg-primary/10 p-3">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="size-6"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path d="m16.5 9.4-9-5.19"></path>
                                <path
                                    d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                <path d="m3.3 7 8.7 5 8.7-5"></path>
                                <path d="M12 22V12"></path>
                            </svg>

                        </div>

                    </div>

                    <div class="stat-title">
                        Products
                    </div>

                    <div class="stat-value">
                        248
                    </div>

                    <div class="stat-desc text-success">
                        +12 this month
                    </div>

                </div>


                {{-- Orders --}}
                <div class="stat bg-base-200 rounded-box border border-base-content/10">

                    <div class="stat-figure text-secondary">

                        <div class="rounded-full bg-secondary/10 p-3">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="size-6"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <circle cx="9" cy="21" r="1"></circle>
                                <circle cx="20" cy="21" r="1"></circle>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                            </svg>

                        </div>

                    </div>

                    <div class="stat-title">
                        Orders
                    </div>

                    <div class="stat-value">
                        86
                    </div>

                    <div class="stat-desc text-success">
                        +8.2% this month
                    </div>

                </div>


                {{-- Revenue --}}
                <div class="stat bg-base-200 rounded-box border border-base-content/10">

                    <div class="stat-figure text-accent">

                        <div class="rounded-full bg-accent/10 p-3">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="size-6"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <line x1="12" y1="1" x2="12" y2="23"></line>
                                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                            </svg>

                        </div>

                    </div>

                    <div class="stat-title">
                        Revenue
                    </div>

                    <div class="stat-value">
                        $12,480
                    </div>

                    <div class="stat-desc text-success">
                        +14.4% this month
                    </div>

                </div>


                {{-- Customers --}}
                <div class="stat bg-base-200 rounded-box border border-base-content/10">

                    <div class="stat-figure text-info">

                        <div class="rounded-full bg-info/10 p-3">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="size-6"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>

                        </div>

                    </div>

                    <div class="stat-title">
                        Customers
                    </div>

                    <div class="stat-value">
                        1,284
                    </div>

                    <div class="stat-desc">
                        34 new this month
                    </div>

                </div>

            </section>


            {{-- =================================================
                QUICK ACTIONS
            ================================================== --}}
            <section>

                <h2 class="text-lg font-bold mb-3">
                    Quick Actions
                </h2>


                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">


                    {{-- Add Product --}}
                    <a
                        href="#"
                        class="card bg-base-200 border border-base-content/10 hover:border-primary transition-colors"
                    >

                        <div class="card-body">

                            <div class="flex items-center gap-3">

                                <div class="rounded-lg bg-primary/10 text-primary p-3">

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="size-6"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                    >
                                        <path d="M12 5v14"></path>
                                        <path d="M5 12h14"></path>
                                    </svg>

                                </div>

                                <div>

                                    <h3 class="font-semibold">
                                        Add Product
                                    </h3>

                                    <p class="text-xs text-base-content/60">
                                        Create a new product
                                    </p>

                                </div>

                            </div>

                        </div>

                    </a>


                    {{-- Add Category --}}
                    <a
                        href="#"
                        class="card bg-base-200 border border-base-content/10 hover:border-secondary transition-colors"
                    >

                        <div class="card-body">

                            <div class="flex items-center gap-3">

                                <div class="rounded-lg bg-secondary/10 text-secondary p-3">

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="size-6"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                    >
                                        <path d="M4 4h6l2 2h8v12H4z"></path>
                                        <path d="M12 11v6"></path>
                                        <path d="M9 14h6"></path>
                                    </svg>

                                </div>

                                <div>

                                    <h3 class="font-semibold">
                                        Add Category
                                    </h3>

                                    <p class="text-xs text-base-content/60">
                                        Create a new category
                                    </p>

                                </div>

                            </div>

                        </div>

                    </a>


                    {{-- Orders --}}
                    <a
                        href="#"
                        class="card bg-base-200 border border-base-content/10 hover:border-accent transition-colors"
                    >

                        <div class="card-body">

                            <div class="flex items-center gap-3">

                                <div class="rounded-lg bg-accent/10 text-accent p-3">

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="size-6"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                    >
                                        <circle cx="9" cy="21" r="1"></circle>
                                        <circle cx="20" cy="21" r="1"></circle>
                                        <path
                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                    </svg>

                                </div>

                                <div>

                                    <h3 class="font-semibold">
                                        Orders
                                    </h3>

                                    <p class="text-xs text-base-content/60">
                                        Manage customer orders
                                    </p>

                                </div>

                            </div>

                        </div>

                    </a>


                    {{-- Users --}}
                    <a
                        href="#"
                        class="card bg-base-200 border border-base-content/10 hover:border-info transition-colors"
                    >

                        <div class="card-body">

                            <div class="flex items-center gap-3">

                                <div class="rounded-lg bg-info/10 text-info p-3">

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="size-6"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                    >
                                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    </svg>

                                </div>

                                <div>

                                    <h3 class="font-semibold">
                                        Users & Roles
                                    </h3>

                                    <p class="text-xs text-base-content/60">
                                        Manage user roles
                                    </p>

                                </div>

                            </div>

                        </div>

                    </a>

                </div>

            </section>


            {{-- =================================================
                RECENT ORDERS + ORDER SUMMARY
            ================================================== --}}
            <section class="grid grid-cols-1 xl:grid-cols-3 gap-6">


                {{-- Recent Orders --}}
                <div class="xl:col-span-2 card bg-base-200 border border-base-content/10">

                    <div class="card-body">

                        <div class="flex items-center justify-between">

                            <div>

                                <h2 class="card-title">
                                    Recent Orders
                                </h2>

                                <p class="text-sm text-base-content/60">
                                    Latest customer orders
                                </p>

                            </div>

                            <a href="#" class="btn btn-sm btn-ghost">
                                View all
                            </a>

                        </div>


                        <div class="overflow-x-auto mt-4">

                            <table class="table">

                                <thead>

                                <tr>
                                    <th>Order</th>
                                    <th>Customer</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                </tr>

                                </thead>


                                <tbody>

                                <tr>

                                    <td class="font-medium">
                                        #1048
                                    </td>

                                    <td>
                                        John Smith
                                    </td>

                                    <td>
                                        $249.00
                                    </td>

                                    <td>
                                        <span class="badge badge-warning badge-sm">
                                            Processing
                                        </span>
                                    </td>

                                </tr>


                                <tr>

                                    <td class="font-medium">
                                        #1047
                                    </td>

                                    <td>
                                        Alex Brown
                                    </td>

                                    <td>
                                        $89.50
                                    </td>

                                    <td>
                                        <span class="badge badge-info badge-sm">
                                            Shipped
                                        </span>
                                    </td>

                                </tr>


                                <tr>

                                    <td class="font-medium">
                                        #1046
                                    </td>

                                    <td>
                                        Emma Wilson
                                    </td>

                                    <td>
                                        $420.00
                                    </td>

                                    <td>
                                        <span class="badge badge-success badge-sm">
                                            Completed
                                        </span>
                                    </td>

                                </tr>


                                <tr>

                                    <td class="font-medium">
                                        #1045
                                    </td>

                                    <td>
                                        Michael Lee
                                    </td>

                                    <td>
                                        $156.00
                                    </td>

                                    <td>
                                        <span class="badge badge-warning badge-sm">
                                            Processing
                                        </span>
                                    </td>

                                </tr>

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>


                {{-- Order Summary --}}
                <div class="card bg-base-200 border border-base-content/10">

                    <div class="card-body">

                        <h2 class="card-title">
                            Order Summary
                        </h2>

                        <p class="text-sm text-base-content/60">
                            Current order status
                        </p>


                        <div class="space-y-4 mt-5">


                            {{-- Pending --}}
                            <div>

                                <div class="flex justify-between text-sm mb-1">

                                    <span>
                                        Pending
                                    </span>

                                    <span class="font-medium">
                                        12
                                    </span>

                                </div>

                                <progress
                                    class="progress progress-warning w-full"
                                    value="12"
                                    max="50"
                                ></progress>

                            </div>


                            {{-- Processing --}}
                            <div>

                                <div class="flex justify-between text-sm mb-1">

                                    <span>
                                        Processing
                                    </span>

                                    <span class="font-medium">
                                        18
                                    </span>

                                </div>

                                <progress
                                    class="progress progress-info w-full"
                                    value="18"
                                    max="50"
                                ></progress>

                            </div>


                            {{-- Shipped --}}
                            <div>

                                <div class="flex justify-between text-sm mb-1">

                                    <span>
                                        Shipped
                                    </span>

                                    <span class="font-medium">
                                        9
                                    </span>

                                </div>

                                <progress
                                    class="progress progress-primary w-full"
                                    value="9"
                                    max="50"
                                ></progress>

                            </div>


                            {{-- Completed --}}
                            <div>

                                <div class="flex justify-between text-sm mb-1">

                                    <span>
                                        Completed
                                    </span>

                                    <span class="font-medium">
                                        47
                                    </span>

                                </div>

                                <progress
                                    class="progress progress-success w-full"
                                    value="47"
                                    max="50"
                                ></progress>

                            </div>

                        </div>

                    </div>

                </div>

            </section>


            {{-- =================================================
                LOW STOCK PRODUCTS
            ================================================== --}}
            <section class="card bg-base-200 border border-base-content/10">

                <div class="card-body">

                    <div class="flex items-center justify-between">

                        <div>

                            <h2 class="card-title">
                                Low Stock Products
                            </h2>

                            <p class="text-sm text-base-content/60">
                                Products that need your attention
                            </p>

                        </div>

                        <a href="#" class="btn btn-sm btn-ghost">
                            Products
                        </a>

                    </div>


                    <div class="overflow-x-auto mt-4">

                        <table class="table">

                            <thead>

                            <tr>
                                <th>Product</th>
                                <th>SKU</th>
                                <th>Stock</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>

                            </thead>


                            <tbody>


                            {{-- Product 1 --}}
                            <tr>

                                <td>

                                    <div class="flex items-center gap-3">

                                        <div class="avatar">

                                            <div class="mask mask-squircle w-12 h-12 bg-base-300">

                                                <img
                                                    src="https://placehold.co/100x100"
                                                    alt="BMW Brake Pads"
                                                >

                                            </div>

                                        </div>


                                        <div>

                                            <div class="font-medium">
                                                BMW Brake Pads
                                            </div>

                                            <div class="text-xs text-base-content/50">
                                                Brake System
                                            </div>

                                        </div>

                                    </div>

                                </td>

                                <td>
                                    BMW-BP-001
                                </td>

                                <td>
                                    <span class="badge badge-error">
                                        2 left
                                    </span>
                                </td>

                                <td>
                                    $129.00
                                </td>

                                <td>
                                    <button class="btn btn-xs btn-outline">
                                        Edit
                                    </button>
                                </td>

                            </tr>


                            {{-- Product 2 --}}
                            <tr>

                                <td>

                                    <div class="flex items-center gap-3">

                                        <div class="avatar">

                                            <div class="mask mask-squircle w-12 h-12 bg-base-300">

                                                <img
                                                    src="https://placehold.co/100x100"
                                                    alt="Audi Headlight"
                                                >

                                            </div>

                                        </div>


                                        <div>

                                            <div class="font-medium">
                                                Audi Headlight
                                            </div>

                                            <div class="text-xs text-base-content/50">
                                                Lighting
                                            </div>

                                        </div>

                                    </div>

                                </td>

                                <td>
                                    AUD-HL-004
                                </td>

                                <td>
                                    <span class="badge badge-error">
                                        0 left
                                    </span>
                                </td>

                                <td>
                                    $310.00
                                </td>

                                <td>
                                    <button class="btn btn-xs btn-outline">
                                        Edit
                                    </button>
                                </td>

                            </tr>


                            {{-- Product 3 --}}
                            <tr>

                                <td>

                                    <div class="flex items-center gap-3">

                                        <div class="avatar">

                                            <div class="mask mask-squircle w-12 h-12 bg-base-300">

                                                <img
                                                    src="https://placehold.co/100x100"
                                                    alt="Oil Filter"
                                                >

                                            </div>

                                        </div>


                                        <div>

                                            <div class="font-medium">
                                                Oil Filter
                                            </div>

                                            <div class="text-xs text-base-content/50">
                                                Engine
                                            </div>

                                        </div>

                                    </div>

                                </td>

                                <td>
                                    FLT-009
                                </td>

                                <td>
                                    <span class="badge badge-warning">
                                        5 left
                                    </span>
                                </td>

                                <td>
                                    $24.00
                                </td>

                                <td>
                                    <button class="btn btn-xs btn-outline">
                                        Edit
                                    </button>
                                </td>

                            </tr>

                            </tbody>

                        </table>

                    </div>

                </div>

            </section>


            {{-- =================================================
                RECENT ACTIVITY
            ================================================== --}}
            <section class="card bg-base-200 border border-base-content/10">

                <div class="card-body">

                    <h2 class="card-title">
                        Recent Activity
                    </h2>


                    <ul class="timeline timeline-vertical">


                        {{-- Activity 1 --}}
                        <li>

                            <div class="timeline-start text-sm text-base-content/50">
                                10:42 AM
                            </div>

                            <div class="timeline-middle text-success">

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="size-4"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <path d="M20 6 9 17l-5-5"/>
                                </svg>

                            </div>

                            <div class="timeline-end timeline-box">

                                <span class="font-medium">
                                    Order #1048
                                </span>

                                was placed.

                            </div>

                            <hr/>

                        </li>


                        {{-- Activity 2 --}}
                        <li>

                            <hr/>

                            <div class="timeline-start timeline-box">

                                <span class="font-medium">
                                    BMW Brake Pads
                                </span>

                                was updated.

                            </div>

                            <div class="timeline-middle text-primary">

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

                            </div>

                            <div class="timeline-end text-sm text-base-content/50">
                                9:18 AM
                            </div>

                            <hr/>

                        </li>


                        {{-- Activity 3 --}}
                        <li>

                            <hr/>

                            <div class="timeline-start text-sm text-base-content/50">
                                Yesterday
                            </div>

                            <div class="timeline-middle text-info">

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="size-4"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                                    <circle cx="9" cy="7" r="4"/>
                                </svg>

                            </div>

                            <div class="timeline-end timeline-box">

                                New customer
                                <span class="font-medium">
                                    Sarah Johnson
                                </span>

                                registered.

                            </div>

                        </li>

                    </ul>

                </div>

            </section>

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

                        <span class="badge badge-primary badge-sm ml-auto is-drawer-close:hidden">
                            7
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
