@extends('templates.main')

@section('title', 'About | Klinik Azalea')

@section('about-active')active @endsection

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
    <section class="py-5 mb-md-5 mt-2 mx-3 bg-opacity-50" style="background-image: url('{{ asset('/assets/img/tah.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="container">
            <div class="row text-white py-4">
                <div class="col-lg-8">
                    <h2 class="display-5 fw-bold">About</h2>

                </div>
            </div>
        </div>
    </section>

    <!-- About 1 - Bootstrap Brain Component -->
    <section class="py-3 py-md-5">
        <div class="container">
            <div class="row gy-3 gy-md-4 gy-lg-0 align-items-lg-center">
                <div class="col-12 col-lg-6 col-xl-5">
                    <img class="img-fluid rounded border border-5" loading="lazy"
                        src="https://www.klinikaurora.com.my/wp-content/uploads/2023/06/muslim-doctor-woman-1-1536x1024.jpg"
                        alt="About 1">
                </div>
                <div class="col-12 col-lg-6 col-xl-7">
                    <div class="row justify-content-xl-center">
                        <div class="col-12 col-xl-11">
                            <h2 class="mb-3">About Klinik Azalea</h2>
                            <p class="lead fs-4 text-secondary mb-3">Your Trusted Partner in Mother and Child Care.</p>
                            <p class="mb-5">Klinik Azalea is a chain of clinics that was founded in July 2018. We are a
                                bumiputera-owned clinic that focuses on mother and child care, as well as general treatment.
                                We have a team of experienced and qualified doctors, and we are registered under Aurora
                                Medicare Sdn. Bhd..</p>
                            <div class="row gy-4 gy-md-0 gx-xxl-5X">
                                <div class="col-12 col-md-6">
                                    <div class="d-flex">
                                        <div class="me-4 text-primary">
                                            <img src="{{ asset('assets/icon/stethoscope-svgrepo-com.svg') }}" alt="">
                                        </div>
                                        <div>
                                            <h2 class="h4 mb-3">Our Mission</h2>
                                            <p class="text-secondary mb-0">Our mission is to provide comprehensive,
                                                professional, and conducive healthcare services to mothers, children, and
                                                the general public. We are committed to providing high-quality care that is
                                                affordable and accessible to all.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="d-flex">
                                        <div class="me-4 text-primary">
                                            <img src="{{ asset('assets/icon/electrocardiogram-svgrepo-com.svg') }}"
                                                alt="">
                                        </div>
                                        <div>
                                            <h2 class="h4 mb-3">Our Mission</h2>
                                            <p class="text-secondary mb-0">Our vision is to reduce the rate of complications
                                                before and after childbirth, and to improve the psychological health of
                                                mothers for the good of the family. We believe that every family deserves to
                                                have a healthy and happy start.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="what-we-do">
        <div class="container-fluid">

            <div class="row mt-5">
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                    <div class="p-5">
                        <div class="card-block block-1">
                            <h3 class="card-title text-center mb-4 fw-bold">Patient-Centered Care</h3>
                            <p class="card-text">We prioritize the needs, preferences, and values of our patients, ensuring
                                personalized and tailored healthcare experiences.</p>

                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                    <div class="p-5">
                        <div class="card-block block-2">
                            <h3 class="card-title text-center mb-4 fw-bold">Quality and Safety</h3>
                            <p class="card-text">We adhere to rigorous standards, implement standard safety protocols, and
                                continuously monitor and improve the quality of our care.</p>

                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                    <div class="p-5">
                        <div class="card-block block-3">
                            <h3 class="card-title text-center mb-4 fw-bold">Accessibility and Affordability</h3>
                            <p class="card-text">We strive to make healthcare accessible to all by offering affordable
                                services and minimizing barriers to care.</p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                    <div class="p-5">
                        <div class="card-block block-4">
                            <h3 class="card-title text-center mb-4 fw-bold">Continuity of Care</h3>
                            <p class="card-text">We provide seamless and coordinated care across all stages, ensuring smooth
                                transitions and holistic management of health conditions.</p>

                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                    <div class="p-5">
                        <div class="card-block block-5">
                            <h3 class="card-title text-center mb-4 fw-bold">Evidence-Based Practice</h3>
                            <p class="card-text">Our medical decisions are guided by the latest scientific evidence,
                                ensuring the most effective and up-to-date treatments for our patients.</p>

                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                    <div class="p-5">
                        <div class="card-block block-6">
                            <h3 class="card-title text-center mb-4 fw-bold">Respect and Compassion</h3>
                            <p class="card-text">We treat every individual with respect, empathy, and compassion, fostering
                                a nurturing and supportive environment for both patients and staff.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection
