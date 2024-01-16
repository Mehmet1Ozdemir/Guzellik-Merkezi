@extends('panel.layout.app')
@section('content')
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Doctors List</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('panelIndex')}}">Management Panel</a></li>
                        <li class="breadcrumb-item"><a href="javascript:(0);">Doctors</a></li>
                        <li class="breadcrumb-item active">Doctor List</li>
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
                                        <th>Detail</th>
                                        <th>Working Hours</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>

                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <th>Detail</th>
                                        <th>Working Hours</th>
                                        <th>Delete</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>

                    </div>

                </div>

            </div>
        </div>

    </div>



    <div class="modal fade" id="work_time_modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" style="margin: 0 0 0 1rem;" id="exampleModalLabel4">Doctor Working Hours Information</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="add_work_time_form" method="post">
                        @csrf
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Day</th>
                                <th>Job Start Time</th>
                                <th>Job End Time</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(['Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi', 'Pazar'] as $day)
                                <tr>
                                    <td>{{ $day }}</td>
                                    <td>
                                        <input type="hidden" name="days[{{ $day }}][day]" id="day_{{$day}}" value="{{ $day }}">
                                        <input type="time" name="days[{{ $day }}][start_date]" id="start_date_{{$day}}" class="form-control">
                                    </td>
                                    <td>
                                        <input type="time" name="days[{{ $day }}][due_date]" id="due_date_{{$day}}" class="form-control">
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        </table>
                        <input type="hidden" id="dentistID" name="dentistID">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="Dentist_work_time()">Save</button>
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
            ajax: '{{ route('panel.dentistFetch') }}',
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name'},
                {data: 'surname'},
                {data: 'detail'},
                {data: 'work_time'},
                {data: 'delete'},

            ]
        });

    </script>

    <script>
        function deleteDentist(id) {
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
                        url: '{!! route('panel.dentistDelete') !!}',
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


        <script>
            function workTime(id) {
                $.ajax({
                    type: 'GET',
                    url: '{{route('panel.dentist_work_time_detail')}}',
                    data: {
                        id: id,
                    },
                    success: function (data) {
                        $('#dentistID').val(data.dentistID)
                        data= data.res;
                        data.map(item => {
                            let inputDay = $('#day_' + item.day);
                            let inputStart = $('#start_date_' + item.day);
                            let inputEnd = $('#due_date_' + item.day);

                            inputDay.val(item.day);
                            inputStart.val(item.start_date);
                            inputEnd.val(item.due_date);

                        })

                        $('#work_time_modal').modal('show');

                    },
                    error: function (data) {
                        var errors = '';
                        for (datas in data.responseJSON.errors) {
                            errors += data.responseJSON.errors[datas] + '\n';
                        }
                        Swal.fire({
                            icon: 'error',
                            title: 'Başarısız',

                            html: 'Bilinmeyen bir hata oluştu.\n' + errors,
                        });
                    }
                });
            }


                    function Dentist_work_time() {

                        var formData = new FormData(document.getElementById('add_work_time_form'));

                        $.ajax({
                            method: "POST",
                            dataType: "json",
                            headers: {'X-CSRF-TOKEN': "{{csrf_token()}} "},
                            url: '{{route('panel.dentist_work_time')}}',
                            data: formData,
                            contentType: false,
                            cache: false,
                            processData: false,
                            success: function (success) {
                                Swal.fire({
                                    title: 'Başarılı!',
                                    text: 'Çalışma Saati Kaydı Yapıldı!',
                                    icon: 'success',
                                    confirmButtonText: 'Tamam'
                                }).then(function () {
                                    $('#work_time_modal').modal('hide');
                                });
                                dataTable.ajax.reload();
                            },
                            error: function (data) {
                                var errors = '';
                                for (datas in data.responseJSON.errors) {
                                    errors += data.responseJSON.errors[datas] + '<br>';
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
                    }

        </script>

@endsection