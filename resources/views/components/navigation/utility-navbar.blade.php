{{-- ============================================================
     Utility Navbar
============================================================ --}}

<div
    class="hidden min-h-10
           border-b border-primary/10
           bg-neutral
           text-neutral-content
           shadow-sm
           lg:flex"
>

    {{-- =========================================================
         Left Side - Main Links
    ========================================================== --}}

    <div class="flex flex-1 items-center">

        {{-- On Sale --}}
        <a
            href="#"
            class="group flex h-10 items-center gap-2
                   border-e border-neutral-content/5
                   px-4
                   text-xs font-semibold
                   text-neutral-content/80
                   transition-all duration-200
                   hover:bg-primary
                   hover:text-primary-content"
        >
            <i
                data-lucide="badge-percent"
                class="size-3.5 text-primary
                       transition-all duration-200
                       group-hover:text-primary-content
                       group-hover:scale-110"
            ></i>

            <span>
                On Sale
            </span>
        </a>


        {{-- Top Sellers --}}
        <a
            href="#"
            class="group flex h-10 items-center gap-2
                   border-e border-neutral-content/5
                   px-4
                   text-xs font-semibold
                   text-neutral-content/80
                   transition-all duration-200
                   hover:bg-primary
                   hover:text-primary-content"
        >
            <i
                data-lucide="trending-up"
                class="size-3.5 text-primary
                       transition-all duration-200
                       group-hover:text-primary-content
                       group-hover:scale-110"
            ></i>

            <span>
                Top Sellers
            </span>
        </a>


        {{-- New Arrivals --}}
        <a
            href="#"
            class="group flex h-10 items-center gap-2
                   border-e border-neutral-content/5
                   px-4
                   text-xs font-semibold
                   text-neutral-content/80
                   transition-all duration-200
                   hover:bg-primary
                   hover:text-primary-content"
        >
            <i
                data-lucide="sparkles"
                class="size-3.5 text-primary
                       transition-all duration-200
                       group-hover:text-primary-content
                       group-hover:scale-110"
            ></i>

            <span>
                New Arrivals
            </span>
        </a>


        {{-- Categories --}}
        <a
            href="#"
            class="group flex h-10 items-center gap-2
                   border-e border-neutral-content/5
                   px-4
                   text-xs font-semibold
                   text-neutral-content/80
                   transition-all duration-200
                   hover:bg-primary
                   hover:text-primary-content"
        >
            <i
                data-lucide="grid-2x2"
                class="size-3.5 text-primary
                       transition-all duration-200
                       group-hover:text-primary-content
                       group-hover:scale-110"
            ></i>

            <span>
                Categories
            </span>
        </a>


        {{-- Delivery --}}
        <a
            href="#"
            class="group flex h-10 items-center gap-2
                   px-4
                   text-xs font-semibold
                   text-neutral-content/80
                   transition-all duration-200
                   hover:bg-primary
                   hover:text-primary-content"
        >
            <i
                data-lucide="truck"
                class="size-3.5 text-primary
                       transition-all duration-200
                       group-hover:text-primary-content
                       group-hover:scale-110"
            ></i>

            <span>
                Delivery
            </span>
        </a>

    </div>


    {{-- =========================================================
         Right Side
    ========================================================== --}}

    <div class="flex items-center gap-1 pr-3">


        {{-- =====================================================
             Contact
        ====================================================== --}}

        <div class="dropdown dropdown-end z-40">

            {{-- Trigger --}}
            <div
                tabindex="0"
                role="button"
                class="group flex h-8 cursor-pointer items-center gap-2
                       rounded-lg px-3
                       text-xs font-semibold
                       text-neutral-content/80
                       transition-all duration-200
                       hover:bg-neutral-content/10
                       hover:text-neutral-content"
            >

                <i
                    data-lucide="mails"
                    class="size-3.5 text-primary
                           transition-transform duration-200
                           group-hover:scale-110"
                ></i>

                <span>
                    Contact
                </span>

                <i
                    data-lucide="chevron-down"
                    class="size-3 opacity-50"
                ></i>

            </div>


            {{-- Dropdown --}}
            <ul
                tabindex="0"
                class="menu dropdown-content z-50 mt-2 w-80
                       rounded-xl
                       border border-base-300
                       bg-base-100 p-2
                       text-base-content
                       shadow-2xl"
            >

                <li class="menu-title px-3 pb-1 pt-2">
                    <span>
                        Contact Information
                    </span>
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

                            Customer Support

                        </span>

                        <span class="text-xs opacity-60">
                            support@need4parts.com
                        </span>
                    </a>
                </li>

            </ul>

        </div>


        {{-- =====================================================
             Follow Us
        ====================================================== --}}

        <div class="dropdown dropdown-end z-40">

            {{-- Trigger --}}
            <div
                tabindex="0"
                role="button"
                class="group flex h-8 cursor-pointer items-center gap-2
                       rounded-lg px-3
                       text-xs font-semibold
                       text-neutral-content/80
                       transition-all duration-200
                       hover:bg-neutral-content/10
                       hover:text-neutral-content"
            >

                <i
                    data-lucide="share-2"
                    class="size-3.5 text-primary
                           transition-transform duration-200
                           group-hover:scale-110"
                ></i>

                <span>
                    Follow Us
                </span>

                <i
                    data-lucide="chevron-down"
                    class="size-3 opacity-50"
                ></i>

            </div>


            {{-- Dropdown --}}
            <ul
                tabindex="0"
                class="menu dropdown-content z-50 mt-2 w-52
                       rounded-xl
                       border border-base-300
                       bg-base-100 p-2
                       text-base-content
                       shadow-2xl"
            >

                <li class="menu-title px-3 pb-1 pt-2">
                    <span>
                        Follow Need4Parts
                    </span>
                </li>


                {{-- Facebook --}}
                <li>
                    <a
                        href="#"
                        class="flex items-center justify-between"
                    >
                        <span>
                            Facebook
                        </span>

                        <svg
                            class="size-4"
                            fill="#0866FF"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M9.101 23.691v-7.98H6.627v-3.667h2.474v-1.58c0-4.085 1.848-5.978 5.858-5.978.401 0 .955.042 1.468.103a8.68 8.68 0 0 1 1.141.195v3.325a8.623 8.623 0 0 0-.653-.036 26.805 26.805 0 0 0-.733-.009c-.707 0-1.259.096-1.675.309a1.686 1.686 0 0 0-.679.622c-.258.42-.374.995-.374 1.752v1.297h3.919l-.386 2.103-.287 1.564h-3.246v8.245C19.396 23.238 24 18.179 24 12.044c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.628 3.874 10.35 9.101 11.647Z"
                            />
                        </svg>
                    </a>
                </li>


                {{-- Instagram --}}
                <li>
                    <a
                        href="#"
                        class="flex items-center justify-between"
                    >
                        <span>
                            Instagram
                        </span>

                        <svg
                            class="size-4"
                            fill="#FF0069"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M7.0301.084c-1.2768.0602-2.1487.264-2.911.5634-.7888.3075-1.4575.72-2.1228 1.3877-.6652.6677-1.075 1.3368-1.3802 2.127-.2954.7638-.4956 1.6365-.552 2.914-.0564 1.2775-.0689 1.6882-.0626 4.947.0062 3.2586.0206 3.6671.0825 4.9473.061 1.2765.264 2.1482.5635 2.9107.308.7889.72 1.4573 1.388 2.1228.6679.6655 1.3365 1.0743 2.1285 1.38.7632.295 1.6361.496 2.9134.552 1.2773.056 1.6884.069 4.9462.0627 3.2578-.0062 3.668-.0207 4.9478-.0814 1.28-.0607 2.147-.2652 2.9098-.5633.7889-.3086 1.4578-.72 2.1228-1.3881.665-.6682 1.0745-1.3378 1.3795-2.1284.2957-.7632.4966-1.636.552-2.9124.056-1.2809.069-1.6898.063-4.948-.0063-3.2583-.021-3.6668-.0817-4.9465-.0607-1.2797-.264-2.1487-.5633-2.9117-.3084-.7889-.72-1.4568-1.3876-2.1228C21.2982 1.33 20.628.9208 19.8378.6165 19.074.321 18.2017.1197 16.9244.0645 15.6471.0093 15.236-.005 11.977.0014 8.718.0076 8.31.0215 7.0301.0839m.1402 21.6932c-1.17-.0509-1.8053-.2453-2.2287-.408-.5606-.216-.96-.4771-1.3819-.895-.422-.4178-.6811-.8186-.9-1.378-.1644-.4234-.3624-1.058-.4171-2.228-.0595-1.2645-.072-1.6442-.079-4.848-.007-3.2037.0053-3.583.0607-4.848.05-1.169.2456-1.805.408-2.2282.216-.5613.4762-.96.895-1.3816.4188-.4217.8184-.6814 1.3783-.9003.423-.1651 1.0577-.3617 2.227-.4171 1.265-.06 1.6447-.072 4.848-.079 3.2033-.007 3.5835.005 4.8495.0608 1.169.0508 1.805.2445 2.228.408.5608.216.96.4754 1.3816.895.4217.4194.6816.8176.9005 1.3787.1653.4217.3617 1.056.4169 2.2263.0602 1.2655.0739 1.645.0796 4.848.0058 3.203-.0055 3.5834-.061 4.848-.051 1.17-.245 1.8055-.408 2.2294-.216.5604-.4763.96-.8954 1.3814-.419.4215-.8181.6811-1.3783.9-.4224.1649-1.0577.3617-2.2262.4174-1.2656.0595-1.6448.072-4.8493.079-3.2045.007-3.5825-.006-4.848-.0608M16.953 5.5864A1.44 1.44 0 1 0 18.39 4.144a1.44 1.44 0 0 0-1.437 1.4424A1.44 1.44 0 0 0 16.953 5.5864"
                            />
                        </svg>
                    </a>
                </li>


                {{-- YouTube --}}
                <li>
                    <a
                        href="#"
                        class="flex items-center justify-between"
                    >
                        <span>
                            YouTube
                        </span>

                        <svg
                            class="size-4"
                            fill="#FF0000"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"
                            />
                        </svg>
                    </a>
                </li>


                {{-- Telegram --}}
                <li>
                    <a
                        href="#"
                        class="flex items-center justify-between"
                    >
                        <span>
                            Telegram
                        </span>

                        <svg
                            class="size-4"
                            fill="#26A5E4"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"
                            />
                        </svg>
                    </a>
                </li>

            </ul>

        </div>


        {{-- =====================================================
             Phone
        ====================================================== --}}

        <div class="dropdown dropdown-end z-40">

            {{-- Trigger --}}
            <div
                tabindex="0"
                role="button"
                class="group flex h-8 cursor-pointer items-center gap-2
                       rounded-lg px-3
                       text-xs font-semibold
                       text-neutral-content/80
                       transition-all duration-200
                       hover:bg-neutral-content/10
                       hover:text-neutral-content"
            >

                <i
                    data-lucide="phone-call"
                    class="size-3.5 text-primary
                           transition-transform duration-200
                           group-hover:scale-110"
                ></i>

                <span>
                    Call Us
                </span>

                <i
                    data-lucide="chevron-down"
                    class="size-3 opacity-50"
                ></i>

            </div>


            {{-- Dropdown --}}
            <ul
                tabindex="0"
                class="menu dropdown-content z-50 mt-2 w-64
                       rounded-xl
                       border border-base-300
                       bg-base-100 p-2
                       text-base-content
                       shadow-2xl"
            >

                <li class="menu-title px-3 pb-1 pt-2">
                    <span>
                        Contact Numbers
                    </span>
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

                    <div
                        class="flex cursor-default items-center gap-2
                               px-3 py-2 text-xs opacity-70"
                    >

                        <span
                            class="status status-success size-2"
                        ></span>

                        <span>
                            Mon–Fri: 9:00–18:00
                        </span>

                    </div>

                </li>

            </ul>

        </div>


        {{-- =====================================================
             Language
        ====================================================== --}}

        <div class="dropdown dropdown-end z-40">

            <div
                tabindex="0"
                role="button"
                class="group flex h-8 cursor-pointer items-center gap-2
                       rounded-lg
                       border border-neutral-content/15
                       bg-neutral-content/5
                       px-3
                       text-xs font-semibold
                       transition-all duration-200
                       hover:border-primary/40
                       hover:bg-primary/10"
            >

                <span class="fi fi-md"></span>

                <span>
                    Md
                </span>

                <i
                    data-lucide="chevron-down"
                    class="size-3 opacity-50
                           transition-transform
                           group-hover:translate-y-0.5"
                ></i>

            </div>


            <ul
                tabindex="0"
                class="menu dropdown-content z-50 mt-2 w-32
                       rounded-xl
                       border border-base-300
                       bg-base-100 p-2
                       text-base-content
                       shadow-2xl"
            >

                <li>
                    <a
                        href="#"
                        class="flex items-center gap-3"
                    >
                        <span class="fi fi-md"></span>
                        <span>Md</span>
                    </a>
                </li>

                <li>
                    <a
                        href="#"
                        class="flex items-center gap-3"
                    >
                        <span class="fi fi-ru"></span>
                        <span>Ru</span>
                    </a>
                </li>

                <li>
                    <a
                        href="#"
                        class="flex items-center gap-3"
                    >
                        <span class="fi fi-gb"></span>
                        <span>En</span>
                    </a>
                </li>

            </ul>

        </div>

    </div>

</div>
