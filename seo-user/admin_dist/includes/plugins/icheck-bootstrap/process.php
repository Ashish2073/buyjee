<?php
session_start();
/*echo '<pre>';
	print_r($_SESSION);
	echo '</pre>';*/
include 'includes/upper-header.php'; ?>
	<meta name="description" content="">
    <meta name="keywords" content="">
    <title>Payment</title>
<?php include 'includes/main-header.php'; include_once('config_db/conn_connect.php');
$conn = conndata();
date_default_timezone_set('Asia/Kolkata');

if(!isset($_SESSION['customersessionlogin'])){
	echo '<script>';
	echo 'window.location.href="'.$url.'/shop";';
	echo '</script>';
} ?>
<style type="text/css">
	.panel-heading h3 {
    color: #0fa8ae;
    padding: 0px 0px 21px 0px;
    border-bottom: 1px solid #CCC;
    margin-bottom: 20px;
}
.set-authpay span {
    float: right;
}
.panel.panel-default.set-authpay {
    box-shadow: 2px 3px 30px -8px #CCC;
    padding: 25px 40px;
    border: 1px solid #CCC;
}
.set-authpay img {
    width: 100%;
    overflow: hidden;
}
.set-authpay button {
    border: 1px solid #0fa8ae;
    background: #FFF;
    color: #0fa8ae;
    width: 100%;
}
.set-authpay button:hover {
    border: 1px solid #0fa8ae;
    background: #0fa8ae;
    color: #FFF;
}
.Payment-Status {
    background: #f34747;
    padding: 6px 0px;
    margin-top: 1em;
    color: #FFF;
    text-align: center;
}
.no-js #loader { display: none;  }
.js #loader { display: block;}
.loader-box {
    position: fixed;
    top: 0px;
    background: #ffffffd1;
    z-index: 1111;
    left: 0px;
    right: 0px;
    bottom: 0px;
    text-align: center;
    width: 100%;
    margin: auto;
    overflow: hidden;
}
.loader-box img {
    text-align: center;
    width: 18%;
    margin: auto;
    position: relative;
    top: 25%;
}
</style>
<div class="loader-box" id="loader">
	<img src="loader-img.gif">
