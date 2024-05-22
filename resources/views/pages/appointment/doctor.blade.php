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
        <h1 class="text-primary mt-5">My Appointments</h1>

        <!-- Sample Appointment 1 -->
        <div class="card my-3">
            <div class="card-body">
                <h5 class="card-title">John Doe</h5>
                <p class="card-text"><strong>Branch:</strong> Main Branch</p>
                <p class="card-text"><strong>Date:</strong> 2024-06-01</p>
                <p class="card-text"><strong>Time:</strong> 10:00 </p>
                <p class="card-text"><strong>Status:</strong> Pending</p>

                <!-- View Details Modal Button -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#appointmentDetailsModal1">
                    View Details
                </button>
            </div>
        </div>

        <!-- Appointment Details Modal 1 -->
        <div class="modal fade" id="appointmentDetailsModal1" tabindex="-1" aria-labelledby="appointmentDetailsModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="appointmentDetailsModalLabel1">Appointment Details - John Doe</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Branch:</strong> Main Branch</p>
                        <p><strong>Date:</strong> 2024-06-01</p>
                        <p><strong>Time:</strong> 10:00</p>
                        <p><strong>Status:</strong> Pending</p>
                        <p><strong>Assigned Doctor:</strong> Dr. Smith</p>

                        <form action="#" method="POST">
                            <div class="form-group">
                                <label for="doctor_id_1">Assign Doctor</label>
                                <select class="form-control" name="doctor_id" id="doctor_id_1">
                                    <option value="1">Dr. Smith</option>
                                    <option value="2">Dr. Jones</option>
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <label for="doctorComment1">Doctor's Internal Comment</label>
                                <textarea class="form-control" id="doctorComment1" name="doctor_comment" rows="3"></textarea>
                            </div>

                            <div class="form-group mt-3">
                                <label for="patientComment1">Comment for Patient</label>
                                <textarea class="form-control" id="patientComment1" name="patient_comment" rows="3"></textarea>
                            </div>

                            <button type="button" class="btn btn-outline-success mt-2">Approve</button>
                            <button type="button" class="btn btn-outline-danger mt-2">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Repeat similar block for other appointments -->

        <!-- Sample Appointment 2 -->
        <div class="card my-3">
            <div class="card-body">
                <h5 class="card-title">Jane Smith</h5>
                <p class="card-text"><strong>Branch:</strong> Downtown Branch</p>
                <p class="card-text"><strong>Date:</strong> 2024-06-02</p>
                <p class="card-text"><strong>Time:</strong> 10:00 </p>
                <p class="card-text"><strong>Status:</strong> Pending</p>

                <!-- View Details Modal Button -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#appointmentDetailsModal2">
                    View Details
                </button>
            </div>
        </div>

        <!-- Appointment Details Modal 2 -->
        <div class="modal fade" id="appointmentDetailsModal2" tabindex="-1" aria-labelledby="appointmentDetailsModalLabel2"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="appointmentDetailsModalLabel2">Appointment Details - Jane Smith</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Branch:</strong> Downtown Branch</p>
                        <p><strong>Date:</strong> 2024-06-02</p>
                        <p><strong>Time:</strong> 10:00</p>
                        <p><strong>Status:</strong> Pending</p>
                        <p><strong>Assigned Doctor:</strong> Dr. Smith</p>

                        <form action="#" method="POST">
                            <div class="form-group">
                                <label for="doctor_id_2">Assign Doctor</label>
                                <select class="form-control" name="doctor_id" id="doctor_id_2">
                                    <option value="1">Dr. Smith</option>
                                    <option value="2">Dr. Jones</option>
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <label for="doctorComment2">Doctor's Internal Comment</label>
                                <textarea class="form-control" id="doctorComment2" name="doctor_comment" rows="3"></textarea>
                            </div>

                            <div class="form-group mt-3">
                                <label for="patientComment2">Comment for Patient</label>
                                <textarea class="form-control" id="patientComment2" name="patient_comment" rows="3"></textarea>
                            </div>

                            <button type="button" class="btn btn-outline-success mt-2">Approve</button>
                            <button type="button" class="btn btn-outline-danger mt-2">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add more appointments as needed -->

    </div>

@endsection
