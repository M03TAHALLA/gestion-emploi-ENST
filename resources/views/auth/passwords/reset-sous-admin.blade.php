<form method="POST" action="{{ route('sous_admin.password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ $email ?? old('email') }}" required autofocus>
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
    </div>
    <div>
        <label for="password-confirm">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password-confirm" required>
    </div>
    <button type="submit">Reset Password</button>
</form>
