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
    <title>  Report | <?php include('../dist/includes/title.php');?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker-bs3.css">
  <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="../plugins/iCheck/all.css">
  <link rel="stylesheet" href="../plugins/colorpicker/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="../plugins/timepicker/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="../plugins/select2/select2.min.css">
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <script type="text/javascript" src="../dist/js/jquery.min.js"></script>
<script type="text/javascript" src="../dist/js/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="../dist/css/bootstrap.css" />
 
<script type="text/javascript" src="../plugins/daterangepicker/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="../plugins/daterangepicker/daterangepicker.css" />
    <style type="text/css">
      tr td{
        padding-top:-100px!important;
        border: 1px solid #000;
      }
      @media print {
          .btn-print {
            display:none !important;
          }
      }
    </style>
 </head>
  <body class="hold-transition skin-blue sidebar-mini" >
    <div class="wrapper">
       <?php include('../dist/includes/header.php');include('../dist/includes/headerDefault.php');
      include('../dist/includes/dbcon.php');
      ?>
      <div class="content-wrapper">
        <div class="container">
          <section class="content">
            <div class="col-md-12">
        <div class="box box-primary angel">
        <div class="box-header">
          <h3 class="box-title"> Customer Report      </h3>
        </div>
        <div class="box-body">
         
     
    <div class="col-md-12">
 


 
        
       
                  <h5><b>FOOD SWIPE </h5>  
                 
                  
         
                  
          <a class = "btn btn-success btn-print" href = "" onclick = "window.print()"><i class ="glyphicon glyphicon-print"></i> Print</a>
            
    
      <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        
                      
                        <th>Customer Name </th>
                        <th>Address</th>
                        <th>Contact Number</th>
                        <th>Email</th>     
                        <th>Wallet balance </th>
                        <th>Status</th>
                      
                       
                      </tr>
                    </thead>
                    <tbody>
 

    <?php include('../dist/includes/dbcon.php');
    $query=mysqli_query($con,"select * from  customer")or die(mysqli_error($con));
    $i=1;
    while($row=mysqli_fetch_array($query)){
    $id=$row['cid'];
?>

               
            <tr>
            
            
           <td><?php echo $row['Name'];?> </td>
 
                        <td><?php echo $row['address'];?></td>
                                <td><?php echo $row['contact'];?></td>
            <td><?php echo $row['email'];?></td>

           
               <td><span class="label label-success"><?php echo $row['walletbalacne'];?></span></td>
 
                <td><?php echo $row['status'];?></td>
      
    
                <?php } ?>                       
                      </tr>
    
                    </tbody>
                    <tfoot>
                       
           
          
               
                                
        </tfoot>
       </table>
    </div>
            
          </section>
        </div></div>
          </div>
          <!-- /.box -->       
        </div>
      </div>
      <?php include('../dist/includes/footer.php');?>
    </div>
    <script src="../plugins/jQuery/jQuery-2.2.0.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="../plugins/select2/select2.full.min.js"></script>
  <script src="../plugins/input-mask/jquery.inputmask.js"></script>
  <script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="../plugins/input-mask/jquery.inputmask.extensions.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
  <script src="../plugins/daterangepicker/daterangepicker.js"></script>
  <script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
  <script src="../plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
  <script src="../plugins/timepicker/bootstrap-timepicker.min.js"></script>
  <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <script src="../plugins/iCheck/icheck.min.js"></script>
  <script src="../plugins/fastclick/fastclick.js"></script>
  <script src="../dist/js/app.min.js"></script>
  <script src="../dist/js/demo.js"></script>
    <script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
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
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

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
