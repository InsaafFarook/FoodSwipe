<?php 
session_start();
include('../dist/includes/dbcon.php');
	 
 
	$Name = $_POST['Name'];
	$Address = $_POST['Address'];
	$txtTell = $_POST['txtTell'];
	$email = $_POST['email'];
 
  $Password2 = MD5($_POST['Password']);
 
 {
	   $query2=mysqli_query($con,"select * from  customer where contact='$txtTell' ")or die(mysqli_error($con));
		$count=mysqli_num_rows($query2);
 
		if ($count>0)
		{
			echo "<script type='text/javascript'>alert('Mobile Number already exist!');</script>";
			echo "<script>document.location='customer.php'</script>";  
		}
		else
	 
		
		{	
			mysqli_query($con,"INSERT INTO  customer(Name,address,contact,email,Password) 
		VALUES('$Name','$Address','$txtTell','$email','$Password2')")or die(mysqli_error($con));

	  
		echo "<script type='text/javascript'>alert('Successfully added new  Customer!');</script>";
		 	echo "<script>document.location='customer.php'</script>";    
		}
 }
?>