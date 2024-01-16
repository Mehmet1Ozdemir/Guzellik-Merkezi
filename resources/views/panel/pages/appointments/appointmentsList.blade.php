@extends('panel.layout.app')
@section('content')
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Appointment List</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Management Panel</a></li>
                        <li class="breadcrumb-item"><a href="javascript:(0);">Appointments</a></li>
                        <li class="breadcrumb-item active">Appointments List</li>
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
                                <table class="table table-hover table-center mb-0 w-100" id="appointments_table" >
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Doctor Name</th>
                                        <th>Patient Name</th>
                                        <th>Performed Procedure</th>
                                        <th>Appointment Date</th>
                                        <th>Appointment Date</th>
                                        <th>Detail</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>

                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Doctor Name</th>
                                        <th>Patient Name</th>
                                        <th>Performed Procedure</th>
                                        <th>Appointment Date</th>
                                        <th>Appointment Date</th>
                                        <th>Detail</th>
                                        <th>Delete</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        <a class="btn btn-warning " data-bs-toggle="modal" href="#add_appointment"><i class="fa fa-plus me-1"></i>Create Appointment</a>

                    </div>

                </div>

            </div>
        </div>

    </div>

    <!-- Add Appointments Modal -->
    <div class="modal fade" id="add_appointment" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Appointment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="appointmentCreateForm" enctype="multipart/form-data">
                        <div class="row form-row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Doctor:</label>
                                    <select class="form-select form-control" name="dentist_id">
                                        <option value="">Please Select</option>
                                        @foreach($dentists as $dentist)
                                        <option value="{{$dentist->id}}">{{$dentist->title}} {{$dentist->name}} {{$dentist->surname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Patient Name:</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Patient Surname:</label>
                                    <input type="text" name="surname"  class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Phone Number:</label>
                                    <input type="text" name="phone"  class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Performed Procedure:</label>
                                    <input type="text" name="operation"  class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Descriptiom:</label>
                                    <textarea rows="5" name="description"  class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Appointment Start:</label>
                                    <input type="datetime-local" name="start_date"  class="form-control">
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Appointment End:</label>
                                    <input type="datetime-local" name="due_date"  class="form-control">
                                </div>
                            </div>


                        </div>

                    </form>
                    <button id="appointmentCreate" class="btn btn-primary w-100">Create Appointment</button>

                </div>
            </div>
        </div>
    </div>
    <!-- Update Appointments Modal -->
    <div class="modal fade" id="update_appointment" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Appointment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="appointmentUpdateForm" enctype="multipart/form-data">
                        <div class="row form-row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Doctor:</label>
                                    <select class="form-select form-control" name="dentist_idUpdate" id="dentist_idUpdate">
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Patient Name:</label>
                                    <input type="text" name="nameUpdate" id="nameUpdate" class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Patient Surname:</label>
                                    <input type="text" name="surnameUpdate" id="surnameUpdate"  class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Phone Number:</label>
                                    <input type="text" name="phoneUpdate" id="phoneUpdate"  class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Performed Procedure:</label>
                                    <input type="text" name="operationUpdate" id="operationUpdate"  class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Description:</label>
                                    <textarea rows="5" name="descriptionUpdate" id="descriptionUpdate"  class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Appointment Start:</label>
                                    <input type="datetime-local" name="start_dateUpdate" id="start_dateUpdate"  class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Appointment End:</label>
                                    <input type="datetime-local" name="due_dateUpdate" id="due_dateUpdate"  class="form-control">
                                </div>
                            </div>

                            <input type="hidden" name="updateId" id="updateId">

                        </div>

                    </form>
                    <button id="appointmentUpdate" class="btn btn-primary w-100">Update Appointment</button>

                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">

        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                }
            });


        });

        var dataTable = null;

        dataTable = $('#appointments_table').DataTable({
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
            ajax: '{{ route('panel.appointmentsFetch') }}',
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'dentist_name'},
                {data: 'patient_name'},
                {data: 'operation'},
                {data: 'date'},
                {data: 'status'},
                {data: 'detail'},
                {data: 'delete'},

            ]
        });
    </script>

    <script>
        $('#appointmentCreate').click(function (event) {

                var formData = new FormData(document.getElementById('appointmentCreateForm'));
                $.ajax({
                    type: "POST",
                    headers: {'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?> "},
                    url: "{{ route('panel.appointmentsAdd') }}",
                    data: formData,
                    dataType: "json",
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if(data.Error != null){
                            var errorMessages = Object.values(data.Error);
                            Swal.fire({
                                icon: 'error',
                                title: 'Başarısız',
                                html: errorMessages.join('<br>'),
                                showConfirmButton: true,
                                confirmButtonText: "Tamam",
                            });
                        }else{
                            console.log('success')
                            Swal.fire({
                                icon: 'success',
                                title: 'Başarılı',
                                html: 'Randevu Oluşturma Başarılı!',
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
        function updateAppointment(id){
            var name = $('#nameUpdate');
            var surname = $('#surnameUpdate');
            var phone = $('#phoneUpdate');
            var operation = $('#operationUpdate');
            var start_date = $('#start_dateUpdate');
            var due_date = $('#due_dateUpdate');
            var description = $('#descriptionUpdate');


            $.ajax({
                type: 'GET',
                url: '{{route('panel.appointmentsDetail')}}',
                data: {id:id},
                success: function (data){
                    name.val(data.name);
                    surname.val(data.surname);
                    phone.val(data.phone);
                    operation.val(data.operation);
                    start_date.val(data.start_date);
                    due_date.val(data.due_date);
                    description.val(data.description);
                    $('#updateId').val(id);

                    $.each(data.dentists, function (index, value){
                        if (data.dentist_id == value.id){
                            $('#dentist_idUpdate').append('<option selected value="'+value.id+'">'+value.title+ " "+ value.name+ " "+ value.surname+'</option>');

                        }else{
                            $('#dentist_idUpdate').append('<option value="'+value.id+'">'+value.title+ " "+ value.name+ " "+ value.surname+'</option>');
                        }

                    });
                    $('#update_appointment').modal("toggle");

                },
                error: function (data){
                    var errors = '';
                    for(datas in data.responseJSON.errors){
                        errors += data.responseJSON.errors[datas] + '\n';
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'Başarısız',

                        html: 'Bilinmeyen bir hata oluştu.\n'+errors,
                    });
                }
            });
        }
    </script>

    <script>
        $('#appointmentUpdate').click(function (event) {

            var formData = new FormData(document.getElementById('appointmentUpdateForm'));
            $.ajax({
                type: "POST",
                headers: {'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?> "},
                url: "{{ route('panel.appointmentsUpdate') }}",
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function (data) {
                    if(data.Error != null){
                        var errorMessages = Object.values(data.Error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Başarısız',
                            html: errorMessages.join('<br>'),
                            showConfirmButton: true,
                            confirmButtonText: "Tamam",
                        });
                    }else{
                        console.log('success')
                        Swal.fire({
                            icon: 'success',
                            title: 'Başarılı',
                            html: 'Randevu güncelleme Başarılı!',
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
        function changeAttandance(id){
            $.ajax({
                type: 'post',
                url: '{{route('panel.appointmentsAttendance')}}',
                headers: {'X-CSRF-TOKEN': "{{csrf_token()}} "},
                data: {
                    id: id,
                },
                success: function (data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Başarılı',
                        html: 'Randevu durumu güncellendi!'
                    });

                    dataTable.ajax.reload();
                },

            })

        }
    </script>

    <script>
        function deleteAppointment(id) {
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
                        url: '{!! route('panel.appointmentsDelete') !!}',
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