@extends('admin.auth.layouts.app')

@section('content')

<div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
style="background:url({{asset('admin/assets/images/big/auth-bg.jpg')}}) no-repeat center center;">
<div class="auth-box row text-center">
    <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url({{asset('admin/assets/images/big/3.jpg')}});">
    </div>
    <div class="col-lg-5 col-md-7 bg-white">
        <div class="p-3">
            <img src="{{asset('admin/assets/images/big/icon.png')}}" alt="wrapkit">
            <h2 class="mt-3 text-center">Sign Up for Free</h2>
            <form class="mt-4" method="POST" action="{{ route('register') }}">
                @csrf
                
                <input type="text" value="1" name="role_id" hidden>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus type="text" placeholder="your name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="email address" type="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="password" type="password" >
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12 text-center">
                        <button type="submit" class="btn btn-block btn-dark">Sign Up</button>
                    </div>
                    <div class="col-lg-12 text-center mt-5">
                        Already have an account? <a href="{{route('admin.login')}}" class="text-danger">Sign In</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

@endsection
