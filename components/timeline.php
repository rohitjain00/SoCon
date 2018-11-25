<div class = "allCards">
    <div class="card ">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs pull-center"  id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">New Post</a>
                </li>
                
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"><div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
</span>
                    </div>
 <!--changes by mharsh2011-->
                         <form action="../handlers/post_submit.php" method="post" enctype="multipart/form-data">
                            <textarea class="form-control" aria-label="With textarea" name="Status" cols=500 value=""></textarea><br>
                            <input class="btn" type="file" name="file"  style="background-color: #FB8C00 !important;"><br><br>
                            <input class="btn" type="submit" value="Post" style="background-color: #FB8C00 !important;">
                            <input class="btn" type="reset" value="Reset" style="background-color: #FB8C00 !important;">
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php

    include '../includes/dbConnect.php';
    include '../includes/helper.php';
    session_start();

    $userId = $_SESSION['userId'];
    //Result Message
         $query = mysqli_query($conn, "SELECT * FROM post WHERE userId = '".$userId."'
          or userId = (SELECT friendId from friend where currentId = '".$userId."') ORDER BY postId DESC;");
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
                <img src='$name'/ class='card-img-bottom'><br><br>
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
          
                        
    ?>
<!--END OF EDIT-->
</div>