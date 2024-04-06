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
/*if(isset($_GET['delete']) && isset($_GET['id'])){
    $deletablevale = "id='".$_GET['id']."' AND tvnews_type='".$_GET['action']."'";
    $delete_vale = DeleteALlDataVlae('slideres_table_content',$deletablevale);
    if($delete_vale == true){
      echo "<script>alert('Successfully Delete.');window.location.href='$url/admin-manager/all-slider/';</script>";
	}else{
		echo "<script>alert('Please Try Again.');</script>"; 
    }
}*/

if(isset($_GET['edit'])){
  $slidereditdata = GetTvNewsSection($_GET['edit'],$_GET['action']);
  foreach($slidereditdata as $slideredit){
    $get_tvnews_title = $slideredit['tvnews_title'];
    $get_tvnews_thnal = $slideredit['tvnews_thunal'];
    $get_tvnews_contet = $slideredit['tvnews_contetn'];
    $get_tvnews_video = $slideredit['tvnews_video'];
    $get_tvnews_status = $slideredit['tvnews_status'];
    }
if($_GET['action'] == "news"){
  $pagename = "Edit News";
  $submitbtn = 'Update News';
}elseif($_GET['action'] == "tv"){
  $pagename = "Edit Video";
  $submitbtn = 'Update Video';
}
    
}else{
  if($_GET['action'] == "news"){
    $pagename = "Add New News";
    $submitbtn = 'Add News';
  }elseif($_GET['action'] == "tv"){
    $pagename = "Add New Video";
    $submitbtn = 'Add Video';
  }
}
if($_GET['action'] == "tv"){
  $pagetyr = "TV";
}elseif($_GET['action'] == "news"){
  $pagetyr = "News";
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

              <li class="breadcrumb-item"><a href="<?php echo $url; ?>/admin-manager/index/">Home</a></li>

              <li class="breadcrumb-item active">GLL <?php echo $pagetyr; ?></li>

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
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Title</label>
                    <input name="edit_tvnes_title" class="form-control" value="<?php echo $get_tvnews_title; ?>" type="text">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="input-group">
                      <div id="singleimagepvtwo">
                        <?php if(!empty($get_tvnews_thnal)){ ?>
                        <img src="<?php echo $url; ?>/images/<?php echo $get_tvnews_thnal; ?>" class="img-responsive">
                        <?php }else{ ?>
                          <img src="<?php echo $url; ?>/customer/images/default-user-icon.jpg" class="img-responsive">
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-group">
                    <div class="input-group">
                      <p class="form-group p-tag"><b>Thumbnail</b></p>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="edit_tvnes_img" id="multisinlpvtwo" onchange="return singlfileprivewiltwo()">
                        <input type="hidden" name="edit_tvnes_imgchk" value="<?php echo $get_tvnews_thnal; ?>">
                        <label class="custom-file-label" for="multisinlpvtwo">Choose file</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Description </label>
                <textarea class="textarea" name="edit_tvnes_contet" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $get_tvnews_contet; ?></textarea>
              </div>
              <?php
              if($_GET['action'] == "tv"){
              ?>
                <div class="form-group">
                  <label for="exampleInputPassword1">Video</label>
                  <input name="edit_tvnes_video" class="form-control" value="<?php echo $get_tvnews_video; ?>" type="text">
                </div>
              <?php
              }elseif($_GET['action'] == "news"){
                echo '<input name="edit_tvnes_video" class="form-control" value="'.$get_tvnews_video.'" type="hidden">';
              }
              ?>
              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="edit_tvnes_status">
                  <?php
                  if($get_tvnews_status == "1"){
                    echo '<option value="1" selected>Active</option>
                        <option value="0">Inactive</option>';
                  }elseif($get_tvnews_status == "0"){
                    echo '<option value="1">Active</option>
                        <option value="0" selected>Inactive</option>';
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">

                  <input type="submit" value="<?php echo $submitbtn; ?>" name="edit_tvnes_btn" class="btn btn-success float-left">

              </div>
              <?php
            }else{
              ?>
              <div class="form-group">
                <label for="exampleInputPassword1">Title</label>
                <input name="tvnews_title" class="form-control" type="text">
              </div>
              <div class="form-group">
                <div class="input-group">
                  <p class="form-group p-tag"><b>Thumbnail Image</b></p>
                  <div id="singleimagepvtwo"></div>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="tvnews_thunal" id="multisinlpvtwo" onchange="return singlfileprivewiltwo()" required>
                    <label class="custom-file-label" for="multisinlpvtwo">Choose file</label>
                  </div>
                </div>
              </div>
              <?php
              if($_GET['action'] == "tv"){
              ?>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Video Url</label>
                    <input name="tvnews_video" class="form-control" type="text">
                  </div>
              <?php
              }else{
                echo '<input name="tvnews_video" class="form-control" type="hidden" value="0">';
              }
              ?>
              <div class="form-group">
                <label for="exampleInputPassword1">Description</label>
                <textarea class="textarea" name="tvnews_contetn" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </div>
              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="tvnews_status" required>
                  <option value="1">Active</option>
                  <option value="0">Inactive</option>
                </select>
              </div>
              <div class="form-group">
                  <input type="submit" value="<?php echo $submitbtn; ?>" name="tvnews_btn" class="btn btn-success float-left">
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