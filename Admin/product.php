<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Food Products  | <?php include('../dist/includes/title.php');?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <style>
      
    </style>
 </head>
 <body class="hold-transition skin-blue sidebar-mini" >
    <div class="wrapper">
       <?php include('../dist/includes/header.php');include('../dist/includes/headerDefault.php');
      include('../dist/includes/dbcon.php');
      ?>
      <div class="content-wrapper">
          <section class="content-header">
            <h1>            
              <a class="btn btn-small btn-primary" href="#add" data-target="#add" data-toggle="modal" style="color:#fff;" class="small-box-footer"> Add Foods</a>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Food </li>
            </ol>
          </section>

     
          <section class="content">
            <div class="row">
	     
            
            <div class="col-xs-12">
              <div class="box box-primary">
    
                <div class="box-header">
                  <h3 class="box-title">Food  List</h3>
                </div> 
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Food Code</th>
                      	<th>Picture</th>                       
                        <th>Food  Name</th>
                        <th>   Qty</th>
                        <th>Description</th>
            			<th>Price</th>
            			<th>Category</th> 
                        <th>Manage</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
		
		$query=mysqli_query($con,"select * from product left join category  on  product.cat_id=category.cat_id order by prod_name")or die(mysqli_error());
		while($row=mysqli_fetch_array($query)){
		
?>
                      <tr>
                        <td><?php echo $row['serial'];?></td>
                      	<td><img style="width:80px;height:60px" src="../dist/uploads/<?php echo $row['prod_pic'];?>"></td>
                        <td><span class="label label-success"><?php echo $row['prod_name'];?></span></td>
                           <td><?php echo $row['Qty'];?></td>
                        <td><?php echo $row['prod_desc'];?></td>
						        
                         
            						<td><?php echo number_format($row['prod_price'],2);?></td>
            						<td><span class="badge bg-green"><?php echo $row['cat_name'];?></span></td>
            						 
								 
                        <td>
                          <a href="#updateordinance<?php echo $row['prod_id'];?>" data-target="#updateordinance<?php echo $row['prod_id'];?>" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-erase text-blue"></i></a>
                          <a id="removeme" onclick = "confirmationDelete(this); return false;" href="foodremove.php?id=<?php echo $row['prod_id'];?>"><i class="glyphicon glyphicon-trash text-red"></i></a>  
						            </td>
                      </tr>
                      
<div id="updateordinance<?php echo $row['prod_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
	  <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Update Food Details</h4>
              </div>
              <div class="modal-body">
			  <form class="form-horizontal" method="post" action="product_update.php" enctype='multipart/form-data'>
        <div class="form-group">
          <label class="control-label col-lg-3" for="price">Food Code</label>
          <div class="col-lg-9">
            <input type="text" class="form-control" id="price" name="serial" value="<?php echo $row['serial'];?>" required>  
          </div>
        </div>
                <br/>  <br/> 
				<div class="form-group">
					<label class="control-label col-lg-3" for="name">Food Name</label>
					<div class="col-lg-9"><input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['prod_id'];?>" required>  
					  <input type="text" class="form-control" id="name" name="prod_name" value="<?php echo $row['prod_name'];?>" required>  
					</div>
				</div> 
				
				 <br/>  <br/> 
        <div class="form-group">
          <label class="control-label col-lg-3" for="name">Description</label>
          <div class="col-lg-9">
            <input type="text" class="form-control" id="name" name="desc" value="<?php echo $row['prod_desc'];?>" required>  
          </div>
        </div> 
		 <br/>  <br/> 
			 
				<div class="form-group">
					<label class="control-label col-lg-3" for="price">Price</label>
					<div class="col-lg-9">
					  <input type="nubmer" class="form-control" id="price" name="prod_price" value="<?php echo $row['prod_price'];?>" required>  
					</div>
				</div>
				 <br/>  <br/> 
				<div class="form-group">
							<label class="control-label col-lg-3" >Category</label>
							<div class="col-lg-9">
							  <select class="form-control select2" style="width: 100%;" name="category" required>
              <option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_name'];?></option>
                <?php
            
              $queryc=mysqli_query($con,"select * from category order by cat_name")or die(mysqli_error());
                while($rowc=mysqli_fetch_array($queryc)){
                ?>
                  <option value="<?php echo $rowc['cat_id'];?>"><?php echo $rowc['cat_name'];?></option>
                <?php }?>
              </select>
							</div>
						  </div> <br/>  <br/> 
				
       
        <div class="form-group">
          <label class="control-label col-lg-3" for="Qty">Qty</label>
          <div class="col-lg-9">
            <input type="nubmer" class="form-control" id="Qty" name="Qty" value="<?php echo $row['Qty'];?>" required>  
          </div>
        </div>  <br/>  <br/> 
				
				<div class="form-group">
					<label class="control-label col-lg-3" for="price">Photo </label>
					<div class="col-lg-9">
					  <input type="hidden" class="form-control" id="price" name="image1" value="<?php echo $row['prod_pic'];?>"> 
					  <input type="file" class="form-control" id="price" name="image">  
					</div>
				</div>  <br/>  <br/> 
              </div> 
              <div class="modal-footer">
		<button type="submit" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
			  </form>
            </div>
			
        </div>
 </div>                  
<?php }?>					  
                    </tbody>
                    
                  </table>
                </div>
            </div>
          </div>
          </section>
        </div>
      </div>
      <?php include('../dist/includes/footer.php');?>
    </div>
