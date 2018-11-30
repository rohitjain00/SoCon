<div class="inbox_chat">
    <?php
    $friendIdList = getFriendsId($_SESSION['userId']);
    //                        echo 'asd';
    foreach ($friendIdList as $friendId) {
        $friendDetails = userIdToDetails($friendId);
        $friendImage = getProfile_img($friendDetails['userId']);
        $friendId = $friendDetails['userId'];
        $friendName = $friendDetails['full_name'];
        $friendStatus = $friendDetails['status'];
        echo "<div class='chat_list' style='cursor: pointer' onclick='getMsg($friendId);openChatBox();'>
                        <div class='chat_people'>
                            <div class='chat_img'> <img style='height: 45px;width: 45px;border-radius: 50px;' src=$friendImage alt=$friendName> </div>
                            <div class='chat_ib'>
                                <h5>$friendName</h5>
                                <p>-$friendStatus</p>
                            </div>
                        </div>
                    </div>";
    }
    ?>
</div>
