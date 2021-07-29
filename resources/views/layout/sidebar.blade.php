<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PT. JAYA DUTA INDONESIA</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Favicon icon -->
  <link rel="icon" href="{{ url('public/assets/dist/img/favicon.ico') }}" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('public/assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ url('public/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('public/assets/dist/css/adminlte.min.css') }}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ url('public/assets/plugins/select2/css/select2.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   @yield('link')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav text-center">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('admin')}}" class="brand-link myclass">
          <h3 class="brand-text font-weight-light" style="color: black;"><b>{{Session::get('komunitas')}}</b></h3>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: ;"><!-- Brand Logo -->
    <!-- Sidebar -->
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <img src="{{ url('public/assets/dist/img/jayaduta.png') }}" alt="PT. Jaya Duta Indonesia" class="brand-image elevation-3"
               style="opacity: .8; width: 100%;">
      </div>
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <?php $foto =  Session::get('foto');?>
        <div class="image">
          @if(!empty($foto))
            <img src='{{ url("public/assets/dist/img/{$foto}") }}' class="img-circle elevation-2" alt="User Image" style="width: 3.1rem; height: 2.6rem;">
          @else
            <img src="{{ url('public/assets/dist/img/avatar.png') }}" class="img-circle elevation-2" alt="User Image">
          @endif
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Session::get('nama_member')}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="{{url('admin')}}" class="nav-link" id="dashboard">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
                <li class="nav-item">
                  <a href="{{url('admin/member')}}" class="nav-link" id="member">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                      Customer
                    </p>
                  </a>
                </li>
        
          @if(Session::get('type_user') == 1)
            <li class="nav-item has-treeview" id="master_open">
              <a href="#" class="nav-link" id="master_active">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Master Data
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('admin/user')}}" class="nav-link" id="user">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      User
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('admin/member')}}" class="nav-link" id="member">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      Member
                    </p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="{{url('admin/kegiatan')}}" class="nav-link" id="kegiatan">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                  Kegiatan
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('admin/bayar')}}" class="nav-link" id="bayar">
                <i class="nav-icon far fa-credit-card"></i>
                <p>
                  Bayar
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('admin/posting')}}" class="nav-link" id="posting">
                <i class="nav-icon far fa-image"></i>
                <p>
                  Dokumentasi Kegiatan
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview" id="keuangan_open">
              <a href="#" class="nav-link" id="keuangan_active">
                <i class="nav-icon fa fa-credit-card"></i>
                <p>
                  Keuangan
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('admin/pemasukan')}}" class="nav-link" id="pemasukan">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      Pemasukan
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('admin/pengeluaran')}}" class="nav-link" id="pengeluaran">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      Pengeluaran
                    </p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- <li class="nav-item">
              <a href="{{url('admin/laporan')}}" class="nav-link" id="laporan">
                <i class="nav-icon far fa-credit-card"></i>
                <p>
                  Menu
                </p>
              </a>
            </li> -->
          @else
            <!-- <li class="nav-item">
              <a href="{{url('menu')}}" class="nav-link" id="bayar">
                <i class="nav-icon far fa-credit-card"></i>
                <p>
                  Menu
                </p>
              </a>
            </li> -->
          @endif
          <li class="nav-header">Sign Out</li>
          <li class="nav-item">
            <a href="{{url('admin/logout')}}" class="nav-link">
              <i class="nav-icon fa fa-power-off" style="color: red;"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>@yield('title')</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">@yield('title_link')</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    @yield('content')

  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <!-- <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.0
    </div> -->
    <strong>Copyright &copy; 2014-2021 <a href="">PT. Jaya Duta Indonesia</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="{{ url('public/assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ url('public/assets/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ url('public/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('public/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

<!-- Select2 -->
<script src="{{ url('public/assets/plugins/select2/js/select2.full.min.js') }}"></script>
  <link rel="stylesheet" href="{{ url('public/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<!-- Tempusdominus Bootstrap 4 -->
<!-- <script src="{{ url('public//assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script> -->

<script src="{{ url('public/assets/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('public/assets/dist/js/demo.js') }}"></script>

@yield('script')
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init();

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

  });
</script>
</body>
</html>