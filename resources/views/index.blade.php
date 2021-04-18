@extends('layouts.master')

@push('title')
- Beranda
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
    <div id="main-wrapper">
        <!-- ============================================================== -->
        
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">Dashboard</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                 @if(Auth()->user()->hasRole('admin'))
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-6  col-md-4">
                        <div class="card card-inverse card-primary">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="m-r-20 align-self-center">
                                        <h1 class="text-white"><i class="mdi mdi-bank"></i></h1></div>
                                    <div>
                                        <h3 class="card-title">Jumlah Asset</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 align-self-center">
                                        <h2 class="font-light text-white">24 Asset</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-6 col-md-4">
                        <div class="card card-inverse card-success">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="m-r-20 align-self-center">
                                        <h1 class="text-white"><i class="mdi mdi-server"></i></h1></div>
                                    <div>
                                        <h3 class="card-title">Peminjaman</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 align-self-center">
                                        <h2 class="font-light text-white">1 Peminjaman</h2>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <!-- Column -->
                </div>
            @elseif(Auth()->user()->hasRole('student'))
                 <div class="row">
                    <!-- Column -->
                    <div class="col-lg-6  col-md-4">
                        <div class="card card-inverse card-primary">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="m-r-20 align-self-center">
                                        <h1 class="text-white"><i class="mdi mdi-bank"></i></h1></div>
                                    <div>
                                        <h3 class="card-title">Barang Yang Sedang Dipinjam</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 align-self-center">
                                        <h2 class="font-light text-white">2 Barang</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <!-- Column -->
                    <!-- Column -->
                    <!-- Column -->
                </div>
            @endif
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
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

@endpush   
@endsection
