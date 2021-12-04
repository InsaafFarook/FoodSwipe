<?php session_start();
if (empty($_SESSION['id'])) :
  header('Location:../index.php');
  include('../dist/includes/dbcon.php');
endif;
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Foods | <?php include('../dist/includes/title.php'); ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../plugins/select2/select2.min.css">
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <?php include('../dist/includes/header.php');
    include('../dist/includes/headerDefault.php');
    include('../dist/includes/dbcon.php');
    ?>

    <div class="content-wrapper">
      <section class="content-header">
        <div class="box box-default color-palette-box">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-tag"></i>Product View</h3>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-xs-12">
                <div class="box box-solid">
                  <div class="box-header">
                    <i class="fa fa-bar-chart-o"></i>
                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-default btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                      </button>
                    </div>
                  </div>

                  <?php
                  //WHERE category='feature'
                  $id = $_GET['id'];
                  $query = $con->query("SELECT * FROM product  WHERE prod_id = '$id'  ORDER BY prod_id DESC") or die(mysqli_error());

                  while ($fetch = $query->fetch_array()) {
                    $pid = $fetch['prod_id'];
                    $query1 = $con->query("SELECT * FROM product WHERE prod_id = '$id'") or die(mysqli_error());
                    $rows = $query1->fetch_array(); {    ?>

                      <div class="box-body">
                        <div class="row">
                          <div class="col-xs-6 col-md-12 text-center">
                        <?php
                        echo "<br />";
                        echo "<a class='text-info' style='position:absolute; margin-top:-30px; text-indent:100px;'>  <span>". $fetch['prod_name'] ." </span>   </a>";
                        echo "<a href='details.php?id=" . $fetch['prod_id'] . "'><img   src='../dist/uploads/" . $fetch['prod_pic'] . "' height = '300px' width = '300px'></a>";
                        echo "<br />";

                        echo " <span> " . $fetch['prod_desc'] . "</span>";
                        echo "<br />";
                        echo " <span class='label label-primary'> Rs. " . $fetch['prod_price'] . "  </span>";
                        echo "<br />";
                        echo "</div>";
                      }
                    }
                        ?>
                        <center>
                          <?php
                          //WHERE category='feature'
                          $id = $_GET['id'];
                          $query = $con->query("SELECT * , sum(review) as reviewTotal , count(reviewBy) as countid FROM starreview  left join customer on starreview.reviewBy = customer.cid  WHERE productid = '$id'  ") or die(mysqli_error());
                          $customer = mysqli_num_rows($query);
                          while ($fetch = $query->fetch_array()) {
                            $totalpoints = $fetch['reviewTotal'];
                            $totalEntries = $fetch['countid'];
                          ?>
                            <div class="box-body">
                              <div class="row">
                                <div class="col-xs-6 col-md-12 text-center">
                                <?php

                                if ($totalEntries > 0) {
                                  $finalpoints =  $totalpoints / $totalEntries;
                                  if ($finalpoints <= 1) {
                                    echo "<img   src='../dist/uploads/starts/1.JPG' height = '30px' width = '150px'></a>";
                                    echo "<br />";
                                  } elseif ($finalpoints <= 2) {
                                    echo "<img   src='../dist/uploads/starts/2.JPG' height = '30px' width = '150px'></a>";
                                    echo "<br />";
                                  } elseif ($finalpoints <= 3) {
                                    echo "<img   src='../dist/uploads/starts/3.JPG' height = '30px' width = '150px'></a>";
                                    echo "<br />";
                                  } elseif ($finalpoints <= 4) {
                                    echo "<img   src='../dist/uploads/starts/4.JPG' height = '30px' width = '150px'></a>";
                                    echo "<br />";
                                  } elseif ($finalpoints <= 5) {
                                    echo "<img   src='../dist/uploads/starts/5.JPG' height = '30px' width = '150px'></a>";
                                    echo "<br />";
                                  }
                                  echo "<br />";
                                }
                              }
                                ?>

                                <h4 class="title">Customer Reviews</h4>
                                
                                <?php
                                //WHERE category='feature'
                                $id = $_GET['id'];
                                $query = $con->query("SELECT *  FROM starreview  left join customer on starreview.reviewBy = customer.cid  WHERE productid = '$id'  ") or die(mysqli_error());
                                $customer = mysqli_num_rows($query);
                                while ($fetch = $query->fetch_array()) {
                              
                                  ?>
                                  <div class="box-body">
                                    <div class="row">
                                      <div class="col-xs-6 col-md-12 text-center">
                      
                                      <?php

                                      echo "<br />";
                                      echo "<a class='text-info'>  <span class='label label-success'>" . $fetch['Name'] . " :</span></a>";
                                      echo "<a class='text-info'>     " . $fetch['review2'] . "   </span>   </a>";
                                      echo "<br />";
                                    }
                                      ?>

                                      <?php
                                      $id = $_GET['id'];
                                      $query = mysqli_query($con, "SELECT * FROM product  WHERE Qty >= 1 and prod_id = '$id'  ") or die(mysqli_error());
                                      while ($row = mysqli_fetch_array($query)) {

                                      ?>
                                        <br/> 
                                        <?php echo "<a href='Food-View3.php?id=" . $id . "&action=add'><input type='submit' class='btn btn-primary' name='add' value='Add Product'></a>" ?>
                                      <?php }
                                      ?>
                                      <br /><br />

                                      <a href='Food-View.php'><button class='btn btn-warning'>Back to Menu</button></a>

                                      <br /><br />                                    
                                      <?php
                                      $id = $_GET['id'];
                                      $cid = $_SESSION['id'];
                                      $query = $con->query("SELECT * FROM transaction  left join transaction_detail on transaction.transaction_id = transaction_detail.transaction_id  WHERE product_id = '$id' and  customerid ='cid'  ") or die(mysqli_error()); {


                                      ?>
                                        <form role="form" class="cnt-form" action="rateAdd.php" method="post">
                                          <div class="product-add-review">
                                            <h4 class="title">Please select product review</h4>
                                            <div class="review-table">
                                              <div class="table-responsive">
                                                <table class="table table-bordered">
                                                  <thead>
                                                    <tr>
                                                      <th class="cell-label">&nbsp;</th>
                                                      <th>1 star</th>
                                                      <th>2 stars</th>
                                                      <th>3 stars</th>
                                                      <th>4 stars</th>
                                                      <th>5 stars</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                    <tr>
                                                      <td class="cell-label">Star</td>
                                                      <td><input type="radio" name="first" class="first" value="first"></td>
                                                      <td><input type="radio" name="secon" class="radio" value="secon"></td>
                                                      <td><input type="radio" name="tri" class="radio" value="tri"></td>
                                                      <td><input type="radio" name="four" class="radio" value="four"></td>
                                                      <td><input type="radio" name="fiv" class="radio" value="fiv"></td>
                                                    </tr>


                                                  </tbody>
                                                </table><!-- /.table .table-bordered -->
                                              </div><!-- /.table-responsive -->
                                            </div><!-- /.review-table -->

                                            <div class="review-form">
                                              <div class="form-container">

                                                <input type="hidden" name="product" value="<?php echo  $_GET['id']; ?>">
                                                <input type="hidden" name="customer" value="<?php echo $cid = $_SESSION['id']; ?>">

                                                <div class="form-group">
                                                  <label for="date">Write your own review</label>
                                                  <div class="input-group col-md-12">
                                                    <input type="text" class="form-control pull-right" name="Message" required>
                                                  </div><!-- /.input group -->
                                                </div><!-- /.form group -->

                                                <div class="action text-centers">
                                                  <button name="submit" class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
                                                </div><!-- /.action -->

                                        </form><!-- /.cnt-form -->
                                      </div><!-- /.form-container -->
                                    </div><!-- /.review-form -->

                                  </div><!-- /.product-add-review -->
                        </center>
                          </div>
                        </div>
                      </div>
                </div>
              </div>
            </div>
          <?php }
          ?>
      </section>

      <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
      <script src="../bootstrap/js/bootstrap.min.js"></script>
      <script src="../plugins/select2/select2.full.min.js"></script>
      <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
      <script src="../plugins/fastclick/fastclick.min.js"></script>
      <script src="../dist/js/app.min.js"></script>
      <script src="../dist/js/demo.js"></script>

</body>

</html>