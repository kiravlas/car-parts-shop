{{-- Popular Brands --}}
<section class="bg-base-100 py-16">
    <div class="mx-auto max-w-7xl px-4">
        {{-- Heading --}}
        <div class="mx-auto mb-12 max-w-3xl text-center">
            <h2 class="text-4xl font-bold text-primary md:text-5xl">
                Popular Brands
            </h2>

            <p class="mt-5 text-lg text-base-content/70">
                We provide quality automotive parts from leading manufacturers
                you can rely on.
            </p>
        </div>
        {{-- Brand Grid --}}
        <div class="grid grid-cols-2 gap-6 sm:grid-cols-3 md:grid-cols-4">
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
                <div
                    class="group flex h-28 items-center justify-center rounded-2xl border border-base-300 bg-base-100 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg"
                >
                    <img
                        src="{{ asset('images/brands/'.$brand['image']) }}"
                        alt="{{ $brand['name'] }}"
                        class="h-12 max-w-32 object-contain opacity-100 grayscale-0 transition duration-300 md:grayscale md:opacity-60 md:group-hover:grayscale-0 md:group-hover:opacity-100"
                    >
                </div>
            @endforeach
        </div>
        {{-- CTA --}}
        <div class="mt-12 text-center">
            <button class="btn btn-primary">
                View All Brands
                <i data-lucide="arrow-right" class="size-4"></i>
            </button>
        </div>
    </div>
</section>
