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
       <?php
        include 'headerInclude.php'
        ?>
         </head>

    <body>
    <?php
    include 'navbar.php';
    ?>
    <div class="container-fluid" style="padding-top: 20px;">
        <div class="row allRow">
            <div class="col-lg-2 col-md-2 col-xl-2 mainSideBar maxHeight">
                <?php
                    include 'mainPageSideBar.php';
                ?>
            </div>
            <div class="col-lg-5 col-md-5 col-xl-5 maxHeight">
                <?php
                include 'timeline.php';
                ?>
            </div>
            <div class="col-lg-3 col-md-3 col-xl-3 maxHeight extracss">
                <?php
                    include 'extra.php';
                ?>
            </div>
            <div class=" footer">
                <?php
                include 'footer.php';
                ?>
            </div>
        </div>
    </div>

    <?php
    include 'sideButton.php';
    include 'footerInclude.php';
    ?>
    </body>
    </html>
    <?php
}
?>