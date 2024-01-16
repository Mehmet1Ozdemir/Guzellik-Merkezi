@extends('panel.layout.app')
@section('content')
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Categori List</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('panelIndex')}}">Management Panel </a></li>
                        <li class="breadcrumb-item"><a href="javascript:(0);">Blog</a></li>
                        <li class="breadcrumb-item"><a href="javascript:(0);">Blog Categories</a></li>
                        <li class="breadcrumb-item active">Categori List</li>
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
                                <table class="table table-hover table-center mb-0 w-100" id="category_table" >
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Detail</th>
                                        <th>Detail </th>
                                    </tr>
                                    </thead>

                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Title </th>
                                        <th>Detail</th>
                                        <th>Delete</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        <a class="btn btn-warning " data-bs-toggle="modal" href="#add_category"><i class="fa fa-plus me-1"></i>Kategori Ekle</a>

                    </div>

                </div>

            </div>
        </div>

    </div>

    <!-- Add Patient Modal -->
    <div class="modal fade" id="add_category" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Categori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="categoryCreateForm" enctype="multipart/form-data">
                        <div class="row form-row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Title :</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Slug :</label>
                                    <input type="text" name="slug_name"  class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
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
                    </form>
                    <button id="categoryCreate" class="btn btn-primary w-100">Save Category</button>

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

        dataTable = $('#category_table').DataTable({
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
            ajax: '{{ route('panel.fetchCategory') }}',
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name'},
                {data: 'detail'},
                {data: 'delete'},

            ]
        });

    </script>

    <script>
        $('#categoryCreate').click(function (event) {

                var formData = new FormData(document.getElementById('categoryCreateForm'));
                $.ajax({
                    type: "POST",
                    headers: {'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?> "},
                    url: "{{ route('panel.addCategory') }}",
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
                                html: 'Kategori Oluşturma Başarılı!',
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
        function deleteCategory(id) {
            Swal.fire({
                icon: "warning",
                title: "Emin misiniz?",
                html: "Kategoriyi silmek istediğinize emin misiniz?",
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
                        url: '{!! route('panel.categoryDelete') !!}',
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