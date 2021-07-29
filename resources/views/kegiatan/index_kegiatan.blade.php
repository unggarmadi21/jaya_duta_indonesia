@extends('layout.sidebar')
@section('title','Data Kegiatan')
@section('title_link','Kegiatan')
@section('script')

<script type="text/javascript">
  $(document).ready(function(){
    $("#kegiatan").addClass("active");
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
              <a href="{{url('admin/kegiatan/add_kegiatan')}}" class="btn btn-success form-size-l float-right">Tambah</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Kegiatan</th>
                    <th>Tanggal Kegiatan</th>
                    <th>Jam Kegiatan</th>
                    <th>Tempat Kegiatan</th>
                    <th>Status Kegiatan</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                	<?php $i = 1; ?>
                	@foreach($kegiatan as $data)
	                	<tr>
	                		<td>{{$i++}}</td>
                      <td>{{$data->nama_kegiatan}}</td>
                      <td>{{$data->tanggal_kegiatan}}</td>
                      <td>{{$data->jam_kegiatan}}</td>
                      <td>{{$data->tempat_kegiatan}}</td>
                      <td class="text-center">
                        @if($data->status_kegiatan == 1)
                          <span class="badge bg-warning">Proses</span> 
                        @else
                          <span class="badge bg-success">Selesai</span>
                        @endif
                      </td>
	                		<td>
                        <a href='{{url("/admin/kegiatan/view_kegiatan/{$data->id_kegiatan}")}}'><i class="fa fa-eye" style="color: blue;"></i></a>
                        ||
                        <a href='{{url("/admin/kegiatan/edit_kegiatan/{$data->id_kegiatan}")}}'><i class="fa fa-edit" style="color: green;"></i></a>
                        ||
                        <a href='{{url("/admin/kegiatan/delete_kegiatan/{$data->id_kegiatan}")}}' onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" style="color: red;"></i></a>
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
