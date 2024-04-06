<?php

include_once('admin_dist/includes/uper-header.php');

include_once('admin_dist/includes/main-header.php');

include_once('admin_dist/includes/top-bar.php');

include_once('admin_dist/includes/left-menu.php');

if(isset($_GET['page-id']) && isset($_GET['ut'])){

  $get_page_details = get_page_names($_GET['page-id'],$_GET['ut']);

  foreach ($get_page_details as $value) {
    $get_page_name = $value['page_name'];
    $get_page_url = $value['page_slug'];
    $get_page_content = $value['page_content'];
    $get_page_cstlink = $value['page_cst_link'];
    $get_page_status = $value['page_status'];
    $get_page_bgimage = $value['page_brcomimg'];
  }

}else{
  echo "<script>window.location.href='$url/admin-manager/all-pages/';</script>";
}
?>
<style type="text/css">
  img.img-responsive {
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

            <h1>Edit</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="<?php echo $url; ?>/seo-user/">Home</a></li>

              <li class="breadcrumb-item active">Edit</li>

            </ol>

          </div>

        </div>

      </div><!-- /.container-fluid -->

    </section>



    <!-- Main content -->

    <section class="content">
      <div class="container-fluid">
        <?php
        if($get_page_cstlink == "index.php"){
          echo '<form role="form" method="post" enctype="multipart/form-data" action=""><div class="row">';
          include_once('template/home-page.php');
          echo '</div></form>';
        }elseif($get_page_cstlink == "about-page.php"){
          echo '<form role="form" method="post" enctype="multipart/form-data" action=""><div class="row">';
          include_once('template/about-page.php');
          echo '</div></form>';
        }else{
        ?>
<div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">

                <h3 class="profile-username text-center"><?php echo $get_page_name; ?></h3>

                <a href="<?php echo $url; ?>/<?php echo $get_page_url; ?>/" class="btn btn-primary btn-block" target="_blank"><b>View Page</b></a>
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
                      <?php $pageautoid = $get_page_url; ?>
                      <input type="hidden" name="geturlval" value="<?php echo $pageautoid; ?>">
                      <?php include_once("template/seo-page.php"); ?>
                      <div class="form-group">
                        <input type="submit" value="Update" name="editseopagedata" class="btn btn-success float-right">
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

        <?php
        }
        ?>

        <!-- /.col-->

      </div>

      <!-- ./row -->
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

