<?php

include_once('admin_dist/includes/uper-header.php');

include_once('admin_dist/includes/main-header.php');

include_once('admin_dist/includes/top-bar.php');

include_once('admin_dist/includes/left-menu.php');

?>
<style type="text/css">
  img.img-responsive {
    width: 100% !important;
}
p.form-group.p-tag {
    width: 100%;
}
</style>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>All Customer</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="<?php echo $url; ?>/admin-manager/">Home</a></li>

              <li class="breadcrumb-item active">All Customer</li>

            </ol>

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

              <h3 class="card-title">All Customer</h3>
              <a class="float-right btn btn-success" href="<?php echo $url; ?>/admin-manager/export-csv/?pagename=customer">Export to CSV</a>

            </div>

            <div class="card-body">

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Images</th>
                    <th>Joining Date</th>
                    <th>Name</th>
                    <th>Email Id</th>
                    <th>Phone</th>
                    <th>Street Address</th>
                    <!-- <th>View Details</th> -->
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach(GetCustomerDataVal() as $valuecvnsor){
                    foreach(GetLoginUserDetails($valuecvnsor['customer_ui_id']) as $valedatalogin){
                      if($vendorpermisn['customer_active'] == "0"){
                        echo "<tr class='blockvendor'>";
                      }else{
                        echo "<tr class='unblockvendor'>";
                      }
                      if($valuecvnsor['customer_img'] == "0"){
                        $imgcustomer = "customer/images/default-user-icon.jpg";
                      }else{
                        $imgcustomer = "images/vendor_images/".$valuecvnsor['customer_img'];
                      }
                  ?>
                    <td style="width: 20%;"><img src="<?php echo $url; ?>/<?php echo $imgcustomer; ?>" style="width: 30%;"></td>
                    <td><?php echo $valuecvnsor['customer_date']; ?> / <?php echo $valuecvnsor['customer_time']; ?></td>
                    <td><a href="<?php echo $url; ?>/admin-manager/single-customer/?id=<?php echo $valuecvnsor['id']; ?>&autoid=<?php echo $valuecvnsor['customer_ui_id']; ?>" target="_blank"><?php echo $valuecvnsor['customer_fname']; ?> <?php echo $valuecvnsor['customer_lname']; ?></a></td>
                    <td><?php echo $valedatalogin['user_email']; ?></td>
                    <td><?php echo $valuecvnsor['customer_phone']; ?></td>
                    <td><?php echo $valuecvnsor['customer_address']; ?></td>
                    <!-- <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href="<?php //echo $url; ?>/admin-manager/customer-page?action=edit&id=<?php //echo $valuecvnsor['vendor_auto']; ?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
                      </div>
                    </td> -->
                  </tr>
                <?php }} ?>
                </tbody>
              </table>

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

 <?php

include_once('admin_dist/includes/footer.php');

?>