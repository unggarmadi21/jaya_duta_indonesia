@extends('layout.sidebar')
@section('title','View Member')
@section('title_link','Member')
@section('script')

<script type="text/javascript">
  $(document).ready(function(){
    $("#member").addClass("active");
    $("#master_active").addClass("active");
    $("#master_open").addClass("menu-open");
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
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  @if(empty($data->nama_foto))
                    <img class="profile-user-img img-fluid img-circle"
                         src="{{ url('public/assets/dist/img/avatar.png') }}"
                         alt="User profile picture"  style="width: 30%;height: auto;border-radius: 10%;">
                  @else
                    <img class="profile-user-img img-fluid img-circle"
                         src='{{ url("public/assets/images/member/{$data->nama_foto}") }}'
                         alt="User profile picture" style="width: 30%;height: auto;border-radius: 10%;">
                  @endif

                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- title row -->
            <div class="card">
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="inputName" class="col-form-label">Nama Lengkap</label>
                          <p>{{$data->nama_member}}</p>
                        </div>
                        <div class="form-group">
                          <label for="inputName" class="col-form-label">Username</label>
                          <p>{{$data->username}}</p>
                        </div>
                        <div class="form-group">
                          <label for="inputName" class="col-form-label">Tempat Lahir</label>
                          <p>{{$data->tempat_lahir}}</p>
                        </div>
                        <div class="form-group">
                          <label for="inputName" class="col-form-label">Tanggal Lahir</label>
                          <p>{{date("d M Y", strtotime($data->tanggal_lahir))}}</p>
                        </div>
                        <div class="form-group">
                          <label for="inputName" class="col-form-label">Jenis Kelamin</label>
                          <p>
                            {{$data->jenis_kelamin}}
                            @if($data->jenis_kelamin == "Laki-laki")
                              <i class="fa fa-mars" style="color: red;"></i>
                            @elseif($data->jenis_kelamin == "Perempuan")
                              <i class="fa fa-venus" style="color: red;"></i>
                            @endif
                          </p>
                        </div>
                        <div class="form-group">
                          <label for="inputName" class="col-form-label">Alamat</label>
                          <p>{{$data->alamat}}</p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="inputName" class="col-form-label">Komunitas</label>
                          <p>{{$data->nama_komunitas}}</p>
                        </div>
                        <div class="form-group">
                          <label for="inputName" class="col-form-label">Email</label>
                          <p>{{$data->email}}</p>
                        </div>
                        <div class="form-group">
                          <label for="inputName" class="col-form-label">No. Telepon</label>
                          <p>{{$data->no_telp}}</p>
                        </div>
                        <div class="form-group">
                          <label for="inputName" class="col-form-label">Nama Mobil</label>
                          <p>{{$data->nama_mobil}}</p>
                        </div>
                        <div class="form-group">
                          <label for="inputName" class="col-form-label">Plat Mobil</label>
                          <p>{{$data->plat_mobil}}</p>
                        </div>
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <div class="checkbox">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12 card-footer">
                        <div class="form-group row">
                          <div class="col-sm-12">
                            <a href="{{url('admin/member')}}" class="btn btn-default">Kembali</a>
                            <a href='{{url("admin/member/kartu_member/{$data->id_member}")}}' class="btn btn-primary float-right"><i class="fas fa-print"></i> Cetak Kartu Member</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>

           
          </div>
          <!-- /.invoice -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

@endsection
