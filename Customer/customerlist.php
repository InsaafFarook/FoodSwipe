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
  <title> Customers | <?php include('../dist/includes/title.php'); ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
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
        <br />
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
          <li class="active">Profile</li>
        </ol>
      </section>

      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box box-primary">
              <div class="box-header">
                <h3 class="box-title">Profile</h3>
              </div>
              
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Customer Name </th>
                      <th>Address</th>
                      <th>Contact</th>                  
                      <th>Email</th>
                      <th>Wallet balance </th>
                      <th>Status</th>
                      <th>Manage</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                    $cid = $_SESSION['id'];
                    $query = mysqli_query($con, "select * from  customer where cid ='$cid'") or die(mysqli_error($con));
                    $i = 1;
                    while ($row = mysqli_fetch_array($query)) {
                      $id = $row['cid'];
                    ?>
                      <tr>
                        <td><?php echo $row['Name']; ?> </td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['contact']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><span class="label label-success"><?php echo $row['walletbalacne']; ?></span></td>
                        <td><?php echo $row['status']; ?></td>
                        <td>
                          <a href="#updateordinance<?php echo $row['cid']; ?>" data-target="#updateordinance<?php echo $row['cid']; ?>" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-erase text-blue"></i></a>
                        </td>
                      </tr>
                      
                      <div id="updateordinance<?php echo $row['cid']; ?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                          <div class="modal-content" style="height:auto">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                              <h4 class="modal-title">Update Customrt Details</h4>
                            </div>
                            <div class="modal-body">
                              <form class="form-horizontal" method="post" action="Customerupdate.php" enctype='multipart/form-data'>
                                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['cid']; ?>" required>
                                <div class="form-group">
                                  <label for="date"> Name</label>
                                  <div class="input-group col-md-12">
                                    <input type="text" class="form-control pull-right" id="Name" name="Name" value="<?php echo $row['Name']; ?>" autocomplete="off" required>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label for="date"> Address</label>
                                  <div class="input-group col-md-12">
                                    <input type="text" class="form-control pull-right" id="address" name="address" value="<?php echo $row['address']; ?>" autocomplete="off" required>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label for="date"> Mobile Number</label>
                                  <div class="input-group col-md-12">
                                    <input type="number" class="form-control" maxlength="10" onkeypress="return isNumberKey(evt)" onchange="phonenumber()" id="txtTell" name="txtTell" autocomplete="off" required value="<?php echo $row['contact']; ?>">

                                  </div>
                                </div>

                                <div class="form-group">
                                  <label for="date"> Email </label>
                                  <div class="input-group col-md-12">
                                    <input value="<?php echo $row['email']; ?>" type="Email" class="form-control pull-right" id="Email" name="Email" autocomplete="off" required>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label for="date"> Status </label>
                                  <div class="input-group col-md-12">
                                    <select name="Status" class="form-control select2" required="required">
                                      <option selected disabled> <?php echo $row['status']; ?></option>

                                      <option value="Active">Active </option>
                                      <option value="InActive">InActive </option>
                                    </select>
                                  </div>
                                </div>

                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary">Save </button>
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      <?php $i++;
                    } ?>
                  </tbody>
                </table>
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