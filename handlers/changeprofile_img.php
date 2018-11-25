<?php
session_start();
$userId = $_SESSION['userId'];
//echo $userId;


//Check if the file is well uploaded
if($_FILES['file']['error'] > 0) { echo 'Error during uploading, try again'; }

$extsAllowed = array( 'jpg', 'jpeg', 'png', 'gif' );

$extUpload = strtolower( substr( strrchr($_FILES['file']['name'], '.') ,1) ) ;

if (in_array($extUpload, $extsAllowed) ) {

    $name = "../profile_img/{$_FILES['file']['name']}".".". mt_rand(100000, 999999);
    $result = move_uploaded_file($_FILES['file']['tmp_name'], $name);
    include '../includes/dbConnect.php';

    $text= $_POST['Status'];
    $sql = "INSERT INTO profile_img(userId,profile_img) 
            VALUES('$userId','$name');";
    $result = mysqli_query($conn, $sql);
$_SESSION['profile_img']=$name;

    } else {
    echo 'File is not valid. Please try again';
}
?>
<script type="text/javascript">location.href = '../views/accountSettings.php';</script>

