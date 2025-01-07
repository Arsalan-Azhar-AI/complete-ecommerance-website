<?php
if (isset($_GET['delete_brands'])) {
    $delete_brand=$_GET['delete_brands'];
    $delet_quey="DELETE FROM `brands` WHERE brand_id=$delete_brand";
    $result=mysqli_query($con,$delet_quey);
    if ($result) {
        echo"<script>alert('Brand has been Deleted successfully')</script>";
        echo"<script>window.open('./index.php?view_brands','_self')</script>";
    
    }
}

?>
