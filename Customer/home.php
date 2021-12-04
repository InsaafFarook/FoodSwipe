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
  <title>Dashboard | <?php include('../dist/includes/title.php'); ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../plugins/select2/select2.min.css">
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <style>
    .col-lg-3 {
      margin: 50px 0px;
    }
  </style>
</head>

<body class="hold-transition skin-blue sidebar-mini" onload="myFunction()">
  <div class="wrapper">
    <?php include('../dist/includes/header.php');
    include('../dist/includes/headerDefault.php');
    include('../dist/includes/dbcon.php');
    ?>

    <div class="content-wrapper">
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Home</h3>
                <div align="right"> User : <?php echo $_SESSION['name']; ?> </div>
              </div>
              <div class="box-body">
                <div class="row">
                  <p align=center style='margin-bottom:0in;margin-bottom:.0001pt;
                  text-align:center;line-height:normal'><b><span style='font-size:14.0pt;
                  font-family:"Times New Roman","serif"'><img width=1100 height=500 id="Picture 1" src="../dist/uploads/4.jpg"></span></b>
                  </p>
                </div>
              </div>
            </div>
          </div>
      </section>
    </div>
  </div>

  <?php include('../dist/includes/footer.php'); ?>
  </div><!-- ./wrapper -->

  <script type="text/javascript" src="autosum.js"></script>

  <!-- jQuery 2.1.4 -->
  <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <script src="../dist/js/jquery.min.js"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="../plugins/select2/select2.full.min.js"></script>
  <!-- SlimScroll -->
  <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="../plugins/fastclick/fastclick.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/app.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../dist/js/demo.js"></script>
  <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>

</body>

</html>