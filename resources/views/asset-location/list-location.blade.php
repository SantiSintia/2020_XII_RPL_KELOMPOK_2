@extends('layouts.master')

@push('title')
List Lokasi Asset
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
                        <h3 class="text-themecolor">Lokasi Asset</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">List Lokasi Asset</a></li>
                        </ol>
                    </div>
                </div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">List Lokasi Asset</h4>
                <div class="box-header">
                    <p>
                        <a href="{{URL::to('asset-location/create')}}" class="btn btn-success btn-rounded m-t-10 float-leaft"><i class="fa fa-plus"></i>Tambah</a>
                    </p>
                </div>
                
                <div class="table-responsive m-t-40">
                    <div class="col-12">
                        <div id="code1" class="collapse">
                            <div class="highlight">
                                <pre>
                                    <code>
                                          <span class="nt">&lt;div</span> 
                                          <span class="na">class=</span>
                                          <span class="s">"card"</span> 
                                          <span class="na">style=</span>
                                          <span class="s">"width: 20rem;"</span>
                                          <span class="nt">&gt;</span>
                                          <span class="nt">&lt;img</span> 
                                          <span class="na">class=</span>
                                          <span class="s">"card-img-top"</span>
                                          <span class="na">src=</span>
                                          <span class="s">"..."</span>
                                          <span class="na">alt=</span>
                                          <span class="s">"Card image cap"</span>
                                          <span class="nt">&gt;</span>
                                          <span class="nt">&lt;div</span>
                                          <span class="na">class=</span>
                                          <span class="s">"card-body"</span>
                                          <span class="nt">&gt;</span>
                                          <span class="nt">&lt;h4</span>
                                          <span class="na">class=</span>
                                          <span class="s">"card-title"</span>
                                          <span class="nt">&gt;</span>Card title<span class="nt">&lt;/h4&gt;</span>
                                            <span class="nt">&lt;p</span>
                                            <span class="na">class=</span>
                                            <span class="s">"card-text"</span>
                                            <span class="nt">&gt;</span>Some quick example text to build on the card title and make up the bulk of the card's content.
                                            <span class="nt">&lt;/p&gt;</span>
                                            <span class="nt">&lt;a</span>
                                            <span class="na">href=</span>
                                            <span class="s">"#"</span>
                                            <span class="na">class=</span>
                                            <span class="s">"btn btn-primary"</span>
                                            <span class="nt">&gt;</span>Go somewhere<span class="nt">&lt;/a&gt;</span>
                                          <span class="nt">&lt;/div&gt;</span>
                                        <span class="nt">&lt;/div&gt;</span></code>
                                    </pre>
                            </div>
                        </div>
                        <!-- Row -->
                        
                            <!-- column -->
                            
                            <!-- column -->
                            <!-- column -->
                           <div class="form-group row">
                            
                            <div class="col-md-24">
                                <select id="lokasi" name="asset_origin" class="form-control custom-select">
                                    <option selected="true" checked="true">Pilih lokasi</option>
                                    @foreach($location as $lokasi)
                                        <option value="{{$lokasi->la_id}}">{{$lokasi->location_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                            <!-- column -->
                            
                                        <div id="gg"></div>

                
                
        </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">
      $('#lokasi').on('change', function (e) {
        console.log(e);
        var lokasi_id=e.target.value;
        $.get('{{URL::to('api/json-lokasi')}}/'+lokasi_id,function (variable){
            console.log(variable);
                $('#gg').empty()
            $.each(variable.lokasi, function(val,lokasiObj){
             $('#gg').append(' <div class="col-lg-3 col-md-6 img-responsive"><!-- Card --><div class="card"> <!-- <img class="card-img-top img-responsive" src="../assets/images/big/img4.jpg" alt="Card image cap"> --><div class="card-body"><h4 class="card-title">'+lokasiObj.location_name+'</h4><p class="card-text">SMK MAHAPUTRA</p><a href="asset-location/'+lokasiObj.la_id+'/room" class="btn btn-primary">Visit</a></div></div> <!-- Card --></div><!-- column -->');
            });
        });
       }); 


    </script>


@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="{{URL::to('assets/js/jquery.min.js')}}"></script>
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
