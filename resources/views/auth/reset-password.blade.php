<x-layouts.auth>

    <div class="card border border-base-300 bg-base-100 shadow-xl">

        <div class="card-body">

            <h1 class="text-center text-3xl font-bold">
                Reset Password
            </h1>


            <p class="text-center text-base-content/70">
                Create a new password for your account.
            </p>


            <form
                method="POST"
                action="{{ route('password.update') }}"
                class="mt-6 space-y-5"
            >

                @csrf


                <input
                    type="hidden"
                    name="token"
                    value="{{ $request->route('token') }}"
                >


                {{-- Email --}}

                <div>

                    <label class="label">
                    <span class="label-text font-medium">
                        Email Address
                    </span>
                    </label>


                    <input
                        type="email"
                        name="email"
                        value="{{ old('email', $request->email) }}"
                        class="input input-bordered w-full @error('email') input-error @enderror"
                    >


                    @error('email')
                    <p class="text-sm text-error mt-1">
                        {{ $message }}
                    </p>
                    @enderror

                </div>


                {{-- Password --}}

                <div>

                    <label class="label">
                    <span class="label-text font-medium">
                        New Password
                    </span>
                    </label>


                    <input
                        type="password"
                        name="password"
                        class="input input-bordered w-full @error('password') input-error @enderror"
                    >


                    @error('password')
                    <p class="text-sm text-error mt-1">
                        {{ $message }}
                    </p>
                    @enderror

                </div>


                {{-- Confirm Password --}}

                <div>

                    <label class="label">
                    <span class="label-text font-medium">
                        Confirm Password
                    </span>
                    </label>


                    <input
                        type="password"
                        name="password_confirmation"
                        class="input input-bordered w-full"
                    >

                </div>


                <button
                    class="btn btn-primary w-full"
                >
                    Reset Password
                </button>


            </form>


        </div>

    </div>


</x-layouts.auth>
