<?php

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