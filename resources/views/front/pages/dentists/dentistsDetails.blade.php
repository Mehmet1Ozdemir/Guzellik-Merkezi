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
                            <li class="breadcrumb-item active" aria-current="page">Doctors</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Doctor Profile</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Page Content -->
    <div class="content">
        <div class="container">

            <!-- Doctor Widget -->
            <div class="card">
                <div class="card-body">
                    <div class="doctor-widget">
                        <div class="doc-info-left">
                            <div class="doctor-img">
                                <img src="{{$dentist->profile_picture_path}}" class="img-fluid" alt="User Image">
                            </div>
                            <div class="doc-info-cont">
                                <h4 class="doc-name">{{$dentist->title}} {{$dentist->name}} {{$dentist->surname}}</h4>
                                <p class="doc-speciality">@if(count($dentist->experience)  > 0)
                                        {{$dentist->experience->first()->name}}
                                    @else

                                @endif</p>
                                <!--
                                <p class="doc-department"><img src="{{asset('dentalTamplate/assets/img/specialities/specialities-05.png')}}" class="img-fluid" alt="Speciality">Dentist</p>
                                -->
                                <p class="doc-department">Doctor</p>
                                <div class="rating">
                                    <div class="total-stars">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $averageStars)
                                                <i class="fas fa-star"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                            <span class="d-inline-block average-rating">({{$comments->count()}})</span>

                                    </div>
                                </div>
                                <div class="clinic-services">
                                    @foreach($dentist->dentistToSpecialisation as $dsp)
                                        <span>{{$dsp->name}}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="doc-info-right">
                            <div class="clini-infos">
                                <ul>
                                    <li><i class="far fa-comment"></i> {{$comments->count()}} Comments</li>

                                </ul>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!-- /Doctor Widget -->

            <!-- Doctor Details Tab -->
            <div class="card">
                <div class="card-body pt-0">

                    <!-- Tab Menu -->
                    <nav class="user-tabs mb-4">
                        <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                            <li class="nav-item">
                                <a class="nav-link active" href="#doc_overview" data-bs-toggle="tab">About</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#doc_reviews" data-bs-toggle="tab">Comments</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#doc_business_hours" data-bs-toggle="tab">Working Hours</a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /Tab Menu -->

                    <!-- Tab Content -->
                    <div class="tab-content pt-0">

                        <!-- Overview Content -->
                        <div role="tabpanel" id="doc_overview" class="tab-pane fade show active">
                            <div class="row">
                                <div class="col-md-12 col-lg-9">

                                    <!-- About Details -->
                                    <div class="widget about-widget">
                                        <h4 class="widget-title">Biography</h4>
                                        <p>
                                            {{$dentist->about}}
                                        </p>
                                    </div>
                                    <!-- /About Details -->

                                    @if(count($dentist->education)>0 )
                                    <!-- Education Details -->
                                    <div class="widget education-widget">
                                        <h4 class="widget-title">Education</h4>
                                        <div class="experience-box">
                                            <ul class="experience-list">
                                                @foreach($dentist->education as $dee)
                                                    <li>
                                                        <div class="experience-user">
                                                            <div class="before-circle"></div>
                                                        </div>
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <a href="#/" class="name">{{$dee->name}}</a>
                                                                <div>{{$dee->title}}</div>
                                                                <span class="time">{{date('d/m/Y', strtotime($dee->start_date))}}  - {{date('d/m/Y', strtotime($dee->due_date))}}</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /Education Details -->
                                    @endif
                                    @if(count($dentist->experience)>0 )
                                    <!-- Experience Details -->
                                    <div class="widget experience-widget">
                                        <h4 class="widget-title">Work & Experience</h4>
                                        <div class="experience-box">
                                            <ul class="experience-list">
                                                @foreach($dentist->experience as $dec)
                                                    <li>
                                                        <div class="experience-user">
                                                            <div class="before-circle"></div>
                                                        </div>
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <a href="#/" class="name">{{$dec->name}} - <em>{{$dec->title}}</em></a>
                                                                <span class="time">{{date('d/m/Y', strtotime($dee->start_date))}}  - {{date('d/m/Y', strtotime($dee->due_date))}}</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach

                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /Experience Details -->
                                    @endif
                                    <!-- Awards Details -->
                                    <!--
                                    <div class="widget awards-widget">
                                        <h4 class="widget-title">Awards</h4>
                                        <div class="experience-box">
                                            <ul class="experience-list">
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <p class="exp-year">July 2019</p>
                                                            <h4 class="exp-title">Humanitarian Award</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <p class="exp-year">March 2011</p>
                                                            <h4 class="exp-title">Certificate for International Volunteer Service</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <p class="exp-year">May 2008</p>
                                                            <h4 class="exp-title">The Dental Professional of The Year Award</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    -->
                                    <!-- /Awards Details -->

                                    <!-- Services List -->
                                    <div class="service-list">
                                        <h4>Services</h4>
                                        <ul class="clearfix">
                                            @foreach($dentist->dentistToSpecialisation as $dsp)
                                                @if($dsp->type == 0)
                                                    <li>{{$dsp->name}}</li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                    <!-- /Services List -->

                                    <!-- Specializations List -->
                                    <div class="service-list">
                                        <h4>Specialities</h4>
                                        <ul class="clearfix">
                                            @foreach($dentist->dentistToSpecialisation as $dsp)
                                                @if($dsp->type == 1)
                                                    <li>{{$dsp->name}}</li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                    <!-- /Specializations List -->

                                </div>
                            </div>
                        </div>
                        <!-- /Overview Content -->

                        <!-- Reviews Content -->
                        <div role="tabpanel" id="doc_reviews" class="tab-pane fade">

                            <!-- Review Listing -->
                            <div class="widget review-listing">
                                <ul class="comments-list">
                                    <!-- Comment List -->

                                    @foreach($comments as $comment)
                                        <li>
                                            <div class="comment">
                                                <img class="avatar avatar-sm rounded-circle" alt="User Image" src="{{asset('dentalTamplate/assets/img/patients/patient.jpg')}}">
                                                <div class="comment-body">
                                                    <div class="meta-data">
                                                        <span class="comment-author">{{ $comment->name }}</span>
                                                        <span class="comment-date">{{ $comment->created_at->diffForHumans() }}</span>
                                                        <div class="review-count rating">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                @if ($i <= $comment->stairs)
                                                                    <i class="fas fa-star filled"></i>
                                                                @else
                                                                    <i class="fas fa-star"></i>
                                                                @endif
                                                            @endfor
                                                        </div>
                                                    </div>
                                                    <p class="comment-content">
                                                        {{ $comment->comments }}
                                                    </p>

                                                </div>
                                            </div>
                                        </li>
                                    @endforeach

                                    <!-- /Comment List -->

                                </ul>

                                @if($comments->count() > 7)
                                    <!-- Show All -->
                                    <div class="all-feedback text-center">
                                        <a href="#" class="btn btn-primary btn-sm">
                                            Tüm Yotumları Göster <strong>({{$comments->count()}})</strong>
                                        </a>
                                    </div>
                                    <!-- /Show All -->
                                @endif


                            </div>
                            <!-- /Review Listing -->

                            <!-- Write Review -->
                            <div class="write-review">
                                <h4 class="mb-3"><strong>Write a Comment for {{$dentist->title}} {{$dentist->name}} {{$dentist->surname}}</strong></h4>

                                <!-- Yorum Ekleme Formu -->
                                <div class="card new-comment clearfix">
                                    <div class="card-header">
                                        <h4 class="card-title">Comment</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('dentist-comments.create') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="dentist_id" value="{{$dentist->id}}">
                                            <div class="star-rating">
                                                <input id="star-5" type="radio" name="stairs" value="5">
                                                <label for="star-5" title="5 stars">
                                                    <i class="active fa fa-star"></i>
                                                </label>
                                                <input id="star-4" type="radio" name="stairs" value="4">
                                                <label for="star-4" title="4 stars">
                                                    <i class="active fa fa-star"></i>
                                                </label>
                                                <input id="star-3" type="radio" name="stairs" value="3">
                                                <label for="star-3" title="3 stars">
                                                    <i class="active fa fa-star"></i>
                                                </label>
                                                <input id="star-2" type="radio" name="stairs" value="2">
                                                <label for="star-2" title="2 stars">
                                                    <i class="active fa fa-star"></i>
                                                </label>
                                                <input id="star-1" type="radio" name="stairs" value="1">
                                                <label for="star-1" title="1 star">
                                                    <i class="active fa fa-star"></i>
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label>Name <span class="text-danger">*</span></label>
                                                <input type="text" name="name" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>E-mail Adress<span class="text-danger">*</span></label>
                                                <input type="email" name="email" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Comment</label>
                                                <textarea rows="4" name="comments" class="form-control"></textarea>
                                            </div>
                                            <div class="submit-section">
                                                <button class="btn btn-primary submit-btn" type="submit">Send</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- /Yorum Ekleme Formu -->



                            </div>
                            <!-- /Write Review -->

                        </div>
                        <!-- /Reviews Content -->

                        <!-- Business Hours Content -->
                        <div role="tabpanel" id="doc_business_hours" class="tab-pane fade">
                            <div class="row">
                                <div class="col-md-6 offset-md-3">

                                    <!-- Business Hours Widget -->
                                    <div class="widget business-widget">
                                        <div class="widget-content">
                                            <div class="listing-hours">
                                                <div class="listing-day current">
                                                    <div class="day">Today <span>{{\Carbon\Carbon::now()->format('d.m.Y')}}</span></div>
                                                </div>
                                                @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                                                <div class="listing-day">
                                                    <div class="day">{{ $day }}</div>
                                                    <div class="time-items">
                                                        @foreach($dentist_working->where('day', $day) as $d)
                                                            @if(($d->start_date || $d->due_date) !=null)
                                                        <span class="time">{{$d->start_date.' - '.$d->due_date}}</span>
                                                            @else
                                                                <span class="time"><span class="badge bg-danger-light">Closed</span></span>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Business Hours Widget -->

                                </div>
                            </div>
                        </div>
                        <!-- /Business Hours Content -->

                    </div>
                </div>
            </div>
            <!-- /Doctor Details Tab -->

        </div>
    </div>
    <!-- /Page Content -->

@endsection