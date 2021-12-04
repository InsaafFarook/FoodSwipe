<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
include('../dist/includes/dbcon.php');
	 
	 	$customer =$_POST['customer'];
	$Ammount =$_POST['Ammount'];

	 

mysqli_query($con,"INSERT INTO wallet(customerid,balance) VALUES('$customer','$Ammount')")or die(mysqli_error($con));

//update 	 wallet 
	mysqli_query($con,"update customer set walletbalacne=walletbalacne+'$Ammount' where cid='$customer'")or die(mysqli_error());
	echo "<script type='text/javascript'>alert('wallet Successfully  updated');</script>";
	echo "<script>document.location='wallet.php'</script>";  	
?>
