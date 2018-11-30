<!doctype html>
    <html>
    <head>
        <?php
        $queryText = $_GET['queryText'];
        session_start();
        include '../includes/headerInclude.php';
        include '../includes/helper.php'
        ?>
        <title>SoCon : Search Results for <?= $queryText ?> </title>
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
            <div class="row">
                <?php

                include '../includes/dbConnect.php';


                // echo ''.$user;
                function getLevenshtein1($word)
                {
                    $words = array();
                    for ($i = 0; $i < strlen($word); $i++) {
                        // insertions
                        $words[] = substr($word, 0, $i) . '_' . substr($word, $i);
                        // deletions
                        $words[] = substr($word, 0, $i) . substr($word, $i + 1);
                        // substitutions
                        $words[] = substr($word, 0, $i) . '_' . substr($word, $i + 1);
                    }
                    // last insertion
                    $words[] = $word . '_';
                    return $words;
                }

                $query="SELECT *  FROM userpass WHERE";
                $wordArr = getLevenshtein1($queryText);
                foreach ($wordArr as $str) {
                    $query = $query." user LIKE '%".$str."%' OR full_name LIKE '%".$str."%' OR dob LIKE '%".$str."%' OR phone LIKE '%".$str."%' OR email LIKE '%".$str."%' OR status LIKE '%".$str."%' OR studyat LIKE '%".$str."%' OR worksat LIKE '%".$str."%'OR" ;
                }
                $query = $query." user LIKE '%".$queryText."%' OR full_name LIKE '%".$queryText."%' OR dob LIKE '%".$queryText."%' OR phone LIKE '%".$queryText."%' OR email LIKE '%".$queryText."%' OR status LIKE '%".$queryText."%' OR studyat LIKE '%".$queryText."%' OR worksat LIKE '%".$queryText."%'";

                //	echo ''.$query;
                $result = mysqli_query($conn,$query);
                //  if (!$result) {
                //      echo 'haa';
                //  }
                $numrows = mysqli_num_rows($result);
                //  echo 'he'.$result;
                if($numrows !=0)
                {
                    echo "<h3 style='width: 100%'>Search Results for <i>"."'$queryText'"."</i> </h3><br>";
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
                            <div class='card col-5' style='margin: 10px;'>
                            <img style='margin: 10px;width: 100%; height: auto' class='card-img-top' src='$profile_img' alt='User has no pic!!'>
                             <div class='card-body'>
                             <h5 class='card-title'>Name : $full_name</h5>
                            <p class='card-text'>Username : $username</p>
                            </div>
                            <ul class='list-group list-group-flush'>
                            <li class='list-group-item'><i class=\"fa fa-briefcase\" aria-hidden=\"true\"></i>&nbsp;
                                $worksat</li>
                            <li class='list-group-item'><i class=\"fa fa-graduation-cap\" aria-hidden=\"true\"></i>
                                $studyat</li>
                             <li class='list-group-item'><i class=\"fa fa-envelope\" aria-hidden=\"true\"></i>
                                $email</li>
                             </ul>
                            <div class='card-body'>
                            
                    <form method='get' action='friendProfile.php' class='profile-friend'>
                        <input type='hidden' name = 'userId' value='" . $userId . "'>
                        <input type='submit'  value='View Profile' class='list-group-item-action btn list-group-item-light'>
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
            </div>

            <div class="col-lg-2 col-md-2 col-xl-2"></div>
            <!--            <div class="col-lg-3 col-md-3 col-xl-3 maxHeight extracss">-->
            <!--                --><?php
            //                    include 'extra.php';
            //                ?>
            <!--            </div>-->

        </div>
    </div>

    <?php
    include '../components/sideButton.php';
    include '../includes/footerInclude.php';
    ?>
    </body>
    </html>

