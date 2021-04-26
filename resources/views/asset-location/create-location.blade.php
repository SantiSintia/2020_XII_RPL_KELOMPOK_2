@extends('layouts.master')

@push('title')
- Tambah Lokasi Asset
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
    <link  href="{{URL::to('assets/css/colors/default-dark.css')}}" id="theme" rel="stylesheet">
@endpush

@section('content')

                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">Tambah Lokasi Asset</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Lokasi Asset</a></li>
                            <li class="breadcrumb-item active">Tambah Lokasi Asset</a></li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Tambah Lokasi Asset</h4>
                            </div>
                            <div class="card-body">
                                <select id="location" onchange="lokasi()">
                                    <option value="i" >........</option>
                                    <option value="1">induk lokasi</option>
                                    <option value="2">sub lokasi</option>
                                </select>
                                <form method="POST">
                                <div id="g"><button type="button" class="btn btn-inverse">Cancel</button></div>
                                </form>
                              
                            </div>
                        </div>
                    </div>
                </div>

            <script type="text/javascript">
                function lokasi() {
                    var lokasi = document.getElementById("location").value;
                    if (lokasi == 1) {
                        document.getElementById('g').innerHTML='   <div class="form-body"><div class="form-group"><label>Nama Lokasi</label><input type="text" name="lokasi" class="form-control" value=""> </div> <input type="hidden" name="status" value="1"> </div><div class="form-actions"><button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button><button type="button" class="btn btn-inverse">Cancel</button> </div>'
                 } else if(lokasi== "i"){
                    document.getElementById('g').innerHTML='<button type="button" class="btn btn-inverse">Cancel</button>'
                 }

                    else{
                        document.getElementById('g').innerHTML='   <div class="form-body"><div class="form-group"><label>Nama Lokasi</label>  <select name="induk" class="form-control">    <option>.....</option>@foreach($lokasi as $lokasi)<option>{{$lokasi->location_name}}</option>@endforeach</select><label>Nama Sublokasi</label> <input type="text" name="lokasi" class="form-control" value=""> </div> <input type="hidden" name="status" value="1"> </div><div class="form-actions"><button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button><button type="button" class="btn btn-inverse">Cancel</button> </div>'
                    }

                }

            </script>


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
    @endpush
@endsection
