@extends('template')

@section('content')


    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Master Barang</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item">Master Barang</li>
                </ol>
            </div>
            <div>
                <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data Barang</h4>
                            <div class="table-responsive m-t-40">
                                <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Kategori</th>
                                        <th>Prodi</th>
                                        <th>Jumlah</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($stuffs as $stuff)
                                    <tr>
                                        <td><a href="{{ url('stuff/'. $stuff->id.'/edit') }}"> {{ $stuff->name }}</a></td>
                                        <td><a href="{{ url('category/'. $stuff->category_id.'/edit') }}"> {{ $stuff->category->name }}</a></td>
                                        <td>{{ $stuff->program->name  }}</td>
                                        <td>{{ $stuff->quantity  }}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
@endsection

                @section('extra-script')

                    <!-- end - This is for export functionality only -->
                        <script>
                            $(document).ready(function() {
                                $('#myTable').DataTable();
                                $(document).ready(function() {
                                    var table = $('#example').DataTable({
                                        "columnDefs": [{
                                            "visible": false,
                                            "targets": 2
                                        }],
                                        "order": [
                                            [2, 'asc']
                                        ],
                                        "displayLength": 25,
                                        "drawCallback": function(settings) {
                                            var api = this.api();
                                            var rows = api.rows({
                                                page: 'current'
                                            }).nodes();
                                            var last = null;
                                            api.column(2, {
                                                page: 'current'
                                            }).data().each(function(group, i) {
                                                if (last !== group) {
                                                    $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                                                    last = group;
                                                }
                                            });
                                        }
                                    });
                                    // Order by the grouping
                                    $('#example tbody').on('click', 'tr.group', function() {
                                        var currentOrder = table.order()[0];
                                        if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                                            table.order([2, 'desc']).draw();
                                        } else {
                                            table.order([2, 'asc']).draw();
                                        }
                                    });
                                });
                            });
                            $('#example23').DataTable({
                                dom: 'Bfrtip',
                                buttons: [
                                    'excel', 'pdf', 'print'
                                ]
                            });
                        </script>
@endsection
