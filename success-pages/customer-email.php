<?php
$get_cuttomer_nam = "SELECT * FROM customer WHERE customer_ui_id='$get_cutomerid'";
$queryval = mysqli_query($contdb,$get_cuttomer_nam);
while($rowvalname = mysqli_fetch_array($queryval)){
    $fname = $rowvalname['customer_fname'];
    $lname = $rowvalname['customer_lname'];
}

$get_customer_email = "SELECT * FROM userlogntable WHERE user_auto='$get_cutomerid'";
$querysingl = mysqli_query($contdb,$get_customer_email);
while($rowvaledat = mysqli_fetch_array($querysingl)){
    $get_email_id = $rowvaledat['user_email'];
}
    
    $to = $get_email_id;

    $subject = "Your Buyjee Order Confirmation";

    $from = "orders@jioitservices.com";

     

    // To send HTML mail, the Content-type header must be set

    $headers  = 'MIME-Version: 1.0' . "\r\n";

    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

     

    // Create email headers

     $headers .= 'From: <orders@jioitservices.com>' . "\r\n";


    'X-Mailer: PHP/' . phpversion();



    $message = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>

    <html xmlns='http://www.w3.org/1999/xhtml'>

    <head><meta http-equiv='Content-Type' content='text/html; charset=euc-jp'>

    

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

                                            Hello<b> ".$fname." ".$lname.",</b>

                                        </td>

                                    </tr>

                                    <tr>

                                        <td style='padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 30px;'>

                                            Thanks for your order. Please see details below.<br/><br/>";

    foreach($get_cartvale as $customervalue) {

        $get_domastik_cutomer = $customervalue['cart_prdo_ship_domstik'];
        $get_internsal_cutomer = $customervalue['cart_prdo_ship_inter'];

        if($_SESSION["shppingto"] == "2"){
            $get_customer_cout = "SELECT * FROM shpptoadds WHERE cust_to_id='$get_cutomerid'";
            $query_valecust = $contdb->query($get_customer_cout);
            while($rowgetcustomercut = $query_valecust->fetch_array()){
                $get_cyust_country = $rowgetcustomercut['cust_to_country'];
            }
            $shippaddres = "2";
        }else{
            $get_customer_cout = "SELECT * FROM customer WHERE customer_ui_id='$get_cutomerid'";
            $query_valecust = $contdb->query($get_customer_cout);
            while($rowgetcustomercut = $query_valecust->fetch_array()){
                $get_cyust_country = $rowgetcustomercut['customer_country'];
            }
            $shippaddres = "1";
        }

        $message .= "<b>Product Name: </b> ".$customervalue['cart_prdo_name']."<br/>";

        $get_produutid = $customervalue['cart_prdo_auto_id'];

        $get_venornameval = "SELECT * FROM all_product WHERE product_auto_id='$get_produutid'";
        $get_queryproduct = $contdb->query($get_venornameval);
        while($rowgetvenor = $get_queryproduct->fetch_array()){
            $get_vendor_id = $rowgetvenor['product_vender_id'];

            $get_vendorsingelnam = "SELECT * FROM vendor WHERE vendor_auto='$get_vendor_id'";
            $queryvendordat = $contdb->query($get_vendorsingelnam);
            while($rowget_venodrname = $queryvendordat->fetch_array()){
                $vendorfullname = $rowget_venodrname['vendor_f_name'].' '.$rowget_venodrname['vendor_l_name'];
                $message .= "<b>Creator: </b> ".$vendorfullname."<br/>";

                if($get_cyust_country == $rowget_venodrname['vendor_country']){
                    $shppingtocutom = $get_domastik_cutomer;
                }else{
                    $shppingtocutom = $get_internsal_cutomer;
                }
                $shppingfee += $shppingtocutom;
            }
        $message .= "<b>Product SKU: </b> ".$rowgetvenor['product_sku']."<br/>";
        }
        if($customervalue['cart_prdo_sizename'] != ""){
            foreach(explode(',', $customervalue['cart_prdo_sizename']) as $value) {

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
        if($customervalue['cart_prdo_pricesale'] == "" || $customervalue['cart_prdo_pricesale'] == "0"){
            $message .= "<b>Product Price: </b>₹".$customervalue['cart_prdo_pricereg']."<br/>";
            $productprice = $customervalue['cart_prdo_pricereg'];
        }else{
            $message .= "<b>Product Price: </b>₹".$customervalue['cart_prdo_pricesale']."<br/>";
            $productprice = $customervalue['cart_prdo_pricesale'];
        }
        $message .= "<b>Quantity: </b>".$customervalue['cart_prdo_qutity']."<br/>";
        $message .= "================================<br/>";
        $totalprodtprc += $productprice;
    }
    //$arraysum = $totalprodtprc+$taxamountvale+$shppingfee;
    $message .= "<b>Transaction ID: </b>".$transaction_id."<br/>";
    $message .= "<b>Shipping Fee: </b>₹".$shppingfee."<br/>";
    $message .= "<b>Sales Tax: </b>₹".$taxamountvale."<br/>";
    $message .= "<b>Total: </b>₹".number_format($_SESSION['grandTotal'], 2)."<br/><br/>";

   $message .=  "Your order has been placed successfully. We will update you with your order's shipping information once your order is in transit.<br/><br/>
   CANCELLATIONS :- THERE IS A 4 HOUR CANCELLATION WINDOW AFTER PLACING YOUR ORDER. AFTER THIS 4 HOUR WINDOW YOUR ORDER WILL NO LONGER BE ELIGIBLE FOR CANCELLATION, BUT YOU MAY BE ELIGIBLE FOR A REFUND OR EXCHANGE ONCE YOU HAVE RECEIVED YOUR ORDER DEPENDING ON THE CREATORS’ INDIVIDUAL SHIPPING AND RETURNS POLICY. PLEASE EMAIL CANCELLATION REQUESTS TO ADMIN@jioitservices.COM OR CALL (US) 718 503 1339.<br/><br/>


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

                                            &copy; 2021 Buyjee. All Rights Reserved.<br/><br/>

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

    // Sending email
    mail($to, $subject, $message, $headers);
?>