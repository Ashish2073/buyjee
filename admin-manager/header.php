<?php

include_once('admin_dist/includes/uper-header.php');

include_once('admin_dist/includes/main-header.php');

include_once('admin_dist/includes/top-bar.php');

include_once('admin_dist/includes/left-menu.php');

?>
<?php
$get_header = GLLHederGetsection();
foreach($get_header as $valeheder){
    $get_logo_one = $valeheder['head_logo'];
    $get_logo_two = $valeheder['head_favicon'];
    $get_topbar = json_decode($valeheder['head_topbarstaus']);
    echo $_search_bar = $get_topbar[0];
    echo $_cart_bar = $get_topbar[1];
    echo $_whiles_bar = $get_topbar[2];
    echo $_myaccout_bar = $get_topbar[3];
    $get_email = $valeheder['head_menu'];
    $get_clickdata = json_decode($valeheder['head_socialicon']);
    $get_fb = $get_clickdata[0];
    $get_twitter = $get_clickdata[1];
    $get_linkdin = $get_clickdata[2];
    $get_youtub = $get_clickdata[3];
    $get_instagram = $get_clickdata[4];
    $get_whats = $get_clickdata[5];
    $get_ids = $valeheder['id'];
}
?>
  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Header</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="<?php echo $url; ?>/admin-manager/index/">Home</a></li>

              <li class="breadcrumb-item active">Header</li>

            </ol>

          </div>

        </div>

      </div><!-- /.container-fluid -->

    </section>



    <!-- Main content -->

    <section class="content">

          <div class="card card-primary">

            <div class="card-header">

              <h3 class="card-title">Header</h3>

            </div>

            <div class="card-body">
        <form role="form" method="post" enctype="multipart/form-data" action="">
            <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                  <div id="singleimagepvone">
                      <img src="<?php echo $url; ?>/images/<?php echo $get_logo_one; ?>" class="img-responsive">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label>Main Logo (Size: 320 x 157 px)</label>
                    <input type="file" class="form-control" name="head-thumimage" id="multisinlpvone" onchange="return singlfileprivewildone()">
                    <input type="hidden" class="form-control" name="head-thumimage-chking" value="<?php echo $get_logo_one; ?>">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                  <div id="singleimagepvtwo">
                    <img src="<?php echo $url; ?>/images/<?php echo $get_logo_two; ?>" class="img-responsive">
                  </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label>Favicon (Size: 160 x 160 px)</label>
                    <input type="file" class="form-control" name="faviconimage" id="multisinlpvtwo" onchange="return singlfileprivewiltwo()">
                    <input type="hidden" class="form-control" name="faviconimage-chking" value="<?php echo $get_logo_two; ?>">
                </div>
            </div>
            <div class="col-md-3 d-none">
              <div class="form-group">
                <label>Search Bar Status</label>
                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                  <?php
                  if($_search_bar == "1"){
                    echo '<input type="checkbox" class="custom-control-input" checked name="searchbarinst" value="1" id="searchbar">';
                  }else{
                    echo '<input type="checkbox" class="custom-control-input" name="searchbarinst" value="1" id="searchbar">';
                  }
                  ?>
                  <label class="custom-control-label" for="searchbar"></label>
                </div>
              </div>
            </div>
            <div class="col-md-3 d-none">
              <div class="form-group">
                <label>Cart Icon Status</label>
                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                  <?php
                  if($_cart_bar == "1"){
                    echo '<input type="checkbox" class="custom-control-input" checked name="cariconinst" value="1" id="caricon">';
                  }else{
                    echo '<input type="checkbox" class="custom-control-input" name="cariconinst" value="1" id="caricon">';
                  }
                  ?>
                  <label class="custom-control-label" for="caricon"></label>
                </div>
              </div>
            </div>
            <input type="hidden" name="pageids" value="<?php echo $get_ids; ?>">
            <div class="col-md-3 d-none">
              <div class="form-group">
                <label>Wishlist Status</label>
                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                  <?php
                  if($_whiles_bar == "1"){
                    echo '<input type="checkbox" class="custom-control-input" checked name="whishlistinst" value="1" id="wishlist">';
                  }else{
                    echo '<input type="checkbox" class="custom-control-input" name="whishlistinst" value="1" id="wishlist">';
                  }
                  ?>

                  <label class="custom-control-label" for="wishlist"></label>
                </div>
              </div>
            </div>
            <div class="col-md-3 d-none">
              <div class="form-group">
                <label>My Account Status</label>
                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                  <?php
                  if($_myaccout_bar == "1"){
                    echo '<input type="checkbox" class="custom-control-input" checked name="myaccountinst" value="1" id="myacttoun">';
                  }else{
                    echo '<input type="checkbox" class="custom-control-input" name="myaccountinst" value="1" id="myacttoun">';
                  }
                  ?>
                  <label class="custom-control-label" for="myacttoun"></label>
                </div>
              </div>
            </div>
              <div class="form-group">

                  <input type="submit" value="Update" class="btn btn-success float-right" name="head-updatedata">

              </div>

            </div>

            <!-- /.card-body -->

            </form>
          </div>

          <!-- /.card -->
        
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

