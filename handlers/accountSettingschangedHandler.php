<?php
session_start();
include '../includes/dbConnect.php';


    if(!empty($_POST['full_name']))
    {
        $full_name = $_POST['full_name'];
            $result = mysqli_query($conn,"update userpass set full_name='".$full_name."'where userId='".$_SESSION['userId']."'");
            //Result Message
            if($result){
                $_SESSION['full_name'] = $full_name;
                echo "Your Name Updated Successfully";
            }
            else
            {
                echo "Name Update Failure!";
            }
    }
    if(!empty($_POST['status']))
    {
        $status = $_POST['status'];
            $result = mysqli_query($conn, "update userpass set status='".$status."'where userId='".$_SESSION['userId']."'");
            //Result Message
            if($result){
                $_SESSION['status']= $status;
                echo "Your Status Updated Successfully";
                echo "Your Status Updated Successfully";
            }
            else
            {
                echo "Status Update Failure!";
            }
    }
    if(!empty($_POST['newEmail']))
    {
        $newEmail = $_POST['newEmail'];
            $result = mysqli_query($conn, "update userpass set email='".$newEmail."'where userId='".$_SESSION['userId']."'");
            //Result Message
            if($result){
                $_SESSION['email']= $newEmail;
                echo "Your email Updated Successfully";
            }
            else
            {
                echo "Email Update Failure!";
            }
    }
    if(!empty($_POST['Phone']))
    {
        $Phone = $_POST['Phone'];
            $result = mysqli_query($conn, "update userpass set phone='".$Phone."'where userId='".$_SESSION['userId']."'");
            //Result Message
            if($result){
                $_SESSION['phone']= $Phone;
                echo "Your Phone Updated Successfully";
            }
            else
            {
                echo "Phone Update Failure!";
            }
    }
    if(!empty($_POST['bday']))
    {
        $bday = $_POST['bday'];
            $result = mysqli_query($conn,"update userpass set dob='".$bday."'where userId='".$_SESSION['userId']."'");
            //Result Message
            if($result){
                $_SESSION['dob']= $bday;

                echo "Your Birthday Updated Successfully";
            }
            else
            {
                echo "Birthday Update Failure!";
            }
    }
    if(!empty($_POST['workplace']))
    {
        $workplace = $_POST['workplace'];
            $result = mysqli_query($conn, "update userpass set workat='".$workplace."'where userId='".$_SESSION['userId']."'");
            //Result Message
            if($result){
                echo "Your Workplace Updated Successfully";
            }
            else
            {
                echo "Workplace Update Failure!";
            }
    }
    if(!empty($_POST['currentPassword']))
    {
        $currPass=$_POST('currentPassword');
        $newPass=$_POST('newPassword');
        if(strcmp($currPass,$_SESSION['pass'])==0)
        {
            $result = mysqli_query($conn,"update userpass set pass='".$newPass."'where userId='".$_SESSION['userId']."'");
            //Result Message
            if($result){
                echo "Your Password Updated Successfully";
            }
            else
            {
                echo "Password Update Failure!";
            }
        }
        else
        {
        	echo "Wrong Password";
        }
    }
?>
<script type="text/javascript">location.href = '../views/welcome.php';</script>

