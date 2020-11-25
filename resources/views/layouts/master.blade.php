<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{URL::to('assets/images/logo-atas.png')}}">
    <title>SMKS MAHAPUTRA @stack('title')</title>

 @stack('styles')
</head>
<body>
   <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    
    <div id="main-wrapper">

    @include ('includes.header');

  <aside class="left-sidebar">
    @if(Auth()->user()->hasRole('admin'))
      @include ('includes.sidebar-admin')
    @elseif(Auth()->user()->hasRole('staff'))
      @include ('includes.sidebar-staff')
    @elseif(Auth()->user()->hasRole('teacher'))
      @include ('includes.sidebar-teacher')
    @else
      @include ('includes.sidebar-student')
    @endif
  </aside>

  <div class="page-wrapper">
     <div class="container-fluid">        
    @yield ('content')      
      </div>
  </div>
 
    <footer class="footer">
       © 2020 SMKS MAHAPUTRA CERDAS UTAMA
    </footer>
  </div>

@stack('scripts')
</body>
</html>
