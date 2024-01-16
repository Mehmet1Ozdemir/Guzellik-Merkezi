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
                    <h3 class="page-title">Update blog</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('panelIndex')}}">Management Panel</a></li>
                        <li class="breadcrumb-item"><a href="javascript:(0);">Blog</a></li>
                        <li class="breadcrumb-item active">Update Blog</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-sm-12">
                <form method="POST" id="updateBlogInformation" enctype="multipart/form-data">
                    <input type="hidden" name="blogID" value="{{$blog->id}}">
                    <!-- Basic Information -->
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Blog Information</h4>
                            <div class="row form-row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="change-avatar">
                                            <div class="profile-img">
                                                <img src="{{ $blog->image }}"
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
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ $category->id == $blog->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
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
                                                @foreach($dentists as $dentist)
                                                    <option value="{{ $dentist->id }}" {{ $dentist->id == $blog->dentist_id ? 'selected' : '' }}> {{ $dentist->name }} {{ $dentist->surname }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Title : <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="title" value="{{ $blog->title }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!-- ckeditor -->
                                    <div class="form-group">
                                        <label>Content</label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <textarea class="form-control" id="editor1" name="content">{{ $blog->description }}</textarea>
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
                                                <option value="1" {{ $blog->status == 1 ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ $blog->status == 0 ? 'selected' : '' }}>Passive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Basic Information -->

                    <div class="submit-section submit-btn-bottom">
                        <button id="updateBlogInformationButton" class="btn btn-primary submit-btn">Upload Blog</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
                    var selectedCategory = select.val();
                    select.empty();
                    select.append('<option value="">Lütfen seçin</option>');
                    $.each(data, function (key, value) {
                        var option = $('<option value="' + value.id + '">' + value.name + '</option>');
                        if (value.id == selectedCategory) {
                            option.attr('selected', 'selected');
                        }
                        select.append(option);
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
                    var selectedDentist = select.val();
                    select.append('<option value="">Lütfen seçin</option>');
                    $.each(data, function (key, value) {
                        var  option = $('<option value="' + value.id + '">' + value.name + ' ' + value.surname + '</option>');
                        if (value.id == selectedDentist) {
                            option.attr('selected', 'selected');
                        }
                        select.append(option);
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

    <script>
        $('#updateBlogInformationButton').click(function (event) {
            var button = $(this); // Butonu seçiyoruz
            button.prop('disabled', true); // Butonu inaktif hale getiriyoruz

            var formData = new FormData(document.getElementById('updateBlogInformation'));
            $.ajax({
                type: "POST",
                headers: {'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?> "},
                url: "{{ route('panel.blogUpdate') }}",
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data.Error != null) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Başarısız',
                            html: data.Error,
                            showConfirmButton: true,
                            confirmButtonText: "Tamam",
                        });
                    } else {
                        console.log('success')
                        Swal.fire({
                            icon: 'success',
                            title: 'Başarılı',
                            html: 'Blog Güncelleme Başarılı!',
                            showConfirmButton: true,
                            confirmButtonText: "Tamam",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "{{ route('panel.getBlogList') }}"; // Yönlendirilecek sayfanın URL'sini buraya yazın
                            }
                        });
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
                },
                complete: function () {
                    button.prop('disabled', false); // İşlem tamamlandığında butonu tekrar etkin hale getiriyoruz
                }
            });
        });

    </script>
@endsection
