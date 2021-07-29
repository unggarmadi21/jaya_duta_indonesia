@extends('layout.sidebar')
@section('title','Tambah Pengeluaran')
@section('title_link','pengeluaran')
@section('script')

<script type="text/javascript">
  $(document).ready(function(){
    $("#pengeluaran").addClass("active");
    $("#keuangan_active").addClass("active");
    $("#keuangan_open").addClass("menu-open");
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
            <form action="{{url('admin/pengeluaran/insert_pengeluaran')}}" method="post" role="form">
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
                      <label for="exampleInputEmail1">Jumlah (Rp)</label>
                      <input type="number" class="form-control" id="exampleInputEmail1" name="jumlah_pengeluaran" placeholder="Jumlah">
                    </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Keterangan</label>
                    <textarea class="form-control" id="exampleInputEmail1" name="keterangan" placeholder="Keterangan"></textarea>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
              	<a href='{{url("/admin/pengeluaran")}}' class="btn btn-default btn_edit">Kembali</a>
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