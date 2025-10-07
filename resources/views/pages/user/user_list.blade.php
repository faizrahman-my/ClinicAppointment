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
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Branch</th>
                        <th>Role</th>
                        <th>Option</th>
                    </tr>
                </thead>
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
                                    <option value="">Select Branch</option>
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
                                    <option value="">Select Role</option>
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

    <!-- Toast Container -->
    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="actionToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto"></strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body" id="toastMessage">
                Action completed successfully!
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
                processing: true,
                serverSide: false,
                responsive: true,
                ajax: '{{ route('users-list') }}',
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'username', name: 'username'},
                    {data: 'email', name: 'email'},
                    {data: 'branch', name: 'branch', orderable: false, searchable: false},
                    {
                        data: 'role', 
                        name: 'role', 
                        orderable: false, 
                        searchable: false,
                        render: function(data, type, row) {
                            return '<span class="badge bg-secondary text-dark me-3">' + data + '</span>';
                        }
                    },
                    {
                        data: 'option', 
                        name: 'option', 
                        orderable: false, 
                        searchable: false,
                        render: function(data, type, row) {
                            let buttons = '';
                            if (data.staff_id) {
                                if (data.is_staff == 1) {
                                    buttons += '<button class="btn btn-danger btn-sm badge action-btn" data-action="disable" data-id="' + data.staff_id + '">disable</button> ';
                                } else {
                                    buttons += '<button class="btn btn-success btn-sm badge action-btn" data-action="enable" data-id="' + data.staff_id + '">enable</button> ';
                                }
                            }
                            buttons += '<button class="btn btn-warning btn-sm badge action-btn" data-action="reset" data-id="' + data.user_id + '">reset</button>';
                            return buttons;
                        }
                    }
                ]
            });

            $(document).on('click', '.action-btn', function(e) {
                e.preventDefault();
                const action = $(this).data('action');
                const id = $(this).data('id');
                
                $.ajax({
                    url: '{{ URL::to('users') }}/' + id + '?menu=' + action,
                    type: 'GET',
                    success: function(response) {
                        $('#mytable').DataTable().ajax.reload();
                        $('#toastMessage').text(action === 'disable' ? 'User disabled successfully!' : action === 'enable' ? 'User enabled successfully!' : 'Password reset successfully!');
                        new bootstrap.Toast(document.getElementById('actionToast')).show();
                    },
                    error: function(xhr) {
                        console.warn('Error: ' + xhr.responseText);
                    }
                });
            });

        });
    </script>



@endsection
