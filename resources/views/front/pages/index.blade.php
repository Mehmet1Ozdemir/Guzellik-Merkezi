@extends('front.layout.app')

@section('content')
    <style>
        .section-search {
            background-image: url('{{ asset('img/about-img6.jpg') }}') !important;
        !important;
        }
    </style>
    <!-- Home Banner -->
    <section class="section section-search " style="">
        <div class="container">
            <div class="banner-wrapper">
                <div class="banner-header">
                    <h6>TIMELESS BEAUTY</h6>
                    <h1>Discover Timeless Beauty Secrets!</h1>
                    <p>Welcome to Forever Wellness, where we believe that every person holds the
                        secret to timeless beauty within. Our expert teams consist of plastic surgery, dermatology
                        and laser treatments are here to guide you on your journey to reveal your unique beauty !</p>

                </div>
            </div>
        </div>
    </section>
    <!-- /Home Banner -->

    <!-- Service -->
    <section class="top-service-col">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-4 text-center">
                    <div class="service-box">
                        <div class="card">
                            <div class="card-body">
                                <div class="service-icon">
                                    <img src="{{asset('img/FACE-TREATMENT-SYMBLE.png')}}" alt="">
                                </div>
                                <h3>Enhancing Your Natural Beauty </h3>
                                <p>Our plastic surgery experts are dedicated to enhancing your natural beauty.
                                    From breast augmentation to facelifts, we provide effective
                                    procedures tailored to your individual goals.</p>

                                <div class="service-btn">
                                    <a href="#"><i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 text-center">
                    <div class="service-box">
                        <div class="card">
                            <div class="card-body">
                                <div class="service-icon">
                                    <img src="{{asset('img/FACIAL-SYMBLE.png')}}" alt="">
                                </div>
                                <h3>Healthy Skin, Radiant You</h3>
                                <p>Experience the transformation with our dermatology and laser treatments.
                                    Our services aim various skin concerns to help you achieve healthy and radiant
                                    skin.</p>
                                <div class="service-btn">
                                    <a href="#"><i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 text-center">
                    <div class="service-box">
                        <div class="card">
                            <div class="card-body">
                                <div class="service-icon">
                                    <img src="{{asset('img/LASER-SYMBLE.png')}}" alt="">
                                </div>
                                <h3>Laser & Facial </h3>
                                <p>Our laser and facial experts are here to support your
                                    overall health. Whether it is men's health or women's health,
                                    we provide comprehensive care to help you achieve your best.
                                    <br>
                                </p>
                                <div class="service-btn">
                                    <a href="#"><i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Service -->

    <!-- Feature -->
    <section class="feature-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="left">
                        <h6>GET IN TOUCH WITH US</h6>
                        <h2>We Provide Very Meticulous Care with Experience and Commitment!</h2>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="right">
                        <p>We continuously upgrade our services to provide you with the
                            best care in the field of beauty and health care.
                            Our goal is to make you feel comfortable, manage the treatment process with
                            compassion, and consistently deliver services at the highest standards!</p>
                    </div>
                </div>
            </div>
            <div class="row feature-column">
                <div class="feature-box">
                    <div class="inner-feature-box text-center">

                        <h4>Plastic Surgery<br><br><br></h4>
                        <!--
                        <p>We are here with personalized cleanings, painless fillings, crowns, dentures, and bridges.</p>
                        -->
                        <div class="feature-btn">
                            <a href="#"><i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="feature-box">
                    <div class="inner-feature-box text-center">

                        <h4>Dermatology<br><br><br></h4>
                        <!--
                        <p>Expert surgical care from the team you trust. Implants, root canals, and more...</p>
                        -->
                        <div class="feature-btn">
                            <a href="#"><i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="feature-box">
                    <div class="inner-feature-box text-center">
                        <h4>Laser & Facial<br><br><br></h4>
                        <p></p>
                        <!--

                        <p>We'll help you get high-tech cosmetic options such as veneers and teeth whitening.</p>
                        -->
                        <div class="feature-btn">
                            <a href="#"><i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="feature-box">
                    <div class="inner-feature-box text-center">
                        <h4>Get to Know Us<br><br><br></h4>
                        <!--
                        <p>Our dedicated team takes pride in redefining beauty ,
                            providing a unique approach to your well-being.</p>
