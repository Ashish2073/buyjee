<?php

include_once('admin_dist/includes/uper-header.php');

include_once('admin_dist/includes/main-header.php');

include_once('admin_dist/includes/top-bar.php');

include_once('admin_dist/includes/left-menu.php');

?>
<?php
$get_header = GLLFooterGetData();
foreach($get_header as $valeheder){
    $get_sucree_jeson = json_decode($valeheder['footer_secure_cont']);
    $get_express_jeson = json_decode($valeheder['footer_express_cont']);
    $get_save_jeson = json_decode($valeheder['footer_save_cont']);
    $get_best_jeson = json_decode($valeheder['footer_best_cont']);
    $get_mainfooter_jeson = json_decode($valeheder['footer_copyright']);
    $page_ids = $valeheder['id'];
}

$get_headerhome = GLLHederGetsection();
foreach($get_headerhome as $valehederhome){
    $get_clickdata = json_decode($valehederhome['head_socialicon']);
    $get_fb = $get_clickdata[0];
    $get_twitter = $get_clickdata[1];
    $get_linkdin = $get_clickdata[2];
    $get_youtub = $get_clickdata[3];
    $get_instagram = $get_clickdata[4];
    $get_whats = $get_clickdata[5];
    $get_ids = $valehederhome['id'];
}
?>
  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Footer</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="<?php echo $url; ?>/admin-manager/index.php">Home</a></li>

              <li class="breadcrumb-item active">Footer</li>

            </ol>

          </div>

        </div>

      </div><!-- /.container-fluid -->

    </section>



    <!-- Main content -->

    <section class="content">
      <div class="row">
    <div class="col-md-12">
      <div class="card card-primary">

            <div class="card-header">

              <h3 class="card-title">Main Footer</h3>

            </div>

            <div class="card-body">
        <form role="form" method="post" enctype="multipart/form-data" action="">
            <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label>Email Signup Content</label>
                <textarea class="textarea" name="ft-main-emailtitle" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $get_mainfooter_jeson[0]; ?></textarea>
              </div>
              <div class="form-group">
                  <label>Email Signup Footer Content</label>
                <textarea class="textarea" name="ft-main-emailbtn" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $get_mainfooter_jeson[1]; ?></textarea>
              </div>
            </div>
            <input type="hidden" name="page_idsdata" value="<?php echo $page_ids; ?>">
            <input type="hidden" name="box_type" value="mainfooter">
            <div class="col-md-12">
              <div class="form-group">
                  <label>Copyright</label>
                <textarea class="textarea" name="ft-main-copyrihgt" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $get_mainfooter_jeson[2]; ?></textarea>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                  <label>Facebook</label>
                <input type="text" class="form-control" placeholder="facebook Link" name="head-fb" value="<?php echo $get_fb; ?>">
              </div>
            </div>
            <input type="hidden" name="headeridsval" value="<?php echo $get_ids; ?>">
            <div class="col-md-12">
              <div class="form-group">
                  <label>Twitter</label>
                <input type="text" class="form-control" placeholder="Twitter Link" name="head-twiter" value="<?php echo $get_twitter; ?>">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                  <label>Linkedin</label>
                <input type="text" class="form-control" placeholder="linkedin Link" name="head-linkdin" value="<?php echo $get_linkdin; ?>">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                  <label>Youtube</label>
                <input type="text" class="form-control" placeholder="youtube Link" name="head-youtub" value="<?php echo $get_youtub; ?>">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                  <label>Instagram</label>
                <input type="text" class="form-control" placeholder="instagram Link" name="head-instgrm" value="<?php echo $get_instagram; ?>">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                  <label>Whatsapp</label>
                <input type="text" class="form-control" placeholder="whatsapp Number" name="head-whatsap" value="<?php echo $get_whats; ?>">
              </div>
            </div>
              <div class="form-group">

                  <input type="submit" value="Update" class="btn btn-success float-right" name="footer-updatedata">

              </div>

            </div>

            <!-- /.card-body -->

            </form>
          </div>

          <!-- /.card -->
        
      </div>

    </div>

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

