<?php
session_start();
if (isset($_GET['admin_logout'])) {
    $username=$_SESSION['username'];
    $select="DELETE FROM `admin_table` WHERE `admin_table`.`admin_name`='$username'";
    $result=mysqli_query($con,$select);
    if ($result) {
        echo "<script>alert('Your are successfully Logout.')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
    }
    
 }

?>