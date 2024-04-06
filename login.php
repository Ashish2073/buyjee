<?php include 'includes/upper-header.php'; ?>
<?php include 'includes/main-header.php';?>  

<main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb"> 
                    <a href="<?php echo $url; ?>/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Login
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
                                        <form role="form" method="post" enctype="multipart/form-data" action="" id="loginform" class="theme-form">
                                        <div class="form-group">
                                            <span><input type="text" name="email" id="email" placeholder="Email ID" class="form-control" required="" autocomplete="off"> <span class="validate-error"></span></span>
                                        </div>
                                        <div class="form-group"> 
                                            <div class="input-group" id="show_hide_password">
                                              <input type="password" name="password" id="password" placeholder="Password" class="form-control" required="" autocomplete="off"> 
                                              <div class="input-group-addon">
                                                <a href="javascript:void(0)"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                              </div>
                                            </div>
                                        </div>
                                        <button type="submit" name="login" id="login" class="login-btn">Login</button> <a class="btn-right txt-default mt-2" href="<?php echo $url; ?>/forgotpass/" id="fgpwd">Forgot your password?</a>
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
<script>
    $(document).ready(function() {
        $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if($('#show_hide_password input').attr("type") == "text"){
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass( "fa-eye-slash" );
                $('#show_hide_password i').removeClass( "fa-eye" );
            }else if($('#show_hide_password input').attr("type") == "password"){
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass( "fa-eye-slash" );
                $('#show_hide_password i').addClass( "fa-eye" );
            }
        });
    });
</script>