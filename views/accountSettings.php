<?php
session_start();
$userId=$_SESSION['userId'];
if(!isset($_SESSION["username"])){
    header("Location: login.php");
}
else
{
    ?>
<!DOCTYPE html>
<html>
<head>
	<title>Account Settings</title>
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

                            <cenetr><img src="<?=$img_src?>" style="height: auto; width: 100%;"/></cenetr>
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
    <label for="full_name">Full Name</label> <input type="text" class="form-control" id="full_name"  name="full_name" placeholder="Name">
  </div>
                    <br>

    <br>
    <legend>Change Status</legend>
     <div>
  <label for="Status">New Status</label>
    <input type="text" class="form-control" id="Status" name="status" placeholder="Put your status">
</div>
<br>

  <legend>Contact</legend>  
  <div class="form-group">
    <label for="newEmail">New Email address</label> 
    <input type="email" class="form-control" id="newEmail" name="newEmail" aria-describedby="emailHelp" placeholder="Enter new email address">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    <br>
    <label for="Phone">New Phone Number</label>
    <input type="text" class="form-control" id="Phone" name="Phone" placeholder="New Phone Number">
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
    <input class="form-control" type="date" name="bday">
</div>
<br>
  <legend>Add/change Workplace</legend>
  <div>
  <label for="Workplace">Address</label>
    <input type="text" class="form-control" id="Workplace" name="workplace" placeholder="Enter to add/change your workplace">

      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity" name="inputCity">
          <label for="inputState">State</label>
      <input type="text" class="form-control" id="inputState" name="inputState">
    </div>
    <br>
  <br>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
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