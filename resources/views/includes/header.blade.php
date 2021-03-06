 <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{URL::to('admin/dashboard')}}">
                        <!-- Logo icon -->
                        <b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="{{URL::to('assets/images/1.jpg')}}" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="{{URL::to('assets/images/1.jpg')}}" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span>
                         <!-- dark Logo text -->
                         <img src="{{URL::to('assets/images/logo-asset2.png')}}" alt="homepage" class="dark-logo" />
                         <!-- Light Logo text -->    
                         <img src="{{URL::to('assets/images/logo-asset2.png')}}" class="light-logo" alt="homepage" /></span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                    
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                      
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                       
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if(isset(Auth()->user()->usr_profile_picture))
                                <img src="{{ asset('usr_profile_picture/'.Auth()->user()->usr_profile_picture)}}" alt="null" class="profile-pic" />
                                @else
                                <img src="{{ asset('usr_profile_picture/avatar-2.png')}}" alt="null" class="profile-pic" />
                                @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img">
                                                @if(isset(Auth()->user()->usr_profile_picture))
                                                <img src="{{ asset('usr_profile_picture/'.Auth()->user()->usr_profile_picture)}}" alt="null">
                                                @else
                                                <img src="{{ asset('usr_profile_picture/avatar-2.png')}}" alt="null">
                                                @endif
                                            </div>
                                            <div class="u-text">
                                                <h4>{{ Auth::user()->usr_name }}</h4>
                                            </div>
                                        </div>
                                    </li>

                                    <li role="separator" class="divider"></li>
                                    @if(Auth()->user()->hasRole('admin'))
                                     <li><a href="{{URL::to('admin/profile')}}"><i class="ti-user"></i> My Profile</a></li>
                                    @elseif(Auth()->user()->hasRole('student'))
                                     <li><a href="{{URL::to('user/profile')}}"><i class="ti-user"></i> My Profile</a></li>
                                    @elseif(Auth()->user()->hasRole('staff'))
                                     <li><a href="{{URL::to('staff/profile')}}"><i class="ti-user"></i> My Profile</a></li>
                                    @elseif(Auth()->user()->hasRole('teacher'))
                                     <li><a href="{{URL::to('user/profile')}}"><i class="ti-user"></i> My Profile</a></li>
                                    @endif
                                    <li role="separator" class="divider"></li>
                                    <li><a href="{{route('logout')}}" method="post" class="link"  data-toggle="tooltip" title="Logout" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="fa fa-power-off"></i> Logout</a></li>
                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- Language -->
                        <!-- ============================================================== -->
                       
                    </ul>
                </div>
            </nav>
        </header>