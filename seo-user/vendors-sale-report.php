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

            <h1>Vendor Sales Report</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="<?php echo $url; ?>/admin-manager/">Home</a></li>

              <li class="breadcrumb-item active">Vendor Sales Report</li>

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

              <h3 class="card-title">Vendor Sales Report</h3>
              <input type="button" id="btnExport" class="float-right btn btn-success" value="Export to CSV" />

            </div>

            <div class="card-body">

              <table id="example1" class="table table-bordered table-striped tableexportcsv">
                <thead>
                  <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Vendor Name</th>
                    <th>Customer Name</th>
                    <th>Paid Amount</th>
                    <th>Status</th>
                    <th>Transaction ID</th>
                    <th>Date / Time</th>
                  </tr>
                </thead>
                <tbody>
                  <?php echo vendorsales(); ?>
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