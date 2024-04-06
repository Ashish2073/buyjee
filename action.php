<?php
//session_start();
include_once('dis-setting/connection.php');
// Add to cart
if(isset($_POST['addToCart'])){
		$pid = $_POST['proId'];
		$data = GetProductDataValTab($pid);
		$prodautid = $data[0]["product_auto_id"];
		$implodeadddat = implode(',', $_POST['productvert']);
		$produtprice = $_POST['productpric'];
		$custoer_id = $_SESSION['customersessionlogin'];
		$get_query_value = "SELECT * FROM cart_user WHERE cart_user_ip='$ip' AND cart_prdo_auto_id='$prodautid' AND cart_prdo_sizename='$implodeadddat' AND cart_userid='$custoer_id'";
		$queyavaldata = $contdb->query($get_query_value);
		if($queyavaldata->num_rows > 0){
		while($rowfetchdata = $queyavaldata->fetch_array()){
				$querty_value = $rowfetchdata['cart_prdo_qutity'];
				$quntyid_val = $rowfetchdata['id'];
				$product_vertionval[] = $rowfetchdata['cart_prdo_sizename'];
			}
			$addquyty = $_POST['Productqunity'];
		//print_r($product_vertionval);
			$update_size = "UPDATE cart_user SET cart_prdo_qutity='$addquyty' WHERE cart_user_ip='$ip' AND cart_prdo_auto_id='$prodautid' AND id='$quntyid_val' AND cart_prdo_sizename='$implodeadddat'";
			$query_valuepdtae = $contdb->query($update_size);
			echo 1;
		}else{
			//$_SESSION["cart_item"] = $itemArray;
			$produt_name = $data[0]["product_name"];
			$produt_autid = $data[0]['product_auto_id'];
			$produt_qutiny = $_POST['Productqunity'];
			if($data[0]['product_regular_price'] == ""){
			    $arrayvael = SingleProductPagePriceAddToCart($pid,$implodeadddat);
                $produt_pri_sale = $arrayvael[0];
                $produt_pri_reg = $arrayvael[1];
			}else{
			    $produt_pri_reg = $data[0]['product_regular_price'];
			    $produt_pri_sale = $data[0]['product_sale_price'];
			}
			$produt_imgvale = $data[0]['product_image'];
			$produt_shdomstk = $data[0]['product_shppin_domst'];
			$produt_shintern = $data[0]['product_shppin_inters'];
			if(isset($_SESSION['customersessionlogin'])){
				$customervaledata = $_SESSION['customersessionlogin'];
				$get_query_checkname = "SELECT * FROM cart_user WHERE cart_user_ip='$ip' AND cart_prdo_auto_id='$prodautid' AND cart_userid='$customervaledata'";
			}else{
				$customervaledata = "";
				$get_query_checkname = "SELECT * FROM cart_user WHERE cart_user_ip='$ip' AND cart_prdo_auto_id='$prodautid'";
			}
			$cehck_querysameval = $contdb->query($get_query_checkname);
			if($cehck_querysameval->num_rows > 0){
				if($produt_shdomstk == "0"){
					$halfshppindomastik = $produt_shdomstk;
				}else{
					$halfshppindomastik = $produt_shdomstk/4;
				}
				if($produt_shintern == "0"){
					$halfinternasal = $produt_shintern;
				}else{
					$halfinternasal = $produt_shintern/4;
				}
			}else{
				$halfinternasal = $produt_shintern;
				$halfshppindomastik = $produt_shdomstk;
			}
			$insert_new_product = "INSERT INTO cart_user(cart_prdo_name,cart_prdo_auto_id,cart_prdo_qutity,cart_prdo_pricereg,cart_prdo_pricesale,cart_prdo_img,cart_prdo_sizename,cart_user_ip,cart_user_date,cart_user_time,cart_status,cart_prdo_ship_domstik,cart_prdo_ship_inter,cart_userid,cart_user_browser)VALUES('$produt_name','$produt_autid','$produt_qutiny','$produt_pri_reg','$produt_pri_sale','$produt_imgvale','$implodeadddat','$ip','$date','$time','0','$halfshppindomastik','$halfinternasal','$customervaledata','$brower')";
			$queryupdat = $contdb->query($insert_new_product);
			echo 0; // when first product added first time.
		}
		//$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
		//echo 1; // another new one added
		/*if($color != ""){
			if(in_array($data[0]["product_auto_id"], array_column($_SESSION['cart_item'], 'product_auto_id'))) {
				foreach ($_SESSION["cart_item"] as $key => $value) {
					if($data[0]["product_auto_id"] == $_SESSION["cart_item"][$key]['product_auto_id']) {
						if(empty($_SESSION["cart_item"][$key]["quantity"])) {
							$_SESSION["cart_item"][$key]["quantity"] = 0;
						}
						$_SESSION["cart_item"][$key]["quantity"] += 1;
						echo $_SESSION["cart_item"][$key]['attbutvaluecolor']; //already added
					}
				}
			}else{
				$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				echo 1; // another new one added
			}
		}
		if($size != ""){
			if(in_array($data[0]["product_auto_id"], array_column($_SESSION['cart_item'], 'product_auto_id'))) {
				foreach ($_SESSION["cart_item"] as $key => $value) {
					if($data[0]["product_auto_id"] == $_SESSION["cart_item"][$key]['product_auto_id']) {
						if(empty($_SESSION["cart_item"][$key]["quantity"])) {
							$_SESSION["cart_item"][$key]["quantity"] = 0;
						}
						$_SESSION["cart_item"][$key]["quantity"] += 1;
						echo 0; //already added
					}
				}
			}else{
				$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				echo 1; // another new one added
			}
		}else{
			if(in_array($data[0]["product_auto_id"], array_column($_SESSION['cart_item'], 'product_auto_id'))) {
				foreach ($_SESSION["cart_item"] as $key => $value) {
					if($data[0]["product_auto_id"] == $_SESSION["cart_item"][$key]['product_auto_id']) {
						if(empty($_SESSION["cart_item"][$key]["quantity"])) {
							$_SESSION["cart_item"][$key]["quantity"] = 0;
						}
						$_SESSION["cart_item"][$key]["quantity"] += 1;
						echo 0; //already added
					}
				}
			}else{
				$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				echo 1; // another new one added
			}
		}*/
	/*}else{
		
	}*/
}

