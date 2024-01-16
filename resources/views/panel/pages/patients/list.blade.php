@extends('panel.layout.app')
@section('content')
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Patient List</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('panelIndex')}}">Management List</a></li>
                        <li class="breadcrumb-item"><a href="javascript:(0);">Patients</a></li>
                        <li class="breadcrumb-item active">Patient List</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-hover table-center mb-0 w-100" id="patient_table" >
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <th>Age</th>
                                        <th>Detail</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>

                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <th>Age</th>
                                        <th>Detail</th>
                                        <th>Delete</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        <a class="btn btn-warning " data-bs-toggle="modal" href="#add_patient"><i class="fa fa-plus me-1"></i>Add Patient</a>

                    </div>

                </div>

            </div>
        </div>

    </div>

    <!-- Add Patient Modal -->
    <div class="modal fade" id="add_patient" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Patient</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="patientCreateForm" enctype="multipart/form-data">
                        <div class="row form-row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Name :</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Surname :</label>
                                    <input type="text" name="surname"  class="form-control">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label>Date of Birth :</label>
                                    <div class="cal-icon">
                                        <input type="text" name="birth_date" class="form-control datetimepicker">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>E-Mail :</label>
                                    <input type="email" name="email" class="form-control" >
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Phone  :</label>
                                    <input type="text" name="phone"  class="form-control">
                                </div>
                            </div>
                            <div class="col-12">
                                <h5 class="form-title"><span>Address</span></h5>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Full Adress</label>
                                    <input type="text" name="address" class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Country</label>
                                    <select class="form-control" name="country_id" id="country_select">
                                        <option selected disabled>Make a Selection</option>
                                        @foreach($countries as $country)
                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>City</label>
                                    <select class="form-control" name="city_id" id="city_select">
                                        <option selected disabled>Make a Selectio</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>District</label>
                                    <input type="text" name="town" class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Zip Code</label>
                                    <input type="text" name="zip_code" class="form-control" >
                                </div>
                            </div>

                        </div>

                    </form>
                    <button id="patientCreate" class="btn btn-primary w-100">Save Patient</button>

                </div>
            </div>
        </div>
    </div>
    <!-- /Edit Details Modal -->

    <script type="text/javascript">

        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                }
            });


        });

        var dataTable = null;

        dataTable = $('#patient_table').DataTable({
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
            ajax: '{{ route('fetchPatients') }}',
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name'},
                {data: 'surname'},
                {data: 'age'},
                {data: 'detail'},
                {data: 'delete'},

            ]
        });

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
        $('#patientCreate').click(function (event) {

                var formData = new FormData(document.getElementById('patientCreateForm'));
                $.ajax({
                    type: "POST",
                    headers: {'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?> "},
                    url: "{{ route('patientAdd') }}",
                    data: formData,
                    dataType: "json",
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if(data.Error != null){
                            console.log('deneme')
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
                                html: 'Hasta Oluşturma Başarılı!',
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

    <script>
        function deletePatient(id) {
            Swal.fire({
                icon: "warning",
                title: "Emin misiniz?",
                html: "Hastayı silmek istediğinize emin misiniz?",
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
                        url: '{!! route('patientDelete') !!}',
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
                            dataTable.ajax.reload();
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