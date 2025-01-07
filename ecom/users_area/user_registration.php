<?php
include("../includes/connect.php");
include("../functions/common_function.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid my-3">
    <h2 class="text-center">
        New User Registration
    </h2>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6">
            <form action="" enctype="multipart/form-data" method="post">
                <div class="form-outline mb-4">
                    <label for="user_username" class="form-lable">Username</label>
                    <input type="text" id="user_username" class="form-control" placeholder="Enter Your User name" autocomplete="off" required="required" name="user_username">
                </div>

                <div class="form-outline mb-4">
                    <label for="user_email" class="form-lable">User Email</label>
                    <input type="email" id="user_email" class="form-control" placeholder="Enter Your User Email" autocomplete="off" required="required" name="user_email">
                </div>

                <div class="form-outline mb-4">
                    <label for="user_image" class="form-lable">User Image</label>
                    <input type="file" id="user_image" class="form-control" required="required" name="user_image">
                </div>

                <div class="form-outline mb-4">
                    <label for="user_password" class="form-lable">User Password</label>
                    <input type="password" id="user_password" class="form-control" placeholder="Enter Your User Password" autocomplete="off" required="required" name="user_password">
                </div>

                <div class="form-outline mb-4">
                    <label for="conf_user_password" class="form-lable">Confirm Password</label>
                    <input type="password" id="conf_user_password" class="form-control" placeholder="Enter Your Confirm Password" autocomplete="off" required="required" name="conf_user_password">
                </div>

                <div class="form-outline mb-4">
                    <label for="user_address" class="form-lable">User Address</label>
                    <input type="text" id="user_address" class="form-control" placeholder="Enter Your User Address" autocomplete="off" required="required" name="user_address">
                </div>

                <div class="form-outline mb-4">
                    <label for="user_contact" class="form-lable">User Contact</label>
                    <input type="text" id="user_contact" class="form-control" placeholder="Enter Your User Mobile No" autocomplete="off" required="required" name="user_contact">
                </div>
                <div class="mt-4 pt-2">
                    <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="user_register">
                    <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account?<a href="user_login.php" class="text-danger"> Login </a></p>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>

<?php
if (isset($_POST['user_register'])) {
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $conf_user_password=$_POST['conf_user_password'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];
    $user_ip=getIPAddress();

    $select_query="SELECT * FROM `user_table` WHERE user_name='$user_username' or user_email='$user_email'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);

    if ($rows_count>0) {
        echo "<script>alert('Username or email are already exist.')</script>";
    }
    elseif ($user_password!=$conf_user_password) {
        echo "<script>alert('Passwords do not match.')</script>";
    }
    else {
        move_uploaded_file($user_image_tmp,"./user_images/$user_image");
        $insert_query="INSERT INTO `user_table`( `user_name`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES ('$user_username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_contact')";
        $sql_execute=mysqli_query($con,$insert_query);
        if ($sql_execute) {
            echo "<script>alert('Success')</script>";
        }
        else {
            die(mysqli_error($con));
        }

        $select_cart_items="SELECT * FROM `cart_details` WHERE ip_address='$user_ip'";
        $result_cart=mysqli_query($con,$select_cart_items);

        $rows_count=mysqli_num_rows($result_cart);
    if ($rows_count>0) {
        $_SESSION['username']=$user_username;
        echo "<script>alert('You have items in your cart.')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    }
    else{
        echo "<script>window.open('../index.php','_self')</script>";
    }
    }
   
}


?>