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

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Vendor Products</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="<?php echo $url; ?>/admin-manager/">Home</a></li>

              <li class="breadcrumb-item active">Vendor Products</li>

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

              <h3 class="card-title">Vendor Products</h3>
              <form role="form" method="get" class="float-right">
              <div class="row">
                <div class="col-md-8">
                  <select name="filter" class="form-control">
                    <option value="">Select one</option>
                        <?php
                          foreach(GetVenderDatavale() as $vendername){
                            foreach(GetPermissionvalData($vendername['vendor_auto']) as $vendorpermision){
                              if($vendorpermision['user_p_block'] == "0"){
                                if($product_data['product_vender_id'] == $vendername['vendor_auto']){
                        ?>
                          <option value="<?php echo $vendername['vendor_auto']; ?>" selected><?php echo $vendername['vendor_f_name']; ?> <?php echo $vendername['vendor_l_name']; ?></option>
                        <?php
                          }else{
                        ?>
                          <option value="<?php echo $vendername['vendor_auto']; ?>"><?php echo $vendername['vendor_f_name']; ?> <?php echo $vendername['vendor_l_name']; ?></option>
                        <?php
                          }
                        }}}
                        ?>
                  </select>
                </div>
                <div class="col-md-4">
                  <button type="submit" class="btn btn-primary">Search</button>
                </div>
              </div>
              </form>

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
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    foreach(GetProductDataValTab(0,$_GET['filter']) as $productdetils){
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
                      <td><?php echo $productdetils['product_date']; ?> / <?php echo $productdetils['product_time']; ?></td>
                      <td class="text-right py-0 align-middle">
                        <div class="btn-group btn-group-sm">
                          <a href="<?php echo $url; ?>/admin-manager/product/?pageid=<?php echo $productdetils['id']; ?>&autoid=<?php echo $productdetils['product_auto_id']; ?>"  target="_blank" class="btn btn-info"><i class="fa fa-pencil"></i></a>
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