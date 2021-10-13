<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte3/plugins/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte3/dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte3/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/style.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
  
  </div>
  <!-- /.login-logo -->
  <div class="card" style="margin-top: 50%;">
    <div class="card-body login-card-body">
      <p class="login-box-msg"><h2>Login</h2></p>
      <small style="color:red;"><?php echo $this->session->flashdata('msg'); ?></small>
      <form action="<?php echo base_url() ?>cek-login" method="post">
        <div class="form-group has-feedback">
          <div class="input-group ">
            <div class="input-group-prepend">
              <div class="input-group-text"><i class="fa fa-user"></i></div>
            </div>
            <input type="text" class="form-control" name="user_name" placeholder="Username" required="">
          </div>
        </div>
        <div class="form-group has-feedback">
          <div class="input-group ">
            <div class="input-group-prepend">
              <div class="input-group-text"><i class="fa fa-lock"></i></div>
            </div>
            <input type="password" name="password" class="form-control" placeholder="Password" required="">
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block btn-flat bg-color1"><i class="fa fa-sign-in"></i> Masuk</button><br>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/adminlte3/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/adminlte3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>assets/adminlte3/plugins/iCheck/icheck.min.js"></script>

</body>
</html>
