<?php
if($item_name!="" && $item_number!="" && $amount!="" && $currency_code!="" && $quantity!="" && $fname!="" && $lname!="" &&  $email!=""){

	$paypalURL = 'https://www.paypal.com/cgi-bin/webscr';  
	$paypalID = 'admin@gallerylala.com';  //Your Business Email

	$date = date('m/d/Y');
	$time = date('H:i:s');
	$terid = rand(88888,99999999);
	$payment_vale = $_SESSION['processPayment'];
	$get_cartdatathree = "SELECT * FROM cart_user WHERE cart_user_ip='$ip' AND cart_status='0' AND cart_userid='$userid'";
	$querycartthree = $contdb->query($get_cartdatathree);
	while($valuePDVal = $querycartthree->fetch_array()){
		$uqid = uniqid();
	 	$set_trakingid = $transaction_id.$dateval.$timeval.$uqid;
   	 	$sert_id = MD5($set_trakingid);
	 	$productId = $valuePDVal['cart_prdo_auto_id'];
	 	$sizevaluedat = $valuePDVal['cart_prdo_sizename'];
	 	$productName = $valuePDVal['cart_prdo_name'];
	 	$salePrice = $valuePDVal['cart_prdo_pricesale'];
	 	$get_domastik = $valuePDVal['cart_prdo_ship_domstik'];
		$get_internsal = $valuePDVal['cart_prdo_ship_inter'];
        if(empty($salePrice)){
            $productPrice = $valuePDVal['cart_prdo_pricereg'];
        }else{
            $productPrice = $salePrice;
        }

        $customerId = $_SESSION['customersessionlogin'];
        $productQty = $valuePDVal['cart_prdo_qutity'];
        if($_SESSION["shppingto"] == "2"){
            $get_customer_cout = "SELECT * FROM shpptoadds WHERE cust_to_id='$customerId'";
            $query_valecust = $contdb->query($get_customer_cout);
            while($rowgetcustomercut = $query_valecust->fetch_array()){
                $get_cyust_country = $rowgetcustomercut['cust_to_country'];
            }
            $shippaddres = "2";
        }else{
            $get_customer_cout = "SELECT * FROM customer WHERE customer_ui_id='$customerId'";
            $query_valecust = $contdb->query($get_customer_cout);
            while($rowgetcustomercut = $query_valecust->fetch_array()){
                $get_cyust_country = $rowgetcustomercut['customer_country'];
                $othernoteval = $rowgetcustomercut['customer_otherNote'];
            }
            $shippaddres = "1";
        }
        $vendor_productval = "SELECT * FROM all_product WHERE product_auto_id='$productId'";
        $query_valprodt = $contdb->query($vendor_productval);
        while($rowget_prodtshpig = $query_valprodt->fetch_array()){
            $get_venodr_id = $rowget_prodtshpig['product_vender_id'];

            $get_product_vendor = "SELECT * FROM vendor WHERE vendor_auto='$get_venodr_id'";
            $query_dataqcon = $contdb->query($get_product_vendor);
            while($get_countryvenodr = $query_dataqcon->fetch_array()){
                $get_venodr_country = $get_countryvenodr['vendor_country'];
                $get_venodrname = $get_countryvenodr['vendor_f_name'].' '.$get_countryvenodr['vendor_l_name'];

       	 		if($get_cyust_country == $get_venodr_country){
	                $shppingtovaladd = $get_domastik;
	            }else{
	                $shppingtovaladd = $get_internsal;
	            }
	 	
		 	$insert_order = "INSERT INTO customer_order(customer_id,product_auto_id,tnx_id,payment_url_status,p_date,p_time,p_serty_id,p_payment_mod,p_othernote,p_filter_value,p_price,p_shpping_amount,p_name,p_qty)VALUES('$userid','$productId','$terid','0','$date','$time','$sert_id','$payment_vale','$othernoteval','$sizevaluedat','$productPrice','$shppingtovaladd','$productName','$productQty')";
		 	$datainsertdata = mysqli_query($contdb,$insert_order);
		 }
		}
	 	$updateshppingvale = "INSERT INTO shipping_table(mul_shipp_custid,mul_shipp_setid)VALUES('$userid','$sert_id')";
	 	$queryshppival = $contdb->query($updateshppingvale);
		$stvalue[] = $sert_id;
	}
	$_SESSION['secortycode']=$stvalue;
	$cancel_return_url=$url.'/cancel/';

	$success_url=$url.'/success/';
	      
	$notify_url=$url.'/ipn/';
?>




<div class="container">
    <div class="row" >

<div class="col-md-12 text-center">
<div class="text-danger">
This page is automatically redirected.<br />If it is not redirected automatically. click Buy Button Bellow. 
</div>

<div id="process"></div>

<br />

	<form action="<?php echo $paypalURL; ?>" method="post" id="PaypalForm"> 

        <input type="hidden" name="business" value="<?php echo $paypalID; ?>">
        <input type="hidden" name="cmd" value="_xclick">
		<input type="hidden" name="hosted_button_id" value="NVNWTE6XQ68C2">
		<input type="hidden" name="item_name" value="<?php echo $item_name; ?>">
        <input type="hidden" name="item_number" value="<?php echo $item_number; ?>">
      	<input type="hidden" name="currency_code" value="<?php echo $currency_code; ?>">
        <input type='hidden' name='notify_url' value='<?php echo $notify_url; ?>'>
       	<input type='hidden' name='cancel_return' value='<?php echo $cancel_return_url; ?>'>
        <input type='hidden' name='return' value='<?php  echo $success_url;  ?>'>
        <input type="hidden" name="quantity" value="<?php echo $quantity; ?>" />
        <input type="hidden" name="amount" value="<?php echo $paypalamut; ?>">
    	<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />

       	<p style="text-align:center;"> 
       		<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
        	<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
        </p>

    </form> 

    </div>

    </div>
    </div>
<?php 
}else{
	echo "<script>alert('Please Fill Your Shipping Details.');window.location.href='$url/checkout';</script>";
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){

$("#process").html('<center><img src="https://www.defencebyte.com/assets/images/load.gif" width="40" height="40"/></center>');

function SubmitForm(){

document.getElementById("PaypalForm").submit();

}
setTimeout(SubmitForm, 1000);
}); 
</script>