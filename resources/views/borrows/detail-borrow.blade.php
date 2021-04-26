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
    <link href="{{URL::to('assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css')}}"
          rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="{{URL::to('assets/plugins/c3-master/c3.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{URL::to('assets/css/style.css')}}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{URL::to('assets/css/colors/default-dark.css')}}" id="theme" rel="stylesheet">
@endpush

@section('content')

    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor">Peminjaman</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Peminjaman</a></li>
                <li class="breadcrumb-item active">Daftar Peminjaman </li>
            </ol>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-center">Daftar Peminjaman </h3>

        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-2">
                    Nis
                </div>
                <div class="col-10">
                    {{$user->tc_nip}}
                    {{$user->std_nis}}
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    Nama
                </div>
                <div class="col-10">
                    {{$user->usr_name}}
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    Kelas
                </div>
                <div class="col-10">
                    {{$user->std_class}}
                </div>
            </div>

            <hr>



            <div class="table-responsive m-t-40">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Nama Petugas</th>
                        <th class="text-center">Tgl Pinjam</th>
                        <th class="text-center">Status Peminjaman</th>
                        <th class="text-center">Kondisi</th>
                        @if(Auth()->user()->hasRole('admin'))
                        <th class="text-center" style="width: 10%;">Aksi</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($borrows as $no => $borrow)
                        <tr>
                            <td>{{$no + 1}}</td>
                            <td>{{$borrow->ass_name}}</td>
                            <td>{{$borrow->usr_name}}</td>
                            <td class="text-center">{{date('d-m-Y - H:i:s', strtotime($borrow->brw_created_at))}}</td>
                            @if($borrow->bas_status == 1)
                                <td class="text-center">Belum Kembali</td>
                                <td class="text-center">-</td>
                            @elseif($borrow->bas_status == 3)
                                <td class="text-center">Sudah Kembali</td>
                                <td class="text-center">Baik</td>
                            @elseif($borrow->bas_status == 4)
                                <td class="text-center">Sudah Kembali</td>
                                <td class="text-center">Rusak</td>
                            @elseif($borrow->bas_status == 5)
                                <td class="text-center">Sudah Kembali</td>
                                <td class="text-center">Hilang</td>
                            @endif

                            @if(Auth()->user()->hasRole('admin'))
                            <td>
                                @if ($borrow->bas_status == 1)
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle text-center" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            Kembalikan
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{URL::to('/return/'. $borrow->bas_id .  '/3')}}">Baik</a>
                                            <a class="dropdown-item" href="{{URL::to('/return/'. $borrow->bas_id .  '/4')}}">Rusak</a>
                                            <a class="dropdown-item" href="{{URL::to('/return/'. $borrow->bas_id .  '/5')}}">Hilang</a>
                                        </div>
                                    </div>
                                @endif
                            </td>
                            @endif
                        </tr>
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
            $(document).ready(function () {
                $('#myTable').DataTable();
                $(document).ready(function () {
                    var table = $('#example').DataTable({
                        "columnDefs": [{
                            "visible": false,
                            "targets": 2
                        }],
                        "order": [
                            [2, 'asc']
                        ],
                        "displayLength": 25,
                        "drawCallback": function (settings) {
                            var api = this.api();
                            var rows = api.rows({
                                page: 'current'
                            }).nodes();
                            var last = null;
                            api.column(2, {
                                page: 'current'
                            }).data().each(function (group, i) {
                                if (last !== group) {
                                    $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                                    last = group;
                                }
                            });
                        }
                    });
                    // Order by the grouping
                    $('#example tbody').on('click', 'tr.group', function () {
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
