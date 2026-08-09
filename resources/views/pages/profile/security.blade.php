<x-layouts.app>

    <div class="min-h-screen bg-base-300 py-10">

        <div class="mx-auto max-w-4xl px-4">


            {{-- Breadcrumb --}}
            <div class="breadcrumbs mb-8 text-sm">

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


            {{-- Page Header --}}
            <div class="mb-8">

                <div class="flex items-center gap-4">

                    <div
                        class="flex size-14 shrink-0 items-center justify-center rounded-2xl bg-primary/10 text-primary">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.8"
                            stroke="currentColor"
                            class="size-7">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M16.5 10.5V6.75a4.5 4.5 0 0 0-9 0v3.75m-.75 0h10.5A1.5 1.5 0 0 1 18.75 12v7.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 6.75 19.5V12a1.5 1.5 0 0 1 1.5-1.5Z"/>

                        </svg>

                    </div>


                    <div>

                        <h1 class="text-4xl font-bold">
                            Security
                        </h1>

                        <p class="mt-1 text-base-content/70">
                            Change your password to keep your account secure.
                        </p>

                    </div>

                </div>

            </div>


            {{-- Password Card --}}
            <div class="card border border-base-300 bg-base-100 shadow-xl">

                <div class="card-body p-6 sm:p-8">


                    <div>

                        <h2 class="text-2xl font-bold">
                            Change Password
                        </h2>

                        <p class="mt-1 text-sm text-base-content/60">
                            Enter your current password and choose a new one.
                        </p>

                    </div>


                    <div class="divider"></div>


                    {{-- Fortify Form --}}
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

                                <span class="label-text font-medium">
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

                                <span class="label-text font-medium">
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

                                <span class="label-text font-medium">
                                    Confirm New Password
                                </span>

                            </label>


                            <input
                                id="password_confirmation"
                                name="password_confirmation"
                                type="password"
                                autocomplete="new-password"
                                class="input input-bordered w-full @error('password_confirmation','updatePassword') input-error @enderror">


                            @error('password_confirmation','updatePassword')

                            <p class="mt-2 text-sm text-error">
                                {{ $message }}
                            </p>

                            @enderror

                        </div>


                        <div class="divider"></div>


                        {{-- Actions --}}
                        <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">

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


            {{-- Security Notice --}}
            <div class="mt-6 flex gap-4 rounded-2xl border border-base-300 bg-base-100 p-5">

                <div class="flex size-10 shrink-0 items-center justify-center rounded-xl bg-success/10 text-success">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.8"
                        stroke="currentColor"
                        class="size-5">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9 12.75 11.25 15 15 9.75m6 2.25a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>

                    </svg>

                </div>


                <div>

                    <h3 class="font-semibold">
                        Keep your password secure
                    </h3>

                    <p class="mt-1 text-sm leading-6 text-base-content/60">
                        Choose a password that you don't use anywhere else
                        and never share it with anyone.
                    </p>

                </div>

            </div>


        </div>

    </div>

</x-layouts.app>
