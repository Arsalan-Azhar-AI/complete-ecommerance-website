<?php
      include('../includes/connect.php');
   include('../functions/common_function.php');
   session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome <?php echo $_SESSION['username'];?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <style>
        *{
          overflow-x: hidden;
            margin: 0;
            padding: 0;
            box-sizing:border-box;
        }
      .logo{
    width: 7%;
    height: 7%;
}
.edit_image{
  width: 100px;
  height:100px;
  object-fit:contain;
}
.profile_image{
  width: 90%;
  margin:auto;
  display:block;
  /* height: 100%; */
  object-fit:contain;
}
.card-img-top{
    width: 100%;
    height: 200px;
    object-fit:contain;
}
.text_light{
  color:white;
}
    </style>
  </head>
  <body>
    <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-info navbar-light">
  <div class="container-fluid">
    <img src="../images/logo.jpg" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">My Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item();  ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price: <?php total_cart_price(); ?> /-</a>
        </li>
      </ul>
      <form action="../search_product.php" method="get" class="d-flex" role="search">
        <input 
         class="form-control me-2" name="search_data" type="search" placeholder="Search" aria-label="Search">
        <input type="submit" name="search_data_product" value="Search" class="btn btn-outline-light">
      </form>
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
 <div class="row">
    <div class="col-md-2 p-0">
          <ul class="navbar-nav bg-secondary text-center" style="height:100vh;">
          <li class="nav-item ">
          <a class="nav-link text-light bg-info" href="#"><h4>Your Profile</h4></a>
        </li>
        <?php
      $username=$_SESSION['username'];
      $user_image="SELECT * FROM `user_table` WHERE user_name='$username'";
      $result_image=mysqli_query($con,$user_image);
      $row_image=mysqli_fetch_array( $result_image);
      $user_image=$row_image['user_image'];
      echo"<li class='nav-item'>
      <img src='./user_images/$user_image' class='my-4 profile_image' alt=''>
    </li>";
?>    
        <li class="nav-item">
          <a class="nav-link text-light" href="profile.php">Pending Orders</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-light" href="profile.php?edit_account">Edit Account</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-light" href="profile.php?my_orders">My Orders</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-light" href="profile.php?delete_account">Delete Account</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-light" href="logout.php">Logout</a>
        </li>
          </ul>
    </div>
    <div class="col-md-10 text-center">
          <?php get_user_order_details();
          if (isset($_GET['edit_account'])) {
             include("edit_account.php");
          }
          if (isset($_GET['my_orders'])) {
            include("user_order.php");
         }
         if (isset($_GET['delete_account'])) {
          include("delete_account.php");
       }
         ?>
    </div>
 </div>
<?php
include("../includes/footer.php");
?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
