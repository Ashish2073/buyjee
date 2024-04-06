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

            <h1>Edit <?php echo $get_page_name; ?></h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="<?php echo $url; ?>/admin-manager/index/">Home</a></li>

              <li class="breadcrumb-item active">Edit <?php echo $get_page_name; ?></li>

            </ol>

          </div>

        </div>

      </div><!-- /.container-fluid -->

    </section>



    <!-- Main content -->

    <section class="content">

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
        <div class="col-md-12">

          <div class="card card-outline card-info">

            <div class="card-header">

              <h3 class="card-title">

                Edit <?php echo $get_page_name; ?>

              </h3>

              <!-- tools box -->

              <div class="card-tools">

                <!-- <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"

                        title="Collapse">

                  <i class="fas fa-minus"></i></button> -->

              </div>

              <!-- /. tools -->

            </div>


            <!-- /.card-header -->
          <form role="form" method="post" enctype="multipart/form-data" action="">
            <div class="card-body pad">

                <div class="row">

                    <div class="col-md-12">

                        <div class="form-group">

                            <label>Title</label>

                            <input type="text" class="form-control chaking-pagename" name="edit-min-title" placeholder="Enter ..." value="<?php echo $get_page_name; ?>" required>

                        </div>

                    </div>

                    <div class="col-md-12">

                        <div class="mb-3">

                            <label>Description</label>

                            <textarea class="textarea" name="edit-min-cont" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"> <?php echo $get_page_content; ?></textarea>

                        </div>

                    </div>

                    <div class="col-md-12">

                        <div class="form-group">

                            <label>Custom Page Link</label>

                            <input type="text" class="form-control" name="edit-min-custlink"  value="<?php echo $get_page_cstlink; ?>" placeholder="Enter ...">

                        </div>

                    </div>

                    <div class="col-md-12">

                      <div class="form-group">

                          <label>Breadcrumb Image</label>

                          <div class="row">
                            <div class="col-md-2">
                              <img src="<?php echo $url; ?>/images/<?php echo $get_page_bgimage; ?>" class="img-responsive">
                            </div>
                            <div class="col-md-10">
                              <label>Image (1900x368px)</label>
                              <input type="file" class="form-control form-group" name="page-bgd-image">
                              <input type="hidden" value="<?php echo $get_page_bgimage; ?>" name="page-bgd-image-chking">
                            </div>
                          </div>
                      </div>
                    </div>

                    <div class="col-md-12">

                      <div class="form-group">

                        <label>Page Status</label>

                        <select class="custom-select" name="edit-min-status" required>
                          <?php
                          if($get_page_status == "1"){
                          ?>
                          <option value="1" selected>Active</option>

                          <option value="2">Inactive</option>
                          <?php
                          }elseif($get_page_status == "1"){
                          ?>
                          <option value="1">Active</option>

                          <option value="2" selected>Inactive</option>
                          <?php
                          }
                          ?>
                        </select>

                      </div>

                    </div>

                    <div class="col-md-12">
                      <?php $pageautoid = $get_page_url; ?>
                      <?php include_once("template/seo-page.php"); ?>
                    </div>

                    <div class="form-group">

                      <input type="submit" value="Update" name="edit-min-page" class="btn btn-success float-right">

                  </div>

                </div>

            </div>

          </form>

          </div>

        </div>

        <?php
        }
        ?>

        <!-- /.col-->

      </div>

      <!-- ./row -->

    </section>

    <!-- /.content -->

  </div>

  <!-- /.content-wrapper -->

</div>

<!-- ./wrapper -->

 <?php

include_once('admin_dist/includes/footer.php');

?>