-->
                        <div class="feature-btn">
                            <a href="{{route('front.About')}}"><i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="feature-box">
                    <div class="inner-feature-box text-center">
                        <h4>Specialized Services<br><br><br></h4>
                        <!--
                        <p>At our center, there is nothing more significant than our commitment to delivering
                            top-tier healthcare services..</p>
                            -->
                        <div class="feature-btn">
                            <a href="{{route('front.plasticIndex')}}"><i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- /Feature -->

    <!-- Find Location -->
    <section class="location-col">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="left">
                        <div class="location-box text-center">
                            <h4>Our Expert Team Is Here to <br> Make You Feel at Home</h4>
                            <p>A team of experienced professionals who prioritize patients wellness and health. We are here to make you feel at ease, just like at home.</p>
                            <div class="location-btn">
                                <a href="#"><i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="right">
                        <div class="location-box text-center">
                            <h4>Consider Us Your Guide in <br>Your Medical Journey</h4>
                            <p> Our team understands that everyone is unique, which is why we
                                tailor each experience for every patient.</p>
                            <br>
                            <div class="location-btn">
                                <a href="#"><i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Find Location -->

    <!-- About Section -->
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
                        <h6>Take Care of Yourselves. </h6>
                        <h2>It's Time to Pamper Yourself</h2>
                        <p>At our beauty center, we are more than just a service provider;
                            we are your trusted partner in enhancing your natural beauty.
                            Led by a team of dedicated professionals, we take pride in redefining
                            beauty and well-being standards. Our journey began with a commitment to providing a fresh
                            perspective on beauty and self-care. With years of experience and a passion for excellence,
                            our experts are here to guide you through your beauty transformation. We believe that every
                            individual has a unique beauty, and our mission is to help you to reveal it.
                            <br> <br>
                            Our range of services is tailored to meet your unique needs and bring out the best in you.
                            From advanced cosmetic treatments to specialized care, we offer a comprehensive scope of
                            services at our beauty center. Our team is committed to provide high technological  cosmetic treatment options.


                        </p>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /About Section -->


    @if(count($dentists) > 0)
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
                                                <a href="{{route('dentist.dentistsDetails',['id'=>$d->id])}}">{{$d->name}} {{$d->surname}}, <em>M.D.</em></a>
                                            </h3>
                                            <div class="rating"
                                                 style="border-bottom: none!important; border-top: 1px solid #c4c4c4">
                                                <!--
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="far fa-star"></i>
                                                -->
                                                <span class="d-inline-block average-rating">{{$d->unit->name}}</span>
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
                                @endforeach
                            @endif

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
                            <a href="{{route('dentist.listDentist')}}" class="view-all">See All</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Doctors Section -->
    @endif



    @if(count($blogs) > 0)

        <!-- Blog -->
        <section class="blog-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="section-header text-center mb-4">
                        <h6>Blog</h6>
                        <h2> Blog Articles</h2>
                    </div>
                </div>
                <div class="row justify-content-center">


                    @if($blogs != null)
                        @foreach($blogs as $blog)
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="blog-box">
                                    <div class="blog-img">
                                        <img class="img-fluid" src="{{$blog->image}}" alt="">
                                    </div>
                                    <div class="blog-content">
                                        <span><i>{{$blog->created_at->format('M d')}} | {{$blog->dentist->name}}</i></span>
                                        <h2>{{$blog->title}}</h2>
                                        <p>{!! Str::limit($blog->description, 100) !!}</p>
                                        <a href="{{route('blogDetail',['id'=>$blog->id])}}">Read More</a>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    @endif

                    {{--                <div class="col-12 col-md-6 col-lg-3">--}}
                    {{--                    <div class="blog-box">--}}
                    {{--                        <div class="blog-img">--}}
                    {{--                            <img src="{{asset('img/dental-doctor.png')}}" alt="">--}}
                    {{--                        </div>--}}
                    {{--                        <div class="blog-content">--}}
                    {{--                            <span><i>Jan 26 | Admin</i></span>--}}
                    {{--                            <h2>Lorem Ipsum has been the industry's</h2>--}}
                    {{--                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium--}}
                    {{--                                doloremque.</p>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="blog-btn">--}}
                    {{--                            <a href="#"><i class="fas fa-chevron-right"></i></a>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}
                    {{--                <div class="col-12 col-md-6 col-lg-3">--}}
                    {{--                    <div class="blog-box">--}}
                    {{--                        <div class="blog-img">--}}
                    {{--                            <img src="{{asset('img/dental-doctor.png')}}" alt="">--}}
                    {{--                        </div>--}}
                    {{--                        <div class="blog-content">--}}
                    {{--                            <span><i>Jan 26 | Admin</i></span>--}}
                    {{--                            <h2>Lorem Ipsum has been the industry's</h2>--}}
                    {{--                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium--}}
                    {{--                                doloremque.</p>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="blog-btn">--}}
                    {{--                            <a href="#"><i class="fas fa-chevron-right"></i></a>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}

                    <div class="col-12 col-md-12 blog-bottom text-center pt-5">
                        <a href="{{route('blogList')}}" class="view-all">See All</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Blog -->
    @endif
@endsection


@section('js')

    <script>
        $(function () {
            $('#navHekimler').removeClass('active');
            $('#navHakkimizda').removeClass('active');
            $('#navBlog').removeClass('active');
            $('#navİletisim').removeClass('active');
            $('#navAnaSayfa').addClass('active');
        });
    </script>
@endsection