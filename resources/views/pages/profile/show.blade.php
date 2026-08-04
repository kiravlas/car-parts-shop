<x-layouts.app>
    <div class="bg-base-300 py-10">

        <div class="mx-auto max-w-7xl px-4">

            {{-- Breadcrumb --}}
            <div class="breadcrumbs mb-6 text-sm">

                <ul>

                    <li>

                        <a href="{{ route('home.index') }}">
                            Home
                        </a>

                    </li>

                    <li>

                        My Account

                    </li>

                </ul>

            </div>


            {{-- Heading --}}
            <div class="mb-8">

                <h1 class="text-4xl font-bold">

                    My Account

                </h1>

                <p class="mt-2 text-base-content/70">

                    Manage your profile, orders and account settings.

                </p>

            </div>


            <div class="grid gap-8 lg:grid-cols-3">


                {{-- Left Column --}}
                <div class="space-y-8">


                    {{-- Profile Card --}}
                    <div class="card border border-base-300 bg-base-100 shadow-xl">

                        <div class="card-body items-center text-center">

                            <div class="avatar">

                                <div class="w-28 rounded-full ring ring-primary ring-offset-4 ring-offset-base-100">

                                    <img
                                        src="https://placehold.co/300"
                                        alt="Avatar">

                                </div>

                            </div>

                            <h2 class="mt-4 text-2xl font-bold">

                                {{ auth()->user()->name }}

                            </h2>

                            <p class="text-base-content/60">

                                {{ auth()->user()->email }}

                            </p>

                            @if(auth()->user()->hasVerifiedEmail())

                                <div class="badge badge-success mt-4">

                                    Verified

                                </div>

                            @else

                                <div class="badge badge-warning mt-4">

                                    Email Not Verified

                                </div>

                            @endif

                        </div>

                    </div>


                    {{-- Quick Actions --}}
                    <div class="card border border-base-300 bg-base-100 shadow-xl">

                        <div class="card-body">

                            <h2 class="card-title">

                                Quick Actions

                            </h2>

                            <div class="divider my-2"></div>

                            <div class="space-y-3">

                                <a
                                    {{--                                    href="{{ route('profile.edit') }}"--}}
                                    class="btn btn-primary btn-block">

                                    Edit Profile

                                </a>

                                <a
                                    {{--                                    href="{{ route('profile.security') }}"--}}
                                    class="btn btn-outline btn-block">

                                    Security

                                </a>

                                <a
                                    {{--                                    href="{{ route('profile.orders') }}"--}}
                                    class="btn btn-outline btn-block">

                                    My Orders

                                </a>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- Right Column --}}
                <div class="space-y-8 lg:col-span-2">


                    {{-- Statistics --}}
                    <div class="grid gap-6 sm:grid-cols-3">

                        <div class="stats shadow">

                            <div class="stat text-center">

                                <div class="stat-title">

                                    Orders

                                </div>

                                <div class="stat-value text-primary">

                                    12

                                </div>

                            </div>

                        </div>

                        <div class="stats shadow">

                            <div class="stat text-center">

                                <div class="stat-title">

                                    Wishlist

                                </div>

                                <div class="stat-value text-primary">

                                    8

                                </div>

                            </div>

                        </div>

                        <div class="stats shadow">

                            <div class="stat text-center">

                                <div class="stat-title">

                                    Saved Vehicles

                                </div>

                                <div class="stat-value text-primary">

                                    2

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- Recent Orders --}}
                    <div class="card border border-base-300 bg-base-100 shadow-xl">

                        <div class="card-body">

                            <div class="flex items-center justify-between">

                                <h2 class="card-title">

                                    Recent Orders

                                </h2>

                                <a
                                    {{--                                    href="{{ route('profile.orders') }}"--}}
                                    class="link link-primary">

                                    View All

                                </a>

                            </div>

                            <div class="divider my-2"></div>

                            <div class="overflow-x-auto">

                                <table class="table">

                                    <thead>

                                    <tr>

                                        <th>#</th>

                                        <th>Date</th>

                                        <th>Status</th>

                                        <th>Total</th>

                                    </tr>

                                    </thead>

                                    <tbody>

                                    <tr>

                                        <td>#1005</td>

                                        <td>Jul 31, 2026</td>

                                        <td>

                                        <span class="badge badge-success">

                                            Delivered

                                        </span>

                                        </td>

                                        <td>$129.99</td>

                                    </tr>

                                    <tr>

                                        <td>#1004</td>

                                        <td>Jul 22, 2026</td>

                                        <td>

                                        <span class="badge badge-warning">

                                            Processing

                                        </span>

                                        </td>

                                        <td>$84.50</td>

                                    </tr>

                                    <tr>

                                        <td>#1003</td>

                                        <td>Jul 11, 2026</td>

                                        <td>

                                        <span class="badge badge-info">

                                            Shipped

                                        </span>

                                        </td>

                                        <td>$44.90</td>

                                    </tr>

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>


                    {{-- Account Information --}}
                    <div class="card border border-base-300 bg-base-100 shadow-xl">

                        <div class="card-body">

                            <h2 class="card-title">

                                Account Information

                            </h2>

                            <div class="divider my-2"></div>

                            <div class="grid gap-6 sm:grid-cols-2">

                                <div>

                                    <p class="text-sm text-base-content/60">

                                        Full Name

                                    </p>

                                    <p class="mt-1 font-semibold">

                                        {{ auth()->user()->name }}

                                    </p>

                                </div>

                                <div>

                                    <p class="text-sm text-base-content/60">

                                        Email

                                    </p>

                                    <p class="mt-1 font-semibold">

                                        {{ auth()->user()->email }}

                                    </p>

                                </div>

                                <div>

                                    <p class="text-sm text-base-content/60">

                                        Member Since

                                    </p>

                                    <p class="mt-1 font-semibold">

                                        {{ auth()->user()->created_at->format('F d, Y') }}

                                    </p>

                                </div>

                                <div>

                                    <p class="text-sm text-base-content/60">

                                        Email Status

                                    </p>

                                    <p class="mt-1 font-semibold">

                                        {{ auth()->user()->hasVerifiedEmail() ? 'Verified' : 'Not Verified' }}

                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
</x-layouts.app>
