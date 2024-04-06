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
.setimg {
    width: 10%;
}
.quick-edit i {
    background: #17a2b8;
    padding: 8px 10px;
    font-size: 16px;
    color: #FFF;
    border-radius: 4px;
    cursor: pointer;
}
</style>

<?php
if(isset($_GET['action']) && isset($_GET['id']) && isset($_GET['eandid'])){
    $deletablevale = "id='".$_GET['id']."' AND product_auto_id='".$_GET['eandid']."'";
    $delete_vale = DeleteALlDataVlae('all_product',$deletablevale);
    if($delete_vale == true){
      echo "<script>alert('Successfully Deleted.');window.location.href='$url/seo-user/all-product/';</script>";
	}else{
		echo "<script>alert('Please Try Again.');</script>"; 
    }
}

if(isset($_GET['hide']) && isset($_GET['id']) && isset($_GET['eandid']) && isset($_GET['vt'])){
    $deletablevale = "id='".$_GET['id']."' AND product_auto_id='".$_GET['eandid']."'";
    $active_vendor = $_GET['vt'];
    $delete_vale = UpdateAllDataFileds("all_product","product_status='$active_vendor'",$deletablevale);
    if($delete_vale == true){
      echo "<script>alert('Successfully Updated.');window.location.href='$url/seo-user/all-product/';</script>";
  }else{
    echo "<script>alert('Please Try Again.');</script>"; 
  }
}

