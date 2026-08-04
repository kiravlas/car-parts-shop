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

                        Edit Profile

                    </li>

                </ul>

            </div>


            {{-- Heading --}}
            <div class="mb-8">

                <h1 class="text-4xl font-bold">

                    Edit Profile

                </h1>

                <p class="mt-2 text-base-content/70">

                    Update your account information.

                </p>

            </div>


            <div class="grid gap-8 lg:grid-cols-3">


                {{-- Left --}}
                <div>

                    <div class="card border border-base-300 bg-base-100 shadow-xl">

                        <div class="card-body items-center text-center">

                            <div class="avatar">

                                <div class="w-32 rounded-full ring ring-primary ring-offset-4 ring-offset-base-100">

                                    <img
                                        src="https://placehold.co/300"
                                        alt="Avatar">

                                </div>

                            </div>

                            <h2 class="mt-5 text-2xl font-bold">

                                {{ auth()->user()->name }}

                            </h2>

                            <p class="text-base-content/60">

                                {{ auth()->user()->email }}

                            </p>

                            <button
                                class="btn btn-outline btn-primary mt-6"
                                disabled>

                                Upload Avatar

                            </button>

                            <p class="mt-3 text-xs text-base-content/60">

                                Coming soon

                            </p>

                        </div>

                    </div>

                </div>


                {{-- Form --}}
                <div class="lg:col-span-2">

                    <div class="card border border-base-300 bg-base-100 shadow-xl">

                        <div class="card-body">

                            <h2 class="card-title">

                                Personal Information

                            </h2>

                            <div class="divider"></div>

                            <form
                                method="POST"
                                action="{{ route('user-profile-information.update') }}"
                                class="space-y-6">

                                @csrf
                                @method('PUT')



                                {{-- Name --}}
                                <div>

                                    <label
                                        for="name"
                                        class="label">

                                    <span class="label-text">

                                        Full Name

                                    </span>

                                    </label>

                                    <input
                                        id="name"
                                        name="name"
                                        type="text"
                                        value="{{ old('name', auth()->user()->name) }}"
                                        class="input input-bordered w-full @error('name') input-error @enderror">

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
                                        class="label">

                                    <span class="label-text">

                                        Email Address

                                    </span>

                                    </label>

                                    <input
                                        id="email"
                                        name="email"
                                        type="email"
                                        value="{{ old('email', auth()->user()->email) }}"
                                        class="input input-bordered w-full @error('email') input-error @enderror">

                                    @error('email')

                                    <p class="mt-2 text-sm text-error">

                                        {{ $message }}

                                    </p>

                                    @enderror

                                </div>


                                @unless(auth()->user()->hasVerifiedEmail())

                                    <div class="alert alert-warning">

                                    <span>

                                        Your email address has not been verified.

                                    </span>

                                    </div>

                                @endunless


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

                                        Save Changes

                                    </button>

                                </div>

                            </form>

                        </div>

                    </div>


                    {{-- Future Features --}}
                    <div class="card mt-8 border border-dashed border-base-300 bg-base-100">

                        <div class="card-body">

                            <h2 class="card-title text-base-content/70">

                                Coming Soon

                            </h2>

                            <ul class="space-y-2 text-base-content/60">

                                <li>

                                    ✓ Avatar Upload

                                </li>

                                <li>

                                    ✓ Saved Vehicles

                                </li>

                                <li>

                                    ✓ Shipping Addresses

                                </li>

                                <li>

                                    ✓ Notification Preferences

                                </li>

                            </ul>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-layouts.app>
