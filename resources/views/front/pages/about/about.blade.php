@extends('front.layout.app')
@section('content')
    <style>
        .about-section {
            background-image: url('{{ asset('img/about-img5.jpg') }}') !important;
        !important;
        }
    </style>
    <section class="about-page">

        <!-- Main Wrapper -->
        <div class="main-wrapper">

            <!-- Breadcrumb -->
            <div class="breadcrumb-bar">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-md-12 col-12">
                            <nav aria-label="breadcrumb" class="page-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('front.home')}}">Home Page</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">About Us</li>
                                </ol>
                            </nav>
                            <h2 class="breadcrumb-title">About Us</h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Breadcrumb -->

            <!-- Page Content -->
            <section class="about-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <h3 class="mb-4"></h3>
                            <p>For us, patient satisfaction and comfort are our top priorities. Throughout the treatment
                                process, we provide you with complete information at every step, explaining clearly what
                                your treatment involves and how it will be carried out. In a comfortable setting, we are
                                here to serve you with a friendly and approachable approach.
                                <br><br>

                                We are eager to maintain our dedication to your health and provide the best outcome
                                to each and every one of you, our valued patients. We thank you for choosing us and look
                                forward to welcoming you to our clinic for a better of you.

                            </p>

                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>
                </div>
            </section>

            <!-- Category Section -->
            <section class="select-category">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 category-col d-flex">
                            <div class="category-subox pb-0 d-flex flex-wrap w-100">
                                <h4>Extensive Range of Services</h4>
                                <!--
                                <p>As a dentist offering comprehensive dental care, we provide our patients with an
                                    extensive range of services related to dental health.</p>
                                    -->
                                <div class="subox-img">
                                    <div class="subox-circle">
                                        <img src="{{asset('img/FACE-TREATMENT-SYMBLE.png')}}" alt=""
                                             width="42">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 category-col d-flex">
                            <div class="category-subox pb-0 d-flex flex-wrap w-100">
                                <h4>Experienced and Professional Team</h4>
                                <!--
                                <p>At our dental clinic, we work with an experienced and expert team. Our dentists, with
                                    years of experience, are dedicated to providing you with the highest quality of
                                    service. </p>
                                    -->
                                <div class="subox-img">
                                    <div class="subox-circle">
                                        <img src="{{asset('img/FACIAL-SYMBLE.png')}}" alt=""
                                             width="42">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 category-col d-flex">
                            <div class="category-subox pb-0 d-flex flex-wrap w-100">
                                <h4>Patient-Centered Approach</h4>
                                <!--
                                <p>For us, the health and satisfaction of our patients are always a top priority. We
                                    offer our patients an individualized and personalized treatment approach.</p>
                                    -->
                                <div class="subox-img">
                                    <div class="subox-circle">
                                        <img src="{{asset('img/LASER-SYMBLE.png')}}" alt=""
                                             width="42">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Category Section -->

            <section class="section section-featurebox">
                <div class="container">
                    <div class="section-header text-center">
                        <h2>In Our Beauty Center</h2>
                        <p class="sub-title">
                            "For a radiant body, our beauty center is a premier destination equipped with advanced
                            technology and a team of experts dedicated to providing the highest quality of beauty and
                            wellness services."</p>
                    </div>
                    <div class="row justify-content-center">
                        <div class="feature-col-list">
                            <div class="feature-col">
                                <div class="feature-subox d-flex flex-wrap justify-content-center">
                                    <img src="{{asset('img/wix-2.png')}}"
                                         class="img-fluid" alt="Features">
                                    <h4 class="text-center">Modern Technological Equipment</h4>
                                </div>
                            </div>
                            <div class="feature-col">
                                <div class="feature-subox d-flex flex-wrap justify-content-center">
                                    <img src="{{asset('img/wix-1.png')}}"
                                         class="img-fluid" alt="Features">
                                    <h4 class="text-center">Hygienic and Sterile Environment</h4>
                                </div>
                            </div>
                            <div class="feature-col">
                                <div class="feature-subox d-flex flex-wrap justify-content-center">
                                    <img src="{{asset('img/dental-team.jpg')}}"
                                         class="img-fluid" alt="Features">
                                    <h4 class="text-center">Expert and Dedicated Team</h4>
                                </div>
                            </div>
                            <div class="feature-col">
                                <div class="feature-subox d-flex flex-wrap justify-content-center">
                                    <img src="{{asset('img/emergencyjpg.jpg')}}"
                                         class="img-fluid" alt="Features">
                                    <h4 class="text-center">Unique Approach</h4>
                                </div>
                            </div>
                            <div class="feature-col">
                                <div class="feature-subox d-flex flex-wrap justify-content-center">
                                    <img src="{{asset('img/wix-4.png')}}"
                                         class="img-fluid" alt="Features">
                                    <h4 class="text-center">Comprehensive and Personalized Treatment Approach</h4>
                                </div>
                            </div>
                            <div class="feature-col">
                                <div class="feature-subox d-flex flex-wrap justify-content-center">
                                    <img src="{{asset('img/wix-6.png')}}"
                                         class="img-fluid" alt="Features">
                                    <h4 class="text-center">Comfortable and Patient-Centric Service Philosophy</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

            <!-- Testimonial Section -->
            <section class="section section-testimonial">
                <div class="container">
                    <div class="section-header text-center mb-4">
                        <h2>Our Services</h2>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <!-- Slider -->
                            <div class="abtus-testimony slider">

                                <!-- Slider Item -->
                                <div class="testimonial-item text-center">

                                    <div class="testimonial-content">
                                        <h4>Lipsuction</h4>
                                    </div>
                                </div>
                                <!-- /Slider Item -->

                                <!-- Slider Item -->
                                <div class="testimonial-item text-center">
                                    <div class="testimonial-content">
                                        <h4>Abdominoplasty</h4>
                                    </div>
                                </div>
                                <!-- /Slider Item -->

                                <!-- Slider Item -->
                                <div class="testimonial-item text-center">
                                    <div class="testimonial-content">
                                        <h4>Breast Augmentation</h4>
                                    </div>
                                </div>
                                <!-- /Slider Item -->

                                <!-- Slider Item -->
                                <div class="testimonial-item text-center">
                                    <div class="testimonial-content">
                                        <h4>Breast Reduction</h4>
                                    </div>
                                </div>
                                <!-- /Slider Item -->
                                <!-- Slider Item -->
                                <div class="testimonial-item text-center">
                                    <div class="testimonial-content">
                                        <h4>Breast Lifting</h4>
                                    </div>
                                </div>
                                <!-- /Slider Item -->
                                <!-- Slider Item -->
                                <div class="testimonial-item text-center">
                                    <div class="testimonial-content">
                                        <h4>Mesotheraphy</h4>
                                    </div>
                                </div>
                                <!-- /Slider Item -->
                                <!-- Slider Item -->
                                <div class="testimonial-item text-center">
                                    <div class="testimonial-content">
                                        <h4>Blepharoplasty</h4>
                                    </div>
                                </div>
                                <!-- /Slider Item -->
                                <!-- Slider Item -->
                                <div class="testimonial-item text-center">
                                    <div class="testimonial-content">
                                        <h4>Otoplasty</h4>
                                    </div>
                                </div>
                                <!-- /Slider Item -->
                                <!-- Slider Item -->
                                <div class="testimonial-item text-center">
                                    <div class="testimonial-content">
                                        <h4>Rhinoplasty & Septoplasty</h4>
                                    </div>
                                </div>
                                <!-- /Slider Item -->
                                <!-- Slider Item -->
                                <div class="testimonial-item text-center">
                                    <div class="testimonial-content">
                                        <h4>Gynecomastia</h4>
                                    </div>
                                </div>
                                <!-- /Slider Item -->
                                <!-- Slider Item -->
                                <div class="testimonial-item text-center">
                                    <div class="testimonial-content">
                                        <h4>PRP (Platelet-Rich Plasma)</h4>
                                    </div>
                                </div>
                                <!-- /Slider Item -->

                            </div>
                            <!-- /Slider -->

                        </div>
                    </div>
                </div>
            </section>
            <!-- Testimonial Section -->

            <!-- /Page Content -->


        </div>
        <!-- /Main Wrapper -->

    </section>

@endsection



@section('js')

    <script>
        $(function () {
            $('#navAnaSayfa').removeClass('active');
            $('#navHekimler').removeClass('active');
            $('#navBlog').removeClass('active');
            $('#navİletisim').removeClass('active');
            $('#navHakkimizda').addClass('active');
        });
    </script>

@endsection