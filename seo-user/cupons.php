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
.table {
    overflow: auto;
    display: block;
}
tr.color-red {
    background-color: #ffa8a8 !important;
}
</style>
<?php
if(isset($_GET['delete']) && isset($_GET['id'])){
    $deletablevale = "id='".$_GET['id']."'";
    $delete_vale = DeleteALlDataVlae('coupons',$deletablevale);
    if($delete_vale == true){
      echo "<script>alert('Successfully Deleted.');window.location.href='$url/admin-manager/cupons/';</script>";
  }else{
    echo "<script>alert('Please Try Again.');</script>"; 
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

            <h1>All Coupons</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="<?php echo $url; ?>/admin-manager/">Home</a></li>

              <li class="breadcrumb-item active">All Coupons</li>

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

              <h3 class="card-title">All Coupons</h3>

            </div>

            <div class="card-body">

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Type</th>
                    <th>Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <!-- <th>No Of Use</th> -->
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php echo coupanshow(); ?>
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