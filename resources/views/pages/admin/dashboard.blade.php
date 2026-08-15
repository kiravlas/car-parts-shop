<x-layouts.admin-layout>

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

</x-layouts.admin-layout>
