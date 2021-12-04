<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Customer Login - <?php include('dist/includes/title.php'); ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
</head>

<style type="text/css">
  body {
    background-image: url("ar.jpg");
    background-repeat: no-repeat;
    background-size: 1920px 900px;
  }
</style>

<div class="login-box">
  <div class="login-logo">
    <h1>FOOD SWIPE</h1>
  </div><!-- /.login-logo -->

  <div class="login-box-body">
    <p class="login-box-msg">Customer Login</p>
    <form action="customerlogin.php" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="username" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
    
      <div class="row">
        <div class="col-xs-6 pull-right">
          <button type="reset" class="btn btn-block btn-flat">CLEAR</button>
        </div>
        <div class="col-xs-6 pull-right">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="login" default>LOGIN</button>
        </div>
      </div>
    </form>

    <br />
    <br />

    <center>
      <button onclick="location.href = 'signup.php';" id="myButton" class="float-left submit-button">Register as New customer here </button>
    </center>
  </div>
</div>
</div>

<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="plugins/fastclick/fastclick.min.js"></script>
<script src="dist/js/app.min.js"></script>
<script src="dist/js/demo.js"></script>
</body>

</html>