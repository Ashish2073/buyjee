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
/*if(isset($_GET['delete']) && isset($_GET['id'])){
    $deletablevale = "id='".$_GET['id']."'";
    $delete_vale = DeleteALlDataVlae('slideres_table_content',$deletablevale);
    if($delete_vale == true){
      echo "<script>alert('Successfully Delete.');window.location.href='$url/admin-manager/slider/';</script>";
	}else{
		echo "<script>alert('Please Try Again.');</script>"; 
    }
}*/
?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Seo User</h1>

          </div>

          <div class="col-sm-6">

            <a class="btn btn-primary float-right" href="<?php echo $url; ?>/admin-manager/seo/?action=addnew">Add New User</a>

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

              <h3 class="card-title">Seo User</h3>

            </div>

            <div class="card-body">

              <table class="table">
                <thead>
                  <tr>
                    <th>Full Name</th>
                    <th>Email Id</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody class="set-protal">
                  <?php
                    $sliderdata = GetLoginUserDetails(0,"seouser");
                    foreach($sliderdata as $slidrvalue){
                      if($slidrvalue['user_status'] == "0"){
                        $statusale = "Active";
                      }elseif($slidrvalue['user_status'] == "1"){
                        $statusale = "Inactive";
                      }
                  ?>
                    <tr>
                      <td><?php echo $slidrvalue['user_first_name']; ?> <?php echo $slidrvalue['user_lastname']; ?></td>
                      <td><?php echo $slidrvalue['user_email']; ?></td>
                      <td><?php echo $statusale; ?></td>
                      <td class="text-right py-0 align-middle">
                        <div class="btn-group btn-group-sm">
                          <a href="<?php echo $url; ?>/admin-manager/seo/?edit=<?php echo $slidrvalue['id']; ?>&userid=<?php echo $slidrvalue['user_auto']; ?>" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                          <a href="<?php echo $url; ?>/admin-manager/seo/?delete=action&id=<?php echo $slidrvalue['id']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </div>
                      </td>
                    </tr>
                  <?php } ?>
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