@extends('layout.sidebar')
@section('title','Data User')
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
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with default features</h3>
              <a href="{{url('admin/user/add_user')}}" class="btn btn-success form-size-l float-right">Tambah</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Photo</th>
                    <th>Nama User</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Email</th>
                    <th>No. Telepon</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                	<?php $i = 1; ?>
                	@foreach($users as $data)
	                	<tr>
	                		<td>{{$i++}}</td>
                      <td><img class="img-responsive" alt="" src='{{ url("public/assets/images/{$data->nama_foto}") }}' style="width: 100px;" /></td>
                      <td>{{$data->nama_user}}</td>
                      <td>{{$data->tempat_lahir}}</td>
                      <td>{{$data->tanggal_lahir}}</td>
                      <td>{{$data->jenis_kelamin}}</td>
                      <td>{{$data->email}}</td>
                      <td>{{$data->no_telp}}</td>
	                		<td>
                        <a href='{{url("/admin/user/edit_user/{$data->id_user}")}}' class="btn_edit"><i class="fas fa-edit"></i></a> || 
                        <a href='{{url("/admin/user/delete_user/{$data->id_user}")}}' onclick="return confirm('Are you sure you want to delete this item?');" class=""><i class="fas fa-trash" style="color: red;"></i></a>
                      </td>
	                	</tr>
									@endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection
