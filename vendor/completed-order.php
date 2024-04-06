<?php

require_once("session.php");

require_once("include/header.php");

require_once("functions.php");

require_once("include/left_menu.php");

$vendor_id = $_SESSION['vendorsessionlogin'];

?>
<style>
.serachbx lebal {
    float: left;
    margin-left: 3.4em;
    margin-bottom: 0.5em;
    font-weight: 700;
}
.downlod-csv {
    width: 30%;
    float: left;
    overflow: hidden;
    padding: 11px 1px;
}
.downlod-csv input {
    background: #00bcd4;
    border: none;
    color: #FFF;
    padding: 11px 19px;
    cursor: pointer;
}
</style>
<script>
fbq('track', 'Purchase',);
</script>
<?php
if(isset($_POST['downloadata'])){
    $set_rand_vale = rand(88888,99999999);
    $_SESSION['download_data']=$set_rand_vale;
    echo "<script>window.location.href='$url/download-order';</script>";
}
?>

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

                        <h4 class="page-title">Completed Order</h4>

                        <div class="ml-auto text-right">

                            <nav aria-label="breadcrumb">

                                <ol class="breadcrumb">

                                    <li class="breadcrumb-item"><a href="<?php echo $url; ?>">Home</a></li>

                                    <li class="breadcrumb-item active" aria-current="page">Completed Order</li>

                                </ol>

                            </nav>

                        </div>

                    </div>

                </div>

            </div>

            <!-- ============================================================== -->

            <!-- Container fluid  -->

            <!-- ============================================================== -->

            <div class="container-fluid">

                <!-- ============================================================== -->

                <!-- Vendo Terms and conditions -->

                <!-- ============================================================== -->

                <div class="row">

                    <!-- column -->

                    <div class="col-lg-12">

                        <div class="card">

                            <div class="card-body">

                                <div class="form-group row">

                                    <div class="table-responsive">

                                        <div class="table-responsive">
                                        
                                        <div class="fillter_input">
                                            <div class="downlod-csv">
                                                <form role="form" method="post" action="">
                                                    <input type="submit" value="Export to Excel" name="downloadata">
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <table id="zero_config" class="table table-striped table-bordered">

                                        <thead>

                                            <tr>

                                                <th>Customer Name</th>

                                                <th>Product Name</th>

                                                <th>Quantity</th>

                                                <th>Amount</th>

                                                <th>Attributes</th>

                                                <th>Tracking Number</th>

                                                <th>Tracking Link</th>

                                                <th>Date</th>

                                                <th>Product Details</th>

                                            </tr>

                                        </thead>

                                        <tbody>

                                            <?php echo complteorder($vendor_id); ?>

                                        </tbody>

                                    </table>

                                </div>

                                </div>

                            </div>

                        </div>

                        <!-- card new -->

                        

                    </div>

                    <!-- column -->

                </div>

                <!-- ============================================================== -->

                <!-- Recent comment and chats -->

                <!-- ============================================================== -->

            </div>

<?php

require_once("include/footer.php");

?>



