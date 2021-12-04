<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
include('../dist/includes/dbcon.php');
	 
	$Title =$_POST['Title'];
	$Message =$_POST['Message'];
 	$id = $_SESSION['id'];
	 
	mysqli_query($con,"INSERT INTO complaints(customerid,titile,complaints) VALUES('$id','$Title','$Message')")or die(mysqli_error($con));
 
	echo "<script type='text/javascript'>alert('Successfully  Sent');</script>";
	echo "<script>document.location='compaints.php'</script>";
