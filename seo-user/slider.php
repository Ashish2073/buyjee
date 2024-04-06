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
    $delete_vale = DeleteALlDataVlae('slideres_table_content',$deletablevale);
    if($delete_vale == true){
      echo "<script>alert('Successfully Deleted.');window.location.href='$url/admin-manager/all-slider/';</script>";
	}else{
		echo "<script>alert('Please Try Again.');</script>"; 
    }
}

if(isset($_GET['edit'])){
  $slidereditdata = GLLGetSliderData($_GET['edit']);
  foreach($slidereditdata as $slideredit){
    $get_slider_dskimage = $slideredit['slid_image'];
    $get_slider_mobimag = $slideredit['slid_mob_img'];
    $get_slider_contetn = $slideredit['slid_upertitle'];
    $get_slider_url = json_decode($slideredit['slid_url']);
    $get_slider_status = $slideredit['slid_status'];
    }
    $pagename = "Edit Slide";
}else{
  $pagename = "Add New Slide";
}
?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Slider</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="<?php echo $url; ?>/admin-manager/">Home</a></li>

              <li class="breadcrumb-item active">Slider</li>

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
              ?>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="input-group">
                      <div id="singleimagepvone">
                        <img src="<?php echo $url; ?>/images/<?php echo $get_slider_dskimage; ?>" class="img-responsive">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-group">
                    <div class="input-group">
                      <p class="form-group p-tag"><b>Desktop Image</b></p>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="slider-edit-image" id="multisinlpvone" onchange="return singlfileprivewildone()">
                        <input type="hidden" name="img-chking-slider" value="<?php echo $get_slider_dskimage; ?>">
                        <label class="custom-file-label" for="multisinlpvone">Choose file</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="input-group">
                      <div id="singleimagepvtwo">
                        <img src="<?php echo $url; ?>/images/<?php echo $get_slider_mobimag; ?>" class="img-responsive">
                      </div> 
                    </div>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-group">
                    <div class="input-group">
                      <p class="form-group p-tag"><b>Mobile Image</b></p>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="slider-edit-imagemob" id="multisinlpvtwo" onchange="return singlfileprivewiltwo()">
                        <input type="hidden" name="img-chking-slidermob" value="<?php echo $get_slider_mobimag; ?>">
                        <input type="hidden" name="slider-edit-id" value="<?php echo $_GET['edit']; ?>">
                        <label class="custom-file-label" for="multisinlpvtwo">Choose file</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Content </label>
                <textarea class="textarea" name="slider-edit-text-content" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $get_slider_contetn; ?></textarea>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">URL Target</label>
                <input name="slider-url-edit" class="form-control" value="<?php echo $get_slider_url[0]; ?>" type="text">
              </div>
              <div class="form-group">
                <label>URL Action</label>
                <select class="form-control" name="slider-edit-target">
                  <?php
                  if($get_slider_url[1] == "_blank"){
                    echo '<option value="_blank" selected>New Tab</option>
                        <option value="_self">Same Tab</option>';
                  }elseif($get_slider_url[1] == "_self"){
                    echo '<option value="_blank">New Tab</option>
                        <option value="_self" selected>Same Tab</option>';
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label>Slider Status</label>
                <select class="form-control" name="slider-edit-status">
                  <?php
                  if($get_slider_status == "1"){
                    echo '<option value="1" selected>Active</option>
                        <option value="0">Inactive</option>';
                  }elseif($get_slider_status == "0"){
                    echo '<option value="1">Active</option>
                        <option value="0" selected>Inactive</option>';
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">

                  <input type="submit" value="Update" name="new-slider-edit" class="btn btn-success float-left">

              </div>
              <?php
            }else{
              ?>
              <div class="form-group">
                <div class="input-group">
                  <p class="form-group p-tag"><b>Desktop Image Dimensions (W-1920 x H-800)px</b></p>
                  <div id="singleimagepvone"></div>
                  <div class="custom-file">
                    <!-- <span class="image_prive"></span> -->
                    <!-- <p class="imgselect" data-toggle="modal" data-target="#largeModal">Select Image</p> -->
                    <input type="file" class="custom-file-input" name="slider-deskimage" id="multisinlpvone" onchange="return singlfileprivewildone()" required>
                    <label class="custom-file-label" for="multisinlpvone">Choose file</label>
                  </div>

                </div>

              </div>

              <div class="form-group">

                <div class="input-group">
                  <p class="form-group p-tag"><b>Mobile Image Dimensions (W-1920 x H-800)px</b></p>
                  <div id="singleimagepvtwo"></div>
                  <div class="custom-file">
                    <!-- <span class="image_prive"></span> -->
                    <!-- <p class="imgselect" data-toggle="modal" data-target="#largeModal">Select Image</p> -->
                    <input type="file" class="custom-file-input" name="slider-mobilimage" id="multisinlpvtwo" onchange="return singlfileprivewiltwo()" required>
                    <label class="custom-file-label" for="multisinlpvtwo">Choose file</label>
                  </div>

                </div>

              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Content</label>
                <textarea class="textarea" name="slider-text-content" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">URL</label>
                <input name="slider-url" class="form-control" type="text">
              </div>
              <div class="form-group">
                <label>Target URL</label>
                <select class="form-control" name="slider-target">
                  <option value="_blank">New Page</option>
                  <option value="_self">Same Page</option>
                </select>
              </div>
              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="slider-status" required>
                  <option value="1">Active</option>
                  <option value="0">Inactive</option>
                </select>
              </div>
              <div class="form-group">
                  <input type="submit" value="Add New Slider" name="new-slider" class="btn btn-success float-left">
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