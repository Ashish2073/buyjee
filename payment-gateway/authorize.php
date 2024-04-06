<?php
$customer_main_id = $customerId;
if($_SESSION['shppingto'] == "2"){
  $get_usertdel = "SELECT * FROM shpptoadds WHERE cust_to_id='$customer_main_id' AND cust_to_status='0' LIMIT 1";
  $queryvale = $contdb->query($get_usertdel);
  if($queryvale->num_rows > 0){
    while($rowgetcode = $queryvale->fetch_array()){
      $address_to = $rowgetcode['cust_to_address'];
      $city_to = $rowgetcode['cust_to_city'];
      $country_to = $rowgetcode['cust_to_country'];
      $country_code_to = "US";
      $state_to = $rowgetcode['cust_to_state'];
      $statecode_to = $rowgetcode['cust_to_statecode'];
      $postalcode_to = $rowgetcode['cust_to_postalcode'];
      $fname_to = $rowgetcode['cust_to_fname'];
      $lname_to = $rowgetcode['cust_to_lname'];
      $get_phonval = $rowgetcode['cust_to_phone'];
      $get_emailid = $rowgetcode['cust_to_emaild'];
    }
  }
}elseif($_SESSION['shppingto'] == "1"){
	$get_usertdel = "SELECT * FROM customer WHERE customer_ui_id='$customer_main_id' AND customer_active='1' LIMIT 1";
  $queryvale = mysqli_query($contdb,$get_usertdel);
  if(mysqli_num_rows($queryvale)){
    while($rowgetcode = mysqli_fetch_array($queryvale)){
        
      $address_to = $rowgetcode['customer_address'];
      $city_to = $rowgetcode['customer_city'];
      $country_to = $rowgetcode['customer_country'];
      $country_code_to = "US";
      $state_to = $rowgetcode['customer_state'];
      $statecode_to = $rowgetcode['customer_state_code'];
      $postalcode_to = $rowgetcode['customer_pincode'];
      $fname_to = $rowgetcode['customer_fname'];
      $lname_to = $rowgetcode['customer_lname'];
      $get_phonval = $rowgetcode['customer_phone'];
      $othernoteval = $rowgetcode['customer_otherNote'];

      $get_couteremail = "SELECT * FROM userlogntable WHERE user_auto='$customer_main_id'";
      $query_valer = $contdb->query($get_couteremail);
      while($row_eailid = $query_valer->fetch_array()){
        $get_emailid = $row_eailid['user_email'];
      }
    }
  }
}else{
	$get_usertdel = "SELECT * FROM customer WHERE customer_ui_id='$customer_main_id' AND customer_active='1' LIMIT 1";
  $queryvale = mysqli_query($contdb,$get_usertdel);
  if(mysqli_num_rows($queryvale)){
    while($rowgetcode = mysqli_fetch_array($queryvale)){
        
      $address_to = $rowgetcode['customer_address'];
      $city_to = $rowgetcode['customer_city'];
      $country_to = $rowgetcode['customer_country'];
      $country_code_to = "US";
      $state_to = $rowgetcode['customer_state'];
      $statecode_to = $rowgetcode['customer_state_code'];
      $postalcode_to = $rowgetcode['customer_pincode'];
      $fname_to = $rowgetcode['customer_fname'];
      $lname_to = $rowgetcode['customer_lname'];
      $get_phonval = $rowgetcode['customer_phone'];

      $get_couteremail = "SELECT * FROM userlogntable WHERE user_auto='$customer_main_id'";
      $query_valer = $contdb->query($get_couteremail);
      while($row_eailid = $query_valer->fetch_array()){
        $get_emailid = $row_eailid['user_email'];
      }
    }
  }
}
$get_countaleu = "SELECT * FROM countries_db WHERE name='$country_to'";
$query_count = $contdb->query($get_countaleu);
while($row_setvale = $query_count->fetch_array()){
  $get_countid = $row_setvale['id'];
}
$customer_get_country = "SELECT * FROM states WHERE country_id='$get_countid' AND name='$state_to' LIMIT 1";
$query_get_stateval = $contdb->query($customer_get_country);
while($row_get_county = $query_get_stateval->fetch_array()){
  $get_state_code = $row_get_county['iso2'];
}

	$authLogin = '7uGP8878dw';// x_login
	$authKey = '5Tg4J88nrG5ND32x';//x_tran_key
	$Requesturl='https://secure.authorize.net/gateway/transact.dll';
	if(isset($_POST['payment'])){
		$_chptavale = $_POST['captcha'];
		$_chptavale_num1 = $_POST['num1'];
		$_chptavale_num2 = $_POST['num2'];
		$add_chaptavel = $_chptavale_num1+$_chptavale_num2;
		if($_chptavale == $add_chaptavel){
		$x_first_name = $fname_to;
		$x_last_name = $lname_to;
		$x_email = $get_emailid;
		$x_invoice_num = $item_number;
		$x_card_num = preg_replace('/\s+/', '', $_POST['Card_number']); 
		/*$card_exp_month = $_POST['month_year']; 
		$card_exp_year = explode('/', $card_exp_month);*/
		$x_exp_date = $_POST['month_year'].'-'.$_POST['yearname']; 
		$x_card_code = $_POST['cvv'];
		$x_phone = $get_phonval;
		$x_address = $address_to;
		$x_city = $city_to;
		$x_state = $get_state_code; //CA
		$x_zip = $postalcode_to;
		$x_country = $country_code_to; //US
		$x_description = "Gallery La La value type";
		$x_amount = $amount;
		$Post_name = $_POST['owner_name'];

		if(($x_first_name != "") && ($x_email != "") && ($x_invoice_num != "") && ($x_card_num != "") && ($x_exp_date != "") && ($x_card_code != "") && ($x_address != "") && ($x_zip != "") && ($x_amount != "") && ($Post_name != "")){

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
		        "x_customer_ip" => $ip,
		    );

			$fields = http_build_query($params);

		    $curl_request = curl_init($Requesturl); 
		    curl_setopt($curl_request, CURLOPT_HEADER, 0);
		    curl_setopt($curl_request, CURLOPT_RETURNTRANSFER, 1);
		    curl_setopt($curl_request, CURLOPT_POSTFIELDS, $fields);
		    $curl_response = curl_exec($curl_request);
		    curl_close($curl_request);

			$response = explode('|', $curl_response);
			$success = $response[0];
			$error = $response[3];
			$terid = $response[6];
			//die();
			if($success == 4 || $success == 1){

			$date = date('m/d/Y');
			$time = date('H:i:s');
			 //echo "ok";
			$payment_vale = $_SESSION['processPayment'];

			$noteevalue = "SELECT * FROM customer WHERE customer_ui_id='$userid' LIMIT 1";
  			$queryvalenoe = mysqli_query($contdb,$noteevalue);
  			while($rowvaledat = mysqli_fetch_array($queryvalenoe)){
  				$othernoteval = $rowvaledat['customer_otherNote'];
  			}
			$get_cartdatafour = "SELECT * FROM cart_user WHERE cart_status='0' AND cart_userid='$userid'";
			$querycartfour = $contdb->query($get_cartdatafour);
			while($DubalIntvalue = $querycartfour->fetch_array()){
				
				$salePrice = $DubalIntvalue['cart_prdo_pricesale'];
		        if(empty($salePrice)){
		            $productPrice = $DubalIntvalue['cart_prdo_pricereg'];
		        }else{
		            $productPrice = $salePrice;
		        }
		        $productQty = $DubalIntvalue['cart_prdo_qutity'];
		        $get_domastik = $DubalIntvalue['cart_prdo_ship_domstik'];
				$get_internsal = $DubalIntvalue['cart_prdo_ship_inter'];
		        $productName = $DubalIntvalue['cart_prdo_name'];
		        $productAutoid = $DubalIntvalue['cart_prdo_auto_id'];
		        $autostid = $DubalIntvalue['cart_prdo_auto_id'].$DubalIntvalue['cart_prdo_sizename'].$DubalIntvalue['id'];
		        $customerId = $_SESSION['customersessionlogin'];
		        $x_amount = number_format($_SESSION['grandTotal'], 2);
		        $uqid = uniqid();
		 		$set_trakingid = $transaction_id.$dateval.$timeval.$uqid;
	   	 		$sert_id = MD5($set_trakingid);

	   	 		foreach(explode(',', $DubalIntvalue['cart_prdo_sizename']) as $value) {

	                $get_vertonname = "SELECT * FROM product_variationsdata WHERE id='$value'";
	                $queryverinname = $contdb->query($get_vertonname);
	                while($rowqueryval = $queryverinname->fetch_array()){
	                    $getvalename = $rowqueryval['proval_trm_value'];
	                    $gettremvale = $rowqueryval['proval_trm_attid'];

	                    $get_tremname = "SELECT * FROM product_attbut WHERE id='$gettremvale'";
	                    $querytremval = $contdb->query($get_tremname);
	                    while($rowtremvaldat = $querytremval->fetch_array()){
	                        "<p><b>".$rowtremvaldat['pd_attbut_name']."</b>&nbsp;:&nbsp;".$getvalename."</p>";
	                        $finalsizeabt = $rowtremvaldat['pd_attbut_name'].'-'.$getvalename;
	                    }
	                }
	            }

	            //$finalsizeabt;

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
	   	 		$sizevaluedat = $DubalIntvalue['cart_prdo_sizename'];
	   	 		//die();

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
	                }
	                $shippaddres = "1";
	            }
	            $vendor_productval = "SELECT * FROM all_product WHERE product_auto_id='$productAutoid'";
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

				 	$insert_order = "INSERT INTO customer_order(customer_id,product_auto_id,tnx_id,payment_url_status,p_date,p_time,p_serty_id,p_payment_mod,p_Card_number,p_expriy_data,p_cvv,p_card_own,p_othernote,p_filter_value,p_price,p_shpping_amount,p_name,p_qty)VALUES('$userid','$productAutoid','$terid','0','$date','$time','$sert_id','$payment_vale','$x_card_num','$card_exp_month','$x_card_code','$Post_name','$othernoteval','$sizevaluedat','$productPrice','$shppingtovaladd','$productName','$productQty')";
					$datainsertdata = $contdb->query($insert_order);
				}
			}
				$updateshppingvale = "INSERT INTO shipping_table(mul_shipp_custid,mul_shipp_setid)VALUES('$userid','$sert_id')";
		 		$queryshppival = $contdb->query($updateshppingvale);
				//$stvalue[$autostid] = array('stid'=>$sert_id);
				$stvalue[] = $sert_id;
			}
			//print_r($stvalue);
			//die();
			 if($datainsertdata == true){
			 	$_SESSION['secortycode']=$stvalue;
			 	echo "<script>window.location.href='$url/success/';</script>";
			 }
			}else{
				echo "<script>alert('$error');window.location.href='$url/process/';</script>";
				unset($_POST['payment']);
				/*echo "<div class='col-md-12'>
						<div class='Payment-Status'>".$error."</div>
					</div>";*/
			}// success else condit

		}else{
			echo "<script>alert('Complete your billing details first.');window.location.href='$url/process/';</script>";
			unset($_POST['payment']);
		}// chaking content data if &&
		}else{
			echo "<script>alert('Please enter valid captcha.');window.location.href='$url/process/';</script>";
				unset($_POST['payment']);
		}// chapta
		unset($_POST['payment']);
	}//post action
