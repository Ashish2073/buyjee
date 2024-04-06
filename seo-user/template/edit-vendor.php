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
$edit_courseata = GetVenderDatavale($_GET['id']);
foreach($edit_courseata as $valecourseval){
  foreach(GetPermissionvalData($valecourseval['vendor_auto']) as $venorpermisin){
    $_vesnor_fname = $valecourseval['vendor_f_name'];
    $_vesnor_lname = $valecourseval['vendor_l_name'];
    $_vesnor_joingdate = $valecourseval['vendor_date'];
    $_vesnor_joingtime = $valecourseval['vendor_time'];
    $_vesnor_profileimg = $valecourseval['vendor_img'];
    foreach(GetBannerDataVale($valecourseval['vendor_auto'],"vendor","active") as $valebannerdat){
      $_vesnor_bannerimg = $valebannerdat['bannerName'];
    }
}
foreach(GetProductDataValTab("0",$valecourseval['vendor_auto']) as $productvale){
  if($productvale['product_status'] == "1"){
    $countproduct[] = $productvale['product_status'];
  }
}
foreach(GetAboutVendor($_GET['id'],'vendor') as $aboutconent){
}
foreach(GetShppingTreamValue($_GET['id'],'vendor') as $shppingconent){
}
}
?>
  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Edit <?php echo $_vesnor_fname; ?> <?php echo $_vesnor_lname; ?></h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="<?php echo $url; ?>/seo-user/">Home</a></li>

              <li class="breadcrumb-item active">Edit <?php echo $_vesnor_fname; ?> <?php echo $_vesnor_lname; ?></li>

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
                    <b>A/C Created Date:</b> <a class="float-right"><?php echo $_vesnor_joingdate; ?></a>
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
    <!-- /.content -->
  </div>

  <!-- /.content-wrapper -->

  <!-- /.control-sidebar -->

</div>

<!-- ./wrapper -->