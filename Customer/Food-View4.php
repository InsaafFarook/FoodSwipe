<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');   include('../dist/includes/dbcon.php');
endif;
 
?>
			
   
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Food Order  | <?php include('../dist/includes/title.php');?></title>
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
     <?php include('../dist/includes/header.php');include('../dist/includes/headerDefault.php');
      include('../dist/includes/dbcon.php');
      ?>
      <div class="content-wrapper">
          <section class="content-header">
      <div class="box box-default color-palette-box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-tag"></i> Food Request Summary</h3>
        </div>
        <div class="box-body">
		
		
		  <div class="row">
	  
	  
        <div class="col-xs-12">
          <div class="box box-solid">
            <div class="box-header">
              <i class="fa fa-bar-chart-o"></i>

              

              
            </div>
			

	<form method="post" class="well"  style="background-color:#fff; overflow:hidden;">
	<table class="table" >
 
		<tr>
			<th><h5>Quantity</h5></td>
			<th><h5>Food </h5></td>
			<th><h5>Description</h5></td>
			<th><h5>Price</h5></td>
		</tr>

		<?php
		$t_id = $_GET['tid'];
		$query = $con->query("SELECT * FROM transaction WHERE transaction_id = '$t_id'") or die (mysqli_error());
		$fetch = $query->fetch_array();

		$amnt = $fetch['amount'];
		$t_id = $fetch['transaction_id'];

		$query2 = $con->query("SELECT * FROM transaction_detail LEFT JOIN product ON product.prod_id = transaction_detail.product_id WHERE transaction_detail.transaction_id = '$t_id'") or die (mysqli_error());
		while($row = $query2->fetch_array()){

		$pname = $row['prod_name'];
		$psize = $row['prod_desc'];
		$pprice = $row['prod_price'];
		$oqty = $row['order_qty'];

		echo "<tr>";
		echo "<td>".$oqty."</td>";
		echo "<td>".$pname."</td>";
		echo "<td>".$psize."</td>";
		echo "<td>".$pprice."</td>";
		echo "</tr>";
		}
		?>

	</table>
	<legend></legend>
	<h4><span class="label label-success">TOTAL: Rs <?php echo $amnt; ?></span></h4>
	</form>
	<div class='pull-right'>
<div class="">
    <form action="<?php echo $paypal_url ?>" method="post" >
    <input type="hidden" name="business" value="<?php echo $paypal_id; ?>">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="item_name" value="Alphaware Shoes">
    <input type="hidden" name="item_number" value="<?php echo $t_id; ?>">
    <input type="hidden" name="credits" value="510">
    <input type="hidden" name="userid" value="1">
    <input type="hidden" name="amount" value="<?php echo $amnt; ?>">
    <input type="hidden" name="cpp_header_image" value="http://www.phpgang.com/wp-content/uploads/gang.jpg">
    <input type="hidden" name="no_shipping" value="1">
    <input type="hidden" name="currency_code" value="PHP">
    <input type="hidden" name="handling" value="0">
    <input type="hidden" name="cancel_return" value="function/cancel.php">
    <input type="hidden" name="return" value="function/success.php">
     
    </form>
</div>
	</div>
			   </div>
                 
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
	
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
		
		
      </div>
      <!-- /.row -->
	 
          
          </section>
         

    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../plugins/select2/select2.full.min.js"></script>
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <script src="../dist/js/app.min.js"></script>
    <script src="../dist/js/demo.js"></script>
 
    
     
  </body>
</html>
