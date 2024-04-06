<?php

include_once('admin_dist/includes/uper-header.php');

include_once('admin_dist/includes/main-header.php');

include_once('admin_dist/includes/top-bar.php');

include_once('admin_dist/includes/left-menu.php');

?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Add New Page</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="<?php echo $url; ?>/admin-manager/index/">Home</a></li>

              <li class="breadcrumb-item active">Add New Page</li>

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

                New Page

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

                            <input type="text" class="form-control chaking-pagename" name="pagename" placeholder="Enter ..." required>

                        </div>

                    </div>

                    <div class="col-md-12">

                        <div class="mb-3">

                            <label>Page Content</label>

                            <textarea class="textarea" name="page-text-content" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                        </div>

                    </div>

                    <div class="col-md-12">

                        <div class="form-group">

                            <label>Custom Page Link</label>

                            <input type="text" class="form-control" name="page-custom-link" placeholder="Enter ...">

                        </div>

                    </div>

                    <div class="col-md-12">

                      <div class="form-group">

                          <label>Breadcrumb Image</label>

                          <div class="row">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-10">
                              <label>Image</label>
                              <input type="file" class="form-control form-group" name="page-new-image">
                              <input type="hidden" value="0" name="page-new-image-chking">
                            </div>
                          </div>
                      </div>
                    </div>

                    <div class="col-md-12">

                      <div class="form-group">

                        <label>Page Active UnActive</label>

                        <select class="custom-select" name="page-status" required>

                          <option value="1">Active</option>

                          <option value="2">UnActive</option>

                        </select>

                      </div>

                    </div>
                    <div class="col-md-12">
                    <?php $pageautoid = "na-vale"; ?>
                    <?php include_once("template/seo-page.php"); ?>
                    </div>

                    <div class="form-group">

                      <input type="submit" value="Add" name="add-new-page" class="btn btn-success float-right">

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



  <!-- Control Sidebar -->

  <aside class="control-sidebar control-sidebar-dark">

    <!-- Control sidebar content goes here -->

  </aside>

  <!-- /.control-sidebar -->

</div>

<!-- ./wrapper -->

 <?php

include_once('admin_dist/includes/footer.php');

?>

