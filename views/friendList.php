<!doctype html>
<html>
<head>
    <title>SoCon : Social Connectivity</title>
    <?php
    include '../includes/headerInclude.php';
    include '../includes/helper.php';
    session_start();
    ?>
</head>

<body>
<?php
include '../components/navbar.php';
?>
<div class="container-fluid" style="padding-top: 20px;">
    <div class="row allRow">
        <div class="col-lg-2 col-md-2 col-xl-2 mainSideBar maxHeight">
            <?php
            include '../components/mainPageSideBar.php';
            ?>
        </div>
        <div class="col-lg-1 col-md-1 col-xl-1"></div>
        <div class="col-lg-5 col-md-5 col-xl-5 maxHeight">

            <?php

            include '../includes/dbConnect.php';
            $userId = $_SESSION['userId'];


            $query="SELECT *  FROM userpass WHERE userId = (SELECT friendID from friend where currentId = '".$userId."')";

            $result = mysqli_query($conn,$query);

            $numrows = mysqli_num_rows($result);
            //  echo 'he'.$result;
            if($numrows !=0)
            {
                {
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $userId=$row['userId'];
                        $username=$row['user'];
                        $phone = $row['phone'];
                        $email = $row['email'];
                        $dob = $row['dob'];
                        $status=$row['status'];
                        $worksat=$row['worksat'];
                        $full_name = $row['full_name'];
                        $studyat=$row['studyat'];
                        $profile_img = getProfile_img($userId);
                        echo"
                            <div class='card' style='width: 18rem;'>
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
                        <input type='submit'  value='View Profile' class='list-group-item-action list-group-item-light'>
                    </form>
                         
                            
                            </div>
                            </div>
                            <br>
                            <br>";
//                            echo getProfile_img($userId).$userId.$username.'<br>'.$phone.'<br>'.$email.'<br>'.$dob.'<br>'.$full_name.'<br>'.$status.'<br>'.$studyat.'<br>'.$worksat.'<br><br><br><br><br>';
                    }
                }
            }
            else
            {
                echo "No Result to Display";
            }
            ?>
        </div>

        <div class="col-lg-2 col-md-2 col-xl-2"></div>
        <!--            <div class="col-lg-3 col-md-3 col-xl-3 maxHeight extracss">-->
        <!--                --><?php
        //                    include 'extra.php';
        //                ?>
        <!--            </div>-->
        <div class="footer">
            <?php
            include '../components/footer.php';
            ?>
        </div>
    </div>
</div>

<?php
include '../components/sideButton.php';
include '../includes/footerInclude.php';
?>
</body>
</html>

