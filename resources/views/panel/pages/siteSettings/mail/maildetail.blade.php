@extends('panel.layout.app')
@section('content')

    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Mail Details</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Management Panel </a></li>
                        <li class="breadcrumb-item active">Mail Details</li>
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
                            @if ($contact)
                                <h4 class="user-name mb-0">{{$contact->name}}</h4>
                                <hr>
                                <h6 class="text-muted">{{$contact->email}}</h6>
                            @else
                                <p>Contact Informations Not Found.</p>
                            @endif
                        </div>

                    </div>
                </div>
                <div class="profile-menu">
                    <ul class="nav nav-tabs nav-tabs-solid">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#cont_details_tab">Contact Informations
                                </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content profile-tab-cont">

                    <!-- Contact Details Tab -->
                    <div class="tab-pane fade show active" id="cont_details_tab">

                        <!-- Contact Details -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        @if ($contact)
                                            <div class="row">
                                                <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Name</p>
                                                <p class="col-sm-10">{{$contact->name}}</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">E-Mail</p>
                                                <p class="col-sm-10">{{$contact->email}}</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Title</p>
                                                <p class="col-sm-10">{{$contact->subject}}</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Descriptions</p>
                                                <p class="col-sm-10">{{$contact->comments}}</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">File :</p>
                                                @if($contact->file != null)
                                                    <p class="col-sm-10">
                                                        <button type="button" class="btn btn-success btn-sm" style="display: inline-block" onclick="getDownload({{$contact->id}})">Download File</button>
                                                    </p>

                                                @else
                                                    <p class="col-sm-10">File Not Found</p>
                                                @endif
                                            </div>
                                        @else
                                            <p>Contact Not Found</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        function getDownload(id) {
            let windowString = '{{ route('panel.contactDownload') }}' + "?id=" + id;

            window.open(windowString, '_blank')
        }

        $('#updateContactMailInformationButton').click(function (event) {

            var formData = new FormData(document.getElementById('updateContactInformation'));
            $.ajax({
                type: "POST",
                headers: {'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?> "},
                url: "{{ route('panel.contactUpdate') }}",
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
                            html: 'İletişim Güncelleme Başarılı!',
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

    <script type="text/javascript">

        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                }
            });

        });
    </script>
@endsection