<?php

require_once("session.php");

require_once("include/header.php");

require_once("include/left_menu.php");

require_once("functions.php");

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

                        <h4 class="page-title"> Sales Report </h4>

                        <div class="ml-auto text-right">

                            <nav aria-label="breadcrumb">

                                <ol class="breadcrumb">

                                    <li class="breadcrumb-item"><a href="<?php echo $url; ?>">Home</a></li>

                                    <li class="breadcrumb-item active" aria-current="page"> Sales Report </li>

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

                                    <h5 class="card-title"> Sales Report </h5>

                                    <div class="table-responsive">

                                    <table id="zero_config" class="table table-striped table-bordered">

                                        <thead>

                                            <tr>

                                                <th>Sale</th>

                                                <th>Total Earning</th>

                                            </tr>

                                        </thead>

                                        <tbody>

                                            <?php echo salereport($vendor_id); ?>

                                        </tbody>

                                        <tfoot>

                                            <tr>

                                                <th>Sale</th>

                                                <th>Total Earning</th>

                                            </tr>

                                        </tfoot>

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



