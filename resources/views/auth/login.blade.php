
<!doctype html>
<html class="no-js " lang="en">
<?php
  $favicon = favicon();
  $logo = '';
  if ($favicon) {
      $logo = $favicon->logo;
  }
 ?>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

<title>Login - Mediation</title>
<!-- Favicon-->
<link rel="icon" href="{{ asset('assets/images/'. $favicon->favicon) }}" type="image/x-icon">
<!-- Custom Css -->
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/css/style.min.css') }}">    
</head>

<body class="theme-blush">

<div class="authentication">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <form class="card auth_form" method="post" action="{{ route('login') }}">
                  @csrf
                    <div class="header">
                        @if ($logo)
                          <img class="logo" src="{{ asset('assets/images/'.$logo) }}" alt="">
                        @endif
                        <h5>Welcome to Mediation! 👋</h5>
                        @if ($errors->any())
                            <div class="validation error" id="error_msg">
                                <i class="icon-warning2"></i><strong>Oh snap!</strong><br>
                                @foreach ($errors->all() as $error)
                                    {{ $error }}<br />
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="body">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter your email">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Password">                          
                        </div>
                        <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">SIGN IN</button>                        
                    </div>
                </form>
                <div class="copyright text-center">
                    &copy;
                    <script>document.write(new Date().getFullYear())</script>,
                    <span><a href="templatespoint.net">Templates Point</a></span>
                </div>
            </div>
            <div class="col-lg-8 col-sm-12">
                <div class="card">
                    <img src="{{ asset('assets/admin/images/signin.svg') }}" alt="Sign In"/>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Jquery Core Js -->
<script src="{{ asset('assets/admin/bundles/libscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/admin/bundles/vendorscripts.bundle.js') }}"></script> <!-- Lib Scripts Plugin Js -->
</body>


</html>