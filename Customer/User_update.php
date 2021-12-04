<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	 
	$UserType =$_POST['UserType'];
	$status =$_POST['status'];
		$UName = $_POST['UName'];
	$Password = MD5($_POST['password']);
	mysqli_query($con,"update user set UserType='$UserType',status='$status',username='$UName',password='$Password' where user_id='$id'")or die(mysqli_error());
	echo "<script type='text/javascript'>alert('Successfully updated');</script>";
	echo "<script>document.location='users.php'</script>";  	
?>
