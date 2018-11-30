<!doctype html>
<html>
<head>
    <title>Login</title>
    <?php
    session_start();

    include '../includes/headerInclude.php';
    include '../includes/helper.php';
    ?>
</head>
<body>
<?php
include '../components/navbar.php';
?>

<form action="" method="post" style="padding-left: 50px; padding-top : 50px;max-width: 300px;">
    <h1>Login</h1>
    <div class="form-group">
        <label>Username:</label><input class="form-control" type="text" name="user">
    </div>
    <div class="form-group">

    <label>Password:</label><input class="form-control" type="password" name="pass">
    </div>
    <div style="padding-top: 20px;">
    <input class="btn" type="submit" value="Login" name="submit" style="background-color: #FB8C00 !important;"><br/>
    </div><!--New user Register Link -->
    <p><a href="register.php">New User Registeration!</a></p>
</form>
<?php
include '../includes/dbConnect.php';
if(isset($_POST["submit"])){
    if(!empty($_POST['user']) && !empty($_POST['pass'])){
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $hashPassword = md5($pass.$user);

        //for adding in session
        $phone;
        $email;
        $dob;
        $userId;
        $query = mysqli_query($conn, "SELECT * FROM userpass WHERE user='".$user."' AND pass='".$hashPassword."'");
        $numrows = mysqli_num_rows($query);
        if($numrows !=0)
        {
            while($row = mysqli_fetch_assoc($query))
            {
                $dbusername=$row['user'];
                $dbpassword=$row['pass'];
                $dbpassword=$row['pass'];
                $phone = $row['phone'];
                $email = $row['email'];
                $dob = $row['dob'];
                $full_name = $row['full_name'];
                $userId = $row['userId'];
                $status = $row['status'];
                $studyat=$row['studyat'];
                $worksat=$row['worksat'];
            }
            if($user == $dbusername && $hashPassword == $dbpassword)
            {

//                $_SESSION['sess_user'] = array(
//                        'username' => $user,
//                        'full_name' => $row['full_name'],
//                    'phone' => $row['phone'],
//                    'email' => $row['email'],
//                    'dob' => $row['dob']
//                );
                $_SESSION['username']=$user;
                $_SESSION['pass']=$hashPassword;
                $_SESSION['full_name']=$full_name;
                $_SESSION['phone']=$phone;
                $_SESSION['email']=$email;
                $_SESSION['dob']=$dob;
                $_SESSION['status'] = $status;
                $_SESSION["userId"] = $userId;
                $_SESSION["worksat"] = $worksat;
                $_SESSION["studyat"] = $studyat;
                $_SESSION["profile_img"] = getProfile_img($userId);

                //Redirect Browser
                echo"<script type='text/javascript'>location.href = '../views/welcome.php'</script>";

            }
        }
        else
        {
            echo "Invalid Username or Password!";
        }
    }
    else
    {
        echo "Required All fields!";
    }
}
?>
</body>
</html>