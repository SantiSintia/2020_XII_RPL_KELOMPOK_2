@extends('layouts.master')

@push('title')
- Tambah Kategori Asset
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
                        <h3 class="text-themecolor">Asset</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Asset</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Kelola Kategori Asset</a></li>
                            <li class="breadcrumb-item active">Tambah Kategori Asset</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Tambah Kategori Asset</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{URL::to('categoryAsset/store')}}" method="" class="form-horizontal form-bordered">
                                @csrf
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Tipe Kategori</label>
                                        <div class="col-md-5">
                                            <select name="type_categories" class="form-control custom-select" id="types">
                                                <option value="">--pilih--</option>
                                                <option value="">Tidak Ada</option>
                                                @foreach($category as $kategori)
                                                    @if($kategori->asc_parent_asset_categories_id == null)
                                                    <option value="{{$kategori->asc_id}}">{{ $kategori->asc_name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <button type="button" class="btn  btn-dark" data-toggle="modal" data-target="#createPrimaryCat">Tambah kategori Utama</button>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3"> Jenis Kategori</label> 
                                        <div class="col-md-9">
                                            <select name="categories" class="form-control custom-select" id="categories"> 
                                                <option></option>
                                            </select>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3">Nama Sub Kategori</label>
                                            <div class="col-md-9">
                                                <input name="asc_name" type="text" class="form-control" placeholder="Nama Sub Kategori">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3">Kode Asli</label> 
                                            <div class="col-md-9">
                                                <input name="asc_original_code" type="text" class="form-control" placeholder="Kode Asli"> 
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3">Kode Kategori</label> 
                                            <div class="col-md-9">
                                                <input name="asc_code" type="text" class="form-control" placeholder="Kode kategori"> 
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
                
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>
    $('#types').on('change', function (e) {
        console.log(e);
        var asc_id = e.target.value;
        $.get('{{URL::to('api/json-categories')}}/'+ asc_id  , function (data) {
            console.log('data');
            $('#categories').empty();
            $('#categories').append('<option value="">--pilih--</option>');
            $.each(data.categories, function (val, categoriesObj) {
                $('#categories').append('<option value="'+categoriesObj.asc_id+'">'+categoriesObj.asc_name+'</option>');
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
@endpush
@endsection
<form action="{{URL::to('/create/categori-primary')}}" method="postweb">
    @csrf
<div class="modal fade" id="createPrimaryCat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori Utama</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label class="control-label text-right col-md-3">Nama Kategori</label>
                    <div class="col-md-9">
                        <input name="asc_name" type="text" class="form-control" placeholder="Nama Kategori" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="control-label text-right col-md-3">Kode Kategori</label>
                    <div class="col-md-9">
                        <input name="asc_original_code" type="text" class="form-control" placeholder="Kode Kategori" required>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
</form>

