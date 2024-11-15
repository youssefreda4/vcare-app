@include('admin.layouts.header')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  {{-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('admin/dist') }}/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> --}}

  <!-- Navbar -->
@include('admin.layouts.nav')
  <!-- /.navbar -->


  <!-- Main Sidebar Container -->
@include('admin.layouts.aside')

  <!-- Content Wrapper. Contains page content -->
  <section>@yield('admin-content')</section>
  <!-- /.content-wrapper -->
  @include('admin.layouts.footer')