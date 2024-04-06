<?php

require_once("session.php");

require_once("include/header.php");

require_once("functions.php");

require_once("include/left_menu.php");

$vendor_id = $_SESSION['vendorsessionlogin'];

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

                        <h4 class="page-title">Pending Orders</h4>

                        <div class="ml-auto text-right">

                            <nav aria-label="breadcrumb">

                                <ol class="breadcrumb">

                                    <li class="breadcrumb-item"><a href="<?php echo $url; ?>">Home</a></li>

                                    <li class="breadcrumb-item active" aria-current="page">Pending Orders</li>

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

                                    <!-- <h5 class="card-title">Success Order</h5> -->

                                    <div class="table-responsive">

                                    <table id="zero_config" class="table table-striped table-bordered">

                                        <thead>

                                            <tr>

                                                <th>Customer Name</th>

                                                <th>Product Name</th>

                                                <th>Quantity</th>

                                                <th>Amount</th>

                                                <th>Attributes</th>

                                                <th>Date</th>

                                                <th>Product Details</th>

                                            </tr>

                                        </thead>

                                        <tbody>

                                            <?php echo getorderPendding($vendor_id); ?>

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



