<script src="https://www.google.com/recaptcha/api.js"></script>
<?php
@session_start();
include("../includes/connect.php");
include("../functions/common_function.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        body{
            overflow-x:hidden;
        }
    </style>
</head>
<body>
<div class="container-fluid my-3">
    <h2 class="text-center">
       User Login
    </h2>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6">
            <form action="" enctype="multipart/form-data" method="post">
                <div class="form-outline mb-4">
                    <label for="user_username" class="form-lable">Username</label>
                    <input type="text" id="user_username" class="form-control" placeholder="Enter Your User name" autocomplete="off" required="required" name="user_username">
                </div>

                <div class="form-outline mb-4 mt-5">
                    <label for="user_password" class="form-lable">User Password</label>
                    <input type="password" id="user_password" class="form-control" placeholder="Enter Your User Password" autocomplete="off" required="required" name="user_password">
                </div>
                <div class="g-recaptcha" data-sitekey="6LftBMYnAAAAAJfNN9Qy7eW1uV4SL6-ql8mRKmlV"></div>

                <div class="mt-4 pt-2">
                    <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="user_login">
                    <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account?<a href="user_registration.php" class="text-danger"> Register </a></p>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>

<?php
if (isset($_POST['user_login'])) {
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];

    $select_query="SELECT * FROM `user_table` WHERE user_name='$user_username'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $user_ip=getIPAddress();

    
    $select_query_cart="SELECT * FROM `cart_details` WHERE 	ip_address='$user_ip'";
    $select_cart=mysqli_query($con,$select_query_cart);
    $rows_count_cart=mysqli_num_rows($select_cart);

    
    if ($rows_count>0) {
        $_SESSION['username']=$user_username;
       if (password_verify($user_password,$row_data['user_password'])) {
            if ($rows_count==1 and $rows_count_cart==0) {
                $_SESSION['username']=$user_username;
                echo "<script>alert('Login Successful.')</script>";
                header('Location: profile.php');
            }
            else{
                $_SESSION['username']=$user_username;
                echo "<script>alert('Login Successful.')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
            }
        
       }
       else{
        echo "<script>alert('Invalid credentialed')</script>";
       }
    }
    else{
        echo "<script>alert('Invalid credentialed')</script>";
    }
}
?>