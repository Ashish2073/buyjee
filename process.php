<?php
include 'includes/upper-header.php'; ?>
<?php include 'includes/main-header.php'; ?>
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

.panel.panel-default.set-authpay input{height: 42px; border-radius: 4px; box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;}

.panel.panel-default.set-authpay .chapta_set{padding: 15px;}
.set-authpay img {
    width: 100%;
    overflow: hidden;
}
.set-authpay button {
    border: 1px solid #015a7a;
    background: #015a7a;
    color: #fff;
    width: 100%;
    border-radius: 4px;
    height: 48px;
    line-height: 48px;
    padding: 0px 0px;
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

.chapta_set input#captcha{width: 45%;}

span#relodchapta{margin-right: 0; height: 42px; background: #015a7a; color: #fff; display: inline-block; width: 30px; border-radius: 4px; text-align: center; line-height: 42px;}

@media (max-width:767px) {
.content-section .col-xs-6.col-md-6.col-md-offset-3{width: 100%;}
.panel.panel-default.set-authpay{padding: 25px 0px;}
.numberone input#num1{width: 65%}
.chapta_set input#captcha{width: 40%;}
}


</style>
<?php
// if(isset($_SESSION['processPayment'])){}else{
// 	echo '<script>';
// 	echo 'window.location.href="'.$url.'/";';
// 	echo '</script>';
// }
?>
<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="<?php echo $url; ?>/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Proceed to Gateway
            </div>
        </div>
    </div>
    <div class="page-content pt-80 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="login_wrap widget-taber-content background-white">
                                <?php
									require_once("payment-gateway/gateway-page-code.php");

									/*$paypalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL

									$paypalID = 'bhagabat.sunrisepc@gmail.com';  // Sand box Business Email 

									*/

									// for  LIVE mode---------------uncomment it-----------------------

									$othernote = $_SESSION['othernotevalue'];
									$grnad_val = $_SESSION['grandTotal'];
									$paypalamut = str_replace(",","", $grnad_val);
									$userid = $_SESSION['customersessionlogin'];

									$get_cartdata = "SELECT * FROM cart_user WHERE cart_status='0' AND cart_userid='$userid'";
									$querycart = $contdb->query($get_cartdata);
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

    			                    		$productval = $finalPrice.'00';
								    	$item_price = $rowgetcart["cart_prdo_qutity"]*$finalPrice;
								    	$total_quantity += $rowgetcart["cart_prdo_qutity"];
										$total_price += $item_price;

									    if(isset($_SESSION['amt_with_tax'])){ 
											$taxAmt = $_SESSION['amt_with_tax'];
											$finalTotal = $total_price + $taxAmt;
									    }

									    $invoice = time();
									    $prouct_autoid = $rowgetcart['cart_prdo_auto_id'];
									    $product_data = "SELECT * FROM all_product WHERE product_auto_id='$prouct_autoid'";
									    $query_dtaval = $contdb->query($product_data);
									    while($row_get_produtdat = $query_dtaval->fetch_array()){
									    	$product_img = 'https://buyjee.com/images/'.$row_get_produtdat['product_image'];
									    	$itmurl = 'https://buyjee.com/'.$row_get_produtdat['product_page_name'];
									    	$array_affram[] = array('display_name'=>$row_get_produtdat['product_name'],'sku'=>$row_get_produtdat['product_sku'],'unit_price'=>$productval,'qty'=>$rowgetcart["cart_prdo_qutity"],'item_image_url'=>$product_img,'item_url'=>$itmurl);
									  	}
									}

									$cehckval = "SELECT * FROM customer WHERE customer_ui_id='$userid'";
									$query_val = mysqli_query($contdb,$cehckval);
									while($rowval = mysqli_fetch_array($query_val)){
										$fnameget = $rowval['customer_fname'];
										$lnameget = $rowval['customer_lname'];
										$phoneget = $rowval['customer_phone'];
										$address = $rowval['customer_address'];
										$City = $rowval['customer_city'];
										$State = $rowval['customer_state'];
										$Pincode = $rowval['customer_pincode'];

										$getemail = "SELECT * FROM userlogntable WHERE user_auto='$userid'";
										$quewryval = mysqli_query($contdb,$getemail);
										while($row = mysqli_fetch_array($quewryval)){
											$email_vis = $row['user_email'];
										}
									}
									/*=== Set Curl Code == */
									  /*$requestHeaders = array(
									    'Content-Type: application/json',
									    'Z-Api-Key: 0AEcOic3UfVGb9eZDsRvruNjPI9RspKU9LY9bOE6r5c=',
									  );

									  $baseUrl = 'https://api.cml.ai/v1/integration/sendsurvey';

									  $fields = array(
									    'FirstName' => $fnameget,
									    'LastName' => $lnameget,
									    'EmailID' => $email_vis,
									    'Phone' => $phoneget
									  );

									  $fieldsString = json_encode($fields);

									  $ch  = curl_init();
									  curl_setopt($ch, CURLOPT_URL, $baseUrl);
									  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
									  curl_setopt($ch, CURLOPT_HTTPHEADER, $requestHeaders);
									  curl_setopt($ch, CURLOPT_POST, true);
									  curl_setopt($ch, CURLOPT_POSTFIELDS, $fieldsString);

									  $result = curl_exec($ch);

									  curl_close($ch);*/
									  //print_r($result);
								    /*=== Set Curl Code == */
									$get_cartdatasecond = "SELECT * FROM cart_user WHERE cart_status='0' AND cart_userid='$userid'";
									$querycartsecond = $contdb->query($get_cartdatasecond);
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

									$currency_code = "INR";

									$quantity = $total_quantity;

									$fname = $fnameget;

									$lname = $lnameget;

									$email = $email_vis;

									$mobile = $phoneget;
									//die();
								if(isset($_SESSION['processPayment'])){
							 		$payment_vale = $_SESSION['processPayment'];
									if($payment_vale == "1"){
										//echo "00";
										require_once("payment-gateway/cod_alval.php");
									}elseif($payment_vale == "2"){
										$success_url=$url.'/success/';
										require_once('payment-gateway/razorpay-intregation.php');
									}elseif($payment_vale == "3"){
										$customerId = $_SESSION['customersessionlogin'];
										include_once("payment-gateway/affirm-gateway.php");
										echo "<div class='col-md-12'><a class='btn btn-primary' href='$url/checkout/'>Back to checkout</a></div>";
									}else{
										echo "<script>window.location.href='$url/';</script>";
									}// session
								}
									?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
 <?php include 'includes/footer.php'; ?>
