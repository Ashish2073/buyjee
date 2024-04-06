<?php include 'includes/upper-header.php'; ?>

<title>Vendor Inquiry</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="canonical" href="#"> 
<style>
    p#result {
    margin-bottom: 20px;
}
</style>
<?php include 'includes/main-header.php';?>

<main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="<?php echo $url; ?>/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Vendor Inquiry
                </div>
            </div>
        </div>
        <div class="page-content pt-80 pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="login_wrap widget-taber-content background-white">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h1 class="mb-5">Vendor Inquiry</h1>
                                        </div>
                                        <form class="theme-form" role="form" method="post" enctype="multipart/form-data" action="">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p id="result"></p>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span><input type="text" id="Fname" placeholder="First Name" name="firstname" class="form-control" required=""> <span class="validate-error"></span></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span><input type="text" id="lname" placeholder="Last Name" name="lname" class="form-control" required=""> 
                                                        <span class="validate-error"></span></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span><input type="email" id="email" placeholder="Email ID" name="emailid" class="form-control" required=""> <span class="validate-error"></span></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span><input type="phone" id="phone" placeholder="Phone" name="phoneid" class="form-control" required=""> <span class="validate-error"></span></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span><input type="text" id="cname" placeholder="Company Name" name="Comname" class="form-control"> <span class="validate-error"></span></span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span><input type="text" id="weburl" placeholder="Website" name="weburl" class="form-control"> <span class="validate-error"></span></span>
                                                </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <button type="button" class="login-btn" name="vendor" id="vendor">Submit Inquiry</button>
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
    </main>
<!--about top-->
<?php include 'includes/footer.php'; ?>