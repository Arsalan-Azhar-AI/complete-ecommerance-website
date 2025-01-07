<?php
include('./includes/connect.php');
if(isset($_POST["send"])){
    $user_name=$_POST["user_name"];
    $user_email=$_POST["user_email"];
    $user_message=$_POST["user_message"];
    $datetime = date('Y-m-d H:i:s');
    $select="INSERT INTO `contact`(`user_name`, `user_email`, `user_message`) VALUES ('$user_name','$user_email','$user_message')";
    $result=mysqli_query($con,$select);
    if($result){
        echo"<script>alert('Success')</script>";

        $to = 'arsalanazhar2003@gmail.com';  // Your Gmail address
        $subject = 'New Message from Contact Form';
        $message = "user_name: $user_name\nuser_email: $user_email\nuser_message: $user_message \ndate&time: $datetime";
        $headers = "From: contact-form@example.com";
    
        // Send the email
        mail($to, $subject, $message, $headers);
    
        echo "Data inserted successfully!";
    } else {
        echo "Error: " ;
        // echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    }

    $con->close();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Contact Us</title>
    <style>
        /* Reset some default styles */
 body, h1, p, form {
    margin: 0;
    padding: 0;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
}

.contact-container {
    max-width: 800px;
    margin: 0 auto;
    padding: 40px;
    text-align: center;
}

h1 {
    color: #333;
    font-size: 36px;
    margin-bottom: 10px;
}

p {
    color: #666;
    font-size: 18px;
    margin-bottom: 30px;
}

.contact-form input,
.contact-form textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.contact-form textarea {
    height: 150px;
}

.contact-form button {
    background-color: #333;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.contact-form button:hover {
    background-color: #555;
}

/* Media Query for small screens */
@media (max-width: 600px) {
    .contact-container {
        padding: 20px;
    }
}



    </style>
</head>
<body>
    <div class="contact-container">
        <h1>Contact Us</h1>
        <p>We'd love to hear from you. Feel free to get in touch with us!</p>
        <form class="contact-form" method="post">
            <input type="text" name="user_name" placeholder="Your Name" required>
            <input type="email" name="user_email" placeholder="Your Email" required>
            <textarea placeholder="Your Message" name="user_message" required></textarea>
            <button type="submit" name="send">Send Message</button>
        </form>
    </div>
</body>
</html> 

