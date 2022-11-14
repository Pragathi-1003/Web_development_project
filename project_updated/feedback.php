<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];
if(isset($_POST['update_profile'])){

$update_feed = mysqli_real_escape_string($conn, $_POST['update_feed']);
mysqli_query($conn, "UPDATE `user_form` SET feed = '$update_feed' WHERE id = '$user_id'") or die('query failed');
}
$message[] = 'Thank You for your feedback!';
   ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>feedback</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">


   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/feed.css">

 </head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
   
<div class="form-container">

   <form action="" method="post">
      <h3>PROVIDE FEEDBACK</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <form class="was-validated">
     <div class="mb-3">
    <label for="validationTextarea" class="form-label"></label>
    <textarea class="form-control" id="validationTextarea" placeholder="Please enter the message here" required></textarea>
    <div class="invalid-feedback">
      Please enter a message in the textarea.
    </div>
       </div>
      <input type="submit" name="update_profile" value="Submit" class="form-btn">
   </form>

</div>

</body>
</html>