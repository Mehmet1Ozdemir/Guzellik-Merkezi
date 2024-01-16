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
                    <h3 class="page-title">Categori Details</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('panelIndex')}}">Management Panel</a></li>
                        <li class="breadcrumb-item"><a href="javascript:(0);">Blog</a></li>
                        <li class="breadcrumb-item active">Categori Details</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-md-12">
                <div class="profile-header">
                    <div class="row align-items-center">
                        <!--
                        <div class="col-auto profile-image">
                            <a href="#">
                                <img class="rounded-circle" alt="User Image" src="assets/img/profiles/avatar-01.jpg">
                            </a>
                        </div>
                        -->
                        <div class="col ml-md-n2 profile-user-info">
                            <h4 class="user-name mb-0">{{$category->name}}</h4>
                            <h6 class="text-muted">{{$category->slug_name}}</h6>
                            <div class="user-Location"><i class="fa fa-map-marker"></i>{{$category->status}}</div>
                           <!-- <div class="about-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                           -->
                        </div>
                    </div>
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
                                            <span>Categori Details</span>
                                            <a class="edit-link" data-bs-toggle="modal" href="#edit_category_details"><i class="fa fa-edit me-1"></i>Güncelle</a>
                                        </h5>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Title</p>
                                            <p class="col-sm-10">{{$category->name}}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Slug</p>
                                            <p class="col-sm-10">{{$category->slug_name}}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Status</p>
                                            <p class="col-sm-10">{{$category->status}}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Edit Details Modal -->
                                <div class="modal fade" id="edit_category_details" aria-hidden="true" role="dialog">
                                    <div class="modal-dialog modal-dialog-centered" role="document" >
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Categori Information</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="updateCategoryInformationForm">
                                                    <input type="hidden" name="categoryID" value="{{$category->id}}">
                                                    <div class="row form-row">
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>Title :</label>
                                                                <input type="text" class="form-control" name="name" value="{{$category->name}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>Slug :</label>
                                                                <input type="text"  class="form-control" name="slug_name" value="{{$category->slug_name}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>Status</label>
                                                                <input type="text" class="form-control" name="status" value="{{$category->status}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <button id="updateCategoryInformationButton" class="btn btn-primary w-100">Save Changes</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Edit Details Modal -->

                            </div>

                        </div>
                        <!-- /Personal Details -->

                    </div>
                    <!-- /Personal Details Tab -->

                </div>
            </div>
        </div>

    <script>
        function setId(id){
            document.getElementById("category_id").value = id;
        }
    </script>

    <script>
        $('#updateCategoryInformationButton').click(function (event) {

            var formData = new FormData(document.getElementById('updateCategoryInformationForm'));
            $.ajax({
                type: "POST",
                headers: {'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?> "},
                url: "{{ route('panel.categoryUpdate') }}",
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function (data) {
                    if(data.Error != null){
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
                            html: 'Kategori Güncelleme Başarılı!',
                            showConfirmButton: true,
                            confirmButtonText: "Tamam",


                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload()
                            }
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