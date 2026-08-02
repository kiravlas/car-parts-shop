<h1>Register</h1>

<form method="POST" action="{{route('register.store')}}">

    @csrf

    <div>
        <label>Name</label>
        <input
            type="text"
            name="name"
            value="{{ old('name') }}"
        >

        @error('name')
        <p>{{ $message }}</p>
        @enderror
    </div>


    <div>
        <label>Email</label>
        <input
            type="email"
            name="email"
            value="{{ old('email') }}"
        >

        @error('email')
        <p>{{ $message }}</p>
        @enderror
    </div>


    <div>
        <label>Password</label>
        <input
            type="password"
            name="password"
        >

        @error('password')
        <p>{{ $message }}</p>
        @enderror
    </div>


    <div>
        <label>Confirm password</label>

        <input
            type="password"
            name="password_confirmation"
        >
    </div>


    <button type="submit">
        Register
    </button>

</form>
