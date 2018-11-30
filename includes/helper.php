<?php

function test_email($email){
    $email = input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid format and please re-enter valid email";
    }
}
function  test_input($name){
    if(!preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $phone)) {
        echo "Phone number is not valid";
    }
}
function userIdToDetails($userId) {
    include '../includes/dbConnect.php';
    $query = mysqli_query($conn, "SELECT * from userpass where userId = '".$userId."'");
    $numrows = mysqli_num_rows($query);
    if($numrows !=0)
    {
        while($row = mysqli_fetch_assoc($query))
        {
            return $row;
        }
    }
}
function userIdToPostDetails($userId) {
    include '../includes/dbConnect.php';
    $query = mysqli_query($conn, "SELECT * from post WHERE userId = '".$userId."'");
    $numrows = mysqli_num_rows($query);
    if($numrows !=0)
    {
        while($row = mysqli_fetch_assoc($query))
        {
            $text=$row['post_text'];
            $time=$row['time'];
            $name=$row['upload_img'];
            $userId = $row['userId'];
            $userIdDetails = userIdToDetails($userId);
            $username = $userIdDetails['user'];
            $full_name = $userIdDetails['full_name'];

            echo"<br>

                <br>
                <div class='card'>
                <div class='card-body'>
                <h5 class='card-title'>$full_name <br><small>By : $username</small></h5>
                <p class='card-text'><small class='text-muted'>Posted on $time</small></p>
                <p class='card-text'>$text</p><br>
                <img src='$name' class='card-img-bottom'><br><br>
                <input class='btn' type='submit' value='like'>
                <input class='btn' type='submit' value='comment'>
                <div class='comment-timeline'>
                <strong>Username</strong>
                <br>
                &nbsp;&nbsp;&nbsp;&nbsp;-<small>Text</small>
                </div>
                </div>
                </div>";
        }
    }

}
function getProfile_img($userId){
    include '../includes/dbConnect.php';
    $query = mysqli_query($conn, "SELECT * from profile_img where userId = '".$userId."'  order by id desc limit 1;");
    $numrows = mysqli_num_rows($query);
    if($numrows !=0)
    {
        while($row = mysqli_fetch_assoc($query))
        {
            return $row['profile_img'];
        }
    }
}
function userAllProfileImages($userId) {
    include '../includes/dbConnect.php';
    $query = mysqli_query($conn, "SELECT * from profile_img where userId = '".$userId."'  order by id desc;");
    $numrows = mysqli_num_rows($query);
    $toReturn = array();
    if($numrows !=0)
    {
        while($row = mysqli_fetch_assoc($query))
        {
            array_push($toReturn, $row['profile_img']);
        }
    }
    return $toReturn;
}
function hasLikedPost($userId, $postId){
    include '../includes/dbConnect.php';
    $query = mysqli_query($conn, "SELECT * from like_details where userId = '".$userId."' and postId = '".$postId."'");
    $numrows = mysqli_num_rows($query);
    return $numrows > 0;
}
function numberOfLikes($postId){
    include '../includes/dbConnect.php';
    $query = mysqli_query($conn, "SELECT * from like_details where postId = '".$postId."'");
    $numrows = mysqli_num_rows($query);
    return $numrows;
}
function likedPersonDetails($postId){
    include '../includes/dbConnect.php';
    $query = mysqli_query($conn, "SELECT * from userpass where userId in 
      (SELECT userId from like_details where postId = '".$postId."')");
    $numrows = mysqli_num_rows($query);
    $toReturn = array();
    if($numrows !=0)
    {
        while($row = mysqli_fetch_assoc($query))
        {
            array_push($toReturn, $row['full_name']);
//            echo $row['full_name'];
        }
    }

    return $toReturn;
}
function commentsOnPost($postId) {
    include '../includes/dbConnect.php';
    $query = mysqli_query($conn, "SELECT * from comment_details where postId = '".$postId."'");
    $numrows = mysqli_num_rows($query);
    $toReturn = array();
    if($numrows !=0)
    {
        while($row = mysqli_fetch_assoc($query))
        {
            $userDetails = userIdToDetails($row['userId']);
            $userName = $userDetails['user'];
            $postText = $row['text'];
            array_push($toReturn, "<h4>$userName</h4>
<p>&nbsp;&nbsp;&nbsp;$postText</p><hr>");

        }
    }
    return $toReturn;
}
function hasFollowed($userId, $friendId) {
    include '../includes/dbConnect.php';
    $query = mysqli_query($conn, "SELECT * from friend where currentId = ".$userId." and friendId = ".$friendId);
//    echo ''."SELECT * from friend where currentId = ".$userId." and friendId = ".$friendId;
    $numrows = mysqli_num_rows($query);
    return $numrows != 0;
}
function displayFriends($userId)
{   include "../includes/dbConnect.php";

    $query = "SELECT *  FROM userpass WHERE userId in (SELECT friendID from friend where currentId = '" . $userId . "')";

    $result = mysqli_query($conn, $query);

    $numrows = mysqli_num_rows($result);
    //  echo 'he'.$result;
    if ($numrows != 0) {
        {
            while ($row = mysqli_fetch_assoc($result)) {
                $userId = $row['userId'];
                $username = $row['user'];
                $phone = $row['phone'];
                $email = $row['email'];
                $dob = $row['dob'];
                $status = $row['status'];
                $worksat = $row['worksat'];
                $full_name = $row['full_name'];
                $studyat = $row['studyat'];
                $profile_img = getProfile_img($userId);
                echo "
                            <div class='card col-5' style='width: 50%; margin: 10px;'>
                            
                            <img class='card-img-top' src='$profile_img' alt='Card image cap'>
                            
                             <div class='card-body'>
                             <h5 class='card-title'>Name : $full_name</h5>
                            <p class='card-text'>Username : $username</p>
                            </div>
                            <ul class='list-group list-group-flush'>
                            <li class='list-group-item'><i class=\"fa fa-briefcase\" aria-hidden=\"true\"></i>&nbsp;
                                Worked at <?= echo $worksat ?></li>
                            <li class='list-group-item'><i class=\"fa fa-graduation-cap\" aria-hidden=\"true\"></i>
                Studied at <?= $studyat ?></li>
                             <li class='list-group-item'><i class=\"fa fa-envelope-o\" aria-hidden=\"true\"></i>
                 $email</li>
                             </ul>
                            <div class='card-body'>
                            
                    <form method='get' action='friendProfile.php' class='profile-friend'>
                        <input type='hidden' name = 'userId' value='" . $userId . "'>
                        <input type='submit'  value='View Profile' class='btn list-group-item-action list-group-item-light'>
                    </form>
                         
                            
                            </div>
                            </div>
                            <br>
                            <br>";
//                            echo getProfile_img($userId).$userId.$username.'<br>'.$phone.'<br>'.$email.'<br>'.$dob.'<br>'.$full_name.'<br>'.$status.'<br>'.$studyat.'<br>'.$worksat.'<br><br><br><br><br>';
            }
        }
    } else {
        echo "No Friends!!...yet Try Searching for one";
    }
}
function getFriendsId($userId)
{
    include "../includes/dbConnect.php";

    $query = "SELECT friendID from friend where currentId = '" . $userId . "'";

    $result = mysqli_query($conn, $query);
    $toReturn = array();
    $numrows = mysqli_num_rows($result);
    //  echo 'he'.$result;
    if ($numrows != 0) {
        {
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($toReturn, $row['friendID']);
            }
        }
    }
    return $toReturn;
}
