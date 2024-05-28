@extends('templates.main')

@section('title', 'Manage User | Klinik Azalea')

@section('manageuser-active')active @endsection



@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css" />
@endsection

@section('content')
    <div class="card card-header-actions mb-4 container p-4">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <p class="d-flex align-items-center h-100">User List</p>
                </div>

                <div class="col-6 d-flex justify-content-end">
                    <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                        Add Branch
                    </button>
                    &nbsp;&nbsp;&nbsp;
                    <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add Staff
                    </button>
                </div>

            </div>
        </div>
        <div class="card-body table-responsive">


            <table class="table table-striped table-bordered" id="mytable">
                <thead>
                    <tr>
                        <th>name</th>
                        <th>username</th>
                        <th>email</th>
                        <th>branch</th>
                        <th>role</th>
                        <th>option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user_list as $user)
                        <tr>
                            <td>{{ $user['name'] }}</td>
                            <td>{{ $user['username'] }}</td>
                            <td>{{ $user['email'] }}</td>
                            <td>{{ $user['branch'] }}</td>
                            <td><span class="badge bg-secondary text-dark me-3">{{ $user['role'] }}</span></td>
                            <td>
                                @if ($user['staff_status'] == 1)
                                    <a href="{{ URL::to('users') }}/{{ $user['staff_id'] }}?menu=disable"
                                        class="btn btn-danger btn-sm badge">disable</a>
                                @elseif ($user['staff_status'] == 0)
                                    <a href="{{ URL::to('users') }}/{{ $user['staff_id'] }}?menu=enable"
                                        class="btn btn-success btn-sm badge">enable</a>
                                @endif
                                <a href="{{ URL::to('users') }}/{{ $user['id'] }}?menu=reset"
                                    class="btn btn-warning btn-sm badge">reset</a>
                                <a href="{{ URL::to('users') }}/{{ $user['id'] }}?menu=remove"
                                    class="btn btn-primary btn-sm badge">delete</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>

            </table>


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
                                <input value="" type="text" name="name"
                                    class="form-control @error('name')is-invalid @enderror" placeholder="">
                                <label>Name</label>
                                <div class="invalid-feedback text-start">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="form-floating mb-3 has-danger">
                                <input value="" type="text" name="username"
                                    class="form-control @error('username')is-invalid @enderror" placeholder="">
                                <label>Username</label>
                                <div class="invalid-feedback text-start">
                                    @error('username')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="form-floating mb-3 has-danger">
                                <input value="" type="text" name="email"
                                    class="form-control @error('email')is-invalid @enderror" placeholder="">
                                <label>Email</label>
                                <div class="invalid-feedback text-start">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="form-floating mb-3 has-danger">

                                <select name="branch"
                                    class="form-select form-control @error('branch')is-invalid @enderror">
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

                                <select name="role"
                                    class="form-select form-control @error('role')is-invalid @enderror">
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

    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Branch</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="px-2">
                        <form action="{{ URL::to('branch') }}" method="post">
                            @method('post')
                            @csrf

                            <div class="form-floating mb-3 has-danger">
                                <input value="" type="text" name="branch"
                                    class="form-control @error('branch')is-invalid @enderror" placeholder="">
                                <label>Branch</label>
                                <div class="invalid-feedback text-start">
                                    @error('branch')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="form-floating mb-3 has-danger">
                                <textarea class="form-control @error('address')is-invalid @enderror" id="address" name="address"></textarea>
                                <label>Address</label>
                                <div class="invalid-feedback text-start">
                                    @error('address')
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

@section('script')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>


    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script>
        $(document).ready(function() {

            $('#mytable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true
            });
        });
    </script>



@endsection
