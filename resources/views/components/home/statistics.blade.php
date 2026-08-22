{{-- ============================================================
Statistics
============================================================ --}}

<section
    class="bg-base-300 py-16"
    x-data="{
        started: false,

        products: 0,
        brands: 0,
        customers: 0,

        start() {

            if (this.started) return

            this.started = true

            this.animate('products', 10000)
            this.animate('brands', 50)
            this.animate('customers', 25000)

        },

        animate(property, target) {

            let current = 0

            let increment = target / 100

            let timer = setInterval(() => {

                current += increment

                if (current >= target) {

                    this[property] = target

                    clearInterval(timer)

                } else {

                    this[property] = Math.floor(current)

                }

            }, 20)

        }
    }"
    x-intersect="start()"
>

    {{-- ============================================================
         Heading
    ============================================================= --}}

    <div class="mx-auto mb-12 max-w-3xl px-4 text-center">

        <h2 class="text-4xl font-bold text-primary md:text-5xl">
            Trusted by Drivers Everywhere
        </h2>

        <p class="mt-5 text-lg text-base-content/70">
            With thousands of satisfied customers and a wide selection
            of automotive parts, Need4Parts helps drivers find reliable
            components for every vehicle.
        </p>

    </div>


    {{-- ============================================================
         Statistics
    ============================================================= --}}
    <div class="mx-auto max-w-6xl px-4">

        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">

            {{-- Products --}}
            <div class="stat rounded-2xl bg-base-100 text-center shadow-md">

                <div class="stat-value text-3xl text-primary sm:text-4xl lg:text-5xl">

                <span
                    class="whitespace-nowrap"
                    x-text="products.toLocaleString()">
                </span>+

                </div>

                <div class="stat-title">
                    Products Available
                </div>

            </div>

            {{-- Brands --}}
            <div class="stat rounded-2xl bg-base-100 text-center shadow-md">

                <div class="stat-value text-3xl text-primary sm:text-4xl lg:text-5xl">

                <span
                    class="whitespace-nowrap"
                    x-text="brands.toLocaleString()">
                </span>+

                </div>

                <div class="stat-title">
                    Trusted Brands
                </div>

            </div>

            {{-- Customers --}}
            <div class="stat rounded-2xl bg-base-100 text-center shadow-md">

                <div class="stat-value text-3xl text-primary sm:text-4xl lg:text-5xl">

                <span
                    class="whitespace-nowrap"
                    x-text="customers.toLocaleString()">
                </span>+

                </div>

                <div class="stat-title">
                    Happy Customers
                </div>

            </div>

            {{-- Rating --}}
            <div class="stat rounded-2xl bg-base-100 text-center shadow-md">

                <div class="stat-value text-3xl text-primary sm:text-4xl lg:text-5xl">

                <span class="whitespace-nowrap">
                    4.8 ★
                </span>

                </div>

                <div class="stat-title">
                    Customer Rating
                </div>

            </div>

        </div>

    </div>
</section>
