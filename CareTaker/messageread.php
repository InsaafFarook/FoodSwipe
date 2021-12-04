 

?>

		<?php
		 	      include('../dist/includes/dbcon.php');
		
		$t_id = $_GET['id'];
		
		$con->query("UPDATE complaints SET statusmsg = 'Read' WHERE complaintid = '$t_id'") or die(mysqli_error());
		 
		header("location: compains.php");	
		
		?>