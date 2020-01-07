<?php
    if(!$this->session->userdata('username'))
    {
     redirect('Site/login');
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ANVASOFT</title>
    <!-- Tell the browser to be responsive to screen width -->
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url()?>bower_components/bootstrap/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="<?php echo base_url()?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
     <link rel="stylesheet" href="<?php echo base_url()?>bower_components/datatables.net-bs/css/datatables.min.css">
   
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url()?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url()?>bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url()?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url()?>plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo base_url()?>bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?php echo base_url()?>plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url()?>bower_components/select2/dist/css/select2.min.css">
 <!--  <link href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css" rel="stylesheet"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url()?>dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
       <!--  <a  class="logo">
          <span class="logo-mini"></span>
          <span class="logo-lg"><img src="<?php //echo base_url()?>img/loginlogo/iso-therm-logo.png" alt="User Image" style="height: 52px;width: 232px;background-color: white;margin-left: -18px;margin-top: -8px;"></span>
        </a> -->
          <a href="index" class="logo">
          <span class="logo-mini"><b>ANVASOFT</b></span>
          <span class="logo-lg"><b>ANVASOFT</b></span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
         <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
		  <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                 <?php echo @$_SESSION['username']; ?>
                </a>

                <ul class="dropdown-menu">
                  <li class="user-header">
                     <img src="<?php echo base_url()?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    
                  </li>
                
                  <li class="user-footer">
                  <!--   <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Change Password</a>
                    </div> -->
                    <div class="pull-right">
                      <a href="<?php echo site_url('Site/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->