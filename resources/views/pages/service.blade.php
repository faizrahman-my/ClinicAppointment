@extends('templates.main')

@section('title', 'Service | Klinik Azalea')

@section('service-active')active @endsection

@section('content')

    <section class="py-5 mb-md-5 mt-2 mx-3 bg-opacity-50"
        style="background-image: url('{{ asset('/assets/img/tah.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="container">
            <div class="row text-white py-4">
                <div class="col-lg-8">
                    <h2 class="display-5 fw-bold">Our Services</h2>

                </div>
            </div>
        </div>
    </section>

    <section class="section-big main-color">
        <div class="container">

            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="mb-3"><span> OUR SERVICES</span></h2>
                        <p class="mb-5">
                            At Clinic Azalea, we offer a comprehensive range of healthcare services designed to meet the diverse needs of our patients. With a team of skilled medical professionals and state-of-the-art facilities, we are committed to providing exceptional care and promoting overall well-being. Explore our services below
                        </p>
                    </div>
                </div>
            </div>


            <div class="row justiy-content-center">
                <div class="card p-4 col-md-4">
                    <div class="icon"> <i class="fa fa-desktop"></i> </div>

                    <div class="icon-content">
                        <h3 class="title">Baby Scan</h3>
                        <p class="sub-title">
                            Ultrasound imaging to monitor the health and development of your baby during pregnancy
                        </p>
                    </div>
                </div>

                <div class="card p-4 col-md-4">
                    <div class="icon"> <i class="fa fa-code"></i> </div>

                    <div class="icon-content">
                        <h3 class="title">Fertility Packages</h3>
                        <p>
                            Comprehensive plans to assist couples in achieving pregnancy, including consultations,
                            tests, and treatments
                        </p>
                    </div>
                </div>

                <div class="card p-4 col-md-4">
                    <div class="icon"> <i class="fa fa-paper-plane"></i> </div>

                    <div class="icon-content">
                        <h3 class="title">Antenatal Follow-Up</h3>
                        <p>
                            Regular check-ups and monitoring for expectant mothers to ensure a healthy pregnancy and
                            baby
                        </p>
                    </div>
                </div>
                
                <div class="card p-4 col-md-4">
                    <div class="icon"> <i class="fa fa-desktop"></i> </div>

                    <div class="icon-content">
                        <h3 class="title">Nasal Suction</h3>
                        <p class="sub-title">
                            Procedure to clear nasal passages in infants and young children, improving breathing and
                            comfort
                        </p>
                    </div>
                </div>
                
                <div class="card p-4 col-md-4">
                    <div class="icon"> <i class="fa fa-code"></i> </div>

                    <div class="icon-content">
                        <h3 class="title">Knee Injection</h3>
                        <p>
                            Treatment involving the injection of medication into the knee joint to relieve pain and
                            inflammation
                        </p>
                    </div>
                </div>

                <div class="card p-4 col-md-4">
                    <div class="icon"> <i class="fa fa-paper-plane"></i> </div>

                    <div class="icon-content">
                        <h3 class="title">Medical Blood Screening</h3>
                        <p>
                            Blood tests to assess overall health and detect any potential medical conditions early.
                        </p>
                    </div>
                </div>

                <div class="card p-4 col-md-4">
                    <div class="icon"> <i class="fa fa-desktop"></i> </div>

                    <div class="icon-content">
                        <h3 class="title">Family Planning</h3>
                        <p class="sub-title">
                            Services to help individuals and couples plan their families, including contraception advice
                            and reproductive health education.
                        </p>
                    </div>
                </div>

                <div class="card p-4 col-md-4">
                    <div class="icon"> <i class="fa fa-code"></i> </div>

                    <div class="icon-content">
                        <h3 class="title">Minor Surgery</h3>
                        <p>
                            Small surgical procedures that are performed on an outpatient basis, requiring minimal
                            recovery time
                        </p>
                    </div>
                </div>
                
                <div class="card p-4 col-md-4">
                    <div class="icon"> <i class="fa fa-paper-plane"></i> </div>

                    <div class="icon-content">
                        <h3 class="title">Medical Checkup</h3>
                        <p>
                            Comprehensive health assessments to evaluate your overall health and identify any potential
                            health issues
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
