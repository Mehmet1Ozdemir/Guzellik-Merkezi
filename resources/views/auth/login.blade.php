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
                <div class="login-left" style="background: white !important; border-right: 1px solid #f3c41b">
                    <img class="img-fluid" src="{{asset('img/forever-logo2.jpeg')}}" alt="Logo">
                </div>
                <div class="login-right">
                    <div class="login-right-wrap">
                        <h1>Login</h1>
                        <p class="account-subtitle">Log In to the Management Panel</p>
                        <x-validation-errors class="mb-4" />
                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif
                        <!-- Form -->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <input class="form-control" type="email" name="email" placeholder="E-Posta" required autofocus autocomplete="username">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" name="password" placeholder="Password" required autocomplete="current-password">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary w-100" type="submit">Login</button>
                            </div>
                        </form>
                        <!-- /Form -->
                        @if (Route::has('password.request'))
                        <div class="text-center forgotpass"><a href="{{ route('password.request') }}">Forgot Password</a></div>
                        @endif
                        <div class="login-or">
                            <span class="or-line"></span>
                            <span class="span-or">or</span>
                        </div>


                        <div class="text-center dont-have"><a href="{{route('register')}}">Create Account</a></div>
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