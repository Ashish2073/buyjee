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
$get_idval = $_GET['attbutid'];
$get_attname = $_GET['attname'];

if(isset($_GET['pagetype'])){
    $get_teramid = $_GET['termid'];
    $get_pagename = $_GET['pagetype'];
    if($get_pagename == "delete"){
        $delctval = attbuteaddteram($caterinsertnam,$caterinsertslug,$get_pagename,$get_idval,$get_teramid);
        if($delctval == true){
            echo "<script>alert('Successfully Deleted');window.location.href='$url/seo-user/product_attid_term/?attname=$get_attname&attbutid=$get_idval';</script>";
        }else{
            echo "<script>alert('Please Try Again');window.location.href='$url/seo-user/product_attid_term/?attname=$get_attname&attbutid=$get_idval';</script>";
        }
    }
}else{
    $get_pagename = "";
    $get_teramid = "";
}

if(isset($_POST['submitcater'])){

    $caterinsertnam = addslashes($_POST['name']);

    $caterinsertslug = addslashes($_POST['slug']);

    $insertdata = attbuteaddteram($caterinsertnam,$caterinsertslug,$get_pagename,$get_idval,$get_teramid);

    if($insertdata == true){

        echo "<script>alert('Successfully.');window.location.href='$url/seo-user/product_attid_term/?attname=$get_attname&attbutid=$get_idval';</script>";

    }else{

        echo "<script>alert('Please Try Again');window.location.href='$url/seo-user/product_attid_term/?attname=$get_attname&attbutid=$get_idval';</script>";

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

            <h1>Attribute Back to <a href="<?php echo $url; ?>/seo-user/product_attitude/"><?php echo $get_attname; ?></a></h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="<?php echo $url; ?>/seo-user/">Home</a></li>

              <li class="breadcrumb-item active">Attribute  <?php echo $get_attname; ?></li>

            </ol>

          </div>

        </div>

      </div><!-- /.container-fluid -->

    </section>



    <!-- Main content -->

    <section class="content">

      <div class="row">

        <div class="col-md-4">

          <div class="card card-primary">

            <div class="card-header">

              <h3 class="card-title">Attribute <?php echo $get_attname; ?></h3>

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
                  $showatdata = "SELECT * FROM product_attbut_value WHERE prod_attname_id='$get_idval' AND id='$get_teramid'";
                  $showquerydata = $contdb->query($showatdata);
                  while($rowgetdata = $showquerydata->fetch_array()){
                      $name_value = $rowgetdata['prod_attname_name'];
                      $slugval = $rowgetdata['prod_attname_slug'];
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

                  <div class="btn-data">

                      <button type="submit" class="btn btn-primary" name="submitcater">Update</button>

                  </div>

              </form>
              <?php } ?>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

        <div class="col-md-8">

          <div class="card card-primary">

            <div class="card-header">

              <h3 class="card-title">Attribute <?php echo $get_attname; ?></h3>

            </div>

            <div class="card-body">

              <table class="table">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php attbtesameteramSeo($get_idval,$get_attname); ?>
                </tbody>
              </table>

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