@extends('layouts.master')

@push('title')
Asset
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
                                        <a href="{{URL::to('asset/create')}}" class="btn btn-sm btn-flat btn-success"><i class="fa fa-plus"></i>Tambah</a><br>
                                        <br>
                                        <a href="{{URL::to('asset/detail')}}" class="btn btn-sm btn-flat btn-success">Lihat Detail</a>
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
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Kursi siswa 1</td>
                                                <td>001/P01.001.INV.YYS/2016</td>
                                                <td>50.000</td>   

                                            </tr>                                            
                                            <tr>
                                                <td>2</td>
                                                <td>Kursi siswa 2</td>
                                               
                                                <td>002/P01.001.INV.YYS/2016</td>
                                                <td>50.000</td>    
                                            </tr> 
                                            <tr>
                                                <td>3</td>
                                                <td>Kursi siswa 3</td>
                                                
                                                <td>003/P01.001.INV.YYS/2016</td>
                                                <td>50.000</td>    
                                            </tr> 
                                            <tr>
                                                <td>4</td>
                                                <td>Kursi Guru 1</td>
                                                
                                                <td>001/P01.002.INV.YYS/2016</td>
                                                <td>50.000</td>    
                                            </tr> 
                                            <tr>
                                                <td>5</td>
                                                <td>Kursi Guru 2</td>
                                               
                                                <td>002/P01.002.INV.YYS/2016</td>
                                                <td>50.000</td>    
                                            </tr> 
                                            <tr>
                                                <td>6</td>
                                                <td>Kursi Tunggu 1</td>
                                               
                                                <td>001/P01.003.INV.YYS/2016</td>
                                                <td>50.000</td>    
                                            </tr> 
                                            <tr>
                                                <td>7</td>
                                                <td>Kursi Tunggu 2</td>
                                                
                                                <td>002/P01.003.INV.YYS/2016</td>
                                                <td>50.000</td>    
                                            </tr> 
                                            <tr>
                                                <td>8</td>
                                                <td>Kursi Set 1</td>
                                                
                                                <td>001/P01.004.INV.YYS/2016</td>
                                                <td>50.000</td>    
                                            </tr> 
                                            <tr>
                                                <td>9</td>
                                                <td>Kursi Set 2</td>
                                                
                                                <td>002/P01.004.INV.YYS/2016</td>
                                                <td>50.000</td>    
                                            </tr> 
                                            <tr>
                                                <td>10</td>
                                                <td>Meja Guru 1</td>
                                                
                                                <td>001/P02.001.INV.YYS/2016</td>
                                                <td>50.000</td>    
                                            </tr> 
                                            <tr>
                                                <td>11</td>
                                                <td>Meja Guru 2</td>
                                                
                                                <td>002/P02.001.INV.YYS/2016</td>
                                                <td>50.000</td>    
                                            </tr> 
                                            <tr>
                                                <td>12</td>
                                                <td>Meja Siswa 1</td>
                                                
                                                <td>001/P02.002.INV.YYS/2016</td>
                                                <td>50.000</td>    
                                            </tr> 
                                            <tr>
                                                <td>13</td>
                                                <td>Meja Siswa 2</td>
                                                
                                                <td>002/P02.002.INV.YYS/2016</td>
                                                <td>50.000</td>    
                                            </tr> 
                                            <tr>
                                                <td>14</td>
                                                <td>Lemari 1</td>
                                                
                                                <td>001/P03.001.INV.YYS/2016</td>
                                                <td>50.000</td>    
                                            </tr> 
                                            <tr>
                                                <td>15</td>
                                                <td>Lemari 2</td>
                                                
                                                <td>002/P03.001.INV.YYS/2016</td>
                                                <td>50.000</td>    
                                            </tr> 
                                            <tr>
                                                <td>16</td>
                                                <td>Rak 1</td>
                                                
                                                <td>001/P03.002.INV.YYS/2016</td>
                                                <td>50.000</td>    
                                            </tr> 
                                            <tr>
                                                <td>17</td>
                                                <td>Rak 2</td>
                                                <td>002/P03.002.INV.YYS/2016</td>
                                                <td>50.000</td>    
                                            </tr> 
                                            <tr>
                                                <td>18</td>
                                                <td>Saung Fadillah</td>
                                                
                                                <td>001/B00.000.INV.YYS/2016</td>
                                                <td>1.500.000</td>    
                                            </tr> 
                                             <tr>
                                                <td>19</td>
                                                <td>Saung Singgah</td>
                                                
                                                <td>002/B00.000.INV.YYS/2016</td>
                                                <td>1.500.000</td>    
                                            </tr> 
                                             <tr>
                                                <td>20</td>
                                                <td>Gedung Sekolah</td>
                                                
                                                <td>003/B00.000.INV.YYS/2016</td>
                                                <td>1.500.000</td>    
                                            </tr> 
                                             <tr>
                                                <td>21</td>
                                                <td>Masjid</td>
                                                
                                                <td>004/B00.000.INV.YYS/2017</td>
                                                <td>2.050.000</td>    
                                            </tr> 
                                             <tr>
                                                <td>22</td>
                                                <td>Bale Mahaputra</td>
                                                
                                                <td>005/B00.000.INV.YYS/2018</td>
                                                <td>1.050.000</td>    
                                            </tr> 
                                             <tr>
                                                <td>23</td>
                                                <td>BNB</td>
                                                
                                                <td>006/B00.000.INV.YYS/2019</td>
                                                <td>2.650.000</td>    
                                            </tr> 
                                             <tr>
                                                <td>24</td>
                                                <td>SQUADRON 43</td>
                                                
                                                <td>007/B00.000.INV.YYS/2019</td>
                                                <td>3.550.000</td>    
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
