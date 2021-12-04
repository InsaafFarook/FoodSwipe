<?php
include("../dist/includes/dbcon.php");
$id = $_REQUEST['id'];
$cid = $_POST['cid'];
$result=mysqli_query($con,"DELETE FROM temp_trans WHERE temp_trans_id ='$id'")
	or die(mysqli_error());
	
echo "<script>document.location='Tool_Request.php?cid=$cid'</script>";  
?>