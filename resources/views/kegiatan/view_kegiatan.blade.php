@extends('layout.sidebar')
@section('title','View Kegiatan')
@section('title_link','kegiatan')
@section('script')

<script type="text/javascript">
  $(document).ready(function(){
    $("#kegiatan").addClass("active");
  });
</script>

@endsection

@section('content')

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- Main content -->
          <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
              <div class="col-12">
                <h4>
                  <i class="fas fa-car"></i> {{$data->nama_komunitas}}
                  <small class="float-right">Tanggal: <?php echo date("d M Y"); ?></small>
                </h4>
              </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">
                Kegiatan
                <address>
                  <strong>{{$data->nama_kegiatan}}</strong><br>
                  {{$data->jenis_kegiatan}}<br>
                  Pengisi Acara : {{$data->pengisi_acara}}<br>
                  Tempat : {{$data->tempat_kegiatan}}
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                Waktu Kegiatan
                <address>
                  <strong>Tanggal : <?php echo date("d M Y", strtotime($data->tanggal_kegiatan)); ?></strong><br>
                  Jam : {{$data->jam_kegiatan}}<br>
                </address>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
              <div class="col-12 table-responsive">
                <table class="table table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Member</th>
                    <th>Mobil</th>
                    <th>Spesifikasi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i =1; ?>
                    @foreach($member as $members)
                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$members->nama_member}}</td>
                        <td>{{$members->nama_mobil}}</td>
                        <td>{{$members->warna_mobil}}<br> {{$members->plat_mobil}}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">
                <!-- accepted payments column -->
              </div>
              <!-- /.row -->

            @if($data->status_kegiatan == 1)
              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-6">
                  <!-- <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a> -->
                </div>
                <div class="col-3">
                </div>
                <div class="col-3">
                  <form action="{{url('admin/kegiatan/update_status', $data->id_kegiatan)}}" method="post">
                  {{csrf_field()}}
                    <div class="form-group">
                      <select class="form-control" name="update_status" readonly="">
                        <option value="2">Selesai</option>
                      </select>
                    </div>
                    <button class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-upload"></i> Update Status
                  </button>
                  </form>
                </div>
              </div>
            @endif
          </div>
          <!-- /.invoice -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

@endsection
