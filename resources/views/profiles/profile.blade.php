@extends('layouts.master')

@push('title')
- Profile
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
                        <h3 class="text-themecolor">Profile</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Profile</a></li>
                            <li class="breadcrumb-item active">My Profile</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> <img src="../assets/images/users/5.jpg" class="img-circle" width="150">
                                    <h4 class="card-title m-t-10">{{ Auth::user()->usr_name }}</h4>
                                    @if(Auth()->user()->hasRole('admin'))
                                    <h6 class="card-subtitle">Admin</h6>
                                    @elseif(Auth()->user()->hasRole('student'))
                                    <h6 class="card-subtitle">Student</h6>
                                    @elseif(Auth()->user()->hasRole('staff'))
                                    <h6 class="card-subtitle">Staff</h6>
                                    @elseif(Auth()->user()->hasRole('teacher'))
                                    <h6 class="card-subtitle">Teacher</h6>
                                    @endif

                                    <div class="row text-center justify-content-md-center">
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
                                    </div>
                                </center>
                            </div>
                            <div>
                                <hr> </div>
                            <div class="card-body"> 
                                <small class="text-muted">Email address </small>
                                    <h6>{{ Auth::user()->usr_email }}</h6> 
                                <small class="text-muted p-t-30 db">Phone</small>
                                    <h6>{{ Auth::user()->usr_phone }}</h6> 
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link show active" data-toggle="tab" href="#profile" role="tab" aria-selected="true">Profile</a> </li>
                                <li class="nav-item"> <a class="nav-link show" data-toggle="tab" href="#settings" role="tab" aria-selected="false">Settings</a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane show active" id="profile" role="tabpanel">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Nama</strong>
                                                <br>
                                                <p class="text-muted">{{ Auth::user()->usr_name }}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Jenis Kelamin</strong>
                                                <br>
                                                <p class="text-muted">{{ Auth::user()->usr_gender }}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Status</strong>
                                                <br>
                                                <p class="text-muted">aktif</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 @if(Auth()->user()->hasRole('admin'))
                                     <div class="tab-pane show" id="settings" role="tabpanel">
                                    <div class="card-body">
                                        <form action="{{ url ('admin/change-profile')}}" method="POST" class="form-horizontal form-material">
                                        @csrf
                                         <input type="hidden" value="{{Auth::user()->usr_id}}" name="id">
                                            <div class="form-group">
                                                <label class="col-md-12">Username</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="usr_name" class="form-control form-control-line" id="name" value="{{Auth::user()->usr_name}}" placeholder="Enter Username">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Phone No</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="usr_phone" class="form-control form-control-line" id="phone" value="{{Auth::user()->usr_phone}}" placeholder="Enter Phone">
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <label class="col-md-12">Password</label>
                                                <div class="col-md-12">
                                                    <input type="password" name="usr_password" placeholder="Enter Password" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Re-Password</label>
                                                <div class="col-md-12">
                                                   <input type="password" class="form-control form-control-line" name="re_password"  id="pass4" placeholder="Re Enter pwd">
                                                </div>
                                            </div>

                                            
                                            
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success">Update Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                                    @elseif(Auth()->user()->hasRole('student'))
                                     <div class="tab-pane show" id="settings" role="tabpanel">
                                    <div class="card-body">
                                        <form action="{{ url ('student/change-profile')}}" method="POST" class="form-horizontal form-material">
                                        @csrf
                                         <input type="hidden" value="{{Auth::user()->usr_id}}" name="id">
                                            <div class="form-group">
                                                <label class="col-md-12">Username</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="usr_name" class="form-control form-control-line" id="name" value="{{Auth::user()->usr_name}}" placeholder="Enter Username">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Phone No</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="usr_phone" class="form-control form-control-line" id="phone" value="{{Auth::user()->usr_phone}}" placeholder="Enter Phone">
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <label class="col-md-12">Password</label>
                                                <div class="col-md-12">
                                                    <input type="password" name="usr_password" placeholder="Enter Password" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Re-Password</label>
                                                <div class="col-md-12">
                                                   <input type="password" class="form-control form-control-line" name="re_password"  id="pass4" placeholder="Re Enter pwd">
                                                </div>
                                            </div>

                                            
                                            
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success">Update Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                                    @elseif(Auth()->user()->hasRole('staff'))
                                     <div class="tab-pane show" id="settings" role="tabpanel">
                                    <div class="card-body">
                                        <form action="{{ url ('staff/change-profile')}}" method="POST" class="form-horizontal form-material">
                                        @csrf
                                         <input type="hidden" value="{{Auth::user()->usr_id}}" name="id">
                                            <div class="form-group">
                                                <label class="col-md-12">Username</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="usr_name" class="form-control form-control-line" id="name" value="{{Auth::user()->usr_name}}" placeholder="Enter Username">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Phone No</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="usr_phone" class="form-control form-control-line" id="phone" value="{{Auth::user()->usr_phone}}" placeholder="Enter Phone">
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <label class="col-md-12">Password</label>
                                                <div class="col-md-12">
                                                    <input type="password" name="usr_password" placeholder="Enter Password" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Re-Password</label>
                                                <div class="col-md-12">
                                                   <input type="password" class="form-control form-control-line" name="re_password"  id="pass4" placeholder="Re Enter pwd">
                                                </div>
                                            </div>

                                            
                                            
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success">Update Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                                    @elseif(Auth()->user()->hasRole('teacher'))
                                     <div class="tab-pane show" id="settings" role="tabpanel">
                                    <div class="card-body">
                                        <form action="{{ url ('teacher/change-profile')}}" method="POST" class="form-horizontal form-material">
                                        @csrf
                                         <input type="hidden" value="{{Auth::user()->usr_id}}" name="id">
                                            <div class="form-group">
                                                <label class="col-md-12">Username</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="usr_name" class="form-control form-control-line" id="name" value="{{Auth::user()->usr_name}}" placeholder="Enter Username">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Phone No</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="usr_phone" class="form-control form-control-line" id="phone" value="{{Auth::user()->usr_phone}}" placeholder="Enter Phone">
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <label class="col-md-12">Password</label>
                                                <div class="col-md-12">
                                                    <input type="password" name="usr_password" placeholder="Enter Password" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Re-Password</label>
                                                <div class="col-md-12">
                                                   <input type="password" class="form-control form-control-line" name="re_password"  id="pass4" placeholder="Re Enter pwd">
                                                </div>
                                            </div>

                                            
                                            
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success">Update Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                                    @endif
                               
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <div class="right-sidebar" style="overflow: visible;">
                    <div class="slimScrollDiv" style="position: relative; overflow: visible hidden; width: auto; height: 100%;"><div class="slimscrollright" style="overflow: hidden; width: auto; height: 100%;">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme working">4</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                                <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme ">12</a></li>
                            </ul>
                            <ul class="m-t-20 chatonline">
                                <li><b>Chat option</b></li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                                </li>
                            </ul>
                        </div>
                    </div><div class="slimScrollBar" style="background: rgb(220, 220, 220); width: 5px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                </div>
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
           
            <!-- ============================================================== -->
            <!-- End footer -->
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
