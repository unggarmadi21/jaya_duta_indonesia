<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | User Profile</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('public/assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('public/assets/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style type="text/css">
    .footer{
      transition: margin-left .3s ease-in-out;
      margin-left: 0px;
      background: #fff;
      border-top: 1px solid #dee2e6;
      color: #869099;
      padding: 1rem;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="navbar navbar-expand navbar-white navbar-light">
  </nav>
  <!-- /.navbar -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid" id="ignorePDF">
        <div class="row">
          <div class="col-md-12">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">

              <div class="card-header row" style="background-color: #9797e3;">
                <div class="col-md-12">
                  <h3 class="text-center"><b>Komunitas</b> Ku</h3>
                </div>
              </div>
              <div class="card-body box-profile">
                <div class="text-center" id="imagePDF">
                  @if(empty($member->nama_foto))
                    <img class="profile-user-img img-fluid img-circle"
                         src="{{ url('public/assets/dist/img/avatar.png') }}"
                         alt="User profile picture"  style="width: 30%;height: auto;border-radius: 15%;">
                  @else
                    <img class="profile-user-img img-fluid img-circle"
                         src='{{ url("public/assets/images/member/{$member->nama_foto}") }}'
                         alt="User profile picture" style="width: 70%;height: 5%;border-radius: 15%;">
                  @endif

                </div>

                <h3 class="profile-username text-center">{{$member->nama_member}} </h3>

                <p class="text-muted text-center" style="margin-bottom: -5px">{{$member->nama_komunitas}}</p>
                <p class="text-muted text-center">{{$member->nomor_id}}</p>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Tempat, tanggal lahir</b> <a class="float-right">{{$member->tempat_lahir}}, {{date("d M Y", strtotime($member->tanggal_lahir))}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Jenis Kelamin</b> <a class="float-right">{{$member->jenis_kelamin}}</a>
                  </li>
                  @if(!empty($member->nama_mobil))
                    <li class="list-group-item">
                      <b>{{$member->nama_mobil}}</b> <a class="float-right">{{$member->plat_mobil}}</a>
                    </li>
                  @endif
                  <li class="list-group-item">
                    <b>Tanggal Bergabung</b> <a class="float-right">{{date('d F Y', strtotime($member->tanggal_bergabung))}}</a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ url('public/assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('public/assets/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('public/assets/dist/js/demo.js') }}"></script>
<script src="{{ url('public/assets/dist/js/jspdf.min.js') }}"></script>
<script src="{{ url('public/assets/dist/js/html2canvas.js') }}"></script>
<script type="text/javascript"> 

  $(document).ready(function () {
    // var pdf = new jsPDF('p', 'pt', 'a4');
    // pdf.fromHTML($('#ignorePDF').get(0), 10, 10, {'width': 180}
    //   );
    // pdf.output("dataurlnewwindow"); 
    // let pdf = new jsPDF('l', 'pt', 'a4');
    //   pdf.html(document.getElementById('ignorePDF'), {
    //       callback: function () {
    //           //pdf.save('test.pdf');
    //           window.open(pdf.output('bloburl')); // to debug
    //       }
    //   });
    html2canvas(document.body, {
      onrendered: function(canvas) {

        var img = canvas.toDataURL("image/png");
        var doc = new jsPDF();
        var width = doc.internal.pageSize.getWidth();
        var height = doc.internal.pageSize.getHeight();
        doc.addImage(img, 'JPEG', 0, 0, width, height-30);
        // doc.save('test.pdf');
        doc.output("dataurlnewwindow"); 
      }

    });
    // var printDoc = new jsPDF();
    // printDoc.fromHTML(
    //   $('#ignorePDF').get(0), 10, 10, {'width': 180}
    //   );
    // // printDoc.addImage($('#imagePDF').get(0), 'JPEG', 15, 40, 180, 160);
    // // printDoc.autoPrint();
    // printDoc.output("dataurlnewwindow"); 
    // window.addEventListener("load", window.print());

  });
</script>
</body>
</html>