if(isset($_POST['adtoCartSingle'])){
	$pid = $_POST['proId'];
	$quityvale = $_POST['quityval'];
	$data = GetProductDataValTab(0,0,0,$pid);
	$prodautid = $data[0]["product_auto_id"];
	$$blank = "";
	if(isset($_SESSION['customersessionlogin'])){
		$customerid = $_SESSION['customersessionlogin'];
		$get_query_value = "SELECT * FROM cart_user WHERE cart_user_ip='$ip' AND cart_prdo_auto_id='$prodautid' AND cart_userid='$customerid'";
	}else{
		$get_query_value = "SELECT * FROM cart_user WHERE cart_user_ip='$ip' AND cart_prdo_auto_id='$prodautid' AND cart_userid='$blank'";
	}
	$queyavaldata = $contdb->query($get_query_value);
	if($queyavaldata->num_rows > 0){
	while($rowfetchdata = $queyavaldata->fetch_array()){
			$querty_value = $rowfetchdata['cart_prdo_qutity'];
			$quntyid_val = $rowfetchdata['id'];
			$product_vertionval[] = $rowfetchdata['cart_prdo_sizename'];
		}
		$addquyty = $querty_value+1;
	//print_r($product_vertionval);
		$update_size = "UPDATE cart_user SET cart_prdo_qutity='$addquyty' WHERE cart_user_ip='$ip' AND cart_prdo_auto_id='$prodautid' AND id='$quntyid_val'";
		$query_valuepdtae = $contdb->query($update_size);
		echo 1;
	}else{
		//$_SESSION["cart_item"] = $itemArray;
		$produt_name = $data[0]["product_name"];
		$produt_autid = $data[0]['product_auto_id'];
		if($quityvale == "" && $quityvale == "0"){
			$produt_qutiny = "1";
		}else{
			$produt_qutiny = $quityvale;
		}
		$produt_pri_reg = $data[0]['product_regular_price'];
		$produt_pri_sale = $data[0]['product_sale_price'];
		$produt_imgvale = $data[0]['product_image'];
		$produt_shdomstk = $data[0]['product_shppin_domst'];
		$produt_shintern = $data[0]['product_shppin_inters'];
		if(isset($_SESSION['customersessionlogin'])){
			$customervaledata = $_SESSION['customersessionlogin'];
			$get_query_checkname = "SELECT * FROM cart_user WHERE cart_user_ip='$ip' AND cart_prdo_auto_id='$prodautid' AND cart_userid='$customervaledata'";
		}else{
			$customervaledata = "";
			$get_query_checkname = "SELECT * FROM cart_user WHERE cart_user_ip='$ip' AND cart_prdo_auto_id='$prodautid'";
		}
		$cehck_querysameval = $contdb->query($get_query_checkname);
		if($cehck_querysameval->num_rows > 0){
			if($produt_shdomstk == "0"){
				$halfshppindomastik = $produt_shdomstk;
			}else{
				$halfshppindomastik = $produt_shdomstk/4;
			}
			if($produt_shintern == "0"){
				$halfinternasal = $produt_shintern;
			}else{
				$halfinternasal = $produt_shintern/4;
			}
		}else{
			$halfinternasal = $produt_shintern;
			$halfshppindomastik = $produt_shdomstk;
		}
		$insert_new_product = "INSERT INTO cart_user(cart_prdo_name,cart_prdo_auto_id,cart_prdo_qutity,cart_prdo_pricereg,cart_prdo_pricesale,cart_prdo_img,cart_user_ip,cart_user_date,cart_user_time,cart_status,cart_prdo_ship_domstik,cart_prdo_ship_inter,cart_userid,cart_user_browser)VALUES('$produt_name','$produt_autid','$produt_qutiny','$produt_pri_reg','$produt_pri_sale','$produt_imgvale','$ip','$date','$time','0','$halfshppindomastik','$halfinternasal','$customervaledata','$brower')";
		$queryupdat = $contdb->query($insert_new_product);

		echo 0; // when first product added first time.
	}
}

