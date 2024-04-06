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
            <h1>Order Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo $url; ?>/admin-manager/index/">Home</a></li>
              <li class="breadcrumb-item active">Order Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<?php
foreach(CustomerOderTable($_GET['vdautoid'],$_GET['shpiauid']) as $valuecvnsor){
foreach(CustomerShppingValue($valuecvnsor['customer_id'],$valuecvnsor['p_serty_id']) as $valedatalogin){
foreach(GetCustomerDataVal($valuecvnsor['customer_id']) as $valcustomer){
foreach(GetProductDataValTab($valuecvnsor['product_auto_id'],"0") as $getproductdaa){
foreach(GetVenderDatavale($getproductdaa['product_vender_id']) as $vendordetials){
foreach(GetLoginUserDetails($valuecvnsor['customer_id']) as $logindetils){
foreach(GetShpiingNameTable($valedatalogin['mul_shipp_trakingname']) as $get_shpingvale){
}}}}}
?>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <small class="float-right">Date: <?php echo USATimeZoneSettime($valuecvnsor['p_date']); ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong><?php echo $vendordetials['vendor_f_name']; ?> <?php echo $vendordetials['vendor_l_name']; ?></strong><br>
                    <?php echo $vendordetials['vendor_st_address']; ?><br>
                    <?php echo $vendordetials['vendor_zipcode']; ?> <?php echo $vendordetials['vendor_country']; ?><br>
                    Phone: <?php echo $vendordetials['vendor_phone']; ?><br>
                    Email: <?php echo $vendordetials['vendor_email']; ?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <?php
                    if($valuecvnsor['p_shipping_address'] == "2"){
                    	echo $valuecvnsor['p_date'];
                    	foreach(GetCustomerToAddress($valuecvnsor['customer_id'],$valuecvnsor['p_date']) as $shppinto){
                    ?>
                    <strong><?php echo $shppinto['cust_to_fname']; ?> <?php echo $shppinto['cust_to_lname']; ?></strong><br>
                    	<?php echo $shppinto['cust_to_address']; ?><br>
                    	<?php echo $shppinto['cust_to_city']; ?>, <?php echo $shppinto['cust_to_state']; ?>, <?php echo $shppinto['cust_to_postalcode']; ?>, <?php echo $shppinto['cust_to_country']; ?> <br>
                    <?php
                    	}
                    }else{
                    ?>
                    <strong><?php echo $valcustomer['customer_fname']; ?> <?php echo $valcustomer['customer_lname']; ?></strong><br>
                    	<?php echo $shppinto['customer_address']; ?><br>
                    	<?php echo $valcustomer['customer_city']; ?>, <?php echo $valcustomer['customer_state']; ?>, <?php echo $valcustomer['customer_pincode']; ?>, <?php echo $valcustomer['customer_country']; ?> <br>
                    <?php
                    }
                    ?>
                    
                    Phone: <?php echo $valcustomer['customer_phone']; ?><br>
                    Email: <?php echo $logindetils['user_email']; ?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Name of Shipping Company:</b> <?php echo $valedatalogin['mul_shipp_trakingname']; ?><br>
                  <b>Tracking ID:</b> <?php echo $valedatalogin['mul_shipp_shipptrakinid']; ?><br>
                  <b><a href="<?php echo $get_shpingvale['shipping_c_tracklink']; ?>" class="btn btn-primary" target="_blank">Tracking</a><br>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Product Name</th>
                      <th>SKU</th>
                      <th>Quantity</th>
                      <th>Product Price</th>
                      <th>Shipping Fee</th>
                      <th>Sale Tax</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td><?php echo $valuecvnsor['p_name']; ?></td>
                      <td><?php echo $getproductdaa['product_sku']; ?></td>
                      <td><?php echo $valuecvnsor['p_qty']; ?></td>
                      <td>₹<?php echo $valuecvnsor['p_price']; ?></td>
                      <td>₹<?php echo $valuecvnsor['p_shpping_amount']; ?></td>
                      <td>₹<?php echo $valedatalogin['mul_shipp_taxamunt']; ?></td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-12">
                  <?php
                  if($valuecvnsor['p_payment_mod'] == "2"){
                    $payment_mood = "Razorpay";
                  }elseif($valuecvnsor['p_payment_mod'] == "1"){
                    $payment_mood = "Cash On Delivery";
                  }elseif($valuecvnsor['p_payment_mod'] == "3"){
                    $payment_mood = "Affirm";
                  }
                  ?>
                  <p class="lead">Payment Methods: <b><?php echo $payment_mood; ?></b></p>
                  <?php
                  if($valuecvnsor['tnx_id'] == "COD"){
                  ?>
                  <form role="form" method="post" enctype="multipart/form-data" action="">
                  <p class="lead mb-0">Transaction ID:</p>
                  <div class="input-group mb-3">
                     <input type="hidden" name="hidecustrid" value="<?php echo $valuecvnsor['id']; ?>">
                    <input type="text" name="updatetrngid" required class="form-control" placeholder="Enter Customer Transaction ID">
                    <span class="input-group-append">
                    <button type="submit" name="updatecodbtn" class="btn btn-info btn-flat">Update</button>
                    </span>
                </div>
                  </form>
                  <p class="lead">Pay Status: <b>Unpaid</b></p>
                  <?php }else{ ?>
                  <p class="lead">Transaction ID: <b><?php echo $valuecvnsor['tnx_id']; ?></b></p>
                  <p class="lead">Pay Status: <b>Paid</b></p>
                  <?php } ?>
                </div>
                <div class="col-12">
                  <p class="lead">Note: <b><?php echo $valuecvnsor['p_othernote']; ?></b></p>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <!-- <div class="row no-print">
                <div class="col-12">
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div> -->
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
	<?php }} ?>
  </div>
 <?php include_once('admin_dist/includes/footer.php'); ?>