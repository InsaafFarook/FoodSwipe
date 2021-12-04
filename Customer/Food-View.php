<?php session_start();
if (empty($_SESSION['id'])) :
  header('Location:../index.php');
  include('../dist/includes/dbcon.php');
endif;

?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Product | <?php include('../dist/includes/title.php'); ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../plugins/select2/select2.min.css">
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
        <div class="box box-default color-palette-box">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-tag"></i> Food Menu Cart</h3>
          </div>
          <div class="row">
            <div class="box-body">
              <div class="col-xs-12">
                <form method="post">
                  <select class="form-control select2" name="FoodCategory" required>
                    <option selected disabled value="">Select Food Type </option>
                    <?php
                    include('../dist/includes/dbcon.php');
                    $query2 = mysqli_query($con, "select * from category") or die(mysqli_error());
                    while ($row = mysqli_fetch_array($query2)) {
                    ?>
                    <option value="<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name'] . ""; ?></option>
                    <?php } ?>
                  </select>
                  <br /> <br />
                  <div class="form-group">
                    <button class="btn btn-small btn-primary" id="daterange-btn" name="Search" type="submit">Search</a></button>
                    <button onclick="location.href = 'Food-View.php';" id="myButton" class="btn btn-small btn- ">All</button>
                  </div>
                </form>
              </div>
              <div class="col-xs-12">
                <div class="box box-solid">
                  <div class="box-header">
                    <i class="fa fa-bar-chart-o"></i>
                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-default btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <?php
                  if (isset($_POST['Search'])) {
                    $FoodCategory = $_POST['FoodCategory'];

                    $query = $con->query("SELECT * FROM product  join category on product.cat_id=category.cat_id where category.cat_id='$FoodCategory' ORDER BY prod_id DESC") or die(mysqli_error($con));

                    while ($fetch = $query->fetch_array()) {
                      $pid = $fetch['prod_id'];
                      $query1 = $con->query("SELECT * FROM product WHERE prod_id = '$pid'") or die(mysqli_error());
                      $rows = $query1->fetch_array(); {    ?>

                        <div class="box-body">
                          <div class="row">
                            <div class="col-xs-6 col-md-3 text-center">
                            <?php
                            echo "<br />";
                            echo "<a class='text-info' style='position:absolute; margin-top:-30px; text-indent:15px;'>  <span class='badge'>" . $fetch['prod_name'] . " </span>   </a>";
                            echo "<a href='Food-View2.php?id=" . $fetch['prod_id'] . "'><img   src='../dist/uploads/" . $fetch['prod_pic'] . "' height = '150px' width = '150px'></a>";
                            echo "<br />";
                            echo " <span> " . $fetch['prod_desc'] . " </span> ";
                            echo "<br />";
                            echo " <span class='label label-primary'>Rs ". $fetch['prod_price'] . "</span>";
                            echo "<br />";
                            echo "<br />";
                            echo "</div>";
                          }
                        }
                      } else {

                        //load all
                        $query = $con->query("SELECT * FROM product  join category on product.cat_id=category.cat_id ") or die(mysqli_error($con));

                        while ($fetch = $query->fetch_array()) {
                          $pid = $fetch['prod_id'];
                          $query1 = $con->query("SELECT * FROM product WHERE prod_id = '$pid'") or die(mysqli_error());
                          $rows = $query1->fetch_array(); {   ?>

                              <div class="box-body">
                                <div class="row">
                                  <div class="col-xs-6 col-md-3 text-center">
                                    <?php
                                    echo "<br />";
                                    echo "<a class='text-info' style='position:absolute; margin-top:-30px; text-indent:15px;'>  <span class='badge'>" . $fetch['prod_name'] . " </span>   </a>";
                                    echo "<a href='Food-View2.php?id=" . $fetch['prod_id'] . "'><img   src='../dist/uploads/" . $fetch['prod_pic'] . "' height = '150px' width = '150px'></a>";
                                    echo "<br />";
                                    echo " <span> " . $fetch['prod_desc'] . " </span> ";
                                    echo "<br />";
                                    echo " <span class='label label-primary'>Rs ". $fetch['prod_price'] . "</span>";
                                    echo "<br />";
                                    echo "<br />";
                                    echo "</div>";
                          }
                        }
                      }
                      ?>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
      </section>

      <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
      <script src="../bootstrap/js/bootstrap.min.js"></script>
      <script src="../plugins/select2/select2.full.min.js"></script>
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
      <script>
        $(function() {
          //Initialize Select2 Elements
          $(".select2").select2();

          //Datemask dd/mm/yyyy
          $("#datemask").inputmask("dd/mm/yyyy", {
            "placeholder": "dd/mm/yyyy"
          });
          //Datemask2 mm/dd/yyyy
          $("#datemask2").inputmask("mm/dd/yyyy", {
            "placeholder": "mm/dd/yyyy"
          });
          //Money Euro
          $("[data-mask]").inputmask();

          //Date range picker
          $('#reservation').daterangepicker();
          //Date range picker with time picker
          $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            format: 'MM/DD/YYYY h:mm A'
          });
          //Date range as a button
          $('#daterange-btn').daterangepicker({
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate: moment()
            },
            function(start, end) {
              $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }
          );

          //iCheck for checkbox and radio inputs
          $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
          });
          //Red color scheme for iCheck
          $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
          });
          //Flat red color scheme for iCheck
          $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
          });

          //Colorpicker
          $(".my-colorpicker1").colorpicker();
          //color picker with addon
          $(".my-colorpicker2").colorpicker();

          //Timepicker
          $(".timepicker").timepicker({
            showInputs: false
          });
        });
      </script>
</body>

</html>