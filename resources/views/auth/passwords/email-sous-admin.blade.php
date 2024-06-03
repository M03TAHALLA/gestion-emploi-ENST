<form method="POST" action="{{ route('sous_admin.password.email') }}">
    @csrf
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required autofocus>
    </div>
    <button type="submit">Send Password Reset Link</button>
</form>
