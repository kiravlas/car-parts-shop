<x-layouts.app>

    <div class="bg-base-300 py-10">

        <div class="mx-auto max-w-7xl px-4">

            {{-- Breadcrumb --}}
            <div class="breadcrumbs mb-6 text-sm">

                <ul>

                    <li>

                        <a href="{{ route('home.index') }}">
                            Home
                        </a>

                    </li>

                    <li>

                        <a href="{{ route('profile.show') }}">
                            My Account
                        </a>

                    </li>

                    <li>

                        Security

                    </li>

                </ul>

            </div>


            {{-- Heading --}}
            <div class="mb-8">

                <h1 class="text-4xl font-bold">

                    Security

                </h1>

                <p class="mt-2 text-base-content/70">

                    Update your password and keep your account secure.

                </p>

            </div>


            <div class="grid gap-8 lg:grid-cols-3">


                {{-- Left --}}
                <div>

                    <div class="card border border-base-300 bg-base-100 shadow-xl">

                        <div class="card-body">

                            <h2 class="card-title">

                                Security Tips

                            </h2>

                            <div class="divider"></div>

                            <ul class="space-y-4 text-sm">

                                <li class="flex gap-3">

                                    <span class="text-success">✔</span>

                                    <span>
                                    Use at least 8 characters.
                                </span>

                                </li>

                                <li class="flex gap-3">

                                    <span class="text-success">✔</span>

                                    <span>
                                    Include uppercase and lowercase letters.
                                </span>

                                </li>

                                <li class="flex gap-3">

                                    <span class="text-success">✔</span>

                                    <span>
                                    Add numbers and symbols.
                                </span>

                                </li>

                                <li class="flex gap-3">

                                    <span class="text-success">✔</span>

                                    <span>
                                    Never share your password.
                                </span>

                                </li>

                            </ul>

                        </div>

                    </div>

                </div>


                {{-- Form --}}
                <div class="lg:col-span-2">

                    <div class="card border border-base-300 bg-base-100 shadow-xl">

                        <div class="card-body">

                            <h2 class="card-title">

                                Change Password

                            </h2>

                            <div class="divider"></div>

                            <form
                                method="POST"
                                action="{{ route('user-password.update') }}"
                                class="space-y-6">

                                @csrf
                                @method('PUT')



                                {{-- Current Password --}}
                                <div>

                                    <label
                                        for="current_password"
                                        class="label">

                                    <span class="label-text">

                                        Current Password

                                    </span>

                                    </label>

                                    <input
                                        id="current_password"
                                        name="current_password"
                                        type="password"
                                        autocomplete="current-password"
                                        class="input input-bordered w-full @error('current_password','updatePassword') input-error @enderror">

                                    @error('current_password','updatePassword')

                                    <p class="mt-2 text-sm text-error">

                                        {{ $message }}

                                    </p>

                                    @enderror

                                </div>


                                {{-- New Password --}}
                                <div>

                                    <label
                                        for="password"
                                        class="label">

                                    <span class="label-text">

                                        New Password

                                    </span>

                                    </label>

                                    <input
                                        id="password"
                                        name="password"
                                        type="password"
                                        autocomplete="new-password"
                                        class="input input-bordered w-full @error('password','updatePassword') input-error @enderror">

                                    @error('password','updatePassword')

                                    <p class="mt-2 text-sm text-error">

                                        {{ $message }}

                                    </p>

                                    @enderror

                                </div>


                                {{-- Confirm Password --}}
                                <div>

                                    <label
                                        for="password_confirmation"
                                        class="label">

                                    <span class="label-text">

                                        Confirm New Password

                                    </span>

                                    </label>

                                    <input
                                        id="password_confirmation"
                                        name="password_confirmation"
                                        type="password"
                                        autocomplete="new-password"
                                        class="input input-bordered w-full">

                                </div>


                                <div class="divider"></div>


                                <div class="flex flex-col gap-3 sm:flex-row sm:justify-end">

                                    <a
                                        href="{{ route('profile.show') }}"
                                        class="btn btn-ghost">

                                        Cancel

                                    </a>

                                    <button
                                        type="submit"
                                        class="btn btn-primary">

                                        Update Password

                                    </button>

                                </div>

                            </form>

                        </div>

                    </div>


                    {{-- Password Requirements --}}
                    <div class="card mt-8 border border-base-300 bg-base-100">

                        <div class="card-body">

                            <h2 class="card-title">

                                Password Requirements

                            </h2>

                            <div class="divider"></div>

                            <div class="grid gap-4 md:grid-cols-2">

                                <div class="alert">

                                    Minimum 8 characters

                                </div>

                                <div class="alert">

                                    Uppercase & lowercase letters

                                </div>

                                <div class="alert">

                                    At least one number

                                </div>

                                <div class="alert">

                                    A special character is recommended

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-layouts.app>
