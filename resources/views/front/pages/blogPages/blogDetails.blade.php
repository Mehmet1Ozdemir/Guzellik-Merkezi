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
                            <li class="breadcrumb-item active" aria-current="page">Blog</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Blog Details</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Page Content -->
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="blog-view">


                        <div class="blog blog-single-post">
                            <div class="blog-image">
                                <a href="javascript:void(0);"><img alt="" src="{{$blog->image}}" class="img-fluid"></a>
                            </div>
                            <h3 class="blog-title">{{$blog->category->name}} - {{$blog->title}}</h3>
                            <div class="blog-info clearfix">
                                <div class="post-left">
                                    <ul>
                                        <li>
                                            <div class="post-author">
                                                <a href="#"><img src="{{$blog->dentist->profile_picture_path}}"
                                                                 alt="Post Author">
                                                    <span>{{$blog->dentist->title}}. {{$blog->dentist->name}} {{$blog->dentist->surname}}</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <i class="far fa-calendar"></i>{{ \Carbon\Carbon::parse($blog->created_at)->isoFormat('DD MMMM YYYY', 'D MMMM Y') }}
                                        </li>
                                        <li><i class="far fa-comments"></i>12 Comment</li>
                                        <li><i class="fa fa-tags"></i>Health Types</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="blog-content">
                                <p>{!! $blog->description !!}</p>
                            </div>
                        </div>


                        <div class="card blog-share clearfix">
                            <div class="card-header">
                                <h4 class="card-title">Share Post</h4>
                            </div>
                            <div class="card-body">
                                <ul class="social-share">
                                    <li><a href="#" title="Facebook"><i class="fab fa-facebook"></i></a></li>
                                    <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                                    <li><a href="#" title="Google Plus"><i class="fab fa-google-plus"></i></a></li>
                                    <li><a href="#" title="Youtube"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card author-widget clearfix">
                            <div class="card-header">
                                <h4 class="card-title">About the Author</h4>
                            </div>
                            <div class="card-body">
                                <div class="about-author">
                                    <div class="about-author-img">
                                        <div class="author-img-wrap">
                                            <a href="doctor-profile.html"><img class="img-fluid rounded-circle" alt=""
                                                                               src="{{asset('dentalTamplate/assets/img/doctors/doctor-thumb-02.jpg')}}"></a>
                                        </div>
                                    </div>
                                    <div class="author-details">
                                        <a href="doctor-profile.html" class="blog-author-name">{{$blog->dentist->title}}
                                            . {{$blog->dentist->name}} {{$blog->dentist->surname}}</a>
                                        @foreach($dentists as $dentist)
                                            @if($dentist->id == $blog->dentist->id)
                                                <p class="mb-0">{{$dentist->about}}</p>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card blog-comments clearfix">
                            <div class="card-header">
                                <h4 class="card-title">Comments ({{ $comments->count() }})</h4>
                            </div>
                            <div class="card-body pb-0">
                                <ul class="comments-list">
                                    @if($comments->count() > 0)
                                        @foreach($comments as $comment)
                                            <li>
                                                <div class="comment">
                                                    <div class="comment-author">
                                                        <img class="avatar" alt=""
                                                             src="{{ asset('dentalTamplate/assets/img/patients/patient4.jpg') }}">
                                                    </div>
                                                    <div class="comment-block">
                                                        <span class="comment-by">
                                                            <span class="blog-author-name">{{ $comment->name }}</span>
                                                        </span>
                                                        <p>{!! $comment->comments !!}</p>
                                                        <p class="blog-date">{{ $comment->created_at->format('M d, Y') }}</p>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    @else
                                        <li>
                                            <div class="comment">
                                                <div class="comment-block">
                                                    <p>No Comments Found</p>
                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <!-- Yorum Ekleme Formu -->
                        <div class="card new-comment clearfix">
                            <div class="card-header">
                                <h4 class="card-title">Comment</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('comments.create') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="blog_id" value="{{ $blog->id }}">
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
                    </div>
                </div>

                <!-- Blog Sidebar -->
                <div class="col-lg-4 col-md-12 sidebar-right theiaStickySidebar">

                    <!-- Search -->
                    <!--
                    <div class="card search-widget">
                        <div class="card-body">
                            <form class="search-form">
                                <div class="input-group">
                                    <input type="text" placeholder="Arayın..." class="form-control">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    -->
                    <!-- /Search -->

                    <!-- Latest Posts -->
                    <div class="card post-widget">
                        <div class="card-header">
                            <h4 class="card-title">Recently Added Blogs</h4>
                        </div>
                        <div class="card-body">

                            <ul class="latest-posts">
                                @foreach($blogLatest as $b)
                                    <li>
                                        <div class="post-thumb">
                                            <a href="{{route('blogDetail',['id'=>$b->id])}}">
                                                <img class="img-fluid"
                                                     src="{{$b->image}}"
                                                     alt="">
                                            </a>
                                        </div>
                                        <div class="post-info">
                                            <h4>
                                                <a href="{{route('blogDetail',['id'=>$b->id])}}">{{$b->category->name}}
                                                    -{{$b->title}}</a>
                                            </h4>
                                            <p>{{ \Carbon\Carbon::parse($b->created_at)->isoFormat('DD MMMM YYYY', 'D MMMM Y') }}</p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- /Latest Posts -->

                    <!-- Categories -->
                    <div class="card category-widget">
                        <div class="card-header">
                            <h4 class="card-title">Blog Categories</h4>
                        </div>
                        <div class="card-body">
                            <ul class="categories">
                                @foreach($categories as $category)
                                    <li>
                                        <a href="{{ route('blogList',$category->id) }}">
                                            {{ $category->name }}
                                            <span>({{ $category->blogs->count() }})</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Blog Sidebar -->

            </div>
        </div>

    </div>
    <!-- /Page Content -->
@endsection