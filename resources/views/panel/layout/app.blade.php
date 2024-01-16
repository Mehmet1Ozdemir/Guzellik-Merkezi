<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Doccure - Dashboard</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('dentalTamplate/admin/assets/img/favicon.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('dentalTamplate/admin/assets/css/bootstrap.min.css')}}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('dentalTamplate/admin/assets/css/font-awesome.min.css')}}">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{asset('dentalTamplate/admin/assets/css/feathericon.min.css')}}">

    <link rel="stylesheet" href="{{asset('dentalTamplate/admin/assets/plugins/morris/morris.css')}}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('dentalTamplate/admin/assets/css/style.css')}}">
    <!-- Bootstrap Datetimepicker CSS -->
    <link rel="stylesheet" href="{{asset('dentalTamplate/admin/assets/css/bootstrap-datetimepicker.min.css')}}">
    <!--[if lt IE 9]>
    <script src="{{asset('dentalTamplate/admin/assets/js/html5shiv.min.js')}}"></script>
    <script src="{{asset('dentalTamplate/admin/assets/js/respond.min.js')}}"></script>
    <![endif]-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{asset("jquery/jquery-3.6.0.js")}}"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    <!-- Bootstrap Datetimepicker JS -->
    <script  src="{{asset('dentalTamplate/admin/assets/js/moment.min.js')}}"></script>
    <script  src="{{asset('dentalTamplate/assets/js/bootstrap-datetimepicker.min.js')}}"></script>

    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>

    @yield('style')

</head>
<body>

