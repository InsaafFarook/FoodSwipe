<?php
	$timezone = 'Asia/Colombo';
	date_default_timezone_set($timezone);
	 
		  
            $date = new DateTime();
            echo $date->format('l, F jS, Y');
         
 
?>