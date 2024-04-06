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

<?php
if($_GET['pagename'] == "vendor"){
  $pagename = "All Vendors";
  $url_pageset = "vendors/";
}elseif($_GET['pagename'] == "customer"){
  $pagename = "All Customer";
  $url_pageset = "all-customer/";
}elseif($_GET['pagename'] == "order"){
  $pagename = "All Order";
  $url_pageset = "order/?action=all";
}else{
  $pagename = "No Data Found";
  $url_pageset = "";
}
?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1><?php echo $pagename; ?></h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="<?php echo $url; ?>/admin-manager/">Home</a></li>

              <li class="breadcrumb-item active"><?php echo $pagename; ?></li>

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

              <h3 class="card-title"><?php echo $pagename; ?></h3>
              <a href="<?php echo $url; ?>/admin-manager/<?php echo $url_pageset; ?>" class="float-right btn btn-success" style="margin-left: 10px;">Back to <?php echo $pagename; ?></a>
              <input type="button" id="btnExport" class="float-right btn btn-success" value="Export to CSV" />

            </div>

            <div class="card-body">
              <?php
              if($_GET['pagename'] == "vendor"){
                require_once('template/vendor-table.php');
              }elseif($_GET['pagename'] == "customer"){
                require_once('template/customer-table.php');
              }elseif($_GET['pagename'] == "order"){
                require_once('template/customer-order.php');
              }
              ?>
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