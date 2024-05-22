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

        <!-- Sample Appointment 1 -->
        <div class="card my-3">
            <div class="card-body">
                <h5 class="card-title">John Doe</h5>
                <p class="card-text"><strong>Branch:</strong> Main Branch</p>
                <p class="card-text"><strong>Date:</strong> 2024-06-01</p>
                <p class="card-text"><strong>Time:</strong> 10:00 </p>
                <p class="card-text"><strong>Status:</strong> Pending</p>

                <form action="#" method="POST">
                    <div class="form-group">
                        <label for="doctor_id_1">Assign Doctor</label>
                        <select class="form-control" name="doctor_id" id="doctor_id_1">
                            <option value="1">Dr. Smith</option>
                            <option value="2">Dr. Jones</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-outline-success mt-2">Approve</button>
                    <a href="" class="btn btn-outline-primary text-center mt-2">Reject</a>
                </form>
            </div>
        </div>

        <!-- Sample Appointment 2 -->
        <div class="card my-3">
            <div class="card-body">
                <h5 class="card-title">Jane Smith</h5>
                <p class="card-text"><strong>Branch:</strong> Downtown Branch</p>
                <p class="card-text"><strong>Date:</strong> 2024-06-02</p>
                <p class="card-text"><strong>Time:</strong> 10:00 </p>
                <p class="card-text"><strong>Status:</strong> Pending</p>

                <form action="#" method="POST">
                    <div class="form-group">
                        <label for="doctor_id_2">Assign Doctor</label>
                        <select class="form-control" name="doctor_id" id="doctor_id_2">
                            <option value="1">Dr. Smith</option>
                            <option value="2">Dr. Jones</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-outline-success mt-2">Approve</button>
                    <a href="" class="btn btn-outline-primary text-center mt-2">Reject</a>
                </form>
            </div>
        </div>

        <!-- Sample Appointment 3 -->
        <div class="card my-3">
            <div class="card-body">
                <h5 class="card-title">Mary Johnson</h5>
                <p class="card-text"><strong>Branch:</strong> Eastside Branch</p>
                <p class="card-text"><strong>Date:</strong> 2024-06-03</p>
                <p class="card-text"><strong>Status:</strong> Approved</p>
                <p class="card-text"><strong>Assigned Doctor:</strong> Dr Smith</p>
                <p class="text-muted">This appointment has been rejected.</p>
                <p class="card-text"><strong>Comments:</strong> Doctor is on leave</p>
            </div>


        </div>

        {{-- <style>
            .form-group {
                margin-right: 10px;
                /* Adjust margin value for desired spacing */
            }

            .form-group:last-child {
                /* Remove margin from the last element */
                margin-right: 0;
            }
        </style> --}}
    @endsection
