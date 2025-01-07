<?php
if (isset($_GET['delete_payment'])) {
    $order_id=$_GET['delete_payment'];
    $select="DELETE FROM `user_payments` WHERE payment_id=$order_id";
    $result=mysqli_query($con,$select);
    if ($result) {
        echo"<script>alert('Payment Has been Deleted Succesfully.')</script>";
        echo"<script>window.open('index.php?list_payments','_self')</script>";
    }
}

?>