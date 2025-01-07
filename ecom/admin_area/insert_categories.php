<?php
error_reporting(0);
include("../includes/connect.php");
if (isset($_POST['insert_cat'])) {
  $category_title = $_POST['cat_title'];
  $select_query="SELECT * FROM `categories` WHERE category_title='$category_title'";
  $result_select= mysqli_query($con, $select_query);
$number=mysqli_num_rows($result_select);
if($number>0){
  echo "<script>alert('This Category already present in the database');</script>";
}
else{
  $insert_query = "INSERT INTO `categories`(`category_title`) VALUES ('$category_title')";
  $result = mysqli_query($con, $insert_query);
  if ($result) {
    echo "<script>alert('Category has been inserted successfully');</script>";
  }
}
}
?>
<h2 class="text-center">Insert Categories</h2>
<form class="mb-2" method="post">
<div class="input-group w-90  mb-2">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" name="cat_title" class="form-control" placeholder="Insert Categories" aria-label="categories" aria-describedby="basic-addon1">
</div>

<div class="input-group w-10  mb-2 m-auto">
<input type="submit" class="border-0 p-0 my-3 bg-info" name="insert_cat" value="Insert Categories" aria-label="categories" aria-describedby="basic-addon1">
</div>
</form>