</div>
		<!-- ========= main banner section ========== -->
		<section>
		    <div class="inner-banner-section primary-color-bg w-100 p-tb-60">
		        <div class="container">
		            <div class="inner-head">
		                <div class="inner-head-txt">
		                    <h1 class="h1-heading">Payment</h1>
		                </div>
		            </div>
		        </div>
		    </div>
		</section>

		<section>
			<div class="main-content w-100 p-tb-60">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 offset-lg-3 col-mg-md-12 col-sm-12">
							<div class="content-section">
								<?php

									//require("currency_converter.php");    // for Test Mode--------uncomment it----------------------     


									 

									/*$paypalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL

									$paypalID = 'bhagabat.sunrisepc@gmail.com';  // Sand box Business Email  



									$cancel_return_url='https://www.defencebyte.com/secure-payment/paypal/cancel.php';

									$success_url='https://www.defencebyte.com/secure-payment/paypal/success.php';

									$notify_url='https://www.defencebyte.com/secure-payment/paypal/ipn.php'; */

									 



									/*$cancel_return_url='https://www.defencebyte.com/secure-payment/paypal/cancel.php';

									$success_url='https://www.defencebyte.com/secure-payment/paypal/success-test.php';

									$notify_url='https://www.defencebyte.com/secure-payment/paypal/ipn-test.php'; 



									*/

									// for  LIVE mode---------------uncomment it-----------------------

									$othernote = $_SESSION['othernotevalue'];
									$grnad_val = number_format($_SESSION['grandTotal'], 2);
									$userid = $_SESSION['customersessionlogin'];

									$get_cartdata = "SELECT * FROM cart_user WHERE cart_user_ip='$ip' AND cart_user_browser='$brower' AND cart_status='0' AND cart_userid='$userid'";
									$querycart = $conn->query($get_cartdata);
									while($rowgetcart = $querycart->fetch_array()){
										$total_quantity = 0;
									    $total_price = 0;

								    	$regularPrice = $rowgetcart["cart_prdo_pricereg"];
								    	$salePrice = $rowgetcart["cart_prdo_pricesale"];
								    	$productname .= $rowgetcart["cart_prdo_name"] .',';
								    	if(empty($salePrice)){
			                    			$finalPrice = $regularPrice;
			                    		}else{
			                    			$finalPrice = $salePrice;
			                    		}

								    	$item_price = $rowgetcart["cart_prdo_qutity"]*$finalPrice;
								    	$total_quantity += $rowgetcart["cart_prdo_qutity"];
										$total_price += $item_price;

									    if(isset($_SESSION['amt_with_tax'])){ 
											$taxAmt = $_SESSION['amt_with_tax'];
											$finalTotal = $total_price + $taxAmt;
									    }

									    $invoice = time();
									}

									$cehckval = "SELECT * FROM customer WHERE customer_ui_id='$userid'";
									$query_val = mysqli_query($conn,$cehckval);
									while($rowval = mysqli_fetch_array($query_val)){
										$fnameget = $rowval['customer_fname'];
										$lnameget = $rowval['customer_lname'];
										$phoneget = $rowval['customer_phone'];
										$address = $rowval['customer_address'];
										$City = $rowval['customer_city'];
										$State = $rowval['customer_state'];
										$Pincode = $rowval['customer_pincode'];

										$getemail = "SELECT * FROM userlogntable WHERE user_auto='$userid'";
										$quewryval = mysqli_query($conn,$getemail);
										while($row = mysqli_fetch_array($quewryval)){
											$email_vis = $row['user_email'];
										}
									}

									$get_cartdatasecond = "SELECT * FROM cart_user WHERE cart_user_ip='$ip' AND cart_user_browser='$brower' AND cart_status='0' AND cart_userid='$userid'";
									$querycartsecond = $conn->query($get_cartdatasecond);
									while($rowgetcartsecond = $querycartsecond->fetch_array()){

										$salePrice = $rowgetcartsecond['cart_prdo_pricesale'];
								        if(empty($salePrice)){
								            $productPrice = $rowgetcartsecond['cart_prdo_pricereg'];
								        }else{
								            $productPrice = $salePrice;
								        }
								        $productQty = $rowgetcartsecond['cart_prdo_qutity'];
								        $productName = $rowgetcartsecond['cart_prdo_name'];
								        $productAutoid = $rowgetcartsecond['cart_prdo_auto_id'];
								        $customerId = $_SESSION['customersessionlogin'];
								        $x_amount = number_format($_SESSION['grandTotal'], 2);
								        $transaction_id=rand(8888888,999999999999);
								        $trackID = 'GLaLa'.time();
								        $dateval = date('m/d/Y');
								        $timeval = date('h:i A');
								        $singl_datetime = $dateval.','.$timeval;
								        $set_trakingid = $transaction_id.$dateval.$timeval;
								        $sert_id = MD5($set_trakingid);
									}
									//die();

									// item_name  item_number  amount  currency_code  quantity3
								    $tax_vale = $taxAmt;
								    $shippinname = $_SESSION['shippingname'];
								    $shippinvale = $_SESSION['shippingvale'];

									$item_name = $productname;

									$item_number = $invoice;

									$amount = str_replace(",","", $grnad_val);

									$currency_code = "USD";

									$quantity = $total_quantity;

									$fname = $fnameget;

									$lname = $lnameget;

									$email = $email_vis;

									$mobile = $phoneget;
									//die();
									if(isset($_SESSION['processPayment'])){
										$payment_vale = $_SESSION['processPayment'];
										if($payment_vale == "1"){
									
									if(filter_var($email,FILTER_VALIDATE_EMAIL)){
									$email = $email;
									}else{ $email='unknown'.rand_string(8).'@xxx.com';}

									if($item_name!="" && $item_number!="" && $amount!="" && $currency_code!="" && $quantity!="" && $fname!="" && $lname!="" &&  $email!="" &&  $mobile!=""){

										 $paypalURL = 'https://www.paypal.com/cgi-bin/webscr';  

										 $paypalID = 'admin@gallerylala.com';  //Your Business Email

										 $date = date('m/d/Y');
										 $time = date('H:i:s');
										 $terid = rand(88888,99999999);

										$get_cartdatathree = "SELECT * FROM cart_user WHERE cart_user_ip='$ip' AND cart_user_browser='$brower' AND cart_status='0' AND cart_userid='$userid'";
										$querycartthree = $conn->query($get_cartdatathree);
										while($valuePDVal = $querycartthree->fetch_array()){
											$uqid = uniqid();
										 	$set_trakingid = $transaction_id.$dateval.$timeval.$uqid;
								       	 	$sert_id = MD5($set_trakingid);
										 	$productId = $valuePDVal['cart_prdo_auto_id'];
										 	
										 	$insert_order = "INSERT INTO customer_order(customer_id,product_auto_id,tnx_id,payment_url_status,p_date,p_time,p_serty_id,p_payment_mod,p_othernote)VALUES('$userid','$productId','$terid','0','$date','$time','$sert_id','$payment_vale','$othernote')";
										 	$datainsertdata = mysqli_query($conn,$insert_order);
										 	$updateshppingvale = "INSERT INTO shipping_table(mul_shipp_custid,mul_shipp_setid)VALUES('$userid','$sert_id')";
										 	$queryshppival = $conn->query($updateshppingvale);
										 	$stvalue[$productAutoid] = array('stid'=>$sert_id);
										}
										$_SESSION['secortycode']=$stvalue;
										$cancel_return_url=$url.'/cancel/';

										$success_url=$url.'/success/';
										      
										$notify_url=$url.'/ipn/';
									?>
									    <div class="row">

									<div class="col-md-12">

									<p class="text-center text-danger">This page is automatically redirected.<br />If it is not redirected automatically. click Buy Button Bellow.</p> 

									<div id="process"></div>

									<br />

									<form action="<?php echo $paypalURL; ?>" method="post" id="PaypalForm"> 

									         <!-- Identify your business so that you can collect the payments. -->

									        <input type="hidden" name="business" value="<?php echo $paypalID; ?>">

									        <!-- <input type="hidden" name="cmd" value="_s-xclick-subscriptions"> -->
									        <input type="hidden" name="cmd" value="_xclick">

											<input type="hidden" name="hosted_button_id" value="NVNWTE6XQ68C2">

									      <input type="hidden" name="item_name" value="<?php echo $item_name; ?>">

									        <input type="hidden" name="item_number" value="<?php echo $item_number; ?>">

									      <input type="hidden" name="currency_code" value="<?php echo $currency_code; ?>">

									        

									        <input type='hidden' name='notify_url' value='<?php echo $notify_url; ?>'>

									        <!-- Specify URLs -->

									       <input type='hidden' name='cancel_return' value='<?php echo $cancel_return_url; ?>'>

									        <input type='hidden' name='return' value='<?php  echo $success_url;  ?>'>


									         <!-- <input type="hidden" name="quantity" value="<?php //echo $quantity; ?>" /> -->

									         <input type="hidden" name="amount" value="<?php echo $grnad_val; ?>">

									    <!-- <input type="hidden" name="a1" value="<?php echo $amount; ?>">

									    <input type="hidden" name="p1" value="11">

									    <input type="hidden" name="t1" value="M">  

									    <input type="hidden" name="a3" value="<?php echo $amount; ?>">

									    <input type="hidden" name="p3" value="11">

									    <input type="hidden" name="t3" value="M"> 

									    <input type="hidden" name="src" value="1"> -->

									    <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />

									       <p style="text-align:center;"> 
									       	<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">

									        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">

									        </p>

									    </form> 

									    </div>

									    </div>

										<br><br>
									<?php 
									}else{
										echo "<script>window.location.href='$url/';</script>";
									}
									}elseif($payment_vale == "2"){
										$success_url=$url.'/success/';   
									?>
										<div class="container">
										    <div class="row">
										        <div class="col-xs-12 col-md-12 col-md-offset-4">
										            <div class="panel panel-default set-authpay">
										            	<form role="form" method="post" enctype="multipart/form-data" action="">
										                <div class="panel-heading">
										                	<div class="row">
											                	<div class="col-md-12">
											                		<img src="assets/images/paypal-img/authori-bank-of-america.png">
											                	</div>
										                	</div>
										                    <h3>Card Details <span>$<?php echo $grnad_val; ?></span></h3>
										                </div>
										                <div class="panel-body">
									                        <div class="row">
									                            <div class="col-xs-12 col-md-12">
									                                <div class="form-group">
									                                    <label>CARD NUMBER</label>
									                                    <div class="input-group">
									                                        <input type="text" class="form-control" placeholder="1234 1234 1234 1234" name="Card_number" required id="cardvale" />
									                                    </div>
									                                </div>
									                            </div>
									                        </div>
									                        <div class="row">
									                            <div class="col-xs-7 col-md-7">
									                                <div class="form-group">
									                                    <label>EXPIRY DATE </label>
									                                    <input type="text" class="form-control" placeholder="MM / YYYY" name="month_year" required/>
									                                </div>
									                            </div>
									                            <div class="col-xs-5 col-md-5 pull-right">
									                                <div class="form-group">
									                                    <label>CVC CODE</label>
									                                    <input type="text" class="form-control" placeholder="CVC" name="cvv" required/>
									                                </div>
									                            </div>
									                        </div>
									                        <div class="row">
									                            <div class="col-xs-12 col-md-12">
									                                <div class="form-group">
									                                    <label>NAME ON CARD</label>
									                                    <input type="text" class="form-control" placeholder="NAME ON CARD" required name="owner_name" />
									                                </div>
									                            </div>
									                        </div>
										                </div>
										                <div class="panel-footer">
										                    <div class="row">
										                        <div class="col-xs-12 col-md-12">
										                            <button type="submit" class="btn btn-warning btn-lg" name="payment">Process Payment</button>
										                        </div>
										                    </div>
										                </div>
										           	</form>
										            </div>
										        </div>
										    </div>
										</div>
										<style>
										    .cc-img {
										        margin: 0 auto;
										    }
										</style>
										<?php
										$authLogin = '7uGP8878dw';// x_login
										$authKey = '5Tg4J88nrG5ND32x';//x_tran_key
										//$Requesturl='https://test.authorize.net/gateway/transact.dll';
										$Requesturl='https://secure.authorize.net/gateway/transact.dll';

										if(isset($_POST['payment'])){
										$x_first_name = $fnameget;
										$x_last_name = $lnameget;
										$x_email = $email_vis;
										$x_invoice_num = $item_number;
										$x_card_num = preg_replace('/\s+/', '', $_POST['Card_number']); 
										$card_exp_month = $_POST['month_year']; 
										$card_exp_year = explode('/', $card_exp_month);
										$x_exp_date = $card_exp_year[1].'-'.$card_exp_year[0]; 
										$x_card_code = $_POST['cvv'];
										$x_phone = $phoneget;
										$x_address = $address;
										$x_city = $City;
										$x_state = $State; //CA
										$x_zip = $Pincode;
										$x_country = $currency_code; //US
										$x_description = "Gallery La La value type";
										$x_amount = $amount;
										$Post_name = $_POST['owner_name'];

										$params = array(
									        "x_invoice_num" => $x_invoice_num,
									        "x_card_code" => $x_card_code,
									        "x_login" => $authLogin,
									        "x_version" => "3.1",  // or whatever version you're using
									        "x_delim_char" => '|',
									        "x_delim_data" => "TRUE",
									        "x_type"  => "AUTH_CAPTURE",
									        "x_method" => "CC",
									        "x_tran_key" => $authKey,
									        "x_relay_response" => "FALSE",
									        "x_card_num" => $x_card_num,
									        "x_exp_date" => $x_exp_date,
									        "x_description" => $x_description,
									        "x_amount" => $x_amount,
									        "x_first_name" => $x_first_name,
									        "x_last_name" => $x_last_name,
									        "x_email" => $x_email,
									        "x_address" => $x_address,
									        "x_city" => $x_city,
									        "x_state" => $x_state,
									        "x_zip" => $x_zip,
									        "x_country" => $x_country,
									    );

									    $fields = http_build_query($params);

									    $curl_request = curl_init($Requesturl); 
									    curl_setopt($curl_request, CURLOPT_HEADER, 0);
									    curl_setopt($curl_request, CURLOPT_RETURNTRANSFER, 1);
									    curl_setopt($curl_request, CURLOPT_POSTFIELDS, $fields);
									    $curl_response = curl_exec($curl_request);
									    curl_close($curl_request);

										$response = explode('|', $curl_response);
										//print_r($response);
										$success = $response[0];
										$error = $response[3];
										$terid = $response[6]; 
										if($success == 1){
											$date = date('m/d/Y');
											 $time = date('H:i:s');
											 //echo "ok";
											 $payment_vale = $_SESSION['processPayment'];
											$get_cartdatafour = "SELECT * FROM cart_user WHERE cart_user_ip='$ip' AND cart_user_browser='$brower' AND cart_status='0' AND cart_userid='$userid'";
											$querycartfour = $conn->query($get_cartdatafour);
											while($DubalIntvalue = $querycartfour->fetch_array()){
												
												$salePrice = $DubalIntvalue['cart_prdo_pricesale'];
										        if(empty($salePrice)){
										            $productPrice = $DubalIntvalue['cart_prdo_pricereg'];
										        }else{
										            $productPrice = $salePrice;
										        }
										        $productQty = $DubalIntvalue['cart_prdo_qutity'];
										        $productName = $DubalIntvalue['cart_prdo_name'];
										        $productAutoid = $DubalIntvalue['cart_prdo_auto_id'];
										        $autostid = $DubalIntvalue['cart_prdo_auto_id'].$DubalIntvalue['cart_prdo_sizename'].$DubalIntvalue['id'];
										        $customerId = $_SESSION['customersessionlogin'];
										        $x_amount = number_format($_SESSION['grandTotal'], 2);
										        $uqid = uniqid();
										 		$set_trakingid = $transaction_id.$dateval.$timeval.$uqid;
								       	 		$sert_id = MD5($set_trakingid);
								       	 		$ttbutname = $DubalIntvalue['cart_prdo_sizevalue'];
								       	 		if($ttbutname == "0" || $ttbutname == ""){
								       	 			$finalsizeabt = "0";
								       	 		}else{
								       	 			$finalsizeabt = $DubalIntvalue['cart_prdo_sizevalue'];
								       	 		}
								       	 		$abutncolor = $DubalIntvalue['cart_prdo_colorvalue'];
								       	 		if($abutncolor == "0" || $abutncolor == ""){
								       	 			$finalclorabt = "0";
								       	 		}else{
								       	 			$finalclorabt = $DubalIntvalue['cart_prdo_colorvalue'];
								       	 		}
								       	 		//die();
											 	$insert_order = "INSERT INTO customer_order(customer_id,product_auto_id,tnx_id,payment_url_status,p_date,p_time,p_serty_id,p_payment_mod,p_Card_number,p_expriy_data,p_cvv,p_card_own,p_othernote,p_filter_value,p_filter_color,p_price)VALUES('$userid','$productAutoid','$terid','0','$date','$time','$sert_id','$payment_vale','$x_card_num','$card_exp_month','$x_card_code','$Post_name','$othernote','$finalsizeabt','$finalclorabt','$productPrice')";
												$datainsertdata = $conn->query($insert_order);
												$updateshppingvale = "INSERT INTO shipping_table(mul_shipp_custid,mul_shipp_setid)VALUES('$userid','$sert_id')";
										 		$queryshppival = $conn->query($updateshppingvale);
												//$stvalue[$autostid] = array('stid'=>$sert_id);
												$stvalue[] = $sert_id;
											}
											//print_r($stvalue);
											//die();
											 if($datainsertdata == true){
											 	$_SESSION['secortycode']=$stvalue;
											 	echo "<script>window.location.href='$success_url';</script>";
											 }
										}else{
											echo "<div class='col-md-12'>
													<div class='Payment-Status'>".$error."</div>
												</div>";
										}
										//error message (if applicable)
										/*echo $autfour = $response[4].'</br>'; //authorization code
										$terid = $response[6].'</br>'; //transaction id*/
										/*if(($response[0]==1)){}*/
										}
										?>
									<?php
										}
									}else{
										echo "<script>window.location.href='$url/';</script>";
									}// session
									?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
 <?php include 'includes/footer.php'; ?>
<script>
	// Wait for window load
	$(window).load(function() {
		// Animate loader off screen
		$("#loader").animate({
			top: -200
		}, 1500);
	});
</script>
 <?php
//die();
 ?>
 <script type="text/javascript">

$(document).ready(function(){

$("#process").html('<center><img src="https://www.defencebyte.com/assets/images/load.gif" width="40" height="40"/></center>');

function SubmitForm(){

document.getElementById("PaypalForm").submit();

}
setTimeout(SubmitForm, 1000);
}); 


function cc_format(value) {
  var v = value.replace(/\s+/g, '').replace(/[^0-9]/gi, '')
  var matches = v.match(/\d{4,16}/g);
  var match = matches && matches[0] || ''
  var parts = []
  for (i=0, len=match.length; i<len; i+=4) {
    parts.push(match.substring(i, i+4))
  }
  if (parts.length) {
    return parts.join(' ')
  } else {
    return value
  }
}

onload = function() {
  document.getElementById('cardvale').oninput = function() {
    this.value = cc_format(this.value)
  }
}

</script>