@extends('layouts.master')

@push('title')
    List Peminjaman
@endpush

@push('styles')
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{URL::to('assets/images/logo-atas.png')}}">
    <!-- Bootstrap Core CSS -->
    <link href="{{URL::to('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="{{URL::to('assets/plugins/chartist-js/dist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('assets/plugins/chartist-js/dist/chartist-init.css')}}" rel="stylesheet">
    <link href="{{URL::to('assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css')}}" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="{{URL::to('assets/plugins/c3-master/c3.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link  href="{{URL::to('assets/css/style.css')}}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link  href="{{URL::to('assets/css/colors/default-dark.css')}}" id="theme" rel="stylesheet">
@endpush

@section('content')

    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor">Pengembalian</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Pengembalian</a></li>
                <li class="breadcrumb-item active">Daftar Pengembalian</li>
            </ol>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Daftar Pengembalian</h4>


            <div class="table-responsive m-t-40">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Peminjam</th>
                        <th>Jumlah Pinjam</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($borrows as $no => $borrow)
                        <tr>
                            <th>{{$no + 1}}</th>
                            <th>{{$borrow->usr_name}}</th>
                            <th>{{$borrow->total}}</th>
                            <th>Sudah Kembali</th>
                            <th>
                                <a href="{{URL::to('return/list-return/'.$borrow->bas_brw_id)}}" class="btn btn-sm btn-flat btn-success">lihat</a>
                            </th>
                        <tr>
                    @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{URL::to('assets/plugins/jquery/jquery.min.js')}}"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="{{URL::to('assets/plugins/popper/popper.min.js')}}"></script>
        <script src="{{URL::to('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
        <!-- slimscrollbar scrollbar JavaScript -->
        <script src="{{URL::to('assets/js/jquery.slimscroll.js')}}"></script>

        <!--Wave Effects -->
        <script src="{{URL::to('assets/js/waves.js')}}"></script>
        <!--Menu sidebar -->
        <script src="{{URL::to('assets/js/sidebarmenu.js')}}"></script>
        <!--stickey kit -->
        <script src="{{URL::to('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
        <script src="{{URL::to('assets/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
        <script src="{{URL::to('assets/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
        <!--Custom JavaScript -->
        <script src="{{URL::to('assets/js/custom.min.js')}}"></script>
        <!-- ============================================================== -->
        <!-- This page plugins -->
        <!-- ============================================================== -->
        <!-- chartist chart -->

        <!--c3 JavaScript -->
        <script src="{{URL::to('assets/plugins/d3/d3.min.js')}}"></script>
        <script src="{{URL::to('assets/plugins/c3-master/c3.min.js')}}"></script>
        <!-- Chart JS -->
        <!-- ============================================================== -->
        <!-- Style switcher -->
        <!-- ============================================================== -->
        <script src="{{URL::to('assets/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>


        <script src="{{URL::to('assets/plugins/datatables/datatables.min.js')}}"></script>

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
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        </script>
    @endpush
@endsection
