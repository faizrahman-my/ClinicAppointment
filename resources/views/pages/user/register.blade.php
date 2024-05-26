@extends('templates.main')

@section('title', 'Sign Up | Klinik Azalea')

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

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                                    <form class="mx-1 mx-md-4" action="{{ URL::to('register') }}" method="POST">
                                        @method('post')
                                        @csrf

                                        <div class="form-floating mb-3 has-danger">
                                            <input value="{{ old('name') }}" type="text" name="name"
                                                class="form-control @error('name')is-invalid @enderror"
                                                placeholder="jimmy a/l neutron">
                                            <label>Name</label>
                                            <div class="invalid-feedback text-start"> 
                                                @error('name'){{$message}}@enderror
                                            </div>
                                        </div>

                                        <div class="form-floating mb-3 has-danger">
                                            <input value="{{ old('username') }}" type="text" name="username"
                                                class="form-control @error('username')is-invalid @enderror"
                                                placeholder="jimmyneutron">
                                            <label>Username</label>
                                            <div class="invalid-feedback text-start"> 
                                                @error('username'){{$message}}@enderror
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3 has-danger">
                                            <input value="{{ old('email') }}" type="email" name="email"
                                                class="form-control @error('email')is-invalid @enderror"
                                                placeholder="name@example.com">
                                            <label>Email</label>
                                            <div class="invalid-feedback text-start">
                                                @error('email'){{$message}}@enderror
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3 has-danger">
                                            <input type="password" name="password"
                                                class="form-control @error('password')is-invalid @enderror"
                                                placeholder="Password">
                                            <label>Password</label>
                                            <div class="invalid-feedback text-start">
                                                @error('password'){{$message}}@enderror
                                            </div>
                                        </div>

                                        <!-- Submit button -->
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" class="btn btn-primary btn-lg">Confirm Registration</button>
                                        </div>

                                        <div class="text-center">
                                            <p>or <a href="{{ URL::to('/login') }}">login to your account</a></p>
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