if(isset($_POST['removeTocart'])){
	$pid = $_POST['proId'];
	$cartvalue_decrec = "SELECT * FROM cart_user WHERE id='$pid'";
	$query_value_data = $contdb->query($cartvalue_decrec);
	if($query_value_data->num_rows > 0){
		while($rowdecvale = $query_value_data->fetch_array()){
			$get_queryvale = $rowdecvale['cart_prdo_qutity'] += 1;
			$updatevaluev = "DELETE FROM cart_user WHERE id='$pid'";
			$queryvaledata = $contdb->query($updatevaluev);
			unset($_SESSION["tax_amt"]);
			unset($_SESSION["discount_amount"]);
			unset($_SESSION["shippingname"]);
			unset($_SESSION['secortycode']);
			unset($_SESSION['shippingShowAmt']);
			unset($_SESSION["shippingvale"]);
			unset($_SESSION["shppingto"]);
			unset($_SESSION["discount_code"]);
			unset($_SESSION['othernotevalue']);
		}
		return 0;
	}
}

if(isset($_POST['decreaseQty'])){
	$pid = $_POST['proId'];
	$cartvalue_decrec = "SELECT * FROM cart_user WHERE id='$pid'";
	$query_value_data = $contdb->query($cartvalue_decrec);
	if($query_value_data->num_rows > 0){
		while($rowdecvale = $query_value_data->fetch_array()){
			if($rowdecvale['cart_prdo_qutity'] == 1){
				$delect_value = "DELETE FROM cart_user WHERE id='$pid'";
				$qauery_valuedata = $contdb->query();
			}else{
				$get_queryvale = $rowdecvale['cart_prdo_qutity'] -= 1;
				$updatevaluev = "UPDATE cart_user SET cart_prdo_qutity='$get_queryvale' WHERE id='$pid'";
				$queryvaledata = $contdb->query($updatevaluev);
			}
		}
		return 0;
	}
}

if(isset($_POST['increaseQty'])){
	$pid = $_POST['proId'];
	$cartvalue_decrec = "SELECT * FROM cart_user WHERE id='$pid'";
	$query_value_data = $contdb->query($cartvalue_decrec);
	if($query_value_data->num_rows > 0){
		while($rowdecvale = $query_value_data->fetch_array()){
			$product_auto_idvale = $rowdecvale['cart_prdo_auto_id'];
			$product_arry_id = $rowdecvale['cart_prdo_sizename'];
			$get_qunity_smal = $rowdecvale['cart_prdo_qutity'];

			$ceckingtream = "SELECT * FROM all_product WHERE product_auto_id='$product_auto_idvale'";
			$query_product_qunity = $contdb->query($ceckingtream);
			if($query_product_qunity->num_rows > 0){
				while($row_get_produt_qunity = $query_product_qunity->fetch_array()){
					$get_procut_colorquniy = $row_get_produt_qunity['product_color'];
					$get_procut_quniytval = $row_get_produt_qunity['product_stock'];

					if($get_procut_colorquniy == "" || $get_procut_colorquniy == "0"){

						if($get_procut_quniytval == "0"){
							$qunity_value = "0";
						}elseif($get_procut_quniytval == ""){
							$qunity_value = "1";
						}else{
							$qunity_veritonval = $get_procut_quniytval;
							$qunity_value = "1";
						}

					}else{

						$get_array_productvt = "SELECT * FROM product_attbut_vartarry WHERE prot_trm_prodtid='$get_procut_colorquniy' AND prot_trm_id='$product_arry_id'";
						$query_arry_dataval = $contdb->query($get_array_productvt);
						if($query_arry_dataval->num_rows > 0){
							while($row_get_arryvertion = $query_arry_dataval->fetch_array()){
								if($row_get_arryvertion['prot_trm_quantity'] == ""){
									$qunity_value = "1";
									$qunity_veritonval = $row_get_arryvertion['prot_trm_quantity'];
								}elseif($row_get_arryvertion['prot_trm_quantity'] == "0"){
									$qunity_value = "0";
									$qunity_veritonval = $row_get_arryvertion['prot_trm_quantity'];
								}else{
									$qunity_veritonval = $row_get_arryvertion['prot_trm_quantity'];
									$qunity_value = "1";
								}
							}
						}
					}
					if($qunity_veritonval == ""){
						$qunity_cart_notincre = "1";
					}elseif($qunity_veritonval == "0"){
						$qunity_cart_notincre = "0";
					}else{
						if($qunity_veritonval > $get_qunity_smal){
	                      $qunity_cart_notincre = "1";
	                    }else{
	                      $qunity_cart_notincre = "0";
	                    }
					}
				}
			}
			if($qunity_cart_notincre == "1"){
				$get_queryvale = $rowdecvale['cart_prdo_qutity'] += 1;
				if($get_queryvale > $get_procut_quniytval){
				    echo "0";
				}else{
    				$updatevaluev = "UPDATE cart_user SET cart_prdo_qutity='$get_queryvale' WHERE id='$pid'";
    				$queryvaledata = $contdb->query($updatevaluev);
    				echo "1";
				}
			}elseif($qunity_cart_notincre == "0"){
				echo "0";
			}
		}
	}
}

