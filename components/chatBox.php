
<div class="mesgs">
    <i class="fa fa-times fa-2x" onclick="closeChatBox()" id = "close-button" aria-hidden="true"></i>
    <i class="fa fa-arrow-up" onclick="openChatBox()" id = "open-button" aria-hidden="true"></i>
    <div style="border: 2px solid #eee;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <div class="msg_history">

    </div>
    <form class="type_msg">
        <div class="input_msg_write">
            <input type="text" class="write_msg" placeholder="Type a message" />
            <button class="msg_send_btn" onclick="sendMsg()" type="button">
                <i class="fa fa-paper-plane" aria-hidden="true"></i>
            </button>
        </div>
    </form>
    </div>
</div>
<script type="text/javascript">



    var clickedFriendId = null;

    function sendMsg(){
        recieverId = clickedFriendId;
        $.ajax({
            type: 'post',
            url: '../handlers/messageHandling.php?rq=new',
            data: {
                message : $(".write_msg").val(),
                recieverId : recieverId,
                senderId : '<?= $_SESSION['userId'] ?>'
            },
            success: function (response) {
                // console.log(response);
                getMsg(recieverId);

            }
        });
    }

    // get latest message

    function getMsg(recieverId){
        clickedFriendId = recieverId;
            // console.log(clickedFriendId);
            $.ajax({
                type: 'post',
                url: '../handlers/messageHandling.php?rq=getMessages',
                data: {
                    recieverId: recieverId,
                    senderId: <?= $_SESSION['userId'] ?>
                },
                success: function (response) {
                    // console.log(response);
                    console.log("getMssg");
                    clickedFriendId = recieverId;
                    $(".msg_history").html(response);
                    window.scrollTo(0, document.querySelector(".msg_history").scrollHeight);
                }
            });
    }
    setInterval(function(){getMsg(clickedFriendId);}, 10 * 1000);
    function closeChatBox() {
            $(".mesgs #open-button ").css("margin-top", "85vh");
            $(".mesgs #open-button ").css("display", "inline-block");
            $(".mesgs #close-button ").css("display", "none");
        // getMsg(null);
    }
    function openChatBox() {
        $(".mesgs #close-button ").css("display", "inline");
        // $(".mesgs #close-button ").css("margin-top", "29vh");
        $(".mesgs #open-button ").css("margin-top", "27vh");
        getMsg(clickedFriendId);
    }
</script>
