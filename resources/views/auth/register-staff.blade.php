<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.wrappixel.com/demos/admin-templates/material-pro/minisidebar/pages-register2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Feb 2019 11:15:51 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{URL::to('assets/images/logo-atas.png')}}">
    <title>Staff Register | INVENTARIS SMKS MAHAPUTRA</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{URL::to('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{URL::to('assets/css/style.css')}}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{URL::to('assets/css/colors/blue.css')}}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.assets/js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper" class="login-register login-sidebar"  style="background-image:url(assets/images/background/1.jpg);">
  <div class="login-box card">
    <div class="card-body">
      <form class="form-horizontal form-material" id="loginform" method="POST" action="{{ route('register') }}">
      @csrf
      <a href="javascript:void(0)" class="text-center db"><img src="{{ URL::to('assets/images/reg.png')}}" alt="Home" /></a>
        <h5 class="text-center">Staff Register </h5>
        <div class="form-group m-t-20">
          <div class="col-xs-12">
            <input id="usr_name" class="form-control @error('usr_name') is-invalid @enderror" type="text" required="" placeholder="Name" name="usr_name" value="{{ old('usr_name') }}" autocomplete="usr_name" autofocus>
                @error('usr_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
          </div>
        </div>
        <div class="form-group m-t-20">
          <div class="col-xs-12">
            <input id="usr_email" class="form-control @error('usr_email') is-invalid @enderror" type="email" required="" placeholder="Email" name="usr_email" value="{{ old('usr_email') }}" autocomplete="usr_email">
                @error('usr_email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
          </div>
        </div>
        <div class="form-group m-t-20">
          <div class="col-xs-12">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" required="" placeholder="Password">
                @error('usr_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

          </div>
        </div>
        <div class="form-group m-t-20">
          <div class="col-xs-12">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" required="" placeholder="Confirm Password">
          </div>
        </div>
         <div class="form-group m-t-20">
          <div class="col-xs-12">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" required="" placeholder="NIP">
                @error('usr_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
          </div>
        </div>
        <div class="form-group m-t-20">
          <div class="col-xs-12">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" required="" placeholder="Jabatan">
          </div>
        </div>
        <div class="form-group m-t-20">
          <div class="col-xs-12">
            <input id="usr_phone" value="{{ old('usr_phone') }}" class="form-control @error('usr_phone') is-invalid @enderror" name="usr_phone" autocomplete="off" type="text" required="" placeholder="Phone Number">
                @error('usr_phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
          </div>
        </div>
        <div class="btn-group" data-toggle="buttons" role="group">
                                            <label class="btn btn-outline btn-info">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio1" name="options" value="male" class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadio1"> <i class="ti-check text-active" aria-hidden="true"></i> Male</label>
                                                </div>
                                            </label>
                                            <label class="btn btn-outline btn-info">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio2" name="options" value="female" class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadio2"> <i class="ti-check text-active" aria-hidden="true"></i> Female</label>
                                                </div>
                                            </label>
         </div>
        <div class="form-group row">
            <div class="col-md-2">
                <input type="hidden" name="role" value="4">
            </div>
        </div>
        <div class="form-group text-left" style="font-size: 13px;">You have an account?
            <a href="{{route('login')}}" class="text-primary">
            <b>Sign In</b>
        </a>
         <div class="form-group text-right">
            <button type="submit" class="btn btn-primary" id="btnSubmit">
                  {{ __('Register') }}
              </button>
              </div>
       </div>
      </form>
    </div>
  </div>
</section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{URL::to('assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{URL::to('assets/plugins/popper/popper.min.js')}}"></script>
    <script src="{{URL::to('assets/plugins/bootstrap/assets/js/bootstrap.min.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{URL::to('assets/assets/js/jquery.slimscroll.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{URL::to('assets/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{URL::to('assets/js/sidebarmenu.js')}}"></script>
    <!--stickey kit -->
    <script src="{{URL::to('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
    <script src="{{URL::to('assets/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{URL::to('assets/js/custom.min.js')}}"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{URL::to('assets/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>
</body>



<!-- Mirrored from www.wrappixel.com/demos/admin-templates/material-pro/minisidebar/pages-register2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Feb 2019 11:15:51 GMT -->
</html>
