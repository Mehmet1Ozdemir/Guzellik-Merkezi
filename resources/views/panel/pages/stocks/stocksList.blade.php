@extends('panel.layout.app')
@section('content')
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Stock List</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Management Panel</a></li>
                        <li class="breadcrumb-item"><a href="javascript:(0);">Stocks</a></li>
                        <li class="breadcrumb-item active">Stock List</li>
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
                                <table class="table table-hover table-center mb-0 w-100" id="stock_table" >
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Current Product Quantity</th>
                                        <th>Used Product Quantity</th>
                                        <th>Total Spent Amount</th>
                                        <th>Detail</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>

                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Current Product Quantity</th>
                                        <th>Used Product Quantity</th>
                                        <th>Total Spent Amount</th>
                                        <th>Detail</th>
                                        <th>Delete</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        <a class="btn btn-warning " data-bs-toggle="modal" href="#add_stock"><i class="fa fa-plus me-1"></i>Add Stock</a>

                    </div>

                </div>

            </div>
        </div>

    </div>

    <!-- Add Stock Modal -->
    <div class="modal fade" id="add_stock" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Stock</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="stockCreateForm" enctype="multipart/form-data">
                        <div class="row form-row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Stock Name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                        </div>
                    </form>
                    <button id="stockCreate" class="btn btn-primary w-100">Create Stock </button>

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

        dataTable = $('#stock_table').DataTable({
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
            ajax: '{{ route('panel.stocksFetch') }}',
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name'},
                {data: 'current_stock'},
                {data: 'used_stock'},
                {data: 'total_spent'},
                {data: 'detail'},
                {data: 'delete'},

            ]
        });

    </script>

    <script>
        $('#stockCreate').click(function (event) {

                var formData = new FormData(document.getElementById('stockCreateForm'));
                $.ajax({
                    type: "POST",
                    headers: {'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?> "},
                    url: "{{ route('panel.stocksAdd') }}",
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
                            Swal.fire({
                                icon: 'success',
                                title: 'Başarılı',
                                html: 'Stok Oluşturma Başarılı!',
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
        function deleteStock(id) {
            Swal.fire({
                icon: "warning",
                title: "Emin misiniz?",
                html: "Stoğu silmek istediğinize emin misiniz?",
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
                        url: '{!! route('panel.stocksDelete') !!}',
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