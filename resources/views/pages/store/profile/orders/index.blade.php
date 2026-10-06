<x-layouts.app>
    <div class="min-h-screen bg-base-300 py-10">
        <div class="mx-auto max-w-7xl px-4">

            {{-- Breadcrumb --}}
            <div class="breadcrumbs mb-6 text-sm text-base-content/60">
                <ul>
                    <li>
                        <a
                            href="{{ route('home.index') }}"
                            class="transition-colors hover:text-primary"
                        >
                            Home
                        </a>
                    </li>

                    <li>
                        <a
                            href="{{ route('profile.show') }}"
                            class="transition-colors hover:text-primary"
                        >
                            My Account
                        </a>
                    </li>

                    <li class="text-base-content">
                        My Orders
                    </li>
                </ul>
            </div>

            {{-- Heading --}}
            <div class="mb-8">
                <div class="mb-2 flex items-center gap-2">
                    <span class="h-1.5 w-8 rounded-full bg-primary"></span>

                    <span class="text-xs font-bold uppercase tracking-[0.2em] text-primary">
                        Account
                    </span>
                </div>

                <h1 class="text-3xl font-black tracking-tight sm:text-4xl">
                    My Orders
                </h1>

                <p class="mt-2 max-w-2xl text-sm text-base-content/60 sm:text-base">
                    View your order history and keep track of your purchases.
                </p>
            </div>

            {{-- Orders Card --}}
            <div class="card border border-base-content/10 bg-base-100 shadow-xl">
                <div class="card-body p-5 sm:p-8">

                    {{-- Card Header --}}
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <div class="flex items-center gap-3">
                            <div
                                class="flex size-11 shrink-0 items-center justify-center rounded-xl bg-primary/10 text-primary"
                            >
                                <i
                                    data-lucide="package"
                                    class="size-5"
                                ></i>
                            </div>

                            <div>
                                <h2 class="text-xl font-bold">
                                    Order History
                                </h2>

                                <p class="text-sm text-base-content/50">
                                    {{ $orders->total() }}
                                    {{ Str::plural('order', $orders->total()) }}
                                    in total
                                </p>
                            </div>
                        </div>

                        <a
                            href="{{ route('profile.show') }}"
                            class="btn btn-outline btn-sm"
                        >
                            <i
                                data-lucide="arrow-left"
                                class="size-4"
                            ></i>

                            Back to Account
                        </a>
                    </div>

                    <div class="divider my-2"></div>

                    {{-- Orders --}}
                    @forelse($orders as $order)

                        <div
                            class="group rounded-2xl border border-base-content/10 bg-base-200/40 p-4 transition-all duration-300 hover:border-primary/30 hover:bg-base-200/70 sm:p-5"
                        >
                            <div class="flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">

                                {{-- Order Information --}}
                                <div class="min-w-0">
                                    <div class="mb-3 flex flex-wrap items-center gap-2">

                                        {{-- Order ID --}}
                                        <span class="font-bold">
                                            Order #{{ $order->id }}
                                        </span>

                                        {{-- Status --}}
                                        @php
                                            $statusClass = match ($order->status) {
                                                'processing' => 'badge-warning',
                                                'shipped' => 'badge-info',
                                                'delivered' => 'badge-success',
                                                'cancelled' => 'badge-error',
                                                default => 'badge-ghost',
                                            };
                                        @endphp

                                        <span class="badge {{ $statusClass }}">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </div>

                                    {{-- Date --}}
                                    <div
                                        class="flex flex-wrap items-center gap-x-5 gap-y-2 text-sm text-base-content/55">
                                        <span class="flex items-center gap-1.5">
                                            <i
                                                data-lucide="calendar-days"
                                                class="size-4"
                                            ></i>

                                            {{ $order->created_at->format('M d, Y') }}
                                        </span>

                                        <span class="flex items-center gap-1.5">
                                            <i
                                                data-lucide="clock-3"
                                                class="size-4"
                                            ></i>

                                            {{ $order->created_at->format('H:i') }}
                                        </span>
                                    </div>
                                </div>

                                {{-- Total --}}
                                <div class="flex items-center justify-between gap-6 sm:justify-start">
                                    <div>
                                        <p class="text-xs font-semibold uppercase tracking-wider text-base-content/40">
                                            Order Total
                                        </p>

                                        <p class="mt-1 text-xl font-black text-primary">
                                            {{ config('shop.currency_symbol') }}{{ number_format($order->total_amount, 2) }}
                                        </p>
                                    </div>

                                    <div
                                        class="flex size-10 shrink-0 items-center justify-center rounded-xl bg-base-100 text-base-content/40 transition-colors group-hover:text-primary"
                                    >
                                        <i
                                            data-lucide="chevron-right"
                                            class="size-5"
                                        ></i>
                                    </div>
                                </div>

                            </div>
                        </div>

                    @empty

                        {{-- Empty State --}}
                        <div class="flex flex-col items-center justify-center py-16 text-center">

                            <div
                                class="mb-5 flex size-20 items-center justify-center rounded-full bg-base-200 text-base-content/30"
                            >
                                <i
                                    data-lucide="package-open"
                                    class="size-10"
                                ></i>
                            </div>

                            <h3 class="text-xl font-bold">
                                No orders yet
                            </h3>

                            <p class="mt-2 max-w-md text-sm leading-relaxed text-base-content/50">
                                You haven't placed any orders yet.
                                Once you make a purchase, your order history will appear here.
                            </p>

                            <a
                                href="{{ route('products.index') }}"
                                class="btn btn-primary mt-6"
                            >
                                <i
                                    data-lucide="shopping-bag"
                                    class="size-4"
                                ></i>

                                Browse Products
                            </a>
                        </div>

                    @endforelse

                    {{-- Pagination --}}
                    @if($orders->hasPages())
                        <div class="mt-6 flex justify-center">
                            <div class="rounded-2xl border border-base-content/10 bg-base-100 p-2 shadow-sm">
                                {{ $orders->links() }}
                            </div>
                        </div>
                    @endif

                </div>
            </div>

        </div>
    </div>
</x-layouts.app>
