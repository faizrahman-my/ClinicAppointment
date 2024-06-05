@extends('templates.main')

@section('title', 'Doctor | Klinik Azalea')

@section('doctor-active')active @endsection



@section('content')
    <section class="py-5 mb-md-5 mt-2 mx-3 bg-primary shadow-lg rounded-4">
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
                    <span class="text-muted">Our Doctor</span>
                    <h2 class="display-5 fw-bold">Meet the Doctor</h2>
                    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Styled Paragraph</title>
    <style>
        .custom-paragraph {
            border: 2px solid #ccc; /* Adds a border */
            border-radius: 15px; /* Curved corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Adds a shadow */
            padding: 20px; /* Adds some padding inside the border */
            background-color: #f9f9f9; /* Adds a light background color */
        }
    </style>
</head>
<body>
    <p class="lead custom-paragraph">We have a reputable team of medical consultants who are not only well-qualified, but
        also experienced in their respective fields.
        They are supported by a team of dedicated medical professionals from various specialized
        disciplines. They have been carefully selected for their
        professional expertise and commitment to deliver personalized services.
    </p>
</body>
</html>

                </div>
            </div>

            <div class="row justify-content-center">
                @foreach ($doctor_list as $doctor)
                    <div class="col-md-6 col-lg-3">
                        <div class="card text-center border-0 mb-3 border-dark border-opacity-10 rounded-4 shadow-sm">
                            <div class="card-body">
                                <div class="mb-4">
                                    <img class="img-fluid rounded-circle" src="{{ asset('/assets/img/') }}/{{ $doctor['image'] }}" style="width: 150px; height: 150px; object-fit: cover;">
                                </div>
                                
                                <p class="fw-semibold m-0" style="color: rgb(0, 159, 252)">{{ ucwords($doctor['name']) }}</p>
                                <p class="text-uppercase">
                                    {{ $doctor['education'] }}
                                </p>
                                <p class="text-muted">Specialty</p>
                                <p>{{  $doctor['specialist']  }}
                                </p>
                                <p class="text-muted">{{ $doctor['role'] }}</p>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="bg-danger bg-opacity-25 col-6 py-1 px-3 rounded-start">
                                        <img src="{{ asset('assets/icon/hospital.svg') }}" alt="">
                                        <br>
                                        {{ ucwords($doctor['branch']) }}
                                    </div>
                                    <div class="bg-danger bg-opacity-50 col-6 py-1 px-3 rounded-end">
                                        <img src="{{ asset('assets/icon/email.svg') }}" alt="">
                                        <br>
                                        {{$doctor['email']}}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


@endsection
