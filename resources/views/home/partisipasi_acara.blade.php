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
                  @if(!empty($member->nama_mobil) && !empty($member->warna_mobil))
                    <li class="list-group-item">
                      <b>{{$member->nama_mobil}}</b> <a class="float-right">{{$member->warna_mobil}}</a>
                    </li>
                  @endif
                  <li class="list-group-item">
                    <b>Friends</b> <a class="float-right">13,287</a>
                  </li>
                </ul>
                @if(empty($member->warna_mobil) || empty($member->nama_mobil) || empty($member->nama_member) || empty($member->tempat_lahir) || empty($member->tanggal_lahir) || empty($member->alamat) || empty($member->plat_mobil) || empty($member->jenis_kelamin) || empty($member->email) || empty($member->no_telp) || empty($member->nama_foto))
                  <a href="{{url('update_profile')}}" class="btn btn-primary btn-block"><b>Update Profile</b></a>
                @endif
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

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <!-- title row -->
            <div class="row">
              <div class="col-12">
                <h4>
                  <i class="fas fa-car"></i> {{$data->nama_komunitas}}
                  <!-- <small class="float-right">Tanggal: {{ date("d M Y")}}</small> -->
                </h4>
              </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">
                Kegiatan
                <address>
                  <strong>{{$data->nama_kegiatan}}</strong><br>
                  {{$data->jenis_kegiatan}}<br>
                  Pengisi Acara : {{$data->pengisi_acara}}<br>
                  Tempat : {{$data->tempat_kegiatan}}
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                Waktu Kegiatan
                <address>
                  <strong>Tanggal : <?php echo date("d M Y", strtotime($data->tanggal_kegiatan)); ?></strong><br>
                  Jam : {{$data->jam_kegiatan}}<br>
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                Biaya
                <address>
                  <b>Minimal Partisipasi:</b> <br>
                  <?php echo "Rp. ". number_format($data->uang_partisipasi,2,',','.'); ?>
                </address>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="card">
              <div class="card-header p-2">
                <nav class="navbar navbar-expand navbar-white navbar-light">
                  <h3 class="nav nav-pills">Kirim Bukti Transfer</h3>
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
                    <form class="form-horizontal" action="{{url('save_partisipasi')}}" method="post" enctype="multipart/form-data">
                      {{csrf_field()}}
                      <div class="row">
                        <div class="col-md-12">
                          <div class="card-body">
                              <div class="row">
                                <!-- left column -->
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Kegiatan</label>
                                    <select class="form-control" id="id_kegiatan" name="kegiatan">
                                      <option value="{{$data->id_kegiatan}}">{{$data->nama_kegiatan}}</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Komunitas</label>
                                    <input type="text" class="form-control" id="id_komunitas" name="" value="{{$data->nama_komunitas}}" readonly="" placeholder="Komunitas">
                                  </div>
                                </div>
                              </div>
                              <hr>
                            </div>
                            <div class="card-body">
                              <div class="row">
                                <!-- left column -->
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleInputFile">Bukti Bayar</label>
                                    <div class="input-group">
                                      <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="bukti_bayar" id="customFile" required="">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Jumalah Bayar</label>
                                    <input type="number" class="form-control" name="" id="minimal" value="{{$data->uang_partisipasi}}" style="display: none;">
                                    <input type="number" class="form-control" name="jumlah_bayar" id="bayar" placeholder="Jumalah Bayar" required="">
                                  </div>
                              </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="col-md-12">
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <a href="{{url('')}}" class="btn btn-default">Kembali</a>
                              <button type="submit" id="submit" class="btn btn-primary">Simpan</button>
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
    
    $("#bayar").on('input', function(){
      var bayar = parseInt($("#bayar").val());
      var minimal = parseInt($("#minimal").val());
      if(bayar < minimal) {
        $("#submit").hide();
      }else if(bayar >= minimal){
        $("#submit").show();
      }
    }); 
  });
  // document.getElementById("bayar").onkeyup = function() {myFunction()};

  // function myFunction() {
  //   var x = document.getElementById("minimal").value;
  //   var y = document.getElementById("bayar").value;
  //   if (y < x){
  //     document.getElementById("submit").style.display = 'none';
  //     // document.getElementById("alert_confirm").style.display = 'block';
  //     // document.getElementById("alert_confirm_success").style.display = 'none';
  //   }else{
  //     // document.getElementById("alert_confirm").style.display = 'none';
  //     document.getElementById("submit").style.display = 'block';
  //     // document.getElementById("alert_confirm_success").style.display = 'block';
  //   }
  // }
</script>
</body>
</html>
