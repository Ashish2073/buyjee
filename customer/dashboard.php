<?php include 'sessionset.php'; ?>
<?php
//echo $_SESSION['customersessionlogin'];
?>
<?php include 'format.php'; ?>
<?php include 'includes/upper-header.php'; ?>
<meta name="description" content="">
<meta name="keywords" content="">
<title><?php echo customrname(); ?> | Customer Dashboard</title>
<link rel="stylesheet" type="text/css" href="<?php echo $cus_url; ?>/user_dasboard.css">
<?php include 'includes/main-header.php'; ?>

<?php
$session_data = $_SESSION['customersessionlogin'];
if(isset($_POST['editvalue'])){
$fnamecustedit = $_POST['fname'];
$lnamecustedit = $_POST['lname'];
$agecustedit = $_POST['age'];
$gendercustedit = $_POST['gender'];
$emailcustedit = $_POST['email'];
$phonecustedit = $_POST['phone'];
$countrycustedit = $_POST['country'];
$sataecustedit = $_POST['state'];
$citycustedit = $_POST['city'];
$pincodecustedit = $_POST['pincode'];
$addrescustedit = $_POST['address'];
$countycodevl = $_POST['cuntcodevl'];
$editview = customeredit($fnamecustedit,$lnamecustedit,$agecustedit,$gendercustedit,$emailcustedit,$phonecustedit,$addrescustedit,$countrycustedit,$sataecustedit,$citycustedit,$pincodecustedit,$countycodevl);
if($editview == true){
$msgok = "<p>Successfully Updated</p>";
}else{
$msgno = "<p>Please Try Again.</p>";
}
}
if(isset($_POST['changepassword'])){
$oldpassword = $_POST['oldpassswoed'];
$newpassword = $_POST['newpassword'];
$changepassword = changepssval($oldpassword,$newpassword,$session_data);
if($changepassword == true){
echo "<script>alert('Successfully Change');</script>";
}else{
echo "<script>alert('Please try again. Your old password is incorrect.');</script>";
}
}
$folder_path = realpath(dirname(__FILE__));
$explode_path = explode('/customer', $folder_path);
$echozeo = $explode_path[0];
if(isset($_POST['imgedit'])){
$prodtaddautoid = rand(888888,999999999);
$imag_path = "$echozeo/images/";
$prodtaddimagname = $_FILES['prodtmainimg']['name'];
$prodtaddimagsize = $_FILES['prodtmainimg']['size'];
$prodtaddimagtmp_name = $_FILES['prodtmainimg']['tmp_name'];
$prodtaddimag_type = $_FILES['prodtmainimg']['type'];
$fileData = pathinfo(basename($prodtaddimagname));
$single_imag_name = $prodtaddautoid;
$productimgnewfilename = $single_imag_name.'.'.$fileData['extension'];
move_uploaded_file($prodtaddimagtmp_name, "$imag_path/$productimgnewfilename");
$editview = customrimgupadte($productimgnewfilename);
}
$msgok = "";
$msgno = "";
?>
<!-- ========= main banner section ========== -->
<section>
    <div class="inner-banner-section primary-color-bg w-100 p-tb-30">
        <div class="mx-container">
            <div class="inner-head">
                <div class="inner-head-txt pd-lr-15">
                    <h1 class="h1-heading"><?php echo customrname(); ?></h1>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="breadcrumb breadcrumbmenu">
        <div class="mx-container">
            <!-- <ol class="breadcrumb2">
                <li></li>
            </ol> -->
        </div>
    </div>
