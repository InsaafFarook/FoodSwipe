		
 
?>

 
		<?php
		      include('../dist/includes/dbcon.php');
		
		$t_id = $_GET['id'];
		
		$con->query("UPDATE transaction SET order_stat = '3' WHERE transaction_id = '$t_id'") or die(mysqli_error());
								
		header("location: orders.php");	
		
		?>