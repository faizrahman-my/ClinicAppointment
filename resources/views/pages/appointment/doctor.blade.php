@extends('templates.main')

@section('title', 'My Appointment | Klinik Azalea')

@section('staff-appointment-active')active @endsection



@section('content')

    <div class="container">
        <h1 class="text-primary mt-5">My Appointments</h1>

        <!-- Sample Appointment 1 -->
        @foreach ($appointment_list as $appointment)
            <div class="card my-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $appointment['patient'] }}</h5>
                    <p class="card-text"><strong>Branch:</strong> {{ $appointment['clinic'] }}</p>
                    <p class="card-text"><strong>Date:</strong> {{ $appointment['date'] }}</p>
                    <p class="card-text"><strong>Time:</strong> {{ $appointment['hour'] }} </p>
                    <p class="card-text"><strong>Status:</strong> {{ $appointment['status'] }}</p>

                    <!-- View Details Modal Button -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#appointmentDetailsModal1">
                        View Details
                    </button>
                </div>
            </div>

            <!-- Appointment Details Modal 1 -->
            <div class="modal fade" id="appointmentDetailsModal1" tabindex="-1"
                aria-labelledby="appointmentDetailsModalLabel1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="appointmentDetailsModalLabel1">Appointment Details -
                                {{ $appointment['patient'] }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Branch:</strong> {{ $appointment['clinic'] }}</p>
                            <p><strong>Date:</strong> {{ $appointment['date'] }}</p>
                            <p><strong>Time:</strong> {{ $appointment['hour'] }}</p>
                            <p><strong>Status:</strong> {{ $appointment['status'] }}</p>
                            <p><strong>Purpose:</strong> {{ $appointment['reason'] }}</p>
                            <p><strong>Room No. :</strong> {{ $appointment['room'] }}</p>
                            <p class="card-text"><strong>Comments:</strong> <br>{!! nl2br($appointment['comment']) !!}</p>
                            <p class="card-text"><strong>Description:</strong> <br>{!! nl2br($appointment['desc']) !!}</p>

                            <form action="{{ URL::to('appointment/doctor') }}/{{ $appointment['id'] }}" method="post">
                                @method('put')
                                @csrf
                                <div class="form-group">
                                    <label for="">Change Status</label>
                                    <select class="form-control" name="appointment_status">
                                        <option value="waiting list">waiting list</option>
                                        <option value="canceled">canceled</option>
                                        <option value="ongoing">ongoing</option>
                                        <option value="completed">completed</option>
                                    </select>
                                </div>

                                <div class="form-group mt-3">
                                    <label for="">Doctor's Internal Comment</label>
                                    <textarea class="form-control" name="doctor_desc" rows="3"></textarea>
                                </div>

                                <div class="form-group mt-3">
                                    <label for="">Comment for Patient</label>
                                    <textarea class="form-control" name="doctor_comment" rows="3"></textarea>
                                </div>

                                <button type="submit" class="btn btn-outline-success mt-2">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

@endsection