if(isset($_POST['inputQty'])){
	$pid = $_POST['proId'];
	$qty = $_POST['proQty'];
	$cartvalue_decrec = "SELECT * FROM cart_user WHERE id='$pid'";
	$query_value_data = $contdb->query($cartvalue_decrec);
	if($query_value_data->num_rows > 0){
		while($rowdecvale = $query_value_data->fetch_array()){
			$product_auto_idvale = $rowdecvale['cart_prdo_auto_id'];
			$product_arry_id = $rowdecvale['cart_prdo_sizename'];
			$get_qunity_smal = $rowdecvale['cart_prdo_qutity'];

			$ceckingtream = "SELECT * FROM all_product WHERE product_auto_id='$product_auto_idvale'";
			$query_product_qunity = $contdb->query($ceckingtream);
			if($query_product_qunity->num_rows > 0){
				while($row_get_produt_qunity = $query_product_qunity->fetch_array()){
					$get_procut_colorquniy = $row_get_produt_qunity['product_color'];
					$get_procut_quniytval = $row_get_produt_qunity['product_stock'];

					if($get_procut_colorquniy == "" || $get_procut_colorquniy == "0"){

						if($get_procut_quniytval == "0"){
							$qunity_value = "0";
						}elseif($get_procut_quniytval == ""){
							$qunity_value = "1";
						}else{
							$qunity_veritonval = $get_procut_quniytval;
							$qunity_value = "1";
						}

					}else{

						$get_array_productvt = "SELECT * FROM product_attbut_vartarry WHERE prot_trm_prodtid='$get_procut_colorquniy' AND prot_trm_id='$product_arry_id'";
						$query_arry_dataval = $contdb->query($get_array_productvt);
						if($query_arry_dataval->num_rows > 0){
							while($row_get_arryvertion = $query_arry_dataval->fetch_array()){
								if($row_get_arryvertion['prot_trm_quantity'] == ""){
									$qunity_value = "1";
								}elseif($row_get_arryvertion['prot_trm_quantity'] == "0"){
									$qunity_value = "0";
								}else{
									$qunity_veritonval = $row_get_arryvertion['prot_trm_quantity'];
									$qunity_value = "1";
								}
							}
						}
					}

					if($qunity_veritonval > $get_qunity_smal){
                      $qunity_cart_notincre = "1";
                    }else{
                      $qunity_cart_notincre = "0";
                    }
				}
			}
			if($qunity_cart_notincre == "1"){
				//$get_queryvale = $rowdecvale['cart_prdo_qutity'] += 1;
				$updatevaluev = "UPDATE cart_user SET cart_prdo_qutity='$qty' WHERE id='$pid'";
				$queryvaledata = $contdb->query($updatevaluev);
				echo "1";
			}elseif($qunity_cart_notincre == "0"){
				echo "0";
			}
		}
	}
}

// Coupon Code
if(isset($_POST['couponCode'])){
	$couponCode = $_POST['cCode'];
	$subTotal = $_POST['subTotal'];
	$loginid = $_POST['vcusvale'];
	$validate = couponValidate($couponCode);
	$date = date('m/d/Y');
	$time = date('H:i:s');
	//print_r($validate);
	if($validate[0] == 0){
		$result = array(0);
		echo json_encode($result); // No coupon Exists in database
	}else{
		$dateValidate = couponDateValidate($couponCode);
		if($dateValidate[0] == 0){
			$result = array(1);
			echo json_encode($result); // Coupon Date Expire	
		}else{
			$coupsusecechk_vale = "SELECT COUNT(1) FROM coupons_use WHERE coup_use_custid='$loginid' AND coup_use_coupanname='$couponCode' AND coup_use_status='1'";
			$vale_datacopusn = mysqli_query($contdb,$coupsusecechk_vale);
			$rowquerycoupions = mysqli_fetch_array($vale_datacopusn);
			$totalusecopancustomer = $rowquerycoupions[0];

			$get_coupanvale = "SELECT * FROM coupons WHERE coup_name='$couponCode'";
			$coupnavale = mysqli_query($contdb,$get_coupanvale);
			while($rowvaledatacoup = mysqli_fetch_array($coupnavale)){
				$get_coupanvaledata = $rowvaledatacoup['coup_noofuse'];
			}
			if($get_coupanvaledata <= $totalusecopancustomer){
				$result = array(3);
				echo json_encode($result);
			}else{
				$delectdatavle = "DELETE FROM coupons_use WHERE coup_use_custid='$loginid' AND coup_use_date='$date' AND coup_use_status='0'";
				$deletcoupan = mysqli_query($contdb,$delectdatavle);
				// for flat Rate
				if($dateValidate[1][0]['coup_type'] == 1){
					$rate = $dateValidate[1][0]['coup_amount'];
					$_SESSION['subTotal'] = number_format(($subTotal-$rate), 2);
					$_SESSION['discount_amount'] = $rate;
					$_SESSION['discount_code'] = $couponCode;
					$result = array(2, $_SESSION['subTotal'], $_SESSION['discount_amount']);
					echo json_encode($result);
					$lessamountvale = number_format(($subTotal-$rate), 2);
					$insertcoupanvale = "INSERT INTO coupons_use(coup_use_custid,coup_use_achul_amt,coup_use_dicountamt,coup_use_less_amut,coup_use_coupanname,coup_use_date,coup_use_time,coup_use_status,coup_use_cataloger)VALUES('$loginid','$subTotal','$rate','$lessamountvale','$couponCode','$date','$time','0','1')";
					$queryvaledatainst = mysqli_query($contdb,$insertcoupanvale);
				}
				//for percentage
				if($dateValidate[1][0]['coup_type'] == 2){
					$rate = $dateValidate[1][0]['coup_amount'];
					$discAmt = $subTotal*($rate/100);
					//session_start();
					$_SESSION['subTotal'] = number_format(($subTotal-$discAmt), 2);
					$_SESSION['discount_amount'] = $discAmt;
					$_SESSION['discount_code'] = $couponCode;
					$result = array(2, $_SESSION['subTotal'], $_SESSION['discount_amount']);
					echo json_encode($result);
					$lessamountvale = number_format(($subTotal-$discAmt), 2);
					$insertcoupanvale = "INSERT INTO coupons_use(coup_use_custid,coup_use_achul_amt,coup_use_dicountamt,coup_use_less_amut,coup_use_coupanname,coup_use_date,coup_use_time,coup_use_status,coup_use_cataloger)VALUES('$loginid','$subTotal','$rate','$lessamountvale','$couponCode','$date','$time','0','2')";
					$queryvaledatainst = mysqli_query($contdb,$insertcoupanvale);
				}
			}
		}
		
	}
}

