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

	$query = mysqli_query($con, "select * from customer   where email='$user' and password='$pass1'   and status='Active'") or die(mysqli_error($con));
	$row = mysqli_fetch_array($query);

	$id = $row['cid'];
	$name = $row['Name'];
	$_SESSION['id'] = $id;
	$_SESSION['name'] = $name;
	$_SESSION['UserType'] = 'customer';
	$counter = mysqli_num_rows($query);

	if ($counter == 0) {
		echo "<script type='text/javascript'>alert('Invalid Username or Password!');
	  document.location='customerhome.php'</script>";
	} elseif ($counter > 0) {

		echo "<script type='text/javascript'>document.location='Customer/home.php'</script>";
	}
}
?>