<?php

include_once('admin_dist/includes/uper-header.php');

include_once('admin_dist/includes/main-header.php');

include_once('admin_dist/includes/top-bar.php');

include_once('admin_dist/includes/left-menu.php');

?>
<style>
    img.img-responsive {
    width: 100%;
}
span.staupdf {
    width: 100%;
    text-align: center;
    font-size: 60px;
    margin: auto;
    float: left;
    background: #007bff;
    margin-bottom: 10px;
    color: #FFF;
}
</style>
<?php
$edit_courseata = GetCustomerDataVal($_GET['autoid']);
foreach($edit_courseata as $valecourseval){
	if($valecourseval['customer_type'] == ""){
		$customertype = "Regular Customer";
	}elseif($valecourseval['customer_type'] == "Guest"){
		$customertype = "Guest Customer";
	}
}
foreach(GetLoginUserDetails($_GET['autoid']) as $loginemailid){
	$emailid = $loginemailid['user_email'];
}
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Customer</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo $url; ?>/admin-manager/">Home</a></li>
              <li class="breadcrumb-item active">Customer</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                <?php
                	if($valecourseval['customer_img'] == "0" || $valecourseval['customer_img'] == ""){
                ?>
                	<img class="profile-user-img img-fluid img-circle"
                       src="<?php echo $url; ?>/customer/images/default-user-icon.jpg"
                       alt="User profile picture">
                <?php
                	}else{
                ?>
                <img class="profile-user-img img-fluid img-circle"
                       src="<?php echo $url; ?>/images/<?php echo $valecourseval['customer_img']; ?>"
                       alt="User profile picture">
                <?php
                	}
                ?>
                </div>

                <h3 class="profile-username text-center"><?php echo $valecourseval['customer_fname']; ?> <?php echo $valecourseval['customer_lname']; ?></h3>
                <p class="text-muted text-center"><?php echo $customertype; ?></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <strong>Address</strong>

                <p class="text-muted"><?php echo $valecourseval['customer_address']; ?></p>

                <hr>
                <strong>City</strong>

                <p class="text-muted"><?php echo $valecourseval['customer_city']; ?></p>

                <hr>
                <strong>State</strong>

                <p class="text-muted"><?php echo $valecourseval['customer_state']; ?></p>

                <hr>
                <strong>Pin Code</strong>

                <p class="text-muted"><?php echo $valecourseval['customer_pincode']; ?></p>

                <hr>
                <strong>Country</strong>

                <p class="text-muted"><?php echo $valecourseval['customer_country']; ?></p>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Detail</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" disabled value="<?php echo $valecourseval['customer_fname']; ?> <?php echo $valecourseval['customer_lname']; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" disabled value="<?php echo $emailid; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Age</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" disabled value="<?php echo $valecourseval['customer_age']; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" disabled value="<?php echo $valecourseval['customer_gender']; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" disabled value="<?php echo $valecourseval['customer_phone']; ?>">
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- /.control-sidebar -->

</div>

<!-- ./wrapper -->
<?php

include_once('admin_dist/includes/footer.php');

?>