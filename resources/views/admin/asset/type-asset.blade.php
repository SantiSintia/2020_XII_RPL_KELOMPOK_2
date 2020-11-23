@extends('layouts.master')

@push('title')
- Kategori Asset
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
                                        <a href="{{URL::to('typeAsset/create')}}" class="btn btn-sm btn-flat btn-success"><i class="fa fa-plus"></i>Tambah</a>
                                    </p>
                                </div>

                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Tipe </th>
                                                <th>Jenis Kategori</th>
                                                <th>Kode Asli</th>
                                                <th>Kode Tipe</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Ruangan 1</td>
                                                <td>Lantai 1</td>
                                                <td>001</td>
                                                <td>B01.001</td>
                                                <td>
                                                    <a href="{{URL::to('typeAsset/delete')}}" class="mdi mdi-delete" >
                                                </td>
                                               
                                            </tr>                                            
                                            <tr>
                                                <td>2</td>
                                                <td>Ruangan 2</td>
                                                <td>Lantai 1</td>
                                                <td>002</td>
                                                <td>B01.002</td>
                                                <td>
                                                    <a href="{{URL::to('typeAsset/delete')}}" class="mdi mdi-delete" >
                                                </td>
                                            </tr>                                            
                                            <tr>
                                                <td>3</td>
                                                <td>Toilet 1</td>
                                                <td>Lantai 1</td>
                                                <td>001</td>
                                                <td>B02.001</td>
                                                <td>
                                                    <a href="{{URL::to('typeAsset/delete')}}" class="mdi mdi-delete" >
                                                </td>
                                            </tr>                                            
                                            <tr>
                                                <td>4</td>
                                                <td>Toilet 2</td>
                                                <td>Lantai 1</td>
                                                <td>002</td>
                                                <td>B02.002</td>
                                                <td>
                                                    <a href="{{URL::to('typeAsset/delete')}}" class="mdi mdi-delete" >
                                                </td>
                                            </tr>                                            
                                            <tr>
                                                <td>5</td>
                                                <td>Ruangan 1</td>
                                                <td>Lantai 2</td>
                                                <td>001</td>
                                                <td>B03.001</td>
                                                <td>
                                                    <a href="{{URL::to('typeAsset/delete')}}" class="mdi mdi-delete" >
                                                </td>
                                            </tr>                                            
                                            <tr>
                                                <td>6</td>
                                                <td>Ruangan 2</td>
                                                <td>Lantai 2</td>
                                                <td>002</td>
                                                <td>B03.002</td>
                                                <td>
                                                    <a href="{{URL::to('typeAsset/delete')}}" class="mdi mdi-delete" >
                                                </td>
                                            </tr>                                            
                                            <tr>
                                                <td>7</td>
                                                <td>Toilet 1</td>
                                                <td>Lantai 2</td>
                                                <td>001</td>
                                                <td>B04.001</td>
                                                <td>
                                                    <a href="{{URL::to('typeAsset/delete')}}" class="mdi mdi-delete" >
                                                </td>
                                            </tr>                                            
                                            <tr>
                                                <td>8</td>
                                                <td>Toilet 2</td>
                                                <td>Lantai 2</td>
                                                <td>002</td>
                                                <td>B04.002</td>
                                                <td>
                                                    <a href="{{URL::to('typeAsset/delete')}}" class="mdi mdi-delete" >
                                                </td>
                                            </tr>                                            
                                            <tr>
                                                <td>9</td>
                                                <td>Ruangan 1</td>
                                                <td>Lantai 3</td>
                                                <td>001</td>
                                                <td>B05.001</td>
                                                <td>
                                                    <a href="{{URL::to('typeAsset/delete')}}" class="mdi mdi-delete" >
                                                </td>
                                            </tr>                                            
                                            <tr>
                                                <td>10</td>
                                                <td>Toilet 1</td>
                                                <td>Lantai 3</td>
                                                <td>001</td>
                                                <td>B06.001</td>
                                                <td>
                                                    <a href="{{URL::to('typeAsset/delete')}}" class="mdi mdi-delete" >
                                                </td>
                                            </tr>                                            
                                            <tr>
                                                <td>11</td>
                                                <td>Toilet 2</td>
                                                <td>Lantai 3</td>
                                                <td>002</td>
                                                <td>B06.002</td>
                                                <td>
                                                    <a href="{{URL::to('typeAsset/delete')}}" class="mdi mdi-delete" >
                                                </td>
                                            </tr>                                            
                                            <tr>
                                                <td>12</td>
                                                <td>Kursi Siswa</td>
                                                <td>Barang</td>
                                                <td>001</td>
                                                <td>P01.001</td>
                                                <td>
                                                    <a href="{{URL::to('typeAsset/delete')}}" class="mdi mdi-delete" >
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>13</td>
                                                <td>Kursi Guru/td>
                                                <td>Barang</td>
                                                <td>002</td>
                                                <td>P01.002</td>
                                                <td>
                                                    <a href="{{URL::to('typeAsset/delete')}}" class="mdi mdi-delete" >
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>14</td>
                                                <td>Kursi Tunggu</td>
                                                <td>Barang</td>
                                                <td>003</td>
                                                <td>P01.003</td>
                                                <td>
                                                    <a href="{{URL::to('typeAsset/delete')}}" class="mdi mdi-delete" >
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>15</td>
                                                <td>Kursi Set</td>
                                                <td>Barang</td>
                                                <td>004</td>
                                                <td>P01.004</td>
                                                <td>
                                                    <a href="{{URL::to('typeAsset/delete')}}" class="mdi mdi-delete" >
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>16</td>
                                                <td>Meja Guru</td>
                                                <td>Barang</td>
                                                <td>001</td>
                                                <td>P02.001</td>
                                                <td>
                                                    <a href="{{URL::to('typeAsset/delete')}}" class="mdi mdi-delete" >
                                                </td>
                                            </tr>
                                             <tr>
                                                <td>17</td>
                                                <td>Meja Siswa</td>
                                                <td>Barang</td>
                                                <td>002</td>
                                                <td>P02.002</td>
                                                <td>
                                                    <a href="{{URL::to('typeAsset/delete')}}" class="mdi mdi-delete" >
                                                </td>
                                            </tr>
                                             <tr>
                                                <td>18</td>
                                                <td>Lemari</td>
                                                <td>Barang</td>
                                                <td>001</td>
                                                <td>P03.001</td>
                                                <td>
                                                    <a href="{{URL::to('typeAsset/delete')}}" class="mdi mdi-delete" >
                                                </td>
                                            </tr>
                                             <tr>
                                                <td>19</td>
                                                <td>Rak</td>
                                                <td>Barang</td>
                                                <td>002</td>
                                                <td>P03.002</td>
                                                <td>
                                                    <a href="{{URL::to('typeAsset/delete')}}" class="mdi mdi-delete" >
                                                </td>
                                            </tr>
                                             <tr>
                                                <td>20</td>
                                                <td>TV</td>
                                                <td>Barang</td>
                                                <td>001</td>
                                                <td>P04.001</td>
                                                <td>
                                                    <a href="{{URL::to('typeAsset/delete')}}" class="mdi mdi-delete" >
                                                </td>
                                            </tr>
                                             <tr>
                                                <td>21</td>
                                                <td>Laptop</td>
                                                <td>Barang</td>
                                                <td>002</td>
                                                <td>P04.002</td>
                                                <td>
                                                    <a href="{{URL::to('typeAsset/delete')}}" class="mdi mdi-delete" >
                                                </td>
                                            </tr>
                                             <tr>
                                                <td>22</td>
                                                <td>Projector</td>
                                                <td>Barang</td>
                                                <td>003</td>
                                                <td>P04.003</td>
                                                <td>
                                                    <a href="{{URL::to('typeAsset/delete')}}" class="mdi mdi-delete" >
                                                </td>
                                            </tr>
                                             <tr>
                                                <td>23</td>
                                                <td>AC</td>
                                                <td>Barang</td>
                                                <td>004</td>
                                                <td>P04.004</td>
                                                <td>
                                                    <a href="{{URL::to('typeAsset/delete')}}" class="mdi mdi-delete" >
                                                </td>
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
    <script data-cfasync="false" src="../../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/plugins/popper/popper.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="../assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="../assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- chartist chart -->
    <script src="../assets/plugins/chartist-js/dist/chartist.min.js"></script>
    <script src="../assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 JavaScript -->
    <script src="../assets/plugins/d3/d3.min.js"></script>
    <script src="../assets/plugins/c3-master/c3.min.js"></script>
    <!-- Chart JS -->
    <script src="js/dashboard1.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>

@push('scripts')
 <script data-cfasync="false" src="{{URL::to('cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js')}}"></script>
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
    <script src="{{URL::to('assets/plugins/chartist-assets/js/dist/chartist.min.js')}}"></script>
    <script src="{{URL::to('assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js')}}"></script>
    <!--c3 JavaScript -->
    <script src="{{URL::to('assets/plugins/d3/d3.min.js')}}"></script>
    <script src="{{URL::to('assets/plugins/c3-master/c3.min.js')}}"></script>
    <!-- Chart JS -->
    <script src="{{URL::to('assets/js/dashboard1.js')}}"></script>
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
