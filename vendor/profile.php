<?php

require_once("session.php");

require_once("include/header.php");

require_once("include/left_menu.php");

require_once("functions.php");
$session_data = $_SESSION['vendorsessionlogin'];
if(isset($_POST['adddetilas'])){
    $f_name = $_POST['fname'];
    $l_name = $_POST['lname'];
    $p_phone = $_POST['phone'];
    $e_email = $_POST['email'];
    $a_address = $_POST['address'];
    $insertdata = vendorprofile($f_name,$l_name,$p_phone,$e_email,$a_address,$session_data);
    if($insertdata == true){
        $msg = "Successfully Updated";
    }else{
        $msg = "Please Try Again";
    }
}

$get_bankdetal = "SELECT * FROM vendor WHERE vendor_auto='$session_data'";
$queryval = mysqli_query($conn,$get_bankdetal);
while($row = mysqli_fetch_array($queryval)){
    $fname = $row['vendor_f_name'];
    $lanme = $row['vendor_l_name'];
    $email = $row['vendor_email'];
    $phone = $row['vendor_phone'];
    $address = $row['vendor_address'];
}

if(isset($_POST['changepassword'])){
    $oldpassword = $_POST['oldpassswoed'];
    $newpassword = $_POST['newpassword'];

    $changepassword = changepssval($oldpassword,$newpassword,$session_data);
    if($changepassword == true){
        $passchange = "Successfully Change";
    }else{
        $passchange = "Please Try Again. Your Old Password Not Correct.";
    }
}

?>



<!-- ========= main banner section ========== -->
<div class="page-wrapper">

            <!-- ============================================================== -->

            <!-- Bread crumb and right sidebar toggle -->

            <!-- ============================================================== -->

             <div class="page-breadcrumb">

                <div class="row">

                    <div class="col-12 d-flex no-block align-items-center">

                        <h4 class="page-title"> Profile </h4>

                        <div class="ml-auto text-right">

                            <nav aria-label="breadcrumb">

                                <ol class="breadcrumb">

                                    <li class="breadcrumb-item"><a href="<?php echo $url; ?>">Home</a></li>

                                    <li class="breadcrumb-item active" aria-current="page"> Profile </li>

                                </ol>

                            </nav>

                        </div>

                    </div>

                </div>

            </div>


  <div class="main-content w-100 p-tb-60">
    <div class="mx-container">
        <div class="bank-detail">
        <div class="row">
            <div class="col-lg-12 order-lg-2">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile </a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#messages" data-toggle="tab" class="nav-link">Edit Profile </a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#password" data-toggle="tab" class="nav-link">Change Password </a>
                    </li>
                </ul>
                <div class="tab-content py-4">
                    <div class="tab-pane active" id="profile">
                        <h5 class="mb-3">Profile</h5>
                        <?php echo $msg; ?>
                        <?php echo $passchange; ?>
                        <table class="table table-bordered table-striped">
                            <!-- <thead>
                              <tr>
                                <th colspan="2"><h6>Contact Information</h6></th>
                                <th>Lastname</th>                            
                              </tr>
                            </thead> -->
                            <tbody>
                              <tr>
                                <td>Full Name:</td>
                                <td><?php echo $fname; ?> <?php echo $lanme; ?></td>                            
                              </tr>
                              <tr>
                                <td>Email Id:</td>
                                <td><?php echo $email; ?></td>                            
                              </tr>
                              <tr>
                                <td>Phone:</td>
                                <td><?php echo $phone; ?></td>                            
                              </tr>
                              <tr>
                                <td>Address</td>
                                <td><?php echo $address; ?></td>                            
                              </tr>
                            </tbody>
                          </table>
                        <!--/row-->
                    </div>
                    <div class="tab-pane" id="messages">
                        <h5 class="mb-3">Edit Profile</h5>
                      <form role="form" method="post" action="" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">First Name</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" name="fname" value="<?php echo $fname; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Last Name</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" name="lname" value="<?php echo $lanme; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" name="email" value="<?php echo $email; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Phone</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" name="phone" value="<?php echo $phone; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">BAddress</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" name="address" value="<?php echo $address; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label"></label>
                                <div class="col-lg-9">
                                    <input type="submit" class="btn btn-primary" value="Save Changes" name="adddetilas">
                                </div>
                            </div>
                        </form>
                        <!--/row-->
                    </div>
                    <div class="tab-pane" id="password">
                        <h5 class="mb-3">Change Password</h5>
                        <form role="form" method="post" action="" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Old Password</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="password" name="oldpassswoed" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">New Password</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="password" name="newpassword" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label"></label>
                                <div class="col-lg-9">
                                    <input type="submit" class="btn btn-primary" value="Changes Password" name="changepassword">
                                </div>
                            </div>
                            <!--/row-->
                        </form>
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-4 order-lg-1 text-center">
                <img src="https://buyjee.com/assets/images/vendor_images/logo.png" class="mx-auto img-fluid img-circle d-block" alt="avatar">
                <h6 class="mt-2">Upload a different photo</h6>
                <label class="custom-file">
                    <input type="file" id="file" class="custom-file-input">
                    <span class="custom-file-control">Choose file</span>
                </label>
            </div> -->
        </div>
        </div>
    	
        </div>
  </div>
<!-- /////////// footer section ////////////// -->
<?php

require_once("include/footer.php");

?>

