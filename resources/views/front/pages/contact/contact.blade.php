@extends('front.layout.app')
@section('content')




    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('front.home')}}">Home Page</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Contact</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Page Content -->

    @if($c != null)
    <section class="contact-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12 text-center">
                    <h3 class="mb-4">{{$c->title}}</h3>
                    <p>{{$c->description}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 d-flex">
                    <div class="contact-box w-100 d-flex flex-wrap">
                        <div class="infor-img">
                            <div class="image-circle">
                                <i class="feather-phone"></i>
                            </div>
                        </div>
                        <div class="infor-details text-center">
                            <label>Phone Number 1</label>
                            <p>{{$c->phone_1}}</p>
                            <label>Phone Number 2</label>
                            <p>{{$c->phone_2}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex">
                    <div class="contact-box w-100 d-flex flex-wrap">
                        <div class="infor-img">
                            <div class="image-circle bg-primary">
                                <i class="feather-mail"></i>
                            </div>
                        </div>
                        <div class="infor-details text-center">
                            <label>E-mail</label>
                            <p>{{$c->email}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex">
                    <div class="contact-box w-100 d-flex flex-wrap">
                        <div class="infor-img">
                            <div class="image-circle">
                                <i class="feather-map-pin"></i>
                            </div>
                        </div>
                        <div class="infor-details text-center">
                            <label>Location</label>
                            <p class="col-sm-10 mb-0">
                                {{$c->address}}<br>
                                {{$c->town}},<br>
                                {{$c->getCity->name}}   {{$c->zip_code}},<br>
                                {{$c->getCountry->name}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @else
        <section class="contact-section">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-md-12 text-center">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 d-flex">
                        <div class="contact-box w-100 d-flex flex-wrap">
                            <div class="infor-img">
                                <div class="image-circle">
                                    <i class="feather-phone"></i>
                                </div>
                            </div>
                            <div class="infor-details text-center">
                                <label>Phone Number 1</label>
                                <p>---</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex">
                        <div class="contact-box w-100 d-flex flex-wrap">
                            <div class="infor-img">
                                <div class="image-circle bg-primary">
                                    <i class="feather-mail"></i>
                                </div>
                            </div>
                            <div class="infor-details text-center">
                                <label>E-mail</label>
                                <p>---</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex">
                        <div class="contact-box w-100 d-flex flex-wrap">
                            <div class="infor-img">
                                <div class="image-circle">
                                    <i class="feather-map-pin"></i>
                                </div>
                            </div>
                            <div class="infor-details text-center">
                                <label>Location</label>
                                <p class="col-sm-10 mb-0">
                                    ---<br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Contact Form -->
    <section class="contact-form">
        <div class="container">
            <div class="section-header text-center">
                <h2>Send Message!</h2>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form id="postFrontContactForm">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Full Name<span>*</span></label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Your email address <span>*</span></label>
                                    <input type="text" name="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Subject </label>
                                    <input type="text" name="subject" class="form-control">
                                </div>
                            </div><div class="col-md-12">
                                <div class="form-group">
                                    <label>File </label>
                                    <input type="file" name="file" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Your message <span>*</span></label>
                                    <textarea class="form-control" name="comments"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="send-message" style="    display: flex;
    justify-content: flex-end;">
                            <button class="btn bg-primary" id="sendContactForm">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /Contact Form -->

    <!-- Contact Map -->
    <section class="contact-map d-flex">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14530.032205196629!2d54.4408737!3d24.4331527!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5e677f6cb99e19%3A0x5af7bf555db04285!2sForever%20Wellness%20Medical%20Center!5e0!3m2!1sen!2str!4v1703547416963!5m2!1sen!2str" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>    </section>
    <!-- /Contact Map -->

    <!-- /Page Content -->


@endsection
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(function() {
            $('#navAnaSayfa').removeClass('active');
            $('#navHekimler').removeClass('active');
            $('#navHakkimizda').removeClass('active');
            $('#navBlog').removeClass('active');
            $('#navİletisim').addClass('active');
        });
    </script>

    <script>

        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                }
            });


        });


        $('#sendContactForm').click(function (event) {


            var formData = new FormData(document.getElementById('postFrontContactForm'));
            $.ajax({
                type: "POST",
                headers: {'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?> "},
                url: "{{ route('addContactMail') }}",
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                beforeSend: function() {
                    Swal.fire({
                        title: 'Lütfen Bekleyiniz...',
                        html: 'E-Posta gönderiliyor...',
                        allowEscapeKey: false,
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading()
                        }
                    });
                },
                success: function (data) {
                    if(data.Error != null){
                        console.log('deneme')
                        Swal.fire({
                            icon: 'error',
                            title: 'Başarısız',
                            html: data.Error,
                            showConfirmButton: true,
                            confirmButtonText: "Tamam",
                        });
                    }else{
                        console.log('success')
                        Swal.fire({
                            icon: 'success',
                            title: 'Başarılı',
                            html: 'Mail Oluşturma Başarılı!',
                            showConfirmButton: true,
                            confirmButtonText: "Tamam",


                        })
                    }

                },
                error: function (data) {
                    var errors = '';
                    for (datas in data.responseJSON.errors) {
                        errors += data.responseJSON.errors[datas] + '\n';
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'Başarısız',

                        html: '\n' + errors,
                        showConfirmButton: true,
                        confirmButtonText: "Tamam",
                    });
                }
            });

        });
    </script>



@endsection