<?php
if (isset($_GET['delete_order'])) {
    $order_id=$_GET['delete_order'];
    $select="DELETE FROM `user_orders` WHERE order_id=$order_id";
    $result=mysqli_query($con,$select);
    if ($result) {
        echo"<script>alert('Order Has been Deleted Succesfully.')</script>";
        echo"<script>window.open('index.php?list_orders','_self')</script>";
    }
}

?>