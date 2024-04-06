<?php
if(strpos($amount, '.')){
    $setamount = str_replace('.', '', $amount);
}else{
    $setamount = $amount."00";
}
if($_SESSION['processPayment'] == "1"){
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
    $paymentid = "COD";
    if($paymentid){
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
 		$set_trakingid = $paymentid.$dateval.$timeval.$uqid;
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

		 	$insert_order = "INSERT INTO customer_order(customer_id,product_auto_id,tnx_id,payment_url_status,p_date,p_time,p_serty_id,p_payment_mod,p_Card_number,p_expriy_data,p_cvv,p_card_own,p_othernote,p_filter_value,p_price,p_shpping_amount,p_name,p_qty)VALUES('$userid','$productAutoid','COD','0','$date','$time','$sert_id','$payment_vale','0','0','0','$Post_name','$othernoteval','$sizevaluedat','$productPrice','$shppingtovaladd','$productName','$productQty')";
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
	}
}
?>