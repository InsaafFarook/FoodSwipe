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
         <aside class="main-sidebar">
    <section class="sidebar">
<?php
$query=mysqli_query($con,"select * from  customer  where cid=28 ")or die(mysqli_error($con));
    $i=1;
    while($row=mysqli_fetch_array($query)){
    $id=$row['cid'];

 
?>

<img src="../uploads/<?php echo $row['Photo'];?>" class="user-image" alt="User Image" height="50" width="50"> 
 
  <span class="label label-success"><?php echo $row['Name'];?></span>

<?php }?>
     


      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">


		   <li class="treeview">
         <a href="home.php" class="dropdown-toggle">
                      <i class="glyphicon glyphicon-scale text-red"></i>
                  Home 
                    </a> 
 
        </li>
        

 
  <li class="treeview">
         <a href="Food-View.php" class="dropdown-toggle">
                      <i class="glyphicon glyphicon-cutlery text-red"></i>
                   Food order  Portal
                    </a> 
        </li>


 
	 
        </li>
 

 
 

            <li class="treeview">
              
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                       <i class="glyphicon glyphicon-user text-red"></i> Customers
                      
                    </a>
                   <ul class="treeview-menu">
                      <li>
         
             <li>
                            <a href="customer.php">
                       New  Customers
                            </a>
                          </li>
             
              <li>
                            <a href="customerlist.php">
                            <i class="fa fa-circle-o"></i> Customers list 
                            </a>
                          </li>
             
        
                     
                       
                      </li>
                     
                    </ul>
                  </li>

 
 
     

   <li class="dropdown notifications-menu">
   
                    <a href="wallet.php">
                 
                        <i class="glyphicon glyphicon-link text-orange"></i>Wallet Recharge
                    </a>
                   
                  </li>
		
				    <li class="treeview">
              
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                       <i class="glyphicon glyphicon-credit-card text-red"></i> Food and Beverage
                      
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
         <a href="ToolRequestInvoice.php" class="dropdown-toggle">
                      <i class="glyphicon glyphicon-stats text-red"></i>
                  Food Request 
                    </a> 
 
        </li>


 
 



 <li class="treeview">
              
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                       <i class="glyphicon glyphicon-copyright-mark text-red"></i> Complaints
                      
                    </a>
                   <ul class="treeview-menu">
                      <li>
             
              
             
              <li>
                            <a href="product.php">
                            <i class="fa fa-circle-o"></i>New Complaint
                            </a>
                          </li>
             
               <li>
                            <a href="category.php">
                             <i class="fa fa-circle-o"></i> Complaint History
                            </a>
                          </li>
                     
                       
                      </li>
                     
                    </ul>
                  </li>




                
				   <li class="treeview">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="glyphicon glyphicon-open-file   text-red"></i> Report
                     
                    </a>
                        <ul class="treeview-menu">
                     <li>
                         <li>
                            <a href="inventory.php">
                         Product Stock
                            </a>
                          </li>
                        
                     
						  
						            <li>
                         <a href="ToolsRequestedReport.php">
                            Tools Supply Report
                            </a>
                          </li>
					      
 <li>
                         <a href="#">
                            Employee Report  
                            </a>
                          </li>

                          <li>

                         <a href="#">
                            Food Order Report
                            </a>
                          </li>
 

<li>
                         <a href="#">
                            Complaint Report  
                            </a>
                          </li>


                      </li>
                    </ul>
                  </li>
              

  
				  
				   <li class="dropdown notifications-menu">
   
                    <a href="users.php">
                 
                        <i class="glyphicon glyphicon-link text-orange"></i>System User
                    </a>
                   
                  </li>
 
 
				   <li class="dropdown notifications-menu">
   
                    <a href="profile.php">
                 
                        <i class="glyphicon glyphicon-cog text-red"></i>My Account
                    </a>
                   
                  </li>
 
 
 
                  <li class="">
                    <a href="logout.php" class="dropdown-toggle">
                      <i class="glyphicon glyphicon-log-in text-red"></i> Logout 
                      
                    </a>
      
      
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
      </header>