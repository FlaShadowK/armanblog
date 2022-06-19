<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Starter</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{secure_asset('admin/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{secure_asset('admin/adminlte.min.css')}}">
    <x-head.tinymce-config/>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
{{--      <li class="nav-item">--}}
{{--        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>--}}
{{--      </li>--}}
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('index')}}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('l-out')}}" class="nav-link">Log out</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('index')}}" class="brand-link">
      <img src="{{secure_asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
{{--      <div class="user-panel mt-3 pb-3 mb-3 d-flex">--}}
{{--        <div class="image">--}}
{{--          <img src="{{Illuminate\Support\Facades\Auth::user()->picture}}" class="img-circle elevation-2" alt="User Image">--}}
{{--        </div>--}}
{{--        <div class="info">--}}
{{--          <a href="#" class="d-block">{{Illuminate\Support\Facades\Auth::user()->name}}</a>--}}
{{--        </div>--}}
{{--      </div>--}}
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
{{--          <li class="nav-item menu-open">--}}
{{--            <a href="#" class="nav-link active">--}}
{{--              <p>--}}
{{--                Starter Pages--}}
{{--              </p>--}}
{{--            </a>--}}
{{--            <ul class="nav nav-treeview">--}}
{{--              <li class="nav-item">--}}
{{--                <a href="#" class="nav-link active">--}}
{{--                  <p>Active Page</p>--}}
{{--                </a>--}}
{{--              </li>--}}
{{--              <li class="nav-item">--}}
{{--                <a href="#" class="nav-link">--}}
{{--                  <p>Inactive Page</p>--}}
{{--                </a>--}}
{{--              </li>--}}
{{--            </ul>--}}
{{--          </li>--}}
        @if(auth()->user()->admin == 1)
            <x-super.links></x-super.links>
        @else
            <x-panel.links></x-panel.links>
        @endif

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('naslov')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
{{--            <ol class="breadcrumb float-sm-right">--}}
{{--              <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
{{--              <li class="breadcrumb-item active">Starter Page</li>--}}
{{--            </ol>--}}
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
      <hr>
    <!-- Main content -->
    <div class="content">
        @yield('content')

    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{secure_asset('admin/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{secure_asset('admin/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{secure_asset('admin/adminlte.min.js')}}"></script>
</body>
</html>
