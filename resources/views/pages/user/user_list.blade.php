@extends('templates.main')

@section('title', 'Manage User | Klinik Azalea')

@section('manageuser-active')active @endsection

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
    <div class="card card-header-actions mb-4 container p-4">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <p class="d-flex align-items-center h-100">User List</p>
                </div>

                <div class="col-6 d-flex justify-content-end">
                    <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add Staff
                    </button>
                </div>

            </div>
        </div>
        <div class="card-body">


            <div class="d-flex align-items-center justify-content-between px-4 border-bottom border-1 py-2">
                <div class="d-flex align-items-center">
                    <i class="fab fa-cc-visa fa-2x cc-color-visa"></i>
                    <div class="ms-4">
                        <div>name</div>
                    </div>
                </div>
                <div class="ms-4">
                    <span class="badge bg-light text-dark me-3">user</span>

                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                        <button type="button" class="btn btn-primary">Manage</button>
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">

                                <form action="" method="">
                                    {{ method_field('PUT') }}
                                    @csrf
                                    <input type="hidden" name="task_id" value="" autocomplete="off">
                                    <button type="submit" class="dropdown-item">In
                                        Progress</button>
                                </form>

                                <form action="" method="">
                                    {{ method_field('PUT') }}
                                    @csrf
                                    <input type="hidden" name="task_id" value="" autocomplete="off">
                                    <button type="submit" class="dropdown-item">Completed</button>
                                </form>


                                <form action="" method="">
                                    {{ method_field('DELETE') }}
                                    @csrf
                                    <input type="hidden" name="task_id" value="" autocomplete="off">
                                    <button type="submit" class="dropdown-item">Delete</button>
                                </form>

                                <a href="" class="dropdown-item">Remove Account</a>

                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Staff</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="px-2">
                        <form action="{{ URL::to('users') }}" method="post">
                            @method('post')
                            @csrf

                            <div class="form-floating mb-3 has-danger">
                                <input value="" type="text" name="name" class="form-control @error('name')is-invalid @enderror"
                                    placeholder="">
                                <label>Name</label>
                                <div class="invalid-feedback text-start">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="form-floating mb-3 has-danger">
                                <input value="" type="text" name="username" class="form-control @error('username')is-invalid @enderror"
                                    placeholder="">
                                <label>Username</label>
                                <div class="invalid-feedback text-start">
                                    @error('username')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="form-floating mb-3 has-danger">
                                <input value="" type="text" name="email" class="form-control @error('email')is-invalid @enderror"
                                    placeholder="">
                                <label>Email</label>
                                <div class="invalid-feedback text-start">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="form-floating mb-3 has-danger">

                                <select name="branch" class="form-select form-control @error('branch')is-invalid @enderror">
                                    @foreach ($clinic_list as $clinic)
                                        <option value="{{ $clinic->id }}">{{ $clinic->branch }}</option>
                                    @endforeach
                                </select>
                                <label>Branch</label>
                                <div class="invalid-feedback text-start">
                                    @error('branch')
                                        {{ $message }}
                                    @enderror
                                </div>

                            </div>

                            <div class="form-floating mb-3 has-danger">

                                <select name="role" class="form-select form-control @error('role')is-invalid @enderror">
                                    <option value="0">Doctor</option>
                                    <option value="1">Admin</option>
                                </select>
                                <label>Role</label>
                                <div class="invalid-feedback text-start">
                                    @error('role')
                                        {{ $message }}
                                    @enderror
                                </div>

                            </div>


                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block mb-4">
                                Create
                            </button>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
