<x-layouts.auth>

    <div class="card border border-base-300 bg-base-100 shadow-xl">

        <div class="card-body">

            <h1 class="text-center text-3xl font-bold">
                Forgot Password
            </h1>

            <p class="text-center text-base-content/70">
                Enter your email address and we'll send you a password reset link.
            </p>

            
            <form
                method="POST"
                action="{{ route('password.email') }}"
                class="mt-6 space-y-5"
            >
                @csrf

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

                <button
                    type="submit"
                    class="btn btn-primary w-full"
                >
                    Send Password Reset Link
                </button>

            </form>

            <div class="divider">
                OR
            </div>

            <a
                href="{{ route('login') }}"
                class="btn btn-ghost"
            >
                Back to Login
            </a>

        </div>

    </div>

</x-layouts.auth>