</section>
<section>
    <div class="main-content w-100">
        <div class="mx-container">
            <div class="row">
                <div class="user_profile">
                    
                    <!-- Left Sidebar -->
                    <?php include 'sidebar.php';?>
                    <!--- End -->
                    <div class="user_right">
                        <div class="mx-container">
                            <div class="row my-2">
                                <div class="col-lg-8 order-lg-2">
                                    <?php echo $msgok; ?>
                                    <?php echo $msgno; ?>
                                    <div class="glltxtlogo"><img src="https://buyjee.com/images/2094396619.jpeg"></div>
                                    <ul class="nav nav-tabs tagul">
                                        <li class="nav-item active">
                                            <a href="" data-target="#profile" data-toggle="tab" class="nav-link ">Profile</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="" data-target="#messages" data-toggle="tab" class="nav-link">Edit</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="" data-target="#password" data-toggle="tab" class="nav-link">Change Password</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content py-4">
                                        <div class="tab-pane active" id="profile">
                                            <div class="table_box">
                                                <table class="table table-bordered table-striped">
                                                    <!-- <thead>
                                                        <tr>
                                                            <th colspan="2"><h6>Contact Information</h6></th>
                                                            <th>Lastname</th>
                                                        </tr>
                                                    </thead> -->
                                                    <tbody>
                                                        <?php echo customerdeatilsview(); ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--/row-->
                                        </div>
                                        <div class="tab-pane" id="messages">
                                            <h5 class="mb-3">Update Your Profile Information</h5>
                                            <form role="form" method='post' enctype='multipart/form-data' action="">
                                                <?php echo customereditview(); ?>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                                    <div class="col-lg-9">
                                                        <input type="submit" class="btn btn-primary" value="Update" name='editvalue'>
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
                                                        <input class="form-control" type="password" name="oldpassswoed" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label form-control-label">New Password</label>
                                                    <div class="col-lg-9">
                                                        <input class="form-control" type="password" name="newpassword" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                                    <div class="col-lg-9">
                                                        <input type="submit" class="btn btn-primary" value="Update" name="changepassword">
                                                    </div>
                                                </div>
                                                <!--/row-->
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 order-lg-1 text-center">
                                    <div id="custmnone">
                                        <div class="prevbox">
                                        <img src="<?php echo customrimg(); ?>">
                                    </div>
                                    </div>
                                    <div id="imagePreview"></div>
                                    <h6 class="mt-2">Update Profile Picture</h6>
                                    <div class="uplodfile">
                                    <form role="form" method="post" enctype="multipart/form-data" action="">
                                        <div class="row">
                                            <div class="col-lg-12 form-group">
                                                <label class="custom-file">
                                                    <input type="file" class="custom-file-input" id="productmainimg" name="prodtmainimg" onchange="return singlfileValidation()" required>
                                                </label>
                                            </div>
                                            <div class="col-lg-12">
                                                <input type="submit" class="btn btn-primary centerimg" value="Update" name='imgedit'>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- /////////// footer section ////////////// -->
    <?php include 'includes/footer.php'; ?>
    <script type="text/javascript">
    $(document).ready(function(){
    $("select.country").change(function(){
    var selectedCountry = $(".country option:selected").val();
    $.ajax({
    type: "POST",
    url: "<?php echo $url; ?>/get_state/",
    data: { country : selectedCountry }
    }).done(function(data){
    $(".response").html(data);
    });
    });
    });
    $(document).ready(function(){
    $("select.response").change(function(){
    var selectedstate = $(".response option:selected").val();
    $.ajax({
    type: "POST",
    url: "<?php echo $url; ?>/get_state/",
    data: { statecode : selectedstate }
    }).done(function(data){
    $(".statecodevale").val(data);
    //alert(data);
    });
    });
    });
    function singlfileValidation(){
    var fileInput = document.getElementById('productmainimg');
    var filesize = document.getElementById('productmainimg').files[0];
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!allowedExtensions.exec(filePath)){
    alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
    fileInput.value = '';
    return false;
    }else if(filesize.size > 2097152){
    alert('Please upload less then 2MB');
    fileInput.value = '';
    return false;
    }else{
    //Image preview
    if (fileInput.files && fileInput.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
    document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'" class="img-responsive"/>';
    document.getElementById('custmnone').innerHTML = '';
    };
    reader.readAsDataURL(fileInput.files[0]);
    }
    }
    }
    </script>