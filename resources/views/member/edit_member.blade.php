@extends('layout.sidebar')
@section('title','Edit Member')
@section('title_link','Member')
@section('script')

<script type="text/javascript">
  $(document).ready(function(){
    $("#member").addClass("active");
    $("#master_active").addClass("active");
    $("#master_open").addClass("menu-open");
  });
</script>

@endsection

@section('content')

	 <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Quick Example</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{url('admin/member/update_member',$data->id_member)}}" method="post" enctype="multipart/form-data" role="form">
            	{{csrf_field()}}
              @if ($errors->any())
                @foreach ($errors->all() as $error)
                   <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-ban"></i> {{$error}}</h5>
                  </div>
                @endforeach
              @endif
              <div class="card-body">
                <div class="row">
                  <!-- left column -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Member</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="nama_member" value="{{$data->nama_member}}" placeholder="Nama User">
                      @if($errors->has('firstname'))
											    <div class="error">{{ $errors->first('nama_user') }}</div>
											@endif
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nomor ID</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="nomor_id" value="{{$data->nomor_id}}" placeholder="Nomor ID">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Tempat Lahir</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="tempat_lahir" value="{{$data->tempat_lahir}}" placeholder="Tempat Lahir">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Lahir</label>
                      <input type="date" class="form-control" id="exampleInputEmail1" id="datepicker" value="{{$data->tanggal_lahir}}" name="tanggal_lahir">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Kelamin</label>
                      <select class="form-control" id="exampleInputEmail1" name="jenis_kelamin">
                        @if($data->jenis_kelamin == "Laki-laki")
                          <option value="Laki-laki">Laki-laki</option>
                          <option value="Perempuan">Perempuan</option>
                        @else
                          <option value="Perempuan">Perempuan</option>
                          <option value="Laki-laki">Laki-laki</option>
                        @endif
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Alamat</label>
                      <textarea class="form-control" id="exampleInputEmail1" name="alamat" placeholder="Alamat">{{$data->alamat}}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Foto User</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="nama_foto" id="customFile">
                          <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{$data->email}}" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">ID Sosmed</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="id_sosmed" value="{{$data->id_sosmed}}" placeholder="ID Sosmed">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">No. Telepon</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="no_telp" value="{{$data->no_telp}}" placeholder="No. Telepon">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Username</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="username" value="{{$data->username}}" readonly="" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Merk Mobil</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="nama_mobil" value="{{$data->nama_mobil}}" placeholder="Merk Mobil">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Plat Mobil</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="plat_mobil" value="{{$data->plat_mobil}}" placeholder="Plat Mobil">
                    </div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
              	<a href='{{url("/admin/member")}}' class="btn btn-default btn_edit">Kembali</a>
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

@endsection