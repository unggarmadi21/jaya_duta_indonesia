@extends('layout.sidebar')
@section('title','Dashboard')
@section('script')

<script type="text/javascript">
  $(document).ready(function(){
    $("#dashboard").addClass("active");
  });
</script>

@endsection
@section('content')

	<!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$member}}</h3>

              <p>Jumlah Member</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{url('admin/member')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          @foreach($ultah as $birday)
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{date("d M Y", strtotime($birday->tanggal_lahir))}}</h3>

                <p><h5>{{$birday->nama_member}}</h5></p>
              </div>
              <div class="icon">
                <i class="fas fa-birthday-cake"></i>
              </div>
              <a href="{{url('admin/member')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          @endforeach
          @if($count_ultah == 0)
            <div class="small-box bg-success">
              <div class="inner">
                <h3>0</h3>

                <p>Ulang Tahun</p>
              </div>
              <div class="icon">
                <i class="fas fa-birthday-cake"></i>
              </div>
              <a href="{{url('admin/member')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          @endif
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{$kegiatan}}</h3>

              <p>Jadwal Service</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{url('admin/kegiatan')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{$selesai}}</h3>

              <p>Service Selesai</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{url('admin/kegiatan')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

@endsection