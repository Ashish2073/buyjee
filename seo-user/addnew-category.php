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

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Add New Category</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="<?php echo $url; ?>/seo-user/">Home</a></li>

              <li class="breadcrumb-item active">Add New Category</li>

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

              <h3 class="card-title">Add New Category</h3>

            </div>

            <div class="card-body">

              <div class="form-group view-image">

              </div>
              <form role="form" method="post" enctype="multipart/form-data" action="">
              <?php
              if(isset($_GET['edit'])){
                $slidereditdata = getCatagrioyesDataVal($_GET['edit']);
                foreach($slidereditdata as $slideredit){
                  $singlimgvale = json_decode($slideredit['prd_cat_imagevale']);
              ?>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="input-group">
                      <?php
                        if($singlimgvale[0] == "0" || $singlimgvale[0] == ""){
                      ?>
                        <i class="fa fa-picture-o"></i>
                      <?php }else{
                      ?>
                        <img src='<?php echo $url; ?>/images/<?php echo $singlimgvale[0]; ?>' class="img-responsive">
                      <?php
                      } ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-group">
                    <div class="input-group">
                      <p class="form-group p-tag"><b>Main image</b></p>
                      <div id="singleimagepvone"></div>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="editcatgoy_mainimg" id="multisinlpvone" onchange="return singlfileprivewildone()" >
                        <input type="hidden" name="editcatgoy_mainimgchk" value="<?php echo $singlimgvale[0]; ?>">
                        <label class="custom-file-label" for="multisinlpvone">Choose file</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="input-group">
                      <?php
                        if($singlimgvale[1] == "0" || $singlimgvale[1] == ""){
                      ?>
                        <i class="fa fa-picture-o"></i>
                      <?php }else{
                      ?>
                        <img src='<?php echo $url; ?>/images/<?php echo $singlimgvale[1]; ?>' class="img-responsive">
                      <?php
                      } ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-group">
                    <div class="input-group">
                      <p class="form-group p-tag"><b>Hover image</b></p>
                      <div id="singleimagepvtwo"></div>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="editcatgoy_hoverimg" id="multisinlpvtwo" onchange="return singlfileprivewiltwo()" >
                        <input type="hidden" name="editcatgoy_hoverimgchk" value="<?php echo $singlimgvale[1]; ?>">
                        <label class="custom-file-label" for="multisinlpvtwo">Choose file</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Name</label>
                    <input name="editcatgoy_name" class="form-control" value="<?php echo $slideredit['prd_cat_name']; ?>" type="text">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Parent category</label>
                <select class="form-control" name="editcatgoy_parent">
                  <option value="0">Select one</option>
                  <?php categoryTree($slideredit['prd_cat_prent_categ']); ?>
                </select>
              </div>
              <?php $pageautoid = $slideredit['prd_cat_main_url']; ?>
              <?php include_once("template/seo-page.php"); ?>
              <div class="form-group">
                  <input type="submit" value="Update" name="edit_catgoyvaleseo" class="btn btn-success float-left">
              </div>
              <?php
              }
            }else{
              ?>
              <div class="form-group">
                <div class="input-group">
                  <p class="form-group p-tag"><b>Main image</b></p>
                  <div id="singleimagepvtwo"></div>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="catgoy_mainimg" id="multisinlpvtwo" onchange="return singlfileprivewiltwo()" >
                    <label class="custom-file-label" for="multisinlpvtwo">Choose file</label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <p class="form-group p-tag"><b>Hover image</b></p>
                  <div id="singleimagepvone"></div>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="catgoy_hoverimg" id="multisinlpvone" onchange="return singlfileprivewildone()">
                    <label class="custom-file-label" for="multisinlpvone">Choose file</label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Name</label>
                <input name="catgoy_name" class="form-control" type="text" required>
              </div>
              <div class="form-group">
                <label>Parent category</label>
                <select class="form-control" name="catgoy_parent">
                  <option value="0">Select one</option>
                  <?php categoryTree(); ?>
                </select>
              </div>
              <?php $pageautoid = "na-vale"; ?>
              <?php include_once("template/seo-page.php"); ?>
              <div class="form-group">
                  <input type="submit" value="Add" name="catgoyaddnewseo" class="btn btn-success float-left">
              </div>
            <?php } ?>
            </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

        <!-- left box -->

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