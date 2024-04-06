<?php include 'includes/upper-header.php'; ?>  

    <meta name="description" content="">

    <meta name="keywords" content="">

    <title>Reset Password</title>

<?php include 'includes/main-header.php'; ?>
<?php
if(isset($_GET['token']) && isset($_GET['auto']) && isset($_GET['email'])){
  $get_token = $_GET['token'];
  $auto_token = $_GET['auto'];
  $email_token = $_GET['email'];
  $valdate = valedatevalue($get_token,$auto_token,$email_token);
  if($valdate == true){
    //echo "1";
  }else{
    //echo "2";
    header("Location: ".$url."/");
  }
  if(isset($_POST['resetpass'])){
    $new_password = $_POST['newpassword'];
    $renewpassword = $_POST['renewpass'];
    if($new_password == $renewpassword){
      $query_vale = setnewpass($new_password,$auto_token,$email_token,$get_token);
      if($query_vale == true){
        echo "<script>alert('Successfully Update Your Password');window.location.href='$url/login';</script>";
      }else{
        echo "<script>alert('Please Try Again.');</script>";
      }
    }else{
        echo "<script>alert('Your New Password and Re-Enter New Password not match.');</script>";
    }
  }
}else{
    header("Location: ".$url."/");
  }
?>
<!-- ========= main banner section ========== -->

  <div class="main-banner inner-banner banner-scroll" style="background: url('<?php echo $url; ?>/assets/images/about-banner.jpg') no-repeat center center;">
        <div class="fixed-banner ">
            <div class="banner-content">
                <div class="content-wrap mb-0 banner-overlay">
                    <div class="inner">
                        <!-- <h2>Shop Page</h2> -->
                        <ol class="breadcrumb">
                            <li><a href="<?php echo $url; ?>/">Home</a></li>
                            <!-- <li><a href="#">About Us</a></li> -->
                            <li class="active">Reset Password</li>
                        </ol>
                    </div>
                </div>
                <!--content wrap-->
            </div>
            <!--banner content-->
        </div>
    </div>
    <!--main banner-->

<section class="about-top p-tb50"> 

 

    <div class="container">

      <div class="row">

        <div class="col-lg-12 col-mg-md-12 col-sm-12">

          <div class="content-section">

            <div class="login-section">

                <div class="row">

                    <div class="col-md-6 col-md-offset-3 col-sm-12">

                        <h3>Reset Password</h3>

                        <div class="forgot-theme-card"><span>

                            <form class="theme-form" role="form" method="post">

                                <div class="form-group">

                                    <label for="email">New Password</label> 

                                    <span><input type="password" placeholder="" name="newpassword" class="form-control" required></span>

                                </div>
                                <div class="form-group">

                                    <label for="email">Confirm Password</label> 

                                    <span><input type="password" placeholder="" name="renewpass" class="form-control" required></span>

                                </div>

                                <button type="submit" class="login-btn" name="resetpass">Reset Password</button>
                        </form>

                        </span>

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