<x-layouts.app>

    <div class="bg-base-300 py-10">

        <div class="mx-auto max-w-7xl px-4">

            {{-- Breadcrumb --}}
            <div class="breadcrumbs mb-6 text-sm">
                <ul>
                    <li>
                        <a href="{{ route('home.index') }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('profile.show') }}">My Account</a>
                    </li>
                    <li>Edit Profile</li>
                </ul>
            </div>

            {{-- Heading --}}
            <div class="mb-8">
                <h1 class="text-4xl font-bold">Edit Profile</h1>
                <p class="mt-2 text-base-content/70">Update your account information and profile picture.</p>
            </div>

            <div class="grid gap-8 lg:grid-cols-3">

                {{-- ============================================================
                     Profile Picture
                ============================================================= --}}
                <div>
                    <div class="card border border-base-300 bg-base-100 shadow-xl">
                        <div class="card-body items-center text-center">

                            {{-- Avatar --}}
                            @if(auth()->user()->avatar)
                                <div class="avatar">
                                    <div class="w-32 rounded-full ring ring-primary ring-offset-4 ring-offset-base-100">
                                        <img src="{{ Storage::url(auth()->user()->avatar) }}"
                                             alt="{{ auth()->user()->name }} avatar">
                                    </div>
                                </div>
                            @else
                                <div class="avatar placeholder">
                                    <div
                                        class="w-32 rounded-full bg-neutral text-neutral-content ring ring-primary ring-offset-4 ring-offset-base-100 flex items-center justify-center text-3xl font-bold">
                                        <span>{{ strtoupper(substr(auth()->user()->name, 0, 2)) }}</span>
                                    </div>
                                </div>
                            @endif


                            {{-- User Information --}}
                            <h2 class="mt-5 text-2xl font-bold">{{ auth()->user()->name }}</h2>
                            <p class="text-base-content/60">{{ auth()->user()->email }}</p>

                            {{-- Avatar Upload Form --}}
                            <form method="POST" action="{{ route('profile.avatar.update') }}"
                                  enctype="multipart/form-data"
                                  class="mt-6 w-full">
                                @csrf
                                <div>
                                    <label for="avatar" class="label">
                                        <span class="label-text font-semibold">Profile Picture</span>
                                    </label>
                                    <input id="avatar" name="avatar" type="file"
                                           accept="image/jpeg,image/png,image/webp"
                                           class="file-input file-input-bordered file-input-primary w-full">
                                    <p class="mt-2 text-left text-xs text-base-content/60">JPG, PNG or WebP. Maximum
                                        size 2 MB.</p>
                                </div>

                                <button type="submit" class="btn btn-outline btn-primary mt-5 w-full">Upload Photo
                                </button>
                            </form>

                            {{-- Delete Avatar Form (Only shows if avatar exists) --}}
                            @if(auth()->user()->avatar)
                                <form method="POST" action="{{ route('profile.avatar.destroy') }}" class="w-full mt-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-ghost btn-error btn-sm w-full">Remove Photo
                                    </button>
                                </form>
                            @endif

                            {{-- System Alerts --}}
                            @if(session('success'))
                                <div
                                    class="alert alert-success mt-4 py-2 text-sm text-success-content">{{ session('success') }}</div>
                            @endif
                            @error('avatar')
                            <div class="alert alert-error mt-4 py-2 text-sm text-error-content">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>
                </div>

                {{-- ============================================================
                     Personal Information
                ============================================================= --}}
                <div class="lg:col-span-2">
                    <div class="card border border-base-300 bg-base-100 shadow-xl">
                        <div class="card-body">
                            <h2 class="card-title">Personal Information</h2>
                            <div class="divider"></div>

                            {{-- Fortify Profile Form --}}
                            <form method="POST" action="{{ route('user-profile-information.update') }}"
                                  class="space-y-6">
                                @csrf
                                @method('PUT')

                                {{-- Name --}}
                                <div>
                                    <label for="name" class="label">
                                        <span class="label-text">Full Name</span>
                                    </label>
                                    <input id="name" name="name" type="text"
                                           value="{{ old('name', auth()->user()->name) }}" autocomplete="name"
                                           class="input input-bordered w-full @error('name') input-error @enderror">
                                    @error('name')
                                    <p class="mt-2 text-sm text-error">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Email --}}
                                <div>
                                    <label for="email" class="label">
                                        <span class="label-text">Email Address</span>
                                    </label>
                                    <input id="email" name="email" type="email"
                                           value="{{ old('email', auth()->user()->email) }}" autocomplete="email"
                                           class="input input-bordered w-full @error('email') input-error @enderror">
                                    @error('email')
                                    <p class="mt-2 text-sm text-error">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Submit Button --}}
                                <div class="flex justify-end pt-4">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layouts.app>
