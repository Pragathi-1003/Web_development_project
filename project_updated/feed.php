<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(isset($_POST['update_profile'])){

   $update_feed = mysqli_real_escape_string($conn, $_POST['update_feed']);

   mysqli_query($conn, "UPDATE `user_form` SET feed = '$update_feed' WHERE id = '$user_id'") or die('query failed');

  
         $message[] = 'Thank You for your feedback!';
      }
   

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Feedback</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <style>
    h1{
        text-align:center;
    }
    </style>


</head>
<body>

   
<div class="update-profile">

   <?php
      $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);

      }
   ?>

   <form action="" method="post" enctype="multipart/form-data">
   <?php
        {
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
        }
    }
         ?>
      <div class="flex">
         <div class="inputBox">
            <h1> Provide Feedback </h1>
            <input type="text" name="update_feed" placeholder="Please type here" class="box">
         </div>
         </div>
      <input type="submit" value="Submit" name="update_profile" class="btn">
      
   </form>

</div>

</body>
</html>