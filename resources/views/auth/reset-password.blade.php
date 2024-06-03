<!-- resources/views/auth/reset-password.blade.php -->
<form action="{{ route('password.update') }}" method="POST" class="form-box">
    @csrf
    <h3 class="h4 text-black mb-4">Reset Password</h3>
    <input type="hidden" name="token" value="{{ $token }}">
    <div class="form-group">
        <input type="email" class="form-control" name="email" placeholder="Email Address" required>
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="New Password" required>
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm New Password" required>
    </div>
    @error('email')
    <span class="text-danger">{{ $message }}</span>
    @enderror
    <div class="form-group">
        <input type="submit" class="btn btn-primary btn-pill" value="Reset Password">
    </div>
</form>