if(isset($_POST['removeshipto'])){
	$romvecustid = $_POST['custidshromve'];
	$remove_vale = "SELECT * FROM shpptoadds WHERE cust_to_id='$romvecustid' AND cust_to_status='0'";
	$queryvale = $contdb->query($remove_vale);
	if($queryvale->num_rows > 0){
		$removeaddews = "DELETE FROM shpptoadds WHERE cust_to_id='$romvecustid' AND cust_to_status='0'";
		$querydelet = $contdb->query($removeaddews);
		unset($_SESSION['shppingto']);
	}
}

if(isset($_POST['payset'])){
	$Payment_session = $_POST['payset'];
	$_SESSION['processPayment']=$Payment_session;
}

if(isset($_POST['customer-firstName'])){
	$fname = $_POST['customer-firstName'];
	$lname = $_POST['customer-lastName'];
	$email = $_POST['customer-email'];
	//$password = MD5($_POST['customer-pass']);
	$phone = $_POST['customer-phone'];
	$country = $_POST['customer-country'];
	$address = $_POST['customer-address'];
	$city = $_POST['customer-city'];
	$state = $_POST['customer-state'];
	$postalcode = $_POST['customer-postalcode'];
	$countrycodeval = $_POST['customer-countcod'];
	$otherNote = $_POST['customer-orderNotes'];
	$singlvednname = str_replace(" ","_", $fname);
	$singlvedlast = str_replace(" ","_", $lname);
	$sing_val_data = $singlvednname.'_'.$singlvedlast;
	$siionidval = $_SESSION['customersessionlogin'];
	/*$auto_num = rand(888888,9999999);
	$singlauto = $auto_num.$email;
	$shaffauto = str_shuffle($singlauto);*/
	$date = date("m/d/Y");
	$time = date("h:i A");
	if(isset($_SESSION['gust_customer'])){
		$update_datauser = "UPDATE customer SET customer_address='$address',customer_country='$country',customer_state='$state',customer_city='$city',customer_pincode='$postalcode',customer_phone='$phone',customer_otherNote='$otherNote' WHERE customer_ui_id='$siionidval'";
		$queryvaldata = $contdb->query($update_datauser);
		/*$update_datauser = "INSERT INTO customer(customer_fname,customer_lname,customer_address,customer_country,customer_state,customer_city,customer_pincode,customer_phone,customer_otherNote,customer_ui_id,customer_img,customer_date,customer_time,customer_active,customer_type)VALUES('$fname','$lname','$address','$country','$state','$city','$postalcode','$phone','$otherNote','$siionidval','0','$date','$time','1','Guest')";
		$queryvaldata = $contdb->query($update_datauser);

		$insert_login_detal = "INSERT INTO userlogntable(user_first_name,user_email,user_lastname,user_password,user_session_id,user_type,user_status,user_auto)VALUES('Guest','$email','User','Guest','0','customer','0','$siionidval')";
    	$query_loginset_user = $contdb->query($insert_login_detal);*/

	}else{
		$update_datauser = "UPDATE customer SET customer_address='$address',customer_country='$country',customer_state='$state',customer_city='$city',customer_pincode='$postalcode',customer_phone='$phone',customer_otherNote='$otherNote' WHERE customer_ui_id='$siionidval'";
		$queryvaldata = $contdb->query($update_datauser);
	}
	echo 2;
	/*$cehck_email = "SELECT * FROM userlogntable WHERE user_email='$email'";
	$cehkquery = mysqli_query($conn, $cehck_email);
	if(mysqli_num_rows($cehkquery)){
		echo 0;
	}else{*/
		/*$checkname = "SELECT * FROM customer WHERE customer_name_url='$sing_val_data'";
		$query_namecehck = mysqli_query($conn,$checkname);
		if(mysqli_num_rows($query_namecehck)){
			echo 1;
		}else{*/
			/*$vendorinsert = "INSERT INTO userlogntable(user_first_name,user_email,user_lastname,user_password,user_session_id,user_cookies,user_type,user_status,user_auto)VALUES('$fname','$email','$lname','$password','0','0','customer','0','$shaffauto')";
			$vendor_login = mysqli_query($conn, $vendorinsert);*/
			/*$vendorall = "INSERT INTO customer(customer_fname,customer_lname,customer_name_url,customer_ui_id,customer_img,customer_address, customer_country, customer_state, customer_city, customer_pincode, customer_otherNote, customer_gender,customer_age,customer_phone,customer_auto,customer_date,customer_time,customer_active)VALUES('$fname','$lname','$sing_val_data','$shaffauto','0','$address','$country','$state','$city','$postalcode','$otherNote','0','0','$phone','$auto_num','$date','$time','1')";
			$venderquery = mysqli_query($conn, $vendorall);
			if($venderquery == true){
				$_SESSION['othernotevalue']=$otherNote;
				$_SESSION['customersessionlogin']=$shaffauto;
				$shrevarmail = $url."/phpmailer/mail?type=user&emailid=$email&nameget=$fname $lname";
				echo 2;
				//echo "<span class='green'>Account has been created successfully! You can enjoy your shopping now.</span>";
			}*/
		//}
	//}
}

