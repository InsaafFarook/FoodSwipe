<?php session_start();
if (empty($_SESSION['id'])) :
	header('Location:../index.php');
	include('../dist/includes/dbcon.php');
endif;
error_reporting(0);
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Food order | <?php include('../dist/includes/title.php'); ?></title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="../plugins/select2/select2.min.css">
	<link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
	<style>

	</style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<?php include('../dist/includes/header.php');
		include('../dist/includes/headerDefault.php');
		include('../dist/includes/dbcon.php');
		?>
		<div class="content-wrapper">
			<section class="content-header">
				<div class="box box-default color-palette-box">
					<div class="box-header with-border">
						<h3 class="box-title"><i class="fa fa-tag"></i>Food Order Confirmation</h3>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-xs-12">
								<div class="box box-solid">
									<div class="box-header">
										<i class="fa fa-bar-chart-o"></i>
									</div>

									<form method="post" class="well" style="background-color:#fff;">
										<table class="table">

											<tr>
												<th>Image</td>
												<th>Food </th>
												<th>Description</th>
												<th>Available Qty</th>
												<th>Quantity</th>
												<th>Unit Price</th>
												<th>Update Quantity</th>
												<th>Total</th>
											</tr>

											<?php

											if (isset($_GET['id']))
												$id = $_GET['id'];
											else
												$id = 1;
											if (isset($_GET['action']))
												$action = $_GET['action'];
											else
												$action = "empty";

											switch ($action) {

												case "view":
													if (isset($_SESSION['cart'][$id]))
														$_SESSION['cart'][$id];
													break;
												case "add":
													if (isset($_SESSION['cart'][$id]))
														$_SESSION['cart'][$id]++;
													else
														$_SESSION['cart'][$id] = 1;
													break;
												case "remove":
													if (isset($_SESSION['cart'][$id])) {
														$_SESSION['cart'][$id]--;
														if ($_SESSION['cart'][$id] == 0)
															unset($_SESSION['cart'][$id]);
													}
													break;
												case "empty":
													unset($_SESSION['cart']);
													break;
											}
											if (isset($_SESSION['cart'])) {

												$total = 0;
												foreach ($_SESSION['cart'] as $id => $x) {
													$result = $con->query("Select * from product where prod_id=$id");
													$myrow = $result->fetch_array();
													$name = $myrow['prod_name'];
													$name = substr($name, 0, 40);
													$price = $myrow['prod_price'];
													$image = $myrow['prod_pic'];
													$product_size = $myrow['prod_desc'];
													$availableQty = $myrow['Qty'];
													$line_cost = $price * $x;
													$total = $total + $line_cost;


													echo "<tr class='table'>";
													echo "<td><h4><img height='70px' width='70px' src='../dist/uploads/" . $image . "'></h4></td>";
													echo "<td><h4><input type='hidden' required value='" . $id . "' name='pid[]'> " . $name . "</h4></td>";													
													echo "<td><h4>" . $product_size . "</h4></td>";
													echo "<td><h4>" . $availableQty . "</h4></td>";
													echo "<td><h4><input type='hidden' required value='" . $x . "' name='qty[]'> " . $x . "</h4></td>";
													echo "<td><h4>" . $price . "</h4></td>";
													echo "<td><h4><a href='Food-View3.php?id=" . $id . "&action=add'><i class='glyphicon glyphicon-plus-sign'></i></a> 
		 <a href='Food-View3.php?id=" . $id . "&action=remove'><i class='glyphicon glyphicon-minus-sign'></i></a></td>";
													echo "<td><strong><h3>Rs " . $line_cost . "</h3></strong>";
													echo "</tr>";
												}

												echo "<tr>";
												echo "<td></td>";
												echo "<td></td>";
												echo "<td></td>";
												echo "<td></td>";
												echo "<td><h2>TOTAL:</h2></td>";
												echo "<td><strong><input type='hidden' value='" . $total . "' required name='total'><h2 class='text-danger'><span class='label label-success'>Rs " . $total . "</h2></span></strong></td>";
												echo "<td></td>";
												echo "<td><a class='btn btn-danger btn-sm pull-right' href='Food-View3.php?id=" . $id . "&action=empty'><i class='fa fa-trash-o'></i> Clear All</a></td>";
												echo "</tr>";
											} else
												echo "<font color='#111' class='alert alert-error' style='float:right'>Clear All</font>";

											?>
										</table>

										<a href='Food-View.php' class='btn btn-warning'>View Food Menu</a>

										<div class='pull-right'>

											<?php
											$id = $_SESSION['id'];
											$query = mysqli_query($con, "select * from customer where walletbalacne >= '$total' and cid ='$id'  ") or die(mysqli_error());
											while ($row = mysqli_fetch_array($query)) {

											?>
												<p>Please select your payment methode:</p>
												<input type="radio" id="Wallet" name="paymenthode" value="Wallet">
												<label for="wallet">Wallet</label><br>
											<?php }
											?>
											<input type="radio" id="Cash" name="paymenthode" value="Cash" checked="checked">
											<label for="cash">Cash</label><br>

											<?php
												if (isset($_GET['id']))
												{
													$id = $_GET['id'];
												}
												$result = $con->query("Select * from product where prod_id=$id");
												$myrow = $result->fetch_array();
												$qty = $myrow['Qty'];

												if($x>$qty)
													echo "<button name='pay_now' type='submit' disabled class='btn btn-primary' >CONFIRM</button>";
												else
												echo "<button name='pay_now' type='submit' class='btn btn-primary' >CONFIRM</button>";
												include("confirmpayment.php");
											?>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
		</div>

		</section>

		<script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
		<script src="../bootstrap/js/bootstrap.min.js"></script>
		<script src="../plugins/select2/select2.full.min.js"></script>
		<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
		<script src="../plugins/fastclick/fastclick.min.js"></script>
		<script src="../dist/js/app.min.js"></script>
		<script src="../dist/js/demo.js"></script>

</body>

</html>