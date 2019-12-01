<?php 
//connect database
require_once "config/db_connect.php";
$amount = $productId ="";
//take product id from url of product description page 
$uri = $_SERVER['REQUEST_URI'];
$productId = (int) filter_var($uri, FILTER_SANITIZE_NUMBER_INT);
//send product data to shoppingcart database when "add to bag" button is clicked

 if (isset($_POST['addButton'])){
   $amount = trim($_POST["amount"]);
   $sql = "INSERT INTO shoppingcart (amount, productId) VALUES ('$amount','$productId' )";
   if($mysqli->query($sql)===TRUE){
     header("location: shopping-cart.php");
   } 

  $mysqli->close();
 }

?>

<!DOCTYPE html>
<html>
<?php include('templates/header.php');?>
<!--product page-->
<section id="product-info">
    <div class="container " style="margin-top:150px; margin-bottom:150px">
      <div class="container">
        <div  id="productName" class="pl-5"></div>
      </div>
      <div class="row">
        <div class="col-12 col-lg-7 ">
          <div class="container">
            <div id="productImg" ></div>
          </div>
        </div>
        <form method="post" class="col-12 col-lg-5 text-center">
          <div class="shadow-lg p-3 mt-5 mb-3 bg-white ">
            <h3 class="text-secondary">Description</h3>
            <div id="productDescrip"></div>
            <div class="row mx-5"> 
              <h4 class="text-secondary mx-4">Amount:</h4>
              <input name="amount" type="number" class="col-4  form-control " value="1">
            </div>
            <div class="container ">
              <div id="productPrice" ></div>
            </div>
            <div class="d-flex justify-content-center my-3 flex-wrap" ></div>
            <div class="col-12 mt-2">
              <button name="addButton" class="btn btn-dark" type="submit">Add to Bag</button>
            </div>
        </div>
        </form>
      </div>
    </div>
  </section>
  <!--end product page-->
<?php include('templates/footer.php');?>
<script src="js/product.js"></script>
</html>