?>
<div class="container">
    <div class="row">
        <div class="col-xs-6 col-md-6 col-md-offset-3">
            <div class="panel panel-default set-authpay">
            	<form role="form" method="post" enctype="multipart/form-data" action="">
                <div class="panel-heading">
                	<div class="row">
	                	<div class="col-md-12">
	                		<img src="<?php echo $url; ?>/assets/images/paypal-img/authori-bank-of-america.png">
	                	</div>
                	</div>
                    <h3>Card Details <span>$<?php echo $grnad_val; ?></span></h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <div class="form-group">
                                <label>CARD NUMBER</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="1234 1234 1234 1234" name="Card_number" required id="cardvale" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-7 col-md-7">
                            <div class="form-group">
                                <label>EXPIRY DATE </label>
                                <div class="row">
                                	<div class="col-md-5">
                                		<select name="month_year" class="form-control" required>
		                                	<?php
		                                		for ($x = 1; $x <= 12; $x++) {
												  echo '<option value="'.$x.'">'.$x.'</option>';
												}
		                                	?>
		                                </select>
                                	</div>
                                	<div class="col-md-7">
                                		<select name="yearname" class="form-control" required>
			                                <?php
				                                $firstYear = (int)date('Y') - 60;
												$lastYear = $firstYear + 90;
												for($i=$firstYear;$i<=$lastYear;$i++)
												{
												    echo '<option value='.$i.'>'.$i.'</option>';
												}
			                                ?>
		                                </select>
                                	</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-5 col-md-5 pull-right">
                            <div class="form-group">
                                <label>CVC CODE</label>
                                <input type="text" class="form-control" placeholder="CVC" maxlength="4" id="cvvset" name="cvv" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <div class="form-group">
                                <label>Name on card</label>
                                <input type="text" class="form-control" placeholder="Name on card" required name="owner_name" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="chapta_set form-group">
                	<label>CAPTCHA</label>
                	<div id="reload-chaptaval">
                	<span class="numberone">
                	<input id="num1" class="sum" type="text" name="num1" value="<?php echo rand(1,4) ?>" readonly="readonly" /> + </span> <span class="numbertwo"><input id="num2" class="sum" type="text" name="num2" value="<?php echo rand(5,9) ?>" readonly="readonly" /> = </span></div> <input id="captcha" class="captcha" type="text" name="captcha" placeholder="Answer" maxlength="2" required />
                	<span id="relodchapta"><i class="fa fa-refresh"></i></span>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <button type="submit" id="submit" class="btn btn-warning btn-lg" name="payment">Process Payment</button>
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
    input#num1 {
	    width: 70%;
	    float: left;
	    margin-right: 11px;
	    text-align: center;
	    color: #000;
	}
	input#num2 {
	    width: 66%;
	    margin-left: 7px;
	    text-align: center;
	    color: #000;
	}
	span.numberone {
    float: left;
    line-height: 38px;
    width: 20%;
}
span.numbertwo {
    float: left;
    width: 22%;
}
input#captcha {
    width: 47%;
    margin-left: 10px;
    color: #000;
}
.chapta_set label {
    width: 100%;
}
span#relodchapta {
    float: right;
    line-height: 48px;
    margin-right: 10px;
    cursor: pointer;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
$('#monthset').bind('keyup','keydown', function(event) {
  	var inputLength = event.target.value.length;
  	//alert(inputLength);
    if (event.keyCode != 6){
      if(inputLength === 2){
        var thisVal = event.target.value;
        thisVal += '/';
        $(event.target).val(thisVal);
    	}
    }
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
    return parts.join('')
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