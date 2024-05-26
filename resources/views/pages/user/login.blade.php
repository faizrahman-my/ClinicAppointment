@extends('templates.main')

@section('title', 'Sign In | Klinik Azalea')

@section('login-active')active @endsection

@section('link-home'){{ URL::to('/') }}@endsection
@section('link-appointment'){{ URL::to('/appointment/reserve') }}@endsection
@section('link-service'){{ URL::to('/service') }}@endsection
@section('link-branch'){{ URL::to('/branch') }}@endsection
@section('link-doctor'){{ URL::to('/doctor') }}@endsection
@section('link-about'){{ URL::to('/about') }}@endsection

@section('link-account'){{ URL::to('/profile') }}@endsection
@section('link-manageuser'){{ URL::to('/users') }}@endsection
@section('link-myappointment'){{ URL::to('/appointment') }}@endsection
@section('link-login'){{ URL::to('/login') }}@endsection

@section('content')
    <section>
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign in</p>

                                    <form class="mx-1 mx-md-4" action="{{ URL::to('login') }}" method="post">
                                        @method('post')
                                        @csrf

                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control @error('username')is-invalid @enderror" name="username"
                                                placeholder="Email/Username">
                                            <label for="floatingInput">Email/Username</label>
                                            <div class="invalid-feedback text-start">
                                                @error('username')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control @error('password')is-invalid @enderror" name="password"
                                                placeholder="Password" autocomplete="off">
                                            <label for="floatingPassword">Password</label>
                                            <div class="invalid-feedback text-start">
                                                @error('password')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                            @if (session()->has('error'))
                                                <p class="text-danger small">{{ session('error') }}</p>
                                            @endif

                                        </div>

                                        <div class="text-center">
                                            <p>or <a href="{{ URL::to('/register') }}">register new account</a></p>
                                        </div>


                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" class="btn btn-primary btn-lg">Confirm</button>
                                        </div>

                                    </form>

                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                                        class="img-fluid" alt="Sample image">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
