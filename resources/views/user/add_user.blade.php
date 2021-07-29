@extends('layout.sidebar')
@section('title','Tambah User')
@section('title_link','User')
@section('script')

<script type="text/javascript">
  $(document).ready(function(){
    $("#user").addClass("active");
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
            <form action="{{url('admin/user/insert_user')}}" method="post" enctype="multipart/form-data" role="form">
            	{{csrf_field()}}
              <div class="card-body">
              @if ($errors->any())
                @foreach ($errors->all() as $error)
                   <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-ban"></i> {{$error}}</h5>
                  </div>
                @endforeach
              @endif
                <div class="row">
                  <!-- left column -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama User</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="nama_user" placeholder="Nama User">
                      @if($errors->has('firstname'))
											    <div class="error">{{ $errors->first('nama_user') }}</div>
											@endif
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Tempat Lahir</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="tempat_lahir" placeholder="Tempat Lahir">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Lahir</label>
                      <input type="date" class="form-control" id="exampleInputEmail1" id="datepicker" name="tanggal_lahir">
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
                      <label for="exampleInputEmail1">Alamat</label>
                      <textarea class="form-control" id="exampleInputEmail1" name="alamat" placeholder="Alamat"></textarea>
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
                      <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">No. Telepon</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="no_telp" placeholder="No. Telepon">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Username</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                    </div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
              	<a href='{{url("/admin/user")}}' class="btn btn-default btn_edit">Kembali</a>
                <button type="submit" class="btn btn-primary">Submit</button>
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