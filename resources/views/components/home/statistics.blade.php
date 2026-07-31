{{--Statistics--}}

<section
    class="py-16 bg-base-300"
    x-data="{
        started: false,

        products: 0,
        brands: 0,
        customers: 0,

        start() {

            if(this.started) return

            this.started = true

            this.animate('products',100000)
            this.animate('brands',50)
            this.animate('customers',25000)

        },

        animate(property,target){

            let current = 0

            let increment = target / 100

            let timer = setInterval(()=>{

                current += increment

                if(current >= target){

                    this[property] = target

                    clearInterval(timer)

                } else {

                    this[property] = Math.floor(current)

                }

            },20)

        }
    }"

    x-intersect="start()"
>
    <div class="max-w-3xl mx-auto text-center mb-12">

        <h2 class="text-4xl md:text-5xl font-bold text-primary">
            Trusted by Drivers Everywhere
        </h2>

        <p class="mt-5 text-lg text-base-content/70">
            With thousands of satisfied customers and a wide selection of automotive parts,
            Need4Parts helps drivers find reliable components for every vehicle.
        </p>

    </div>

    <div class="max-w-6xl mx-auto px-4">

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">


            <div class="stat bg-base-100 rounded-2xl shadow-md text-center">

                <div class="stat-value text-primary">
                    <span class="counter" x-text="products.toLocaleString()" data-target="100000"></span>+
                </div>

                <div class="stat-title">
                    Products Available
                </div>

            </div>


            <div class="stat bg-base-100 rounded-2xl shadow-md text-center">

                <div class="stat-value text-primary">
                    <span class="counter" x-text="brands.toLocaleString()" data-target="50">

                    </span>+
                </div>

                <div class="stat-title">
                    Trusted Brands
                </div>

            </div>


            <div class="stat bg-base-100 rounded-2xl shadow-md text-center">

                <div class="stat-value text-primary">
                    <span class="counter" x-text="customers.toLocaleString()" data-target="25000">

                    </span>+
                </div>

                <div class="stat-title">
                    Happy Customers
                </div>

            </div>


            <div class="stat bg-base-100 rounded-2xl shadow-md text-center">

                <div class="stat-value text-primary">
                    <span>
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
