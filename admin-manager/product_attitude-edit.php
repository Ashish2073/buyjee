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
$reqest_vale = $_SERVER['REQUEST_URI'];
$explode_vale = explode('/admin-manager/product_attitude-edit/?pagetype=edit&', $reqest_vale);
$get_idval = $explode_vale[1];

if(isset($_GET['pagetype'])){
    $get_pagename = $_GET['pagetype'];
    if($get_pagename == "delete"){
        $reqest_vale = $_SERVER['REQUEST_URI'];
        $explode_vale = explode('&', $reqest_vale);
        $get_idval = $explode_vale[1];
        $delctval = attbuteadd($caterinsertnam,$caterinsertslug,$get_pagename,$get_idval);
        if($delctval == true){
            echo "<script>alert('Successfully Delete');window.location.href='$url/admin-manager/product_attitude-edit';</script>";
        }else{
            echo "<script>alert('Please Try Again');window.location.href='$url/admin-manager/product_attitude-edit';</script>";
        }
    }
}else{
    $get_pagename = "";
}
if(isset($_POST['submitcater'])){

    $caterinsertnam = addslashes($_POST['name']);

    $caterinsertslug = addslashes($_POST['slug']);

    $insertdata = attbuteadd($caterinsertnam,$caterinsertslug,$get_pagename,$get_idval);

    if($insertdata == true){

        echo "<script>alert('Successfully');window.location.href='$url/admin-manager/product_attitude';</script>";

    }else{

        echo "<script>alert('Please Try Again');window.location.href='$url/admin-manager/product_attitude-edit';</script>";

    }

}
?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Attribute</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="<?php echo $url; ?>/admin-manager/index/">Home</a></li>

              <li class="breadcrumb-item active">Attribute</li>

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

              <h3 class="card-title">Attribute</h3>

            </div>

            <div class="card-body">

              <div class="form-group view-image">

              </div>
              <?php
                  $get_id_vale = $_GET['pagetype'];
                  if($get_id_vale == ""){
              ?>
              <form role="form" method="post" enctype="multipart/from-data" action="">

                  <div class="row mb-3 align-items-right">                                    

                      <div class="col-lg-12 col-md-12">

                          <div class="text-left">

                          <span>Name</span>

                      </div>

                          <div class="input-group">

                              <input type="text" class="form-control" placeholder="Name" name="name" required>

                          </div>

                      </div>

                  </div>
                  <input type="hidden" class="form-control" placeholder="Slug" name="slug">
                  <div class="btn-data">

                      <button type="submit" class="btn btn-primary" name="submitcater">Submit</button>

                  </div>
              </form>
              <?php
                }elseif($get_id_vale == "edit"){
                  $showatdata = "SELECT * FROM product_attbut WHERE id='$get_idval'";
                  $showquerydata = $contdb->query($showatdata);
                  while($rowgetdata = $showquerydata->fetch_array()){
                      $name_value = $rowgetdata['pd_attbut_name'];
                      $slugval = $rowgetdata['pd_attbut_slug'];
                  }
              ?>
              <form role="form" method="post" enctype="multipart/from-data" action="">
                  <div class="row mb-3 align-items-right">                                    

                      <div class="col-lg-12 col-md-12">

                          <div class="text-left">

                          <span>Name</span>

                      </div>

                          <div class="input-group">

                              <input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo $name_value; ?>" required>

                          </div>

                      </div>

                  </div>
                  <input type="hidden" class="form-control" placeholder="Slug" name="slug" value="<?php echo $slugval; ?>">

                  <div class="border-top">

                      <div class="btn-data">

                          <button type="submit" class="btn btn-primary" name="submitcater">Update</button>

                      </div>

                  </div>

              </form>
              <?php } ?>
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