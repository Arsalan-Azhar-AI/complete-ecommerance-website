<?php
if (isset($_GET['delete_users'])) {
    $delete_users=$_GET['delete_users'];
    $select="DELETE FROM `user_table` WHERE user_id=$delete_users";
    $result=mysqli_query($con,$select);
    if ($result) {
        echo"<script>alert('User Has been Deleted Succesfully.')</script>";
        echo"<script>window.open('index.php?list_users','_self')</script>";
    }
}

?>