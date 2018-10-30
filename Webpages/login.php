<!doctype html>
<html>
<head>
    <title>Login</title>
    <?php
    include 'headerInclude.php'
    ?>
</head>
<body>
<?php
include 'navbar.php';
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
include 'dbConnect.php';
if(isset($_POST["submit"])){
    if(!empty($_POST['user']) && !empty($_POST['pass'])){
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        $query = mysqli_query($conn, "SELECT * FROM userpass WHERE user='".$user."' AND pass='".$pass."'");
        $numrows = mysqli_num_rows($query);
        if($numrows !=0)
        {
            while($row = mysqli_fetch_assoc($query))
            {
                $dbusername=$row['user'];
                $dbpassword=$row['pass'];
            }
            if($user == $dbusername && $pass == $dbpassword)
            {
                session_start();
                $_SESSION['sess_user']=$user;
                //Redirect Browser
                header("Location:welcome.php");
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