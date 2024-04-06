<?php include 'sessionset.php'; ?>
<?php include 'format.php'; ?>
<?php
$url_get_val = $_SERVER['REQUEST_URI'];
$explod_get_vale = explode('?', $url_get_val);
$get_id = $explod_get_vale[1];
if($get_id == ""){
	echo "<script>window.location.href='$url/customer/order-lists';</script>";
}else{
	$get_valeId = "SELECT * FROM customer_order WHERE id='$get_id'";
	$query_valeget = $conn->query($get_valeId);
	if($query_valeget->num_rows > 0){
		while($row_fetch_val = $query_valeget->fetch_array()){
			$query_update_vale = "UPDATE customer_order SET payment_response='2',p_refund_cancel='1' WHERE id='$get_id'";
			$query_conSet = $conn->query($query_update_vale);
			if($query_conSet == ture){

				$get_product_name = $row_fetch_val['p_name'];
				$get_product_Price = $row_fetch_val['p_price'];
				$get_product_quty = $row_fetch_val['p_qty'];
				$get_product_tnx_id = $row_fetch_val['tnx_id'];
				$get_product_getsession = $row_fetch_val['p_serty_id'];
				$get_product_date = $row_fetch_val['p_date'];
				$get_product_time = $row_fetch_val['p_time'];
				$get_customer_id = $row_fetch_val['customer_id'];
				$get_product_auto = $row_fetch_val['product_auto_id'];

				$get_vender_email = "SELECT * FROM all_product WHERE product_auto_id='$get_product_auto'";
				$query_getvenemail = $conn->query($get_vender_email);

				while($rowvendfetfch = $query_getvenemail->fetch_array()){
					$get_vend_autoid = $rowvendfetfch['product_vender_id'];

					$seld_finalvdemail = "SELECT * FROM vendor WHERE vendor_auto='$get_vend_autoid'";
					$query_emailfet = $conn->query($seld_finalvdemail);
					while($row_fetchema = $query_emailfet->fetch_array()){
						$get_emailvand = $row_fetchema['vendor_email'];

						$to = $get_emailvand;
				         $subject = "Cancel Oreder #$get_product_tnx_id";
				         
				         $message = "<b><h1>Order has been Cancel by Customer</h1></b>";
				         $message .= "<p>Product Name : $get_product_name</p><br>";
				         $message .= "<p>Price : $ $get_product_Price</p><br>";
				         $message .= "<p>Date/Time : $get_product_date/$get_product_time</p><br>";
				         
				         $header = "From:info@jioitservices.com \r\n";
				         $header .= "Cc:info@jioitservices.com \r\n";
				         $header .= "MIME-Version: 1.0\r\n";
				         $header .= "Content-type: text/html\r\n";
				         
				         mail ($to,$subject,$message,$header);
					}
				}

				$custome_email = "SELECT * FROM userlogntable WHERE user_auto='$get_customer_id'";
				$query_valecust = $conn->query($custome_email);
				while($row_fetchVal = $query_valecust->fetch_array()){
					$email_customr = $row_fetchVal['user_email'];

					$to = $email_customr;
			         $subject = "Cancel Oreder #$get_product_tnx_id";
			         
			         $message = "<b><h1>Order has been Cancel.</h1></b>";
			         $message .= "<p>Product Name : $get_product_name</p><br>";
			         $message .= "<p>Price : $ $get_product_Price</p><br>";
			         $message .= "<p>Date/Time : $get_product_date/$get_product_time</p><br>";
			         
			         $header = "From:info@jioitservices.com \r\n";
			         $header .= "MIME-Version: 1.0\r\n";
			         $header .= "Content-type: text/html\r\n";
			         
			         mail ($to,$subject,$message,$header);

			         echo "<script>alert('Successfully Cancel Order.');window.location.href='$url/customer/order-lists';</script>";
				}
			}else{
				echo "<script>alert('Server Error.');window.location.href='$url/customer/order-lists';</script>";
			}
		}
	}else{
		echo "<script>window.location.href='$url/customer/order-lists';</script>";
	}
}
?>