<?php

include_once('admin_dist/includes/uper-header.php');

include_once('admin_dist/includes/main-header.php');

include_once('admin_dist/includes/top-bar.php');

include_once('admin_dist/includes/left-menu.php');

?>
<style>
    img.img-responsive {
    width: 100%;
}
span.staupdf {
    width: 100%;
    text-align: center;
    font-size: 60px;
    margin: auto;
    float: left;
    background: #007bff;
    margin-bottom: 10px;
    color: #FFF;
}
</style>
  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Edit </h1>

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

                Edit 

              </h3>
              <!-- /. tools -->

            </div>

            <!-- /.card-header -->
          <form role="form" method="post" enctype="multipart/form-data" action="">
            <div class="card-body pad">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>CC:</label>

                            <input type="text" class="form-control chaking-pagename" name="email_cc" value="" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>From:</label>

                            <input type="text" class="form-control chaking-pagename" name="email_from" value="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Subject</label>

                            <input type="text" class="form-control chaking-pagename" name="email_subject" value="" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Footer:</label>

                            <input type="text" class="form-control chaking-pagename" name="email_footer" value="">
                        </div>
                    </div>

                    <div class="col-md-12">

                        <div class="mb-3">

                            <label>Top Body</label>

                            <textarea class="form-group form-control" name="email_mainbody" placeholder="Place some text here" ></textarea>

                        </div>

                    </div>

                    <div class="col-md-12">

                        <div class="mb-3">

                            <label>Bottom Body</label>

                            <textarea class="form-group form-control" name="email_mainbodybottom" placeholder="Place some text here" ></textarea>

                        </div>

                    </div>

                    <div class="form-group">

                      <input type="submit" value="Update" name="editemailbody" class="btn btn-success float-right">

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

<?php

include_once('admin_dist/includes/footer.php');

?>