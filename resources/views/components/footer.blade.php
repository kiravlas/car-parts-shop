<footer class="bg-base-200 border-t border-base-300">

    <div class="max-w-7xl mx-auto px-6 py-16">

        <div class="grid gap-12 md:grid-cols-2 lg:grid-cols-5">

            {{-- About --}}
            <div>

                <img
                    src="{{ asset('images/logo.png') }}"
                    class="h-12 rounded-3xl"
                    alt="Need4Parts">

                <p class="mt-5 text-sm text-base-content/70 leading-6">
                    Your trusted destination for quality automotive parts,
                    fast delivery and reliable customer support.
                </p>

            </div>


            {{-- Shop --}}
            <div>

                <h3 class="footer-title">
                    Shop
                </h3>

                <ul class="space-y-2 text-sm">

                    <li><a class="link link-hover">Categories</a></li>
                    <li><a class="link link-hover">Brands</a></li>
                    <li><a class="link link-hover">New Arrivals</a></li>
                    <li><a class="link link-hover">Top Sellers</a></li>
                    <li><a class="link link-hover">Special Offers</a></li>

                </ul>

            </div>


            {{-- Support --}}
            <div>

                <h3 class="footer-title">
                    Customer Service
                </h3>

                <ul class="space-y-2 text-sm">

                    <li><a class="link link-hover">Contact Us</a></li>
                    <li><a class="link link-hover">FAQ</a></li>
                    <li><a class="link link-hover">Shipping</a></li>
                    <li><a class="link link-hover">Returns</a></li>
                    <li><a class="link link-hover">Warranty</a></li>

                </ul>

            </div>


            {{-- Contact --}}
            <div>

                <h3 class="footer-title">
                    Contact
                </h3>

                <div class="space-y-3 text-sm">

                    <div class="flex gap-3">

                        <i data-lucide="phone" class="size-4 mt-0.5"></i>

                        <span>
                            +(373) 61-21-00-21
                        </span>

                    </div>

                    <div class="flex gap-3">

                        <i data-lucide="mail" class="size-4 mt-0.5"></i>

                        <span>
                            support@need4parts.com
                        </span>

                    </div>

                    <div class="flex gap-3">

                        <i data-lucide="map-pin" class="size-4 mt-0.5"></i>

                        <span>
                            Chisinau, Moldova
                        </span>

                    </div>

                </div>

            </div>


            {{-- Hours --}}
            <div>

                <h3 class="footer-title">
                    Opening Hours
                </h3>

                <div class="space-y-2 text-sm">

                    <div class="flex justify-between">
                        <span>Mon–Fri</span>
                        <span>09:00–18:00</span>
                    </div>

                    <div class="flex justify-between">
                        <span>Saturday</span>
                        <span>10:00–14:00</span>
                    </div>

                    <div class="flex justify-between">
                        <span>Sunday</span>
                        <span>Closed</span>
                    </div>

                    <div class="flex items-center gap-2 pt-3">

                        <div class="status status-success"></div>

                        <span>
                            Online now
                        </span>

                    </div>

                </div>

            </div>

        </div>


        {{-- Divider --}}

        <div class="divider my-12"></div>


        {{-- Payments / Shipping / Social --}}

        <div class="grid gap-10 lg:grid-cols-3">

            {{-- Payments --}}
            <div>

                <h3 class="footer-title">
                    Accepted Payments
                </h3>

                <div class="flex flex-wrap gap-4 items-center mt-4">

                    <img src="{{ asset('images/payments/visa.svg') }}" class="h-8 " alt="Visa">

                    <img src="{{ asset('images/payments/mastercard.svg') }}" class="h-8 text-[]"
                         alt="Mastercard">

                    <img src="{{ asset('images/payments/paypal.svg') }}" class="h-8 text-[]" alt="PayPal">

                    <img src="{{ asset('images/payments/applepay.svg') }}" class="h-8 text-[]" alt="Apple Pay">

                    <img src="{{ asset('images/payments/googlepay.svg') }}" class="h-8 text-[]"
                         alt="Google Pay">

                </div>

            </div>


            {{-- Shipping --}}
            <div>

                <h3 class="footer-title">
                    Shipping Partners
                </h3>

                <div class="flex flex-wrap gap-4 items-center mt-4">

                    <img src="{{ asset('images/shipping/dhl.svg') }}" class="h-8">

                    <img src="{{ asset('images/shipping/fedex.svg') }}" class="h-8">

                    <img src="{{ asset('images/shipping/ups.svg') }}" class="h-8">

                    <img src="{{ asset('images/shipping/dpd.svg') }}" class="h-8">

                    <img src="{{ asset('images/shipping/posta-moldovei.webp') }}" class="h-8">

                </div>

            </div>


            {{-- Social --}}
            <div>

                <h3 class="footer-title">
                    Follow Us
                </h3>

                <div class="flex gap-3 mt-4">

                    <a class="btn btn-ghost btn-outline">
                        <img src="{{ asset('images/social/facebook.svg') }}" class="h-5">
                    </a>

                    <a class="btn btn-ghost btn-outline">
                        <img src="{{ asset('images/social/instagram.svg') }}" class="h-5">
                    </a>

                    <a class="btn btn-ghost btn-outline">
                        <img src="{{ asset('images/social/youtube.svg') }}" class="h-5">
                    </a>

                    <a class="btn btn-ghost btn-outline">
                        <img src="{{ asset('images/social/telegram.svg') }}" class="h-5">
                    </a>

                </div>

            </div>

        </div>


        {{-- Divider --}}

        <div class="divider my-10"></div>


        {{-- Bottom --}}

        <div class="flex flex-col md:flex-row justify-between items-center gap-4 text-sm text-base-content/60">

            <p>
                © {{ date('Y') }} Need4Parts. All rights reserved.
            </p>

            <div class="flex gap-6">

                <a class="link link-hover">
                    Privacy Policy
                </a>

                <a class="link link-hover">
                    Terms of Service
                </a>

                <a class="link link-hover">
                    Cookies
                </a>

            </div>

        </div>

    </div>

</footer>

