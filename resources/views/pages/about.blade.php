@extends('templates.main')

@section('title', 'About | Klinik Azalea')

@section('about-active')active @endsection



@section('content')
    <section class="py-5 mb-md-5 mt-2 mx-3 bg-opacity-50"
        style="background-image: url('{{ asset('/assets/img/tah.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="container">
            <div class="row text-white py-4">
                <div class="col-lg-8">
                    <h2 class="display-5 fw-bold">About</h2>

                </div>
            </div>
        </div>
    </section>

    <!-- About 1 - Bootstrap Brain Component -->
    {{-- <section class="py-3 py-md-5">
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
    </section> --}}

    <div class="container mb-5">
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="card-header bg-primary text-white text-center py-4">
                <h1 class="display-6 mb-0">Our <span class="fw-bold">Story</span></h1>
            </div>
            <div class="card-body p-5" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
                <div class="text-center mb-4">
                    <p class="lead text-primary fw-semibold mb-0">Klinik Azalea is your preferred choice because:</p>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="h-100 p-4 bg-white rounded-3 shadow-sm">
                                    <h5 class="text-primary mb-3">Expert Medical Team</h5>
                                    <p class="text-muted">Our clinic is renowned for its exceptional team of medical consultants who bring a wealth of knowledge and experience in their respective fields. Each consultant is meticulously selected for their professional expertise and dedication to personalized care.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="h-100 p-4 bg-white rounded-3 shadow-sm">
                                    <h5 class="text-primary mb-3">Comprehensive Care</h5>
                                    <p class="text-muted">Supported by a diverse team of specialized medical professionals, we deliver comprehensive healthcare services. Our multidisciplinary approach ensures holistic and tailored treatment for every patient's unique needs.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="h-100 p-4 bg-white rounded-3 shadow-sm">
                                    <h5 class="text-primary mb-3">Modern Facilities</h5>
                                    <p class="text-muted">We foster a welcoming environment with state-of-the-art facilities designed for patient comfort. We continuously invest in the latest medical technologies to offer the highest standard of care.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="h-100 p-4 bg-white rounded-3 shadow-sm">
                                    <h5 class="text-primary mb-3">Patient-Centered Mission</h5>
                                    <p class="text-muted">Our mission is promoting health and wellness through compassionate, patient-centered care. Trust us as your partner in health, providing exceptional care with a personal touch.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="card-header bg-gradient text-white text-center py-4" style="background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);">
                <h2 class="display-6 mb-0 fw-bold">Why Choose Us</h2>
            </div>
            <div class="card-body p-5" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
                <div class="row g-4 mb-5">
                    <div class="col-md-6">
                        <div class="d-flex align-items-start p-4 bg-white rounded-3 shadow-sm h-100">
                            <div class="flex-shrink-0 me-3">
                                <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                    <i class="fas fa-user-md text-white"></i>
                                </div>
                            </div>
                            <div>
                                <h5 class="text-primary mb-2">Expert Team</h5>
                                <p class="text-muted mb-0">Highly qualified and experienced medical professionals.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-start p-4 bg-white rounded-3 shadow-sm h-100">
                            <div class="flex-shrink-0 me-3">
                                <div class="bg-success rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                    <i class="fas fa-heart text-white"></i>
                                </div>
                            </div>
                            <div>
                                <h5 class="text-success mb-2">Personalized Care</h5>
                                <p class="text-muted mb-0">Tailored treatment plans for each patient.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-start p-4 bg-white rounded-3 shadow-sm h-100">
                            <div class="flex-shrink-0 me-3">
                                <div class="bg-info rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                    <i class="fas fa-hospital text-white"></i>
                                </div>
                            </div>
                            <div>
                                <h5 class="text-info mb-2">Modern Facilities</h5>
                                <p class="text-muted mb-0">Advanced technology and comfortable amenities.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-start p-4 bg-white rounded-3 shadow-sm h-100">
                            <div class="flex-shrink-0 me-3">
                                <div class="bg-warning rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                    <i class="fas fa-clipboard-list text-white"></i>
                                </div>
                            </div>
                            <div>
                                <h5 class="text-warning mb-2">Comprehensive Services</h5>
                                <p class="text-muted mb-0">A wide range of healthcare services in one place.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-3 justify-content-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="position-relative overflow-hidden rounded-3 shadow">
                            <img src="{{ asset('assets/img/doc.jpeg') }}"
                                alt="Medical Professional" class="img-fluid w-100" style="height: 250px; object-fit: cover;">
                            <div class="position-absolute bottom-0 start-0 end-0 bg-dark bg-opacity-75 text-white p-3">
                                <h6 class="mb-0">Expert Medical Team</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="position-relative overflow-hidden rounded-3 shadow">
                            <img src="https://res.cloudinary.com/dycihkdzs/image/upload/c_fill,f_auto/cloud/download/simak-cara-booking-konsultasi-dokter-prodia-terdekat-di-aplikasi-u-by-prodia-17052023-065529.jpg"
                                alt="Patient Consultation" class="img-fluid w-100" style="height: 250px; object-fit: cover;">
                            <div class="position-absolute bottom-0 start-0 end-0 bg-dark bg-opacity-75 text-white p-3">
                                <h6 class="mb-0">Patient Consultation</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="position-relative overflow-hidden rounded-3 shadow">
                            <img src="{{ asset('assets/img/surgery.jpeg') }}"
                                alt="Modern Surgery" class="img-fluid w-100" style="height: 250px; object-fit: cover;">
                            <div class="position-absolute bottom-0 start-0 end-0 bg-dark bg-opacity-75 text-white p-3">
                                <h6 class="mb-0">Advanced Procedures</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="card-body p-5" style="background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);">
                <div class="text-center mb-5">
                    <h2 class="display-6 fw-bold text-primary mb-3">Our Commitment</h2>
                    <p class="lead text-muted">Excellence in healthcare through proven standards</p>
                </div>
                <div class="row g-4">
                    <div class="col-lg-3 col-md-6">
                        <div class="text-center p-4 bg-white rounded-3 shadow-sm h-100 hover-lift">
                            <div class="mb-3">
                                <img src="https://cliniccleo.com/wp-content/uploads/2020/07/illustr-smile-onsub2tqqwuyfcfd2nhwojy0bvpmtv4idp1d6ylx48.png"
                                    alt="Safe Methods" class="img-fluid" style="height: 80px; width: 80px; object-fit: contain;">
                            </div>
                            <h5 class="text-primary mb-2">Safe and Proven Methods</h5>
                            <p class="text-muted small mb-0">Evidence-based treatments with proven safety records</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="text-center p-4 bg-white rounded-3 shadow-sm h-100 hover-lift">
                            <div class="mb-3">
                                <img src="https://cliniccleo.com/wp-content/uploads/2020/07/illustr-plus-onsu86hnoaw4mmmwzwebhs9ue3zw3gmazcmgx8wmaw.png"
                                    alt="Certified Doctors" class="img-fluid" style="height: 80px; width: 80px; object-fit: contain;">
                            </div>
                            <h5 class="text-success mb-2">Certified Doctors</h5>
                            <p class="text-muted small mb-0">Board-certified professionals with extensive experience</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="text-center p-4 bg-white rounded-3 shadow-sm h-100 hover-lift">
                            <div class="mb-3">
                                <img src="https://cliniccleo.com/wp-content/uploads/2020/07/illustr-time-onsub8grvx2od0765pxo3iirw6xu41qwegya2mdk2w.png"
                                    alt="Minimal Downtime" class="img-fluid" style="height: 80px; width: 80px; object-fit: contain;">
                            </div>
                            <h5 class="text-info mb-2">Minimal Downtime</h5>
                            <p class="text-muted small mb-0">Quick recovery with minimal disruption to your life</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="text-center p-4 bg-white rounded-3 shadow-sm h-100 hover-lift">
                            <div class="mb-3">
                                <img src="https://cliniccleo.com/wp-content/uploads/2020/07/illustr-protect-onsube3t0xaeanyz8sdfih3jgi61e8daf8v6ya571k.png"
                                    alt="FDA Approved" class="img-fluid" style="height: 80px; width: 80px; object-fit: contain;">
                            </div>
                            <h5 class="text-warning mb-2">FDA Approved</h5>
                            <p class="text-muted small mb-0">All treatments meet strict regulatory standards</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="card-body text-center p-5" style="background: linear-gradient(135deg, #fff3e0 0%, #ffe0b2 100%);">
                <div class="mb-3">
                    <i class="fas fa-phone-alt text-primary" style="font-size: 2rem;"></i>
                </div>
                <h3 class="text-primary mb-3">Need More Information?</h3>
                <p class="lead text-muted mb-4">Our friendly staff is ready to assist you</p>
                <a href="tel:+019-668-3294" class="btn btn-primary btn-lg rounded-pill px-5 py-3">
                    <i class="fas fa-phone me-2"></i>Call Us: +019-668 3294
                </a>
            </div>
        </div>
    </div>







@endsection
