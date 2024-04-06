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
                    <span class="info-box-icon bg-info elevation-1"><i class="fa fa-thumbs-up"></i></span>
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
                    <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-thumbs-down"></i></span>
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
                    <span class="info-box-icon bg-success elevation-1"><i class="fa fa-file-text-o"></i></span>
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
                    <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-smile-o"></i></span>
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
                <h3 class="card-title">Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Full Name</th>
                      <th>Email Id</th>
                      <th>Your ID</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?php echo $fnname; ?> <?php echo $lnname; ?></td>
                      <td><?php echo $emailid; ?></td>
                      <td><?php echo $Userid; ?></td>
                      <td>Active</td>
                    </tr>
                  </tbody>
                </table>
                <!-- /.users-list -->
              </div>
            </div>
            <!--/.card -->
          </div>
          <!--/.col-12 -->
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