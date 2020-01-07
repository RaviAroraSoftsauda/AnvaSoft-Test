
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url()?>bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>bower_components/font-awesome/css/font-awesome.min.css">
     <link rel="stylesheet" href="<?php echo base_url()?>dist/css/AdminLTE.min.css">
 <style type="text/css">
    .form-box{
      max-width: 500px;
      position: relative;
      margin: 5% auto;
    }
  </style>
</head>

<body>
  <div class="wrapper" style="background-color: #ecf0f5;">
    <div class="container">
      <div class="row">
            <div class="login-box">
              <div class="login-logo"><a href=""><b>ANVASOFT</b></a></div>
               <!--  <div class="login-logo">
                <img src="<?php //echo base_url()?>img/loginlogo/iso-therm-logo.png" alt="User Image"></div> -->
                <div class="login-box-body">
                    <p class="login-box-msg">Login Here</p>
                    <form action="<?php echo site_url('Site/login_admin_submit'); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group has-feedback">
                            <input type="password" class="form-control" required="" name="username" id="username" placeholder="USER PIN">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback"  id="pswrd">
                            <input type="password" id="password-field"  class="form-control" placeholder="Password" name="password" required="">
                              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password skin-black"></span>
                        </div>
                        <div class="row">
                            <center><span style="color:#ff0000;"></span></center>
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
                            </div>
                        </div>
                    </form>
                </div><!-- /.login-box-body -->
            </div><!-- /.login-box -->
        </div>
    </div>
  </div>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
<script type="text/javascript">
  $(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script>
<style type="text/css">
  .field-icon {
  float: right;
  margin-left: -25px;
  margin-top: -25px;
  position: relative;
  z-index: 2;
}
</style>