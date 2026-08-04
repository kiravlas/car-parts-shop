<x-layouts.auth>

    <div class="card border border-base-300 bg-base-100 shadow-xl">

        <div class="card-body">

            <h1 class="text-center text-3xl font-bold">
                Welcome Back
            </h1>

            <p class="text-center text-base-content/70">
                Sign in to your Need4Parts account.
            </p>

            <form
                method="POST"
                action="{{ route('login') }}"
                class="mt-6 space-y-5"
            >
                @csrf

                {{-- Email --}}
                <div>
                    <label
                        for="email"
                        class="label"
                    >
                        <span class="label-text font-medium">
                            Email Address
                        </span>
                    </label>

                    <input
                        id="email"
                        name="email"
                        type="email"
                        value="{{ old('email') }}"
                        autocomplete="email"
                        autofocus
                        class="input input-bordered w-full @error('email') input-error @enderror"
                    >

                    @error('email')
                    <p class="mt-1 text-sm text-error">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                {{-- Password --}}
                <div>

                    <div class="flex items-center justify-between">

                        <label
                            for="password"
                            class="label"
                        >
                            <span class="label-text font-medium">
                                Password
                            </span>
                        </label>

                        <a
                            href="{{ route('password.request') }}"
                            class="text-sm link link-hover text-primary"
                        >
                            Forgot password?
                        </a>

                    </div>

                    <input
                        id="password"
                        name="password"
                        type="password"
                        autocomplete="current-password"
                        class="input input-bordered w-full @error('password') input-error @enderror"
                    >

                    @error('password')
                    <p class="mt-1 text-sm text-error">
                        {{ $message }}
                    </p>
                    @enderror

                </div>

                {{-- Remember me --}}
                <label class="label cursor-pointer justify-start gap-3">

                    <input
                        type="checkbox"
                        name="remember"
                        class="checkbox checkbox-primary"
                        @checked(old('remember'))
                    >

                    <span class="label-text">
                        Remember me
                    </span>

                </label>

                <button
                    type="submit"
                    class="btn btn-primary w-full"
                >
                    Login
                </button>

            </form>

            <div class="divider">
                OR
            </div>

            <p class="text-center text-sm">

                Don't have an account?

                <a
                    href="{{ route('register') }}"
                    class="link link-primary"
                >
                    Register
                </a>

            </p>

        </div>

    </div>

</x-layouts.auth>
