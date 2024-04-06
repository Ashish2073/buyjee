<?php
include_once('admin_dist/includes/uper-header.php');
include_once('admin_dist/includes/main-header.php');
include_once('admin_dist/includes/top-bar.php');
include_once('admin_dist/includes/left-menu.php');
?>
<style type="text/css">
  .set-img img {
    width: 40%;
}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!--<li class="breadcrumb-item"><a href="#">Home</a></li>-->
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>
          <!-- /.content-header -->
          <!-- Main content -->
          <section class="content">
            <div class="container-fluid">
              <!-- Info boxes -->
              <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fa fa-users"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">All Customers</span>
                      <span class="info-box-number">
                        <?php echo GLLTotal_Customer_Count(); ?>
                        <!-- <small>%</small> -->
                      </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-user-secret"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">All Vendors</span>
                      <span class="info-box-number"><?php echo GLLTotal_Vendor_Count(); ?></span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <!-- fix for small devices only -->
                <!-- <div class="clearfix hidden-md-up"></div> -->
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-product-hunt"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">All Products</span>
                      <span class="info-box-number"><?php echo GLLTotal_Product_Count("0"); ?></span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fa fa-product-hunt"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Live Products</span>
                      <span class="info-box-number"><?php echo GLLTotal_Product_Count("1"); ?></span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <!-- Main row -->
              <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-12">
            <!-- USERS LIST -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Vendors Request</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="users-list clearfix">
                  <?php
                  foreach(GLLVendor_RequestData() as $vendorquerts){
                  ?>
                    <li class="set-img">
                      <img src="<?php echo $url; ?>/assets/images/logo.png" alt="Vendor Image">
                      <a class="users-list-name" href="#"><?php echo $vendorquerts['vendor_f_name']; ?> <?php echo $vendorquerts['vendor_l_name']; ?></a>
                    </li>
                  <?php
                  }
                  ?>
                </ul>
                <!-- /.users-list -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="<?php echo $url; ?>/admin-manager/vendors-page?action=request">View All Users</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!--/.card -->
          </div>
          <!--/.col-12 -->
          <div class="col-md-12">
            <!-- USERS LIST -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Low Stock Threshold Products List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="users-list clearfix">
                  <?php
                    echo MinStockFreshHold();
                  ?>
                </ul>
                <!-- /.users-list -->
              </div>
            </div>
            <!--/.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
              </div><!--/. container-fluid -->
            </section>
            <!-- /.content -->
          </div>
          <!-- /.content-wrapper -->
          <!-- /.control-sidebar -->
          <?php
          include_once('admin_dist/includes/footer.php');
          ?>