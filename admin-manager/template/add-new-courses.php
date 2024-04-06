<style>
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

            <h1>Add New Courses</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="<?php echo $url; ?>/admin-manager/">Home</a></li>

              <li class="breadcrumb-item active">Add New Courses</li>

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

                Add New Courses

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

                            <input type="text" class="form-control chaking-pagename" name="couresnametitle" id="postnamechking" placeholder="Enter ..." required>
                            <input type="hidden" name="coures-type" value="<?php echo $_GET['pagetype']; ?>">
                            <input type="hidden" name="coures-action" value="<?php echo $_GET['pageaction']; ?>">
                        </div>

                    </div>

                    <div class="col-md-12">

                        <div class="mb-3">

                            <label>Page Content</label>

                            <textarea class="textarea" name="coures-text-content" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                        </div>

                    </div>
                    <div class="col-md-12">

                        <div class="form-group">

                            <label>Thumbnail Image (1900x365)</label>

                            <input type="file" class="form-control" name="coures-thumimage" placeholder="Enter ...">
                            <input type="hidden" class="form-control" name="coures-thumimage-chking" value="0">
                        </div>

                    </div>
                    <div class="col-md-12">

                        <div class="form-group">

                            <label>Courses PDF</label>

                            <input type="file" class="form-control" name="coures-thumpdf" placeholder="Enter ...">
                            <input type="hidden" class="form-control" name="coures-thumpdf-chking" value="0">
                        </div>

                    </div>
                    <div class="col-md-12">

                      <div class="form-group">

                        <label>Page Status</label>

                        <select class="custom-select" name="coures-status" required>

                          <option value="1">Active</option>

                          <option value="2">Inactive</option>

                        </select>

                      </div>

                    </div>

                    <div class="form-group">

                      <input type="submit" value="Add" name="add-new-coures" class="btn btn-success float-right">

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