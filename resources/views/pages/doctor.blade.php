@extends('templates.main')

@section('title', 'Doctor | Klinik Azalea')

@section('doctor-active')active @endsection



@section('content')
    <section class="py-5 mb-md-5 mt-2 mx-3 bg-opacity-50" style="background-image: url('{{ asset('/assets/img/tah.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="container">
            <div class="row text-white py-4">
                <div class="col-lg-8">
                    <h2 class="display-5 fw-bold">Our Doctor</h2>

                </div>
            </div>
        </div>
    </section>


    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center text-center mb-2 mb-lg-4">
                <div class="col-12 col-lg-8 col-xxl-7 text-center mx-auto">
                    <span class="text-muted">Doctor</span>
                    <h2 class="display-5 fw-bold">Meet the Doctor</h2>
                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta harum ipsum venenatis
                        metus sem veniam eveniet aperiam suscipit.</p>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($doctor_list as $doctor)
                    <div class="col-md-6 col-lg-3">
                        <div class="card text-center border-0 mb-3">
                            <div class="card-body p-3">
                                <div class="mb-4 mx-lg-3 mx-xxl-5"><img class="img-fluid rounded-circle"
                                        src="{{ asset('/assets/img/') }}/{{$doctor['image']}}"></div>
                                <h5 class="fw-bold">{{ $doctor['name'] }}</h5>
                                <div class="text-muted">
                                    {{ $doctor['role'] }}
                                </div>
                                <div class="d-flex justify-content-center mt-4">
                                    <a class="btn btn-sm me-2" href="mailto:{{ $doctor['email'] }}"><img
                                            src="{{ asset('assets/icon/google-outline-svgrepo-com.svg') }}"
                                            alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


@endsection
