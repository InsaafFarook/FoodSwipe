<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	$name =$_POST['prod_name'];
	$price = $_POST['prod_price'];
	$category = $_POST['category'];
	$serial = $_POST['serial'];
		$Qty = $_POST['Qty'];
	$desc = $_POST['desc'];
	
	$pic = $_FILES["image"]["name"];
			if ($pic=="")
			{	
				if ($_POST['image1']<>""){
					$pic=$_POST['image1'];
				}
				else
					$pic="default.gif";
			}
			else
			{
				$pic = $_FILES["image"]["name"];
				$type = $_FILES["image"]["type"];
				$size = $_FILES["image"]["size"];
				$temp = $_FILES["image"]["tmp_name"];
				$error = $_FILES["image"]["error"];
			
				if ($error > 0){
					die("Error uploading file! Code $error.");
					}
				else{
					if($size > 100000000000) //conditions for the file
						{
						die("Format is not allowed or file size is too big!");
						}
				else
				      {
					move_uploaded_file($temp, "../dist/uploads/".$pic);
				      }
					}
			
			}
			
	mysqli_query($con,"update product set prod_name='$name',prod_price='$price',cat_id='$category',prod_pic='$pic',serial='$serial',prod_desc='$desc',Qty='$Qty' where prod_id='$id'")or die(mysqli_error($con));	


	echo "<script type='text/javascript'>alert('Successfully updated product details!');</script>";
echo "<script>document.location='product.php'</script>";  

	
?>
