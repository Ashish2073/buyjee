<?php

require_once("session.php");

require_once("include/header.php");

require_once("include/left_menu.php");

require_once("functions.php");
$session_data = $_SESSION['vendorsessionlogin'];
if(isset($_POST['adddetilas'])){
    $bank_name = $_POST['bankname'];
    $bank_ac_name = $_POST['bankacname'];
    $bank_ac_number = $_POST['bankacnumber'];
    $bank_rotingnumb = $_POST['rotingnumber'];
    $session_data = $_SESSION['vendorsessionlogin'];
    $insertdata = vendorbankadd($bank_name,$bank_ac_name,$bank_ac_number,$bank_rotingnumb,$session_data);
    if($insertdata == true){
        echo "<script>alert('Successfully Added.');</script>";
    }else{
        echo "<script>alert('Please Try Again');</script>";
    }
}

$get_bankdetal = "SELECT * FROM vendorbank WHERE vbank_vid='$session_data'";
$queryval = mysqli_query($conn,$get_bankdetal);
while($row = mysqli_fetch_array($queryval)){
    $get_bank_name = $row['vbank_name'];
    $get_bank_acname = $row['vbank_acname'];
    $get_bank_acnumber = $row['vbank_acnumber'];
    $get_bank_roting = $row['vbank_roting'];
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

                        <h4 class="page-title"> Bank Details </h4>

                        <div class="ml-auto text-right">

                            <nav aria-label="breadcrumb">

                                <ol class="breadcrumb">

                                    <li class="breadcrumb-item"><a href="<?php echo $url; ?>">Home</a></li>

                                    <li class="breadcrumb-item active" aria-current="page"> Add Bank Details </li>

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
                        <a href="" data-target="#profile" data-toggle="tab" class="nav-link active"> Bank Details </a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#messages" data-toggle="tab" class="nav-link">Edit Bank Details </a>
                    </li>
                </ul>
                <div class="tab-content py-4">
                    <div class="tab-pane active" id="profile">
                        <h5 class="mb-3">Bank Details</h5>
                        <?php echo $msg; ?>
                        <table class="table table-bordered table-striped">
                            <!-- <thead>
                              <tr>
                                <th colspan="2"><h6>Contact Information</h6></th>
                                <th>Lastname</th>                            
                              </tr>
                            </thead> -->
                            <tbody>
                              <tr>
                                <td>Bank Name</td>
                                <td><?php echo $get_bank_name; ?></td>                            
                              </tr>
                              <tr>
                                <td>Bank A/C Name</td>
                                <td><?php echo $get_bank_acname; ?></td>                            
                              </tr>
                              <tr>
                                <td>Bank A/C Number</td>
                                <td><?php echo $get_bank_acnumber; ?></td>                            
                              </tr>
                              <tr>
                                <td>Routing Number</td>
                                <td><?php echo $get_bank_roting; ?></td>                            
                              </tr>
                            </tbody>
                          </table>
                        <!--/row-->
                    </div>
                    <div class="tab-pane" id="messages">
                        <h5 class="mb-3">Edit Bank Details</h5>
                      <form role="form" method="post" action="" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Bank Name</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" name="bankname" value="<?php echo $get_bank_name; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Bank A/C Name</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" name="bankacname" value="<?php echo $get_bank_acname; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Bank A/C Number</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" name="bankacnumber" value="<?php echo $get_bank_acnumber; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Routing Number</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" name="rotingnumber" value="<?php echo $get_bank_roting; ?>">
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