if(isset($_POST["countrychage"])){
    // Capture selected country
    $countryvale = $_POST["countrychage"];
    $customeid = $_POST["Custyomeval"];
    $subtoalval = $_POST["subtotal"];
    $taxvaldata = $_POST["taxvaldat"];

    $_SESSION['shppingcountry']=$countryvale;
    
    $get_cartthree = "SELECT * FROM cart_user WHERE cart_user_ip='$ip' AND cart_status='0' AND cart_userid='$customeid'";
	$querycartthree = $contdb->query($get_cartthree);
	while($row_cartquery = $querycartthree->fetch_array()){
		$productidval = $row_cartquery['cart_prdo_auto_id'];
		$rowvaluedat[] = $row_cartquery;
		//if()
		
	} // while loop end
	foreach ($rowvaluedat as $shppgvaldat) {
		
		$date = date('m/d/Y');
		$produidvale[] = $shppgvaldat['cart_prdo_auto_id'];
		$countycodeval = $countryvale;

		$product_forloopid = $shppgvaldat['cart_prdo_auto_id'];
		$get_proudct_data = "SELECT * FROM all_product WHERE product_auto_id='$product_forloopid' AND product_status='1'";
		$query_setprodt = $contdb->query($get_proudct_data);
		while($row_getprodtval = $query_setprodt->fetch_array()){
			$get_vendot_id = $row_getprodtval['product_vender_id'];
		}
		$get_domistval = $shppgvaldat['cart_prdo_ship_domstik'];
		$get_internal = $shppgvaldat['cart_prdo_ship_inter'];
		/*if(count($count_valuedata) == "2"){
			echo "2";
		}else{
			echo "1";
		}*/
		$get_venodr_dat = "SELECT * FROM vendor WHERE vendor_auto='$get_vendot_id'";
		$query_vendorval = $contdb->query($get_venodr_dat);
		while($row_vendorval = $query_vendorval->fetch_array()){
			$get_couny_name = $row_vendorval['vendor_country'];
		//echo $get_couny_name;
		//echo $countycodeval;
			if($get_couny_name == $countycodeval){
				//echo '<li>'.substr($shppgvaldat['cart_prdo_name'], 0,40).' <span class="sub-count">$'.number_format($get_domistval, 2).'</span></li>';
				$total_shpping += $get_domistval;
			}else{
				//echo '<li>'.substr($shppgvaldat['cart_prdo_name'], 0,40).' <span class="sub-count">$'.number_format($get_internal, 2).'</span></li>';
				$total_shpping += $get_internal;
			}
		}
	}

    $_SESSION['shippingShowAmt']=$total_shpping;
   	$arrayval = number_format($total_shpping, 2);
   	$arrayvaltotal = number_format($subtoalval+$taxvaldata+$total_shpping, 2);
   	$_SESSION["grandTotal"]=$arrayvaltotal;
   	$resultval = array($arrayval, $arrayvaltotal);
	//$result = array($_SESSION["grandTotal"], $taxAmt, $subTotal);
	//echo $taxAmt;
	echo json_encode($resultval);
    //$_SESSION['countryvale']=$countryvale;
    /*$inset_country = "UPDATE customer SET customer_country='$countryvale' WHERE customer_ui_id='$customeid'";
    $query_instcout = $conn->query($inset_country);*/
    // Define country and city array
   /*$sqlcount = "SELECT * FROM shiptaxval WHERE shiptx_type = 'Tax' AND shiptx_countryname='$countryvale' ORDER BY shiptx_value";
	$qrycountyr = mysqli_query($conn,$sqlcount);
	while($rowcounty = mysqli_fetch_assoc($qrycountyr)){
		echo $resultsetval = '<option value="'.$rowcounty['shiptx_value'].'">'.$rowcounty['shiptx_value'].'</option>';
	}*/
}

// Tax and shipping charge
if(isset($_POST['stateGst'])){
	$state = $_POST['stateTax'];
	$subTotal = str_replace(",","", $_POST['subTotal']);
	$weight = $_POST['weight'];
	$data = stateTax($state);
	$shppivlaedata = $_POST['shppingvl'];
	// stateTax calculate
	$taxRate = $data[0]["shiptx_rate"];
	$taxAmt = number_format($subTotal*($taxRate/100), 2);
	$_SESSION["tax_amt"] = number_format($taxAmt, 2);
	//shipping charge calculate
	//$shippingCharge = number_format(shippingCharge($state, $weight), 2);
	//$_SESSION["shippingvalue"] = number_format(shippingCharge($state, $weight), 2);
	$_SESSION["grandTotal"] = number_format(($subTotal+$taxAmt+$shppivlaedata), 2);
	$result = array($_SESSION["grandTotal"], $taxAmt);
	//$result = array($_SESSION["grandTotal"], $taxAmt, $subTotal);
	//echo $taxAmt;
	echo json_encode($result);
}

