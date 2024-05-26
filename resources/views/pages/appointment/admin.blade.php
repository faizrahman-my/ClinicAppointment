@extends('templates.main')

@section('title', 'My Appointment | Klinik Azalea')

@section('myappointment-active')active @endsection

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


    <div class="container">
        <h1 class="text-primary mt-5">All Appointments</h1>


        <!-- Filter Function -->
        <form id="filter-form" class="mb-4">
            <div class="form-row d-flex">
                <div class="form-group col-md-6">
                    <label for="branch-filter">Filter by Branch</label>
                    <select class="form-control" id="branch-filter" name="branch">
                        <option value="all">All Branches</option>
                        <option value="main">Main Branch</option>
                        <option value="downtown">Downtown Branch</option>
                        <option value="eastside">Eastside Branch</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="status-filter">Filter by Status</label>
                    <select class="form-control" id="status-filter" name="status">
                        <option value="all">All Statuses</option>
                        <option value="pending">Pending</option>
                        <option value="approved">Approved</option>
                        <option value="rejected">Rejected</option>
                    </select>
                </div>
            </div>
        </form>

        <!-- Sample Appointment 2 -->
        @foreach ($appointment_list as $appointment)
            @if ($appointment['status'] == 'pending')
                <div class="card my-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $appointment['patient'] }}</h5>
                        <p class="card-text"><strong>Branch:</strong> {{ $appointment['clinic'] }}</p>
                        <p class="card-text"><strong>Date:</strong> {{ $appointment['date'] }}</p>
                        <p class="card-text"><strong>Time:</strong> {{ $appointment['time'] }} </p>
                        <p class="card-text"><strong>Purpose:</strong> {{ $appointment['reason'] }} </p>
                        <p class="card-text"><strong>Status:</strong> {{ ucwords($appointment['status']) }}</p>


                        <div class="card-footer text-center">


                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseOne" aria-expanded="false"
                                            aria-controls="flush-collapseOne">
                                            Approve
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <form
                                                action="{{ URL::to('appointment/admin/approve') }}/{{ $appointment['id'] }}"
                                                method="post">
                                                @method('put')
                                                @csrf
                                                <div class="form-floating mb-3 has-danger">
                                                    <input value="" type="time" name="appointment_hour"
                                                        class="form-control @error('appointment_hour')is-invalid @enderror" placeholder="">
                                                    <label>Appointment Hour</label>
                                                    <div class="invalid-feedback text-start">
                                                        @error('appointment_hour')
                                                            {{ $message }}
                                                        @enderror
                                                    </div>

                                                </div>

                                                <div class="form-floating mb-3 has-danger">

                                                    <select name="doctor_assign"
                                                        class="form-select form-control @error('doctor_assign')is-invalid @enderror">
                                                        @foreach ($staff_list as $staff)
                                                            <option value="{{ $staff['id'] }}">{{ $staff['name'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <label>Assign Doctor</label>
                                                    <div class="invalid-feedback text-start">
                                                        @error('doctor_assign')
                                                            {{ $message }}
                                                        @enderror
                                                    </div>

                                                </div>

                                                <div class="form-floating mb-3 has-danger">
                                                    <input value="" type="text" name="room_no"
                                                        class="form-control @error('room_no')is-invalid @enderror" placeholder="">
                                                    <label>Room Number</label>
                                                    <div class="invalid-feedback text-start">
                                                        @error('room_no')
                                                            {{ $message }}
                                                        @enderror
                                                    </div>

                                                </div>


                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>


                        <div class="card-footer text-center">


                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                            aria-controls="flush-collapseTwo">
                                            Reject
                                        </button>
                                    </h2>
                                    <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <form
                                                action="{{ URL::to('appointment/admin/reject') }}/{{ $appointment['id'] }}"
                                                method="post">
                                                @method('put')
                                                @csrf

                                                <div class="form-floating mb-3 has-danger">
                                                    <textarea class="form-control @error('feedback')is-invalid @enderror" id="feedback" name="feedback"></textarea>
                                                    <label>Comment</label>
                                                    <div class="invalid-feedback text-start">
                                                        @error('feedback')
                                                            {{ $message }}
                                                        @enderror
                                                    </div>

                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>


                    </div>
                </div>
            @else
                <!-- Sample Appointment 3 -->
                <div class="card my-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $appointment['patient'] }}</h5>
                        <p class="card-text"><strong>Branch:</strong> {{ $appointment['clinic'] }}</p>
                        <p class="card-text"><strong>Date:</strong> {{ $appointment['date'] }}</p>
                        <p class="card-text"><strong>Time:</strong> {{ $appointment['hour'] }}</p>
                        <p class="card-text"><strong>Purpose:</strong> {{ $appointment['reason'] }} </p>
                        <p class="card-text"><strong>Status:</strong> {{ ucwords($appointment['status']) }}</p>
                        <p class="card-text"><strong>Assigned Doctor:</strong> {{ $appointment['staff'] }}</p>
                        <p class="text-muted">This appointment has been
                            {{ $appointment['status'] == 'rejected' ? $appointment['status'] : 'approved' }}.</p>
                        <p class="card-text"><strong>Comments:</strong> <br>{!! nl2br($appointment['comment']) !!}</p>
                        <p class="card-text"><strong>Description:</strong> <br>{!! nl2br($appointment['desc']) !!}</p>
                    </div>


                </div>
            @endif
        @endforeach




    @endsection
