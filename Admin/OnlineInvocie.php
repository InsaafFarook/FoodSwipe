<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
    include('../dist/includes/dbcon.php');

endif;
?>
 

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>  invoice | <?php include('../dist/includes/title.php');?></title>
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
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Product</li>
            </ol>
          </section>
          <section class="content">
            <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header">
        
            
               
                <div class="box-body">
                
      <div class="alert alert-info"><center><h2>  FOOD SWIPE </h2></center></div>
      <br />


      
      <form method="post"  style="background-color:#fff; overflow:hidden;">
  <div id="printablediv">
  <center>
  <table class="table" style="width:100%;">
 
</label>
  <label style="font-size:20px;">FOOD ORDER RECEIPT   </label>
    <tr>
      <th><h5>Product Name</h5></td>
      <th><h5>Unit Price</h5></td>
      <th><h5>Description</h5></td>
      <th><h5>Quantity</h5></td>
    </tr>

    <?php


    $t_id = $_GET['tid'];
$query = $con->query("SELECT * FROM transaction left join customer on transaction.customerid = customer.cid where  transaction_id = '$t_id'") or die (mysqli_error($con));
    $fetch = $query->fetch_array();

    $amnt = $fetch['amount'];
    echo "<br/>";
    echo "  Ordered Date:  ". $fetch['order_date']."";     echo "<br/>";
 echo "  Customer  :  ". $fetch['Name']."";

    $query2 = $con->query("SELECT * FROM transaction_detail LEFT JOIN product ON product.prod_id = transaction_detail.product_id WHERE transaction_detail.transaction_id = '$t_id'") or die (mysqli_error());
    while($row = $query2->fetch_array()){

    $prod_name = $row['prod_name'];
    $prod_price = $row['prod_price'];
    $prod_desc = $row['prod_desc'];
    $order_qty = $row['order_qty'];

    echo "<tr>";
    echo "<td>".$prod_name."</td>";
    echo "<td>".$prod_price."</td>";
    echo "<td>".$prod_desc."</td>";
    echo "<td>".$order_qty."</td>";
    echo "</tr>";
    }
    ?>

  </table>
  <legend></legend>
  <h4>TOTAL: Rs -  <?php echo $amnt; ?></h4>
  </center>
  </div>    </div>    </div>

  <div class='pull-right'>
  <div class="add"><a onclick="javascript:printDiv('printablediv')" name="print" style="cursor:pointer;" class="btn btn-info"><i class="icon-white icon-print"></i> Print Receipt</a></div>
  </div>
  </form>

      
      </div>
                    
                  
                </div>
 
            </div>
	 
			
          </div>
	  
            
          </section>
        </div>
      </div>
      <?php include('../dist/includes/footer.php');?>
    </div>
  <script language="javascript" type="text/javascript">
        function printDiv(divID) {
            var divElements = document.getElementById(divID).innerHTML;
            var oldPage = document.body.innerHTML;
            document.body.innerHTML =
              "<html><head><title></title></head><body>" +
              divElements + "</body>";
            window.print();
            document.body.innerHTML = oldPage;


        }
    </script>
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
