 

?>

		<?php
 include('../dist/includes/dbcon.php');
		
		$t_id = $_GET['id'];
		
		$con->query("UPDATE transaction SET order_stat = '2' WHERE transaction_id = '$t_id'") or die(mysqli_error());
						
		 
		$query2 = $con->query("SELECT * FROM transaction_detail LEFT JOIN product ON product.prod_id = transaction_detail.product_id WHERE transaction_detail.transaction_id = '$t_id'") or die (mysqli_error());
		while($row = $query2->fetch_array()){
		
		$pid = $row['product_id'];
		$oqty = $row['order_qty'];
		
		$query3 = $con->query("SELECT * FROM product WHERE prod_id = '$pid'") or die (mysqli_error());
		$row3 = $query3->fetch_array();
		
		$stck = $row3['Qty']; 
		
		$stck_out = $stck - $oqty;
		
		$query = $con->query("UPDATE product SET Qty = '$stck_out' WHERE prod_id = '$pid'") or die(mysqli_error());
		}
		header("location: orders.php");	
		
		?>