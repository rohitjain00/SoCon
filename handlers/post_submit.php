<?php
session_start();
$userId = $_SESSION['userId'];
//echo $userId;


//Check if the file is well uploaded
  if($_FILES['file']['error'] > 0) { echo 'Error during uploading, try again'; }

  $extsAllowed = array( 'jpg', 'jpeg', 'png', 'gif' );
    
  $extUpload = strtolower( substr( strrchr($_FILES['file']['name'], '.') ,1) ) ;
 
  if (in_array($extUpload, $extsAllowed) ) {

      $name = "../post_img/{$_FILES['file']['name']}" . "." . mt_rand(100000, 999999);
      $result = move_uploaded_file($_FILES['file']['tmp_name'], $name);
      include '../includes/dbConnect.php';

      $text = $_POST['Status'];
      $sql = "INSERT INTO post(userId,post_text,upload_img) 
            VALUES('$userId','$text','$name');";
      $result = mysqli_query($conn, $sql);
  }
?>
<script type="text/javascript">location.href = '../views/welcome.php';</script>

