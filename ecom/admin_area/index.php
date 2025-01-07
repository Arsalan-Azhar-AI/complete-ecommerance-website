<?php
      include('../includes/connect.php');
   include('../functions/common_function.php');
//    session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Admin dashboard</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing:border-box;
        }
        body{
            overflow-x:hidden;
        }
        .product_image{
            width:100px;
            object-fit:contain;
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
.adminimg{
    width: 100px;
    object-fit:contain;
}
.footer{
    position: absolute;
    bottom: 0;
}
    </style>
  </head>
  <body>
    <div class="container-fluid p-0 m-0">
        <nav class="navbar navbar-light bg-info navbar-expand-lg">
            <div class="container-fluid">
                <img class="logo"src="../images/logo.jpg" alt="">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link">Welcome Guest</a>
                        </li>
                    </ul>

                </nav>
            </div>
        </nav>
        <!-- second child -->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
           
        </div>
        <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center p-3">
            <div>
                <a href="#"><img class="adminimg" src="../images/6.jpg" alt=""></a>
                <p class="text-light text-center">Admin Name</p>
            </div>
            <div class="button text-center">
            <button><a href="insert_product.php
            " class="nav-link text-light bg-info my-1">Insert Product</a></button>
            <button><a href="index.php?view_products" class="nav-link text-light bg-info my-1">View Product</a></button>
            <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert Categories</a></button>
            <button><a href="index.php?view_categories" class="nav-link text-light bg-info my-1">View Categories</a></button>
            <button><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1">Insert Brands</a></button>
            <button><a href="index.php?view_brands" class="nav-link text-light bg-info my-1">view Brands</a></button>        
            <button><a href="index.php?list_orders" class="nav-link text-light bg-info my-1">All Orders</a></button>
            <button><a href="index.php?list_payments" class="nav-link text-light bg-info my-1">All Payments</a></button>
            <button><a href="index.php?list_users" class="nav-link text-light bg-info my-1">List Users</a></button>
            <button><a href="index.php?message" class="nav-link text-light bg-info my-1">Messages</a></button>
            <button><a href="./index.php?admin_logout" class="nav-link text-light bg-info my-1">Logout</a></button>
        </div></div></div>

        <div class="container my-3">
            <?php
                if (isset($_GET['insert_category'])) {
                    include('insert_categories.php');
                }
                if (isset($_GET['insert_brand'])) {
                    include('insert_brands.php');
                }
                if (isset($_GET['view_products'])) {
                    include('view_products.php');
                }
                if (isset($_GET['edit_products'])) {
                    include('edit_products.php');
                }
                if (isset($_GET['delete_product'])) {
                    include('delete_product.php');
                }
                if (isset($_GET['view_categories'])) {
                    include('view_categories.php');
                }
                
                  if (isset($_GET['view_brands'])) {
                    include('view_brands.php');
                }
                if (isset($_GET['edit_category'])) {
                    include('edit_category.php');
                }
                if (isset($_GET['edit_brands'])) {
                    include('edit_brands.php');
                }
                if (isset($_GET['delete_category'])) {
                    include('delete_category.php');
                }
                if (isset($_GET['delete_brands'])) {
                    include('delete_brands.php');
                }
                if (isset($_GET['list_orders'])) {
                    include('list_orders.php');
                }
                if (isset($_GET['delete_order'])) {
                    include('delete_order.php');
                }
                if (isset($_GET['list_payments'])) {
                    include('list_payments.php');
                }
                if (isset($_GET['delete_payment'])) {
                    include('delete_payment.php');
                }
                if (isset($_GET['list_users'])) {
                    include('list_users.php');
                }
                if (isset($_GET['delete_users'])) {
                    include('delete_users.php');
                }
                if (isset($_GET['message'])) {
                    include('message.php');
                }
                
                if (isset($_GET['admin_logout'])) {
                    include('admin_logout.php');
                }
            ?>
        </div>
        <?php
include("../includes/footer.php");
?>
        <!-- <div class="bg-info p-3 text-center footer">
            <p>All rights reserved Design by Arsalan</p>
        </div> -->
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>