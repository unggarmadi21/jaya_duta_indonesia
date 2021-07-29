@extends('layout.sidebar')
@section('title','Data Laporan')
@section('title_link','laporan')
@section('script')

<script type="text/javascript">
  $(document).ready(function(){
    $("#laporan").addClass("active");
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
              <a href="{{url('admin/laporan/export_excel')}}" class="btn btn-primary form-size-l float-right"><i class="fa fa-print"></i> Print to Exel</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Keterangan</th>
                    <th>Jumlah (Rp)</th>
                    <th>Status</th>
                    <th>Saldo</th>
                    <th>Tanggal</th>
                  </tr>
                </thead>
                <tbody>
                	<?php $i = 1; ?>
                	@foreach($laporan as $data)
	                	<tr>
	                		<td>{{$i++}}</td>
                      <td>{{$data->keterangan}}</td>
                      <td><?php echo "Rp. ". number_format($data->jumlah_uang,2,',','.'); ?></td>
                      <td>
                        @if($data->status == 1)
                          <span class="badge bg-primary">Pemasukan</span>
                        @else
                          <span class="badge bg-danger">Pengeluaran</span>
                        @endif
                      </td>
                      <td><?php echo "Rp. ". number_format($data->saldo,2,',','.'); ?></td>
                      <td>{{date("d M Y", strtotime($data->created_at))}}</td>
	                	</tr>
									@endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            <div class="card-body">
              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <form action="{{url('admin/laporan/export_excel')}}" method="get">
                    <p class="lead"><b>Print to Excel :</b></p>
                    <div class="row">
                      <div class="col-6">
                        <input type="date" name="sebelum" class="form-control">
                      </div>
                      <div class="col-6">
                        <input type="date" name="sesudah" class="form-control">
                      </div>
                    </div>

                    <p class="text-muted well well-sm shadow-none float-right" style="margin-top: 10px;">
                      <button class="btn btn-primary"><i class="fa fa-print"></i> Print</button>
                    </p>
                  </form>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection
