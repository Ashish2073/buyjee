<?php

include_once('admin_dist/includes/uper-header.php');

include_once('admin_dist/includes/main-header.php');

include_once('admin_dist/includes/top-bar.php');

include_once('admin_dist/includes/left-menu.php');

$get_page_details = get_page_names();
?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>All Pages</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="<?php echo $url; ?>/admin-manager/index/">Home</a></li>

              <li class="breadcrumb-item active">All Pages</li>

            </ol>

          </div>

        </div>

      </div><!-- /.container-fluid -->

    </section>



    <!-- Main content -->

    <section class="content">

      <div class="row">
        <!-- right Box -->
        <div class="col-md-12">

          <div class="card card-primary">

            <div class="card-header">

              <h3 class="card-title">All Pages</h3>



              <div class="card-tools">

                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">

                  <i class="fas fa-minus"></i></button>

              </div>

            </div>

            <div class="card-body">

              <table class="table">
                <thead>
                  <tr>
                    <th>Page Id</th>
                    <th>Page Name</th>
                    <th>Page URL</th>
                    <th>Date / Time</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                      foreach($get_page_details as $pagevale){
                        if($pagevale['page_status'] == "1"){
                    ?>
                    <tr>
                      <td><?php echo $pagevale['id']; ?></td>
                      <td><?php echo $pagevale['page_name']; ?></td>
                      <?php
                      if($pagevale['page_slug'] == "home-page"){
                      ?>
                      <td><a href="<?php echo $url; ?>/" target="_blank"><?php echo $url; ?>/</td>
                      <?php }else{ ?>
                      <td><a href="<?php echo $url; ?>/<?php echo $pagevale['page_slug']; ?>" target="_blank"><?php echo $url; ?>/<?php echo $pagevale['page_slug']; ?></td>
                      <?php } ?>
                      <td><?php echo date('m/d/Y', strtotime($pagevale['page_date'])); ?> / <?php echo $pagevale['page_time']; ?></td>
                      <td class="text-right py-0 align-middle">
                        <div class="btn-group btn-group-sm">
                          <a href="<?php echo $url; ?>/seo-user/edit-page/?page-id=<?php echo $pagevale['id']; ?>&ut=<?php echo $pagevale['page_unqi_id']; ?>" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                        </div>
                      </td>
                    </tr>
                    <?php }} ?>
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