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
        <?php
        include 'headerInclude.php'
        ?>
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
            <div class="col=lg-3 footer">
                <?php
                include 'footer.php';
                ?>
            </div>
        </div>
    </div>
    <?php
        include 'sideButton.php';
?>
    <?php
    include "footerInclude.php";
    ?>
    </body>
    </html>
    <?php
}
?>