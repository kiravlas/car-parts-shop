<x-layouts.auth>

    <div class="rounded-3xl border border-base-300 bg-base-100 p-8 shadow-2xl">

        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold">
                Create your account
            </h1>

            <p class="mt-2 text-base-content/70">
                Create an account to save your favorite parts, track orders, and enjoy a faster checkout.
            </p>
        </div>

        <form
            method="POST"
            action="{{ route('register') }}"
            class="space-y-5"
        >
            @csrf

            {{-- Name --}}
            <div>
                <label
                    for="name"
                    class="mb-2 block text-sm font-medium"
                >
                    Full Name
                </label>

                <input
                    id="name"
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    autocomplete="name"
                    autofocus
                    class="input input-bordered w-full @error('name') input-error @enderror"
                    placeholder="John Doe"
                >

                @error('name')
                <p class="mt-2 text-sm text-error">
                    {{ $message }}
                </p>
                @enderror
            </div>

            {{-- Email --}}
            <div>
                <label
                    for="email"
                    class="mb-2 block text-sm font-medium"
                >
                    Email Address
                </label>

                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    autocomplete="email"
                    class="input input-bordered w-full @error('email') input-error @enderror"
                    placeholder="john@example.com"
                >

                @error('email')
                <p class="mt-2 text-sm text-error">
                    {{ $message }}
                </p>
                @enderror
            </div>

            {{-- Password --}}
            <div>
                <label
                    for="password"
                    class="mb-2 block text-sm font-medium"
                >
                    Password
                </label>

                <input
                    id="password"
                    type="password"
                    name="password"
                    autocomplete="new-password"
                    class="input input-bordered w-full @error('password') input-error @enderror"
                    placeholder="••••••••"
                >

                @error('password')
                <p class="mt-2 text-sm text-error">
                    {{ $message }}
                </p>
                @enderror
            </div>

            {{-- Confirm Password --}}
            <div>
                <label
                    for="password_confirmation"
                    class="mb-2 block text-sm font-medium"
                >
                    Confirm Password
                </label>

                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    autocomplete="new-password"
                    class="input input-bordered w-full"
                    placeholder="••••••••"
                >
            </div>

            <button
                type="submit"
                class="btn btn-primary btn-block mt-2 transition-transform duration-200 hover:scale-[1.02] active:scale-95"
            >
                Create Account
            </button>
        </form>

        <div class="divider my-8"></div>

        <div class="space-y-3 text-sm text-base-content/70">
            <div class="flex items-center gap-3">
                <span class="text-success">✓</span>
                <span>Secure account protected by encryption</span>
            </div>

            <div class="flex items-center gap-3">
                <span class="text-success">✓</span>
                <span>Track your orders anytime</span>
            </div>

            <div class="flex items-center gap-3">
                <span class="text-success">✓</span>
                <span>Save your favorite parts and vehicles</span>
            </div>
        </div>

        <div class="mt-8 text-center text-sm">
            <span class="text-base-content/70">
                Already have an account?
            </span>

            <a
                href="{{ route('login') }}"
                class="link link-primary font-medium"
            >
                Sign in
            </a>
        </div>

    </div>

</x-layouts.auth>
