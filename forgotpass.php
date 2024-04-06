<?php include 'includes/upper-header.php'; ?>
<?php include 'includes/main-header.php';?>
<title>Forgot Your Password</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="canonical" href="#">
<main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="<?php echo $url; ?>/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Forgot Your Password
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
                                            <h1 class="mb-5">Login</h1>
                                            <p class="mb-30">Don't have an account? <a href="<?php echo $url; ?>/register/">Create here</a></p>
                                        </div>
                                        <form class="theme-form" role="form" method="post">

                                                <div class="form-group">
                
                                                    <span><input type="email" id="email" placeholder="Enter your email ID" name="email" class="form-control" required></span>
                
                                                </div>
                                                <button type="submit" class="login-btn" name="forpassdata">Reset Password </button>
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
<?php include 'includes/footer.php'; ?>