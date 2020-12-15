@extends('layouts.master')

@push('title')
Kategori Asset
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
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data Kategori Asset</h4>
                                <div class="box-header">
                                    <p>
                                        <a href="{{URL::to('categoryAsset/create')}}" class="btn btn-sm btn-flat btn-success"><i class="fa fa-plus"></i>Tambah</a>
                                    </p>
                                </div>

                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Kategori</th>
                                                <th>Jenis Kategori</th>
                                                <th>Kode Asli</th>
                                                <th>Kode Kategori</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Bangunan</td>
                                                <td></td>
                                                <td>B</td>
                                                <td>B00</td>
                                                
                                            </tr>                                            
                                            <tr>
                                                <td>2</td>
                                                <td>Lantai 1</td>
                                                <td>Bangunan</td>
                                                <td>1</td>
                                                <td>B01</td>
                                            </tr>                                            
                                            <tr>
                                                <td>3</td>
                                                <td>Toilet L1</td>
                                                <td>Lantai 1</td>
                                                <td>2</td>
                                                <td>B02</td>
                                            </tr>                                            
                                            <tr>
                                                <td>4</td>
                                                <td>Lantai 2</td>
                                                <td>Bangunan</td>
                                                <td>3</td>
                                                <td>B03</td>
                                            </tr>                                            
                                            <tr>
                                                <td>5</td>
                                                <td>Toilet L2</td>
                                                <td>Lantai 2</td>
                                                <td>4</td>
                                                <td>B04</td>
                                            </tr>                                            
                                            <tr>
                                                <td>6</td>
                                                <td>Lantai 3</td>
                                                <td>Bangunan</td>
                                                <td>5</td>
                                                <td>B05</td>
                                            </tr>                                            
                                            <tr>
                                                <td>7</td>
                                                <td>Toilet L3</td>
                                                <td>Lantai 3</td>
                                                <td>6</td>
                                                <td>B06</td>
                                            </tr>                                            
                                            <tr>
                                                <td>8</td>
                                                <td>Barang</td>
                                                <td></td>
                                                <td>P</td>
                                                <td>P00</td>
                                            </tr>                                            
                                            <tr>
                                                <td>9</td>
                                                <td>Kursi</td>
                                                <td>Barang</td>
                                                <td>1</td>
                                                <td>P01</td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td>Meja</td>
                                                <td>Barang</td>
                                                <td>2</td>
                                                <td>P02</td>
                                            </tr>
                                            <tr>
                                                <td>11</td>
                                                <td>Lemari/Rak</td>
                                                <td>Barang</td>
                                                <td>3</td>
                                                <td>P03</td>
                                            </tr>
                                            <tr>
                                                <td>12</td>
                                                <td>Elektornik</td>
                                                <td>Barang</td>
                                                <td>4</td>
                                                <td>P04</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
   
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
