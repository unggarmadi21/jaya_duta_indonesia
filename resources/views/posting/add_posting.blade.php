@extends('layout.sidebar')
@section('title','Tambah Dokumentasi Kegiatan')
@section('title_link','Dokumentasi Kegiatan')
@section('script')

<script type="text/javascript">
  $(document).ready(function(){
    $("#posting").addClass("active");
  });
</script>

<script type="text/javascript">
  $(function() {

    $('#id_kegiatan').change(function () {

      var id = $("#id_kegiatan").val();
      console.log(id) 
      if (id == "") {
        alert("Pilih Kegiatan")
      }else{
        $.ajax({
          type: "get",
          datatType:'JSON',
          url: '../bayar/api_add_komunitas/'+id,
          data: {'id':id},
          success: function(data){
            console.log(data.nama_komunitas)
            $("#id_komunitas").val(data.nama_komunitas);
            
          },
          error: function(data){
              alert('Error'+data);
              }
        });
      }
      
    });
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
            <form action="{{url('admin/posting/insert_posting')}}" method="post" enctype="multipart/form-data" role="form">
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
                      <label for="exampleInputEmail1">Kegiatan</label>
                      <select class="form-control" id="id_kegiatan" name="kegiatan" required="">
                        <option value="">Pilih Kegiatan</option>
                        @foreach($kegiatan as $data)
                          <option value="{{$data->id_kegiatan}}">{{$data->nama_kegiatan}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <hr>
              </div>
              <div class="card-body">
                <div class="row">
                  <!-- left column -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputFile">Foto Kegiatan</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="foto_kegiatan" id="customFile">
                          <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Deskripsi</label>
                      <textarea class="form-control" id="exampleInputEmail1" name="deskripsi" placeholder="Deskripsi"></textarea>
                    </div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href='{{url("/admin/posting")}}' class="btn btn-default btn_edit">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
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