<!-- Main Wrapper -->
<div class="main-wrapper">

    <!-- Header -->
    <div class="header">

        <!-- Logo -->
        <div class="header-left">
            <a href="index.html" class="logo">
                <img src="{{asset('img/forever-logo2.jpeg')}}" alt="Logo">
            </a>
            <a href="index.html" class="logo logo-small">
                <img src="{{asset('dentalTamplate/admin/assets/img/favicon.png')}}" alt="Logo" width="30"
                     height="30">
            </a>
        </div>
        <!-- /Logo -->

        <a href="javascript:void(0);" id="toggle_btn">
            <i class="fe fe-text-align-left"></i>
        </a>



        <!-- Mobile Menu Toggle -->
        <a class="mobile_btn" id="mobile_btn">
            <i class="fa fa-bars"></i>
        </a>
        <!-- /Mobile Menu Toggle -->

        <!-- Header Right Menu -->
        <ul class="nav user-menu">


            <!-- User Menu -->
            <li class="nav-item dropdown has-arrow">
                <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                    <span class="user-img"><img class="rounded-circle"
                                                src="{{asset('dentalTamplate/admin/assets/img/profiles/avatar-01.jpg')}}"
                                                width="31" alt="Leeland Sheehan"></span>
                </a>
                <div class="dropdown-menu">
                    <div class="user-header">
                        <div class="avatar avatar-sm">
                            <img src="{{asset('dentalTamplate/admin/assets/img/profiles/avatar-01.jpg')}}"
                                 alt="User Image" class="avatar-img rounded-circle">
                        </div>
                        @if (\Illuminate\Support\Facades\Auth::check())
                            <div class="user-text">
                                <h6>{{ \Illuminate\Support\Facades\Auth::user()->name }} {{ \Illuminate\Support\Facades\Auth::user()->surname }}</h6>
                            </div>
                        @else
                            <div class="user-text">
                                <h6>Misafir Kullanıcı</h6>
                            </div>
                        @endif

                    </div>
                    <!--
                    <a class="dropdown-item" href="profile.html">My Profile</a>
                    <a class="dropdown-item" href="settings.html">Settings</a>
                    -->
                    <a class="dropdown-item" href="{{route('logout')}}">Çıkış Yap</a>
                </div>
            </li>
            <!-- /User Menu -->

        </ul>
        <!-- /Header Right Menu -->

    </div>
    <!-- /Header -->

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">
                        <span>Main</span>
                    </li>
                    <li class="active">
                        <a href="{{route('panelIndex')}}"><i class="fe fe-home"></i> <span>Home Page</span></a>
                    </li>

                    <li class="submenu">
                        <a href="javascript:void(0);" class=""><i class="fe fe-user-plus"></i> <span>Doctors</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">

                            <li>
                                <a href="{{route('panel.dentistList')}}"><span>Doctor List</span></a>
                            </li>
                            <li>
                                <a href="{{route('panel.dentistAdd')}}"><span>Create Doctor</span></a>
                            </li>
                            <li>
                                <a href="{{route('panel.comments.dentist')}}"><span>Doctor Comment List</span></a>
                            </li>
                        </ul>
                    </li>



                    <li>
                        <a href="{{route('listPatients')}}"><i class="fe fe-user"></i> <span>Patients</span></a>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);" class=""><i class="fa-regular fa-file"></i><span>Gallery</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">

                            <li>
                                <a href="{{route('panel.galleryList')}}"><span>Gallery List</span></a>
                            </li>
                            <li>
                                <a href="{{route('createPhoto')}}"><span>Create Photo</span></a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="{{route('panel.appointmentsList')}}"><i class="fe fe-layout"></i> <span>Appointments</span></a>
                    </li>
                    <li>
                        <a href="{{route('panel.stocksList')}}"><i class="fe fe-layout"></i> <span>Stocks</span></a>
                    </li>



                    <li class="submenu">
                        <a href="javascript:void(0);" class=""><i class="fe fe-code"></i> <span>Site Settings</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li class="submenu">
                                <a href="javascript:void(0);" class="subdrop"> <span>Blog</span> <span class="menu-arrow"></span></a>
                                <ul style="display: block;">
                                    <li><a href="{{route('panel.getBlogList')}}"><span>Blog List</span></a></li>
                                    <li><a href="{{route('panel.listBlogAdd')}}"><span>Create Blog</span></a></li>
                                    <li><a href="{{route('panel.category')}}"><span>Categories Blog</span></a></li>
                                    <li><a href="{{route('panel.comments.blogs')}}"><span>Blog Comment List</span></a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);" class="subdrop"> <span>Contact</span> <span class="menu-arrow"></span></a>
                                <ul style="display: block;">
                                    <li><a href="{{route('panel.listContact')}}"><span>Contact Settings</span></a></li>
                                    <li><a href="{{route('panel.listContactmail')}}"><span>Mail List</span></a></li>
                                </ul>
                            </li>

                        </ul>
                    </li>

                    <!--
                    <li>
                        <a href="specialities.html"><i class="fe fe-users"></i> <span>Specialities</span></a>
                    </li>
                    <li>
                        <a href="doctor-list.html"><i class="fe fe-user-plus"></i> <span>Doctors</span></a>
                    </li>
                    <li>
                        <a href="reviews.html"><i class="fe fe-star-o"></i> <span>Reviews</span></a>
                    </li>
                    <li>
                        <a href="transactions-list.html"><i class="fe fe-activity"></i> <span>Transactions</span></a>
                    </li>
                    <li>
                        <a href="settings.html"><i class="fe fe-vector"></i> <span>Settings</span></a>
                    </li>
                    <li class="submenu">
                        <a href="#"><i class="fe fe-document"></i> <span> Reports</span> <span
                                    class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="invoice-report.html">Invoice Reports</a></li>
                        </ul>
                    </li>
                    <li class="menu-title">
                        <span>Pages</span>
                    </li>
                    <li>
                        <a href="profile.html"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
                    </li>
                    <li class="submenu">
                        <a href="#"><i class="fe fe-document"></i> <span> Authentication </span> <span
                                    class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="login.html"> Login </a></li>
                            <li><a href="register.html"> Register </a></li>
                            <li><a href="forgot-password.html"> Forgot Password </a></li>
                            <li><a href="lock-screen.html"> Lock Screen </a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#"><i class="fe fe-warning"></i> <span> Error Pages </span> <span
                                    class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="error-404.html">404 Error </a></li>
                            <li><a href="error-500.html">500 Error </a></li>
                        </ul>
                    </li>
                    <li class="menu-title">
                        <span>UI Interface</span>
                    </li>
                    <li>
                        <a href="components.html"><i class="fe fe-vector"></i> <span>Components</span></a>
                    </li>
                    <li class="submenu">
                        <a href="#"><i class="fe fe-layout"></i> <span> Forms </span> <span
                                    class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="form-basic-inputs.html">Basic Inputs </a></li>
                            <li><a href="form-input-groups.html">Input Groups </a></li>
                            <li><a href="form-horizontal.html">Horizontal Form </a></li>
                            <li><a href="form-vertical.html"> Vertical Form </a></li>
                            <li><a href="form-mask.html"> Form Mask </a></li>
                            <li><a href="form-validation.html"> Form Validation </a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#"><i class="fe fe-table"></i> <span> Tables </span> <span
                                    class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="tables-basic.html">Basic Tables </a></li>
                            <li><a href="data-tables.html">Data Table </a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"><i class="fe fe-code"></i> <span>Multi Level</span> <span
                                    class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li class="submenu">
                                <a href="javascript:void(0);"> <span>Level 1</span> <span class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li><a href="javascript:void(0);"><span>Level 2</span></a></li>
                                    <li class="submenu">
                                        <a href="javascript:void(0);"> <span> Level 2</span> <span
                                                    class="menu-arrow"></span></a>
                                        <ul style="display: none;">
                                            <li><a href="javascript:void(0);">Level 3</a></li>
                                            <li><a href="javascript:void(0);">Level 3</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:void(0);"> <span>Level 2</span></a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);"> <span>Level 1</span></a>
                            </li>
                        </ul>
                    </li>
                    -->

                </ul>
            </div>
        </div>
    </div>
    <!-- /Sidebar -->

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Page Wrapper -->
        <div class="page-wrapper">

            @yield('content')


        </div>
        <!-- /Page Wrapper -->


    </div>
    <!-- /Main Wrapper -->

</div>
<!-- /Main Wrapper -->

<!-- Bootstrap Core JS -->
<script src="{{asset('dentalTamplate/admin/assets/js/bootstrap.bundle.min.js')}}"></script>

<!-- Slimscroll JS -->
<script src="{{asset('dentalTamplate/admin/assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<script src="{{asset('dentalTamplate/admin/assets/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('dentalTamplate/admin/assets/plugins/morris/morris.min.js')}}"></script>
<script src="{{asset('dentalTamplate/admin/assets/js/chart.morris.js')}}"></script>

<!-- Custom JS -->
<script src="{{asset('dentalTamplate/admin/assets/js/script.js')}}"></script>

@yield('js')

</body>
</html>