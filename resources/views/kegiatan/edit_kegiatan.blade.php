@extends('layout.sidebar')
@section('title','Tambah Kegiatan')
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
            <form action="{{url('admin/kegiatan/update_kegiatan',$data->id_kegiatan )}}" method="post" role="form">
            	{{csrf_field()}}
            	@if($errors->any())
							    {{ implode('', $errors->all('<div>:message</div>')) }}
							@endif
              <div class="card-body">
                <div class="row">
                  <!-- left column -->
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Komunitas</label>
                      <select class="form-control" id="exampleInputEmail1" name="komunitas">
                        <option value="{{$data->id_komunitas}}">{{$data->nama_komunitas}}</option>
                        @foreach($komunitas as $kom)
                          <option value="{{$kom->id}}">{{$kom->nama_komunitas}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="card-body">
                <div class="row">
                  <!-- left column -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Kegiatan</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="nama_kegiatan" value="{{$data->nama_kegiatan}}" placeholder="Nama Kegiatan">
                      @if($errors->has('firstname'))
											    <div class="error">{{ $errors->first('nama_user') }}</div>
											@endif
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Kegiatan</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="jenis_kegiatan" value="{{$data->jenis_kegiatan}}" placeholder="Jenis Kegiatan">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Tempat Kegiatan</label>
                      <textarea class="form-control" id="exampleInputEmail1" name="tempat_kegiatan" placeholder="Tempat Kegiatan">{{$data->tempat_kegiatan}}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                  <!-- <div class="form-group">
                    <label for="exampleInputEmail1">Uang Partisipasi (Rp)</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" id="datepicker" value="{{$data->uang_partisipasi}}" name="uang_partisipasi">
                  </div> -->
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Kegiatan</label>
                    <input type="date" class="form-control" id="exampleInputEmail1" id="datepicker" value="{{$data->tanggal_kegiatan}}" name="tanggal_kegiatan">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jam Kegiatan</label>
                    <input type="time" class="form-control" id="exampleInputEmail1" name="jam_kegiatan" value="{{$data->jam_kegiatan}}" placeholder="Jam Kegiatan">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Pengisi Acara</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="pengisi_acara" value="{{$data->pengisi_acara}}" placeholder="Pengisi Acara">
                  </div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
              	<a href='{{url("/admin/kegiatan")}}' class="btn btn-default btn_edit">Kembali</a>
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