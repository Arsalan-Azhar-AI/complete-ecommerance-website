<?php
      include('includes/connect.php');
   include('functions/common_function.php');
   session_start();
?>
   
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ecomerance Website-cart details.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing:border-box;
        }
      .logo{
    width: 7%;
    height: 7%;
}
.card-img-top{
    width: 100%;
    height: 200px;
    object-fit:contain;
}
.text_light{
  color:white;
}
.cart_img{
    width: 80px;
    height: 80px;
    object-fit:contain;
}
    </style>
  </head>
  <body>
    <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-info navbar-light">
  <div class="container-fluid">
    <img src="./images/logo.jpg" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./users_area/user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item();  ?></sup></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
<ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <?php
        
        if (!isset( $_SESSION['username'])) {
          echo"<li class='nav-item'>
          <a class='nav-link active' aria-current='page' href='/'>Welcome Guest</a>
        </li>";
        }
        else{
          echo"<li class='nav-item'>
          <a class='nav-link active' aria-current='page' href='/'>Welcome ".$_SESSION['username']." </a>
        </li>";
        }

          if (!isset( $_SESSION['username'])) {
            echo"<li class='nav-item'>
            <a class='nav-link' href='./users_area/user_login.php'>Login</a>
          </li>";
          }
          else{
            echo"<li class='nav-item'>
            <a class='nav-link' href='./users_area/logout.php'>Logout</a>
          </li>";
          }

        ?>
        </ul>
</nav>
<div class="bg-light">
  <h3 class="text-center">Hidden Store</h3>
</div>
<p class="text-center">Communication is at the Heart of e-commerce and community</p>    
 <!-- main section -->
<div class="container">
    <div class="row">
      <form action="" enctype="multipart/form-data" method="post">
        <table class="table text-center table-bordered">
            <tbody>
              <!-- php code to display all dynamic data -->
              <?php
                 global $con;
                 $ip = getIPAddress();
                 $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$ip'";
                 $total = 0;
                 $result = mysqli_query($con, $cart_query);
                 $result_count=mysqli_num_rows($result);
                 if($result_count>0){
                  echo"<thead>
                  <tr>
                      <th>Product Title</th>
                      <th>Product Image</th>
                      <th>Quantity</th>
                      <th>Total Price</th>
                      <th>Remove</th>
                      <th colspan='2'>Operations</th>
                  </tr>
              </thead>";
                
                 while($row = mysqli_fetch_array($result)) {
                   $product_id = $row['product_id'];
                   $select_product = "SELECT * FROM `products` WHERE product_id='$product_id'";
                   $result_products = mysqli_query($con, $select_product);
                   
                   while ($row_product_price = mysqli_fetch_array($result_products)){
                     $product_price = $row_product_price['product_price'];
                     $price_table=$row_product_price['product_price'];
                     $product_title=$row_product_price['product_title'];
                     $product_image1=$row_product_price['product_image1'];
                     $total += $product_price;
              ?>
                <tr>
                    <td><?php echo "$product_title"; ?></td>
                    <td><img class="cart_img" src="./admin_area/product_images/<?php echo $product_image1; ?>"></td>
                    <td><input type="text" name="qty" class="form-input w-50"></td>
                    <?php
                    $ip = getIPAddress();
                    if (isset($_POST['update_cart'])) {
                      $quantities = $_POST['qty'];
                      $update_cart="UPDATE `cart_details` SET `quantity`='$quantities' WHERE ip_address='$ip'";
                      $result_quantity = mysqli_query($con, $update_cart);
                      $total=$total*$quantities;
                    }
                      

?>
                    <td><?php echo "$price_table"; ?>/-</td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php echo"$product_id"; ?>"></td>
                    <td>
                        <!-- <button >Update</button> -->
                        <input type="submit" class="bg-info px-3 py-2 border-0 mx-3" value="Update Cart" name="update_cart">

                        <input type="submit" class="bg-info px-3 py-2 border-0 mx-3" value="Remove Cart" name="remove_cart">
                    </td>
                    <?php
                      }}}
                      else{
                        echo "<h2 class='text-center text-danger'>Cart is Empty</h2>";
                      }
                    ?>
            </tbody>
        </table>
        <div class="d-flex mb-5">
                      <?php
                         global $con;
                         $ip = getIPAddress();
                         $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$ip'";
                        //  $total = 0;
                         $result = mysqli_query($con, $cart_query);
                         $result_count=mysqli_num_rows($result);
                         if($result_count>0){
                            echo"<h4 class='px-3'>
                            Subtotal<strong class='text-info'> $total /-</strong>
                        </h4>
                        <input type='submit' class='bg-info px-3 py-2 border-0 mx-3' value='Countineus Shoping' name='countineu_shopping'>
                        <button class='bg-secondary px-3 py-2 border-0 text-light'><a class='text-light text-decoration-none' href='./users_area/checkout.php'>Check Out</a></button>";
                         }
                         else{
                          echo" <input type='submit' class='bg-info px-3 py-2 border-0 mx-3' value='Countineus Shoping' name='countineu_shopping'>";
                         }
                         if (isset($_POST['countineu_shopping'])) {
                          echo"<script>window.open('index.php','_self')</script>";
                         }
                      ?>
        </div>
    </div>
</div>
</form>
<!-- remove item function -->
<?php
function remove_cart_item(){
global $con;
if (isset($_POST['remove_cart'])) {
 foreach($_POST['removeitem'] as $remove_id){
  echo $remove_id;
  $delete_query="Delete from `cart_details` WHERE product_id=$remove_id";
  $run_delete=mysqli_query($con,$delete_query);
  if ($run_delete) {
    echo "<script>window.open('cart.php','_self')</script>";
  }
  
 }
}
}

echo $remove_item=remove_cart_item();
?>
<?php
include("./includes/footer.php");
?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html> 