<?php
if (isset($_GET['delete_category'])) {
    $delete_category=$_GET['delete_category'];
    $delet_quey="DELETE FROM `categories` WHERE category_id=$delete_category";
    $result=mysqli_query($con,$delet_quey);
    if ($result) {
        echo"<script>alert('Category has been Deleted successfully')</script>";
        echo"<script>window.open('./index.php?view_categories','_self')</script>";
    
    }
}

?>