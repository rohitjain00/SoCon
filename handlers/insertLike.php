<?php
include '../includes/dbConnect.php';
session_start();
$postId = $_POST['postId'];
$userId = $_SESSION['userId'];
$sql = "INSERT into like_details values ('$postId', '$userId') ";
$result = mysqli_query($conn, $sql);