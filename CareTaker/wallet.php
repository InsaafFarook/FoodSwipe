<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
if(empty($_SESSION['UserType'] =='Taker')):
header('Location:../index.php');
endif;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>wallet | <?php include('../dist/includes/title.php');?></title>
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../plugins/select2/select2.min.css">
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <script src="../dist/js/jquery.min.js"></script>
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
            <h1>
              <br/>
              
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Users</li>
            </ol>
          </section>
          <section class="content">
            <div class="row">
        <div class="col-md-4">
              <div class="box box-danger">
                <div class="box-header">
                  <h3 class="box-title">Update  wallet </h3>
                </div>
                <div class="box-body">
                  <form method="post" action="walletAdd.php" enctype="multipart/form-data">
  
  
  
   

    <div class="form-group">
 
<label for="date" >Customer</label>
 
 <select name="customer" class="form-control select2"   required="required">
<option value="" selected disabled>Select Customer</option>
<?php  
   $query=mysqli_query($con,"SELECT * from customer")or die(mysqli_error());
while($row1=mysqli_fetch_array($query)){
            $cid=$row1['cid'];
            $Name=$row1['Name'];   

 {  ?>
<option value="<?php echo ($row1['cid']); ?>"><?php echo ($row1['Name']); ?></option>
     <?php } } ?>  
 </select>
                                                     
                                                    </div>





        <div class="form-group">
                    <label for="date">  Recharge Ammount</label>
                    <div class="input-group col-md-12">
                      <input type="number" class="form-control pull-right" id="Ammount" name="Ammount"   required>
                    </div>
                  </div>
        
                   
                      <button class="btn btn-primary" id="daterange-btn" name="">
                        Save
                      </button>
            <button  type="reset" class="btn" id="daterange-btn">
                        Clear
                      </button>
        </form> 
                </div>
              </div>
            </div>
            <div class="col-xs-8">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">wallet Recharge </h3>
                </div>
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
      <th>Customer</th>
            <th>  Mobile </th>
      <th>  Amount </th>
       
      <th>  Effect Date</th>
 
     
                      </tr>
                    </thead>
                    <tbody>
<?php
    
    $query=mysqli_query($con,"select * from wallet left join customer on wallet.customerid = customer.cid")or die(mysqli_error());
    while($row=mysqli_fetch_array($query)){
    
?>
                      <tr>
              <td><?php echo $row['Name'];?></td>
                        <td><?php echo $row['contact'];?></td>
             
     <td><?php echo $row['balance'];?></td>
              
          <td><?php echo $row['addeddate'];?></td>    
                     
                      </tr>
<div id="updateordinance<?php echo $row['user_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Update User Details</h4>
              </div>
              <div class="modal-body">
        <form class="form-horizontal" method="post" action="User_update.php" enctype='multipart/form-data'>
                
        <div class="form-group">
          <label class="control-label col-lg-3" for="name">Name</label>
          <div class="col-lg-9"><input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['user_id'];?>" required>  
            <input type="text" class="form-control" id="Name" name="Name" value="<?php echo $row['name'];?>" readonly>  
          </div>
        </div> 
         <br/> <br/>
       
        
          
  <div class="form-group">
          <label class="control-label col-lg-3">      <label for="date" >User Type</label>
               
              <div class="col-lg-9">  <select class="form-control select2" style="width: 100%;" name="UserType" required>
              <option selected > <?php echo $row['UserType'];?> </option>
         <option value="Staff"> Staff </option>
        <option value="Taker"> Taker </option>
        
              </select>
               
              </div>
        
        </div>
        
         <br/>  

         <br/>  
         
         
         
         
           <div class="form-group">
          <label class="control-label col-lg-3"     <label for="date" >Access Status</label>
               
              <div class="col-lg-9">  <select class="form-control select2" style="width: 100%;" name="status" required>
              <option selected > <?php echo $row['status'];?> </option>
         <option value="Staff"> Active </option>
        <option value="Taker"> Block </option>
        
              </select>
               
              </div>
        
        </div>
        
         <br/>  

         <br/> 
 
          
        <div class="form-group">
          <label class="control-label col-lg-3" for="name">user Name</label>
          <div class="col-lg-9">
            <input type="text" class="form-control" id="UName" name="UName" value="<?php echo $row['username'];?>" required>  
          </div>
         </div>
           <br/> <br/>

        <div class="form-group">
          <label class="control-label col-lg-3" for="name">Change Password</label> 
         <div class="col-lg-9">
         *leave if change is not needed
            <input type="text" class="form-control" id="Password" name="Password" value="<?php echo $row['password'];?>" required>  
          </div></div>
   <br/> <br/>
        
              </div><hr>
              <div class="modal-footer">
    <button type="submit" class="btn btn-primary">Update Changes</button>
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
    <script>
  
    
      $("#cash").click(function(){
          $("#tendered").show('slow');
          $("#change").show('slow');
      });

    $(function() {

      $(".btn_delete").click(function(){
      var element = $(this);
      var id = element.attr("id");
      var dataString = 'id=' + id;
      if(confirm("Sure you want to delete this item?"))
      {
  $.ajax({
  type: "GET",
  url: "temp_trans_del.php",
  data: dataString,
  success: function(){
    
        }
    });
    
    $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
    .animate({ opacity: "hide" }, "slow");
      }
      return false;
      });

      });
    </script>
  
  <script type="text/javascript" src="autosum.js"></script>
    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <script src="../dist/js/jquery.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../plugins/select2/select2.full.min.js"></script>
    <!-- SlimScroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
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
          "ordering": true,x`
          "info": true,
          "autoWidth": false
        });
      });
    </script>
     <script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate: moment()
            },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>
  </body>
</html>
