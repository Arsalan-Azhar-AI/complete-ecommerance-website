<?php
// include("./includes/connect.php");
// get product
function getproducts(){
  if (!isset($_GET['category'])){
    if (!isset($_GET['brand'])) {
    global $con;
    $select_query="select * from `products` order by rand() limit 0,9";
    $result_query=mysqli_query($con,$select_query);
    while ($row=mysqli_fetch_assoc($result_query)) {
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      $product_image1=$row['product_image1'];
      $product_price=$row['product_price'];
      $category_id=$row['category_id'];
      $brand_id=$row['brand_id'];
      echo "   <div class='col-md-4 mb-2'> 
      <div class='card' style='width: 18rem;'>
        <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
          <div class='card-body'>
             <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <p class='card-text'>price:$product_price/-</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
  <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
</div>
</div>
    </div>
";

    }
  }
}
}
// get unique category
function get_unique_category(){
  global $con;
  if (isset($_GET['category'])){
    $category_id=$_GET['category'];
    $select_query="select * from `products` where category_id=$category_id";
    $result_query=mysqli_query($con,$select_query); 
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows==0){
      echo "<h2 class='text-center text-danger'>No stock for this category.</h2>";
    }
    while ($row=mysqli_fetch_assoc($result_query)) {
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      $product_image1=$row['product_image1'];
      $product_price=$row['product_price'];
      $category_id=$row['category_id'];
      $brand_id=$row['brand_id'];
      echo "   <div class='col-md-4 mb-2'>
      <div class='card' style='width: 18rem;'>
        <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
          <div class='card-body'>
             <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <p class='card-text'>price:$product_price/-</p>
              <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
</div>
</div>
    </div>
";

    }
  }
}

// get unique brand
function get_unique_brand(){
  global $con;
  if (isset($_GET['brand'])){
    $brand_id=$_GET['brand'];
    $select_query="select * from `products` where brand_id=$brand_id";
    $result_query=mysqli_query($con,$select_query); 
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows==0){
      echo "<h2 class='text-center text-danger'>No stock for this brand.</h2>";
    }
    while ($row=mysqli_fetch_assoc($result_query)) {
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      $product_image1=$row['product_image1'];
      $product_price=$row['product_price'];
      $category_id=$row['category_id'];
      $brand_id=$row['brand_id'];
      echo "   <div class='col-md-4 mb-2'>
      <div class='card' style='width: 18rem;'>
        <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
          <div class='card-body'>
             <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <p class='card-text'>price:$product_price/-</p>
              <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
</div>
</div>
    </div>
";

    }
  }
}


// get brands
function getbrands() {
    global $con;
    $select_brands = "SELECT * FROM brands";
    $result_brands = mysqli_query($con, $select_brands);
    
    while ($row_data = mysqli_fetch_assoc($result_brands)) {
        $brand_title = $row_data['brand_title'];
        $brand_id = $row_data['brand_id'];
        echo "<li class='nav-item'><a href='#' class='nav-link text-white'><a style='color:white;'href='index.php?brand=$brand_id'>$brand_title</a></li>";
    }
}

//   get categories
function getcategories(){
    global $con;
    $select_categories="select * from categories";
  $result_categories=mysqli_query($con,$select_categories);
// echo 
while ($row_data=mysqli_fetch_assoc($result_categories)) {
 $category_title=$row_data['category_title'];
 $category_id=$row_data['category_id'];
 echo "<li class='nav-item'><a href='#' class='nav-link text-white'><a style='color:white;'href='index.php?category=$category_id'>$category_title</a></li>";
}

}  

