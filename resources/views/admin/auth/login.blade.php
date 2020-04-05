@extends('admin.auth.layouts.app')

@section('content')

<div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
style="background:url({{asset('admins/assets/images/big/auth-bg.jpg')}}) no-repeat center center;">
<div class="auth-box row">
    <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url({{asset('admin/assets/images/big/3.jpg')}});">
    </div>
    <div class="col-lg-5 col-md-7 bg-white">
        <div class="p-3">
            <div class="text-center">
                <img src="{{asset('admins/assets/images/big/icon.png')}}" alt="wrapkit">
            </div>
            <h2 class="mt-3 text-center">Sign In</h2>
            <p class="text-center">Enter your email address and password to access admin panel.</p>
            <form class="mt-4" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="text-dark" for="uname">Email</label>
                            <input class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus id="uname" type="email"
                                placeholder="enter your email" >

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="text-dark" for="pwd">Password</label>
                            <input class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" id="pwd" type="password"
                                placeholder="enter your password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12 text-center">
                        <button type="submit" class="btn btn-block btn-dark">Sign In</button>
                    </div>
                    <div class="col-lg-12 text-center mt-5">
                        Don't have an account? <a href="{{route('admin.register')}}" class="text-danger">Sign Up</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

@endsection
