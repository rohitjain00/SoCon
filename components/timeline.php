<div class="allCards">
    <div class="card ">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs pull-center" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                       aria-controls="home" aria-selected="true">New Post</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </span>
                        </div>
                        <!--changes by mharsh2011-->
                        <form action="../handlers/post_submit.php" method="post" enctype="multipart/form-data">
                            <textarea class="form-control" aria-label="With textarea" name="Status" cols=500
                                      value=""></textarea><br>
                            <input class="btn" type="file" name="file"
                                   style="background-color: #FB8C00 !important;"><br><br>
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
    //    session_start();
    $userId = $_SESSION['userId'];

    //Result Message
    $query = mysqli_query($conn, "
        SELECT * FROM post WHERE userId = '" . $userId . "'
          or userId IN (SELECT friendId from friend where currentId = '" . $userId . "') ORDER BY postId DESC;");
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
            $likedPersonDetailsList = '';
            foreach($likedPersonDetails as $likedPersonDetail){
                $likedPersonDetailsList .= $likedPersonDetail.'<br>';
            }
//            $likedPersonDetailsList = implode('<hr>', $likedPersonDetails);
            $comments = commentsOnPost($postId);
            $commentsList = implode('', $comments);
            echo "<br>
                <br>
                <div class='card'>
                <div class='card-body'>
                <h5 class='card-title'>$full_name <br><small>By : $username</small></h5>
                <p class='card-text'><small class='text-muted'>Posted on $time</small></p>
                <p class='card-text'>$text</p><br>
                <img src='$name' style='width: 100%;height: auto;' class='card-img-bottom'><br><br>
                
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
        <h3>Liked By</h3>
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
                    <button type='submit' style='width: 25%; background-color: #FB8C00;color: white;font-weight: 600' onclick='commentClickHandler($postId)' class='btn'>Comment</button>
                    
                </div>
                </div>
                ";
        }
    }
    ?>
    <!--END OF EDIT-->
</div>
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
</script>