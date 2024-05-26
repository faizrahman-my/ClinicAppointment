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
                    <h2 class="display-5 fw-bold">My Appointment Record</h2>

                </div>
            </div>
        </div>
    </section>

    <section class="mt-4">
        <div class="container">


            <div class="row">
                <div class="col-lg-12">
                    <div>



                        @if ($appointment_list)
                            @foreach ($appointment_list as $appointment)
                                <div class="card mt-4">
                                    <div class="p-4 card-body">
                                        <div class="align-items-center row">
                                            <div class="col-md-5 col-12">
                                                <div class="mt-3 mt-lg-0">
                                                    <h5 class="fs-19 mb-0">
                                                        <a class="primary-link"
                                                            href="{{ URL::to('/appointment/status/') }}/{{ $appointment['id'] }}">{{ $appointment['reason'] }}</a>
                                                    </h5>
                                                    <p class="text-muted my-1">
                                                        {{ $appointment['staff'] }}
                                                    </p>
                                                    <ul class="list-inline mb-0 text-muted mb-2">
                                                        <li class="list-inline-item"> {{ $appointment['clinic'] }}</li>
                                                        <li class="list-inline-item"> {{ $appointment['date'] }}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-7 d-flex justify-content-md-end">
                                                <div class="row text-center">
                                                    <p class="badge bg-danger">{{ ucwords($appointment['status']) }}</p>
                                                    @if ($appointment['status'] == 'pending')
                                                        <form action="{{ URL::to('appointment') }}/{{ $appointment['id'] }}" method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn btn-outline-primary">Cancel</button>
                                                        </form>
                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="page-wrap d-flex flex-row align-items-center">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-md-12 text-center">
                                            <span class="display-5 d-block my-5">No Appointment Found</span>
                                            <a href="{{ URL::to('/appointment/reserve') }}"
                                                class="btn btn-outline-primary">Make New Appointment</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif




                    </div>
                </div>
            </div>



        </div>
    </section>

@endsection