if(isset($_POST['shipping'])){
	$date = date('m/d/Y');
	$time = date('H:i:s');
	$shipping_vale = $_POST['shippvale'];
	$explodatshipin = explode(',', $shipping_vale);
	$shppingamount = $explodatshipin[0];
	$shppingname = $explodatshipin[1];
	$shppinpd_id = $explodatshipin[2];
	$shipping_totlaamt = str_replace(',', '', $_POST['grantotval']);
	$taxvaleamout = $_POST['taxvaledata'];
	$customer_id = $_POST['shipping'];
	$cehck_shppingval = "SELECT * FROM shipping_table WHERE shipping_cust_id='$customer_id' AND shipping_date='$date' AND shipping_prodyut_id='$shppinpd_id'";
	$quewryvale = mysqli_query($contdb,$cehck_shppingval);
	if(mysqli_num_rows($quewryvale)){
		$updateshpping = "UPDATE shipping_table SET shipping_name='$shppingname',shipping_value='$shppingamount' WHERE shipping_cust_id='$customer_id' AND shipping_date='$date' AND shipping_prodyut_id='$shppinpd_id'";
		$uopdate_vale = mysqli_query($contdb,$updateshpping);
		if($uopdate_vale == true){
			
			$shppingamountArry = array($shppinpd_id=>array('ProductID'=>$shppinpd_id,'shppingValue'=>$shppingamount,'ShppingName'=>$shppingname));

			/*if(isset($_SESSION["shippingvale"])){*/

				foreach ($_SESSION["shippingvale"] as $keyShppin => $Shppivalue) {
					$keyChaleValue[] = $keyShppin;
					$PdIDname[] = $Shppivalue['ProductID'];
				}
				//print_r($keyChaleValue);
				if(in_array($shppinpd_id,$keyChaleValue)){
					foreach ($_SESSION["shippingvale"] as $Updatekey => $updatevalue) {
						$_SESSION["shippingvale"][$Updatekey]['shppingValue']=$shppingamount;
						$_SESSION["shippingvale"][$Updatekey]['ShppingName']=$shppingname;
						$AddCost[] = $updatevalue['shppingValue'];
					}
				}elseif(in_array($shppinpd_id,$PdIDname)){
					foreach ($_SESSION["shippingvale"] as $Updatekey => $updatevalue) {
						if($_SESSION["shippingvale"][$Updatekey]['ProductID'] == $shppinpd_id){
							$_SESSION["shippingvale"][$Updatekey]['shppingValue']=$shppingamount;
							$_SESSION["shippingvale"][$Updatekey]['ShppingName']=$shppingname;
						}
						$AddCost[] = $updatevalue['shppingValue'];
					}
				}else{
					foreach ($_SESSION["shippingvale"] as $Updatekey => $updatevalue) {
						$AddCost[] = $updatevalue['shppingValue'];
					}
					$_SESSION["shippingvale"]=array_merge($_SESSION["shippingvale"],$shppingamountArry);
				}
				$shppiSum = array_sum($AddCost);
				$_SESSION["shippingShowAmt"] = number_format($shppiSum, 2);
				$addshpinval = number_format($shipping_totlaamt+$taxvaleamout+$shppiSum, 2);
				$shpdidval = $shppinpd_id.$shppingamount;
				$singhlvale = json_encode(array('grandtotal'=>$addshpinval,'shippingdata'=>$shppiSum,'idvaleget'=>$shpdidval,'clickcount'=>'0'));
				echo $singhlvale;
				$_SESSION["grandTotal"] = number_format(str_replace(',', '', $addshpinval), 2);
			/*}else{*/
				/*foreach ($_SESSION["shippingvale"] as $Updatekey => $updatevalue) {
					$AddCost[] = $updatevalue['shppingValue'];
				}*/
				//$_SESSION['check']="SessionNot Set";
				/*$_SESSION["shippingvale"]=$shppingamountArry;
				$shppiSum = $shppingamount;
				$_SESSION["shippingShowAmt"] = number_format($shppiSum, 2);

				$addshpinval = number_format($shipping_totlaamt+$taxvaleamout+$shppiSum, 2);
				$shpdidval = $shppinpd_id.$shppingamount;
				$singhlvale = json_encode(array('grandtotal'=>$addshpinval,'shippingdata'=>$shppiSum,'idvaleget'=>$shpdidval,'clickcount'=>'1'));
				echo $singhlvale;
				$_SESSION["grandTotal"] = number_format(str_replace(',', '', $addshpinval), 2);*/
			/*}*/
			//unset($_SESSION['check']);
			//$shppiSum = array_sum($AddCost);
		}
	}else{
		$insertshippig = "INSERT INTO shipping_table(shipping_cust_id,shipping_name,shipping_value,shipping_date,shipping_time,shipping_prodyut_id)values('$customer_id','$shppingname','$shppingamount','$date','$time','$shppinpd_id')";
		$insertvale = mysqli_query($contdb,$insertshippig);
		if($insertvale == ture){
			
			$shppingamountArry = array($shppinpd_id=>array('ProductID'=>$shppinpd_id,'shppingValue'=>$shppingamount,'ShppingName'=>$shppingname));
			if(isset($_SESSION["shippingvale"])){

				foreach ($_SESSION["shippingvale"] as $keyShppin => $Shppivalue) {
					$keyChaleValue[] = $keyShppin;
					$PdIDname[] = $Shppivalue['ProductID'];
				}
				//print_r($keyChaleValue);
				if(in_array($shppinpd_id,$keyChaleValue)){
					foreach ($_SESSION["shippingvale"] as $Updatekey => $updatevalue) {
						$_SESSION["shippingvale"][$Updatekey]['shppingValue']=$shppingamount;
						$_SESSION["shippingvale"][$Updatekey]['ShppingName']=$shppingname;
						$AddCost[] = $updatevalue['shppingValue'];
					}
				}elseif(in_array($shppinpd_id,$PdIDname)){
					foreach ($_SESSION["shippingvale"] as $Updatekey => $updatevalue) {
						if($_SESSION["shippingvale"][$Updatekey]['ProductID'] == $shppinpd_id){
							$_SESSION["shippingvale"][$Updatekey]['shppingValue']=$shppingamount;
							$_SESSION["shippingvale"][$Updatekey]['ShppingName']=$shppingname;
						}
						$AddCost[] = $updatevalue['shppingValue'];
					}
				}else{
					foreach ($_SESSION["shippingvale"] as $Updatekey => $updatevalue) {
						$AddCost[] = $updatevalue['shppingValue'];
					}
					$_SESSION["shippingvale"]=array_merge($_SESSION["shippingvale"],$shppingamountArry);
				}
				$shppiSum = array_sum($AddCost);
				$addshpinval = number_format($shipping_totlaamt+$taxvaleamout+$shppiSum, 2);
				$shpdidval = $shppinpd_id.$shppingamount;
				$singhlvale = json_encode(array('grandtotal'=>$addshpinval,'shippingdata'=>$shppiSum,'idvaleget'=>$shpdidval,'clickcount'=>'2'));
				echo $singhlvale;
				$_SESSION["shippingShowAmt"] = number_format($shppiSum, 2);
				$_SESSION["grandTotal"] = number_format(str_replace(',', '', $addshpinval), 2);
			}else{
				/*foreach ($_SESSION["shippingvale"] as $Updatekey => $updatevalue) {
					$AddCost[] = $updatevalue['shppingValue'];
				}*/
				//$_SESSION['check']="SessionNot Set";
				$_SESSION["shippingvale"]=$shppingamountArry;

				$shppiSum = $shppingamount;
				$addshpinval = number_format($shipping_totlaamt+$taxvaleamout+$shppiSum, 2);
				$shpdidval = $shppinpd_id.$shppingamount;
				$singhlvale = json_encode(array('grandtotal'=>$addshpinval,'shippingdata'=>$shppiSum,'idvaleget'=>$shpdidval,'clickcount'=>'3'));
				echo $singhlvale;
				$_SESSION["shippingShowAmt"] = number_format($shppiSum, 2);
				$_SESSION["grandTotal"] = number_format(str_replace(',', '', $addshpinval), 2);
			}
			//unset($_SESSION['check']);
		}
	}
}

