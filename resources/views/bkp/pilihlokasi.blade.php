<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Saridharma| Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{url('/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('/adminlte/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{url('/adminlte/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('/adminlte/css/AdminLTE.min.css')}}">
   <link rel="stylesheet" href="{{url('/adminlte/bower_components/select2/dist/css/select2.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{url('/adminlte/plugins/iCheck/square/blue.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="{{url('/')}}"><b>Admin</b>Sari-HIS</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Pilih Lokasi</p>

    <form action="{{url('/postlokasi')}}" method="post">
    {{csrf_field()}}
      <div class="form-group has-feedback">
      <input type="nama" name="nama"class="form-control" placeholder="Email" value="{{$nama}}" readonly>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
          <select class="form-control select2" style="min-width:350px;" required id="idPraktek" name="id_lokasi">
                          <option></option>
                           <?php
                           
                             foreach($data->lokasi as $a){
                              $idtype = $a['id'];
                              $type = $a['nm_lokasi'];
                               echo "<option value='$idtype'>$type</option>";
                              }
                           
                          ?>
            </select> 
      </div>

      
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
           
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Next</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

   

  

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="{{url('/adminlte/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{url('/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- iCheck -->
<script src="{{url('/adminlte/bower_components/select2/dist/js/select2.full.min.js')}}"></script>

<script src="{{url('/adminlte/plugins/iCheck/icheck.min.js')}}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>

<script type="text/javascript">
$('#idPraktek').select2({placeholder: "Pilh Tempat Praktek...", width: '100%'});
</script>
</body>
</html>
