<?php session_start();
if (empty($_SESSION['id'])) :
  header('Location:../index.php');
endif;
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Complaints| <?php include('../dist/includes/title.php'); ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <style>

  </style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <?php include('../dist/includes/header.php');
    include('../dist/includes/headerDefault.php');
    include('../dist/includes/dbcon.php');
    ?>

    <div class="content-wrapper">
      <section class="content-header">
        <br />
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
          <li class="active">Complaints</li>
        </ol>
      </section>

      <?php
      $id = $_SESSION['id'];
      $query = mysqli_query($con, "select * from user where user_id='$id'") or die(mysqli_error());
      $row = mysqli_fetch_array($query);
      ?>

      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-primary">
              <div class="box-header">
                <h3 class="box-title">Send Complaints</h3>
              </div>
              
              <div class="box-body">
                <!-- Date range -->
                <form id="formE" method="post" action="compaintsAdd.php" onsubmit="return myFunction()">
                  <div class="form-group">
                    <label for="date">Complaint Title</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" name="Title" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  
                  <div class="form-group">
                    <label for="date">Complaint in details</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" name="Message" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->

                  <div class="form-group">
                    <div class="input-group">
                      <input class="btn btn-primary" type="submit" value="Send">
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
  <?php include('../dist/includes/footer.php'); ?>
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
    $(function() {
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

</body>

</html>