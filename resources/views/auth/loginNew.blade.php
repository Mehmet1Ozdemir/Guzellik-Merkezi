<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Doccure - Login</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('dentalTamplate/admin/assets/img/favicon.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('dentalTamplate/admin/assets/css/bootstrap.min.css')}}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('dentalTamplate/admin/assets/css/font-awesome.min.css')}}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('dentalTamplate/admin/assets/css/style.css')}}">

    <!--[if lt IE 9]>
    <script src="{{asset('dentalTamplate/admin/assets/js/html5shiv.min.js')}}"></script>
    <script src="{{asset('dentalTamplate/admin/assets/js/respond.min.js')}}"></script>
    <![endif]-->
</head>
<body>

<!-- Main Wrapper -->
<div class="main-wrapper login-body">
    <div class="login-wrapper">
        <div class="container">
            <div class="loginbox">
                <div class="login-left">
                    <img class="img-fluid" src="{{asset('dentalTamplate/admin/assets/img/logo-white.png')}}" alt="Logo">
                </div>
                <div class="login-right">
                    <div class="login-right-wrap">
                        <h1>Login</h1>
                        <p class="account-subtitle">Access to our dashboard</p>

                        <!-- Form -->
                        <form action="index.html">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary w-100" type="submit">Login</button>
                            </div>
                        </form>
                        <!-- /Form -->

                        <div class="text-center forgotpass"><a href="forgot-password.html">Forgot Password?</a></div>
                        <div class="login-or">
                            <span class="or-line"></span>
                            <span class="span-or">or</span>
                        </div>

                        <!-- Social Login -->
                        <div class="social-login">
                            <span>Login with</span>
                            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a><a href="#" class="google"><i class="fa fa-google"></i></a>
                        </div>
                        <!-- /Social Login -->

                        <div class="text-center dont-have">Don’t have an account? <a href="register.html">Register</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Main Wrapper -->

<!-- jQuery -->
<script src="{{asset('dentalTamplate/admin/assets/js/jquery-3.6.0.min.js')}}"></script>

<!-- Bootstrap Core JS -->
<script src="{{asset('dentalTamplate/admin/assets/js/bootstrap.bundle.min.js')}}"></script>

<!-- Custom JS -->
<script src="{{asset('dentalTamplate/admin/assets/js/script.js')}}"></script>

</body>
</html>