// getting all proucts
function get_all_products(){
  if (!isset($_GET['category'])){
    if (!isset($_GET['brand'])) {
      
    
   

    global $con;
    $select_query="select * from `products` order by rand()";
    $result_query=mysqli_query($con,$select_query);
    while ($row=mysqli_fetch_assoc($result_query)) {
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      $product_image1=$row['product_image1'];
      $product_price=$row['product_price'];
      $category_id=$row['category_id'];
      $brand_id=$row['brand_id'];
      echo "   <div class='col-md-4 mb-2'>
      <div class='card' style='width: 18rem;'>
        <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
          <div class='card-body'>
             <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <p class='card-text'>price:$product_price/-</p>
              <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
</div>
</div>
    </div>
";

    }
  }
}
}
// search products function
function search_products(){
    global $con;
    if (isset($_GET['search_data_product'])) {
      $search_data_value = $_GET['search_data'];

      $search_query = "SELECT * FROM `products` WHERE product_keywords LIKE '%$search_data_value%'";
    $result_query=mysqli_query($con,$search_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows==0){
      echo "<h2 class='text-center text-danger'>No results found.No products found on this category.</h2>";
    }
    while ($row=mysqli_fetch_assoc($result_query)) {
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      $product_image1=$row['product_image1'];
      $product_price=$row['product_price'];
      $category_id=$row['category_id'];
      $brand_id=$row['brand_id'];
      echo "   <div class='col-md-4 mb-2'>
      <div class='card' style='width: 18rem;'>
        <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
          <div class='card-body'>
             <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <p class='card-text'>price:$product_price/-</p>
              <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
</div>
</div>
    </div>
";
    }
    }
  }
  // view details function
  function view_details(){
    if ($_GET['product_id']) {
      
    
    if (!isset($_GET['category'])){
      if (!isset($_GET['brand'])) {
        
      
     
  
      global $con;
      $product_id=$_GET['product_id'];
      $select_query="select * from `products` where product_id=$product_id";
      $result_query=mysqli_query($con,$select_query);
      while ($row=mysqli_fetch_assoc($result_query)) {
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_image1=$row['product_image1'];
        $product_image2=$row['product_image2'];
        $product_image3=$row['product_image3'];
        $product_price=$row['product_price'];
        $category_id=$row['category_id'];
        $brand_id=$row['brand_id'];
        echo "   <div class='col-md-4 mb-2'>
        <div class='card' style='width: 18rem;'>
          <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
               <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>price:$product_price/-</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
    <a href='index.php?product_id=$product_id' class='btn btn-secondary'>Go Home</a>
  </div>
  </div>
      </div>
      <div class='col-md-8'>
      <div class='row'>
          <div class='col-md-12'>
              <h4 class='text-center text-info mb-5'>Related products.</h4>
          </div>
          <div class='col-md-6'>
`               <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='$product_title'>
          </div>
          <div class='col-md-6'>
          <img src='./admin_area/product_images/$product_image3' class='card-img-top' alt='$product_title'>
          </div>
      </div>
  </div>
  ";
  
      }
    }
    }
  }
  }
  // get ip address function

    function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// cart function
function cart(){
  if (isset($_GET['add_to_cart'])) {
    global $con;
    $ip = getIPAddress();
    $get_product_id=$_GET['add_to_cart'];
    $select_query="SELECT * FROM `cart_details` WHERE ip_address='$ip' and product_id=$get_product_id";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows>0){
      echo "<script>alert('This item is also present inside the cart.')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }
    else{
      $insert_query="INSERT INTO `cart_details`(`product_id`,`ip_address`, `quantity`) VALUES ($get_product_id,'$ip',0)";
      $result_query=mysqli_query($con,$insert_query);
      echo "<script>alert('Item is add to Cart.')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }
  }
}
// fuction to get cart items
function cart_item(){
  if (isset($_GET['add_to_cart'])) {
    global $con;
    $ip = getIPAddress();
    $select_query="SELECT * FROM `cart_details` WHERE ip_address='$ip'";
    $result_query=mysqli_query($con,$select_query);
    $count_cart_items=mysqli_num_rows($result_query);
  }
  else{
    global $con;
    $ip = getIPAddress();
    $select_query="SELECT * FROM `cart_details` WHERE ip_address='$ip'";
    $result_query=mysqli_query($con,$select_query);
    $count_cart_items=mysqli_num_rows($result_query);
    }
    echo "$count_cart_items";
  }
// fuction for total price
function total_cart_price(){
  global $con;
  $ip = getIPAddress();
  $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$ip'";
  $total = 0;
  $result = mysqli_query($con, $cart_query);
  
  while($row = mysqli_fetch_array($result)) {
    $product_id = $row['product_id'];
    $select_product = "SELECT * FROM `products` WHERE product_id='$product_id'";
    $result_products = mysqli_query($con, $select_product);
    
    while ($row_product_price = mysqli_fetch_array($result_products)){
      $product_price = $row_product_price['product_price'];
      $total += $product_price;
    }
  }
  
  echo $total;
}

// get user order details 
function get_user_order_details(){
  global $con;
  $username=$_SESSION['username'];
  $get_details = "SELECT * FROM `user_table` WHERE user_name='$username'";

  $result_query=mysqli_query($con,$get_details);
  while ($row_query=mysqli_fetch_array($result_query)) {
    $user_id=$row_query['user_id'];
    if (!isset($_GET['edit_account'])) {
      if (!isset($_GET['my_orders'])) {
        if (!isset($_GET['delete_account'])) {
          $get_orders="SELECT * FROM `user_orders` WHERE user_id=$user_id and order_status='pending'";
          $result_orders_query=mysqli_query($con,$get_orders);
          $row_count=mysqli_num_rows($result_orders_query);
          if ($row_count>0) {
           
            echo "<h3 class='text-center text-success mt-5 mb-2'>You have <span class='tect-danger'>$row_count</span> Pending Orders.</h3>
            <p class='text-center'><a href='profile.php?my_orders' class='text-dark' >Orders Details</a></p>";
          }else{
            echo "<h3 class='text-center text-success mt-5 mb-2'>You have zero Pending Orders.</h3>
            <p class='text-center'><a href='../index.php' class='text-dark' >Explore Products</a></p>";
          }
        }
      }
    }
  }
}
?>