<?php
session_start();
if(!isset($_SESSION["sess_user"])){
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
    include 'headerInclude.php'
        ?>
</head>
<body>
	<?php
    include 'navbar.php'; 
    ?>
     <div class="container-fluid" style="padding-bottom: 30px;">
        <div class="row ">
            <span class="col-lg-3 col-md-3 col-xl-3"></span>
            <div class="col-lg-6 col-md-6 col-xl-6">
                <br>

                <form>
     <div style="text-align: center;"><h2>ACCOUNT SETTINGS</h2></div><br>
        <legend>Name</legend>
        <div class="form-group">
    <label for="firstName">First Name</label> <input type="text" class="form-control" id="firstName"  placeholder="First Name">
    <label for="firstName">Last Name</label> <input type="text" class="form-control" id="lastName"  placeholder="Last Name">
  </div>
    <br>
    <legend>Change Status</legend>
     <div>
  <label for="Status">New Status</label>
    <input type="text" class="form-control" id="Status" placeholder="Put your status">
</div>
<br>

  <legend>Contact</legend>  
  <div class="form-group">
    <label for="newEmail">New Email address</label> 
    <input type="email" class="form-control" id="newEmail" aria-describedby="emailHelp" placeholder="Enter new email address">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    <br>
    <label for="Phone">New Phone Number</label>
    <input type="text" class="form-control" id="Phone" placeholder="New Phone Number">
    <small id="Phone" class="form-text text-muted">We'll never share your phone number with anyone else.</small>
  </div>
<br>
  <legend>Password</legend>
  <div class="form-group">
    <label for="currentPassword">Current Password</label>
    <input type="password" class="form-control" id="currentPassword" placeholder="Current Password">
    <label for="newPassword">New Password</label>
    <input type="password" class="form-control" id="newPassword" placeholder="New Password">
    <label for="confirmNewPassword">Confirm New Password</label>
    <input type="password" class="form-control" id="confirmNewPassword" placeholder="Confirm Password">
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
    <input type="text" class="form-control" id="Workplace" placeholder="Enter to add/change your workplace">

      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity">
          <label for="inputState">State</label>
      <input type="text" class="form-control" id="inputState">
    </div>
    <br>
     <legend>Address</legend>
     <div>
  <label for="Address">Address</label>
    <input type="text" class="form-control" id="Address" placeholder="New Address">

      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity">
          <label for="inputState">State</label>
      <input type="text" class="form-control" id="inputState">
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
    include 'footerInclude.php';
    ?>
</body>
</html>
    <?php
}
?>