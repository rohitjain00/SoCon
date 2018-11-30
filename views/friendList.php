<!doctype html>
<html>
<head>
    <title>SoCon : Social Connectivity</title>
    <?php
    include '../includes/dbConnect.php';
    include '../includes/headerInclude.php';
    include '../includes/helper.php';
    session_start();
    ?>
</head>

<body>
<?php
include '../components/navbar.php';
?>
<div class="container-fluid" style="padding-top: 20px;">
    <div class="row allRow">
        <div class="col-lg-2 col-md-2 col-xl-2 mainSideBar maxHeight">
            <?php
            include '../components/mainPageSideBar.php';
            ?>
        </div>
        <div class="col-lg-1 col-md-1 col-xl-1"></div>
        <div class="col-lg-5 col-md-5 col-xl-5 maxHeight">
        <div class="row">
            <?php

            /**
             * @param $conn
             */

            displayFriends($_SESSION['userId']);
            ?>
        </div>
        </div>

        <div class="col-lg-2 col-md-2 col-xl-2"></div>
        <!--            <div class="col-lg-3 col-md-3 col-xl-3 maxHeight extracss">-->
        <!--                --><?php
        //                    include 'extra.php';
        //                ?>
        <!--            </div>-->

    </div>
</div>

<?php
include '../components/sideButton.php';
include '../includes/footerInclude.php';
?>
</body>
</html>

