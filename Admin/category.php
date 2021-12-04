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
    <title>Food Type | <?php include('../dist/includes/title.php');?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <style>
      
    </style>
 </head>

  <body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
      <?php include('../dist/includes/header.php');
	    include('../dist/includes/headerDefault.php');
      include('../dist/includes/dbcon.php');
      ?>
	  
      <div class="content-wrapper">
          <section class="content-header">
        <br/>
            <ol class="breadcrumb">
             
              <li class="active">Food Type</li>
            </ol>
          </section>

          <section class="content">
            <div class="row">
	      <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Add New Food Type </h3>
                </div>
                <div class="box-body">
                  <form method="post" action="cat_add.php" enctype="multipart/form-data">
  
  
   <div class="form-group">
                    <label for="date"> Type Code</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="Code" name="Code"   autocomplete="off" required>
                    </div>   
		  </div>
		  
		  
                  <div class="form-group">
                    <label for="date">Food Type</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="date" name="category"   autocomplete="off" required>
                    </div>
                  
		  </div>
 
                  
                      <button class="btn btn-primary" id="daterange-btn" name="">
                        Save
                      </button>
					  <button type="reset"  class="btn"  >
                        Clear
                      </button>
                     
				</form>	
                </div>
              </div>
            </div>
			
            <div class="col-xs-12">
              <div class="box box-primary">
    
                <div class="box-header">
                  <h3 class="box-title">Food Type List</h3>
                </div>
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
			<th>Food Type</th>
			<th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
		
		$query=mysqli_query($con,"select * from category order by cat_name")or die(mysqli_error());
		while($row=mysqli_fetch_array($query)){
		
?>
                      <tr>
                        <td><?php echo $row['cat_name'];?></td>
                        <td>
				<a href="#updateordinance<?php echo $row['cat_id'];?>" data-target="#updateordinance<?php echo $row['cat_id'];?>" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-erase text-blue"></i></a>
				
						</td>
                      </tr>
<div id="updateordinance<?php echo $row['cat_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
	  <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Update Food Type Details</h4>
              </div>
              <div class="modal-body">
			  <form class="form-horizontal" method="post" action="cat_update.php" enctype='multipart/form-data'>
                
				<div class="form-group">
					<label class="control-label col-lg-3" for="name">Food Type</label>
					<div class="col-lg-9"><input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['cat_id'];?>" required>  
					  <input type="text" class="form-control" id="name" name="category" value="<?php echo $row['cat_name'];?>" required>  
					</div>
				</div> 
				
				
              </div><hr>
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
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <script src="../dist/js/app.min.js"></script>
    <script src="../dist/js/demo.js"></script>
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    
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
