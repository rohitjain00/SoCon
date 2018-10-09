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
        <link rel="stylesheet" href="style/style.css">

         </head>

    <body>
    <?php
    include 'navbar.php';
    ?>
    <?=$_SESSION['sess_user'];?>
    <div class="container-fluid">
        <div class="row allRow">
            <div class="col-2 mainSideBar maxHeight">
                <?php
                    include 'mainPageSideBar.php';
                ?>
            </div>
            <div class="col-lg-5 maxHeight">
                <?php
                include 'timeline.php';
                ?>
            </div>
            <div class="col-lg-3 maxHeight extracss">
                <?php
                    include 'extra.php';
                ?>
            </div>
            <div class="col=lg-2">

            </div>
        </div>
    </div>
    <?php
        include 'sideButton.php';
?>

    <!-- Script files-->
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="main.js"></script>
    </body>
    </html>
    <?php
}
?>