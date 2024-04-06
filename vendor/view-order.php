<?php

require_once("session.php");

require_once("include/header.php");

require_once("include/left_menu.php");

require_once("functions.php");

$vendor_id = $_SESSION['vendorsessionlogin'];

?>
<style>
.nicEdit-main {
    height: 350px;
    overflow: auto !important;
}
a.deletvale {
    background: #00bcd4;
    padding: 6px 21px;
    border-radius: 5px;
    color: #FFF;
}
.banner-side.margin-btbanner {
    margin-bottom: 6em;
    overflow: auto;
}
.leftbanner {
    float: right;
    width: 100%;
    margin-left: 1px;
}
.row.mb-3.align-items-center.top-spaceval {
    margin-top: 36px;
    border-top: 22px solid #eee;
    padding-top: 20px;
}
.textareedit .input-group {
    display: block;
}
.input-group label {
    width: 100%;
}
.input-group-addon span {
    padding: 6px 8px 6px 7px;
    display: block;
    font-weight: 700;
    border: 1px solid #CCC;
    background: #f1f1f1;
}
.card {
    border: 1px solid #d8d8d8;
}
.page-wrapper {
    background: #efefef;
}

.vendor-data{ width: 100%; padding: 30px; display: block; background: #fff; margin: 0px 0px 30px 0px; border: 1px solid #d8d8d8; }
.datarow{ width: 100%; display: flex; font-size: 16px; color: #3e5569; margin-bottom: 12px; }
.datarow:last-child{margin-bottom: 0px;}
.datarow .v_name{ width: 100%; display: block; padding:8px 15px; border: 1px solid #d8d8d8; }
.datarow .v_data{width: 100%; display: block; padding:8px 15px; border: 1px solid #d8d8d8;}
.vieworderform{ width: 100%; display: block; padding: 0px 0px; margin: 0px 0px; }
.vieworderform form{ width: 100%;}
#otherbox{
    display: none;
}
</style>
<?php
$get_pagename = $_GET['page'];
$get_stid = $_GET['stid'];
$get_cumorid = $_GET['customeid'];
if(isset($_POST['shippingbtn'])){
    $get_companyanme = addslashes($_POST['instshppinname']);
    $get_teaking_link = $_POST['insttrakinlink'];
    $alreday_shpname = addslashes($_POST['shppingname']);
    $get_traking_number = addslashes($_POST['trackinnumber']);

    $updateshipping = shippingnumupdat($get_companyanme,$get_teaking_link,$alreday_shpname,$get_traking_number,$get_stid,$get_cumorid,$get_pagename,$vendor_id);
    if($get_pagename == "pending-orders"){
        if($updateshipping == true){
            echo "<script>alert('Successfully Updated.');window.location.href='$weburl/vendor/pending-orders';</script>";
        }else{
            echo "<script>alert('This Shipping Company Already in our Database.');</script>";
        }
    }else{
        if($updateshipping == true){
            echo "<script>alert('Successfully Add.');window.location.href='$weburl/vendor/pending-orders';</script>";
        }else{
            echo "<script>alert('This Shipping Company Already in our Database.');</script>";
        }
    }
}
?>

        <!-- ============================================================== -->

        <!-- End Left Sidebar - style you can find in sidebar.scss  -->

        <!-- ============================================================== -->

        <!-- ============================================================== -->

        <!-- Page wrapper  -->

        <!-- ============================================================== -->

        <div class="page-wrapper">

            <!-- ============================================================== -->

            <!-- Bread crumb and right sidebar toggle -->

            <!-- ============================================================== -->

            <div class="page-breadcrumb">

                <div class="row">

                    <div class="col-12 d-flex no-block align-items-center">

                        <h4 class="page-title">View Order</h4>

                        <div class="ml-auto text-right">

                            <nav aria-label="breadcrumb">

                                <ol class="breadcrumb">

                                    <li class="breadcrumb-item"><a href="<?php echo $weburl; ?>/vendor/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">View Order</li>

                                </ol>

                            </nav>

                        </div>

                    </div>

                </div>

            </div>

            <!-- ============================================================== -->

            <!-- End Bread crumb and right sidebar toggle -->

            <!-- ============================================================== -->

            <!-- ============================================================== -->

            <!-- Container fluid  -->

            <!-- ============================================================== -->

            <div class="container-fluid">

                <!-- ============================================================== -->

                <!-- Start Page Content -->

                <!-- ============================================================== -->

                <!-- editor -->

                <div class="row">
                    <div class="vendor-data">
                        <?php
                            $get_pagename = $_GET['page'];
                            $get_pageid = $_GET['pageid'];
                            $get_prdtime = $_GET['pdtime'];
                            $get_cumorid = $_GET['customeid'];
                            vieworders_all($get_pagename,$get_pageid,$get_prdtime,$get_cumorid,$vendor_id);
                        ?>
                    </div>
                </div>
                <div class="row">
                 <div class="vieworderform">
            <form role="form" method="post" enctype="multipart/form-data" action="">
               
                    <div class="row">

                        <div class="col-md-12  align-items-left">

                            <div class="card">

                                <div class="card-body">

                                    <?php
                                    if($get_pagename == "pending-orders"){
                                    ?>

                                        <div class="card-body">

                                            <div class="form-group row">

                                                <h5 class="card-title">Shipping Details</h5>

                                                <div class="col-md-12">

                                                    <select name="shppingname" class="form-control" id="changeselction" required>
                                                        <option value="">Name of Shipping Company</option>
                                                        <?php
                                                        $get_shppingname = "SELECT * FROM shipping_compy WHERE shipping_c_status='1'";
                                                        $query_valedata = $conn->query($get_shppingname);
                                                        while ($rowvalequery = $query_valedata->fetch_array()) {
                                                            $get_shppvalename = $rowvalequery['shipping_c_name'];
                                                            echo "<option value='$get_shppvalename'>$get_shppvalename</option>";
                                                        }
                                                        ?>
                                                        <option value="other">Other</option>
                                                    </select>

                                                </div>

                                            </div>
                                            <div id="otherbox">
                                                <div class="form-group row">

                                                    <h5 class="card-title">Name of Shipping Company</h5>

                                                    <div class="col-md-12">

                                                        <input name="instshppinname" class="form-control" placeholder="Name of Shipping Company">

                                                    </div>

                                                </div>
                                                <div class="form-group row">

                                                    <h5 class="card-title">Shipping Tracking Link</h5>

                                                    <div class="col-md-12">

                                                        <input name="insttrakinlink" class="form-control" placeholder="Shipping Tracking Link">

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="form-group row">

                                                <h5 class="card-title">Tracking ID</h5>

                                                <div class="col-md-12">

                                                    <input name="trackinnumber" class="form-control" placeholder="Tracking ID" required>

                                                </div>

                                            </div>
                                        </div>
                                    <button type="submit" class="btn btn-primary" name="shippingbtn">Add</button>
                                    <?php
                                        }elseif($get_pagename == "completed-orders"){
                                        //$shippingdataval['mul_shipp_trakingname'];
                                            
                                        $get_ordeshipping = "SELECT * FROM shipping_table WHERE mul_shipp_custid='$get_cumorid' AND mul_shipp_setid='$get_stid'";
                                        $query_valedata = $conn->query($get_ordeshipping);
                                        while($rowordershipping = $query_valedata->fetch_array()){
                                            $get_shippingname = $rowordershipping['mul_shipp_trakingname'];
                                            $get_shippingnumber = $rowordershipping['mul_shipp_shipptrakinid'];

                                            $shppinggetlink = "SELECT * FROM shipping_compy WHERE shipping_c_status='1' AND shipping_c_name='$get_shippingname'";
                                            $queryshippinglink = $conn->query($shppinggetlink);
                                            while($rowvaluedata = $queryshippinglink->fetch_array()){
                                                $gtevaluedatvl = $rowvaluedata['shipping_c_tracklink'];
                                            }
                                        }
                                    ?>
                                        <div class="card-body">

                                            <div class="form-group row">

                                                <h5 class="card-title">Shipping Details</h5>

                                                <div class="col-md-12">

                                                    <select name="shppingname" class="form-control" id="changeselction" required>
                                                        <option value="">Name of Shipping Company</option>
                                                        <?php
                                                        $get_shppingname = "SELECT * FROM shipping_compy WHERE shipping_c_status='1'";
                                                        $query_valedata = $conn->query($get_shppingname);
                                                        while ($rowvalequery = $query_valedata->fetch_array()) {
                                                            $get_shppvalename = $rowvalequery['shipping_c_name'];
                                                            $get_shppingval = $rowvalequery['shipping_c_tracklink'];
                                                            if($get_shppvalename == $get_shippingname){
                                                                echo "<option value='$get_shppvalename' selected>$get_shppvalename</option>";
                                                            }else{
                                                                echo "<option value='$get_shppvalename'>$get_shppvalename</option>";
                                                            }
                                                        }
                                                        ?>
                                                        <option value="other">Other</option>
                                                    </select>

                                                </div>

                                            </div>
                                            <div class="form-group row">

                                                <h5 class="card-title">Name of Shipping Company</h5>

                                                <div class="col-md-12">

                                                    <input name="instshppinname" class="form-control" placeholder="Name of Shipping Company" value="<?php echo $get_shippingname; ?>">

                                                </div>

                                            </div>
                                            <div class="form-group row">

                                                <h5 class="card-title">Shipping Tracking Link</h5>

                                                <div class="col-md-12">

                                                    <input name="insttrakinlink" class="form-control" placeholder="Shipping Tracking Link<" value="<?php echo $gtevaluedatvl; ?>">

                                                </div>

                                            </div>
                                            <div class="form-group row">

                                                <h5 class="card-title">Tracking ID</h5>

                                                <div class="col-md-12">

                                                    <input name="trackinnumber" class="form-control" placeholder="Tracking ID" value="<?php echo $get_shippingnumber; ?>" required>

                                                </div>

                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="shippingbtn">Update</button>
                                    <?php
                                    }
                                    ?>
                                </div>

                            </div>

                        </div>

                    </div>
                </form>
                </div>
                </div>

                <!-- editor -->

            </div>

                <!-- ============================================================== -->

                <!-- End PAge Content -->

                <!-- ============================================================== -->

                <!-- ============================================================== -->

                <!-- Right sidebar -->

                <!-- ============================================================== -->

                <!-- .right-sidebar -->

                <!-- ============================================================== -->

                <!-- End Right sidebar -->

                <!-- ============================================================== -->

            </div>

            <!-- ============================================================== -->

            <!-- End Container fluid  -->

            <!-- ============================================================== -->

            <!-- ============================================================== -->

            <!-- footer -->

            <!-- ============================================================== -->

<?php

require_once("include/footer.php");

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
$("#otherbox").hide();
$("#changeselction").change(function(){
    //alert("ok");
    if($("#changeselction").val() == "other") {
        $("#otherbox").show(); 
    } else {
        $("#otherbox").hide(); 
    } 
});
</script>