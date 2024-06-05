@extends('templates.main')

@section('title', 'Profile | Klinik Azalea')

@section('account-active')active @endsection



@section('content')



    <div class="d-flex align-items-center justify-content-center mb-2">
        <div class="linear-gradient d-flex align-items-center justify-content-center rounded-circle">
            <div
                class="border border-4 border-white d-flex align-items-center justify-content-center rounded-circle overflow-hidden">
                <img src="{{ asset('/assets/img/user.jpg') }}" alt="" width="150px" height="150px">
            </div>
        </div>
    </div>
    <div class="text-center">
        <h5 class="fs-5 mb-0 fw-semibold">{{ session()->has('name') ? ucwords(session('name')) : 'unknown' }}</h5>
        @if (session()->has('a'))
            <p class="mb-0 fs-4">{{ session('a') == 1 ? 'Admin' : 'Doctor' }} ({{$clinic_name}})</p>
        @else
            <p class="mb-0 fs-4">{{ session('sa') == 1 ? 'Superadmin' : 'User' }}</p>
        @endif

    </div>



    <div class="mx-4 mt-4">
        <ul class="nav nav-tabs d-flex justify-content-center" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                    type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="true">Profile</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane"
                    type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Change
                    Password</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade show active" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                tabindex="0">


                <section class="h-100 h-custom bg-dark-subtle bg-gradient">
                    <div class="container py-5 h-100">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col-lg-8 col-xl-6">
                                <div class="card rounded-3">

                                    <div class="card-body p-4 p-md-5">
                                        <h4 class="fw-light mb-5">Change your profile detail</h4>
                                        <form action="{{ URL::to('profile') }}" method="post">
                                            @method('put')
                                            @csrf

                                            <div class="form-floating mb-3 has-danger">
                                                <input value="" type="text" name="name"
                                                    class="form-control @error('name')is-invalid @enderror" placeholder="">
                                                <label>Name</label>
                                                <div class="invalid-feedback text-start"> @error('name')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-floating mb-3 has-danger">
                                                <input value="" type="text" name="username"
                                                    class="form-control @error('username')is-invalid @enderror"
                                                    placeholder="">
                                                <label>Username</label>
                                                <div class="invalid-feedback text-start"> @error('username')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3 has-danger">
                                                <input value="" type="email" name="email"
                                                    class="form-control @error('email')is-invalid @enderror"
                                                    placeholder="name@example.com">
                                                <label>Email</label>
                                                <div class="invalid-feedback text-start">
                                                    @error('email')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>


                                            <button type="submit" class="btn btn-primary btn-block mb-4 w-100">
                                                Save
                                            </button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


            </div>


            <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">


                <section class="h-100 h-custom bg-dark-subtle bg-gradient">
                    <div class="container py-5 h-100">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col-lg-8 col-xl-6">
                                <div class="card rounded-3">

                                    <div class="card-body p-4 p-md-5">
                                        <h4 class="fw-light mb-5">Update your password</h4>
                                        <form action="{{ URL::to('profile/password') }}" method="post">
                                            @method('put')
                                            @csrf

                                            <div class="form-floating mb-3 has-danger">
                                                <input type="password" name="old_password"
                                                    class="form-control @error('old_password')is-invalid @enderror"
                                                    placeholder="Password">
                                                <label>Old Password</label>
                                                <div class="invalid-feedback text-start">
                                                    @error('old_password')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                                @if (session()->has('error'))
                                                    <p class="text-danger small">{{ session('error') }}</p>
                                                @endif
                                            </div>

                                            <div class="form-floating mb-3 has-danger">
                                                <input type="password" name="new_password"
                                                    class="form-control @error('new_password')is-invalid @enderror"
                                                    placeholder="Password">
                                                <label>New Password</label>
                                                <div class="invalid-feedback text-start">
                                                    @error('new_password')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                                @if (session()->has('success'))
                                                    <p class="text-danger small">{{ session('success') }}</p>
                                                @endif
                                            </div>


                                            <button type="submit" class="btn btn-primary btn-block mb-4 w-100">
                                                Save
                                            </button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>



            </div>
        </div>

    </div>
@endsection
