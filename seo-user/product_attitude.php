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
$explode_vale = explode('/seo-user/product_attitude/?pagetype=edit&', $reqest_vale);
$get_idval = $explode_vale[1];

if(isset($_GET['pagetype'])){
    $get_pagename = $_GET['pagetype'];
    if($get_pagename == "delete"){
        $reqest_vale = $_SERVER['REQUEST_URI'];
        $explode_vale = explode('&', $reqest_vale);
        $get_idval = $explode_vale[1];
        $delctval = attbuteadd($caterinsertnam,$caterinsertslug,$get_pagename,$get_idval);
        if($delctval == true){
            echo "<script>alert('Successfully Delete');window.location.href='$url/seo-user/product_attitude';</script>";
        }else{
            echo "<script>alert('Please Try Again');window.location.href='$url/seo-user/product_attitude';</script>";
        }
    }
}else{
    $get_pagename = "";
}
?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Product Attributes</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="<?php echo $url; ?>/seo-user/">Home</a></li>

              <li class="breadcrumb-item active">Product Attributes</li>

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

              <h3 class="card-title">Product Attributes</h3>

                <a href="<?php echo $url; ?>/seo-user/product_attitude-edit/" class="btn btn-sm btn-success float-right">Add New Attributes</a>

            </div>

            <div class="card-body">

              <table class="table">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Values</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php attbtesameSeo(); ?>
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