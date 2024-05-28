@extends('templates.main')

@section('title', 'My Appointment | Klinik Azalea')

@section('myappointment-active')active @endsection



@section('content')


    <section class="py-5 mb-md-5 mt-2 mx-3 bg-opacity-50"
        style="background-image: url('{{ asset('/assets/img/tah.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="container">
            <div class="row text-white py-4">
                <div class="col-lg-8">
                    <h2 class="display-5 fw-bold">Appointment Confirmation Status</h2>

                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="card mb-4">
            <div class="card-body">

                <div class="row mb-2">
                    <div class="col-md-3 fw-bold">Date:</div>
                    <div class="col-md-9">
                        {{ $appointment['date'] }}
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-3 fw-bold">Time:</div>
                    <div class="col-md-9">
                        <p>{{ $appointment['time'] }}</p>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-3 fw-bold">Services:</div>
                    <div class="col-md-9">
                        <p>{{ $appointment['reason'] }}</p>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-3 fw-bold">Branch:</div>
                    <div class="col-md-9">
                        <p>{{ $appointment['clinic'] }}</p>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-3 fw-bold">Address:</div>
                    <div class="col-md-9">
                        {{ $appointment['address'] }}
                    </div>
                </div>



            </div>
            <div class="card-footer text-center">
                <div class="row">
                    @if ($appointment['status'] == 'rejected')
                        <div class="d-flex col-12 flex-column py-3">
                            <div class="mb-3">Fill in the form again</div>
                            <a class="btn btn-outline-warning fw-bold fs-5 mx-5"
                                href="{{ URL::to('/appointment/reserve') }}">&#x1F844;</a>
                        </div>
                    @endif

                    <div class="d-flex col-12 flex-column py-3 bg-dark text-white">
                        <div class="mb-3">Status</div>
                        <div class="fw-bold">{{ ucfirst($appointment['status']) }}</div>
                    </div>
                    @if ($appointment['status'] == 'approved')
                        <div class="d-flex col-12 flex-column py-3">
                            <div class="mb-3">Check my appointment</div>
                            <a class="btn btn-outline-success fw-bold fs-5 mx-5"
                                href="{{ URL::to('/appointment/detail') }}/{{ $id }}">&#x1F846;</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
