{{-- Popular Brands --}}

<section class="py-16 bg-base-100">

    <div class="max-w-7xl mx-auto px-4">

        {{-- Heading --}}
        <div class="text-center max-w-3xl mx-auto mb-12">

            <h2 class="text-4xl md:text-5xl font-bold text-primary">
                Popular Brands
            </h2>

            <p class="mt-5 text-lg text-base-content/70">
                We provide quality automotive parts from leading manufacturers
                you can rely on.
            </p>

        </div>


        {{-- Brand Grid --}}
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6">

            @php
                $brands = [
                    ['name' => 'Toyota', 'image' => 'toyota.svg'],
                    ['name' => 'BMW', 'image' => 'bmw.svg'],
                    ['name' => 'Mercedes-Benz', 'image' => 'mercedes.svg'],
                    ['name' => 'Audi', 'image' => 'audi.svg'],
                    ['name' => 'Volkswagen', 'image' => 'volkswagen.svg'],
                    ['name' => 'Ford', 'image' => 'ford.svg'],
                    ['name' => 'Bosch', 'image' => 'bosch.svg'],
                    ['name' => 'Mazda', 'image' => 'mazda.svg'],
                ];
            @endphp


            @foreach($brands as $brand)

                <div class="group flex h-28 items-center justify-center rounded-2xl
                            border border-base-300 bg-base-100 shadow-sm
                            transition duration-300
                            hover:-translate-y-1 hover:shadow-lg">

                    <img
                        src="{{ asset('images/brands/'.$brand['image']) }}"
                        alt="{{ $brand['name'] }}"
                        class="h-12 max-w-32 object-contain
                               grayscale-0 opacity-100
                               md:grayscale md:opacity-60
                               transition duration-300
                               md:group-hover:grayscale-0
                               md:group-hover:opacity-100"
                    >

                </div>

            @endforeach


        </div>


        {{-- CTA --}}
        <div class="text-center mt-12">

            <button class="btn btn-primary">

                View All Brands

                <i data-lucide="arrow-right" class="size-4"></i>

            </button>

        </div>


    </div>

</section>
