<!DOCTYPE html>
<!--i used this website for design -> https://bootstrapious.com/p/bootstrap-shopping-cart-->
<html lang="en">
  <?php include('templates/header.php'); ?>
  <div id="cart" class="px-4 px-lg-0">
  <div class="container text-white py-5 mt-2 text-center">
    <h1 class="display-4">shopping cart</h1>
  </div>
  <!--Shopping cart-->
  <div class="pb-5">  
    <div class="container"> 
    <?php   
      $p_total=0;
      //take product data from database of items that are in shopping cart
      $result2 = $mysqli->query("SELECT productId FROM shoppingcart");
      $row2 = mysqli_fetch_assoc($result2);
      $productId = $row2['productId'];      
      $sql = "SELECT price, image, pname, ptype, amount, id FROM products p, shoppingcart s
      WHERE p.id = s.productId; ";
      echo "<div class='row'>";
        echo "<div class='col-lg-12 p-5 bg-white rounded shadow-sm mb-5'>";
          echo"<div class='table-responsive'>";
             echo"<table class='table'>";
               echo "<thead>";
                 echo "<tr>";
                   echo "<th scope='col' class='border-0 bg-light'><div class='p-2 px-3 text-uppercase'>product</div></th>";
                   echo "<th scope='col' class='border-0 bg-light'><div class='py-2 text-uppercase'>Price</div></th>";
                   echo "<th scope='col' class='border-0 bg-light'><div class='py-2 text-uppercase'>Quantity</div></th>";
                   echo "<th scope='col' class='border-0 bg-light'><div class='py-2 text-uppercase'>Remove</div></th>";
                 echo "</tr>";
               echo "</thead>";
               echo "<tbody>";
               if($result = $mysqli->query($sql)){
               if($result->num_rows > 0){
               while($row = $result->fetch_array()){
                 echo "<tr>";
                   echo" <th scope='row' class='border-0'>";
                       echo "<div class='p-2'>";
                          echo "<img src='".$row['image']."'  width='70' class='img-fluid rounded shadow-sm'>";
                               echo "<div class='ml-3 d-inline-block align-middle'>";
                                  echo "<h5 class='mb-0'> <a href='#' class='text-dark d-inline-block align-middle'>" . $row['pname'] . "</a></h5><span class='text-muted font-weight-normal font-italic d-block'>" . $row['ptype'] . "</span>";
                               echo "</div>";
                        echo"</div>";
                   echo "</th>";
                   echo "<td class='border-0 align-middle'><strong>$" . $row['price'] . "</strong></td>";
                   echo "<td class='border-0 align-middle'><input id='quantity' type='number' class='form-control text-center' value='" . $row['amount'] . "'></td>";
                   echo "<td class='border-0 align-middle'><a href='delete.php?id=". $row['id'] ."' class='text-dark'><i class='fa fa-trash'></i></a></td>";
                 echo "</tr>";
                 $p_total += ($row['price'] * $row['amount']);
                }
                echo "</tbody>";                            
              echo "</table>";
            echo"</div>";
          echo"</div>";
        echo"</div>";
         $result->free();
        } 
        } else{
             echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
                }                    
           $mysqli->close() ?>
   <!--End shopping cart-->      

   <!--Price table-->
      <div class="row py-5 p-4 bg-white rounded shadow-sm ">
        <div class="col-lg-6">
            <img src="img/delivery.jpg" width="500" class="img-fluid">
        </div>
        <div class="col-lg-6">
          <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary </div>
          <div class="p-4">
            <ul class="list-unstyled mb-4">
              <li class="d-flex justify-content-between py-3 border-bottom"><strong name="total" class="text-muted">Order Subtotal </strong><strong>$<?php echo($p_total);?></strong></li>
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Shipping</strong><strong>$5.00</strong></li>
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                <h5 class="font-weight-bold">$<?php echo($p_total + 5);?></h5>
              </li>
            </ul><a href="#" class="btn btn-dark rounded-pill py-2 btn-block">Procceed to checkout</a>
          </div>
        </div>
      </div>
      <!--End price table-->

    </div>
  </div>
</div>
     <?php include('templates/footer.php'); ?>   
</html>
