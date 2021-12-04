<?php
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
date_default_timezone_set("Asia/Manila"); 
if($_SESSION['UserType']=="Administrator")
{
  include('../dist/includes/Aheader.php');
}
 
	if($_SESSION['UserType']=="customer")
{
include('../dist/includes/Cheader.php');
}
 
 
	if($_SESSION['UserType']=="Taker")
{
include('../dist/includes/Theader.php');
}


?>
