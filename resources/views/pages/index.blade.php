@extends('templates.main')

@section('title', 'Home | Klinik Azalea')



@section('content')

    <section class="py-5 mb-md-5 mt-2 mx-3 bg-opacity-50"
        style="background-image: url('{{ asset('/assets/img/tah.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="container">
            <div class="row justify-content-center text-center text-white py-4">
                <div class="col-lg-8">
                    <h2 class="display-5 fw-bold">Make Your Appointment Today</h2>
                    <p class="lead">Effortlessly manage all your appointment.</p>
                    <div class="d-grid col-3 mx-auto">
                        @if (!session()->has('username'))
                            <a class="btn btn-secondary" href="/register">Sign up</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="py-5" style="background-color: rgb(220, 219, 219);">
        <div class="container">
            <div class="row justify-content-center text-center mb-3">
                <div class="col-lg-8 col-xl-7">
                    <h2 class="display-5 fw-bold">Our Features</h2>
                    <p class="lead">Providing compassionate and comprehensive care for mothers, children, and families.
                    </p>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-4 col-sm-6 text-center">
                    <div class="text-muted">
                        <svg class="bi bi-emoji-wink" fill="currentColor" height="48" viewbox="0 0 16 16" width="48"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                            <path
                                d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm1.757-.437a.5.5 0 0 1 .68.194.934.934 0 0 0 .813.493c.339 0 .645-.19.813-.493a.5.5 0 1 1 .874.486A1.934 1.934 0 0 1 10.25 7.75c-.73 0-1.356-.412-1.687-1.007a.5.5 0 0 1 .194-.68z">
                            </path>
                        </svg>
                    </div>
                    <h5 class="mt-3">Easy-To-Use</h5>
                </div>
                <div class="col-lg-4 col-sm-6 text-center">
                    <div class="text-muted">
                        <svg class="bi bi-pencil-square" fill="currentColor" height="48" viewbox="0 0 16 16"
                            width="48" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z">
                            </path>
                            <path
                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"
                                fill-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h5 class="mt-3">100% Customizable</h5>
                </div>
                <div class="col-lg-4 col-sm-6 text-center">
                    <div class="text-muted">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg>
                    </div>
                    <h5 class="mt-3">Data Secure</h5>
                </div>
            </div>
        </div>
    </section>


    <div>
        <section id="review" class="py-5">
            <div class="container">
                <h2 class="text-center mb-4">Reviews</h2>
                <!-- Insert dynamic review content here -->
                <div class="row justify-content-center">

                    @foreach ($recent_rating as $recent)
                        <div class="col-md-4">
                            <div class="card mb-3 border">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <h5 class="card-title">{{ $recent['name'] }}</h5>
                                        </div>
                                        <div class="col-6">
                                            <p class="text-muted fs-6 fw-light text-end">
                                                {{ $recent['clinic'] }}</p>
                                        </div>
                                    </div>
                                    <p class="card-text text-truncate">"{{ $recent['feedback'] }}"</p>
                                </div>
                            </div>
                            <!-- Add more review cards here if needed -->
                        </div>
                    @endforeach


                </div>

                <div class="row justify-content-center">
                    <button type="button" class="badge rounded-pill bg-primary col-2" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Read More
                    </button>
                </div>
            </div>
        </section>
    </div>




    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Feedback from our patient</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">


                        <section id="review" class="py-5">
                            <div class="container">
                                <h2 class="text-center mb-4">Reviews</h2>
                                <!-- Insert dynamic review content here -->
                                <div class="row justify-content-center">
                                    <div>
                                        @foreach ($all_rating as $all)
                                            <div class="card mb-3 border">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <h5 class="card-title">{{ $all['name'] }}</h5>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="text-muted fs-6 fw-light text-end">
                                                                {{ $all['clinic'] }} | {{ $all['date'] }}</p>
                                                        </div>
                                                    </div>

                                                    <p class="card-text">"{!! nl2br($all['feedback']) !!}"</p>
                                                </div>
                                            </div>
                                        @endforeach



                                        <!-- Add more review cards here if needed -->
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
