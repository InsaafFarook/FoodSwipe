<?php session_start();?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Recipt | <?php include('../dist/includes/title.php');?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../plugins/select2/select2.min.css">
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
   <style type="text/css">
      tr td{
        padding-top:-10px!important;
        border: 1px solid #000;
      }
      @media print {
          .btn-print {
            display:none !important;
          }
      }
    </style>
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
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Supplier</li>
            </ol>
          </section>
          <section class="content">
            <div class="row">
            
  
            <div class="col-xs-12">
              <div class="box box-primary">
    
                <div class="box-header">
                  <h3 class="box-title">Assets / Tools Request</h3>
                </div><!-- /.box-header -->
				 <div align="right">
				   <a class = "btn btn-success btn-print" href = "" onclick = "window.print()"><i class ="glyphicon glyphicon-print"></i> Print</a>
                </div>
                <div class="box-body">
                 
            
			
			
			
		     <form method="post" action="">
 			            
<?php
include('../dist/includes/dbcon.php');
$id=$_SESSION['id']; //employee id
 $Gotid=$_REQUEST['Gotid'];
  
    $query=mysqli_query($con,"select  *, job_positions.Job as Jobposstion from toolrequest  join  employee on toolrequest.emp_id=employee.id join job_positions on  employee.Job=job_positions.id where toolrequest.sales_id=$Gotid")or die(mysqli_error($con));
      
        $row=mysqli_fetch_array($query);
       
    //    $sales_id=$row['sales_id'];
        $Name=$row['Name'];
        $Jobposstion=$row['Jobposstion'];
        $contact=$row['contact'];
      

        
        

?>    
         

                   <table class="table">
                    <thead>
                      <tr>
                        <th colspan="3"><h5><b><?php include('../dist/includes/title.php');?> </b></h5></th>
                        <th><b><u>REQUEST INVOICE</u></b></th>
                      </tr>
     
                    </thead>
                    <thead>

                      <tr>
                        <th>Employee</th>
                        <th><u><?php echo $Name;?></u></th>
                        <th>Date</th>
                        <th><u><?php echo date("M d, Y");?> Time <?php echo date("h:i A");?></u></th>
                      </tr>
                      <tr>
                        <th>Destination / job </th>
                        <th><u><?php echo $Jobposstion;?></u></th>
                      
                      
                      </tr>
                       
                    </thead>
                  </table>
                  <table class="table" >
                    <thead>
                        
                      <tr style="border: solid 1px #000">
                        <th style="border: solid 1px #000">QTY</th>
                    
                        <th style="border: solid 1px #000">ASSETS / TOOLS</th>
            						<th style="border: solid 1px #000">COST</th>
            						<th style="border: solid 1px #000" class="text-right">ACCOUNT TOTAL COST</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
		$query=mysqli_query($con,"select * from toolrequesitems join tools on toolrequesitems.Tool_id=tools.prod_id  where toolrequesitems.Requested_id='$Gotid'")or die(mysqli_error($con));
			$grand=0;
		while($row=mysqli_fetch_array($query)){
				// $id=$row['temp_trans_id'];
				$total= $row['qty']*$row['price'];
				$grand=$grand+$total;
        
?>
                      <tr>
            						<td><?php echo $row['qty'];?></td>
                         
                        <td class="record"><?php echo $row['prod_name'];?></td>
            						<td><?php echo number_format($row['price'],2);?></td>
            						<td style="text-align:right"><?php echo number_format($total,2);?></td>
                                    
                      </tr>
					  

<?php }?>					
                      <tr>
                        <td></td>
                         
                        <td></td>
                        <td class="text-right">Subtotal</td>
                        <td style="text-align:right"><?php echo number_format($grand,2);?></td>
                      </tr>
                      
                      <tr>
                        <th>Requested by:</th>
                        
                        <th></th>
                        <th></th>

                        <th>_________________________</th>
                      </tr> 
<?php
    $query=mysqli_query($con,"select * from user where user_id='$id'")or die(mysqli_error($con));
    $row=mysqli_fetch_array($query);
 
?>                      
                      <tr>
                        <th><?php echo $row['name'];?></th>
                         
                        <th></th>
                        <th></th>

                        <th>Approved By</th>
                      </tr>  
                    </tbody>
                    
                  </table>
                </div><!-- /.box-body -->
				</div>  
				</form>	
			
			
			
			
			
			
			
			
			
			
			
			
			
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
