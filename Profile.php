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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </head>

    <body>
    <?php
    include 'navbar.php';
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-1" style="border-right: 3px solid #eee">
               <div>

               </div>
            </div>
        </div>
    </div>

    <?=$_SESSION['sess_user'];?>!<a href="logout.php">Logout</a>

    </body>
    </html>
    <?php
}
?>