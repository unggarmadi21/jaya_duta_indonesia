<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | User Profile</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Favicon icon -->
  <link rel="icon" href="{{ url('public/assets/dist/img/favicon.ico') }}" type="image/x-icon">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('public/assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('public/assets/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style type="text/css">
    .footer{
      transition: margin-left .3s ease-in-out;
      margin-left: 0px;
      background: #fff;
      border-top: 1px solid #dee2e6;
      color: #869099;
      padding: 1rem;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="navbar navbar-expand navbar-white navbar-light">
  </nav>
  <!-- /.navbar -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  @if(empty($member->nama_foto))
                    <img class="profile-user-img img-fluid img-circle"
                         src="{{ url('public/assets/dist/img/avatar.png') }}"
                         alt="User profile picture"  style="width: 144px;height: 130px;">
                  @else
                    <img class="profile-user-img img-fluid img-circle"
                         src='{{ url("public/assets/images/member/{$member->nama_foto}") }}'
                         alt="User profile picture" style="width: 144px;height: 130px;">
                  @endif

                </div>

                <h3 class="profile-username text-center">{{Session::get('nama')}} 
                  @if($member->jenis_kelamin == "Laki-laki")
                    <i class="fa fa-mars" style="color: red;"></i>
                  @elseif($member->jenis_kelamin == "Perempuan")
                    <i class="fa fa-venus" style="color: red;"></i>
                  @endif
                </h3>

                <p class="text-muted text-center">{{$member->nama_komunitas}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Anggota</b> <a class="float-right">{{$data}}</a>
                  </li>
                  @if(!empty($member->nama_mobil) && !empty($member->plat_mobil))
                    <li class="list-group-item">
                      <b>{{$member->nama_mobil}}</b> <a class="float-right">{{$member->plat_mobil}}</a>
                    </li>
                  @endif
                </ul>

                <a href='{{url("update_profile/{$member->id_member}")}}' class="btn btn-primary btn-block"><b>Update Profile</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- Acara Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Acara</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @foreach($kgt as $kegiatan)
                 <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <a href='#'><b>{{$kegiatan->nama_kegiatan}}</b> <a class="float-right">{{date("d M Y", strtotime($kegiatan->tanggal_kegiatan))}}</a></a>
                  </li>
                </ul>
                @endforeach
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fa fa-birthday-cake mr-1"></i> Ulang Tahun</strong>

                <p class="text-muted">
                  @if(!empty($member->tanggal_lahir))
                    {{date('d F Y', strtotime($member->tanggal_lahir))}}
                  @endif
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Kota Kelahiran</strong>

                <p class="text-muted">{{$member->tempat_lahir}}</p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>

                <p class="text-muted">{{$member->alamat}}</p>

                <hr>

                <strong><i class="fa fa-phone mr-1"></i> Telepon</strong>

                <p class="text-muted">
                  {{$member->no_telp}}
                </p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <nav class="navbar navbar-expand navbar-white navbar-light">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                  </ul>
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('logout')}}">
                        <i class="fa fa-power-off" style="color: red;"></i>
                      </a>
                    </li>
                  </ul>
                </nav>
              </div><!-- /.card-header -->
              
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    @foreach($posting as $kg)
                      <div class="post">
                        <div class="user-block">
                          <img class="img-circle img-bordered-sm" src='{{ url("public/assets/images/{$kg->nama_foto}") }}' alt="user image">
                          <span class="username">
                            <a href="#">{{$kg->nama_user}}</a>
                            <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                          </span>
                          <?php 
                            $tanggal1 = new DateTime($kg->created_at);
                            $tanggal2 = new DateTime();
                            $time     = date("h:i:sa", strtotime($kg->created_at));
                             
                            $perbedaan = $tanggal2->diff($tanggal1)->format("%a");
                          ?>
                          @if($perbedaan > 0)
                            <span class="description">Shared publicly - {{$perbedaan}} days ago</span>
                          @else
                            <span class="description">Shared publicly - {{$time}} today</span>
                          @endif
                        </div>
                        <!-- /.user-block -->
                        <div class="row mb-3">
                          <div class="col-sm-6">
                            <img class="img-fluid" src='{{ url("public/assets/images/postingan/{$kg->foto_posting}") }}' alt="Photo">
                          </div>
                          <div class="col-sm-6">
                          </div>
                          <div class="col-sm-12">
                            <p>
                              {{$kg->deskripsi}}.
                            </p>
                          </div>
                        </div>

                        <p>
                          <!-- <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                          <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                          <span class="float-right">
                            <a href="#" class="link-black text-sm">
                              <i class="far fa-comments mr-1"></i> Comments (5)
                            </a>
                          </span> -->
                        </p>

                        <!-- <input class="form-control form-control-sm" type="text" placeholder="Type a comment"> -->
                      </div>
                      <!-- /.post -->
                    @endforeach

                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.0
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
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
<!-- AdminLTE App -->
<script src="{{ url('public/assets/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('public/assets/dist/js/demo.js') }}"></script>
</body>
</html>
