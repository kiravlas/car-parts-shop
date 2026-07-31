{{-- Need4Parts Customer Reviews Marquee --}}

<section>

    <div
        class="relative flex flex-col gap-3 overflow-hidden
    before:pointer-events-none before:absolute before:inset-y-0 before:start-0 before:z-10 before:w-24
    before:bg-[linear-gradient(to_right,hsl(var(--b2)),transparent)]
    after:pointer-events-none after:absolute after:inset-y-0 after:end-0 after:z-10 after:w-24
    after:bg-[linear-gradient(to_left,hsl(var(--b2)),transparent)]">

        @php
            $reviews = [
                [
                    'name' => 'Alex M.',
                    'initials' => 'AM',
                    'text' => 'Found the exact brake pads for my Toyota. Fast delivery and the parts matched perfectly.'
                ],
                [
                    'name' => 'Maria K.',
                    'initials' => 'MK',
                    'text' => 'The search by car model is amazing. Found my air filter in less than a minute.'
                ],
                [
                    'name' => 'Daniel R.',
                    'initials' => 'DR',
                    'text' => 'Good prices and real information about parts. Much better than random marketplaces.'
                ],
                [
                    'name' => 'Victor P.',
                    'initials' => 'VP',
                    'text' => 'Ordered suspension parts for my BMW. Everything arrived safely and quickly.'
                ],
                [
                    'name' => 'Elena S.',
                    'initials' => 'ES',
                    'text' => 'Finally a shop where I know the part will fit my vehicle.'
                ],
                [
                    'name' => 'Andrei C.',
                    'initials' => 'AC',
                    'text' => 'VIN search helped me avoid buying the wrong component. Very useful feature.'
                ],
                [
                    'name' => 'Chris T.',
                    'initials' => 'CT',
                    'text' => 'Delivery was fast and support helped me choose the correct oil and filters.'
                ],
                [
                    'name' => 'Sergiu V.',
                    'initials' => 'SV',
                    'text' => 'Bought headlights and filters. Great quality and fair prices.'
                ],
            ];
        @endphp


        {{-- First Row --}}
        <div class="flex overflow-hidden">

            <div
                class="flex w-max gap-4 py-2
            [animation:marquee-x_60s_linear_infinite]
            hover:[animation-play-state:paused]">

                @foreach(array_merge($reviews, $reviews) as $review)

                    <figure
                        class="w-72 shrink-0 rounded-xl border border-base-300
                    bg-base-100 p-4 shadow-md">

                        <div class="flex items-center gap-3">

                            <div class="avatar placeholder">
                                <div
                                    class="size-10 rounded-full
                                bg-success text-success-content">
                                <span class="text-sm">
                                    {{ $review['initials'] }}
                                </span>
                                </div>
                            </div>


                            <div class="min-w-0">

                                <p class="truncate text-sm font-semibold text-base-content">
                                    {{ $review['name'] }}
                                </p>

                                <p class="truncate text-xs text-base-content/60">
                                    Verified buyer
                                </p>

                            </div>

                        </div>


                        <div class="mt-3 text-success text-sm">
                            ★★★★★
                        </div>


                        <blockquote class="mt-2 text-sm text-base-content/70">
                            {{ $review['text'] }}
                        </blockquote>


                    </figure>

                @endforeach

            </div>

        </div>


        {{-- Second Row --}}
        <div class="flex overflow-hidden">

            <div
                class="flex w-max gap-4 py-2
            [animation:marquee-x_60s_linear_infinite]
            [animation-direction:reverse]
            hover:[animation-play-state:paused]">


                @foreach(array_merge($reviews, $reviews) as $review)

                    <figure
                        class="w-72 shrink-0 rounded-xl border border-base-300
                    bg-base-100 p-4 shadow-md">

                        <div class="flex items-center gap-3">

                            <div class="avatar placeholder">

                                <div
                                    class="size-10 rounded-full
                                bg-success text-success-content">

                                <span class="text-sm">
                                    {{ $review['initials'] }}
                                </span>

                                </div>

                            </div>


                            <div class="min-w-0">

                                <p class="truncate text-sm font-semibold text-base-content">
                                    {{ $review['name'] }}
                                </p>

                                <p class="truncate text-xs text-base-content/60">
                                    Verified buyer
                                </p>

                            </div>

                        </div>


                        <div class="mt-3 text-success text-sm">
                            ★★★★★
                        </div>


                        <blockquote class="mt-2 text-sm text-base-content/70">
                            {{ $review['text'] }}
                        </blockquote>


                    </figure>

                @endforeach


            </div>

        </div>


    </div>


</section>
