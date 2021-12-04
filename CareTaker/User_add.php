<?php 
error_reporting(0);
include('../dist/includes/dbcon.php');

	$UType = $_POST['UType'];
		$Name = $_POST['Name'];
			$UserName = $_POST['UserName'];
			 	$pass = MD5($_POST['password']);
	$query2=mysqli_query($con,"select * from user where username='$UserName'")or die(mysqli_error($con));
		$count=mysqli_num_rows($query2);

		if ($count>0)
		{
			echo "<script type='text/javascript'>alert('UserName already exist!');</script>";
			echo "<script>document.location='users.php'</script>";  
		}
		else
		{			
			mysqli_query($con,"INSERT INTO user(UserType,name,username,password,status,branch_id) VALUES('$UType','$Name','$UserName','$pass','active','1')")or die(mysqli_error($con));

			echo "<script type='text/javascript'>alert('User Successfully Saved!');</script>";
					  echo "<script>document.location='users.php'</script>";  
		}
?>