<?php include_once('dis-setting/connection.php'); ?>
<?php
$product_catid = "117";
$get_catagoyrod = "SELECT * FROM all_product WHERE FIND_IN_SET($product_catid, product_catger_ids) AND product_status='1'";
$query_setpouct = $contdb->query($get_catagoyrod);
while($rowvaleset = $query_setpouct->fetch_array()){
	echo $get_ids = $rowvaleset['id'];
}
?>