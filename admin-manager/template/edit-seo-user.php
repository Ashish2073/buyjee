<?php
foreach(GetLoginUserDetails($_GET['userid'],"seouser") as $seouserval){
}
?>
<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Edit User</h1>

          </div>

        </div>

      </div><!-- /.container-fluid -->

    </section>



    <!-- Main content -->

    <section class="content">

      <div class="row">
        <!-- left box -->
        <!-- right Box -->
        <div class="col-md-12">

          <div class="card card-primary">

            <div class="card-header">

              <h3 class="card-title">Edit User</h3>

            </div>

            <div class="card-body">
              <form role="form" method="post" action="">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="seotitle">First Name</label>
                      <input type="text" class="form-control" placeholder="First Name" value="<?php echo $seouserval['user_first_name']; ?>" name="updatefname" required>
                      <input type="hidden" name="getuserid" value="<?php echo $_GET['userid']?>">
                      <input type="hidden" name="getid" value="<?php echo $_GET['edit']?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="seotitle">Last Name</label>
                      <input type="text" class="form-control" placeholder="Last Name" value="<?php echo $seouserval['user_lastname']; ?>" name="updatelname" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="seotitle">Email Id</label>
                      <input type="email" class="form-control" placeholder="Email Id" value="<?php echo $seouserval['user_email']; ?>" name="updateemailid" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="seotitle">Reset Password</label>
                      <input type="text" class="form-control" placeholder="Enter new password." name="updatepasswordvale">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Status</label>
                      <select class="form-control" name="updatestatusaction" required>
                        <?php
                          if($seouserval['user_status'] == "0"){
                            echo "<option value='0' selected>Active</option>
                                  <option value='1'>Inactive</option>";
                          }elseif($seouserval['user_status'] == "1"){
                            echo "<option value='0'>Active</option>
                                  <option value='1' selected>Inactive</option>";
                          }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="submit" value="Update" name="updateseouser" class="btn btn-success float-left">
                </div>
              </form>
            </div>

            <!-- /.card-body -->

          </div>

          <!-- /.card -->

        </div>
        <!-- right Box -->

      </div>

    </section>

    <!-- /.content -->

  </div>

  <!-- /.content-wrapper -->

</div>

<!-- ./wrapper -->