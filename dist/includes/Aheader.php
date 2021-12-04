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
           <li class="header"> Privilege :  Administrator    </li>
        <li class="active treeview">


		   <li class="treeview">
         <a href="home.php" class="dropdown-toggle">
                      <i class="glyphicon glyphicon-scale text-green"></i>
                  Home 
                    </a> 
 
        </li>
        

 
 

 
	 
        </li>
 
 
    
           <li class="dropdown notifications-menu">
   
                    <a href="customerlist.php">
                 
                        <i class="glyphicon glyphicon-user text-green"></i>Customers  
                    </a>
                   
                  </li>

 

   <li class="dropdown notifications-menu">
   
                    <a href="wallet.php">
                 
                        <i class="glyphicon glyphicon-link text-green"></i>Wallet Recharge
                    </a>
                   
                  </li>
		
				    <li class="treeview">
              
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                       <i class="glyphicon glyphicon-list text-green"></i> Food and Beverage
                      
                    </a>
                   <ul class="treeview-menu">
                      <li>
             
					    
						 
						  <li>
                            <a href="product.php">
                            <i class="fa fa-circle-o"></i> Foods
                            </a>
                          </li>
						 
						   <li>
                            <a href="category.php">
                             <i class="fa fa-circle-o"></i>   Food Type
                            </a>
                          </li>
						         
                       
                      </li>
                     
                    </ul>
                  </li>
		


		
		   <li class="treeview">
         <a href="orders.php" class="dropdown-toggle">
                      <i class="glyphicon glyphicon-stats text-green"></i>
                  Food Request 
                    </a> 
 
        </li>


 
 

           <li class="dropdown notifications-menu">
   
                    <a href="compains.php">
                 
                        <i class="glyphicon glyphicon-copyright-mark text-green"></i>Complaints  
                    </a>
                   
                  </li>

 
                
				   <li class="treeview">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="glyphicon glyphicon-open-file   text-green"></i> Report
                     
                    </a>
                        <ul class="treeview-menu">
                     <li>
                         <li>
                            <a href="foodstockReport.php">
                         Food Stock Report
                            </a>
                          </li>
                        
                     
						   
					      
 

                          <li>

                         <a href="foodorderReport.php">
                            Food Order Report
                            </a>
                          </li>
 

<li>
                         <a href="customerReport.php">
                            Customer  Report  
                            </a>
                          </li>


                      </li>
                    </ul>
                  </li>
              

  
				  
				   <li class="dropdown notifications-menu">
   
                    <a href="users.php">
                 
                        <i class="glyphicon glyphicon-link text-green"></i>System User
                    </a>
                   
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