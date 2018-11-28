<?php
include '../includes/dbConnect.php';
session_start();
$postId = $_POST['postId'];
$userId = $_SESSION['userId'];
$text = $_POST['text'];
$sql = "INSERT into comment_details (postId, userId, text) values ('$postId', '$userId', '$text') ";
$result = mysqli_query($conn, $sql);