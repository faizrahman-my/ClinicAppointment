@extends('templates.main')

@section('title', 'My Appointment | Klinik Azalea')

@section('myappointment-active')active @endsection



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
                    {{ ucfirst($appointment['clinic']) }}
                </div>

                <div class="card-body">

                    <div class="row mb-2">
                        <div class="col-md-3 fw-bold">Doctor Name. :</div>
                        <div class="col-md-9">
                            <p>Doctor {{ $appointment['staff'] }}</p>
                        </div>
                    </div>

                    <div class="row mb-4">
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
                        <div class="col-md-3 fw-bold">Room No. :</div>
                        <div class="col-md-9">
                            <p>{{ $appointment['room'] }}</p>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-3 fw-bold">Status :</div>
                        <div class="col-md-9">
                            <p>{{ ucwords($appointment['status']) }}</p>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-3 fw-bold">Comment :</div>
                        <div class="col-md-9">
                            {!! nl2br($appointment['comment']) !!}
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

                                    @if ($rating)
                                        <div class="row">
                                            <p class="col-6 d-flex justify-content-start">{!! nl2br($rating->feedback) !!}
                                            </p>
                                            <div class="col-6 d-flex justify-content-end">
                                                <form action="{{ URL::to('rating') }}/{{ $rating->id }}?id={{$id}}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-primary">delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    @else
                                        <form action="{{ URL::to('rating') }}/{{ $id }}" method="post">
                                            @method('post')
                                            @csrf
                                            <div class="mb-3">
                                                <label for="feedback" class="form-label">Feedback</label>
                                                <textarea class="form-control" id="feedback" name="feedback" required></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>


                </div>



            </div>

        </div>
    </div>
@endsection
