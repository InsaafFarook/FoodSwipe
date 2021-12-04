<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Profile| <?php include('../dist/includes/title.php');?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
 </head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <?php include('../dist/includes/header.php');include('../dist/includes/headerDefault.php');
      include('../dist/includes/dbcon.php');
      ?>

      <div class="content-wrapper">
          <section class="content-header">
           <br/>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
              <li class="active">Account Details</li>
            </ol>
          </section>
        
          <?php
            $id=$_SESSION['id'];
            $query=mysqli_query($con,"select * from user where user_id='$id'")or die(mysqli_error());
            $row=mysqli_fetch_array($query);
          ?>	
          
          <section class="content">
            <div class="row">
	            <div class="col-md-12">
                <div class="box box-primary">
                  <div class="box-header">
                    <h3 class="box-title">My Profile</h3>
                 </div>
                <div class="box-body">
                  <!-- Date range -->
                  <form id = "formE"method="post" action="profile_update.php" onsubmit="return verifyPassword()">
  
                  <div class="form-group">
                    <label for="date">Name</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" value="<?php echo $row['name'];?>" name="name" placeholder="Full Name" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
				  
                  <div class="form-group">
                    <label for="date">Username</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" value="<?php echo $row['username'];?>" name="username" placeholder="Username" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
				  
                  <div class="form-group">
                    <label for="date">New Password</label>
                    <div class="input-group col-md-12">
                      <input type="password" class="form-control pull-right" id="password" name="password" placeholder="Type new password">
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
				  
                  <div class="form-group">
                    <label for="date">Confirm New Password</label>
                    <div class="input-group col-md-12">
                      <input type="password" class="form-control pull-right" id="cfmPassword" name="newpassword" placeholder="Reenter new password">
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
				          
                  <hr>
					
                  <div class="form-group">
                    <label for="date">Enter Old Password</label>
                    <div class="input-group col-md-12">
                      <input type="password" class="form-control pull-right" id="date" name="passwordold" placeholder="Type old password" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <input class = "btn btn-primary" type="submit" value="Submit">
					            <button type="reset" class="btn" id="daterange-btn">Clear</button>
                    </div>
                  </div>
				        </form>

                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
      <?php include('../dist/includes/footer.php');?>
  </div>

    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <script src="../dist/js/app.min.js"></script>
    <script src="../dist/js/demo.js"></script>
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
	<script>
    
function verifyPassword() {
    var pass1 = document.getElementById("password").value;
    var pass2 = document.getElementById("cfmPassword").value;
    var ok = true;
    if (pass1 != pass2) {
        alert("Passwords Do not match");
        document.getElementById("password").style.borderColor = "#E34234";
        document.getElementById("cfmPassword").style.borderColor = "#E34234";
        ok = false;
    }
    else {
        alert("Passwords Match!!!");
    }
    return ok;
}
	</script>
  </body>
</html>
