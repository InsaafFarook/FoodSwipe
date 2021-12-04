<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
if(empty($_SESSION['UserType'] =='Administrator')):
header('Location:../index.php');
endif;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard | <?php include('../dist/includes/title.php');?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../plugins/select2/select2.min.css">
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <style>
      .col-lg-3{
        margin:50px 0px;
      }
      
    </style>
 </head>

  <body class="hold-transition skin-blue sidebar-mini" onload="myFunction()">
    <div class="wrapper">
 <?php include('../dist/includes/header.php');include('../dist/includes/headerDefault.php');
      include('../dist/includes/dbcon.php');
      ?>

      <div class="content-wrapper">
          <section class="content">
            <div class="row">
			
			
	      <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Dashboard  </h3> 

				<div align="right">  Users : <?php echo $_SESSION['name'];?> </div>
				  
				  
                </div>
                <div class="box-body">
                  <div class="row">
				  

 
<?php
 
    $query=mysqli_query($con,"SELECT * FROM category   ")or die(mysqli_error($con));
    $category=mysqli_num_rows($query); 
                  ?>  


                    <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-green">
                          <div class="inner">
                            <h3>Food categories</h3>
                            <p><?php echo "$category"; ?></p>
                          </div>
                          <div class="icon" style="margin-top:10px">       <i class="glyphicon glyphicon-equalizer"></i>
                          </div>
                          <a href="category.php" class="small-box-footer">
                            View <i class="fa fa-arrow-circle-right"></i>
                          </a>
                        </div>
                      </div>

<?php
 
    $product=mysqli_query($con,"SELECT * FROM product   ")or die(mysqli_error($con));
    $product=mysqli_num_rows($product); 
                  ?>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-red">
                          <div class="inner">
                            <h3>Food items </h3>
                            <p><?php echo "$product"; ?></p>
                          </div>
                          <div class="icon" style="margin-top:10px">
                            <i class="glyphicon glyphicon-tasks"></i>
                          </div>
                          <a href="product.php" class="small-box-footer">
                            View <i class="fa fa-arrow-circle-right"></i>
                          </a>
                        </div>
                      </div>
                      
<?php
 
    $customer=mysqli_query($con,"SELECT * FROM customer   ")or die(mysqli_error($con));
    $customer=mysqli_num_rows($customer); 
                  ?>
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-yellow">
                          <div class="inner">
                            <h3>Customers </h3>
                                 <p><?php echo "$customer"; ?></p>
                          </div>
                          <div class="icon" style="margin-top:10px">
                   
                               <i class="glyphicon glyphicon-user"></i>
                          </div>
                          <a href="customerlist.php" class="small-box-footer">
                            View <i class="fa fa-arrow-circle-right"></i>
                          </a>
                        </div>
                      </div>
                      
			
		 
      
                </div>
         
				
              </div>
            </div>
            
	
			
			
          </div>
	  
            
          </section>
        </div>
      </div> 
      <?php include('../dist/includes/footer.php');?>
    </div><!-- ./wrapper -->
	<script>
    $(function() {
      $(".btn_delete").click(function(){
      var element = $(this);
      var id = element.attr("id");
      var dataString = 'id=' + id;
      if(confirm("Sure you want to delete this item?"))
      {
	$.ajax({
	type: "GET",
	url: "temp_trans_del.php",
	data: dataString,
	success: function(){
		
	      }
	  });
	  
	  $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
	  .animate({ opacity: "hide" }, "slow");
      }
      return false;
      });

      });
    </script>
	
	<script type="text/javascript" src="autosum.js"></script>
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<script src="../dist/js/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../plugins/select2/select2.full.min.js"></script>
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
