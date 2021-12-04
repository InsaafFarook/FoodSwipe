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
$query=mysqli_query($con,"select * from  customer  where cid=30 ")or die(mysqli_error($con));
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
        

 

 
	 
        </li>
 

  
  <li class="treeview">
         <a href="Food-View.php" class="dropdown-toggle">
                      <i class="glyphicon glyphicon-cutlery text-red"></i>
                    Order My Food  
                    </a> 
        </li>


  
    


		
		   <li class="treeview">
         <a href="myorders.php" class="dropdown-toggle">
                      <i class="glyphicon glyphicon-stats text-red"></i>
                    My Orders 
                    </a> 
 
        </li>


 
  
				    <li class="treeview">
              
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                       <i class="glyphicon glyphicon-credit-card text-red"></i>   My Wallet 
                      
                    </a>
                   <ul class="treeview-menu">
                      <li>
             
					    
						 
						  <li>
                            <a href="customerlist.php">
                            <i class="fa fa-circle-o"></i> Wallet  Balance
                            </a>
                          </li>
						 
						   <li>
                            <a href="wallet.php">
                             <i class="fa fa-circle-o"></i>   Wallet  Recharges
                            </a>
                          </li>
						         
                       
                      </li>
                     
                    </ul>
                  </li>
		
  
				    <li class="treeview">
              
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                       <i class="glyphicon glyphicon-credit-card text-red"></i>   Complaints 
                      
                    </a>
                   <ul class="treeview-menu">
                      <li>
             
					    
						 
						  <li>
                            <a href="compaints.php">
                            <i class="fa fa-circle-o"></i> Sent   Complaint 
                            </a>
                          </li>
						 
						   <li>
                            <a href="compains.php">
                             <i class="fa fa-circle-o"></i>   My Complaints 
                            </a>
                          </li>
						         
                       
                      </li>
                     
                    </ul>
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