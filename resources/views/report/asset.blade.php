@extends('layouts.master')

@push('title')
- Report Asset
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
                        <h3 class="text-themecolor">Report Inventaris</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Report Inventaris</a></li>
                            <li class="breadcrumb-item active">Asset</li>
                        </ol>
                    </div>
                </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="box-header">
                                    <p> 
<!--                                         <a href="{{URL::to('asset-lost')}}" class="btn btn-danger btn-rounded m-t-10 float-right">asset hilang</a>
                                        <a href="{{URL::to('asset-broken')}}" class="btn btn-warning btn-rounded m-t-10 float-right">asset rusak</a>
                                        <a href="{{URL::to('asset-good')}}" class="btn btn-primary btn-rounded m-t-10 float-right">asset baik</a>
                                        <a href="{{URL::to('asset-all')}}" class="btn btn-success btn-rounded m-t-10 float-right">semua asset</a>
 --> 
                                    <a href="" class="btn btn-success float-left" data-toggle="modal" data-target="#verticalcenter">Total Dana Inventaris</a>

                                    <div class="dropdown">
                                        <button class="btn btn-primary float-left dropdown-toggle text-center" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            Laporan
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{URL::to('asset-all')}}">Semua Asset</a>
                                            <a class="dropdown-item" href="{{URL::to('asset-good')}}">Asset Kondisi Baik</a>
                                            <a class="dropdown-item" href="{{URL::to('asset-broken')}}">Asset Kondisi Rusak</a>
                                            <a class="dropdown-item" href="{{URL::to('asset-lost')}}">Asset Kondisi Hilang</a>
                                        </div>
                                    </div>
                                   </p>
                                </div>

                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Asset</th>
                                                <th>Kode Registrasi</th>
                                                <th>Harga</th>
                                                <th>Material</th>
                                                <th>Merk</th>
                                                <th>Spesifikasi</th>
                                                <th>Voltage</th>
                                                <th>Kondisi</th>
                                                <th>Status</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($assets as $no => $data)
                                            <tr>
                                                <td>{{$no+1}}</td>
                                                <td>{{$data->ass_name}}</td>
                                                <td>{{$data->ass_registration_code}}</td>
                                                <td>{{$data->ass_price}}</td>
                                                <td>{{$data->asd_inggridient}}</td>
                                                <td>{{$data->asd_merk}}</td>
                                                <td>{{$data->asd_spesification}}</td>
                                                <td>{{$data->asd_voltage}}</td>
                                                <td>{{$data->asd_condition}}</td>

                                                <td>
                                                @if($data->ass_status == 0)
                                                TIdak bisa dipinjam</label>

                                                @elseif($data->ass_status == 1)
                                                Bisa dipinjam

                                                @elseif($data->ass_status == 4)
                                                Rusak
                                                
                                                @elseif($data->ass_status == 5)
                                                Hilang

                                                @endif

                                                </td>

                                                
                                            </tr>                                            
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                    <div id="verticalcenter" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="vcenter">Total Harta</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            Total Asset
                                                        </div>
                                                        <div class="col-15">
                                                        {{$totalasset}}
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            Total Harga
                                                        </div>
                                                        <div class="col-15">
                                                           {{{$totalharga}}}
                                                        </div>
                                                    </div>

                                                </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        <!-- /.modal-content -->
                                        </div>
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
