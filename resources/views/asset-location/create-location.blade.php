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
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Tambah Lokasi Asset</a></li>
                        </ol>
                    </div>
                </div>

    <script >
        function myFunction() {
            var x = document.getElementById("kategori").value;
            if (x == "Elektronik") {
                document.getElementById("jk").innerHTML = '<div class="form-group row"><label class="control-label text-right col-md-3">bahan</label><div class="col-md-9"><input name="asd_inggridient" type="text" class="form-control" placeholder="Bahan"></div></div></div><div class="form-group row"><label class="control-label text-right col-md-3">Merk</label><div class="col-md-9"><input name="asd_merk" type="text" class="form-control" placeholder="Merk"></div></div></div><div class="form-group row"><label class="control-label text-right col-md-3">spesifikasi</label><div class="col-md-9"><input name="asd_spesification" type="text" class="form-control" placeholder="Spesifikasi"></div></div></div><div class="form-group row"><label class="control-label text-right col-md-3">voltase</label><div class="col-md-9"><input name="asd_voltage" type="text" class="form-control" placeholder="Voltase"></div></div></div>';
            }else{
                 document.getElementById("jk").innerHTML = '<div class="form-group row"><label class="control-label text-right col-md-3">bahan</label><div class="col-md-9"><input name="asd_inggridient" type="text" class="form-control" placeholder="Bahan"></div></div></div><div class="form-group row"><label class="control-label text-right col-md-3">Merk</label><div class="col-md-9"><input name="asd_merk" type="text" class="form-control" placeholder="Merk"></div></div></div><div class="form-group row"><label class="control-label text-right col-md-3">spesifikasi</label><div class="col-md-9"><input name="asd_spesification" type="text" class="form-control" placeholder="Spesifikasi"></div></div></div>';
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
