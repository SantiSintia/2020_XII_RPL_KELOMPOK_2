@extends('layouts.master')
@section('content')
@extends('includes.head')
 <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Ganti Profile</h4>
                                
                                <form method="POST" class="form-horizontal p-t-20">
                                    @csrf

                                    <input type="hidden" value="{{Auth::user()->usr_id}}" name="id">
                                    <div class="form-group row">
                                        <label for="pass3" class="col-sm-3 control-label">Username*</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <input type="text" name="usr_name" class="form-control" id="name" value="{{Auth::user()->usr_name}}" placeholder="Enter Username">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2">
                                                    <i class="ti-account"></i>
                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div><div class="form-group row">
                                        <label for="pass3" class="col-sm-3 control-label">Phone*</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <input type="text" name="usr_phone" class="form-control" id="phone" value="{{Auth::user()->usr_phone}}" placeholder="Enter Phone">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2">
                                                    <i class="ti-"></i>
                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="pass3" class="col-sm-3 control-label">Password*</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <input type="password" class="form-control" name="usr_password" id="pass3" placeholder="Enter pwd">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2">
                                                    <i class="ti-lock"></i>
                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="pass4" class="col-sm-3 control-label">Re-Password*</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <input type="password" class="form-control" name="re_password"  id="pass4" placeholder="Re Enter pwd">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2">
                                                    <i class="ti-lock"></i>
                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="form-group row m-b-0">
                                        <div class="offset-sm-3 col-sm-9 ">
                                            <button type="submit" class="btn btn-info waves-effect waves-light">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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