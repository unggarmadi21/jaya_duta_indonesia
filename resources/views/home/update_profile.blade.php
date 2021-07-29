<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | User Profile</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

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
                         alt="User profile picture"  style="width: 144px;height: 121px;">
                  @else
                    <img class="profile-user-img img-fluid img-circle"
                         src='{{ url("public/assets/images/member/{$member->nama_foto}") }}'
                         alt="User profile picture" style="width: 144px;height: 121px;">
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
                    <b>Anggota</b> <a class="float-right">{{$komunitas}}</a>
                  </li>
                  @if(!empty($member->nama_mobil) && !empty($member->plat_mobil))
                    <li class="list-group-item">
                      <b>{{$member->nama_mobil}}</b> <a class="float-right">{{$member->plat_mobil}}</a>
                    </li>
                  @endif
                </ul>
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
                    <a href='#'><b>{{$kegiatan->nama_kegiatan}}</b></a>
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

                <hr>
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
                  <h3 class="nav nav-pills">Update Profile</h3>
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
              @if ($errors->any())
                @foreach ($errors->all() as $error)
                   <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-ban"></i> {{$error}}</h5>
                  </div>
                @endforeach
              @endif
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <form class="form-horizontal" action="{{url('save_update_profile', $data->id_member)}}" method="post" enctype="multipart/form-data">
                      {{csrf_field()}}
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="nama_member" value="{{$data->nama_member}}" placeholder="Nama User">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="tempat_lahir" value="{{$data->tempat_lahir}}" placeholder="Tempat Lahir">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                              <input type="date" class="form-control" value="{{$data->tanggal_lahir}}" name="tanggal_lahir">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputSkills" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                              <select class="form-control" id="exampleInputEmail1" name="jenis_kelamin">
                                @if($data->jenis_kelamin == "Laki-laki")
                                  <option value="Laki-laki">Laki-laki</option>
                                  <option value="Perempuan">Perempuan</option>
                                @elseif($data->jenis_kelamin == "Perempuan")
                                  <option value="Perempuan">Perempuan</option>
                                  <option value="Laki-laki">Laki-laki</option>
                                @else
                                  <option value="">Pilih Jenis Kelamin</option>
                                  <option value="Laki-laki">Laki-laki</option>
                                  <option value="Perempuan">Perempuan</option>
                                @endif
                              </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputExperience" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                              <textarea class="form-control" id="inputExperience" name="alamat" placeholder="Alamat">{{$data->alamat}}</textarea>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputExperience" class="col-sm-2 col-form-label">Foto Profil</label>
                            <div class="col-sm-10">
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" name="nama_foto" id="customFile">
                                  <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                              <input type="email" class="form-control" id="inputName" name="email" value="{{$data->email}}" placeholder="Enter email">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">No. Telepon</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="inputEmail" name="no_telp" value="{{$data->no_telp}}" placeholder="No. Telepon">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="inputName2" name="username" value="{{$data->username}}" readonly="" placeholder="Username">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputExperience" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputSkills" class="col-sm-2 col-form-label">Nama Mobil</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="nama_mobil" value="{{$data->nama_mobil}}" placeholder="Merk Mobil">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputSkills" class="col-sm-2 col-form-label">Plat Mobil</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="plat_mobil" value="{{$data->plat_mobil}}" placeholder="Plat Mobil">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                              <div class="checkbox">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <a href="{{url('')}}" class="btn btn-default">Kembali</a>
                              <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
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
<script src="{{ url('public/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

<script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init();
  });
</script>
</body>
</html>
