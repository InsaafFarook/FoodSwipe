<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
include('../dist/includes/dbcon.php');


	$id = $_POST['id'];
	$Name =$_POST['Name'];
	$address =$_POST['address'];
	$txtTell = $_POST['txtTell'];
	$Email = $_POST['Email'];
	$Status = $_POST['Status'];



	mysqli_query($con,"update 
	 customer set Name='$Name',address='$address',contact='$txtTell',email='$Email',status='$Status' where cid='$id'")or die(mysqli_error());
	echo "<script type='text/javascript'>alert('Successfully updated  Customer details!');</script>";
	echo "<script>document.location='customerlist.php'</script>";  

	
?>
