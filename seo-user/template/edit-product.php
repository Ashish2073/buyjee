<?php

include_once('admin_dist/includes/uper-header.php');

include_once('admin_dist/includes/main-header.php');

include_once('admin_dist/includes/top-bar.php');

include_once('admin_dist/includes/left-menu.php');

?>
<?php
if(isset($_GET['pageid']) && isset($_GET['autoid'])){
}else{
  $paenameval = AddNewPageOneTime();
  echo "<script>window.location.href='$paenameval';</script>";
}
?>
  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Add New Product</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="<?php echo $url; ?>/seo-user/">Home</a></li>

              <li class="breadcrumb-item active">Add New Product</li>

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
                    $profileexplod = file_exists($url.'/images/vendor_images/'.$_vesnor_profileimg);
                    if($profileexplod){
                  ?>
                  <img src="<?php echo $url; ?>/images/vendor_images/<?php echo $_vesnor_profileimg; ?>" class="img-responsive profile-user-img img-fluid img-circle">
                  <?php
                    }else{
                  ?>
                  <img src="<?php echo $url; ?>/images/<?php echo $_vesnor_profileimg; ?>" class="img-responsive profile-user-img img-fluid img-circle">
                  <?php
                    }
                  ?>
                </div>

                <h3 class="profile-username text-center"><?php echo $_vesnor_fname; ?> <?php echo $_vesnor_lname; ?></h3>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Company Name:</b> <a class="float-right"><?php echo $valecourseval['vendor_company']; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Ac Create Date:</b> <a class="float-right"><?php echo $_vesnor_joingdate; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Total Products:</b> <a class="float-right"><?php echo GLLTotal_Product_Count("0",$_GET['id']); ?></a>
                  </li>
                </ul>

                <a href="<?php echo $url; ?>/<?php echo $valecourseval['vendor_uni_name']; ?>/" class="btn btn-primary btn-block" target="_blank"><b>View Store</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <form role="form" method="post" enctype="multipart/form-data" action="">
                      <input type="hidden" name="stroeurl" value="<?php echo $valecourseval['vendor_uni_name']; ?>">
                      <?php $pageautoid = $valecourseval['vendor_uni_name']; ?>
                      <?php include_once("template/seo-page.php"); ?>
                      <div class="form-group">
                        <input type="submit" value="Update" name="editseovendordata" class="btn btn-success float-right">
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

  </div>

  <!-- /.content-wrapper -->

</div>

<!-- ./wrapper -->

 <?php

include_once('admin_dist/includes/footer.php');

?>