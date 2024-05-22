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


    <section class="py-5 mb-md-5 mt-2 mx-3 bg-opacity-50"
        style="background-image: url('{{ asset('/assets/img/tah.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="container">
            <div class="row text-white py-4">
                <div class="col-lg-8">
                    <h2 class="display-5 fw-bold">Appointment Detail</h2>

                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="card mb-4">
            <div class="card-body">

                <div class="card-header">
                    Branch Name
                </div>

                <div class="card-body">

                    <div class="row mb-2">
                        <div class="col-md-3 fw-bold">Doctor Name. :</div>
                        <div class="col-md-9">
                            <p>s</p>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-3 fw-bold">Date:</div>
                        <div class="col-md-9">
                            1/5/2024
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-3 fw-bold">Time:</div>
                        <div class="col-md-9">
                            <p>s</p>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-3 fw-bold">Services:</div>
                        <div class="col-md-9">
                            <p>s</p>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-3 fw-bold">Room No. :</div>
                        <div class="col-md-9">
                            <p>s</p>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-3 fw-bold">Status :</div>
                        <div class="col-md-9">
                            <p>s</p>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-3 fw-bold">Comment :</div>
                        <div class="col-md-9">
                            <p>s</p>
                        </div>
                    </div>

                </div>

                <div class="card-footer text-center">
                    {{ $id }}


                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne" aria-expanded="false"
                                    aria-controls="flush-collapseOne">
                                    Feedback Form
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <form action="#" method="post">
                                        <div class="mb-3">
                                            <label for="feedback" class="form-label">Feedback</label>
                                            <textarea class="form-control" id="feedback" name="feedback" required></textarea>
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
    </div>
@endsection
