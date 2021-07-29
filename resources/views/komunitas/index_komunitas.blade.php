@extends('layout.sidebar')
@section('title','Data Komunitas')
@section('title_link','Komunitas')
@section('script')

<script type="text/javascript">
  $(document).ready(function(){
    $("#komunitas").addClass("active");
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
              <a href="{{url('/admin/komunitas/add_komunitas')}}" class="btn btn-success form-size-l float-right">Tambah</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Komunitas</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                	<?php $i = 1; ?>
                	@foreach($komunitas as $kom)
	                	<tr>
	                		<td>{{$i++}}</td>
	                		<td>{{$kom->nama_komunitas}}</td>
	                		<td>
                        <a href='{{url("/admin/komunitas/edit_komunitas/{$kom->id}")}}' class=""><i class="fas fa-edit"></i></a> || 
                        <a href='{{url("/admin/komunitas/delete_komunitas/{$kom->id}")}}' onclick="return confirm('Are you sure you want to delete this item?');" class=""><i class="fas fa-trash" style="color: red;"></i></a>
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
