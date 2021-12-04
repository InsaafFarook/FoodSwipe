<?php
 
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
date_default_timezone_set("Asia/Manila"); 
?>
<?php
include('../dist/includes/dbcon.php');
 
?>


  <header class="main-header">
         <aside class="main-sidebar">
    <section class="sidebar">
 


      <ul class="sidebar-menu">
   
		  <li class="header"> Privilege :  Care Taker  </li>
        <li class="active treeview">


		   <li class="treeview">
         <a href="home.php" class="dropdown-toggle">
                      <i class="glyphicon glyphicon-scale text-green"></i>
                  Home 
                    </a> 
 
        </li>
        

 
 

 
	 
        </li>
 
 
    
       
 

				 

   <li class="treeview">
         <a href="product.php" class="dropdown-toggle">
                      <i class="glyphicon glyphicon-list text-green"></i>
                  Food and Beverage
                    </a> 
 
        </li>

		
		   <li class="treeview">
         <a href="orders.php" class="dropdown-toggle">
                      <i class="glyphicon glyphicon-stats text-green"></i>
                  Food Orders 
                    </a> 
 
        </li>


 
 
   <li class="dropdown notifications-menu">
   
                    <a href="wallet.php">
                 
                        <i class="glyphicon glyphicon-link text-green"></i>Wallet Recharge
                    </a>
                   
                  </li>
    
 
 
                
				  
			    <li class="treeview">
              
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                       <i class="glyphicon glyphicon-user text-green"></i>   Customers
                      
                    </a>
                   <ul class="treeview-menu">
                      <li>
             
					    
						 
						  <li>
                            <a href="customer.php">
                            <i class="fa fa-circle-o"></i> New Customer
                            </a>
                          </li>
						 
						   <li>
                            <a href="customerlist.php">
                             <i class="fa fa-circle-o"></i>     Customer List
                            </a>
                          </li>
						         
                       
                      </li>
                     
                    </ul>
                  </li>	  
				  
  
		 
 
				   <li class="dropdown notifications-menu">
   
                    <a href="profile.php">
                 
                        <i class="glyphicon glyphicon-cog text-green"></i>My Account
                    </a>
                   
                  </li>
 
 
 
                  <li class="">
                    <a href="logout.php" class="dropdown-toggle">
                      <i class="glyphicon glyphicon-log-in text-green"></i> Logout 
                      
                    </a>
      
      
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
      </header>