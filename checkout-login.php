<?php include 'includes/upper-header.php'; ?>

<title>Checkout Login</title>

<?php include 'includes/main-header.php'; ?>
<?php
if(isset($_SESSION["customersessionlogin"])){
    echo '<script>';
    echo 'window.location.href="'.$url.'/checkout";';
    echo '</script>';
}
?>
<main class="main">
        <div class="page-header mt-30 mb-50">
            <div class="container">
                <div class="archive-header">
                    <div class="row align-items-center">
                        <div class="col-xl-12">
                            <h1 class="mb-15">Checkout Login</h1>
                            <div class="breadcrumb">
                                <a href="<?php echo $url; ?>/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                                <span></span> Checkout Login
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if(isset($_POST['loginchk'])){
          $email_id = $_POST['login-email'];
          $email_password = MD5($_POST['login-password']);
          $login_function = login_checking_code($email_id,$email_password);
          if($login_function == true){
            echo "<script>window.location.href='$url/checkout/'</script>";
          }elseif($login_function == false){
            echo "<script>alert('Your email ID or password is incorrect. Please try again.');</script>";
          }
        }
        ?>
        <div class="container mb-30">
            <div class="row flex-row-reverse">
                <div class="col-md-4">
                    <div class="checkout-form bggray">
                        <h3>Returning Customer</h3>
                        <div class="theme-card"><span>                          
                        <form role="form" method="post" enctype="multipart/form-data" action="" id="loginform" class="theme-form">
                        <div class="form-group">
                            <span><input type="text" name="login-email" id="email" placeholder="Email ID / Username" class="form-control" autocomplete="off" required=""> <span class="validate-error"></span></span>
                        </div>
                        <div class="form-group"> <span><input type="password" name="login-password" id="password" placeholder="Password" class="form-control" autocomplete="off" required=""> <span class="validate-error"></span></span>
                        </div>
                        <button type="submit" name="loginchk" id="loginchk" class="login-btn">Sign In</button>
                        </form>
                        </span>
                    </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="checkout-form bgdgray">
                    
                        <h3>New Customers</h3>
                        <div class="theme-card"><span>                          
                    <form role="form" method="post" action="<?php echo $url; ?>/register_login/" enctype="multipart/form-data">
                    <div class="form-group">
                        <input class="form-control" type="text" name="Firstname" placeholder="First Name" required="" autocomplete="off">
                    </div>
                  <div class="form-group">
                    <input type="hidden" name="page-validate" value="new-customer">
                    <input class="form-control" type="text" name="lname" placeholder="Last Name" required="" autocomplete="off">
                  </div>
                    <div class="form-group">
                        <input class="form-control" type="email" name="emailid" placeholder="Email ID" required="" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required="" autocomplete="off">
                    </div>
                     <button type="submit" class="login-btn" name="customer" id="contactub">Create New Account</button>
                </form>
                        </span>
                    </div>
                    </div>
                </div>
                <?php
                    if(isset($_POST['addgustcutomer'])){
                      $unqli_id_val = uniqid();
                      $email_idgust = $unqli_id_val."guest@jioitservices.com";
                      $fname = addslashes(trim($_POST['customer-firstName']));
                      $lname = addslashes(trim($_POST['customer-lastName']));
                      $address = addslashes(trim($_POST['customer-address']));
                      $country = $_POST['customer-country'];
                      $state = $_POST['customer-state'];
                      $city = addslashes(trim($_POST['customer-city']));
                      $postalcode = addslashes(trim($_POST['customer-postalcode']));
                      $phone = $_POST['customer-phone'];
                      $otherNote = addslashes(trim($_POST['customer-orderNotes']));
                      $email = $_POST['customer-email'];
                      if(isset($_SESSION['shppingto'])){
                        if($_SESSION['shppingto'] == "2"){
                        }else{
                            $_SESSION['shppingto']="1";
                        }
                      }else{
                        $_SESSION['shppingto']="1";
                      }
                      $chking_gustomer = gust_user_sessiondata($fname,$lname,$address,$country,$state,$city,$postalcode,$phone,$otherNote,$email_idgust,$email);
                      //echo "<script>alert('$chking_gustomer');</script>";
                      if($chking_gustomer == true){
                        echo "<script>window.location.href='$url/checkout/'</script>";
                      }
                    }
                ?>
                <div class="col-md-4 right-login">
                    <div class="checkout-form bggray">
                    
                    <h3>Guest Checkout</h3>
                    <div class="theme-card">
                        <div class="checkout-theme-form">
                            <!--  Customer Details -->
                            <form role="form" method="post" enctype="multipart/form-data" action="" style="display: flex; flex-wrap: wrap;">
                                <div class="row check-out-row ">
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" name="customer-firstName" id="newCfirstName" value="" placeholder="" required>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" name="customer-lastName" id="newClastName" value="" placeholder="" required>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <label class="field-label">Phone</label>
                                        <input type="text" class="form-control" name="customer-phone" id="newCphone" value="" placeholder="" required maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <label class="field-label">Email ID</label>
                                        <input type="email" class="form-control" name="customer-email" id="newCemail" value="" placeholder="" required>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <label class="field-label">Address</label>
                                        <input type="text" class="form-control" name="customer-address" id="newAddress" value="" placeholder="Street address" required>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <label class="field-label">City/Town (Optional)</label>
                                        <input type="text" class="form-control" name="customer-city" id="newCcity" value="" placeholder="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="field-label">Country</label>
                                        <select class="form-control country countrydffrnt" name="customer-country" id="newCcountry" required>
                                            <option value="">Select Country</option>
                                            <?php
                                                echo getcountyvale();
                                            ?>
                                        </select>
                                    </div>
                                    <?php
                                        $country = "";
                                    ?>
                                    <div class="form-group col-md-6">
                                        <label class="field-label">State/Province/Region</label>
                                    <select class="form-control response dfftstate" name="customer-state" required id="newCstate" data-weight="0">
                                        <?php
                                            echo getvalestate($country);
                                        ?>
                                    </select>
                                </div>
                                <input type="hidden" class="form-control" name="customer-countcod" id="countCod" required="" value="0" placeholder="">
                                <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                    <label class="field-label">Postal Code / Zip Code</label>
                                    <input type="text" class="form-control" name="customer-postalcode" required id="newCpcode" value="" placeholder="">
                                </div>
                                
                                <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                    <label class="field-label">Order Notes</label>
                                    <textarea type="text" class="form-control" name="customer-orderNotes" id="ordernote" placeholder=""></textarea>
                                </div>
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <button type="submit" name="addgustcutomer" class="btn btn2 checkbtn2">Checkout</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php include 'includes/footer.php'; ?>
<script type="text/javascript">
$(document).ready(function(){
    $("select.countrydffrnt").change(function(){
        var selectedCountry = $(".countrydffrnt option:selected").val();
        $.ajax({
            type: "POST",
            url: "<?php //echo $url; ?>/get_state/",
            data: { country : selectedCountry }
        }).done(function(data){
            $(".dfftstate").html(data);
        });
    });
});
</script>