@extends('layouts.app')
@section('title','Sign Up')
@section('content')
    <div class="auth-page-wrapper pt-5">
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="index" class="d-inline-block auth-logo">
                                    <img src="{{ URL::asset('images/logos/logo-large.png') }}" alt=""
                                        height="60">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4 loginCard">

                            <div class="card-body">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary" style="color:#e30b0b !important;">Welcome Back !</h5>
                                    <p class="text-muted">Sign up to continue to Monday Club Golf.</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form action="{{ route('register') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                                id="name" name="name" placeholder="name here...">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="username" class="form-label">UserName<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                                id="username" name="username" placeholder="username here...">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                                id="email" name="email" placeholder="email here...">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password<span
                                                    class="text-danger">*</span></label>
                                            <input type="password" class="form-control @error('email') is-invalid @enderror"
                                                id="password" name="password" placeholder="password here...">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="confirmPassword" class="form-label">Confirm Password<span
                                                    class="text-danger">*</span></label>
                                            <input type="password" class="form-control @error('email') is-invalid @enderror"
                                                id="confirmPassword" name="password_confirmation" placeholder="password here...">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="auth-remember-check">
                                            <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                        </div>

                                        <div class="mt-4">
                                            <button class="btn btn-success w-100"
                                                style="background: #e30b0b; border-color:#e30b0b;" type="submit">Sign
                                                Up</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="text-center mt-3">
                                    <p class="text-muted">Already have account?
                                        <a href="{{ route('login') }}" class="text-primary" style="color:#e30b0b !important;">
                                            Sign in
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/particles.js/particles.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/particles.app.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/password-addon.init.js') }}"></script>
@endsection
