<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<?php
  $favicon = favicon();
?>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
<title>{{ config('app.name', 'Laravel') }}</title>
<link rel="icon" href="{{ asset('assets/images/'. $favicon->favicon) }}" type="image/x-icon"> <!-- Favicon-->
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css') }}"/>
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/charts-c3/plugin.css') }}"/>
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/jquery-datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/morrisjs/morris.min.css') }}" />
<!-- Custom Css -->
<link rel="stylesheet" href="{{ asset('assets/admin/css/style.min.css') }}">
<style>
  .logout{
    cursor: pointer;
  }
</style>
@yield('style')
</head>
<body class="theme-blush">
<!-- Page Loader -->
<div class="page-loader-wrapper">
  <div class="loader">
      <div class="m-t-30"><img class="zmdi-hc-spin" src="{{ asset('assets/admin/images/loader.svg') }}" width="48" height="48" alt="Aero"></div>
      <p>Please wait...</p>
  </div>
</div>
@include('layouts.right-icon-menu')
@include('layouts.left-sidebar')
@include('layouts.right-sidebar')
<!-- Main Content -->
@yield('content')
@include('layouts.js-links')
@yield('scripts')
</body>
</html>