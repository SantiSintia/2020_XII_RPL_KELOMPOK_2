@extends('layouts.master')

@push('title')
- Detail User
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
    <link  href="{{URL::to('assets/css/colors/default-dark.css')}}" id="theme" rel="stylesheet">
   
@endpush

@section('content')

                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">Users</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                            <li class="breadcrumb-item active">Detail User</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12 ">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-250"> <img src="{{URL::to('../assets/images/users/5.jpg')}}" class="img-circle" width="150">
                                    <h4 class="card-title m-t-10">{{$user->usr_name}}</h4>
                                    @if($user->role_id == 2)
                                    <h5 class="card-title m-t-10">Guru</h5>
                                    @elseif($user->role_id == 3)
                                    <h5 class="card-title m-t-10">Siswa</h5>
                                    @endif

                                   
                                </center>
                            </div>

                            <div class="card-body">
                                    @if($user->role_id == 2)
                                    <div class="row">
                                        <div class="col-2">
                                          <h6>NIP</h6>  
                                        </div>
                                        <div class="col-10">
                                            <h6>{{$user->tc_nip}}</h6>
                                        </div>
                                    </div>
                                    @elseif($user->role_id == 3)
                                    <div class="row">
                                        <div class="col-2">
                                            <h6>NIS</h6>
                                        </div>
                                        <div class="col-10">
                                            <h6>{{$user->std_nis}}</h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <h6>Kelas </h6>
                                        </div>
                                        <div class="col-10">
                                            <h6>{{$user->std_class}}</h6>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-2">
                                            <h6>Email</h6>
                                        </div>
                                        <div class="col-10">
                                            <h6>{{$user->usr_email}}</h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <h6>Jenis Kelamin</h6>
                                        </div>
                                        <div class="col-10">
                                            <h6>{{$user->usr_gender}}</h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <h6>Status</h6>
                                        </div>
                                        <div class="col-10">
                                            @if($user->usr_is_active == 1)
                                                <h6>Aktif</h6>
                                            @elseif($user->usr_is_active == 0)
                                                <h6>Tidak Aktif</h6>
                                            @endif
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row"> 
                                        <div class="col-2">
                                            <h6><a href="{{URL::to('admin/user-borrows/'.$user->usr_id)}}" class="btn btn-sm btn-flat btn-primary">History</a></h6> 
                                        </div> 
                                    </div>
                            </div>
                            </div>
                                  
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <!-- Column -->
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
