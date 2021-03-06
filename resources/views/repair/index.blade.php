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
                <h3 class="text-themecolor">Perbaikan</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item">Perbaikan</li>
                </ol>
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
                            <h4 class="card-title">Data Perbaikan</h4>
                            <div class="table-responsive m-t-40">
                                <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Kondisi</th>
                                        <th>Jumlah</th>
                                        <th>Tanggal Perbaikan</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($repairs as $row => $repair)
                                        @if(Auth::user()->role == 'program_study')
                                            <tr>
                                                <td>{{ $row+1 }}</td>
                                                <td><a href="{{ url('repair/'. $repair->id.'/edit') }}"> </a>{{ $repair->name }}</td>
                                                <td>{{ $repair->condition }}</td>
                                                <td>{{ $repair->quantity }}</td>
                                                <td>{{ $repair->created_at }}</td>
                                            </tr>
                                         @else
                                         <tr>
                                             <td>{{ $row+1 }}</td>
                                             <td><a href="{{ url('repair/'. $repair->id.'/edit') }}"> </a>{{ $repair->item->stuff->name }}</td>
                                            <td>{{ $repair->item->condition->name }}</td>
                                            <td>{{ $repair->quantity }}</td>
                                            <td>{{ $repair->created_at }}</td>
                                         </tr>
                                         @endif

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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

                    {
                        extend: 'excelHtml5',
                        title: 'Laporan Data Inventaris' + '\n' + 'Fakultas Teknik' + '\n' + 'UNIVERSITAS PGRI MADIUN' + '\n' + 'Jl. Setia Budi No. 85 Madiun, Jawa Timur, Indonesia',

                    },
                    {
                        text: 'PDF',
                        action: function (e, dt, node, config) {
                            window.open("{{ url('reportRepairs') }}");
                        }
                    }


                ]
            })
        </script>

@endsection
