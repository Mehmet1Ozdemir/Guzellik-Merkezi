@extends('front.layout.app')
@section('content')
    <style>
        .pro-content .row{
            justify-content: flex-end;
        }


    </style>
    <section class="dentists-page">
        <div class="main-wrapper">

            <!-- Breadcrumb -->
            <div class="breadcrumb-bar">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-md-12 col-12">
                            <nav aria-label="breadcrumb" class="page-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('front.home')}}">Home Page</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Doctors</li>
                                </ol>
                            </nav>
                            <h2 class="breadcrumb-title">Doctors</h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Breadcrumb -->
            <!-- Page Content -->
            <div class="">
                <div class="container-fluid mt-5">

                    <div class="row ">
                                @if(!empty($dentists))
                                        <div class="dentists-cards">
                                            @foreach($dentists as $dentist)

                                                    <div class="profile-widget  ">
                                                        <div class="doc-img">
                                                            <a href="{{route('dentist.dentistsDetails',$dentist->id)}}">
                                                                <img class="img-fluid" alt="User Image" src="{{$dentist->profile_picture_path}}">
                                                            </a>
                                                            <a href="javascript:void(0)" class="fav-btn">
                                                                <i class="far fa-bookmark"></i>
                                                            </a>
                                                        </div>
                                                        <div class="pro-content">
                                                            <h3 class="title">
                                                                <a href="{{route('dentist.dentistsDetails',$dentist->id)}}">{{$dentist->title}}. {{$dentist->name}} {{$dentist->surname}}</a>
                                                                <i class="fas fa-check-circle verified"></i>
                                                            </h3>

                                                            <ul class="available-info">
                                                                <li>
                                                                    <i class="far fa-hospital"></i> {{$dentist->unit->name}}
                                                                </li>
                                                            </ul>
                                                            <div class="row row-sm">
                                                                <div class="col-6">
                                                                    <a href="{{route('dentist.dentistsDetails',$dentist->id)}}" class="btn view-btn">See Profile</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                            @endforeach
                                        </div>

                                @endif

                        <!-- /content-left-->

                    </div>
                    <!-- /row-->

                </div>

            </div>
            <!-- /Page Content -->

        </div>

    </section>
@endsection


@section('js')

    <script>
        $(function() {
            $('#navAnaSayfa').removeClass('active');
            $('#navHakkimizda').removeClass('active');
            $('#navBlog').removeClass('active');
            $('#navİletisim').removeClass('active');
            $('#navHekimler').addClass('active');
        });
    </script>

@endsection