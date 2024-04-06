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
if(isset($_GET['delete']) && isset($_GET['id'])){
    $deletablevale = "id='".$_GET['id']."'";
    $delete_vale = DeleteALlDataVlae('ads_imagesection',$deletablevale);
    if($delete_vale == true){
      echo "<script>alert('Successfully Deleted.');window.location.href='$url/admin-manager/all-ads/';</script>";
	}else{
		echo "<script>alert('Please Try Again.');</script>"; 
    }
}
if(isset($_GET['edit'])){
  $pagename = "Edit Promo Offers";
}else{
  $pagename = "Add New Promo Offers";
}
?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Promo Offers</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="<?php echo $url; ?>/admin-manager/">Home</a></li>

              <li class="breadcrumb-item active">Promo Offers</li>

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

              <h3 class="card-title"><?php echo $pagename; ?></h3>

            </div>

            <div class="card-body">

              <div class="form-group view-image">

              </div>
              <form role="form" method="post" enctype="multipart/form-data" action="">
              <?php
              if(isset($_GET['edit'])){
                $slidereditdata = GetAdsSectionVal($_GET['edit']);
                foreach($slidereditdata as $slideredit){
              ?>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Title</label>
                    <input name="ads-title-edit" class="form-control" value="<?php echo $slideredit['adsimg_name']; ?>" type="text">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="input-group">
                      <div id="singleimagepvone">
                        <img src="<?php echo $url; ?>/images/<?php echo $slideredit['adsimg_image']; ?>" class="img-responsive">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-group">
                    <div class="input-group">
                      <p class="form-group p-tag"><b>Image</b></p>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="ads-image-edit" id="multisinlpvone" onchange="return singlfileprivewildone()">
                        <input type="hidden" name="ads-image-edit-chkg" value="<?php echo $slideredit['adsimg_image']; ?>">
                        <label class="custom-file-label" for="multisinlpvone">Choose file</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">URL Target</label>
                <input name="slider-url-edit" class="form-control" value="<?php echo $slideredit['adsimg_url']; ?>" type="text">
              </div>
              <div class="form-group">
                <label>URL Action</label>
                <select class="form-control" name="ads-target-edit">
                  <?php
                  if($slideredit['adsimg_urltarget'] == "_blank"){
                    echo '<option value="_blank" selected>New Tab</option>
                        <option value="_self">Same Tab</option>';
                  }elseif($slideredit['adsimg_urltarget'] == "_self"){
                    echo '<option value="_blank">New Tab</option>
                        <option value="_self" selected>Same Tab</option>';
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label>Slider Status</label>
                <select class="form-control" name="ads-status-edit">
                  <?php
                  if($slideredit['adsimg_status'] == "1"){
                    echo '<option value="1" selected>Active</option>
                        <option value="0">Inactive</option>';
                  }elseif($slideredit['adsimg_status'] == "0"){
                    echo '<option value="1">Active</option>
                        <option value="0" selected>Inactive</option>';
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">

                  <input type="submit" value="Update" name="new-ads-edit" class="btn btn-success float-left">

              </div>
              <?php
              }
            }else{
              ?>
              <div class="form-group">
                <label for="exampleInputPassword1">Title</label>
                <input name="ads-title" class="form-control" type="text">
              </div>
              <div class="form-group">

                <div class="input-group">
                  <p class="form-group p-tag"><b>Image</b></p>
                  <div id="singleimagepvone"></div>
                  <div class="custom-file">
                    <!-- <span class="image_prive"></span> -->
                    <!-- <p class="imgselect" data-toggle="modal" data-target="#largeModal">Select Image</p> -->
                    <input type="file" class="custom-file-input" name="ads-deskimage" id="multisinlpvone" onchange="return singlfileprivewildone()" required>
                    <label class="custom-file-label" for="multisinlpvone">Choose file</label>
                  </div>

                </div>

              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">URL</label>
                <input name="ads-url" class="form-control" type="text">
              </div>
              <div class="form-group">
                <label>Target URL</label>
                <select class="form-control" name="ads-target">
                  <option value="_blank">New Page</option>
                  <option value="_self">Same Page</option>
                </select>
              </div>
              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="ads-status" required>
                  <option value="1">Active</option>
                  <option value="0">Inactive</option>
                </select>
              </div>
              <div class="form-group">
                  <input type="submit" value="Add New Ad" name="new-ads" class="btn btn-success float-left">
              </div>
            <?php } ?>
            </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

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