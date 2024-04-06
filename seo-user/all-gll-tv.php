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
if($_GET['action'] == "tv"){
  $pagetyr = "TV";
  $tvname = "Video Thumbnail";
}elseif($_GET['action'] == "news"){
  $pagetyr = "News";
  $tvname = "Thumbnail Image";
}
?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>GLL <?php echo $pagetyr; ?></h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="<?php echo $url; ?>/seo-user/">Home</a></li>

              <li class="breadcrumb-item active">GLL <?php echo $pagetyr; ?></li>

            </ol>

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

              <h3 class="card-title">All GLL <?php echo $pagetyr; ?></h3>

            </div>

            <div class="card-body">

              <table class="table">
                <thead>
                  <tr>
                    <th>Title</th>
                    <th><?php echo $tvname; ?></th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody class="set-protal">
                  <?php
                    $sliderdata = GetTvNewsSection("0",$_GET['action']);
                    foreach($sliderdata as $slidrvalue){
                      if($slidrvalue['tvnews_status'] == "1"){
                  ?>
                    <tr id="<?php echo $slidrvalue['id']; ?>">
                      <td><?php echo $slidrvalue['tvnews_title']; ?></td>
                      <td class="img-set"><img src='<?php echo $url; ?>/images/<?php echo $slidrvalue['tvnews_thunal']; ?>'></td>
                      <td class="text-right py-0 align-middle">
                        <div class="btn-group btn-group-sm">
                          <a href="<?php echo $url; ?>/seo-user/gll-tv/?action=<?php echo $_GET['action']; ?>&edit=<?php echo $slidrvalue['id']; ?>" class="btn btn-info"><i class="fa fa-pencil"></i></a>
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