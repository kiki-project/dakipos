<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte3/plugins/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte3/dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte3/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte3/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte3/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte3/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte3/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte3/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>assets/adminlte3/plugins/jquery/jquery.min.js"></script>
  <!-- internal -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/style.css">
  <script src="<?php echo base_url(); ?>assets/js/script.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/currency.js"></script>
</head>
<body class="hold-transition sidebar-mini">
  <input type="text" id="base_url" readonly="" class="none" style="display: none;" value="<?php echo base_url(); ?>">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="<?php echo base_url(); ?>assets/adminlte3/#"><i class="fa fa-bars"></i></a>
      </li>
  </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto navbar-rght">
      <li class="nav-item">
        <a href="<?php echo base_url(); ?>logout" class="nav-link"><i class="fa fa-sign-out"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4 bg-color1">
    <!-- Brand Logo -->
    <a href="<?php echo base_url(); ?>" class="brand-link"  style="border:none;">
      <img src="<?php echo base_url(); ?>assets/doc/logo/main_logo.png" alt="Ipos Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">IPos</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex"  style="border:none;">
        <div class="image">
          <img src="<?php echo base_url(); ?>assets/doc/logo/user-icon.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#"><b><?php echo  $this->session->userdata('name'); ?></b></a><br>
          <i><small style="color: #fff;"><?php echo  $this->session->userdata('role_name'); ?></small></i>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <?php 
            foreach ($nav_label as $key) {
              ?>
              <li class="nav-item <?php echo $key->treeview; ?>">
                <a href="<?php echo base_url().$key->path; ?>" class="nav-link">
                  <i class="nav-icon fa <?php echo $key->icon; ?>"></i>
                  <p>
                    <?php echo $key->name; ?>
                    <?php 
                      if ($key->treeview) {
                        echo '<i class="fa fa-angle-left right"></i>';
                      }
                     ?>

                  </p>
                </a>
                <?php if ($key->treeview) {
                  $sub1 = $this->Main->get_modul_sub($key->kode)->result();
                  ?>
                  <ul class="nav nav-treeview" style="background-color: rgba(255,255,255, 0.1);">
                    <?php 
                        foreach ($sub1 as $sb1) {
                          ?>
                            <li class="nav-item">
                              <a href="<?php echo base_url().$sb1->path; ?>" class="nav-link">
                                <i class="nav-icon">&nbsp;&nbsp;</i>
                                <i class="fa <?php echo $sb1->icon; ?> nav-icon"></i>
                                <p><?php echo $sb1->name; ?></p>
                              </a>
                            </li>
                          <?php
                        }
                     ?>
                  </ul>
                  <?php
                } ?>
              </li>
              <?php
            }
            if ($this->session->userdata('user_id') == 1) {
            ?>

          <li class="nav-item has-treeview">
            <a href="<?php echo base_url(); ?>" class="nav-link">
              <i class="nav-icon fa fa-cogs"></i>
              <p>Main Setting<i class="fa fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview" style="background-color: rgba(255,255,255, 0.1);">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>roles-management" class="nav-link">
                  <i class="nav-icon">&nbsp;&nbsp;</i>
                  <i class="fa fa-sitemap nav-icon"></i>
                  <p>Roles Management</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>modules-list" class="nav-link">
                  <i class="nav-icon">&nbsp;&nbsp;</i>
                  <i class="fa fa-book nav-icon"></i>
                  <p>Modules</p>
                </a>
              </li>
            </ul>
          </li>
            <?php
            }
           ?>     
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <div class="content-wrapper">