<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Forever Wellness M.C. UAE</title>

    <!-- Favicons -->
    <link type="image/x-icon" href="{{asset('img/favicon.jpg')}}" rel="icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('dentalTamplate/assets/css/bootstrap.min.css')}}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('dentalTamplate/assets/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('dentalTamplate/assets/plugins/fontawesome/css/all.min.css')}}">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{asset('dentalTamplate/assets/css/feather.css')}}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('dentalTamplate/assets/css/style.css')}}">

    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="{{asset('dentalTamplate/assets/css/bootstrap-datetimepicker.min.css')}}">

    <!-- Full Calander CSS -->
    <link rel="stylesheet" href="{{asset('dentalTamplate/assets/plugins/fullcalendar/fullcalendar.min.css')}}">

    @yield('style')

    <style>
            @media only screen and (max-width: 450px) {
            .text-center{
                display: flex;
                width: 250px;
                justify-content: center;
            }
        }
    </style>


</head>
<body>

<!-- Main Wrapper -->
<div class="main-wrapper">

    <!-- Header -->
    <header class="header home">
        <div class="top-header">
            <div class="container-fluid">
                <div class="row justify-content-between align-items-center">
                    <div class="col-12 col-md-6">
{{--                        <div class="left">--}}
{{--                            @if($c)--}}
{{--                            <ul>--}}
{{--                                <li><span><i class="fas fa-phone-alt"></i> Contact Number : {{$c->phone_1}}</span></li>--}}
{{--                                <li><span><i class="fas fa-map-marker-alt"></i> Location : {{$c->address}}, {{$c->town}}, {{$c->getCity->name}}, {{$c->getCountry->name}}</span></li>--}}
{{--                            </ul>--}}
{{--                            @else--}}
{{--                                <ul>--}}
{{--                                    <li><span><i class="fas fa-phone-alt"></i> Cantact Number: -----</span></li>--}}
{{--                                    <li><span><i class="fas fa-map-marker-alt"></i> Location : -----</span></li>--}}
{{--                                </ul>--}}
{{--                            @endif--}}
{{--                        </div>--}}
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="right">
                            <ul>
                                <li><span><i class="fas fa-calendar-check"></i> Working Hours : 09.00 - 05.00 </span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg header-nav">
            <div class="navbar-header">
                <a id="mobile_btn" href="javascript:void(0);">
							<span class="bar-icon">
								<span></span>
								<span></span>
								<span></span>
							</span>
                </a>
                <a href="{{route('front.home')}}" class="navbar-brand logo">
                    <img src="{{asset('img/forever-logo2.jpeg')}}" class="img-fluid"  alt="Logo">
                </a>
            </div>

            <div class="main-menu-wrapper">
                <div class="menu-header">
                    <a href="{{route('front.home')}}" class="menu-logo">
                        <img src="{{asset('img/forever-logo2.jpeg')}}" class="img-fluid" alt="Logo">
                    </a>
                    <a id="menu_close" class="menu-close" href="javascript:void(0);">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
                <ul class="main-nav">
                    <li class="" id="navAnaSayfa">
                        <a href="{{route('front.home')}}">Home Page</a>
                    </li>
                    <li class="" id="navHekimler">
                        <a href="{{route('dentist.listDentist')}}">Doctors</a>

                    </li>
                    <li class="has-submenu" id="navServices">
                        <a href="">OUR SERVICES<i class="fas fa-chevron-down"></i></a>
                        <ul class="submenu">
                            <li id="navPlastic"><!---class="has-submenu active" alt menü aktif olunca bu class ı yaz------>
                                <a href="{{route('front.plasticIndex')}}">Plastic Surgery and Reconstruction</a>
{{--                                <ul class="submenu">--}}
{{--                                    <li class="active"><a href="map-grid.html">Map Grid</a></li>--}}
{{--                                    <li><a href="map-list.html">Map List</a></li>--}}
{{--                                </ul>--}}
                            </li>
                            <li id="navDerma"><a href="{{route('dermatology')}}">Dermatology and Laser</a></li>

                        </ul>
                    </li>

                    <li class=""  id="navHakkimizda">
                        <a href="{{route('front.About')}}">About</a>

                    </li>
                    <li class="" id="navGallery">
                        <a href="{{route('gallery')}}">Gallery</a>
                    </li>
                    <li class="" id="navBlog">
                        <a href="{{route('blogList')}}">Blog</a>


                    </li>
                    <li class="" id="navİletisim">
                        <a href="{{route('listContact')}}">Contact </a>

                    </li>
                    <!--
                    <li>
                        <a href="{{route('login')}}" target="_blank">ADMIN</a>
                    </li>
                    -->
                </ul>
            </div>

        </nav>
    </header>
    <!-- /Header -->


    @yield('content')

    <!-- Footer -->
    <footer class="footer">

        <!-- Footer Top -->
        <div class="footer-top">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <h2 class="footer-h2">Forever Wellness Medical Center</h2>
                    </div>
                    <div class="social-icon media-btn  mb-2">
                        <ul>
                            <li>
                                <a href="https://m.facebook.com/fwmcuae/" target="_blank"><i class="fab fa-facebook-f"></i> </a>
                            </li>
                            <li>
                                <a href="mailto:foreverwellnessuae@gmail.com" target="_blank"><i class="fab fa-google-plus-g"></i></a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/fwmcuae/" target="_blank"><i class="fab fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><i class="fab fa-snapchat"></i> </a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-12 text-center" style="margin-top: 1rem">
                        <ul class="policy-menu text-center">
                            <li><a href="{{route('front.About')}}">About</a></li>
                            <li><a href="{{route('dentist.listDentist')}}">Doctors</a></li>
                            <li><a href="{{route('blogList')}}">Blog</a></li>
                            <li><a href="{{route('listContact')}}">Contact </a></li>
                            <!--
                            <li><a href="#">Admin</a></li>
                            -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Footer Top -->

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container-fluid">

                <!-- Copyright -->
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 text-center">
                            <div class="copyright-text">
                                <p class="mb-0">&copy; 2023 | All Rights Reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Copyright -->

            </div>
        </div>
        <!-- /Footer Bottom -->

    </footer>
    <!-- /Footer -->

</div>
<!-- /Main Wrapper -->
<!-- jQuery -->
<script src="{{asset('dentalTamplate/assets/js/jquery-3.6.0.min.js')}}"></script>

<!-- Bootstrap Core JS -->
<script src="{{asset('dentalTamplate/assets/js/bootstrap.bundle.min.js')}}"></script>

<!-- Sticky Sidebar JS -->
<script src="{{asset('dentalTamplate/assets/plugins/theia-sticky-sidebar/ResizeSensor.js')}}"></script>
<script src="{{asset('dentalTamplate/assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js')}}"></script>

<!-- Slick JS -->
<script src="{{asset('dentalTamplate/assets/js/slick.js')}}"></script>

<!-- Custom JS -->
<script src="{{asset('dentalTamplate/assets/js/script.js')}}"></script>

<!-- Datetimepicker JS -->
<script src="{{asset('dentalTamplate/assets/js/moment.min.js')}}"></script>
<script src="{{asset('dentalTamplate/assets/js/bootstrap-datetimepicker.min.js')}}"></script>

<!-- Full Calendar JS -->
<script src="{{asset('dentalTamplate/assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('dentalTamplate/assets/plugins/fullcalendar/fullcalendar.min.js')}}"></script>
<script src="{{asset('dentalTamplate/assets/plugins/fullcalendar/jquery.fullcalendar.js')}}"></script>

@yield('js')

</body>
</html>