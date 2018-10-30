<!doctype html>
<html>
<head>
    <title>User Registration</title>
    <?php
    include 'headerInclude.php'
    ?>
</head>
<body>
<?php
include 'navbar.php';
?>
<form action="" method="post" style="padding-left: 50px; padding-top : 50px;max-width: 300px;">
    <h1>User Registration</h1>
    <div class="form-group">
    <label>Username :</label><input class="form-control" type="text" name="user">
    </div>
    <div class="form-group">
        <label>Password:</label><input class="form-control" type="password" name="pass">
    </div>
    <input type="submit" class="btn" value="Register" name="submit" style="background-color: #FB8C00 !important;">
    <!-- Login Link -->
    <p><a href="login.php">Already a User? LOGIN</a></p>
</form>
<?php
include 'dbConnect.php';
if(isset($_POST["submit"])){
    if(!empty($_POST['user']) && !empty($_POST['pass'])){
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        $query = mysqli_query($conn, "SELECT * FROM userpass WHERE user='".$user."'");
        $numrows = mysqli_num_rows($query);
        if($numrows == 0)
        {
            //Insert to Mysqli Query
            $sql = "INSERT INTO userpass(user,pass) VALUES('$user','$pass')";
            $result = mysqli_query($conn, $sql);
            //Result Message
            if($result){
                echo "Your Account Created Successfully";
            }
            else
            {
                echo "Failure!";
            }
        }
        else
        {
            echo "That Username already exists! Please try again.";
        }
    }
    else
    {
        ?>
        <!--Javascript Alert -->
        <script>alert('Required all felds');</script>
        <?php
    }
}
?>
</body>
</html>