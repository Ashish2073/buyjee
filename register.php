<?php include 'includes/upper-header.php'; ?>  

<?php include 'includes/main-header.php'; ?>
<main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="<?php echo $url; ?>/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Register
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
                                            <h1 class="mb-5">Register</h1>
                                        </div>
                                        <p id="result"></p>

                                        <form class="theme-form" role='form' method='post' enctype="multipart/form-data" action="">
    
                                            <div class="row">
    
                                                <div class="col-md-6">
    
                                                    <div class="form-group">
    
                                                        <!-- <label for="First name">First Name</label>  -->
    
                                                        <span><input type="text" id="First name" placeholder="First Name" name="Firstname" class="form-control" required> <span class="validate-error"></span></span>
    
                                                    </div>
    
                                                </div>
    
                                                <div class="col-md-6">
    
                                                    <div class="form-group">
    
                                                        <!-- <label for="lname">Last Name</label>  -->
                                                        <span><input type="text" id="lname" placeholder="Last Name" name="lname" class="form-control" required> <span class="validate-error"></span></span>
    
                                                    </div>
    
                                                </div>
    
                                            </div>
    
                                            <div class="row">
    
                                                <div class="col-md-6">
    
                                                    <div class="form-group">
    
                                                        <!-- <label for="email">Email</label>  -->
                                                        <span><input type="email" placeholder="Email ID" name="emailid" class="form-control"> <span class="validate-error"></span></span>
    
                                                    </div>
    
                                                </div>
    
                                                <div class="col-md-6">
                                                    <div class="form-group"> 
                                                        <div class="input-group" id="show_hide_password">
                                                          <input type="password" name="password" id="password" placeholder="Password" class="form-control" required="" autocomplete="off"> 
                                                          <div class="input-group-addon">
                                                            <a href="javascript:void(0)"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                                          </div>
                                                        </div>
                                                    </div>
    
                                                </div>
    
                                                <div class="col-lg-12 col-md-12 col-sm-12">
    
                                                    <button type="submit" class="login-btn" name='customer' id="customer">create account</button>                                    
    
                                                    <p class="float-right mt-2">Already have an account? <a href="<?php echo $url; ?>/login/" class="txt-default">Click here </a>to Login</p>
    
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

<!-- /////////// footer section ////////////// -->

<?php include 'includes/footer.php'; ?>

<script type="text/javascript">

/*$(document).ready(function(){

    $("#customer").click(function(e){

        e.preventDefault();

         $.ajax({

            type: 'POST',

            url: 'register_login',

            data: $('form').serialize(),

            success: function (response) {

              //alert(response);

              $("#result").html(response);

            }

          });

    });

});*/

</script>
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