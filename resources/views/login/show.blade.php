<div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="500">
    <form action="{{ route('login.login') }}" method="POST" class="form-box">
      @csrf
      <h3 class="h4 text-black mb-4">LOG IN</h3>
      <div class="form-group">
        <input type="text" class="form-control" name="email" placeholder="Email Addresss" value="{{ old('email') }}">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="Password">
      </div>
      @error('email')
      <span class="text-danger">{{ $message }}</span>
      @enderror
      <div class="form-group">
        <input type="submit" class="btn btn-primary btn-pill" value="Log In">
      </div>
    </form>

  </div>