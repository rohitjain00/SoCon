<?php
session_start();
$friendId = $_GET["userId"];
include '../includes/dbConnect.php';
include '../includes/helper.php';

/**
 * @param $conn
 * @param $frinedId
 * @return array
 */
function showFriends($conn, $frinedId)
{
    $query = mysqli_query($conn, "Select friendId from friend where currentId = '" . $frinedId . "';");
    $numrows = mysqli_num_rows($query);
    if ($numrows != 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            $friendId = $row['friendId'];
            $friendDetails = userIdToDetails($friendId);
            $friendIdImage = getProfile_img($friendId);
            echo "
                    <form method='get' action='friendProfile.php' class='profile-friend col-6'>
                        <input type='hidden' name = 'userId' value='\" . $friendId . \"'>
                        <img src='".$friendIdImage."' style='width : 100%; height : auto;'>
                        <input type='submit'  value='" . $friendDetails['full_name'] . "' class='list-group-item-action list-group-item-light'>
                    </form>";
        }
    }
}

/**
 * @param $frinedId
 * @param $conn
 */
function showPosts($frinedId, $conn)
{
    $userId = $frinedId;
    //Result Message
    $query = mysqli_query($conn, "SELECT * FROM post WHERE userId = '" . $userId . "'ORDER BY postId DESC;");
    $numrows = mysqli_num_rows($query);
    if ($numrows != 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            $text = $row['post_text'];
            $time = $row['time'];
            $name = $row['upload_img'];
            $userId = $row['userId'];
            $userIdDetails = userIdToDetails($userId);
            $username = $userIdDetails['user'];
            $full_name = $userIdDetails['full_name'];
            $postId = $row['postId'];

            $hasLikedPost = "";
            if (hasLikedPost($_SESSION['userId'], $postId)) {
                $hasLikedPost = "disabled";
            }

            $numberOfLikes = numberOfLikes($postId);
            $likedPersonDetails = likedPersonDetails($postId);
            $likedPersonDetailsList = implode('<br>', $likedPersonDetails);
            $comments = commentsOnPost($postId);
            $commentsList = implode('', $comments);
            echo "<br>
                <br>
                <div class='card'>
                <div class='card-body'>
                <h5 class='card-title'>$full_name <br><small>By : $username</small></h5>
                <p class='card-text'><small class='text-muted'>Posted on $time</small></p>
                <p class='card-text'>$text</p><br>
                <img src='$name' class='card-img-bottom'><br><br>
                
                <button $hasLikedPost value='$postId' onclick='likeClickHandler($postId)' class='btn btn-danger like-button post-id-$postId' style='    width: 40px;
    border-radius: 50%;
    height: 40px;
    padding: 9px;' type='submit'>
                    <i class='fas fa-heart'></i>
                </button>
                
                <button type='button' class='btn btn-primary number-likes-$postId' data-toggle='modal' data-target='#myModal$postId'>
                
    <span class='number-likes-$postId'> $numberOfLikes</span>
     </button>

  <div class='modal' id='myModal$postId'>
    <div class='modal-dialog'>
      <div class='modal-content'>
      
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class='modal-body'>
         $likedPersonDetailsList
        </div>
        
        <!-- Modal footer -->
        <div class='modal-footer'>
          <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
        </div>
        
      </div>
    </div>
  </div>  
                
                
                <hr>
                <div class='addCommentPannel-$postId'>
                    $commentsList
                </div>
                    <input type='text' class='form-control' id='$postId' style='margin: 2% 0px; ' name='comment-text' placeholder='type your comment..'>
                    <button type='submit' style='width: 25%;' onclick='commentClickHandler($postId)' class='btn btn-info'>Comment</button>
                    
                </div>
                </div>
                ";
        }
    }
}

if (!isset($_SESSION["username"])) {
    echo "<script type='text/javascript'>location.href = '../views/login.php'</script>";

} else {
    $friendDetails = userIdToDetails($friendId);
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
    $frienedId = $_GET["userId"];
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


            <button style="width: 100%; margin: 0 auto;"
                    <?=
                    $_SESSION['userId'] == $friendId ?
                        'disabled' : ''
                    ?>

                                        class="btn btn-primary follow-button-<?= $friendId ?>"
                                        value="<?= $friendDetails['user'] ?>"
                                        onclick="addPersonFriend(<?= $friendId ?>,<?= $_SESSION['userId'] ?> )">
                <span class="follow-button-text">

                     <?php

                     $isFollowing = hasFollowed($_SESSION['userId'], $friendId);
                     $hasFollowed = "Follow";
                     if ($isFollowing) {
                         $hasFollowed = "Unfollow";
                     }
                     if ($_SESSION['userId'] == $friendId) {
                         $hasFollowed = "You";
                     }
                     echo ''.$hasFollowed;
                     ?>

                </span>
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

                            <blockquote
                                    class="blockquote-footer"><?= strtoupper($friendDetails['status']); ?></blockquote>
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
    <?php
    if ($isFollowing) {
    ?>
    <div id="carousel-prev-images">
        <h3 style="text-align: center; margin-bottom: 30px;">Previous Profile Pictures Of You</h3>
        <?php
        $userPrevImages = userAllProfileImages($friendId);
        foreach ($userPrevImages as $userPrevImage) {
            echo "<div class=\"slide\">
        <img src='$userPrevImage'>
    </div>";
        }}
        echo "</div>";
        ?>
    <div class="content-width">
        <div class="row">
            <div class="col-4 friendList">
                <div class="footerDiv">
                    <h5>Friends</h5>
                    <div class="list-group">
                        <div class="row">
                        <?php
                        showFriends($conn, $friendId);
                        ?>
                    </div>
                    </div>
                    <h5></h5>

                </div>
            </div>
            <div class="col-6 profile-post">
                <?php
                showPosts($friendId, $conn);
                ?>
            </div>
        </div>
    </div>

    <?php
    include '../includes/footerInclude.php'
    ?>

    </body>
    </html>
    <script>
        function likeClickHandler(postId) {
            $.ajax({
                type: "POST",
                url: "../handlers/insertLike.php",
                data: {
                    postId: postId
                },
                success: function (data) {
                    // alert(data);
                    console.log(postId);
                    $(".post-id-" + postId).prop("disabled", true);
                    console.log(".post-id-" + postId);
                    $('number-likes-' + postId).text($('number-likes-' + postId).val() + 1);
                }
            });

        }

        function commentClickHandler(postId) {
            $.ajax({
                type: "POST",
                url: "../handlers/insertComment.php",
                data: {
                    text: $("#" + postId).val(),
                    postId: postId
                },
                success: function (data) {
                    // alert(data);
                    // console.log($(".comment-form ." + postId).val());
                    // console.log(postId);
                    // $(postId).css("background-color" , "orange !important");
                    $(".addCommentPannel-" + postId).append("<h3>" + '<?= $_SESSION['username'] ?>' + "</h3><p>&nbsp;&nbsp;&nbsp;" + $("#" + postId).val() + "</p><hr>");

                }
            });
        }

        function addPersonFriend(friendId, userId) {
            $.ajax({
                type: "POST",
                url: "../handlers/insertFriend.php",
                data: {
                    friendId: friendId,
                    userId: userId
                },
                success: function (data) {
                    var elem = document.getElementsByClassName("follow-button-text");
                    if (elem.value==="Follow") elem.value = "Unfollow";
                    else elem.value = "Follow";

                    console.log(friendId + " " + userId);
                }
            });
        }
    </script>
    <?php
}
?>