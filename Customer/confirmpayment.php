<?php
	include('../dist/includes/dbcon.php');
?>
<?php
	if (isset($_POST['pay_now'])) {
		$cid = $_SESSION['id'];
		$total = $_POST['total'];

		include("random_code.php");
		$t_id = $r_id;

		$date = date('Y-m-d');
		if (isset($_POST['paymenthode'])) {
			$abc = $_POST['paymenthode'];
			if ($abc == "Wallet") {
				//update wallnet
				mysqli_query($con, "update customer set walletbalacne=walletbalacne-'$total' where cid='$cid'") or die(mysqli_error());
			}
		}

		$que = $con->query("INSERT INTO `transaction` (transaction_id, customerid, amount, order_stat, order_date,paytype) VALUES ('$t_id', '$cid', '$total', 'ON HOLD', '$date' ,'$abc')") or die(mysqli_error());

		$p_id = $_POST['pid'];
		$oqty = $_POST['qty'];

		$i = 0;
		foreach ($p_id as &$pro_id) {
			$con->query("INSERT INTO `transaction_detail` (`product_id`, `order_qty`, `transaction_id`) VALUES ('" . ($pro_id) . "', '" . ($oqty[$i]) . "', '" . ($t_id) . "')") or die(mysqli_error());
			$i++;
		}

		echo "<script>window.location = 'Food-View3.php?id=" . $id . "&action=empty'</script>";
		echo "<script>window.location = 'Food-View4.php?tid= +" . $t_id . "'</script>";
		//header ("Location: summary.php?tid=$t_id");


}


?>