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
                    <h2 class="breadcrumb-title">Blog</h2>
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

                    <div class="row blog-grid-row">
                        @if($blog != null)
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    @foreach($blog as $b)
                                        @if ($b->status == 1)
                                            @if($loop->iteration % 2 !== 0)
                                                <div class="blog grid-blog">
                                                    <!-- Blog Post -->
                                                    <div class="blog-image">
                                                        <a href="{{route('blogDetail',['id'=>$b->id])}}">
                                                            <img class="img-fluid" src="{{$b->image}}" alt="Post Image">
                                                        </a>
                                                    </div>
                                                    <div class="blog-content">
                                                        <ul class="entry-meta meta-item">
                                                            <li>
                                                                <div class="post-author">
                                                                    <a href="{{route('blogDetail',['id'=>$b->id])}}">
                                                                        <img src="{{$b->dentist->profile_picture_path}}" alt="Post Author">
                                                                        <span>{{$b->dentist->title}}. {{$b->dentist->name}} {{$b->dentist->surname}}</span>
                                                                    </a>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <i class="far fa-clock"></i>{{ \Carbon\Carbon::parse($b->created_at)->isoFormat('DD MMMM YYYY', 'D MMMM Y') }}
                                                            </li>
                                                        </ul>
                                                        <h3 class="blog-title">
                                                            <a href="{{route('blogDetail',['id'=>$b->id])}}">{{$b->category->name}} - {{$b->title}}</a>
                                                        </h3>
                                                        <p class="mb-0">{!! implode(' ', array_slice(explode(' ', $b->description), 0, 10)) !!}</p>
                                                        <!-- /Blog Post -->
                                                    </div>
                                                    <a href="{{route('blogDetail',['id'=>$b->id])}}" class="btn btn-primary btn-sm" style="position: absolute; bottom: 10px; right: 10px;">Read More</a>
                                                </div>
                                            @endif
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    @foreach($blog as $b)
                                        @if ($b->status == 1)
                                            @if($loop->iteration % 2 === 0)
                                                <div class="blog grid-blog">
                                                    <!-- Blog Post -->
                                                    <div class="blog-image">
                                                        <a href="{{route('blogDetail',['id'=>$b->id])}}">
                                                            <img class="img-fluid" src="{{$b->image}}" alt="Post Image">
                                                        </a>
                                                    </div>
                                                    <div class="blog-content">
                                                        <ul class="entry-meta meta-item">
                                                            <li>
                                                                <div class="post-author">
                                                                    <a href="{{route('blogDetail',['id'=>$b->id])}}">
                                                                        <img src="{{$b->dentist->profile_picture_path}}" alt="Post Author">
                                                                        <span>{{$b->dentist->title}}. {{$b->dentist->name}} {{$b->dentist->surname}}</span>
                                                                    </a>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <i class="far fa-clock"></i>{{ \Carbon\Carbon::parse($b->created_at)->isoFormat('DD MMMM YYYY', 'D MMMM Y') }}
                                                            </li>
                                                        </ul>
                                                        <h3 class="blog-title">
                                                            <a href="{{route('blogDetail',['id'=>$b->id])}}">{{$b->category->name}} - {{$b->title}}</a>
                                                        </h3>
                                                        <p class="mb-0">{!! implode(' ', array_slice(explode(' ', $b->description), 0, 10)) !!}</p>
                                                    </div>
                                                    <!-- /Blog Post -->
                                                    <a href="{{route('blogDetail',['id'=>$b->id])}}" class="btn btn-primary btn-sm" style="position: absolute; bottom: 10px; right: 10px;">Read More</a>
                                                </div>
                                            @endif
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif

                    </div>


                    <!-- Blog Pagination -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="blog-pagination">
                                <nav>
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1"><i
                                                        class="fas fa-angle-double-left"></i></a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">1</a>
                                        </li>
                                        <li class="page-item active">
                                            <a class="page-link" href="#">2 <span
                                                        class="visually-hidden">(current)</span></a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">3</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#"><i class="fas fa-angle-double-right"></i></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- /Blog Pagination -->

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
                            <h4 class="card-title"> Latest Blog Posts</h4>
                        </div>
                        <div class="card-body">

                            <ul class="latest-posts">
                                @foreach($blog as $b)
                                    @if ($b->status == 1)
                                        <li>
                                            <div class="post-thumb">
                                                <a href="{{route('blogDetail',['id'=>$b->id])}}">
                                                    <img class="img-fluid" src="{{$b->image}}" alt="">
                                                </a>
                                            </div>
                                            <div class="post-info">
                                                <h4>
                                                    <a href="{{route('blogDetail',['id'=>$b->id])}}">{{$b->category->name}} - {{$b->title}}</a>
                                                </h4>
                                                <p>{{ \Carbon\Carbon::parse($b->created_at)->isoFormat('DD MMMM YYYY', 'D MMMM Y') }}</p>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>

                            {{--                                <li>--}}
                                {{--                                    <div class="post-thumb">--}}
                                {{--                                        <a href="blog-details.html">--}}
                                {{--                                            <img class="img-fluid"--}}
                                {{--                                                 src="{{asset('dentalTamplate/assets/img/blog/blog-thumb-02.jpg')}}"--}}
                                {{--                                                 alt="">--}}
                                {{--                                        </a>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="post-info">--}}
                                {{--                                        <h4>--}}
                                {{--                                            <a href="blog-details.html">What are the benefits of Online Doctor--}}
                                {{--                                                Booking?</a>--}}
                                {{--                                        </h4>--}}
                                {{--                                        <p>3 Dec 2019</p>--}}
                                {{--                                    </div>--}}
                                {{--                                </li>--}}
                                {{--                                <li>--}}
                                {{--                                    <div class="post-thumb">--}}
                                {{--                                        <a href="blog-details.html">--}}
                                {{--                                            <img class="img-fluid"--}}
                                {{--                                                 src="{{asset('dentalTamplate/assets/img/blog/blog-thumb-03.jpg')}}"--}}
                                {{--                                                 alt="">--}}
                                {{--                                        </a>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="post-info">--}}
                                {{--                                        <h4>--}}
                                {{--                                            <a href="blog-details.html">Benefits of consulting with an Online Doctor</a>--}}
                                {{--                                        </h4>--}}
                                {{--                                        <p>3 Dec 2019</p>--}}
                                {{--                                    </div>--}}
                                {{--                                </li>--}}
                                {{--                                <li>--}}
                                {{--                                    <div class="post-thumb">--}}
                                {{--                                        <a href="blog-details.html">--}}
                                {{--                                            <img class="img-fluid"--}}
                                {{--                                                 src="{{asset('dentalTamplate/assets/img/blog/blog-thumb-04.jpg')}}"--}}
                                {{--                                                 alt="">--}}
                                {{--                                        </a>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="post-info">--}}
                                {{--                                        <h4>--}}
                                {{--                                            <a href="blog-details.html">5 Great reasons to use an Online Doctor</a>--}}
                                {{--                                        </h4>--}}
                                {{--                                        <p>2 Dec 2019</p>--}}
                                {{--                                    </div>--}}
                                {{--                                </li>--}}
                                {{--                                <li>--}}
                                {{--                                    <div class="post-thumb">--}}
                                {{--                                        <a href="blog-details.html">--}}
                                {{--                                            <img class="img-fluid"--}}
                                {{--                                                 src="{{asset('dentalTamplate/assets/img/blog/blog-thumb-05.jpg')}}"--}}
                                {{--                                                 alt="">--}}
                                {{--                                        </a>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="post-info">--}}
                                {{--                                        <h4>--}}
                                {{--                                            <a href="blog-details.html">Online Doctor Appointment Scheduling</a>--}}
                                {{--                                        </h4>--}}
                                {{--                                        <p>1 Dec 2019</p>--}}
                                {{--                                    </div>--}}
                                {{--                                </li>--}}
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
                                        <a href="{{ route('blogList', ['id' => $category->id]) }}">
                                            {{ $category->name }}
                                            <span>({{ $category->blogs->count() }})</span>
                                        </a>
                                    </li>
                                @endforeach

                                {{--                                <li><a href="#">Health Care <span>(27)</span></a></li>--}}
                                {{--                                <li><a href="#">Nutritions <span>(41)</span></a></li>--}}
                                {{--                                <li><a href="#">Health Tips <span>(16)</span></a></li>--}}
                                {{--                                <li><a href="#">Medical Research <span>(55)</span></a></li>--}}
                                {{--                                <li><a href="#">Health Treatment <span>(07)</span></a></li>--}}
                            </ul>
                        </div>
                    </div>
                    <!-- /Categories -->

                    <!-- Tags -->
                    {{--                    <div class="card tags-widget">--}}
                    {{--                        <div class="card-header">--}}
                    {{--                            <h4 class="card-title">Tags</h4>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="card-body">--}}
                    {{--                            <ul class="tags">--}}
                    {{--                                <li><a href="#" class="tag">Children</a></li>--}}
                    {{--                                <li><a href="#" class="tag">Disease</a></li>--}}
                    {{--                                <li><a href="#" class="tag">Appointment</a></li>--}}
                    {{--                                <li><a href="#" class="tag">Booking</a></li>--}}
                    {{--                                <li><a href="#" class="tag">Kids</a></li>--}}
                    {{--                                <li><a href="#" class="tag">Health</a></li>--}}
                    {{--                                <li><a href="#" class="tag">Family</a></li>--}}
                    {{--                                <li><a href="#" class="tag">Tips</a></li>--}}
                    {{--                                <li><a href="#" class="tag">Shedule</a></li>--}}
                    {{--                                <li><a href="#" class="tag">Treatment</a></li>--}}
                    {{--                                <li><a href="#" class="tag">Dr</a></li>--}}
                    {{--                                <li><a href="#" class="tag">Clinic</a></li>--}}
                    {{--                                <li><a href="#" class="tag">Online</a></li>--}}
                    {{--                                <li><a href="#" class="tag">Health Care</a></li>--}}
                    {{--                                <li><a href="#" class="tag">Consulting</a></li>--}}
                    {{--                                <li><a href="#" class="tag">Doctors</a></li>--}}
                    {{--                                <li><a href="#" class="tag">Neurology</a></li>--}}
                    {{--                                <li><a href="#" class="tag">Dentists</a></li>--}}
                    {{--                                <li><a href="#" class="tag">Specialist</a></li>--}}
                    {{--                                <li><a href="#" class="tag">Doccure</a></li>--}}
                    {{--                            </ul>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    <!-- /Tags -->

                </div>
                <!-- /Blog Sidebar -->

            </div>
        </div>
    </div>
    <!-- /Page Content -->
@endsection



@section('js')

    <script>
        $(function() {
            $('#navAnaSayfa').removeClass('active');
            $('#navHekimler').removeClass('active');
            $('#navHakkimizda').removeClass('active');
            $('#navİletisim').removeClass('active');
            $('#navBlog').addClass('active');
        });
    </script>

@endsection