@extends('layout.sidebar')
@section('title','Data Customer')
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
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with default features</h3>
              <a href="{{url('admin/member/add_member')}}" class="btn btn-success form-size-l float-right">Tambah Customer</a>
            </div>
             	@if ($errors->any())
                @foreach ($errors->all() as $error)
                   <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-ban"></i> {{$error}}</h5>
                  </div>
                @endforeach
             @endif
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <!-- <thead>
                  <tr>
                    <th>No</th>
                    <th>Photos</th>
                    <th>Nama Customer</th>
                    <th>Username</th>
                    <th>Ttl</th>
                    <th>Telpon</th>
                    <th>Action</th>
                  </tr>
                </thead> -->
                <!-- <tbody>
                <?php $i = 1; ?>
                	@foreach($member as $data)
	                	<tr>
	                		<td>{{$i++}}</td>
                      <td>
                        <img class="img-responsive" alt="" src='{{ url("public/assets/images/member/{$data->nama_foto}") }}' style="width: 100px;" /></
                      </td>
                      <td>{{$data->nama_member}}</td>
                      <td>{{$data->username}}</td>
                      <td>{{$data->tempat_lahir}}, {{$data->tanggal_lahir}}</td>
	                		<td>{{$data->no_telp}}</td>
	                		<td>
                        <a href='{{url("/admin/member/view_member/{$data->id_member}")}}' class="btn_edit"><i class="fas fa-eye" style="color: green;"></i></a> || 
                        <a href='{{url("/admin/member/edit_member/{$data->id_member}")}}' class="btn_edit"><i class="fas fa-edit"></i></a> || 
                        <a href='{{url("/admin/member/delete_member/{$data->id_member}")}}' onclick="return confirm('Are you sure you want to delete this item?');" class=""><i class="fas fa-trash" style="color: red;"></i></a>
                      </td>
	                	</tr>
									@endforeach
                </tbody> -->
                 <thead>
                  <tr>
                    <th>No</th>
                    <th>Photos</th>
                    <th>Nama Customer</th>
                    <th>Tanggal Pemeblian</th>
                    <th>Sales Order</th>
                    <th>Tanggal Service</th>
                    <th>No. Telpon</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                	<?php $i = 1; ?>
                	@foreach($member as $data)
	                	<tr>
	                		<td>{{$i++}}</td>
                      <td>
                        <img class="img-responsive" alt="" src='{{ url("public/assets/images/member/{$data->nama_foto}") }}' style="width: 100px;" /></
                      </td>
                       <!-- <td>
                        <img class="img-responsive" alt="" src='{{ url("public/assets/images/foto_customer/{$data->foto_customer}") }}' style="width: 100px;" /></
                      </td> -->
                      <td>{{$data->nama_customer}}</td>
                      <td>{{$data->tanggal_pembelian}}</td>
                      <td>{{$data->agen_sales}}</td>
                      <td>{{$data->tanggal_service}}</td>
	                		<td>{{$data->no_telp}}</td>
	                		<td>
                        <a href='{{url("/admin/member/view_member/{$data->id_member}")}}' class="btn_edit"><i class="fas fa-eye" style="color: green;"></i></a> || 
                        <a href='{{url("/admin/member/edit_member/{$data->id_member}")}}' class="btn_edit"><i class="fas fa-edit"></i></a> || 
                        <a href='{{url("/admin/member/delete_member/{$data->id_member}")}}' onclick="return confirm('Are you sure you want to delete this item?');" class=""><i class="fas fa-trash" style="color: red;"></i></a>
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
