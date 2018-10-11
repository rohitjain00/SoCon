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
     <div class="container-fluid">
        <div class="row ">
            <span class="col-lg-3 col-md-3 col-xl-3"></span>
            <div class="col-lg-6 col-md-6 col-xl-6">
                <br>

                <form>
     <center><h2>ACCOUNT SETTINGS</h2></center><br>
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
=======
<div class="row">
    <div class="col-md-8 col-md-offset-1">
        <form class="form-horizontal" role="form">
            <fieldset>

                <!-- Form Name -->
                <legend>Personal Information Details</legend>

                <!-- Text input-->
                <div class="form-group">
                    <div class="col-sm-4">
                        <input type="text" name="fistName" placeholder="First Name" class="form-control">
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="middleName" placeholder="Middle Name" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="lastName" placeholder="Last Name" class="form-control">
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <div class="col-sm-4">
                        <input type="date" placeholder="Date Of Birth" class="form-control">
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <div class="col-sm-4">
                        <select type="gender" placeholder="Gender" class="form-control">
                            <option value="female">Female</option>
                            <option value="male">Male</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4">
                        <input type="checkbox" name="hasSibling" data-toggle="modal" data-target="#sibling">   Has Sibling?
                    </div>
                </div>

                <!-- Address Section -->
                <!-- Form Name -->
                <legend>Address Details</legend>
                <!-- Text input-->
                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="text" name="addressLine1" placeholder="Address Line 1" class="form-control">
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="text" name="addressLine2" placeholder="Address Line 2" class="form-control">
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <div class="col-sm-4">
                        <input type="text" name="city" placeholder="City" class="form-control">
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="state" placeholder="State" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="postalCode" placeholder="Post Code" class="form-control">
                    </div>
                </div>
                <!-- Parent/Guadian Contact Section -->
                <!-- Form Name -->
                <legend>Parent/Guadian Information</legend>
                <!-- Text input-->
                <div class="form-group">
                    <div class="col-sm-4">
                        <input type="text" name="pFistName" placeholder="First Name" class="form-control">
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="pMiddleName" placeholder="Middle Name" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="pLastName" placeholder="Last Name" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2">
                        <select type="pContactMethod" placeholder="Contact Method" class="form-control">
                            <option>Contact Method</option>
                            <option value="phone">Phone</option>
                            <option value="text">Text</option>
                            <option value="email">Email</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <input type="pPhoneNbr" placeholder="Phone Number" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <input type="email" name="pEmail" placeholder="Email" class="form-control">
                    </div>
                </div>

                <!-- Emergency Contact Section -->
                <!-- Form Name -->
                <legend>Emergency Contact Information</legend>
                <!-- Text input-->
                <div class="form-group">
                    <div class="col-sm-4">
                        <input type="text" name="eFistName" placeholder="First Name" class="form-control">
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="eMiddleName" placeholder="Middle Name" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="eLastName" placeholder="Last Name" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2">
                        <select type="pContactMethod" placeholder="Contact Method" class="form-control">
                            <option>Contact Method</option>
                            <option value="phone">Phone</option>
                            <option value="text">Text</option>
                            <option value="email">Email</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="ePhoneNbr" placeholder="Phone Number" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <input type="email" name="eEmail" placeholder="Email" class="form-control">
                    </div>
                </div>

                <legend>Registration for classes</legend>
                <div class="form-group">
                    <div class="col-sm-2">
                        <input type="checkbox" name="VietNgu">   Viet Ngu
                    </div>
                    <div class="col-sm-2">
                        <input type="checkbox" name="Math">   Math
                    </div>
                    <div class="col-sm-2">
                        <input type="checkbox" name="paid"  data-toggle="modal" data-target="#payment">   Pay
                    </div>
                </div>
                <!-- Command -->
                <div class="form-group">
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>
    </div><!-- /.col-lg-12 -->
</div><!-- /.row -->


<!-- Has Sibling Modal -->
<div class="modal fade" id="sibling" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">Select His/Her Sibling</h4>
            </div>
            <div class="modal-body">
                <div>
                    <input type="text" name="filter" style="border-radius: 10px" placeholder="filter">
                </div>
                <div class="table-responsive">
                    <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                        <tr>
                            <th> </th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Address</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><input type="checkbox" class="checkthis" /></td>
                            <td>Tam</td>
                            <td>VuTran</td>
                            <td>3085 Aspen Dr Coonrapid MN 44532</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="checkthis" /></td>
                            <td>Thuy-Sa</td>
                            <td>Truong</td>
                            <td>13231 Cliff Ave Burnsville, MN 55337</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="checkthis" /></td>
                            <td>Han</td>
                            <td>Bui</td>
                            <td>1341 Trailer Tl Lakeville, MN 55321</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-warning btn-lg" data-dismiss="modal" aria-hidden="true" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span>Done</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Payment Modal -->
<div class="modal fade" id="payment" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">Payment</h4>
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <form class="form-horizontal" role="form">
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label>Viet Ngu Payment</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" name="vnPayment" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label>Math Payment</label>
                                </div>
                                <div class="col-sm-7">
                                    <input type="text" name="mathPayment" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label>Other Payment</label>
                                </div>
                                <div class="col-sm-7">
                                    <input type="text" name="otherPayment" placeholder="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer ">
                            <button type="button" class="btn btn-warning btn-lg" data-dismiss="modal" aria-hidden="true" style="width: 100%;">
                                <span class="glyphicon glyphicon-ok-sign"></span>  Done</button>
                        </div>
                    </form>
                </div>  <!-- div class="col-md-8 col-md-offset-1" -->
            </div>  <!-- div class="row" -->
        </div><!-- /.modal-content -->
    </div><!-- div class="modal-dialog -->
</div>
