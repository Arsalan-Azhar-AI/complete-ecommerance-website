<?php
if (isset($_GET['edit_brands'])) {
    $edit_brand=$_GET['edit_brands'];
    $get_brands="SELECT * FROM `brands` WHERE brand_id=$edit_brand";
    $result=mysqli_query($con,$get_brands);
    $row=mysqli_fetch_assoc($result);
    $brand_title=$row['brand_title'];
}

if (isset($_POST['edit_brand'])) {
    $brand_title=$_POST['brand_title'];
    $update_query="UPDATE `brands` SET `brand_title`='$brand_title' WHERE brand_id=$edit_brand";
    $result_brand=mysqli_query($con,$update_query);
    if ($result_brand) {
        echo"<script>alert('Brand has been updated successfully')</script>";
        echo"<script>window.open('./index.php?view_brands','_self')</script>";
    }
}
?>
<div class="container mt-3">
    <h1 class="text-center">Edit Brand</h1>
    <form action="" class="text-center" method="post">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="category_title" class="form-label">
                Brand Title
            </label>
            <input type="text" name="brand_title" id="brand_title" class="form-control" required="required" value="<?php echo $brand_title; ?>">
        </div>
        <input type="submit" value="Update Brand" class="btn btn-info px-3 mb-3" name="edit_brand">
    </form>
</div>