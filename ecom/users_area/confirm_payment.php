<?php
      include('../includes/connect.php');
   session_start();
   if (isset($_GET['order_id'])) {
      $order_id=$_GET['order_id'];
      $select_data="SELECT * FROM `user_orders` WHERE order_id=$order_id";
      $result=mysqli_query($con,$select_data);
      $row_fetch=mysqli_fetch_assoc($result);
      $invoice_number=$row_fetch['invoice_number'];
      $amount_due=$row_fetch['amount_due'];
   }
   if (isset($_POST['confirm_payment'])) {
      $invoice_number=$_POST['invoice_number'];
      $amount=$_POST['amount'];
      $payment_mode=$_POST['payment_mode'];
      $insert_query="INSERT INTO `user_payments`(`order_id`, `invoice_number`, `amount`, `payment_mode`) VALUES ($order_id,$invoice_number,$amount,'$payment_mode')";
      $result=mysqli_query($con,$insert_query);
      if ($result) {
         echo"<h3 class='text-center text-light'>Successfully Completed the Payment.</h3>";
         echo"<script>window.open('profile.php?my_orders','_self')</script>";
      }
      $update_order="UPDATE `user_orders` SET `order_status`='Complete' WHERE order_id=$order_id";
      $result_order=mysqli_query($con,$update_order);
   }
?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
  </head>
  <body class="bg-secondary">
  
   <div class="container my-5">
   <h1 class="text-light text-center">
      Confirm Payment
   </h1>
      <form action="" method="post">
         <div class="form-outline my-4 text-center w-50 m-auto">
            <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $invoice_number; ?>">
         </div>
         <div class="form-outline my-4 text-center w-50 m-auto">
            <label class="text-light">amount</label>
            <input type="text" value="<?php echo $amount_due; ?>" class="form-control w-50 m-auto" name="amount">
         </div>
         <div class="form-outline my-4 text-center w-50 m-auto">
           <select name="payment_mode" class="form-select w-50 m-auto">
            <option value="">Select Payment Mode</option>
            <option value="UPI">UPI</option>
            <option value="Netbanking">Netbanking</option>
            <option value="Paypal">Paypal</option>
            <option value="Cash on Delivery">Cash on Delivery</option>
            <option value="Payoffline">Payoffline</option>
         </select>

         </div>
         <div class="form-outline my-4 text-center w-50 m-auto">
           <input type="submit" value="Confirm" name="confirm_payment" class="bg-info py-2 px-3 border-0">
         </div>
      </form>
   </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>