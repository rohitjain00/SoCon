<?php
session_start();
include '../includes/dbConnect.php';
include '../includes/helper.php';

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
} else {
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
    <div class="container-fluid">
        <div class="row profilePicDiv">
            <span class="col-lg-4"></span>
            <div class="col-lg-4 profileImg">
                <img src="<?=  $_SESSION["profile_img"] ?>"
                     alt="profile pic">
            </div>
            <span class="col-lg-4"></span>
        </div>
    </div>
    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
        <div class="row aboutProfile">
            <div class="col-lg-4 leftSection">
                <i class="fa fa-gift" aria-hidden="true"></i>
                &nbsp; <?= strtoupper($_SESSION['dob']); ?>
                <hr>
                <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                Studied at <?= strtoupper($_SESSION['studyat']); ?>
                <hr>
                <i class="fa fa-briefcase" aria-hidden="true"></i>&nbsp;
                Worked at <?= strtoupper($_SESSION['worksat']); ?>

            </div>
            <div class="col-lg-5 ProfileQuote">
                <div class="card">
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>                        <?= strtoupper($_SESSION['full_name']); ?>
                            </p>

                            <blockquote class="blockquote-footer"><?= strtoupper($_SESSION['status']); ?></blockquote>
                        </blockquote>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 leftSection">
                <i class="fa fa-mobile" aria-hidden="true" style="font-size: 25px"></i>
                &nbsp;
                +91 <?= strtoupper($_SESSION['phone']); ?>

                <hr>
                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                <?= strtoupper($_SESSION['email']); ?>

            </div>
        </div>
    </div>
    <div class="content-width">
        <div class="row">
            <div class="col-4 friendList">
                <div class="footerDiv">
                    <h5>Friends</h5>
                    <div class="list-group">
                        <?php

                        $userId = $_SESSION['userId'];
                        $query = mysqli_query($conn, "Select friendId from friend where currentId = '" . $userId . "';");
                        $numrows = mysqli_num_rows($query);
                        if ($numrows != 0) {
                            while ($row = mysqli_fetch_assoc($query)) {
                                $friendId = $row['friendId'];
                                $friendDetails = userIdToDetails($friendId);

                                echo "
                    <form method='get' action='friendProfile.php' class='profile-friend'>
                        <input type='hidden' name = 'userId' value='" . $friendId . "'>
                        <input type='submit'  value='" . $friendDetails['full_name'] . "' class='list-group-item-action list-group-item-light'>
                    </form>";
                            }
                        }
                        ?>


                    </div>
                    <h5></h5>

                </div>
            </div>
            <div class="col-8 profile-post">
                <?php
                userIdToPostDetails($_SESSION['userId']);
                ?>
            </div>
        </div>
    </div>

    <?php
    include '../includes/footerInclude.php'
    ?>
    </body>
    </html>
    <?php
}
?>