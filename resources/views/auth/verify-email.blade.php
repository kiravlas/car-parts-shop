<h1>Verify Email</h1>
<form method="POST" action="{{ route('verification.send') }}">
    @csrf

    <button type="submit">
        Resend verification email
    </button>
</form>
