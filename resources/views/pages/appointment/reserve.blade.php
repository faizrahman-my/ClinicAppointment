@extends('templates.main')

@section('title', 'My Appointment | Klinik Azalea')

@section('appointment-active')active @endsection




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
                        <form action="{{ URL::to('appointment/reserve') }}" method="post">
                            @method('post')
                            @csrf

                            <input type="hidden" name="username" value="{{ session('username') }}" autocomplete="off">

                            <div class="form-floating mb-3 has-danger">
                                <input value="" type="date" name="appointment_date"
                                    class="form-control @error('appointment_date')is-invalid @enderror"
                                    placeholder="Start Date">
                                <label>Appointment Date</label>
                                <div class="invalid-feedback text-start">
                                    @error('appointment_date')
                                        {{ $message }}
                                    @enderror
                                </div>

                            </div>

                            <div class="form-floating mb-3 has-danger">

                                <select name="appointment_time"
                                    class="form-select form-control @error('appointment_time')is-invalid @enderror">
                                    @foreach ($time_list as $time)
                                        <option>{{ $time }}</option>
                                    @endforeach
                                </select>
                                <label>Appointment Time</label>
                                <div class="invalid-feedback text-start">
                                    @error('appointment_time')
                                        {{ $message }}
                                    @enderror
                                </div>

                            </div>


                            <div class="form-floating mb-3 has-danger">

                                <select name="service_type"
                                    class="form-select form-control @error('service_type')is-invalid @enderror">
                                    @foreach ($service_list as $service)
                                        <option value="{{ $service }}">{{ $service }}</option>
                                    @endforeach
                                </select>
                                <label>Services Type</label>
                                <div class="invalid-feedback text-start">
                                    @error('service_type')
                                        {{ $message }}
                                    @enderror
                                </div>

                            </div>

                            <div class="form-floating mb-3 has-danger">

                                <select name="clinic_branch"
                                    class="form-select form-control @error('clinic_branch')is-invalid @enderror">
                                    @foreach ($clinic_list as $clinic)
                                        <option value="{{ $clinic->id }}">{{ $clinic->branch }}</option>
                                    @endforeach
                                </select>
                                <label>Clinic Branch</label>
                                <div class="invalid-feedback text-start">
                                    @error('clinic_branch')
                                        {{ $message }}
                                    @enderror
                                </div>

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
