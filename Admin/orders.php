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
    <title> My Orders | <?php include('../dist/includes/title.php');?></title>
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
              <li class="active">Food Orders  </li>
            </ol>
          </section>
          <section class="content">
            <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Food   Orders </h3>
                </div>
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Order Date</th>                     
                        <th>Employee </th>
						            <th>Totoal Amount   Ordered</th>
                        <th>Status</th>   
                        <th>Payment Type</th>        						
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
 
		$query=mysqli_query($con,"SELECT * FROM transaction LEFT JOIN customer ON customer.cid = transaction.customerid")or die(mysqli_error($con));
		while($fetch=mysqli_fetch_array($query)){
		
?>
  <?php

          
            {
            $id = $fetch['transaction_id'];
            $amnt = $fetch['amount'];
            $o_stat = $fetch['order_stat'];
            $o_date = $fetch['order_date'];
            $name = $fetch['Name'];
            $payType = $fetch['paytype'];
        ?>
                      <tr>
                        <td><?php echo $fetch['order_date'];?></td>                  	
                        <td><?php echo $fetch['Name'];?></td>
						            <td>Rs-<?php echo $fetch['amount'];?>.00</td>
                        <td><span class="label label-success"> <?php //echo $fetch['order_stat'];
                              if($o_stat  == '0'){
                                echo ("Order Pending");
                              }
                              if($o_stat  == '3'){                           
                                echo ("Order Cencelled");
                              }
                              if($o_stat  == '2'){
                                echo ("Order Confirmed");
                              }
                            ?></span></td>
                        <td><?php echo $payType; ?></td>                            
				                <td><a href="OnlineInvocie.php?tid=<?php echo $id; ?>">View</a>
       
	   <?php
	   
	   if ($o_stat  == '0' ){
	   
          if($o_stat  == 'Confirmed'){

          }elseif($o_stat  == 'Cancelled'){

          }else{
          echo '| <a class="btn btn-mini btn-info" onclick = "confirmationDelete(this); return false;" href="orderconfirm.php?id='.$id.'">Confirm</a> ';
          echo '| <a class="btn btn-mini btn-danger" onclick = "confirmationDelete(this); return false;" href="orderReject.php?id='.$id.'">Cancel</a></td>';
          }}}
          ?>
		  
		  
		  
        </tr>
		  
		  
		  
   <script type = "text/javascript">
  function confirmationDelete(anchor){
    var conf = confirm("Are you sure?");
    if(conf){
      window.location = anchor.attr("href");
    }
  } 
</script>  
 
		  
		  
		  
  
		  
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
