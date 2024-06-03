<form action="{{ route('password.email') }}" method="POST" class="form-box">
    @csrf
    <h3 class="h4 text-black mb-4">Forgot Password</h3>
    <div class="form-group">
        <input type="email" class="form-control" name="email" placeholder="Email Address">
    </div>
    @error('email')
    <span class="text-danger">{{ $message }}</span>
    @enderror
    <div class="form-group">
        <input type="submit" class="btn btn-primary btn-pill" value="Send Password Reset Link">
    </div>
</form>
