@extends('panel.layout.app')
@section('content')
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Comment List</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('panelIndex')}}">Management List</a></li>
                        <li class="breadcrumb-item"><a href="javascript:(0);">Blog</a></li>
                        <li class="breadcrumb-item active">Commnet List</li>
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
                                <table class="table table-hover table-center mb-0 w-100" id="comment_table" >
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Comment</th>
                                        <th>Blog id</th>
                                        <th>Status</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>

                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Comment</th>
                                        <th>Blog id</th>
                                        <th>Status</th>
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

    <script type="text/javascript">

        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                }
            });


        });

        var dataTable = null;

        dataTable = $('#comment_table').DataTable({
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
            ajax: '{{ route('panel.fetchComments.blog') }}',
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name'},
                {data: 'email'},
                {data: 'comments'},
                {data: 'blog_id'},
                {data: 'status'},
                {data: 'delete'},

            ]
        });

    </script>

    <script>
        function deleteComment (id) {
            Swal.fire({
                icon: "warning",
                title: "Emin misiniz?",
                html: "Yorumu silmek istediğinize emin misiniz?",
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
                        url: '{!! route('panel.commentDelete') !!}',
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

        function updateCommentStatus(id){
            console.log('bahar')
            $.ajax({
                type: 'POST',
                headers: {'X-CSRF-TOKEN': "{{csrf_token()}} "},
                url: '{!! route('update-comment-status') !!}',
                data: {
                    id: id
                },
                dataType: "json",
                success: function () {
                    Swal.fire({
                        icon: "success",
                        title: "Başarılı",
                        text: "Yorum durumu güncellendi",
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

    </script>
@endsection