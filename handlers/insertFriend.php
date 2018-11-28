<?php
include '../includes/dbConnect.php';
session_start();
$friendId = $_POST['friendId'];
$userId = $_POST['userId'];
$sql = "SELECT * from friend where currentId = '".$userId."' and friendId = '".$friendId."'";
$query = mysqli_query($conn, $sql);
$numrows = mysqli_num_rows($query);
if ($numrows > 0) {
    $sql = "delete from friend where currentId = '".$userId."' and friendId = '".$friendId."'";
    $result = mysqli_query($conn, $sql);
} else {
    $sql = "INSERT into friend (friendId, currentId) values ('$friendId', '$userId') ";
    $result = mysqli_query($conn, $sql);
}
