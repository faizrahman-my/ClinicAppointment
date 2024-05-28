@extends('templates.main')

@section('title', 'Branch | Klinik Azalea')

@section('branch-active')active @endsection



@section('content')

    <section class="py-5 mb-md-5 mt-2 mx-3 bg-opacity-50" style="background-image: url('{{ asset('/assets/img/tah.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="container">
            <div class="row text-white py-4">
                <div class="col-lg-8">
                    <h2 class="display-5 fw-bold">Clinic Location</h2>

                </div>
            </div>
        </div>
    </section>


    <div class="container py-4">

        <div class="row">
            <div class="col-md-3">
                <!-- Tabs nav -->
                <div class="nav flex-column nav-pills nav-pills-custom nav-tabs" id="nav-tab" role="tablist"
                    aria-orientation="vertical">
                    <a class="nav-link mb-3 p-3 shadow active" id="v-pills-home-tab" data-bs-toggle="pill"
                        href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                        <i class="fa fa-user-circle-o mr-2"></i>
                        <span class="small text-uppercase">Petaling Jaya</span></a>

                    <a class="nav-link mb-3 p-3 shadow" id="v-pills-profile-tab" data-bs-toggle="pill"
                        href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                        <i class="fa fa-calendar-minus-o mr-2"></i>
                        <span class="small text-uppercase">GOMBAK</span></a>

                    <a class="nav-link mb-3 p-3 shadow" id="v-pills-messages-tab" data-bs-toggle="pill"
                        href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                        <i class="fa fa-star mr-2"></i>
                        <span class="small text-uppercase">KLANG</span></a>


                </div>
            </div>


            <div class="col-md-9">
                <!-- Tabs content -->
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade shadow rounded bg-white show active p-5" id="v-pills-home" role="tabpanel"
                        aria-labelledby="v-pills-home-tab">
                        <div class="d-flex justify-content-center">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.6051929875885!2d101.59666367348935!3d3.1979566528537626!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc45b7b71ac18b%3A0xa07cb4ef46fda7d0!2sKlinik%20Azalea%20Sphere%20Damansara!5e0!3m2!1sen!2smy!4v1715599212401!5m2!1sen!2smy"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>

                    </div>

                    <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-profile" role="tabpanel"
                        aria-labelledby="v-pills-profile-tab">
                        <div class="d-flex justify-content-center">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.5798453293833!2d101.70028527348936!3d3.204475052813138!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc47ec4505eb0f%3A0xb939c0409e552c63!2sKlinik%20Azalea%20KLTS!5e0!3m2!1sen!2smy!4v1715567860683!5m2!1sen!2smy"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>

                    </div>

                    <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-messages" role="tabpanel"
                        aria-labelledby="v-pills-messages-tab">
                        <div class="d-flex justify-content-center">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127488.67001223465!2d101.30537354335935!3d3.0890835000000134!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc535ba1e98bd5%3A0xfde7ce27a2e1fb8a!2sKlinik%20Azalea%20Bandar%20Bukit%20Raja!5e0!3m2!1sen!2smy!4v1715599372562!5m2!1sen!2smy"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
