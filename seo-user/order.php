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
.table {
    overflow: auto;
    display: block;
}
</style>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>All Order</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="<?php echo $url; ?>/admin-manager/">Home</a></li>

              <li class="breadcrumb-item active">All Order</li>

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

              <h3 class="card-title">All Order</h3>
              <a class="float-right btn btn-success" href="<?php echo $url; ?>/admin-manager/export-csv/?pagename=order">Export to CSV</a>
            </div>

            <div class="card-body">

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Order Date</th>
                    <th>Customer Name</th>
                    <th>Tracking Number</th>
                    <th>Creator</th>
                    <th>SKU</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Payment Type</th>
                    <th>Customer Type</th>
                    <th>View Details</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if($_GET['action'] == "all"){
                    $actionvale = "1";
                    $all_suctomer = "";
                  }
                  foreach(CustomerOderTable() as $valuecvnsor){
                    if($valuecvnsor['payment_response'] == $actionvale){
                      /*if($valuecvnsor['p_customer_type'] == $all_suctomer){*/
                    foreach(CustomerShppingValue($valuecvnsor['customer_id'],$valuecvnsor['p_serty_id']) as $valedatalogin){
                      foreach(GetCustomerDataVal($valuecvnsor['customer_id']) as $valcustomer){
                        /*echo "<pre>";
                        echo $valuecvnsor['tnx_id'];
                        echo "</pre>";*/
                        foreach(GetProductDataValTab($valuecvnsor['product_auto_id'],"0") as $getproductdaa){
                          foreach(GetVenderDatavale($getproductdaa['product_vender_id']) as $vendordetials){
                          if($valuecvnsor['p_payment_mod'] == "2"){
                            $payment_mood = "Authorize.net";
                          }elseif($valuecvnsor['p_payment_mod'] == "1"){
                            $payment_mood = "PayPal";
                          }elseif($valuecvnsor['p_payment_mod'] == "3"){
                            $payment_mood = "Affirm";
                          }
                    if($valuecvnsor['p_customer_type'] == ""){
                      $typuser = "Regular Customer";
                    }elseif($valuecvnsor['p_customer_type'] == "Guest"){
                      $typuser = "Guest Customer";
                    }
                    if($valedatalogin['mul_shipp_shipptrakinid'] == "0" || $valedatalogin['mul_shipp_shipptrakinid'] == ""){}else{
                  ?>
                    <td><?php echo $valuecvnsor['p_date']; ?></br><?php echo $valuecvnsor['p_time']; ?></td>
                    <td><?php echo $valcustomer['customer_fname']; ?> <?php echo $valcustomer['customer_lname']; ?></td>
                    <td><?php echo $valedatalogin['mul_shipp_shipptrakinid']; ?></td>
                    <td><?php echo $vendordetials['vendor_f_name']; ?> <?php echo $vendordetials['vendor_l_name']; ?></td>
                    <td><?php echo $getproductdaa['product_sku']; ?></td>
                    <td><?php echo $getproductdaa['product_name']; ?></td>
                    <td><?php echo $valuecvnsor['p_price']; ?></td>
                    <td><?php echo $payment_mood; ?></td>
                    <td><?php echo $typuser; ?></td>
                    <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href="<?php echo $url; ?>/admin-manager/order-details/?action=user&id=<?php echo $valuecvnsor['id']; ?>&shpinid=<?php echo $valedatalogin['id']; ?>&vdautoid=<?php echo $valuecvnsor['customer_id']; ?>&shpiauid=<?php echo $valedatalogin['mul_shipp_setid']; ?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
                      </div>
                    </td>
                  </tr>
                <?php }}}}}}} ?>
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