<?php
session_start();
$userId = $_SESSION['userId'];
$postText = $_POST['Status'];
//echo $userId;


//Check if the file is well uploaded
  if($_FILES['file']['error'] > 0 && !empty($postText)) { echo 'Error during uploading, try again';
  } else {

$extensionsAllowed = array( 'jpg', 'jpeg', 'png', 'gif' );

$extensionsUploaded = strtolower( substr( strrchr($_FILES['file']['name'], '.') ,1) ) ;

if (in_array($extensionsUploaded, $extensionsAllowed) ) {

    $imageName = "../post_img/{$_FILES['file']['name']}" . "." . mt_rand(100000, 999999);
    $result = move_uploaded_file($_FILES['file']['tmp_name'], $imageName);

} else{
    $imageName = "";
}
include '../includes/dbConnect.php';

$query = "INSERT INTO post(userId,post_text,upload_img) VALUES('$userId','$postText','$imageName');";
$result = mysqli_query($conn, $query);

  }
?>
<script type="text/javascript">location.href = '../views/welcome.php';</script>

