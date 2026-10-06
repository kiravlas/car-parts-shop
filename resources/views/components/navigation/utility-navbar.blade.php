{{-- Utility Navbar --}}
<div class="hidden min-h-10 border-b border-primary/10 bg-neutral text-neutral-content shadow-sm lg:flex">
    {{-- Left Side - Main Links --}}
    <div class="flex flex-1 items-center">
        {{-- On Sale --}}
        <a
            href="{{ route('products.index', ['on_sale' => 'on']) }}"
            class="group flex h-10 items-center gap-2 border-e border-neutral-content/5 px-4 text-xs font-semibold text-neutral-content/80 transition-all duration-200 hover:bg-primary hover:text-primary-content"
        >
            <i
                data-lucide="badge-percent"
                class="size-3.5 text-primary transition-all duration-200 group-hover:scale-110 group-hover:text-primary-content"
            ></i>
            <span>On Sale</span>
        </a>

        {{-- Top Sellers --}}
        <a
            href="{{ route('products.index', ['sort' => 'popularity']) }}"
            class="group flex h-10 items-center gap-2 border-e border-neutral-content/5 px-4 text-xs font-semibold text-neutral-content/80 transition-all duration-200 hover:bg-primary hover:text-primary-content"
        >
            <i
                data-lucide="trending-up"
                class="size-3.5 text-primary transition-all duration-200 group-hover:scale-110 group-hover:text-primary-content"
            ></i>
            <span>Top Sellers</span>
        </a>

        {{-- New Arrivals --}}
        <a
            href="{{ route('products.index', ['is_new_arrival' => 'on']) }}"
            class="group flex h-10 items-center gap-2 border-e border-neutral-content/5 px-4 text-xs font-semibold text-neutral-content/80 transition-all duration-200 hover:bg-primary hover:text-primary-content"
        >
            <i
                data-lucide="sparkles"
                class="size-3.5 text-primary transition-all duration-200 group-hover:scale-110 group-hover:text-primary-content"
            ></i>
            <span>New Arrivals</span>
        </a>

        {{-- Categories --}}
        <a
            href="{{ route('categories.index') }}"
            class="group flex h-10 items-center gap-2 border-e border-neutral-content/5 px-4 text-xs font-semibold text-neutral-content/80 transition-all duration-200 hover:bg-primary hover:text-primary-content"
        >
            <i
                data-lucide="grid-2x2"
                class="size-3.5 text-primary transition-all duration-200 group-hover:scale-110 group-hover:text-primary-content"
            ></i>
            <span>Categories</span>
        </a>

        {{-- Delivery --}}
        <a
            href="#"
            class="group flex h-10 items-center gap-2 px-4 text-xs font-semibold text-neutral-content/80 transition-all duration-200 hover:bg-primary hover:text-primary-content"
        >
            <i
                data-lucide="truck"
                class="size-3.5 text-primary transition-all duration-200 group-hover:scale-110 group-hover:text-primary-content"
            ></i>
            <span>Delivery</span>
        </a>
    </div>

    {{-- Right Side --}}
    <div class="flex items-center gap-1 pr-3">
        {{-- Contact --}}
        <div class="dropdown dropdown-end z-40">
            {{-- Trigger --}}
            <div
                tabindex="0"
                role="button"
                class="group flex h-8 cursor-pointer items-center gap-2 rounded-lg px-3 text-xs font-semibold text-neutral-content/80 transition-all duration-200 hover:bg-neutral-content/10 hover:text-neutral-content"
            >
                <i
                    data-lucide="mails"
                    class="size-3.5 text-primary transition-transform duration-200 group-hover:scale-110"
                ></i>

                <span>Contact</span>

                <i
                    data-lucide="chevron-down"
                    class="size-3 opacity-50"
                ></i>
            </div>

            {{-- Dropdown --}}
            <ul
                tabindex="0"
                class="menu dropdown-content z-50 mt-2 w-80 rounded-xl border border-base-300 bg-base-100 p-2 text-base-content shadow-2xl"
            >
                <li class="menu-title px-3 pb-1 pt-2">
                    <span>Contact Information</span>
                </li>

                {{-- General --}}
                <li>
                    <a
                        href="mailto:info@need4parts.com"
                        class="flex items-center justify-between gap-4"
                    >
                        <span class="flex items-center gap-2 text-sm font-medium">
                            <i
                                data-lucide="mail"
                                class="size-4 text-primary"
                            ></i>
                            General Inquiries
                        </span>

                        <span class="text-xs opacity-60">
                            info@need4parts.com
                        </span>
                    </a>
                </li>

                {{-- Sales --}}
                <li>
                    <a
                        href="mailto:sales@need4parts.com"
                        class="flex items-center justify-between gap-4"
                    >
                        <span class="flex items-center gap-2 text-sm font-medium">
                            <i
                                data-lucide="shopping-bag"
                                class="size-4 text-primary"
                            ></i>
                            Sales Department
                        </span>

                        <span class="text-xs opacity-60">
                            sales@need4parts.com
                        </span>
                    </a>
                </li>

                {{-- Support --}}
                <li>
                    <a
                        href="mailto:support@need4parts.com"
                        class="flex items-center justify-between gap-4"
                    >
                        <span class="flex items-center gap-2 text-sm font-medium">
                            <i
                                data-lucide="headphones"
                                class="size-4 text-primary"
                            ></i>
                            Support
                        </span>

                        <span class="text-xs opacity-60">
                            support@need4parts.com
                        </span>
                    </a>
                </li>
            </ul>
        </div>

        {{-- Follow Us --}}
        <div class="dropdown dropdown-end z-40">
            {{-- Trigger --}}
            <div
                tabindex="0"
                role="button"
                class="group flex h-8 cursor-pointer items-center gap-2 rounded-lg px-3 text-xs font-semibold text-neutral-content/80 transition-all duration-200 hover:bg-neutral-content/10 hover:text-neutral-content"
            >
                <i
                    data-lucide="share-2"
                    class="size-3.5 text-primary transition-transform duration-200 group-hover:scale-110"
                ></i>

                <span>Follow Us</span>

                <i
                    data-lucide="chevron-down"
                    class="size-3 opacity-50"
                ></i>
            </div>

            {{-- Dropdown --}}
            <ul
                tabindex="0"
                class="menu dropdown-content z-50 mt-2 w-52 rounded-xl border border-base-300 bg-base-100 p-2 text-base-content shadow-2xl"
            >
                <li class="menu-title px-3 pb-1 pt-2">
                    <span>Follow Need4Parts</span>
                </li>

                {{-- Facebook --}}
                <li>
                    <a href="#" class="flex items-center justify-between">
                        <span>Facebook</span>

                        <img src="{{asset('images/social/facebook.svg')}}" alt="facebook" class="h-5">
                    </a>
                </li>

                {{-- Instagram --}}
                <li>
                    <a href="#" class="flex items-center justify-between">
                        <span>Instagram</span>
                        <img src="{{asset('images/social/instagram.svg')}}" alt="instagram" class="h-5">
                    </a>
                </li>

                {{-- YouTube --}}
                <li>
                    <a href="#" class="flex items-center justify-between">
                        <span>YouTube</span>
                        <img src="{{asset('images/social/youtube.svg')}}" alt="youtube" class="h-5">
                    </a>
                </li>

                {{-- Telegram --}}
                <li>
                    <a href="#" class="flex items-center justify-between">
                        <span>Telegram</span>
                        <img src="{{asset('images/social/telegram.svg')}}" alt="telegram" class="h-5">

                    </a>
                </li>
            </ul>
        </div>

        {{-- Phone --}}
        <div class="dropdown dropdown-end z-40">
            {{-- Trigger --}}
            <div
                tabindex="0"
                role="button"
                class="group flex h-8 cursor-pointer items-center gap-2 rounded-lg px-3 text-xs font-semibold text-neutral-content/80 transition-all duration-200 hover:bg-neutral-content/10 hover:text-neutral-content"
            >
                <i
                    data-lucide="phone-call"
                    class="size-3.5 text-primary transition-transform duration-200 group-hover:scale-110"
                ></i>

                <span>Call Us</span>

                <i
                    data-lucide="chevron-down"
                    class="size-3 opacity-50"
                ></i>
            </div>

            {{-- Dropdown --}}
            <ul
                tabindex="0"
                class="menu dropdown-content z-50 mt-2 w-64 rounded-xl border border-base-300 bg-base-100 p-2 text-base-content shadow-2xl"
            >
                <li class="menu-title px-3 pb-1 pt-2">
                    <span>Contact Numbers</span>
                </li>

                {{-- Sales --}}
                <li>
                    <a
                        href="tel:+37361210021"
                        class="flex items-center justify-between"
                    >
                        <span class="flex items-center gap-2">
                            <i
                                data-lucide="shopping-bag"
                                class="size-4 text-primary"
                            ></i>
                            Sales
                        </span>

                        <span class="text-xs opacity-60">
                            +373 61 21 00 21
                        </span>
                    </a>
                </li>

                {{-- Support --}}
                <li>
                    <a
                        href="tel:+37361210022"
                        class="flex items-center justify-between"
                    >
                        <span class="flex items-center gap-2">
                            <i
                                data-lucide="headphones"
                                class="size-4 text-primary"
                            ></i>
                            Support
                        </span>

                        <span class="text-xs opacity-60">
                            +373 61 21 00 22
                        </span>
                    </a>
                </li>

                <li class="mt-1">
                    <div class="flex cursor-default items-center gap-2 px-3 py-2 text-xs opacity-70">
                        <span class="status status-success size-2"></span>
                        <span>Mon–Fri: 9:00–18:00</span>
                    </div>
                </li>
            </ul>
        </div>

        {{-- Language --}}
        <div class="dropdown dropdown-end z-40">
            <div
                tabindex="0"
                role="button"
                class="group flex h-8 cursor-pointer items-center gap-2 rounded-lg border border-neutral-content/15 bg-neutral-content/5 px-3 text-xs font-semibold transition-all duration-200 hover:border-primary/40 hover:bg-primary/10"
            >
                <span class="fi fi-md"></span>
                <span>Md</span>

                <i
                    data-lucide="chevron-down"
                    class="size-3 opacity-50 transition-transform group-hover:translate-y-0.5"
                ></i>
            </div>

            <ul
                tabindex="0"
                class="menu dropdown-content z-50 mt-2 w-32 rounded-xl border border-base-300 bg-base-100 p-2 text-base-content shadow-2xl"
            >
                <li>
                    <a href="#" class="flex items-center gap-3">
                        <span class="fi fi-md"></span>
                        <span>Md</span>
                    </a>
                </li>

                <li>
                    <a href="#" class="flex items-center gap-3">
                        <span class="fi fi-ru"></span>
                        <span>Ru</span>
                    </a>
                </li>

                <li>
                    <a href="#" class="flex items-center gap-3">
                        <span class="fi fi-gb"></span>
                        <span>En</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
