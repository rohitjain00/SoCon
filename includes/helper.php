<?php

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

