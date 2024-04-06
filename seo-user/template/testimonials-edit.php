<?php
$edit_post_data = GetTestimonialsData($_GET['page-id']);
foreach($edit_post_data as $postedit_val){
    $get_page_name = $postedit_val['testmon_name'];
    $get_page_postion = $postedit_val['testmon_posion'];
    $get_page_rating = $postedit_val['testmon_rating'];
    $get_page_text = $postedit_val['testmon_text'];
    $get_page_image = $postedit_val['testmon_image'];
    $get_page_status = $postedit_val['testmon_status'];
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

                    <div class="col-md-4">

                        <div class="form-group">

                            <label>Name</label>

                            <input type="text" class="form-control chaking-pagename" name="testmlname" value="<?php echo $get_page_name; ?>" placeholder="Enter ..." required>
                            <input type="hidden" name="testml-type" value="<?php echo $_GET['pagetype']; ?>">
                            <input type="hidden" name="testml-action" value="<?php echo $_GET['pageaction']; ?>">
                        </div>

                    </div>
                    <div class="col-md-4">

                        <div class="form-group">

                            <label>Position</label>

                            <input type="text" class="form-control chaking-pagename" name="testmlpostion" placeholder="Enter ..." value="<?php echo $get_page_postion; ?>" required>
                        </div>

                    </div>
                    <div class="col-md-4">

                        <div class="form-group">

                            <label>Rating</label>

                            <input type="number" min="1" max="5" class="form-control chaking-pagename" value="<?php echo $get_page_rating; ?>" name="testmlrating" placeholder="Enter ..." required>
                        </div>

                    </div>

                    <div class="col-md-12">

                        <div class="mb-3">

                            <label>Content</label>

                            <textarea class="textarea" name="testml-text-content" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $get_page_text; ?></textarea>

                        </div>

                    </div>
                    <div class="col-md-4">

                        <div class="form-group">

                            <img src="<?php echo $url; ?>/images/<?php echo $get_page_image; ?>" class="img-responsive">

                        </div>

                    </div>
                    <div class="col-md-8">

                        <div class="form-group">

                            <label>Thumbnail Image (80x80px)</label>

                            <input type="file" class="form-control" name="testml-thumimage" placeholder="Enter ...">
                            <input type="hidden" class="form-control" name="testml-thumimage-chking" value="<?php echo $get_page_image; ?>">
                        </div>

                    </div>

                    <div class="col-md-12">

                      <div class="form-group">

                        <label>Page Status</label>

                        <select class="custom-select" name="testml-status" required>
                        <?php
                             if($get_page_status == "1"){
                        ?>
                            <option value="1" selected>Active</option>

                            <option value="2">Inactive</option>
                        <?php
                             }elseif($get_page_status == "2"){
                        ?>
                            <option value="1">Active</option>

                            <option value="2" selected>Inactive</option>
                        <?php
                             }
                        ?>
                        </select>

                      </div>

                    </div>

                    <div class="form-group">

                      <input type="submit" value="Update" name="add-new-testml" class="btn btn-success float-right">

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