<?php
//DB Connection
$conn = new mysqli('localhost', 'xrjx', '123') or die(mysqli_error());
//Select DB From database
$db = mysqli_select_db($conn, 'test') or die("database error");
//Selecting database
?>