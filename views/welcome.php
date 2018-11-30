<?php
session_start();
if(!isset($_SESSION["username"])){
    echo"<script type='text/javascript'>location.href = '../views/login.php'</script>";
}
else
{
    ?>
    <!doctype html>
    <html>
    <head>
        <title>SoCon : Social Connectivity</title>
       <?php
       include '../includes/headerInclude.php';
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
            <div class="col-lg-5 col-md-5 col-xl-5 maxHeight" style="margin-left: -60px;">
                <?php
                include '../components/timeline.php';
                ?>
            </div>

            <div class="chat-box-main">
                <?php
                include '../components/chatBox.php';
                ?>
            </div>

            <div class="footer col-lg-2 col-md-2 col-xl-2">
                <?php
                include '../components/footer.php';
                ?>
            </div>
        </div>
    </div>

    <?php
    include '../components/sideButton.php';
    include '../includes/footerInclude.php';
    ?>
    </body>
    </html>
    <?php
}
?>