@extends('layouts.master')

@push('title')
Tambah Asset
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
@endpush

@section('content')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Tambah Kategori Asset</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{URL::to('categoryAsset/store')}}" method="" class="form-horizontal form-bordered">


                                    <div class="form-body">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3">Nama Aset</label>
                                            <div class="col-md-9">
                                                <input name="" type="text" placeholder="nama Aset" class="form-control">
                                            </div>
                                        </div>

                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Kategori Aset</label>
                                        <div class="col-md-9">
                                            <select name="" class="form-control custom-select">
                                                <option value="">Bangunan</option>
                                                <option value="">Kursi</option>
                                                <option value="">Meja</option>
                                                <option value="">Lemari</option>
                                                <option value="">Rak</option>
                                            </select>
                                        </div>
                                    </div>
                                      
                                  <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Tipe Aset</label>
                                        <div class="col-md-9">
                                            <select name="" class="form-control custom-select">
                                                <option value="">Kursi Siswa</option>
                                                <option value="">Kursi Guru</option>
                                                <option value="">Kursi Tunggu</option>
                                                <option value="">Kursi Set</option>
                                                <option value="">Meja Guru</option>
                                                <option value="">Meja Siswa</option>
                                                <option value="">Lemari</option>
                                                <option value="">Rak</option>
                                                <option value="">Tv</option>
                                                <option value="">Laptop </option>
                                                <option value="">Proyektor</option>
                                                <option value="">AC</option>  
                                            </select>
                                        </div>
                                    </div>
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3">Tahun Pengayaan</label>
                                            <div class="col-md-9">
                                                <input name="" type="text" class="form-control" placeholder="Tahun Pengayaan">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3">Harga</label>
                                            <div class="col-md-9">
                                                <input name="" type="text" class="form-control" placeholder="Harga">
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="offset-sm-3 col-md-9">
                                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
@endpush   
@endsection
