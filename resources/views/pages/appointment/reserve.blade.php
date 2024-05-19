@extends('templates.main')

@section('title', 'My Appointment | Klinik Azalea')

@section('appointment-active')active @endsection


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

    <section class="py-5 mb-md-5 mt-2 mx-3 bg-opacity-50"
        style="background-image: url('{{ asset('/assets/img/tah.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="container">
            <div class="row text-white py-4">
                <div class="col-lg-8">
                    <h2 class="display-5 fw-bold">Doctor Appointment Form</h2>

                </div>
            </div>
        </div>
    </section>

    <div class="card mx-4 mx-md-5 mt-5 mb-4">
        <!-- Section: Design Block -->
        <section class="text-center">
            <div class="card-body py-5 px-md-5">

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="fw-bold mb-5">Set Your Appointment</h2>
                        <form action="" method="">

                            <div class="form-floating mb-3 has-danger">
                                <input value="" type="date" name="" class="form-control is-invalid "
                                    placeholder="Start Date">
                                <label>Appointment Date</label>
                                <div class="invalid-feedback text-start">test</div>

                            </div>

                            <div class="form-floating mb-3 has-danger">

                                <select name="" class="form-select form-control is-invalid">
                                    <option>Morning</option>
                                    <option>Afternoon</option>
                                    <option>Evening</option>
                                    <option>Night</option>
                                </select>
                                <label>Appointment Time</label>
                                <div class="invalid-feedback text-start">test</div>

                            </div>


                            <div class="form-floating mb-3 has-danger">

                                <select name="" class="form-select form-control is-invalid">
                                    <option>XRay</option>
                                    <option>Urine Test</option>
                                    <option>Blood Donor</option>
                                    <option>Medical Checkup Only</option>
                                </select>
                                <label>Services Type</label>
                                <div class="invalid-feedback text-start">test</div>

                            </div>

                            <div class="form-floating mb-3 has-danger">

                                <select name="" class="form-select form-control is-invalid">
                                    <option>Pj</option>
                                    <option>Shah Alam</option>
                                    <option>KD</option>
                                </select>
                                <label>Clinic Branch</label>
                                <div class="invalid-feedback text-start">test</div>

                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary mb-4 col-12">
                                Confirm
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>

    

@endsection
