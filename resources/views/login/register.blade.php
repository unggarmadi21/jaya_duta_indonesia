<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PT. Jaya Duta Indonesia</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('public/assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ url('public/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('public/assets/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="#"></a>
  </div>

  <div class="card">
    <div class="card-body register-card-body" style="width: 220%; margin-left: -218px;">
      <div class="card-header">
        <img class="img-fluid"
             src="{{ url('public/assets/dist/img/jayaduta.png') }}"
             alt="User profile picture" style="width: 100%; border-style: outset; border-radius: 0px; border-color: white;">
        <div class="row">
          <div class="col-md-12">
            <h3 class="text-center mt-3">Form Pendaftaran Admin</h3>
          </div>
        </div>
      </div>
      <br>
      <form action="{{url('register/insert')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        
        {{csrf_field()}}
        @if ($errors->any())
          @foreach ($errors->all() as $error)
             <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-ban"></i> {{$error}}</h5>
            </div>
          @endforeach
       @endif
        <div class="row">
          <div class="col-md-12">
            <div class="mb-3 text-center">
              <div class="">
                <img class="profile-user-img img-fluid img-circle"
                       src="{{ url('public/assets/dist/img/avatar.png') }}"
                       alt="User profile picture"  style="width: 144px;height: 130px;" id="images">
                <p>Foto Profile</p>
              </div>    
            </div>        
            <div class="input-group mb-3">
              <input type="file" class="form-control" name="nama_foto" onchange="document.getElementById('images').src = window.URL.createObjectURL(this.files[0])">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-file"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="nama_member" placeholder="Nama Lengkap">
              <input type="text" class="form-control" name="komunitas" value="{{$komunitas->id_komunitas}}" style="display: none;">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal Lahir">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <select class="form-control" name="jenis_kelamin">
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
           
            <!-- <div class="input-group mb-3">
              <input type="text" class="form-control" name="id_sosmed" placeholder="ID Sosmed">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div> -->
            <div class="input-group mb-3">
              <textarea class="form-control" name="alamat" placeholder="Alamat"></textarea>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>  
          </div>
          <div class="col-md-6">
            <div class="input-group mb-3">
              <input type="text" maxlength="5" class="form-control" name="nomor_id" placeholder="Nomor ID Admin">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-car"></span>
                </div>
              </div>
            </div>
            <!-- <div class="input-group mb-3">
              <input type="text" class="form-control" name="nama_mobil" placeholder="Merk Mobil">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-car"></span>
                </div>
              </div>
            </div> -->
            <!-- <div class="input-group mb-3">
              <input type="text" class="form-control" name="plat_mobil" placeholder="Plat Mobil">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-car"></span>
                </div>
              </div>
            </div> -->
            <div class="input-group mb-3">
              <input type="email" class="form-control" name="email" placeholder="Email">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="username" placeholder="Username">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" class="form-control" name="password" placeholder="Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div> 
             <div class="input-group mb-3">
              <input type="text" class="form-control" name="no_telp" placeholder="Nomor Telepon">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>         
          </div>
        </div>
        <div class="form-group {{ $errors->has('captcha') ? ' has-error' : '' }} mb-12">

          <label for="password" class="col-md-4 control-label">Captcha</label>


          <div class="col-md-12">

              <div class="captcha">

                <span>{!! captcha_img() !!}</span>

                <button type="button" class="btn btn-success btn-refresh"><i class="fas fa-retweet" aria-hidden="true"></i></button>

              </div>
              <br>
              <input id="captcha" type="text" class="form-control col-md-4" placeholder="Enter Captcha" name="captcha">


              @if ($errors->has('captcha'))

                  <span class="help-block">

                      <strong>{{ $errors->first('captcha') }}</strong>

                  </span>

              @endif

          </div>

        </div>
        <div class="row">
          <div class="col-8">
            <a href="{{url('/')}}" class="ml-5 mt-3">Sudah ada akun</a>
          </div>
           <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
          </div> 
          <!-- /.col  -->
        </div>
      </form>
         <!-- <form action="{{url('register/insert')}}" method="post"       enctype="multipart/form-data" role="form">
            	{{csrf_field()}}
            	@if ($errors->any())
                @foreach ($errors->all() as $error)
                   <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-ban"></i> {{$error}}</h5>
                  </div>
                @endforeach
             @endif
             <div class="row">
          <div class="col-md-12">
            <div class="mb-3 text-center">
              <div class="">
                <img class="profile-user-img img-fluid img-circle"
                       src="{{ url('public/assets/dist/img/avatar.png') }}"
                       alt="User profile picture"  style="width: 144px;height: 130px;" id="images">
                <p>Foto Profile</p>
              </div>    
            </div>        
            
          </div>
        </div>
              <div class="card-body">
                <div class="row">
                  left column
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Customer</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="nama_customer" placeholder="Nama Customer">
                      <input type="text" class="form-control" name="komunitas" value="{{$komunitas->id}}" style="display: none;">
                      @if($errors->has('firstname'))
											    <div class="error">{{ $errors->first('nama_user') }}</div>
											@endif
                    </div> 
                    <div>
                    <div class="input-group mb-3">
                      <input type="file" class="form-control" name="nama_foto" onchange="document.getElementById('images').src = window.URL.createObjectURL(this.files[0])">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-file"></span>
                        </div>
                      </div>
                    </div>
                    </div>
                   <!-- <div class="form-group">
                      <label for="exampleInputFile">Foto Customer</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" onchange="document.getElementById('images').src = window.URL.createObjectURL(this.files[0])" name="foto_customer" id="customFile">
                          <label class="custom-file-label" for="images"></label>
                        </div>
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Tempat Lahir</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="tempat_lahir" placeholder="Tempat Lahir">
                    </div> 
                     <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Kelamin</label>
                      <select class="form-control" id="exampleInputEmail1" name="jenis_kelamin">
                        <option value="">Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Pembelian</label>
                      <input type="date" class="form-control" id="exampleInputEmail1" id="datepicker" name="tanggal_pembelian">
                    </div>
                    
                    <div class="form-group mt-3">
                      <label for="exampleInputEmail1">Alamat</label>
                      <textarea class="form-control" id="exampleInputEmail1" name="alamat" placeholder="Alamat"></textarea>
                    </div>
                  
                  </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email">
                    </div>
                   
                     <div class="form-group">
                      <label for="exampleInputEmail1">No. Telepon</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="no_telp" placeholder="No. Telepon">
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Service</label>
                      <input type="date" class="form-control" id="exampleInputEmail1" id="datepicker" name="tanggal_service">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Tipe Unit</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="tipe_unit" placeholder="Tipe Unit">
                    </div>
                   
                    <div class="form-group">
                      <label for="exampleInputEmail1">Agen / Sales Order</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="agen_sales" placeholder="Agen / Sales Order">
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-8">
                  <a href="{{url('login')}}" class="ml-5 mt-3">Sudah ada akun</a>
                </div>
            <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
          </div>
         
        </div>
      </form>  -->
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{ url('public/assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('public/assets/dist/js/adminlte.min.js') }}"></script>
<script type="text/javascript">
  $(function(){
    $("input[name='nomor_id']").on('input', function (e) {
      $(this).val($(this).val().replace(/[^0-9]/g, ''));
    });
  });

  $(".btn-refresh").click(function(){

    $.ajax({

       type:'GET',

       url:'{{ url("/refresh_captcha")}}',

       success:function(data){

          $(".captcha span").html(data.captcha);

       }

    });

  });


</script>
</body>
</html>
