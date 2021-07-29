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
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Tambah Komunitas</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{url('/admin/komunitas/update_komunitas',$data->id)}}" method="POST" role="form">
              {{csrf_field()}}
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Komunitas</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="nama_komunitas" value="{{$data->nama_komunitas}}">
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="{{url('/admin/komunitas')}}" class="btn btn-default">Back</a>
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