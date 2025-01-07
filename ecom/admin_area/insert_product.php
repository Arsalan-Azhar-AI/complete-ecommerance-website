<?php
include('../includes/connect.php');
if (isset($_POST['insert_product'])) {
   $product_title=$_POST['product_title'];
   $description=$_POST['product_description'];
   $product_keywords=$_POST['product_keywords'];
   $product_category=$_POST['product_category'];
   $product_brand=$_POST['product_brands'];
   $product_price=$_POST['product_price'];
   $product_status='true';

   $image1=$_FILES['product_image1']['name'];
   $temp_image1=$_FILES['product_image1']['tmp_name'];
   move_uploaded_file( $temp_image1,"./product_images/$image1");
   $image2=$_FILES['product_image2']['name'];
   $temp_image2=$_FILES['product_image2']['tmp_name'];
   move_uploaded_file( $temp_image2,"./product_images/$image2");
   $image3=$_FILES['product_image3']['name'];
   $temp_image3=$_FILES['product_image3']['tmp_name'];
   move_uploaded_file( $temp_image1,"./product_images/$image3");


    if($product_title=='' or $description=='' or $product_keywords=='' or $product_category=='' or $product_brand=='' or $product_price==''){
        echo"<script> alert('please fill all the fields')</script>";
        exit();
       }
       else{
    
        $insert_product = "INSERT INTO `products`(`product_title`,`product_description`,`product_keywords`, `category_id`, `brand_id`,`product_image1`,`product_image2`,`product_image3`,`product_price`,`date`,`status`) VALUES ('$product_title','$description','$product_keywords','$product_category','$product_brand','$image1','$image2','$image3','$product_price',NOW(),'$product_status')";


        $result_query = mysqli_query($con, $insert_product);

        if ($result_query) {
            echo"<script>alert('Successfully Inserted the Product.')</script>";
        }
    }   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products-Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Product</h1>
        <form action="" enctype="multipart/form-data" method="post">
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product Title" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Product description</label>
                <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter Product description" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">Product keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter Product keywords" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="">Select a Category</option>
                    <?php
$select_query = "SELECT * FROM `categories`;";
$result_query = mysqli_query($con, $select_query);
while ($row = mysqli_fetch_assoc($result_query)) {
    $category_title = $row['category_title'];
    $category_id = $row['category_id'];
    echo "<option value='$category_id'>$category_title</option>";
}
?>

                </select>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brands" id="" class="form-select">
                    <option value="">Select a Brands</option>
                    <?php
                    $select_query="SELECT * FROM `brands`";
                    $result_query=mysqli_query($con,$select_query);
                    while ($row=mysqli_fetch_assoc($result_query)) {
                        $brand_title=$row['brand_title'];
                        $brand_id=$row['brand_id'];
                        echo"<option value='$brand_id'>$brand_title</option>";
                    }
                    ?>

                </select>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product Image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product Image 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product Image 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter Product Price" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="mb-3 px-3 btn btn-info" value="Insert Products">
            </div>
        </form>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>

