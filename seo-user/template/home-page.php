<?php
$home_pagedata = GetHomePageDataval(0,$_GET['ut'],$_GET['page-id']);
foreach($home_pagedata as $valuehome){
  $product_cagoy = explode(',', $valuehome['hom_latst_catagoy']);
  $arrayadsval = explode(',', $valuehome['hom_adsdata']);
}
?>
<div class="col-md-3">

    <!-- Profile Image -->
    <div class="card card-primary card-outline">
      <div class="card-body box-profile">

        <h3 class="profile-username text-center">Home Page</h3>

        <a href="<?php echo $url; ?>/" class="btn btn-primary btn-block" target="_blank"><b>View Page</b></a>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
  <div class="col-md-9">
    <div class="card">
      <div class="card-body">
        <div class="tab-content">
          <div class="active tab-pane" id="activity">
              <?php $pageautoid = "home-page"; ?>
              <input type="hidden" name="geturlval" value="<?php echo $pageautoid; ?>">
                <?php include_once("template/seo-page.php"); ?>
              <div class="form-group">
                <input type="submit" value="Update" name="editseopagedata" class="btn btn-success float-right">
              </div>
          </div>
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
      </div><!-- /.card-body -->
    </div>
    <!-- /.nav-tabs-custom -->
  </div>
  <!-- /.col -->