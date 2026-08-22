{{-- ============================================================
Choose by Car
============================================================ --}}

<section
    x-data="{ showAll: false }">

    {{-- Heading --}}
    <div class="mx-auto mb-12 max-w-3xl text-center">

        <h2 class="text-4xl font-bold text-primary md:text-5xl">
            Choose by Car
        </h2>

        <p class="mt-5 text-lg text-base-content/70">
            Select your car make to find parts that fit your vehicle.
        </p>

    </div>


    {{-- ============================================================
         Popular Car Makes
    ============================================================= --}}

    @php

        $popularMakes = [

            ['name' => 'Toyota', 'image' => 'toyota.svg'],
            ['name' => 'BMW', 'image' => 'bmw.svg'],
            ['name' => 'Mercedes-Benz', 'image' => 'mercedes.svg'],
            ['name' => 'Audi', 'image' => 'audi.svg'],

            ['name' => 'Volkswagen', 'image' => 'volkswagen.svg'],
            ['name' => 'Ford', 'image' => 'ford.svg'],
            ['name' => 'Mazda', 'image' => 'mazda.svg'],
            ['name' => 'Honda', 'image' => 'honda.svg'],

            ['name' => 'Nissan', 'image' => 'nissan.svg'],
            ['name' => 'Kia', 'image' => 'kia.svg'],
            ['name' => 'Hyundai', 'image' => 'hyundai.svg'],
            ['name' => 'Volvo', 'image' => 'volvo.svg'],

        ];

    @endphp


    {{-- Popular cards --}}
    <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4">

        @foreach($popularMakes as $make)

            <button
                type="button"
                class="group flex h-24 flex-col items-center justify-center
                   rounded-2xl border border-base-300 bg-base-100
                   shadow-sm
                   transition duration-300
                   hover:-translate-y-1
                   hover:border-primary
                   hover:shadow-lg">

                {{-- Logo --}}
                <div class="flex h-10 items-center justify-center">

                    <img
                        src="{{ asset('images/brands/'.$make['image']) }}"
                        alt="{{ $make['name'] }}"
                        class="h-9 max-w-20 object-contain
                           grayscale opacity-60
                           transition duration-300
                           group-hover:grayscale-0
                           group-hover:opacity-100">

                </div>


                {{-- Make name --}}
                <span
                    class="mt-2 text-sm font-semibold
                       text-base-content/70
                       transition group-hover:text-primary">

                {{ $make['name'] }}

            </span>

            </button>

        @endforeach

    </div>


    {{-- ============================================================
         View All Makes
    ============================================================= --}}

    <div
        x-show="showAll"
        x-collapse
        class="mt-10 border-t border-base-300 pt-10">

        @php

            $carMakes = [

                'Abarth',
                'AC',
                'Acura',
                'Alfa Romeo',
                'Alpina',
                'Asia Motors',
                'Audi',
                'BAW',
                'Bentley',
                'BMW',
                'Buick',
                'BYD',

                'Cadillac',
                'Chery',
                'Chevrolet',
                'Chrysler',
                'Citroën',
                'CMC',
                'Dacia',
                'Daewoo',
                'DAF',
                'Daimler',
                'Datsun',
                'DFSK',

                'Dodge',
                'Exeed',
                'Fiat',
                'Ford',
                'Ford USA',
                'Foton',
                'GAZ',
                'Geely',
                'Genesis',
                'GMC',
                'Great Wall',
                'Haval',

                'Honda',
                'Honda (GAC)',
                'Hongqi',
                'Huanghai',
                'Hummer',
                'Hyundai',
                'Infiniti',
                'Isuzu',
                'Iveco',
                'Jaguar',
                'Jeep',
                'Kia',

                'Lada',
                'Lancia',
                'Land Rover',
                'Lexus',
                'Lifan',
                'Lincoln',
                'Lotus',
                'MAN',
                'Maybach',
                'Mazda',
                'Mercedes-Benz',
                'MG',

                'MINI',
                'Mitsubishi',
                'Moskvich',
                'Nissan',
                'Oldsmobile',
                'Opel',
                'Peugeot',
                'Plymouth',
                'Pontiac',
                'Porsche',
                'Proton',
                'Reliant',

                'Renault',
                'Renault Trucks',
                'Rover',
                'Saab',
                'SEAT',
                'Sevic',
                'Shelby',
                'Skoda',
                'Smart',
                'SsangYong',
                'Subaru',
                'Suzuki',

                'Talbot',
                'Tank',
                'Tesla',
                'Toyota',
                'UAZ',
                'Uz-Daewoo',
                'Vauxhall',
                'Volvo',
                'VW',
                'ZAZ',
                'Zeekr',
                'Zotye',

            ];

            $makeColumns = array_chunk($carMakes, 12);

        @endphp


        {{-- Desktop: 8 columns / 12 makes each --}}
        <div
            class="mx-auto grid max-w-6xl grid-cols-2 gap-x-6 gap-y-8 px-5
       sm:grid-cols-3 sm:px-6
       md:grid-cols-4 md:px-0
       lg:grid-cols-6
       xl:grid-cols-8">

            @foreach($makeColumns as $column)

                <div class="space-y-3">

                    @foreach($column as $make)

                        <button
                            type="button"
                            class="block w-full text-left
                               text-sm font-medium
                               text-base-content/60
                               transition-colors
                               hover:text-primary
                               hover:underline">

                            {{ $make }}

                        </button>

                    @endforeach

                </div>

            @endforeach

        </div>

    </div>


    {{-- ============================================================
         Toggle
    ============================================================= --}}

    <div class="mt-10 flex justify-center mb-10">

        <button
            type="button"
            @click="showAll = !showAll"
            class="btn btn-primary">

        <span x-show="!showAll">
            View All Car Makes
        </span>

            <span x-show="showAll">
            Show Less
        </span>

            <i
                data-lucide="chevron-down"
                class="size-4 transition-transform duration-300"
                :class="{ 'rotate-180': showAll }">
            </i>

        </button>

    </div>

</section>
