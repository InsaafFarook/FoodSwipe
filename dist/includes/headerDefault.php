<?php
//session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
date_default_timezone_set("Asia/Manila"); 
?>
<?php
include('../dist/includes/dbcon.php');

 
?>

 



 <header class="main-header">

    <!-- Logo -->
    <a href="home.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>B</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">User:   <?php echo $_SESSION['name'];?>  </span>
	  
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="logo-lg"><b><?php include('title.php'); ?>   </b> </span>
       
      </a>

      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
 
	 
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
           
 
         <script src="../dist/js/date_time.js"></script>          
        <b><span id="date_time" class="pull-right"></span></b>
         <font color="red">ONLINE : </font><script type="text/javascript">window.onload = date_time('date_time');</script>   
 
             
            </a>
		 
          </li>
           
          
        </ul>
      </div>

    </nav>
	
	
	
	
  </header>




	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  