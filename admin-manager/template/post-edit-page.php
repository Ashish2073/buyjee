<?php
$edit_post_data = GetPostDataValueContent($_GET['page-id'],$_GET['pagetype']);
foreach($edit_post_data as $postedit_val){
    $get_page_name = $postedit_val['postblog_title'];
    $get_page_text = $postedit_val['postblog_textcont'];
    $get_page_image = $postedit_val['postblog_images'];
    $get_page_status = $postedit_val['postblog_status'];
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

                            <input type="text" class="form-control chaking-pagename" name="postnametitle" id="postnamechking" value="<?php echo $get_page_name; ?>" placeholder="Enter ..." required>
                            <input type="hidden" name="post-type" value="<?php echo $_GET['pagetype']; ?>">
                            <input type="hidden" name="post-action" value="<?php echo $_GET['pageaction']; ?>">
                        </div>

                    </div>

                    <div class="col-md-12">

                        <div class="mb-3">

                            <label>Page Content</label>

                            <textarea class="textarea" name="post-text-content" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $get_page_text; ?></textarea>

                        </div>

                    </div>
                    <div class="col-md-4">

                        <div class="form-group">

                            <img src="<?php echo $url; ?>/images/<?php echo $get_page_image; ?>" class="img-responsive">

                        </div>

                    </div>
                    <div class="col-md-8">

                        <div class="form-group">

                            <label>Thumbnail Image (1900x365px)</label>

                            <input type="file" class="form-control" name="post-thumimage" placeholder="Enter ...">
                            <input type="hidden" class="form-control" name="post-thumimage-chking" value="<?php echo $get_page_image; ?>">
                        </div>

                    </div>

                    <div class="col-md-12">

                      <div class="form-group">

                        <label>Page Status</label>

                        <select class="custom-select" name="post-status" required>
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

                      <input type="submit" value="Update" name="add-new-post" class="btn btn-success float-right">

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