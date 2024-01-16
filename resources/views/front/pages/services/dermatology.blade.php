@extends('front.layout.app')
@section('content')
    <style>
        .about-section {
            background-image: url('{{ asset('img/dermatology/dermatology-banner.png') }}') !important;
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
                                    <li class="breadcrumb-item active" aria-current="page">Dermatology</li>
                                </ol>
                            </nav>
                            <h2 class="breadcrumb-title">Dermatology</h2>
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
                            <p>Dermatology is a branch of medicine that focuses on the study,
                                diagnosis, and treatment of conditions related to the skin, hair, nails, and mucous membranes.
                                Dermatologists are medical professionals specialized in managing a wide range of dermatological issues,
                                including but not limited to skin infections, allergies, dermatitis, psoriasis, acne, and skin cancers.
                                They employ various diagnostic tools and treatment modalities, such as topical and systemic medications,
                                surgical procedures, and cosmetic interventions, to address both medical and aesthetic concerns associated with the skin.
                                Dermatology plays a crucial role in maintaining skin health and treating disorders that impact the largest organ of the human body.
                                <br><br>
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
                                <p>We provide services with expert doctors and state of the art technologies.</p>
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
                                <p>We offer reliable services with experienced doctors and staff in the field. </p>
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
                                <p>To apply the best treatment for you, we establish effective communication to delve into the roots of the issue or desired outcome.</p>
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

            <section class="aboutus-col">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="about-left">
                                <img src="{{asset('/img/wix-about.jpg')}}" alt="">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="about-right">
                                <h6>Dermatology </h6>
                                <h2>The procedures we implement at our dermatology clinic</h2>
                                <p>Dermatology is a medical field dedicated to the comprehensive care of the skin and its appendages. Dermatologists specialize in the diagnosis and treatment of various skin conditions, ranging from common issues like acne and eczema to more complex diseases such as skin cancers. Their expertise extends to disorders affecting the hair, nails, and mucous membranes. Dermatologists use a combination of clinical observation, medical history, and diagnostic tests to identify skin problems and develop personalized treatment plans. In addition to medical dermatology, practitioners may also offer cosmetic procedures to enhance the appearance of the skin. Overall, dermatology plays a crucial role in promoting skin health and addressing a diverse array of dermatological concerns.
                                    <br> <br>

                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section section-featurebox">
                <div class="container">
                    <div class="section-header text-center">
                        <h2>In Our Beauty Center</h2>
                        <p class="sub-title">
                            "You can find visuals related to some of the procedures performed at our clinic below.."</p>
                    </div>
                    <div class="row justify-content-center">
                        <div class="feature-col-list">
                            <div class="feature-col">
                                <div class="feature-subox d-flex flex-wrap justify-content-center">
                                    <img src="{{asset('img/wix-1.png')}}"
                                         class="img-fluid" alt="Features">
                                    <h4 class="text-center">Modern and Advanced Technology Equipment</h4>
                                </div>
                            </div>
                            <div class="feature-col">
                                <div class="feature-subox d-flex flex-wrap justify-content-center">
                                    <img src="{{asset('img/wix-2.png')}}"
                                         class="img-fluid" alt="Features">
                                    <h4 class="text-center">Hygienic and Sterile Environment</h4>
                                </div>
                            </div>
                            <div class="feature-col">
                                <div class="feature-subox d-flex flex-wrap justify-content-center">
                                    <img src="{{asset('img/wix-6.png')}}"
                                    <img src="{{asset('img/wix-6.png')}}"
                                         class="img-fluid" alt="Features">
                                    <h4 class="text-center">Expert and Experienced Dental Team</h4>
                                </div>
                            </div>
                            <div class="feature-col">
                                <div class="feature-subox d-flex flex-wrap justify-content-center">
                                    <img src="{{asset('img/dermatology/blog4.png')}}"
                                         class="img-fluid" alt="Features">
                                    <h4 class="text-center">Solution Oriented Treatment</h4>
                                </div>
                            </div>
                            <div class="feature-col">
                                <div class="feature-subox d-flex flex-wrap justify-content-center">
                                    <img src="{{asset('img/wix-3.png')}}"
                                         class="img-fluid" alt="Features">
                                    <h4 class="text-center">Comprehensive and Personalized Treatment Approach</h4>
                                </div>
                            </div>
                            <div class="feature-col">
                                <div class="feature-subox d-flex flex-wrap justify-content-center">
                                    <img src="{{asset('img/wix-4.png')}}"
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
                                        <h4>Dermatology</h4>
                                    </div>
                                </div>
                                <!-- /Slider Item -->

                                <!-- Slider Item -->
                                <div class="testimonial-item text-center">
                                    <div class="testimonial-content">
                                        <h4>Plastic Surgery</h4>
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




            @if(count($dentists) > 0)
                @if($dentists != null)
                    @foreach($dentists as $d)

                        <!-- Doctors Section -->
                        <section class="doctors-col">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="doctors-title text-center">
                                        <h6>HEKİMLERİMİZLE TANIŞIN</h6>
                                        <h2>Hekimlerimiz</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="doctor-slider slider">


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
                                                            <a href="{{route('dentist.dentistsDetails',['id'=>$d->id])}}">Profili
                                                                Gör</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>




                                            <!-- /Doctor Widget -->


                                            <!-- /Doctor Widget -->

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
                                            <a href="{{route('dentist.listDentist')}}" class="view-all">Tümünü Gör</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- /Doctors Section -->

                    @endforeach

                @endif

            @endif

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