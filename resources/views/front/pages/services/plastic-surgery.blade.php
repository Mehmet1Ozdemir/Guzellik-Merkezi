@extends('front.layout.app')
@section('content')
    <style>
        .about-section {
            background-image: url('{{ asset('img/plastic-img1.jpg') }}') !important;
        !important;
        }

        .about-section p {
            padding: 50px;
            background-color: rgb(164 164 164 / 40%);
            -webkit-backdrop-filter: blur(5px);
            backdrop-filter: blur(5px);
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
                                    <li class="breadcrumb-item active" aria-current="page">Services</li>
                                    <li class="breadcrumb-item active" aria-current="page">Plastic Surgery and
                                        Reconstruction
                                    </li>
                                </ol>
                            </nav>
                            <h2 class="breadcrumb-title">Plastic Surgery and Reconstruction</h2>
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
                            <p>Welcome! From aesthetic enhancements to functional improvements, we're here to enhance
                                your appearance and quality of life. Tailoring solutions to each individual's needs, our
                                aim is to support your health, confidence, and happiness.
                                <br><br>
                                Plastic surgery offers solutions in various areas, from post-trauma injuries to
                                congenital abnormalities. Our experts stand by your side on your journey towards health
                                and beauty.

                                We're here to enhance your natural beauty, health, and confidence.
                                <br><br>
                                Join us and express yourself in the best possible way!


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
                                <h4>Aesthetic Surgical Expertise</h4>
                                <p>We offer personalized aesthetic surgeries: facial rejuvenation, breast enhancements,
                                    liposuction, and tummy tucks, all tailored to your unique goals.</p>
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
                                <h4>Reconstruction Solutions</h4>
                                <p>Our focus: reconstructive surgeries for function and aesthetics—post-trauma,
                                    post-cancer, congenital deformities, scar, and burn revisions. </p>
                                <div class="subox-img">
                                    <div class="subox-circle">
                                        <img src="{{asset('img/LASER-SYMBLE.png')}}" alt=""
                                             width="42">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 category-col d-flex">
                            <div class="category-subox pb-0 d-flex flex-wrap w-100">
                                <h4>Non-Surgical Aesthetic Treatments</h4>
                                <p>Explore non-invasive options: Botox, fillers, skin rejuvenation, peels, laser
                                    therapies, and PRP treatments, meeting diverse aesthetic needs.</p>
                                <div class="subox-img">
                                    <div class="subox-circle">
                                        <img src="{{asset('img/FACE-TREATMENT-SYMBLE.png')}}" alt=""
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
                            "For timeless beauty and confidence, our center stands as a leading sanctuary adorned with
                            cutting-edge advancements and a devoted team committed to delivering excellence in aesthetic
                            enhancements and holistic wellness solutions. Step into a realm where your beauty
                            aspirations meet expertise and innovation, ensuring a harmonious blend of premium services
                            for your radiance and well-being."</p>
                    </div>
                    <div class="row justify-content-center">
                        <div class="feature-col-list">
                            <div class="feature-col">
                                <div class="feature-subox d-flex flex-wrap justify-content-center">
                                    <img src="{{asset('img/estetik.jpg')}}"
                                         class="img-fluid" alt="Features">
                                    <h4 class="text-center">Plastic Surgeries</h4>
                                </div>
                            </div>
                            <div class="feature-col">
                                <div class="feature-subox d-flex flex-wrap justify-content-center">
                                    <img src="{{asset('img/yuzEstetigi2.png')}}"
                                         class="img-fluid" alt="Features">
                                    <h4 class="text-center">Facial Aesthetics</h4>
                                </div>
                            </div>
                            <div class="feature-col">
                                <div class="feature-subox d-flex flex-wrap justify-content-center">
                                    <img src="{{asset('img/gogusEstetigi.png')}}"
                                         class="img-fluid" alt="Features">
                                    <h4 class="text-center">Breast Aesthetics</h4>
                                </div>
                            </div>
                            <div class="feature-col">
                                <div class="feature-subox d-flex flex-wrap justify-content-center">
                                    <img src="{{asset('img/gobek.png')}}"
                                         class="img-fluid" alt="Features">
                                    <h4 class="text-center">Liposuction</h4>
                                </div>
                            </div>
                            <div class="feature-col">
                                <div class="feature-subox d-flex flex-wrap justify-content-center">
                                    <img src="{{asset('img/gobek2.png')}}"
                                         class="img-fluid" alt="Features">
                                    <h4 class="text-center">Tummy Tuck</h4>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

            <!-- About Section -->
            <section class="aboutus-col">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="about-left">
                                <img src="{{asset('/img/plastic-aboutimg2.png')}}" alt="">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="about-right">
                                <h6>Take Care of Yourselves. </h6>
                                <h2>It's Time to Pamper Yourself</h2>
                                <p>In our sanctuary of beauty, we go beyond mere services, we are your trusted allies on the journey to unveil your inherent allure. Guided by a team of devoted professionals, our pride lies in redefining standards of beauty and well-being. Our inception stemmed from a commitment to reshaping perceptions of beauty and self-care. Leveraging years of expertise and an unwavering pursuit of excellence, our experts stand ready to usher you through your transformative beauty experience. We believe in the unique beauty that resides within each individual, and our mission is to illuminate and celebrate that singular essence.
                                    <br>
                                    <br>
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /About Section -->

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
                                        <h4>Plastic Surgery and Reconstruction</h4>
                                    </div>
                                </div>
                                <!-- /Slider Item -->

                                <!-- Slider Item -->
                                <div class="testimonial-item text-center">
                                    <div class="testimonial-content">
                                        <h4>Dermatology and Lase
                                        </h4>
                                    </div>
                                </div>
                                <!-- /Slider Item -->

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



        <!-- Doctors Section -->
        <section class="doctors-col">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="doctors-title text-center">
                        <h6>MEET OUR DOCTORS</h6>
                        <h2>Doctors</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="doctor-slider slider">

                            @if(count($dentists) > 0)
                                @if($dentists != null)
                                    @foreach($dentists as $d)


                                        <!-- Doctor Widget -->
                                        <div class="profile-widget">
                                            <div class="doc-img">
                                                <a href="{{route('dentist.dentistsDetails',['id'=>$d->id])}}">
                                                    <img class="img-fluid" alt="User Image"
                                                         src="{{$d->profile_picture_path}}">
                                                </a>
                                            </div>
                                            <div class="pro-content">
                                                <h3 class="title">
                                                    <a href="{{route('dentist.dentistsDetails',['id'=>$d->id])}}">{{$d->name}} {{$d->surname}}, <em>M.D.</em> </a>
                                                </h3>
                                                <div class="rating"
                                                     style="border-bottom: none!important; border-top: 1px solid #c4c4c4">

                                                    <span class="d-inline-block average-rating">Plastic Surgeon</span>
                                                </div>
                                                <!--
                                                <ul class="available-info">
                                                    <li>
                                                        <i class="fas fa-calendar-check"></i> Available on Mon, 22 Sep
                                                    </li>
                                                </ul>
                                                -->
                                            </div>
                                            <div class="pro-footer">
                                                <ul class="policy-menu text-center">
                                                    <li>
                                                        <a href="{{route('dentist.dentistsDetails',['id'=>$d->id])}}">Profile</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>




                                        <!-- /Doctor Widget -->
                                    @endforeach

                                @endif

                            @endif


                            {{--                        <!-- Doctor Widget -->--}}
                            {{--                        <div class="profile-widget">--}}
                            {{--                            <div class="doc-img">--}}
                            {{--                                <a href="doctor-profile.html">--}}
                            {{--                                    <img class="img-fluid" alt="User Image"--}}
                            {{--                                         src="{{asset('img/dental-doctor.png')}}">--}}
                            {{--                                </a>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="pro-content">--}}
                            {{--                                <h3 class="title">--}}
                            {{--                                    <a href="doctor-profile.html">Gennaro Weiner</a>--}}
                            {{--                                </h3>--}}
                            {{--                                <div class="rating">--}}
                            {{--                                    <i class="fas fa-star filled"></i>--}}
                            {{--                                    <i class="fas fa-star filled"></i>--}}
                            {{--                                    <i class="fas fa-star filled"></i>--}}
                            {{--                                    <i class="fas fa-star filled"></i>--}}
                            {{--                                    <i class="far fa-star"></i>--}}
                            {{--                                    <span class="d-inline-block average-rating">(35)</span>--}}
                            {{--                                </div>--}}
                            {{--                                <ul class="available-info">--}}
                            {{--                                    <li>--}}
                            {{--                                        <i class="fas fa-calendar-check"></i> Available on Fri, 22 Mar--}}
                            {{--                                    </li>--}}
                            {{--                                </ul>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="pro-footer">--}}
                            {{--                                <ul class="policy-menu text-center">--}}
                            {{--                                    <li><a href="#">Profili Gör</a></li>--}}
                            {{--                                </ul>--}}
                            {{--                            </div>--}}
                            {{--                        </div>--}}
                            {{--                        <!-- /Doctor Widget -->--}}
                            {{--                        <!-- Doctor Widget -->--}}
                            {{--                        <div class="profile-widget">--}}
                            {{--                            <div class="doc-img">--}}
                            {{--                                <a href="doctor-profile.html">--}}
                            {{--                                    <img class="img-fluid" alt="User Image"--}}
                            {{--                                         src="{{asset('img/dental-doctor.png')}}">--}}
                            {{--                                </a>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="pro-content">--}}
                            {{--                                <h3 class="title">--}}
                            {{--                                    <a href="doctor-profile.html">Jerelyn Pino </a>--}}
                            {{--                                </h3>--}}
                            {{--                                <div class="rating">--}}
                            {{--                                    <i class="fas fa-star filled"></i>--}}
                            {{--                                    <i class="fas fa-star filled"></i>--}}
                            {{--                                    <i class="fas fa-star filled"></i>--}}
                            {{--                                    <i class="fas fa-star filled"></i>--}}
                            {{--                                    <i class="far fa-star"></i>--}}
                            {{--                                    <span class="d-inline-block average-rating">(27)</span>--}}
                            {{--                                </div>--}}
                            {{--                                <ul class="available-info">--}}
                            {{--                                    <li>--}}
                            {{--                                        <i class="fas fa-calendar-check"></i> Available on Fri, 22 Mar--}}
                            {{--                                    </li>--}}
                            {{--                                </ul>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="pro-footer">--}}
                            {{--                                <ul class="policy-menu text-center">--}}
                            {{--                                    <li><a href="#">Profili Gör</a></li>--}}
                            {{--                                </ul>--}}
                            {{--                            </div>--}}
                            {{--                        </div>--}}
                            {{--                        <!-- /Doctor Widget -->--}}
                            {{--                        <!-- Doctor Widget -->--}}
                            {{--                        <div class="profile-widget">--}}
                            {{--                            <div class="doc-img">--}}
                            {{--                                <a href="doctor-profile.html">--}}
                            {{--                                    <img class="img-fluid" alt="User Image"--}}
                            {{--                                         src="{{asset('img/dental-doctor.png')}}">--}}
                            {{--                                </a>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="pro-content">--}}
                            {{--                                <h3 class="title">--}}
                            {{--                                    <a href="doctor-profile.html">Jerelyn Pino </a>--}}
                            {{--                                </h3>--}}
                            {{--                                <div class="rating">--}}
                            {{--                                    <i class="fas fa-star filled"></i>--}}
                            {{--                                    <i class="fas fa-star filled"></i>--}}
                            {{--                                    <i class="fas fa-star filled"></i>--}}
                            {{--                                    <i class="fas fa-star filled"></i>--}}
                            {{--                                    <i class="far fa-star"></i>--}}
                            {{--                                    <span class="d-inline-block average-rating">(4)</span>--}}
                            {{--                                </div>--}}
                            {{--                                <ul class="available-info">--}}
                            {{--                                    <li>--}}
                            {{--                                        <i class="fas fa-wallet"></i> Available on Fri, 22 Mar--}}
                            {{--                                    </li>--}}
                            {{--                                </ul>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="pro-footer">--}}
                            {{--                                <ul class="policy-menu text-center">--}}
                            {{--                                    <li><a href="#">Profili Gör</a></li>--}}
                            {{--                                </ul>--}}
                            {{--                            </div>--}}
                            {{--                        </div>--}}
                            {{--                        <!-- /Doctor Widget -->--}}
                            {{--                        <!-- Doctor Widget -->--}}
                            {{--                        <div class="profile-widget">--}}
                            {{--                            <div class="doc-img">--}}
                            {{--                                <a href="doctor-profile.html">--}}
                            {{--                                    <img class="img-fluid" alt="User Image"--}}
                            {{--                                         src="{{asset('img/dental-doctor.png')}}">--}}
                            {{--                                </a>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="pro-content">--}}
                            {{--                                <h3 class="title">--}}
                            {{--                                    <a href="doctor-profile.html">Jillisa Tremblay</a>--}}
                            {{--                                </h3>--}}
                            {{--                                <div class="rating">--}}
                            {{--                                    <i class="fas fa-star filled"></i>--}}
                            {{--                                    <i class="fas fa-star filled"></i>--}}
                            {{--                                    <i class="fas fa-star filled"></i>--}}
                            {{--                                    <i class="far fa-star"></i>--}}
                            {{--                                    <i class="far fa-star"></i>--}}
                            {{--                                    <span class="d-inline-block average-rating">(20)</span>--}}
                            {{--                                </div>--}}
                            {{--                                <ul class="available-info">--}}
                            {{--                                    <li>--}}
                            {{--                                        <i class="fas fa-map-marker-alt"></i> California, USA--}}
                            {{--                                    </li>--}}
                            {{--                                </ul>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="pro-footer">--}}
                            {{--                                <ul class="policy-menu text-center">--}}
                            {{--                                    <li><a href="#">Profili Gör</a></li>--}}
                            {{--                                </ul>--}}
                            {{--                            </div>--}}
                            {{--                        </div>--}}
                            {{--                        <!-- Doctor Widget -->--}}

                        </div>
                        <div class="col-12 col-md-12 text-center pt-4">
                            <a href="{{route('dentist.listDentist')}}" class="view-all">See All</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Doctors Section -->

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