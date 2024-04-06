<?php

require_once("session.php");

require_once("include/header.php");

require_once("functions.php");

require_once("include/left_menu.php");



if(isset($_POST['termsVendor'])){

	$vendorId = $_SESSION['vendorsessionlogin'];

	$type = 'vendor';

	$termsV = $_POST['texteditor'];

	$submitDate = date('Y-m-d');

	$submitTime = date('H:i:s');



	$insertData = termsInsert($vendorId, $type, $termsV, $submitDate, $submitTime);

	if($insertData == true){

		echo "<script>alert('Successfully added.');window.location.href='https://buyjee.com/vendor/terms-conditions';</script>";

	}else{

		echo "<script>alert('Please Try Again.');window.location.href='https://buyjee.com/vendor/terms-conditions';</script>";

	}

}



if(isset($_POST['updateTerms'])){

    $vendorId = $_SESSION['vendorsessionlogin'];

    $vendor_data = $_POST['texteditor'];



    $updateData = updatetrarm($vendor_data,$vendorId);

    if($updateData == true){

        echo "<script>alert('Successfully added.');window.location.href='https://buyjee.com/vendor/terms-conditions';</script>";

    }else{

        echo "<script>alert('Please Try Again.');window.location.href='https://buyjee.com/vendor/terms-conditions';</script>";

    }

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

                        <h4 class="page-title">Return & Shipping Policy</h4>

                        <div class="ml-auto text-right">

                            <nav aria-label="breadcrumb">

                                <ol class="breadcrumb">

                                    <li class="breadcrumb-item"><a href="<?php echo $url; ?>">Home</a></li>

                                    <li class="breadcrumb-item active" aria-current="page">Return & Shipping Policy</li>

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

                            <div class="comment-widgets scrollable">

                                <form action="" method="post">

                                    <div class="container">

                                        <div class="form-group">

                                                <?php $termsAndCond = viewTerms($_SESSION['vendorsessionlogin']);

                                                    if($termsAndCond[0] == 0) { ?>

                                                        <div class="row mt-3 align-items-center">

                                                            <div class="col-sm-12">

                                                               <div id="sample">

                                                                    <div class="text_width">

                                                                        <textarea name="texteditor" rows="15"></textarea>

                                                                    </div>

                                                                </div>

                                                                <input type="submit" name="termsVendor" class="btn btn-primary mt-3" id="terms_vendor" value="Save">

                                                            </div>

                                                        </div>

                                                    <?php }else{ ?>

                                                        <div class="row mt-3 align-items-center">

                                                            <div class="col-sm-12">

                                                                <div id="sample">

                                                                    <div class="text_width">

                                                                        <textarea name="texteditor" rows="15" style="width: 100%"><?php echo $termsAndCond[1]; ?></textarea>

                                                                    </div>

                                                                </div>

                                                                <input type="submit" name="updateTerms" class="btn btn-primary mt-3" id="terms_vendor" value="Update">

                                                            </div>

                                                        </div>

                                                <?php } ?>

                                        </div>

                                    </div>

                                </form>

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

require_once("texteditor.php");

?>