<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Doccure - Register</title>

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
                <div class="login-left" style="background: white !important; border-right: 1px solid #f3c41b;
">
                    <img class="img-fluid" src="{{asset('img/dis-logo3.jpg')}}" alt="Logo">
                </div>
                <div class="login-right">
                    <div class="login-right-wrap">
                        <h1>Kayıt Ol</h1>
                        <p class="account-subtitle">Yönetim Paneline Erişim için Kayıt Ol</p>
                        <x-validation-errors class="mb-4" />

                        <!-- Form -->
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Adınız" name="name" required autofocus autocomplete="name" >
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Soyadınız" name="surname" required autofocus autocomplete="surname" >
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="email" name="email" placeholder="E-Posta"  required autocomplete="username">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" name="password" required autocomplete="new-password"  placeholder="Şifre">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Şifre Onayı">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="ref_code" required  placeholder="Referans Kodu">
                            </div>
                            <div class="form-group mb-0">
                                <button class="btn btn-primary w-100" type="submit">Kayıt Ol</button>
                            </div>
                        </form>
                        <!-- /Form -->

                        <div class="login-or">
                            <span class="or-line"></span>
                            <span class="span-or">veya</span>
                        </div>


                        <div class="text-center dont-have"> <a href="{{ route('login') }}">Giriş Yap</a></div>
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