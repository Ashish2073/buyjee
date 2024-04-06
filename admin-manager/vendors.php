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
if(isset($_GET['action']) && isset($_GET['id']) && isset($_GET['eandid'])){
  if($_GET['action'] == "delete"){
    $deletablevale = "id='".$_GET['id']."' AND vendor_auto='".$_GET['eandid']."'";
    $deletepermision = "user_p_id='".$_GET['eandid']."' AND user_p_type='vendor'";
    $deleteprodt = "product_vender_id='".$_GET['eandid']."'";
    $delete_vandr = DeleteALlDataVlae('vendor',$deletablevale);
    $delete_permison = DeleteALlDataVlae('userpermission',$deletepermision);
    $delete_product = DeleteALlDataVlae('all_product',$deleteprodt);
    $delete_login = DeleteALlDataVlae('userlogntable',"user_auto='".$_GET['eandid']."'");
    if($delete_login == true){
      if(isset($_GET['request'])){
        echo "<script>alert('Successfully Deleted.');window.location.href='$url/admin-manager/vendors/';window.history.back();</script>";
      }else{
        echo "<script>alert('Successfully Deleted.');window.location.href='$url/admin-manager/vendors/';</script>";
      }
    }else{
      echo "<script>alert('Please Try Again.');</script>"; 
    }
  }else{
    echo "<script>alert('Please Try Again.');window.location.href='$url/admin-manager/vendors/';</script>";
  }
}

if(isset($_GET['block']) && isset($_GET['blockcation'])){
  $actionvlock = $_GET['blockcation'];
  if($actionvlock == "1"){
    $active_vendor = "0";
  }else{
    $active_vendor = "1";
  }
  $vendorid = $_GET['block'];
  $update_permission = UpdateAllDataFileds("userpermission","user_p_block='$active_vendor'","user_p_id='$vendorid'");
  if($update_permission == true){
    echo "<script>alert('Successfully Updated.');window.location.href='$url/admin-manager/vendors/';</script>"; 
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

            <h1>All Vendors</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="<?php echo $url; ?>/admin-manager/index/">Home</a></li>

              <li class="breadcrumb-item active">All Vendors</li>

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

              <h3 class="card-title">All Vendors</h3>
              <a class="float-right btn btn-success" href="<?php echo $url; ?>/admin-manager/export-csv/?pagename=vendor">Export to CSV</a>

            </div>

            <div class="card-body">

              <table id="example1" class="table table-bordered table-striped tableexportcsv">
                <thead>
                  <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Company Name</th>
                    <th>Email Id</th>
                    <th>Phone</th>
                    <th>Date / Time</th>
                    <th>Approved Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach(GetVenderDatavale() as $valuecvnsor){
                    foreach(GetPermissionvalData($valuecvnsor['vendor_auto']) as $vendorpermisn){
                        if($vendorpermisn['user_p_email_ap'] == "1"){
                      if(file_exists($url.'/images/vendor_images/'.$valuecvnsor['vendor_img'])){
                        $flodername = "/images/vendor_images/";
                      }else{
                        $flodername = "/images/";
                      }
                      if($vendorpermisn['user_p_block'] == "1"){
                        echo "<tr class='blockvendor'>";
                        $arrpvdval = "<a href='$url/admin-manager/vendors/?block=".$valuecvnsor['vendor_auto']."&blockcation=1' title='Click to Un Block'><i class='fa fa-eye-slash'></i></a>";
                      }else{
                        echo "<tr class='unblockvendor'>";
                        $arrpvdval = "<a href='$url/admin-manager/vendors/?block=".$valuecvnsor['vendor_auto']."&blockcation=0' title='Click to Block'><i class='fa fa-eye'></i></a>";
                      }
                      /*if($vendorpermisn['user_p_email_ap'] == "1"){
                        $arrpvdval = "<a href='$url/admin-manager/vendors/?block=".$valuecvnsor['vendor_auto']."&blockcation=1'><i class='fa fa-eye-slash'></i></a>";
                      }else{
                        $arrpvdval = "In Approved";
                      }*/
                  ?>
                    <td style="width: 20%;">
                      <?php
                      if($valuecvnsor['vendor_img'] == ""){
                      ?>
                      <img src="<?php echo $url; ?>/customer/images/default-user-icon.jpg" style="width: 30%;"></td>
                    <?php }else{ ?>
                      <img src="<?php echo $url; ?><?php echo $flodername; ?><?php echo $valuecvnsor['vendor_img']; ?>" style="width: 30%;"></td>
                    <?php } ?>
                    <td><?php echo $valuecvnsor['vendor_f_name']; ?> <?php echo $valuecvnsor['vendor_l_name']; ?></td>
                    <td><?php echo $valuecvnsor['vendor_company']; ?></td>
                    <td><?php echo $valuecvnsor['vendor_email']; ?></td>
                    <td><?php echo $valuecvnsor['vendor_phone']; ?></td>
                    <td><?php echo USATimeZoneSettime($valuecvnsor['vendor_date']); ?></br><?php echo $valuecvnsor['vendor_time']; ?></td>
                    <td><?php echo $arrpvdval; ?></td>
                    <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href="<?php echo $url; ?>/admin-manager/vendors-page?action=edit&id=<?php echo $valuecvnsor['vendor_auto']; ?>" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                        <button type="button" class="btn btn-danger deletebtn" data-toggle="modal" data-target="#delete" data-id="<?php echo $url; ?>/admin-manager/vendors/?action=delete&id=<?php echo $valuecvnsor['id']; ?>&eandid=<?php echo $valuecvnsor['vendor_auto']; ?>"><i class="fas fa-trash"></i></button>
                      </div>
                    </td>
                  </tr>
                <?php }}} ?>
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