if(isset($_POST['removeshipto'])){
	$romvecustid = $_POST['custidshromve'];
	$remove_vale = "SELECT * FROM shpptoadds WHERE cust_to_id='$romvecustid' AND cust_to_status='0'";
	$queryvale = $contdb->query($remove_vale);
	if($queryvale->num_rows > 0){
		$removeaddews = "DELETE FROM shpptoadds WHERE cust_to_id='$romvecustid' AND cust_to_status='0'";
		$querydelet = $contdb->query($removeaddews);
		$_SESSION['shppingto']="1";
	}
}

if(isset($_POST['addTowhislt'])){
	$preodti = $_POST['proId'];

	if(isset($_SESSION['customersessionlogin'])){
			$cutomerauto_id = $_SESSION['customersessionlogin'];
	}else{
		$cutomerauto_id = "0";
	}
	$rowname = "whis_prd_id,whis_ip,whis_customerd,whis_date,whis_time,whis_broswer";
	$rowvalues = "'$preodti','$ip','$cutomerauto_id','$date','$time','$brower'";
	$insert_vale = GllInsertDataAllTable("wishlistbl_table",$rowname,$rowvalues);
	echo 0;
}

if(isset($_POST['removeTowhislt'])){
	$deletvaleids = $_POST['proIdwhis'];
	$deletid = "id='$deletvaleids'";
	$deletvale = DeleteALlDataVlae("wishlistbl_table",$deletid);
	echo 0;
}

if(isset($_POST['shptoaddrs'])){
	$fname_vale = $_POST['toname'];
	$lname_vale = $_POST['tolname'];
	$shppto_addres = addslashes($_POST['toaddess']);
	$shppto_city = addslashes($_POST['tocity']);
	$shppto_country = $_POST['tocountry'];
	$shppto_state = $_POST['tostate'];
	$shppto_stcode = $_POST['tostacode'];
	$shppto_pincode = $_POST['topincode'];
	$custidvale = $_SESSION['customersessionlogin'];
	$phoneal = $_POST['tophone'];
	$emailvale = $_POST['toemail'];

	$set_shppingdata = shiptodetails($shppto_addres,$shppto_city,$shppto_country,$shppto_state,$shppto_stcode,$shppto_pincode,$custidvale,$fname_vale,$lname_vale,$phoneal,$emailvale);
	if($set_shppingdata == true){
		$_SESSION['shppingto']="2";
	}
}
?>