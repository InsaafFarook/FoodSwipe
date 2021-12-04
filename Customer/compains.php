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
    <title> Complaints  | <?php include('../dist/includes/title.php');?></title>
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
            <br/>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Customer Complaints     </li>
            </ol>
          </section>
          <section class="content">
            <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Customer Complaints  </h3>
                </div>
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Customer Name </th>
						            <th>Contact</th>
                        <th>Complains</th>
            						<th>Sent Date</th>
            						<th>Status</th>
                
                      </tr>
                    </thead>
                    <tbody>
<?php
  $id = $_SESSION['id'];
		$query=mysqli_query($con,"SELECT * FROM complaints LEFT JOIN customer ON customer.cid = complaints.customerid where cid ='$id' ")or die(mysqli_error($con));
		while($fetch=mysqli_fetch_array($query)){		
?>
  <?php
            {
            $id = $fetch['complaintid'];
        ?>
                      <tr>
                      	<td><?php echo $fetch['Name'];?></td>
                        <td><?php echo $fetch['contact'];?></td>
						            <td> <?php echo $fetch['complaints'];?>  </td>
                        <td> <?php echo $fetch['sentdate'];?> </td>
                        <td> <?php echo $fetch['statusmsg']; }?>  </td>
  
<div id="updateordinancede<?php echo $row['prod_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
	  <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">  Purchase Request</h4>
              </div>
              <div class="modal-body">
			  <form class="form-horizontal" method="post" action="purchase_delete.php" enctype='multipart/form-data'>
        <div class="form-group">
          Are you sure you want to cancel this purchase request?
          <div class="col-lg-9">
            <input type="hidden" class="form-control" id="price" name="pr_id" value="<?php echo $row['pr_id'];?>" readonly>  
          </div>
        </div>
                
				
              </div>
              <div class="modal-footer">
		<button type="submit" class="btn btn-primary">Remove</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
			  </form>
            </div>
			
        </div>
 </div>                
<?php }?>					  
                    </tbody>
                    
                  </table>
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
  </body>
</html>
