<?php 
session_start();
 
include('../dist/includes/dbcon.php');

 
	$product = $_POST['product'];
 	$customer = $_POST['customer'];
 	$Message = $_POST['Message'];
 
	if(isset($_POST['first'])){
	$pic = "1";
	} if(isset($_POST['secon'])){
	$pic = "2";
	} if(isset($_POST['tri'])){
	$pic = "3";
	} if(isset($_POST['four'])){
	$pic = "4";
	} if(isset($_POST['fiv'])){
	$pic = "5";
	}
  
  	$query2=mysqli_query($con,"select * from starreview where productid='$product' and  reviewBy='$customer' ")or die(mysqli_error($con));
  	$count=mysqli_num_rows($query2);

	if ($count>0){
			echo "<script type='text/javascript'>alert('you have already rated rated for this Food!');</script>";
			echo "<script>document.location='Food-View.php'</script>";  
	} else {	
			mysqli_query($con,"INSERT INTO starreview(productid,reviewBy,review,review2)
			VALUES('$product','$customer','$pic','$Message')")or die(mysqli_error($con));

			echo "<script type='text/javascript'>alert('Review Added!');</script>";
			echo "<script>document.location='Food-View.php'</script>";  
	}
