<?php

require_once("session.php");

require_once("include/header.php");

require_once("include/left_menu.php");

require_once("functions.php");

$vendor_id = $_SESSION['vendorsessionlogin'];

?>
<input type="button" onclick="tableToExcel('testTable', 'Completed Orders')" value="Export to Excel" id="dataload">
<?php
if(isset($_SESSION['download_data'])){
?>
    <table id='testTable' border='2'>

        <thead>

            <tr>
                <th>Date</th>
                <th>Transaction ID</th>
                <th>Customer's Name</th>
                <th>SKU</th>
                <th>Product Name</th>
                <th>Product Description</th>
                <th>Quantity</th>
                <th>Size</th>
                <th>Color</th>
                <th>Product Price</th>
                <th>Name of Shipping Company</th>
                <th>Tracking ID</th>
                <th>Shipping Tracking Link</th>
                <th>Shipping Fee</th>
                <th>Transaction Fee</th>
                <th>Creator's %</th>
                <th>GLL %</th>
                
            </tr>

        </thead>

        <tbody>

            <?php echo downloadproduct($vendor_id); ?>

        </tbody>

        <tfoot>

            <tr>
                <th>Date</th>
                <th>Transaction ID</th>
                <th>Customer's Name</th>
                <th>SKU</th>
                <th>Product Name</th>
                <th>Product Description</th>
                <th>Quantity</th>
                <th>Size</th>
                <th>Color</th>
                <th>Product Price</th>
                <th>Name of Shipping Company</th>
                <th>Tracking ID</th>
                <th>Shipping Tracking Link</th>
                <th>Shipping Fee</th>
                <th>Transaction Fee</th>
                <th>Creator's %</th>
                <th>GLL %</th>
            </tr>

        </tfoot>

    </table>
<?php
}
require_once("include/footer.php");
?>
<script>
$(document).ready(function() {
   $("#dataload").trigger("click");
   window.location.href = "<?php echo $url; ?>/completed-order";
});
</script>