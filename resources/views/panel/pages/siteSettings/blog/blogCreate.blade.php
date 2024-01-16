@extends('panel.layout.app')

@section('content')
    @section('style')
        <link rel="stylesheet" href="{{ asset('dentalTamplate/assets/plugins/select2/css/select2.min.css') }}">
        <link rel="stylesheet"
              href="{{ asset('dentalTamplate/assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}">
        <link rel="stylesheet" href="{{ asset('dentalTamplate/assets/plugins/dropzone/dropzone.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dentalTamplate/assets/css/style.css') }}">
    @endsection

    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Create Blog</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('panelIndex')}}">Management Panel</a></li>
                        <li class="breadcrumb-item"><a href="javascript:(0);">Blog</a></li>
                        <li class="breadcrumb-item active">Create Blog</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-sm-12">
                <form method="POST" action="{{ route('panel.blogCreate') }}" id="createBlogForm" enctype="multipart/form-data">
                    @csrf
                    <!-- Basic Information -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Blog Information</h4>
                            <div class="row form-row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="change-avatar">
                                            <div class="profile-img">
                                                <img src="{{ asset('dentalTamplate/assets/img/doctors/doctor-thumb-02.jpg') }}"
                                                     alt="User Image">
                                            </div>
                                            <div class="upload-img">
                                                <div class="change-photo-btn">
                                                    <span><i class="fa fa-upload"></i> Upload Image</span>
                                                    <input type="file" class="upload" name="image">
                                                </div>
                                                <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of
                                                    2MB</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- category_id select -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Categori: <span class="text-danger">*</span></label>
                                        <select name="category_id" id="category_id" class="form-control">
                                            <option value="">Please Select</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- dentist_id select -->
                                <div class="col-md-6">
                                    <label>Doctor: <span class="text-danger">*</span></label>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <select name="dentist_id" id="dentist_id" class="form-control">
                                                <option value="">Please Select</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Title : <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="title">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!-- ckeditor -->
                                    <div class="form-group">
                                        <label>Content</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <textarea class="form-control" id="editor1" name="description"></textarea>
                                                <script>
                                                    CKEDITOR.replace('editor1');
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-1">
                                    <label>Status</label>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <select name="status" class="form-control">
                                                <option value="1">Active </option>
                                                <option value="0">Passive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- /Basic Information -->

                    <div class="submit-section submit-btn-bottom">
                        <button type="submit" class="btn btn-primary submit-btn">Create Blog</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        @if (session('error'))
        Swal.fire({
            title: 'Hata!',
            text: '{{\Illuminate\Support\Facades\Session::get('error')}}',
            icon: 'error',
            confirmButtonText: 'Tamam'
        });
        @endif

        @if (session('success'))
        Swal.fire({
            title: 'Başarılı!',
            text: '{{\Illuminate\Support\Facades\Session::get('success')}}',
            icon: 'success',
            confirmButtonText: 'Tamam'
        });
        @endif
    </script>

    <script>
        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                }
            });

        });

        function fetchCategories() {
            $.ajax({
                url: "{{ route('category.getCategories') }}",
                type: "GET",
                dataType: "json",
                success: function (data) {
                    var select = $("#category_id");
                    select.empty();
                    select.append('<option value="">Lütfen seçin</option>');
                    $.each(data, function (key, value) {
                        console.log(data)
                        select.append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        }

        // Sayfa yüklendiğinde kategorileri getirmek için fetchCategories fonksiyonu
        $(document).ready(function () {
            fetchCategories();
        });

        function fetchDentists() {
            $.ajax({
                url: "{{ route('dentist.getDentists') }}",
                type: "GET",
                dataType: "json",
                success: function (data) {
                    var select = $("#dentist_id");
                    select.empty();
                    select.append('<option value="">Lütfen seçin</option>');
                    $.each(data, function (key, value) {
                        console.log(data)
                        select.append('<option value="' + value.id + '">' + value.name + ' ' + value.surname + '</option>');
                    });
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        }

        // Sayfa yüklendiğinde diş hekimlerini getirmek için fetchDentists fonksiyonu
        $(document).ready(function () {
            fetchDentists();
        });
    </script>

@endsection
