@extends('layouts.master')

@push('title')
- Tambah Asset
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
                        <h3 class="text-themecolor">Asset</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Asset</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Kelola Asset</a></li>
                            <li class="breadcrumb-item active">Tambah Asset</li>
                        </ol>
                    </div>
                </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Tambah Asset</h4>
                </div>
                <div class="card-body">
                    <form method="post" class="form-horizontal form-bordered">
                    @csrf
                    <div class="form-body">
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Nama Aset</label>
                            <div class="col-md-9">
                                <input name="asset_name" type="text" placeholder="Nama Aset" class="form-control" required="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Tipe Aset</label>
                            <div class="col-md-9">
                                <select name="type_asset" class="form-control custom-select" required="">
                                    <option selected="true" checked="true">Pilih</option>
                                    @foreach($assets as $data)
                                        <option value="{{$data->ast_id}}">{{$data->ast_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Asal Asset</label>
                            <div class="col-md-9">
                                <select name="asset_origin" class="form-control custom-select">
                                    <option selected="true" checked="true">Pilih Asal Barang</option>
                                    @foreach($origin as $data)
                                        <option value="{{$data->ori_id}}">{{$data->ori_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Tahun Pengayaan</label>
                            <div class="col-md-9">
                                <input name="asset_year" required="" type="number" class="form-control"
                                       placeholder="Tahun Pengayaan">
                            </div>
                        </div>
                        <div class="form-group row" >
                              <label class="control-label text-right col-md-3">Kategori</label>
                               <div class="col-md-9">
                                <select id="kategori" onchange="myFunction()" name="kategori" required="" class="form-control custom-select">
                                    <option selected="true" checked="true">Pilih</option>
                                    @foreach($asset_categories as $data)
                                        <option value="{{$data->asc_name}}">{{$data->asc_name}}</option>
                                    @endforeach
                                </select>
                            </div>                           
                        </div>

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Status</label>
                            <div class="col-md-9">
                                <select name="ass_status" class="form-control custom-select">
                                    <option selected="true" checked="true">Pilih </option>
                                     <option selected="true" checked="true" value="0">TIdak Bisa dipinjam</option>
                                     <option selected="true" checked="true" value="1">Bisa dipinjam</option>
                                   
                                </select>
                            </div>
                        </div>


                        <div id="jk">   </div>
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Kondisi</label>
                            <div class="col-md-9">
                                <select name="asset_condition" class="form-control custom-select">
                                    <option selected="true" checked="true">Pilih </option>
                                     <option selected="true" checked="true">Baru</option>
                                     <option selected="true" checked="true">bekas</option>
                                   
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Harga</label>
                            <div class="col-md-9">
                                <input name="asset_price" type="number" class="form-control" placeholder="Harga" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Jumlah</label>
                            <div class="col-md-9">
                                <input name="total" type="number" class="form-control" placeholder="Jumlah">
                            </div>
                        </div>

                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="offset-sm-3 col-md-9">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Submit
                                        </button>
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
