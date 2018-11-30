<?php
session_start();
$userId=$_SESSION['userId'];
if(!isset($_SESSION["username"])){
    echo"<script type='text/javascript'>location.href = '../views/login.php'</script>";
}
else
{
    ?>
<!DOCTYPE html>
<html>
<head>
	<title>SoCon : Account Settings</title>
	<?php
    include '../includes/headerInclude.php';
    include '../includes/helper.php';

        ?>
</head>
<body>
	<?php
    include '../components/navbar.php';
    ?>
     <div class="container-fluid" style="padding-bottom: 30px;">
        <div class="row ">
            <span class="col-lg-3 col-md-3 col-xl-3"></span>
            <div class="col-lg-6 col-md-6 col-xl-6">
                <br>
                <div style="text-align: center;"><h2>ACCOUNT SETTINGS</h2></div><br>
                <div>
                    <div class='card'>
                        <div class='card-body'>
                            <h5 class='card-title' style="text-align: center;">PROFILE PICTURE</h5>
                            <?php $img_src=getProfile_img($userId);?>
                            <div style="width: 100%;">
                            <img src="<?=$img_src?>" style="height: 200px; display: block; width: auto;margin: auto;"/>
                            </div>
                            <hr>
                            <form action="../handlers/changeprofile_img.php" method="post" enctype="multipart/form-data">
                                <input class="btn" type="file" name="file"  style="background-color: #FB8C00 !important;">
                                <input class="btn" type="submit" value="Upload" style="background-color: #FB8C00 !important;">
                            </form>

                            <br>
                            </div>
                        </div>
                    </div>

<br><br>
            <form action="../handlers/accountSettingschangedHandler.php" method="post">

        <legend>Name</legend>
        <div class="form-group">
    <label for="full_name">Full Name</label> <input type="text" class="form-control" id="full_name"  name="full_name" placeholder="<?=$_SESSION['full_name']?>">
  </div>
                    <br>

    <br>
    <legend>Change Status</legend>
     <div>
  <label for="Status">New Status</label>
    <input type="text" class="form-control" id="Status" name="status" placeholder="<?= $_SESSION['status'] ?>">
</div>
<br>

  <legend>Contact</legend>  
  <div class="form-group">
    <label for="newEmail">New Email address</label> 
    <input type="email" class="form-control" id="newEmail" name="newEmail" aria-describedby="emailHelp" placeholder="<?= $_SESSION['email'] ?>">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    <br>
    <label for="Phone">New Phone Number</label>
    <input type="text" class="form-control" id="Phone" name="Phone" placeholder="<?= $_SESSION['phone'] ?>">
    <small id="Phone" class="form-text text-muted">We'll never share your phone number with anyone else.</small>
  </div>
<br>
  <legend>Password</legend>
  <div class="form-group">
    <label for="currentPassword">Current Password</label>
    <input type="password" class="form-control" id="currentPassword" name="currentPassword" placeholder="Current Password">
    <label for="newPassword">New Password</label>
    <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="New Password">
    <label for="confirmNewPassword">Confirm New Password</label>
    <input type="password" class="form-control" id="confirmNewPassword" name="confirmNewPassword" placeholder="Confirm Password">
  </div>
  <br>
  <legend>Date of Birth</legend>
  <div> 
    <input class="form-control" type="date" name="bday" value="<?= $_SESSION['dob'] ?>">
</div>
<br>
  <legend>Add/change Workplace</legend>
  <div>
  <label for="education">Education</label>
    <input type="text" class="form-control" id="education" name="education" placeholder="<?= $_SESSION['studyat'] ?>">

      <label for="work">Work</label>
      <input type="text" class="form-control" id="work" name="work" placeholder="<?= $_SESSION['worksat'] ?>">
      
    </div>
    <br>
  <br>
  <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
    </div>
</div>
<?php
    include '../includes/footerInclude.php';
    ?>
</body>
</html>
<?php
}
?>