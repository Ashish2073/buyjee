<?php
foreach($get_cartvale as $vendervalue_admin) {

    $get_domastik_admin = $vendervalue_admin['cart_prdo_ship_domstik'];
    $get_internsal_admin = $vendervalue_admin['cart_prdo_ship_inter'];

    if($_SESSION["shppingto"] == "2"){
        $get_customer_cout = "SELECT * FROM shpptoadds WHERE cust_to_id='$get_cutomerid'";
        $query_valecust = $contdb->query($get_customer_cout);
        while($rowgetcustomercut = $query_valecust->fetch_array()){
            $get_cyust_country = $rowgetcustomercut['cust_to_country'];
            $fill_namecust = $rowgetcustomercut['cust_to_fname'].' '.$rowgetcustomercut['cust_to_lname'];
            $fill_address = $rowgetcustomercut['cust_to_address'].', '.$rowgetcustomercut['cust_to_city'].', '.$rowgetcustomercut['cust_to_state'].', '.$rowgetcustomercut['cust_to_country'].', '.$rowgetcustomercut['cust_to_postalcode'];
        }
        $get_customer_cout_phon = "SELECT * FROM customer WHERE customer_ui_id='$get_cutomerid'";
        $query_valecust_phon = $contdb->query($get_customer_cout_phon);
        while($rowgetcustomercut_phon = $query_valecust_phon->fetch_array()){
            $phone_filde = $rowgetcustomercut_phon['customer_phone'];
        }
        $shippaddres = "2";
    }else{
        $get_customer_cout = "SELECT * FROM customer WHERE customer_ui_id='$get_cutomerid'";
        $query_valecust = $contdb->query($get_customer_cout);
        while($rowgetcustomercut = $query_valecust->fetch_array()){
            $get_cyust_country = $rowgetcustomercut['customer_country'];
            $fill_namecust = $rowgetcustomercut['customer_fname'].' '.$rowgetcustomercut['customer_lname'];
            $fill_address = $rowgetcustomercut['customer_address'].', '.$rowgetcustomercut['customer_city'].', '.$rowgetcustomercut['customer_state'].', '.$rowgetcustomercut['customer_country'].', '.$rowgetcustomercut['customer_pincode'];
            $phone_filde = $rowgetcustomercut['customer_phone'];
        }
        $shippaddres = "1";
    }

	$productautoid_admin = $vendervalue_admin['cart_prdo_auto_id'];
	$get_productdata_admin = "SELECT * FROM all_product WHERE product_auto_id='$productautoid_admin'";
	$queryproductdat_admin = $contdb->query($get_productdata_admin);
	while($row_get_product_admin = $queryproductdat_admin->fetch_array()){
		$get_vendoridprodut_admin = $row_get_product_admin['product_vender_id'];
		$get_productskuval_admin = $row_get_product_admin['product_sku'];
		$get_produtnameval_admin = $row_get_product_admin['product_name'];

		$get_vednordeils_admin = "SELECT * FROM vendor WHERE vendor_auto='$get_vendoridprodut_admin'";
		$queryvendordetils_admin = $contdb->query($get_vednordeils_admin);
		while($row_get_vendordetil_ad = $queryvendordetils_admin->fetch_array()){
			$get_vendorfname_ad = $row_get_vendordetil_ad['vendor_f_name'];
			$get_vendorlname_ad = $row_get_vendordetil_ad['vendor_l_name'];

            if($get_cyust_country == $row_get_vendordetil_ad['vendor_country']){
                $shppingtovaladd = $get_domastik_admin;
            }else{
                $shppingtovaladd = $get_internsal_admin;
            }

			$to = "jioitservices@gmail.com";

            $subject = "A Customer Has Placed a New Order.";

            $from = "orders@jioitservices.com";
            //$cc = "jioitservices@gmail.com";

             

            // To send HTML mail, the Content-type header must be set

            $headers  = 'MIME-Version: 1.0' . "\r\n";

            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

             

            // Create email headers

            $headers .= 'From: <orders@jioitservices.com>' . "\r\n";
            //$headers .= 'CC: '.$cc."\r\n";


            'X-Mailer: PHP/' . phpversion();



            $message = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>

            <html xmlns='http://www.w3.org/1999/xhtml'>

            <head>

            

            <title>Buyjee</title>

            <meta name='viewport' content='width=device-width, initial-scale=1.0'/>

            </head>

            <body style='margin: 0; padding: 0;'>

                <table border='0' cellpadding='0' cellspacing='0' width='100%'> 

                    <tr>

                        <td style='padding: 10px 0 30px 0;'>

                            <table align='center' border='0' cellpadding='0' cellspacing='0' width='600' style='border: 1px solid #cccccc; border-collapse: collapse;'>

                                <tr>

                                    <td align='center' bgcolor='#0fa8ae' style='padding: 40px 0 30px 0; color: #FFF; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;'>

                                        <img src='".$url."/assets/images/logo.png' alt='Creating Email Magic' width='300' height='230' style='display: block;' />

                                    </td>

                                </tr>

                                <tr>

                                    <td bgcolor='#ffffff' style='padding: 40px 30px 40px 30px;'>

                                        <table border='0' cellpadding='0' cellspacing='0' width='100%'>

                                            <tr>

                                                <td style='color: #153643; font-family: Arial, sans-serif; font-size: 20px; padding-bottom: 15px;'>

                                                    Hello<b> ".$get_vendorfname_ad." ".$get_vendorlname_ad.",</b>

                                                </td>

                                            </tr>

                                            <tr>

                                                <td style='padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 30px;'>

                                                    A customer has placed an order. See below for details.<br/><br/>

                                                    <b>Customer Name: </b> ".$fill_namecust."<br/>
                                                    <b>Customer Phone: </b> ".$phone_filde."<br/>
                                                    <b>Shipping Address: </b> ".$fill_address."<br/><br/>
                                                ------------------------------------------------------------<br/>

                                                    <b>Product Sku: </b>".$get_productskuval_admin."<br/>
                                                    <b>Product Name: </b>".$get_produtnameval_admin."<br/>";
    if($vendervalue_admin['cart_prdo_sizename'] != ""){
        foreach(explode(',', $vendervalue_admin['cart_prdo_sizename']) as $value) {

            $get_vertonname = "SELECT * FROM product_variationsdata WHERE id='$value'";
            $queryverinname = $contdb->query($get_vertonname);
            while($rowqueryval = $queryverinname->fetch_array()){
                $getvalename = $rowqueryval['proval_trm_value'];
                $gettremvale = $rowqueryval['proval_trm_attid'];

                $get_tremname = "SELECT * FROM product_attbut WHERE id='$gettremvale'";
                $querytremval = $contdb->query($get_tremname);
                while($rowtremvaldat = $querytremval->fetch_array()){
                    $message .= "<b>Product ".$rowtremvaldat['pd_attbut_name'].": </b>".$getvalename."<br/>";
                }
            }
        }
    }
    if($vendervalue_admin['cart_prdo_pricesale'] == "" || $vendervalue_admin['cart_prdo_pricesale'] == "0"){
    	$message .= "<b>Product Price: </b>₹".$vendervalue_admin['cart_prdo_pricereg']."<br/>";
    }else{
    	$message .= "<b>Product Price: </b>₹".$vendervalue_admin['cart_prdo_pricesale']."<br/>";
    }
    $message .= "<b>Quantity: </b>".$vendervalue_admin['cart_prdo_qutity']."<br/>
                                                    <b>Shipping Fee: </b>₹".$shppingtovaladd."<br/>
                                                    <b>Transaction ID: </b>".$transaction_id."<br/><br/>

                                                    For this order to be processed please go to your Buyjee account and provide the name of the shipping company and the tracking number once this order is in transit.<br/><br/>


                                                    Regards<br/>

                                                    Buyjee<br/>

                                                </td>

                                            </tr>

                                        </table>

                                    </td>

                                </tr>

                                <tr>

                                    <td bgcolor='#0fa8ae' style='padding: 30px 30px 30px 30px;'>

                                        <table border='0' cellpadding='0' cellspacing='0' width='100%'>

                                            <tr>

                                                <td style='color: #ffffff; font-family: Arial, sans-serif; font-size: 14px; text-align:center;' width='100%'>

                                                    &copy; 2020 Buyjee. All Rights Reserved.<br/><br/>

                                                </td>

                                            </tr>

                                        </table>

                                    </td>

                                </tr>

                            </table>

                        </td>

                    </tr>

                </table>

            </body>

            </html>";
            //print_r($_SESSION[]);
            mail($to, $subject, $message, $headers);

		} // vendor While Loop
	}// Product While Loop
} // Foreach Loop
?>