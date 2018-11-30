<!doctype html>
<html>
<head>
    <title>User Registration</title>
    <?php
    include '../includes/headerInclude.php'
    ?>
</head>
<body>
<?php
include '../components/navbar.php';
?>
<form action="" method="post" style="padding-left: 50px; padding-top : 50px;max-width: 600px;">
    <h1>User Registration</h1>
    <div class="row">
        <div class="col-6">

    <div class="form-group">
    <label>Username :</label><input class="form-control" type="text" name="user">
    </div>
    <div class="form-group">
        <label>Password:</label><input class="form-control" type="password" name="pass">
    </div>
            <div class="form-group">
                <label>Email :</label><input class="form-control" type="email" name="email">
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label>Full Name :</label><input class="form-control" type="text" name="full_name">
            </div>
            <div class="form-group">
                <label>DOB :</label><input class="form-control" type="date" name="dob">
            </div>
            <div class="form-group">
                <label>Phone Number :</label><input class="form-control" type="number" name="phone">
            </div>
        </div>
    </div>
    <input type="submit" class="btn" value="Register" name="submit" style="background-color: #FB8C00 !important;">
    <!-- Login Link -->
    <p><a href="login.php">Already a User? LOGIN</a></p>
</form>
<?php
include '../includes/dbConnect.php';
if(isset($_POST["submit"])){
    if(!empty($_POST['user']) && !empty($_POST['pass'])){
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $hashPassword = md5($pass.$user);
        $email = $_POST['email'];
        $dob = $_POST['dob'];
        $full_name = $_POST['full_name'];
        $phone = $_POST['phone'];

        $query = mysqli_query($conn, "SELECT * FROM userpass WHERE user='".$hashPassword."'");
        $numrows = mysqli_num_rows($query);
        if($numrows == 0)
        {
            //Insert to Mysqli Query
            $sql = "INSERT INTO userpass(user,pass,email,phone,full_name,dob) 
                    VALUES('$user','$hashPassword','$email','$phone','$full_name','$dob');";
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