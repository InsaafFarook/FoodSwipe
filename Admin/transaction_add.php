<?php 
session_start();
$id=$_SESSION['id'];
$branch=$_SESSION['branch'];	
include('../dist/includes/dbcon.php');
$ftxt = $_POST['qty']; 
$getInti = $_POST['prod_name'];
$query1=mysqli_query($con,"select * from tools where prod_id='$getInti'")or die(mysqli_error());
$row1=mysqli_fetch_array($query1);
$zygotwtty=$row1['prod_qty'];	 
if ($zygotwtty > $ftxt)
{ 
$cid = $_POST['cid'];
	$name = $_POST['prod_name'];
	 $qty = $_POST['qty'];
		
			
		$query=mysqli_query($con,"select prod_price,prod_id from tools where prod_id='$name'")or die(mysqli_error());
		$row=mysqli_fetch_array($query);
		$price=$row['prod_price'];
		
		$query1=mysqli_query($con,"select * from temp_trans where prod_id='$name' and branch_id='$branch'")or die(mysqli_error());
		$count=mysqli_num_rows($query1);
		
		$total=$price*$qty;
		
		if ($count>0){
			mysqli_query($con,"update temp_trans set qty=qty+'$qty',price=price+'$total' where prod_id='$name' and branch_id='$branch'")or die(mysqli_error());
	
		}
		else{
			mysqli_query($con,"INSERT INTO temp_trans(prod_id,qty,price,branch_id) VALUES('$name','$qty','$price','$branch')")or die(mysqli_error($con));
		}

	
		echo "<script>document.location='Tool_Request.php?cid=$cid'</script>";  
}
else

{
					 	 
 echo "<script type= 'text/javascript'> alert('No Stock');</script>";
 	echo "<script>document.location='Tool_Request.php?cid=$cid'</script>";  
}
 
?>