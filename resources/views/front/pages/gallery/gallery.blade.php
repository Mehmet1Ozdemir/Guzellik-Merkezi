@extends('front.layout.app')

@section('content')
    <style>
        .section-search {
            background-image: url('{{ asset('img/about-img6.jpg') }}') !important;
        !important;
        }


        .card-deck {
            gap: 10px;
            display: flex;
            margin: 20px -15px;
            flex-wrap: wrap;
        }

        .card-deck .card {
            margin: 0 0 1rem;
        }

        @media (min-width: 576px) and (max-width: 767.98px) {
            .card-deck .card {
                -ms-flex: 0 0 48.7%;
                flex: 0 0 48.7%;
            }
        }

        @media (min-width: 768px) and (max-width: 991.98px) {
            .card-deck .card {
                -ms-flex: 0 0 32%;
                flex: 0 0 32%;
            }
        }

        @media (min-width: 992px)
        {
            .card-deck .card {
                -ms-flex: 0 0 24%;
                flex: 0 0 24%;
            }
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
                                    <li class="breadcrumb-item active" aria-current="page">Gallery</li>

                                </ol>
                            </nav>
                            <h2 class="breadcrumb-title">Gallery</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="gallery-section">
            <div class="container">
                <div class="row">
                    <div class="card-deck ">

                        @foreach($photos as $p)

                            <div class="card col-xs-12 col-sm-6 col-md-3">
                                <img class="card-img-top" src="{{ asset($p->image) }}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{$p->title}}</h5>
                                </div>
                            </div>

                        @endforeach

                    </div>
                </div>
            </div>
    </section>

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
        <script>
            // Open the Modal
            function openModal() {
                document.getElementById("myModal").style.display = "block";
            }

            function closeModal() {
                document.getElementById("myModal").style.display = "none";
            }

            var slideIndex = 1;
            showSlides(slideIndex);

            function plusSlides(n) {
                showSlides((slideIndex += n));
            }

            function currentSlide(n) {
                showSlides((slideIndex = n));
            }

            function showSlides(n) {
                var i;
                var slides = document.getElementsByClassName("mySlides");
                var dots = document.getElementsByClassName("demo");
                var captionText = document.getElementById("caption");
                if (n > slides.length) {
                    slideIndex = 1;
                }
                if (n < 1) {
                    slideIndex = slides.length;
                }
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex - 1].style.display = "block";
                dots[slideIndex - 1].className += " active";
                captionText.innerHTML = dots[slideIndex - 1].alt;
            }

        </script>
    @endsection

@endsection