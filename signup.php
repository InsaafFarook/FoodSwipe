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

<script>

  // Phone number Validation
  function phonenumber() {
    var phoneno = /^\d{10}$/;
    if (document.getElementById("txtTell").value == "") {} else {
      if (document.getElementById("txtTell").value.match(phoneno)) {
        hand();
      } else {
        alert("Enter 10 digit Mobile Number");
        document.getElementById("txtTell").value = "";
        document.getElementById("txtTell").focus() = true;
        return false;
      }
    }
  }

  function hand() {
    var str = document.getElementById("txtTell").value;
    var res = str.substring(0, 2);
    if (res == "07") {
      return true;
    } else {
      alert("Enter 10 digit of Mobile Number start with 07xxxxxxxx");
      document.getElementById("txtTell").value = "";
      document.getElementById("txtTell").focus() = true;
      return false;
    }

  }

  function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
      return false;

    return true;
  }

  // Email Validation
  function ValidateEmail(inputText) {
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (inputText.value.match(mailformat)) {

      document.form1.text1.focus();
      return true;
    } else {
      alert("You have entered an invalid email address...!\nRetype the correct email address...\nHint:\n Some valid email formats are...\n a@b.cd, ab-cd@ef.gh, ab.cd@ef.ghi, abc_def@mail.com");
      document.getElementById("txtEmail").value = "";
      document.form1.text1.focus();
      return false;
    }
  }
  
</script>

<style type="text/css">
  body {
    background-image: url("ar.jpg");
    background-repeat: no-repeat;
    background-size: 2000px 700px;
  }
</style>

<div class="login-box">

  <div class="login-box-body">
    <p class="login-box-msg">Register as New customer</p>
    <div class="box box-primary">
      <div class="box-body">
        <div class="box-body">
          <form method="post" action="customerAdd.php" enctype="multipart/form-data" class="form-horizontal">

            <div class="form-group">
              <label for="date">Name</label>
              <div class="input-group col-md-12">
                <input type="text" class="form-control pull-right" id="Name" name="Name" autocomplete="off" required>
              </div>
            </div>

            <div class="form-group">
              <label for="date">Address</label>
              <div class="input-group col-md-12">
                <textarea class="form-control pull-right" id="Address" name="Address" autocomplete="off" required></textarea>
              </div>
            </div>

            <div class="form-group">
              <label for="date">Mobile Number</label>
              <div class="input-group col-md-12">
                <input type="number" class="form-control" maxlength="10" onkeypress="return isNumberKey(evt)" onchange="phonenumber()" id="txtTell" name="txtTell" autocomplete="off" required>

              </div>
            </div>

            <div class="form-group">
              <label for="date">Email Address</label>
              <div class="input-group col-md-12">
                <input type="email" class="form-control pull-right" onchange="ValidateEmail()" id="email" name="email" autocomplete="off" required>
              </div>
            </div>

            <div class="form-group">
              <label for="date">Password</label>
              <div class="input-group col-md-12">
                <input type="Password" class="form-control pull-right" id="Password" name="Password" autocomplete="off" required>
              </div>
            </div>

            <div class="form-group">
              <button class="btn btn-primary" id="daterange-btn" name="">Register</button>
              <button type="reset" class="btn" id="daterange-btn">Clear</button>

            </div>
          </form>
        </div>
      </div>
    </div>
    <center>
      <button onclick="location.href = 'customerhome.php';" id="myButton" class="float-left submit-button">Login</button>
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