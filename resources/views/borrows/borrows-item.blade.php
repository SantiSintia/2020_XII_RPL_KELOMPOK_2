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
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
@endpush

@section('content')

<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Asset</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Asset</a></li>
            <li class="breadcrumb-item active">Kelola Asset</li>
        </ol>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Pinjam asset</h4>
        <br>
      
            <input id="addRow" class="btn btn-success" type="button" value="Tambah Barang" />&nbsp <input id="deleteRow" type="button" class="btn btn-danger" value="hapus Kolom" />
            <form action="{{URL::to('borrows-asset')}}" method="post">
                @csrf
            <table border="0" id="rowTable" style="width: 100%;">
                <tbody>
                    <tr>
                        <td><br>Nama peminjam  </td>
                    </tr>
                     <tr>
                        <td><br><select required=""  class="form-control"  name="name">
                            <option></option>
                            @foreach($name as $name)
                            <option value="{{$name->usr_id}}">{{$name->usr_name}}</option>
                            @endforeach
                          
                        </select> </td>
                    </tr>
                      <tr>
                        <td><br>Asset yang di pinjam  </td>
                    </tr>

                    <tr>
                      
                        <td><br><select required="" class="form-control"  name="asset[]">
                            <option></option>
                            @foreach($assets as $asset)
                            @if($hitung_asset>0)
                                <?php $no = 0 ?>
                                @foreach($borrow_asset as $brs)
                                @if($asset->ass_id==$brs->bas_ass_id)
                                @else
                                <?php $no++ ?>
                                @if($no==$hitung_asset)
                                 <option value="{{$asset->ass_id}}">{{$asset->ass_name}}</option>
                                @endif
                                @endif
                                @endforeach
                            @else
                            <option value="{{$asset->ass_id}}">{{$asset->ass_name}}</option>
                            @endif
                            
                            @endforeach
                          
                        </select>  </td>
                    </tr>
                    <!-- <tr><td><input type="submit" class="btn btn-success" name=""></td></tr> -->
                </tbody>
            </table>
            <br><input type="submit" class="btn btn-success" >
       
        </form>
        
    </div>
</div>
@push('scripts')
<script type="text/javascript" >
            $('#addRow').click( function() {
        var tableID = "rowTable";
        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;
        
        if(rowCount <=7){
            var row = table.insertRow(rowCount);
          // var  row=table.insertCell(rowCount);
          var tblBodyObj = document.getElementById(tableID).tBodies[0];

  
        var element1 = '<br><select required="" name ="asset[]" class="form-control"><option></option>  @foreach($assets as $asset)<option value= "{{$asset->ass_id}}">{{$asset->ass_name}}</option> @endforeach </select> ';
        // row.innerHTML="fbkdashkfshdkhfsfklfah";  
        row.innerHTML = element1;
        }
        });
        $('#deleteRow').click( function() {
        var tableID = "rowTable";
        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;
        console.log(rowCount);
        if(rowCount != 4) {
        rowCount = rowCount - 1;
        table.deleteRow(rowCount);
        }
        });
        </script>
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
