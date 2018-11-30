<?php
// Connection
include "../includes/dbConnect.php";
include "../includes/helper.php";
if(isset($_GET['rq'])):
    switch($_GET['rq']):
        case 'new':
            $message = $_POST['message'];
            $senderId = $_POST['senderId'];
            $recieverId = $_POST['recieverId'];
            if(empty($message)){
                echo 'afd'.$message;
            }else{
                $query = mysqli_query($conn,"insert into messages (senderId, recieverId, message, status) values ('".$senderId."', '".$recieverId."', '".$message."', 1) ");
                echo '<script>console.log("inserted")</script>';

            }
            break;

        case 'getMessages':
            $senderId = $_POST['senderId']; // equal userId of current session
            $recieverId = $_POST['recieverId'];
            $profile_img = getProfile_img($recieverId);
            echo '<h3>'. userIdToDetails($recieverId)['full_name'].'</h3><br><br><br>';
            $query = mysqli_query($conn,"select * from messages where (senderId = '".$senderId."' and recieverId = '".$recieverId."') or (senderId = '".$recieverId."' and recieverId = '".$senderId."')");
            while($row = mysqli_fetch_array($query)){
                $messageText = $row["message"];
                $time = $row["time"];
                if ($row['senderId'] == $senderId) {
                    echo '<div class="outgoing_msg">
                        <div class="sent_msg">
                            <p>'.$messageText.'</p>
                            <span class="time_date">'.$time.' </span>
                            </div>
                    </div>';
                } else {
                    echo '<div class="incoming_msg">
                        <div class="incoming_msg_img"> <img src='.$profile_img.'> </div>
                        <div class="received_msg">
                            <div class="received_withd_msg">
                                <p>'.$messageText.'</p>
                                <span class="time_date"> '.$time.'</span></div>
                        </div>
                    </div>';
                }
            }
            break;
    endswitch;
endif;
?>