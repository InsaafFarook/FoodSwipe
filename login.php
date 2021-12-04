<?php session_start();
//error_reporting(0);
?>
<!DOCTYPE html>
<html>


<?php
include('dist/includes/dbcon.php');
if (isset($_POST['login'])) {
	$user_unsafe = $_POST['username'];
	$pass_unsafe = MD5($_POST['password']);
	$user = mysqli_real_escape_string($con, $user_unsafe);
	$pass1 = mysqli_real_escape_string($con, $pass_unsafe);
	date_default_timezone_set('Asia/Manila');

	$date = date("Y-m-d H:i:s");

	$query = mysqli_query($con, "select * from user   where username='$user' and password='$pass1'   and status='active'") or die(mysqli_error($con));
	$row = mysqli_fetch_array($query);
	$UserType = $row['UserType'];

	$_SESSION['UserType'] = $UserType;
	$id = $row['user_id'];
	$name = $row['name'];
	$counter = mysqli_num_rows($query);
	$id = $row['user_id'];

	if ($counter == 0) {
		echo "<script type='text/javascript'>alert('Invalid Username or Password!');
	  document.location='index.php'</script>";
	} elseif ($counter > 0) {
		$_SESSION['id'] = $id;
		$_SESSION['name'] = $name;

		$remarks = "has logged in the system at ";
		mysqli_query($con, "INSERT INTO history_log(user_id,action,date) VALUES('$id','$remarks','$date')") or die(mysqli_error($con));

		if ($UserType == 'Administrator') {
			echo "<script type='text/javascript'>document.location='Admin/home.php'</script>";
		}

		if ($UserType == 'Taker') {
			echo "<script type='text/javascript'>document.location='CareTaker/home.php'</script>";
		}
	}
}
?>