if(isset($_GET['pageid']) && isset($_GET['duplicate'])){
  $bucateid = uniqid();
  foreach(GetProductDataValTab($_GET['duplicate']) as $valuesetdata){
    $product_name = addslashes($valuesetdata['product_name']).'-'.$bucateid;
    $makeurlpd = makeurl($product_name);

    /*foreach(GetProductSmallImage($_GET['duplicate']) as $valuesetmitlig){
        $rand_id = rand();
        $rowname_protimg = "produt_img,produt_auto_id,produt_id";
        $rowvalues_produt = "'".$valuesetmitlig['produt_img']."','".$rand_id."','".$bucateid."'";
        $insetinto = GllInsertDataAllTable('product_mutli_image',$rowname_protimg,$rowvalues_produt);
    }*/

    $select_active_attbut = "SELECT * FROM product_active_attbut WHERE attbut_productid='".$_GET['duplicate']."'";
    $query_active_attbut = $contdb->query($select_active_attbut);
    if($query_active_attbut->num_rows > 0){
      while($row_active_attbut = $query_active_attbut->fetch_array()){
        $insert_active_attbut = GllInsertDataAllTable('product_active_attbut',"attbut_id,attbut_productid","'".$row_active_attbut['attbut_id']."','".$bucateid."'");
      }
    }

    $select_variationsdata = "SELECT * FROM product_variationsdata WHERE proval_trm_seeionid='".$_GET['duplicate']."'";
    $query_variationsdata = $contdb->query($select_variationsdata);
    if($query_variationsdata->num_rows > 0){
      while($row_variationsdata = $query_variationsdata->fetch_array()){
        $insert_variationsdata = GllInsertDataAllTable('product_variationsdata',"proval_trm_value,proval_trm_attid,proval_trm_seeionid,proval_trm_postion","'".$row_variationsdata['proval_trm_value']."','".$row_variationsdata['proval_trm_attid']."','".$bucateid."','".$row_variationsdata['proval_trm_postion']."'");
      }
    }

    $rowname = "product_vender_id,product_name,product_page_name,product_destion,product_short_des,product_regular_price,product_sale_price,product_catger,product_catger_ids,product_stock,product_sku,product_color,product_date,product_time,product_status,product_discount,product_dis_type,product_approve_stmp,product_shppin_domst,product_shppin_inters,product_recomateprd,product_auto_id";
    $blank = "";
    
    $rowvalues = "'".$valuesetdata['product_vender_id']."','".$blank."','".$blank."','".addslashes($valuesetdata['product_destion'])."','".addslashes($valuesetdata['product_short_des'])."','".$valuesetdata['product_regular_price']."','".$valuesetdata['product_sale_price']."','".addslashes($valuesetdata['product_catger'])."','".$valuesetdata['product_catger_ids']."','".$valuesetdata['product_stock']."','".$blank."','".$valuesetdata['product_color']."','$date','$time','0','".$valuesetdata['product_discount']."','".$valuesetdata['product_dis_type']."','1','".$valuesetdata['product_shppin_domst']."','".$valuesetdata['product_shppin_inters']."','".$valuesetdata['product_recomateprd']."','".$bucateid."'";

      $insert_data = dublicateprodut_value("all_product",$rowname,$rowvalues);
      echo "<script>alert('Successfully Created.');window.location.href='$url/seo-user/product/?pageid=$insert_data&autoid=$bucateid';</script>";
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

            <h1>All Products</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="<?php echo $url; ?>/seo-user/">Home</a></li>

              <li class="breadcrumb-item active">All Products</li>

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

              <h3 class="card-title">All Products</h3>

            </div>

            <div class="card-body">

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>SKU</th>
                    <th>Price</th>
                    <th>Date / Time</th>
                    <th>Quick Edit</th>
                    <th>Duplicate Product</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    foreach(GetProductDataValTab() as $productdetils){
                  ?>
                    <tr>
                      <td class="setimg">
                        <img src="<?php echo $url; ?>/images/<?php echo $productdetils['product_image']; ?>" class="img-fluid">
                      </td>
                      <td><?php echo $productdetils['product_name']; ?></td>
                      <td><?php echo $productdetils['product_sku']; ?></td>
                      <td><?php
                        echo GetProductPriceVal($productdetils['product_auto_id']);
                      ?></td>
                      <td><?php echo USATimeZoneSettime($productdetils['product_date']); ?> / <?php echo $productdetils['product_time']; ?></td>
                      <td><span class="quick-edit" data-id="<?php echo $productdetils['product_auto_id']; ?>/<?php echo $productdetils['id']; ?>" data-toggle="modal" data-target="#quickedit"><i class="fa fa-pencil-square-o"></i></span></td>
                      <td class="text-right py-0 align-middle">
                        <div class="btn-group btn-group-sm">
                          <a href="<?php echo $url; ?>/seo-user/all-product/?pageid=<?php echo $productdetils['id']; ?>&duplicate=<?php echo $productdetils['product_auto_id']; ?>" target="_blank" class="btn btn-info"><i class="fa fa-files-o"></i></a>
                        </div>
                      </td>
                      <td class="text-right py-0 align-middle">
                        <div class="btn-group btn-group-sm">
                          <?php
                            if($productdetils['product_status'] == "1"){
                          ?>
                          <a href="<?php echo $url; ?>/seo-user/all-product/?hide=hide&id=<?php echo $productdetils['id']; ?>&eandid=<?php echo $productdetils['product_auto_id'];?>&vt=0" class="btn btn-info" title="Click and hide"><i class="fa fa-eye"></i></a>
                          <?php
                            }else{
                          ?>
                          <a href="<?php echo $url; ?>/seo-user/all-product/?hide=hide&id=<?php echo $productdetils['id']; ?>&eandid=<?php echo $productdetils['product_auto_id'];?>&vt=1" class="btn btn-danger" title="Click and show"><i class="fa fa-eye-slash"></i></a>
                          <?php
                            }
                          ?>
                        </div>
                      </td>
                      <td class="text-right py-0 align-middle">
                        <div class="btn-group btn-group-sm">
                          <a href="<?php echo $url; ?>/seo-user/product/?pageid=<?php echo $productdetils['id']; ?>&autoid=<?php echo $productdetils['product_auto_id']; ?>"  target="_blank" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                          <button type="button" class="btn btn-danger deletebtn" data-toggle="modal" data-target="#delete" data-id="<?php echo $url; ?>/seo-user/all-product/?action=delete&id=<?php echo $productdetils['id']; ?>&eandid=<?php echo $productdetils['product_auto_id'];?>"><i class="fas fa-trash"></i></button>
                        </div>
                      </td>
                    </tr>
                  <?php } ?>
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
<!-- Modal -->
<div id="quickedit" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xl">

    <!-- Modal content-->
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data" action="">
        <div class="modal-header">
          <h4 class="modal-title">Quick Edit</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
         <div class="row" id="quickval">
         </div>
        </div>
        <div class="modal-footer">
          <div class="updatetbn">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancle</button>
          <button type="submit" name="eidtupdtae" id="eidtupdtae" class="btn btn-primary">Update</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
$(".quick-edit").click(function(){
    var get_quckid = $(this).data('id');
    //alert(get_quckid);
    $.ajax({
        type: "POST",
        url: "<?php echo $url; ?>/seo-user/ajax-data-file.php",
        data : {quickedivl:1, quickid:get_quckid},
        success : function(response){
            $("#quickval").html(response);
        }
    });
});
</script>