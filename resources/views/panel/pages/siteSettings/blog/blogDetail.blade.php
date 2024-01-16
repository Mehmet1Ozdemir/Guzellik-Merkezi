@extends('panel.layout.app')
@section('content')
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Detail Blog</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('panelIndex')}}">Management Panel</a></li>
                        <li class="breadcrumb-item"><a href="javascript:(0);">Blog</a></li>
                        <li class="breadcrumb-item active">Blog Details</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-md-12">
                <div class="profile-header">


                    @if($blog != null)
                        <div class="row align-items-center">
                        <div class="col-auto profile-image">
                            <a href="#">
                                <img class="rounded-circle" alt="User Image" width="50" height="40" src="{{ $blog->image }}">
                            </a>
                        </div>
                        <div class="col ml-md-n2 profile-user-info">
                            <h4 class="user-name mb-0">{{$blog->title}}</h4>
                            <h6 class="text-muted">{{ $blog->status == 1 ? 'Aktif' : 'Pasif' }}</h6>
                        </div>
                    </div>
                    @else
                        <div class="row align-items-center">
                        <div class="col ml-md-n2 profile-user-info">
                            <h4 class="user-name mb-0">---</h4>
                            <h6 class="text-muted">---</h6>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="profile-menu">
                    <ul class="nav nav-tabs nav-tabs-solid">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="{{route('panel.getBlogList')}}">Blogs</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content profile-tab-cont">

                    <!-- Personal Details Tab -->
                    <div class="tab-pane fade show active" id="per_details_tab">

                        <!-- Personal Details -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title d-flex justify-content-between">
                                            <span>Blog Details</span>
                                            <form method="POST" action="{{ route('panel.getBlogListUpdate', $blog->id) }}">
                                                @csrf
                                                <button type="submit" class="edit-link"><i class="fa fa-edit me-1"></i>Update</button>
                                            </form>
                                        </h5>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Image</p>
                                            <div class="col-sm-10">
                                                <img width="100" src="{{ $blog->image }}" alt="Blog Görseli">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Title</p>
                                            <p class="col-sm-10">{{$blog->title}} </p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Status</p>
                                            <p class="col-sm-10">{{ $blog->status == 1 ? 'Aktif' : 'Pasif' }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">categori</p>
                                            <p class="col-sm-10">
                                                @foreach($categories as $category)
                                                    @if($category->id == $blog->category_id)
                                                        <span class="selected-category">{{$category->name}}</span>
                                                    @endif
                                                @endforeach
                                            </p>
                                        </div>


                                        <!-- Doktor -->
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Name</p>
                                            <p class="col-sm-10">
                                                @foreach($dentists as $dentist)
                                                    @if($dentist->id == $blog->dentist_id)
                                                        {{$dentist->name}} {{$dentist->surname}}
                                                    @endif
                                                @endforeach
                                            </p>
                                        </div>

                                        <!-- İçerik -->
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Content</p>
                                            <p class="col-sm-10">
                                                @if(!empty($blog->description))
                                                    {!! $blog->description !!}
                                                @else
                                                    Content Not Found
                                                @endif
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Personal Details -->
                    </div>
                    <!-- /Personal Details Tab -->
                </div>
            </div>
        </div>
    </div>
@endsection