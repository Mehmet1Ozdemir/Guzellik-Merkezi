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
                    <h3 class="page-title">Patient Detail</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('panelIndex')}}">Management Panel</a></li>
                        <li class="breadcrumb-item active">Patient Detail</li>
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
                            <h4 class="user-name mb-0">{{$patient->name}} {{$patient->surname}}</h4>
                            <h6 class="text-muted">{{$patient->email}}</h6>
                            <div class="user-Location"><i class="fa fa-map-marker"></i>{{$patient->town}}, {{$patient->getCountry->name}}</div>
                           <!-- <div class="about-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                           -->
                        </div>
                    </div>
                </div>
                <div class="profile-menu">
                    <ul class="nav nav-tabs nav-tabs-solid">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#per_details_tab">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#password_tab">Transactions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#payments_tab">Payments</a>
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
                                            <span>Patient Detail</span>
                                            <a class="edit-link" data-bs-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit me-1"></i>Güncelle</a>
                                        </h5>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Name</p>
                                            <p class="col-sm-10">{{$patient->name}} {{$patient->surname}}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Date of Birth</p>
                                            <p class="col-sm-10">{{date('d-m-Y', strtotime($patient->birth_date))}}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">E-mail</p>
                                            <p class="col-sm-10">{{$patient->email}}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Phone Number</p>
                                            <p class="col-sm-10">{{$patient->phone_number}}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0">Address</p>
                                            <p class="col-sm-10 mb-0">{{$patient->address}}<br>
                                                {{$patient->town}},<br>
                                                {{$patient->getCity->name}}   {{$patient->zip_code}},<br>
                                                {{$patient->getCountry->name}}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Edit Details Modal -->
                                <div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
                                    <div class="modal-dialog modal-dialog-centered" role="document" >
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Personal Information</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="updatePersonalInformationForm">
                                                    <input type="hidden" name="patientID" value="{{$patient->id}}">
                                                    <div class="row form-row">
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>Name :</label>
                                                                <input type="text" class="form-control" name="name" value="{{$patient->name}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>Surname :</label>
                                                                <input type="text"  class="form-control" name="surname" value="{{$patient->surname}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Date of Birth :</label>
                                                                <div class="cal-icon">
                                                                    <input type="text" class="form-control datetimepicker" name="birth_date" value="{{date('d-m-Y', strtotime($patient->birth_date))}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>E-mail</label>
                                                                <input type="email" class="form-control" name="email" value="{{$patient->email}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>Phone Number</label>
                                                                <input type="text" value="{{$patient->phone_number}}" name="phone_number" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <h5 class="form-title"><span>Address</span></h5>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Full Address :</label>
                                                                <input type="text" class="form-control" name="address" value="{{$patient->address}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>Country</label>
                                                                <select class="form-control" name="country_id" id="country_select">
                                                                    @foreach($countries as $country)
                                                                        <option value="{{$country->id}}" @if($patient->country_id == $country->id) selected @endif>{{$country->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>City :</label>
                                                                <select  class="form-control" name="city_id" id="city_select"  >
                                                                    <option selected disabled >Make Your Choice</option>
                                                                    @foreach($cities as $city)
                                                                        <option value="{{$city->id}}"  @if($patient->city_id == $city->id) selected @endif>{{$city->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>District :</label>
                                                                <input type="text" class="form-control" name="town" value="{{$patient->town}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>Post Code</label>
                                                                <input type="text" class="form-control" name="zip_code" value="{{$patient->zip_code}}">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </form>
                                                <button id="updatePersonalInformationButton" class="btn btn-primary w-100">Save Changes</button>

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

                    <!-- Change Password Tab -->
                    <div id="password_tab" class="tab-pane fade">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Procedures Performed on the Patient</h5>
                                        <div class="table-responsive">
                                            <table class="table table-hover table-center mb-0 w-100" id="patient_treatments_table" >
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Performer of the Procedure</th>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    <th>Total Cost</th>
                                                    <th>Amount Paid</th>
                                                    <th>Payments</th>
                                                    <th>Detail</th>
                                                    <th>Delete</th>
                                                </tr>
                                                </thead>

                                                <tfoot>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Performer of the Procedure</th>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    <th>Total Cost</th>
                                                    <th>Amount Paid</th>
                                                    <th>Payment</th>
                                                    <th>Detail </th>
                                                    <th>Delete</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                <a class="btn btn-warning " data-bs-toggle="modal" href="#add_patient_treatment"><i class="fa fa-plus me-1"></i>İşlem Ekle</a>

                            </div>
                        </div>
                    </div>
                    <!-- /Change Password Tab -->


                    <!-- Payments Tab -->
                    <div id="payments_tab" class="tab-pane fade">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Patient's Payments</h5>
                                <div class="table-responsive">
                                    <table class="table table-hover table-center mb-0 w-100" id="patient_treatments_payments_table" >
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Performed Procedure</th>
                                            <th>Total Cost</th>
                                            <th>Amount Paid</th>
                                            <th>Paid</th>
                                            <th>Payment Date</th>


                                        </tr>
                                        </thead>

                                        <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Performed Procedure</th>
                                            <th>Total Cost</th>
                                            <th>Amount Paid</th>
                                            <th>Paid</th>
                                            <th>Payment Date</th>

                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Payments Tab -->

                </div>
            </div>
        </div>

        <!-- Add Treatment Modal -->
        <div class="modal fade" id="add_patient_treatment" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document" >
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create a Procedure (Treatment)</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="patientTreatmentCreateForm" enctype="multipart/form-data">
                            <input type="hidden" name="patient_id" value="{{$patient->id}}">
                            <div class="row form-row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Title :</label>
                                        <input type="text" name="title" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Doctor:</label>
                                        <select class="form-select form-control" name="dentist_id">
                                            <option value="">Make Your Selectionz</option>
                                            @foreach($dentists as $dentist)
                                                <option value="{{$dentist->id}}">{{$dentist->title}} {{$dentist->name}} {{$dentist->surname}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Description :</label>
                                        <textarea rows="5" cols="5" class="form-control" placeholder="İşlem açıklamasını yazınız" name="description"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Payment :</label>
                                        <input type="number" name="total_payment" placeholder="İşlem için ödenecek tutarı yazınız." class="form-control">
                                    </div>
                                </div>




                            </div>

                        </form>
                        <button id="patientTreatmentCreate" data-bs-dismiss="modal" class="btn btn-primary w-100">Save Patient Procedure</button>

                    </div>
                </div>
            </div>
        </div>

        <!-- Add Payment Modal -->
        <div class="modal fade" id="add_patient_payment" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document" >
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Make a Payment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="treatmentPaymentForm" enctype="multipart/form-data">
                            <input type="hidden" name="payment_id" id="payment_id">
                            <div class="row form-row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Payment :</label>
                                        <input type="number" name="paid_payment" placeholder="İşlem için ödenecek tutarı yazınız." class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Please Confirm the Transaction :</label>
                                        <input type="checkbox" id="confirm" name="confirm">
                                    </div>
                                </div>
                            </div>

                        </form>
                        <button id="treatmentPaymentCreate" data-bs-dismiss="modal" class="btn btn-primary w-100">Save Payment</button>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        function setId(id){
            document.getElementById("payment_id").value = id;
        }
    </script>

    <script>
        $('#country_select').change(function (event) {
            var country = $('#country_select').val();
            $.ajax({
                type: 'GET',
                url: '{{route('getCities')}}',
                data: {
                    country_id: country
                },
                success: function (data) {
                    $("#city_select").empty()
                    var innerDateSelect = "<option disabled selected>Seçim Yapınız</option>"
                    data.cities.forEach((item) => {
                        innerDateSelect += "<option value='" + item.id + "'>" + item.name + "</option>"
                    });
                    $("#city_select").append(innerDateSelect);
                }
            });
        });
    </script>

    <script>
        $('#updatePersonalInformationButton').click(function (event) {

            var formData = new FormData(document.getElementById('updatePersonalInformationForm'));
            $.ajax({
                type: "POST",
                headers: {'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?> "},
                url: "{{ route('patientUpdate') }}",
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
                            html: 'Hasta Güncelleme Başarılı!',
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

        var treatmentsDataTable = null;

        treatmentsDataTable = $('#patient_treatments_table').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.10.21/i18n/Turkish.json'
            },
            order: [
                [0, 'ASC']
            ],
            processing: true,
            serverSide: true,
            scrollX: true,
            scrollY: true,
            ajax: '{{ route('fetchPatientTreatments',$patient->id) }}',
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'dentist'},
                {data: 'title'},
                {data: 'description'},
                {data: 'total_payment'},
                {data: 'paid_payment'},
                {data: 'payment'},
                {data: 'detail'},
                {data: 'delete'},

            ]
        });

    </script>

    <script>

        var dataTable = null;

        dataTable = $('#patient_treatments_payments_table').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.10.21/i18n/Turkish.json'
            },
            order: [
                [0, 'ASC']
            ],
            processing: true,
            serverSide: true,
            scrollX: true,
            scrollY: true,
            ajax: '{{ route('fetchTreatmentPayments',$patient->id) }}',
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'treatment'},
                {data: 'total_payment'},
                {data: 'total_paid'},
                {data: 'paid_payment'},
                {data: 'paid_date'},
            ]
        });
    </script>

    <script>
        $('#patientTreatmentCreate').click(function (event) {

            var formData = new FormData(document.getElementById('patientTreatmentCreateForm'));
            $.ajax({
                type: "POST",
                headers: {'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?> "},
                url: "{{ route('patientTreatmentAdd') }}",
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
                            html: 'Hasta İşlemi Oluşturma Başarılı!',
                            showConfirmButton: true,
                            confirmButtonText: "Tamam",


                        }).then((result) => {
                            if (result.isConfirmed) {
                                treatmentsDataTable.ajax.reload();
                                $("#patientTreatmentCreateForm").trigger("reset");
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

        $('#treatmentPaymentCreate').click(function (event) {
            var formData = new FormData(document.getElementById('treatmentPaymentForm'));
            $.ajax({
                type: "POST",
                headers: {'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?> "},
                url: "{{ route('treatmentPaymentAdd') }}",
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
                            html: 'Ödeme ekleme Başarılı!',
                            showConfirmButton: true,
                            confirmButtonText: "Tamam",


                        }).then((result) => {
                            if (result.isConfirmed) {
                                treatmentsDataTable.ajax.reload();
                                $("#treatmentPaymentForm").trigger("reset");
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

    <script>
        function deleteTreatment(id) {
            Swal.fire({
                icon: "warning",
                title: "Emin misiniz?",
                html: "İşlemi silmek istediğinize emin misiniz?",
                showConfirmButton: true,
                showCancelButton: true,
                confirmButtonText: "Onayla",
                cancelButtonText: "İptal",
                cancelButtonColor: "#e30d0d"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        headers: {'X-CSRF-TOKEN': "{{csrf_token()}} "},
                        url: '{!! route('patientTreatmentDelete') !!}',
                        data: {
                            id: id
                        },
                        dataType: "json",
                        success: function () {
                            Swal.fire({
                                icon: "success",
                                title: "Başarılı",
                                showConfirmButton: true,
                                confirmButtonText: "Tamam"
                            });
                            treatmentsDataTable.ajax.reload();
                        },
                        error: function () {
                            Swal.fire({
                                icon: "error",
                                title: "Hata!",
                                html: "<div id=\"validation-errors\"></div>",
                                showConfirmButton: true,
                                confirmButtonText: "Tamam"
                            });
                            $.each(data.responseJSON.errors, function (key, value) {
                                $('#validation-errors').append('<div class="alert alert-danger">' + value + '</div>');
                            });
                        }
                    });
                }
            });
        }
    </script>
@endsection