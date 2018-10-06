<?php
session_start();
if(!isset($_SESSION["sess_user"])){
    header("Location: login.php");
}
else
{
    ?>
    <!doctype html>
    <html>
    <head>
        <title>SoCon : Social Connectivity</title>
    </head>
    <h1>Welcome to SoCon</h1>
    <p>This is Login Page</p>
    <?=$_SESSION['sess_user'];?>!<a href="logout.php">Logout</a>
    <body>
    </body>
    </html>
    <?php
}
?>