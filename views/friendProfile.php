<?php
session_start();
$frinedId = $_GET["userId"];
include '../includes/dbConnect.php';
include '../includes/helper.php';

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
} else {
        $friendDetails = userIdToDetails($frinedId);
    ?>
    <!doctype html>
    <html>
    <head>
        <title>SoCon : Social Connectivity</title>
        <?php
        include '../includes/headerInclude.php'
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
                <img src="<?= getProfile_img($friendDetails['userId']) ?>"
                     alt="profile pic">
            </div>
            <span class="col-lg-4"></span>
        </div>
    </div>
    <div class="row">
        <div style="width: 10%; margin : 0 auto; margin-top: 40px;">
            <?php
            $query = mysqli_query($conn,"select * from friend where currentId='".$_SESSION['userId']."' and friendId = '".$frinedId."'");
            $numrows = mysqli_num_rows($query);
            $hasFollowed = "disabled";
            if($numrows !=0){
                $hasFollowed = "";
            }

            ?>

            <button  style="width: 100%; margin: 0 auto;" value="<?= $friendDetails['user'] ?>" onclick="addPersonFriend()">
                Follow
            </button>

        </div>
    </div>
    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
        <div class="row aboutProfile">
            <div class="col-lg-4 leftSection">
                <i class="fa fa-gift" aria-hidden="true"></i>
                &nbsp; <?= strtoupper($friendDetails['dob']); ?>
                <hr>
                <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                Studied at <?= $friendDetails['studyat'] ?>
                <hr>
                <i class="fa fa-briefcase" aria-hidden="true"></i>&nbsp;
                Worked at <?= $friendDetails['worksat'] ?>


            </div>
            <div class="col-lg-5 ProfileQuote">
                <div class="card">
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p> <?= strtoupper($friendDetails['full_name']); ?>
                            </p>

                            <blockquote class="blockquote-footer"><?= strtoupper($friendDetails['status']); ?></blockquote>
                        </blockquote>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 leftSection">
                <i class="fa fa-mobile" aria-hidden="true" style="font-size: 25px"></i>
                &nbsp;
                +91 <?= strtoupper($friendDetails['phone']); ?>

                <hr>
                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                <?= strtoupper($friendDetails['email']); ?>

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
                        include '../includes/dbConnect.php';

                        $query = mysqli_query($conn, "Select friendId from friend where currentId = '" . $frinedId . "';");
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
                userIdToPostDetails($frinedId);
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
function addPersonFriend() {
//    $sql = "INSERT INTO friend(currentId, friendId)
//                    VALUES('".$_SESSION['username']."','".$username."');";
//    $result = mysqli_query($conn, $sql);
//    //Result Message
//    if($result){
//        echo "Followed";
//    }
//    else
//    {
//        echo "Failure!";
//    }
    echo "hello";
}
?>
