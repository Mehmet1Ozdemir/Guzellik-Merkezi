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
                    <h3 class="page-title">Stock Details</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Management Panel</a></li>
                        <li class="breadcrumb-item active">Stock Details</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-md-12">
                <div class="profile-menu">
                    <ul class="nav nav-tabs nav-tabs-solid">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#stock_details_tab">Stock Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#transaction_tab">Medical procedures</a>
                        </li>

                    </ul>
                </div>
                <div class="tab-content profile-tab-cont">

                    <!-- Stock Details Tab -->
                    <div class="tab-pane fade show active" id="stock_details_tab">

                        <!-- Stock Details -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title d-flex justify-content-between">
                                            <span>Stock Details</span>
                                            <a class="edit-link" data-bs-toggle="modal" href="#update_stock"><i class="fa fa-edit me-1"></i>Update</a>
                                        </h5>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Product Name Adı</p>
                                            <p class="col-sm-10">{{$stock->name}}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Current Product Quantity</p>
                                            <p class="col-sm-10">{{$stock->current_stock}}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Spent Product Quantity</p>
                                            <p class="col-sm-10">{{$stock->used_stock}}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Total Spent Amount</p>
                                            <p class="col-sm-10">{{$stock->total_spent}}</p>
                                        </div>

                                    </div>
                                </div>

                                <!-- Update Stock Modal -->
                                <div class="modal fade" id="update_stock" aria-hidden="true" role="dialog">
                                    <div class="modal-dialog modal-dialog-centered" role="document" >
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Kişisel Bilgiler</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="updateStockForm">
                                                    <input type="hidden" name="stockID" value="{{$stock->id}}">
                                                    <div class="row form-row">
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>Ad :</label>
                                                                <input type="text" class="form-control" name="name" value="{{$stock->name}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <button id="updateStockButton" class="btn btn-primary w-100">Save Changes</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Update Stock Modal  -->

                            </div>


                        </div>

                    </div>

                    <!-- Transaction Tab -->
                    <div id="transaction_tab" class="tab-pane fade">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Stok İşlemleri</h5>
                                        <div class="table-responsive">
                                            <table class="table table-hover table-center mb-0 w-100" id="stock_transactions" >
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Procedure</th>
                                                    <th>Quantity</th>
                                                    <th>Payment</th>
                                                    <th>Delete</th>
                                                </tr>
                                                </thead>

                                                <tfoot>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Procedure</th>
                                                    <th>Quantity</th>
                                                    <th>Payment</th>
                                                    <th>Delete</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                <a class="btn btn-warning " data-bs-toggle="modal" href="#add_stock_transaction"><i class="fa fa-plus me-1"></i>Add Procedure</a>

                            </div>
                        </div>
                    </div>
                    <!-- /Transaction Tab -->


                </div>
            </div>
        </div>

        <!-- Add Transaction Modal -->
        <div class="modal fade" id="add_stock_transaction" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document" >
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">İşlem Oluştur</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="stockTransactionCreateForm" enctype="multipart/form-data">
                            <input type="hidden" name="stock_id" value="{{$stock->id}}">
                            <div class="row form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>İşlem türü:</label>
                                        <select class="form-select form-control" onchange="transactionType(this);" name="transaction_type" >
                                            <option value="">Seçim Yapınız</option>
                                            <option value="0">Alış</option>
                                            <option value="1">Harcama</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Adet:</label>
                                    <input type="text" name="amount" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6" id="priceDiv" style="display: none">
                                <div class="form-group">
                                    <label>Ücret:</label>
                                    <input type="text" name="price" id="price" class="form-control">
                                </div>
                            </div>
                        </form>
                        <button id="stockTransactionCreate" class="btn btn-primary w-100">İşlemi Kaydet</button>

                    </div>
                </div>
            </div>
        </div>


    </div>

    <script>
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
        function transactionType(that) {
            if (that.value === "0") {
                document.getElementById("priceDiv").style.display = "block";
            } else {
                document.getElementById("price").value = "";
                document.getElementById("priceDiv").style.display = "none";
            }
        }
    </script>

    <script>
        $('#updateStockButton').click(function (event) {

            var formData = new FormData(document.getElementById('updateStockForm'));
            $.ajax({
                type: "POST",
                headers: {'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?> "},
                url: "{{ route('panel.stocksUpdate') }}",
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
                            html: 'Stok Güncelleme Başarılı!',
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

        var dataTable = null;

        dataTable = $('#stock_transactions').DataTable({
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
            ajax: '{{ route('panel.stockTransactionFetch',$stock->id) }}',
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'transaction_type'},
                {data: 'amount'},
                {data: 'price'},
                {data: 'delete'},

            ]
        });

    </script>

    <script>
        $('#stockTransactionCreate').click(function (event) {

            var formData = new FormData(document.getElementById('stockTransactionCreateForm'));
            $.ajax({
                type: "POST",
                headers: {'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?> "},
                url: "{{ route('panel.stockTransactionAdd') }}",
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
                            html: 'İşlem Oluşturma Başarılı!',
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