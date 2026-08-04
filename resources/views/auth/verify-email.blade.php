<x-layouts.auth>

    <div class="card border border-base-300 bg-base-100 shadow-xl">

        <div class="card-body text-center">

            <h1 class="text-3xl font-bold">
                Verify your email
            </h1>

            <p class="mt-3 text-base-content/70">
                Thanks for registering! Before you can continue, please verify your email address by clicking the link
                we just sent you.
            </p>

            <form
                method="POST"
                action="{{ route('verification.send') }}"
                class="mt-8"
            >
                @csrf

                <button
                    type="submit"
                    class="btn btn-primary w-full"
                >
                    Resend Verification Email
                </button>

            </form>

            <form
                method="POST"
                action="{{ route('logout') }}"
                class="mt-3"
            >
                @csrf

                <button
                    class="btn btn-ghost w-full"
                >
                    Logout
                </button>

            </form>

        </div>

    </div>

</x-layouts.auth>
