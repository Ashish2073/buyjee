<?php
$edit_post_data = GetAdsVideos($_GET['page-id']);
foreach($edit_post_data as $postedit_val){
    $get_page_name = $postedit_val['adsvideo_title'];
    $get_page_link = $postedit_val['adsvideo_you_link'];
    $get_page_status = $postedit_val['adsvideo_status'];
}
?>
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

              <li class="breadcrumb-item"><a href="<?php echo $url; ?>/admin-manager/">Home</a></li>

              <li class="breadcrumb-item active">Edit <?php echo $get_page_name; ?></li>

            </ol>

          </div>

        </div>

      </div><!-- /.container-fluid -->

    </section>



    <!-- Main content -->

    <section class="content">

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

                            <input type="text" class="form-control chaking-pagename" name="videonametitle" id="postnamechking" value="<?php echo $get_page_name; ?>" placeholder="Enter ..." required>
                            <input type="hidden" name="video-type" value="<?php echo $_GET['pagetype']; ?>">
                            <input type="hidden" name="video-action" value="<?php echo $_GET['pageaction']; ?>">
                        </div>

                    </div>

                    <div class="col-md-12">

                        <div class="form-group">

                            <label>Youtube Link</label>

                            <input type="text" class="form-control" name="video-url" placeholder="Enter ..." value="<?php echo $get_page_link; ?>">
                        </div>

                    </div>

                    <div class="col-md-12">

                      <div class="form-group">

                        <label>Page Active UnActive</label>

                        <select class="custom-select" name="video-status" required>
                        <?php
                            if($get_page_status == "1"){
                        ?>
                            <option value="1" selected>Active</option>
                            <option value="2">UnActive</option>
                        <?php
                            }elseif($get_page_status == "2"){
                        ?>
                            <option value="1">Active</option>
                            <option value="2" selected>UnActive</option>
                        <?php
                            }
                        ?>

                        </select>

                      </div>

                    </div>

                    <div class="form-group">

                      <input type="submit" value="Update" name="add-new-video" class="btn btn-success float-right">

                  </div>

                </div>

            </div>

          </form>

          </div>

        </div>

        <!-- /.col-->

      </div>

      <!-- ./row -->

    </section>

    <!-- /.content -->

  </div>

  <!-- /.content-wrapper -->

  <!-- /.control-sidebar -->

</div>

<!-- ./wrapper -->