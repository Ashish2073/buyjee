<?php

include_once('admin_dist/includes/uper-header.php');

include_once('admin_dist/includes/main-header.php');

include_once('admin_dist/includes/top-bar.php');

include_once('admin_dist/includes/left-menu.php');

?>
<?php
foreach(GLLCoupan_ViewData(0,$_GET['id']) as $coupanvale){

}
?>
  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Edit <?php echo $coupanvale['coup_name']; ?></h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="<?php echo $url; ?>/admin-manager/index/">Home</a></li>

              <li class="breadcrumb-item active">Edit <?php echo $coupanvale['coup_name']; ?></li>

            </ol>

          </div>

        </div>

      </div><!-- /.container-fluid -->

    </section>



    <!-- Main content -->

    <section class="content">

      <div class="row">

        <div class="col-md-12">

          <div class="card card-outline card-info">

            <div class="card-header">

              <h3 class="card-title">

                Edit <?php echo $coupanvale['coup_name']; ?>

              </h3>

            </div>

            <!-- /.card-header -->
          <form role="form" method="post" enctype="multipart/form-data" action="">
            <div class="card-body pad">

                <div class="row mb-3 align-items-right">                                    

                    <div class="col-lg-12 col-md-12 mb-3 one">

                        <div class="text-left">

                            <span>Discount Type</span>

                        </div>

                        <select name="coupantype_edit" class="form-control oneselect">

                            <option value="">Select</option>
                            <?php
                                if($coupanvale['coup_type'] == "1"){
                            ?>
                                <option value="1" selected>Flat</option>
                                <option value="2">Percentage</option>
                            <?php
                                }elseif($coupanvale['coup_vendorid'] == "2"){
                            ?>
                                <option value="1">Flat</option>
                                <option value="2" selected>Percentage</option>
                            <?php
                                }
                            ?>

                        </select>

                    </div>


                    <div class="col-lg-12 col-md-12 mb-3 two">

                        <div class="text-left">

                            <span>Valid For</span>

                        </div>

                        <select name="coupanvenodr_edit" class="form-control twoselect">

                            <option value="">Select</option>
                            <?php
                                if($coupanvale['coup_vendorid'] == "1"){
                            ?>
                                <option value="1" selected>Single Vendor</option>
                                <option value="2">All Products</option>
                            <?php
                            }elseif($coupanvale['coup_vendorid'] == "2"){
                            ?>
                                <option value="1">Single Vendor</option>
                                <option value="2" selected>All Products</option>
                            <?php
                            }
                            ?>
                        </select>

                    </div>
                    <?php
                        if($coupanvale['coup_vendorid'] == "1"){
                    ?>
                        <div class="col-lg-12 col-md-12 mb-3 venor">

                            <div class="text-left">

                                <span>Select Vendors</span>

                            </div>

                            <select name="coupanvendorid" class="form-control venorslect">

                                <option value="">Select</option>
                                <?php echo vendername($coupanvale['coup_product_id']); ?>
                            </select>

                        </div>
                    <?php }else{
                    ?>
                    <input type="hidden" name="coupanvendorid">
                    <?php
                    } ?>
                    <div class="col-lg-12 col-md-12 mb-3 coupname">

                        <div class="text-left">

                            <span>No Of Uses</span>

                        </div>

                        <input type="number" name="coupannoofuse" value="<?php echo $coupanvale['coup_noofuse']; ?>" class="form-control" required>

                    </div>
                    <div class="col-lg-12 col-md-12 mb-3 coupname">

                        <div class="text-left">

                            <span>Coupon Code</span>

                        </div>

                        <input type="text" name="coupanename" value="<?php echo $coupanvale['coup_name']; ?>" class="form-control" required>

                    </div>
                    <div class="col-lg-12 col-md-12 mb-3 sdate">

                        <div class="text-left">

                            <span>Start Date</span>

                        </div>

                        <input type="text" name="coupansdate" id="coupansdate" value="<?php echo $coupanvale['coup_s_date']; ?>" class="form-control sdatecopuan" required>

                    </div>
                    <div class="col-lg-12 col-md-12 mb-3 edate">

                        <div class="text-left">

                            <span>End Date</span>

                        </div>

                        <input type="text" name="coupanedate" value="<?php echo $coupanvale['coup_end_date']; ?>" class="form-control edatecopuan" required>

                    </div>
                    <div class="col-lg-12 col-md-12 mb-3 last">
                        <div class="text-left">

                            <span>Amount</span>

                        </div>
                        <input type="number" name="coupanamout" value="<?php echo $coupanvale['coup_amount']; ?>" id="amountplc" placeholder="" class="form-control" required>

                    </div>

                </div>

                <div class="border-top">

                    <div class="btn-data">

                        <button type="submit" class="btn btn-primary" name="cupan_edital">Submit</button>

                    </div>

                </div>

            </div>

          </form>

          </div>

        </div>

        <!-- /.col-->

      </div>

      <!-- ./row -->

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
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    $(".sdatecopuan").datepicker({
        "setDate": new Date(),
        minDate: 0
    });
    $("#coupansdate").change(function(){
        $(".edatecopuan").datepicker({
            "setDate": new Date(),
            minDate: $(this).val()
        });
    });
</script>