<script>
	/*// Wait for window load
	$(window).load(function() {
		// Animate loader off screen
		$("#loader").animate({
			top: -200
		}, 1500);
	});
	if ( window.history.replaceState ) {
	  window.history.replaceState( null, null, window.location.href );
	}*/
</script>
<?php
if($payment_vale == "3"){
?>
<script type="text/javascript">
  /**************************************************************\
          Step 1: Set up Affirm.js
\**************************************************************/
var _affirm_config = {
  // live mood
  public_api_key: "IXUH742ZGVLBDE5G",
  script: "https://cdn1.affirm.com/js/v2/affirm.js"
  // test mood
  /*public_api_key: "BFT9REDYIUEBFSPX",
  script: "https://cdn1-sandbox.affirm.com/js/v2/affirm.js"*/

};

/**************************************************************\
          Step 2: Initialize Affirm
\**************************************************************/
(function(l,g,m,e,a,f,b){var d,c=l[m]||{},h=document.createElement(f),n=document.getElementsByTagName(f)[0],k=function(a,b,c){return function(){a[b]._.push([c,arguments])}};c[e]=k(c,e,"set");d=c[e];c[a]={};c[a]._=[];d._=[];c[a][b]=k(c,a,b);a=0;for(b="set add save post open empty reset on off trigger ready setProduct".split(" ");a<b.length;a++)d[b[a]]=k(c,e,b[a]);a=0;for(b=["get","token","url","items"];a<b.length;a++)d[b[a]]=function(){};h.async=!0;h.src=g[f];n.parentNode.insertBefore(h,n);delete g[f];d(g);l[m]=c})(window,_affirm_config,"affirm","checkout","ui","script","ready");

/**************************************************************\
          Step 3: Render Affirm Checkout
\**************************************************************/
affirm.checkout({
  merchant: {
        user_confirmation_url:    "<?php echo $success_url; ?>",
        user_cancel_url:          "<?php echo $url; ?>/checkout/",
        user_confirmation_url_action: "POST",
        use_vcn: false,
        name :"Gallery La La"
      },
      shipping:{
        name:{
          first:"<?php echo $fname_to; ?>",
          last:"<?php echo $lname_to; ?>"
        },
        address:{
          line1:"<?php echo $address_to; ?>",
          line2:"<?php echo $address_to; ?>",
          city:"<?php echo $city_to; ?>",
          state:"<?php echo $get_state_code; ?>",
          zipcode:"<?php echo $postalcode_to; ?>",
          country:"<?php echo $country_code_to; ?>"
        },
        phone_number: "<?php echo $get_phonval; ?>",
        email: "<?php echo $get_emailid; ?>"
      },
      billing:{
        name:{
          first:"<?php echo $fname_to; ?>",
          last:"<?php echo $lname_to; ?>"
        },
        address:{
          line1:"<?php echo $address_to; ?>",
          line2:"<?php echo $address_to; ?>",
          city:"<?php echo $city_to; ?>",
          state:"<?php echo $get_state_code; ?>",
          zipcode:"<?php echo $postalcode_to; ?>",
          country:"<?php echo $country_code_to; ?>"
        },
        phone_number: "<?php echo $get_phonval; ?>",
        email: "<?php echo $get_emailid; ?>"
      },
      metadata: {
          mode: "modal"
        },
      items: <?php echo $jsone_data; ?>,
      order_id: "<?php echo $un_ordr_id; ?>",
      currency:"USD",
      shipping_amount:<?php echo $shppingvaledat; ?>,
      tax_amount:<?php echo $taxvaledata; ?>,
      total: <?php echo $round_figer_total; ?>
});

/**************************************************************\
              Step 4: Handle callbacks
\**************************************************************/
affirm.checkout.open();
  affirm.checkout.open({
    onFail: function(e) {
      console.log(e);
      merchant: {
        user_cancel_url: "<?php echo $url; ?>/checkout/"
      }
    },
    onSuccess: function(a) {
      var chkout_iddata =  a.checkout_token;
      var order_id = "<?php echo $un_ordr_id; ?>";
      //alert(chkout_iddata);
      $.ajax({
          url : "<?php echo $url; ?>/action",
          method : "POST",
          data : {affrimcheckoutid:1, chkoutid:chkout_iddata, Orderi_val:order_id},
          success : function(data){
            window.location.href = "<?php echo $success_url; ?>";
          }
      });
    }
  });
  /*affirm.ui.ready(
      function() {
          affirm.ui.error.on("close", function(){
              window.location.href = "<?php //echo $url; ?>/checkout";
          });
      }
      function() {
          affirm.ui.refresh(function(){
              window.location.href = "<?php //echo $url; ?>/checkout";
          });
      }
  );*/
window.onload = affirm;
</script>
<?php } ?>
 <?php
//die();
 ?>
 <script type="text/javascript">
$("#relodchapta").click(function(){
	$("#reload-chaptaval").load(" #reload-chaptaval");
});
</script>