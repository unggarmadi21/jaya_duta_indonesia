@extends('layout.sidebar')
@section('title','Data Dokumentasi Kegiatan')
@section('title_link','Dokumentasi Kegiatan')
@section('script')

<script type="text/javascript">
  $(document).ready(function(){
    $("#posting").addClass("active");
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
              <a href="{{url('admin/posting/add_posting')}}" class="btn btn-success form-size-l float-right">Tambah</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama Kegiatan</th>
                    <th>Komunitas</th>
                    <th>Deskripsi</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                	<?php $i = 1; ?>
                	@foreach($posting as $data)
	                	<tr>
	                		<td>{{$i++}}</td>
                      <td><img class="img-responsive" alt="" src='{{ url("public/assets/images/postingan/{$data->foto_posting}") }}' style="width: 100px;" /></td>
                      <td>{{$data->nama_kegiatan}}</td>
                      <td>{{$data->nama_komunitas}}</td>
                      <td>{{$data->deskripsi}}</td>
	                		<td>
                        <a href='{{url("/admin/posting/edit_posting/{$data->id_posting}")}}' class="btn_edit"><i class="fas fa-edit"></i></a> || 
                        <a href='{{url("/admin/posting/delete_posting/{$data->id_posting}")}}' onclick="return confirm('Are you sure you want to delete this item?');" class=""><i class="fas fa-trash" style="color: red;"></i></a>
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