<div id="add" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Add New Foods</h4>
              </div>
              <div class="modal-body">
        <form class="form-horizontal" method="post" action="product_add.php" enctype='multipart/form-data'>
        <div class="form-group">
          <label class="control-label col-lg-3" for="price">Food Code</label>
          <div class="col-lg-9">
            <input type="text" class="form-control" id="price" name="serial" autocomplete="off" required>  
          </div>
        </div>
                
        <div class="form-group">
          <label class="control-label col-lg-3" for="name">Food Name</label>
          <div class="col-lg-9"><input type="hidden" class="form-control" id="id" name="id" required>  
            <input type="text" class="form-control" id="name" name="prod_name" autocomplete="off" required>  
          </div>
        </div> 
        <div class="form-group">
          <label class="control-label col-lg-3" for="price">Food Description</label>
          <div class="col-lg-9">
            <textarea class="form-control" id="price" name="prod_desc" autocomplete="off"></textarea>  
          </div>
        </div>
         
        
        <div class="form-group">
          <label class="control-label col-lg-3" for="price">Price</label>
          <div class="col-lg-9">
            <input type="number" class="form-control" id="price" name="prod_price" autocomplete="off" required>  
          </div>
        </div>
        
        <div class="form-group">
              <label class="control-label col-lg-3" >Category</label>
              <div class="col-lg-9">
                <select class="form-control select2" style="width: 100%;" name="category" required>
               <option selected disabled> Select</option> 
                <?php
            
              $queryc=mysqli_query($con,"select * from category order by cat_name")or die(mysqli_error());
                while($rowc=mysqli_fetch_array($queryc)){
                ?>
                  <option value="<?php echo $rowc['cat_id'];?>"><?php echo $rowc['cat_name'];?></option>
                <?php }?>
              </select>
              </div>
              </div>
        
		
		  <div class="form-group">
        
          <div class="col-lg-9">
            <input type="hidden" class="form-control" id="exDate" name="exDate" autocomplete="off" required>  
          </div>
        </div>
		
 
		
 <div class="form-group">
          <label class="control-label col-lg-3" for="price">Qty</label>
          <div class="col-lg-9">
            <input type="number" class="form-control" id="Qty" name="Qty" autocomplete="off" required>  
          </div>
        </div>


    
        <div class="form-group">
          <label class="control-label col-lg-3" for="price">Picture</label>
          <div class="col-lg-9">
            <input type="file" class="form-control" id="price" name="image">  
          </div>
        </div>
              </div>
              <div class="modal-footer">
    <button type="submit" class="btn btn-primary">Save </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
        </form>
            </div>
      
        </div>
 </div>
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <script src="../dist/js/app.min.js"></script>
    <script src="../dist/js/demo.js"></script>
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
         <script type = "text/javascript">
  function confirmationDelete(anchor){
    var conf = confirm("Are you sure?");
    if(conf){
      window.location = anchor.attr("href");
    }
  } 
</script>  
      
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
  </body>
</html>
