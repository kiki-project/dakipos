<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Daftar</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte3/dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte3/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/style.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">

  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Buat akun baru</p>

      <form action="<?php echo base_url(); ?>simpan-daftar" method="post">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Nama Lengkap" name="name">
        </div>
        <div class="form-group has-feedback">
          <input type="email" class="form-control" placeholder="Email" name="username">
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" name="password" id="pass">
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Masukan ulang password" name="repassword" id="repass" oninput="cek_pass(this.value)">
           <div id="repass-inv" class="invalid-feedback">
	        Password tidak sesuai
	      </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block btn-flat form-control bg-color1">Daftar</button><br>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <span>Sudah punya akun?&nbsp;</span><a href="<?php echo base_url(); ?>login" class="text-center">Login</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/adminlte3/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/adminlte3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>assets/adminlte3/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass   : 'iradio_square-blue',
      increaseArea : '20%' // optional
    })
  })

  function cek_pass(a){
	var pass = document.getElementById('pass').value
	if (pass != a) {
		$('#repass').addClass('is-invalid');
	}else{
		$('#repass').removeClass('is-invalid');
	}
  }
</script>
</body>
</html>
