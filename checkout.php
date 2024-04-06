<?php include 'includes/upper-header.php'; ?>

<?php include 'includes/main-header.php';?>
<?php
if(isset($_SESSION["customersessionlogin"])){
}else{
    echo '<script>';
    echo 'window.location.href="'.$url.'"';
    echo '</script>';
}
if(isset($_SESSION['gust_customer'])){
    $_SESSION['login-guestchout']="Chout-out";
    if(isset($_SESSION['customersessionlogin'])){
        $cusData = customerData($_SESSION['customersessionlogin']);
    }
}else{
    if(isset($_SESSION['customersessionlogin'])){
        $cusData = customerData($_SESSION['customersessionlogin']);
    }
}

$customerid = $_SESSION['customersessionlogin'];
// New Code 
$get_cartvaleu = "SELECT * FROM cart_user WHERE cart_status='0' AND cart_userid='$customerid'";
$queryvaleu = $contdb->query($get_cartvaleu);
if($queryvaleu->num_rows > 0){
    while($item = $queryvaleu->fetch_array()){
        $regularPrice = $item["cart_prdo_pricereg"];
            $salePrice = $item["cart_prdo_pricesale"];
            if(empty($salePrice)){
                $finalPrice = $regularPrice;
            }else{
                $finalPrice = $salePrice;
            }
        $item_price = $item["cart_prdo_qutity"]*$finalPrice;
        $total_quantity += $item["cart_prdo_qutity"];
        $total_price += $item_price;
        $productWeight += "0";
        $productdessmin = "0,0,0";
        $exploddemtion = explode(',', $productdessmin);
        $lengthvale += $exploddemtion[0];
        $widthvalue += $exploddemtion[1];
        $heightvale += $exploddemtion[2];
        //print_r($exploddemtion);
        $_SESSION['subTotal'] = $total_price;
    }
}else{
    /*echo '<script>';
    echo 'window.location.href="'.$url.'/customer/dashboard/";';
    echo '</script>';*/
}

$customer_id = $_SESSION['customersessionlogin'];
if(isset($_POST['updatedata'])){
    $countvale = $_POST['customer-country'];
    $getstatevakle = $_POST['customer-state'];
    $getvaledata = $_POST['customer-postalcode'];
    $insertvale = "UPDATE customer SET customer_country='$countvale',customer_state='$getstatevakle',customer_pincode='$getvaledata' WHERE customer_ui_id='$customer_id'";
    $querycountdata = mysqli_query($contdb,$insertvale);
}
 ?>
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="<?php echo $url; ?>/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Checkout
            </div>
        </div>
    </div>
    <div class="container mb-80 mt-50">
        <div class="row">
            <div class="col-lg-8 mb-40">
                <h1 class="heading-2 mb-10">Checkout</h1>
            </div>
        </div>
        <form method="post" class="addbtnvale" id="process">
            <div class="row">
            <div class="col-lg-7">
                <div class="row">
                    <h4 class="mb-30">Billing Details</h4>
                    <!-- Login Section -->
                    <?php $gettotlavale = $_SESSION['subTotal']; $wightvalue = $productWeight; ?>
                    <?php
                        if(isset($_SESSION['discount_amount'])){
                            $grandtotla = $_SESSION['subTotal']-$_SESSION['discount_amount'];
                        }else{
                            $grandtotla = $_SESSION['subTotal'];
                        }
                        $_SESSION['GrandTotalsub']=$grandtotla;
        
                        if(isset($cusData['customer_phone'])){
                            if($cusData['customer_phone'] == "0" || $cusData['customer_phone'] == ""){
                                $phonenumbr = "";
                            }else{
                                $phonenumbr = $cusData['customer_phone'];
                            }
                        }
                        if(isset($cusData['customer_address'])){
                            if($cusData['customer_address'] == "0" || $cusData['customer_address'] == ""){
                                $addressval = "";
                            }else{
                                $addressval = $cusData['customer_address'];
                            }
                        }
                    ?>
                        <div class="checkout-theme-form">
                            <div class="row check-out-row ">
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" name="customer-firstName" id="newCfirstName" value="<?php if(isset($cusData['customer_fname'])) echo $cusData['customer_fname']; ?>" placeholder="">
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" name="customer-lastName" id="newClastName" value="<?php if(isset($cusData['customer_lname'])) echo $cusData['customer_lname']; ?>" placeholder="">
                                </div>
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <label class="field-label">Phone</label>
                                    <input type="text" class="form-control" name="customer-phone" id="newCphone" value="<?php echo $phonenumbr; ?>" placeholder="Phone" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                </div>
                                <?php
                                    if(isset($_SESSION['gust_customer'])){
                                ?>
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <label class="field-label">Email ID</label>
                                    <input type="email" class="form-control" name="customer-email" id="newCemail" value="<?php if(isset($cusData['user_email'])) echo $cusData['user_email']; ?>" placeholder="" required>
                                </div>
                                <?php
                                    }
                                ?>
                                <?php if(!isset($_SESSION['customersessionlogin'])){ ?>
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="customer-pass" id="newCpass" value="" placeholder="">
                                </div>
                                <?php } ?>
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <label class="field-label">Address</label>
                                    <input type="text" class="form-control" name="customer-address" id="newAddress" value="<?php echo $addressval; ?>" placeholder="Street address">
                                </div>
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <label class="field-label">City/Town (Optional)</label>
                                    <input type="text" class="form-control" name="customer-city" id="newCcity" value="<?php if(isset($cusData['customer_city'])) echo $cusData['customer_city']; ?>" placeholder="">
                                </div>
    
                                <div class="form-group col-md-6">
                                    <label class="field-label">Country</label>
                                    <select class="form-control country" name="customer-country" id="newCcountry" required>
                                        <option value="">Select Country</option>
                                        <?php echo getcountryname($customer_id); ?>
                                    </select>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="field-label">State/Province/Region</label>
                                    <select class="form-control response" name="customer-state" required id="newCstate" data-weight="<?php echo $productWeight; ?>" data-totalAmt = "<?php echo number_format($grandtotla, 2); ?>" onchange="stateGst(this.value)">
                                        <?php echo getstatenamecustomer($customer_id); ?>
                                    </select>
                                </div>
                                <input type="hidden" class="form-control" name="customer-countcod" id="countCod" required value="0" placeholder="">
                                <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                    <label class="field-label">Postal Code / Zip Code</label>
                                    <input type="text" class="form-control" name="customer-postalcode"  required id="newCpcode" value="<?php if(isset($cusData['customer_pincode'])) echo $cusData['customer_pincode']; ?>" placeholder="">
                                </div>
                                <input type="hidden" name="salextex" id="shippingChargeval" value="<?php if(isset($_SESSION["shippingShowAmt"])){echo $_SESSION["shippingShowAmt"]; }else{echo "00.00"; } ?>">
                                <input type="hidden" name="sevitax" id="taxAmntval" value="<?php if(isset($_SESSION["tax_amt"])){echo $_SESSION["tax_amt"]; }else{ echo gettaxvale($customer_id,$_SESSION['GrandTotalsub']); } ?>">
                                
                                <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                    <label class="field-label">Order Notes</label>
                                    <textarea type="text" class="form-control" name="customer-orderNotes" id="ordernote" placeholder=""> <?php if(isset($cusData['customer_otherNote'])) echo $cusData['customer_otherNote']; ?> </textarea>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="border p-40 cart-totals ml-30 mb-50">
                    <div class="d-flex align-items-end justify-content-between mb-30">
                        <h4>Your Order</h4>
                        <h6 class="text-muted">Amount</h6>
                    </div>
                    <div class="divider-2 mb-30"></div>
                    <div class="table-responsive order_table checkout">
                        <table class="table no-border">
                            <tbody>
                                <?php 
                                $get_seconcart = "SELECT * FROM cart_user WHERE cart_status='0' AND cart_userid='$customerid'";
                                $sendcartval = $contdb->query($get_seconcart);
                                while($itemsect = $sendcartval->fetch_array()){
                                    $regularPrice = $itemsect["cart_prdo_pricereg"];
                                    $salePrice = $itemsect["cart_prdo_pricesale"];

                                    if(empty($salePrice)){
                                        $finalPrice = $regularPrice;
                                    }else{
                                        $finalPrice = $salePrice;
                                    } 
                                    $queryvaleu = $itemsect["cart_prdo_qutity"]*$finalPrice;
                                    $querydataval = $itemsect["cart_prdo_qutity"];
                                    if($querydataval > "1"){
                                        $querybshowvalue = "<td><h6 class='text-muted pl-20 pr-20'> x".' '.$itemsect["cart_prdo_qutity"].'</h6></td>';
                                    }else{
                                        $querybshowvalue = "<td><h6 class='text-muted pl-20 pr-20'>x 1</h6></td>";
                                    }
                                    //echo $querybshowvalue;
                                ?>
                                <tr>
                                    <td class="image product-thumbnail"><img src="<?php echo $url; ?>/images/<?php echo $itemsect['cart_prdo_img']; ?>" alt="#"></td>
                                    <td>
                                        <h6 class="w-160 mb-5"><?php echo substr($itemsect['cart_prdo_name'], 0,27); ?></h6>
                                    </td>
                                    <?php echo $querybshowvalue; ?>
                                    <td>
                                        <h4 class="text-brand">₹<?php echo number_format($queryvaleu, 2); ?></h4>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <ul class="sub-total">
                            <li><b>Sub Total</b> <span class="sub-count">₹<?php echo number_format($_SESSION['subTotal'], 2); ?></span></li>
                            <li><b>Sales Tax</b> <span class="sub-count">₹<span id="taxAmnt"><?php if(isset($_SESSION["tax_amt"])){ echo $_SESSION["tax_amt"]; }else{ echo gettaxvale($customer_id,$_SESSION['GrandTotalsub']); } ?></span></span></li>
                            <?php
                            if(isset($_SESSION['discount_amount'])){
                            ?>
                            <li>Discount <span class="sub-count">-₹<?php echo number_format($_SESSION['discount_amount'], 2); ?></span></li>
                            <?php
                            }
                            ?>
                            <?php
                                //print_r($_SESSION['cart_item']);
                                //echo $_SESSION['shppingto'];
                                    //echo "<p class='title-shppng'>Shipping</p>";
                                    $get_cartthree = "SELECT * FROM cart_user WHERE cart_status='0' AND cart_userid='$customerid'";
                                    $querycartthree = $contdb->query($get_cartthree);
                                    while($row_cartquery = $querycartthree->fetch_array()){
                                        $productidval = $row_cartquery['cart_prdo_auto_id'];
                                        $rowvaluedat[] = $row_cartquery;
                                        //if()
                                        
                                    } // while loop end
                                    /*$get_dublcatevaleu = "SELECT COUNT(*) cart_prdo_auto_id FROM cart_user HAVING cart_prdo_auto_id > 1 WHERE cart_user_ip='$ip' AND cart_user_browser='$brower' AND cart_status='0' AND cart_userid='$customerid'";
                                    $get_valuevale = $conn->query($get_dublcatevaleu);
                                    while($rowgetvalue = $get_valuevale->fetch_array()){
                                        //echo $get_valuedata = $rowgetvalue['cart_prdo_auto_id'];
                                    }*/
                                    //print_r($productidval);
                                    // new code uper
                                    foreach ($variable as $getsamevalue) {
                                        $produidvale[] = $shppgvaldat['cart_prdo_auto_id'];
                                    }
                                    /*$samevalue = array_count_values($produidvale);
                                    $samevalue[$product_forloopid];*/
                                    foreach ($rowvaluedat as $shppgvaldat) {
                                        
                                        $date = date('m/d/Y');
                                        $produidvale[] = $shppgvaldat['cart_prdo_auto_id'];
                                        if($_SESSION['shppingto'] == "2"){
                                            //echo $customer_id;
                                            $get_usertdel = "SELECT * FROM shpptoadds WHERE cust_to_id='$customer_id' AND cust_to_status='0' AND cust_to_date='$date'";
                                            $queryvale = $contdb->query($get_usertdel);
                                            if($queryvale->num_rows > 0){
                                                while($rowgetcode = $queryvale->fetch_array()){
                                                $countycodeval = $rowgetcode['cust_to_country'];
                                                }
                                            }
                                        }else{
                                        if(isset($_SESSION['gust_customer'])){
                                            $get_usertdel = "SELECT * FROM customer WHERE customer_ui_id='$customer_id' AND customer_active='1' AND customer_type='Guest' LIMIT 1";
                                            //echo "Gust";
                                        }else{
                                            $get_usertdel = "SELECT * FROM customer WHERE customer_ui_id='$customer_id' AND customer_active='1' LIMIT 1";
                                        }
                                        $queryvale = mysqli_query($contdb,$get_usertdel);
                                        if(mysqli_num_rows($queryvale)){
                                            while($rowgetcode = mysqli_fetch_array($queryvale)){
                                                
                                                $countycodeval = $rowgetcode['customer_country'];
                                                
                                        }
                                        }else{
                                            //echo "Please Enter Your Shpping Address.";
                                        }
                                        }
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

                                        if(strlen($shppgvaldat['cart_prdo_name']) > 40){
                                            if($get_couny_name == $countycodeval){
                                                //echo '<li>'.substr($shppgvaldat['cart_prdo_name'], 0,40).'... <span class="sub-count">$'.number_format($get_domistval, 2).'</span></li>';
                                                $total_shpping += $get_domistval;
                                            }else{
                                                //echo '<li>'.substr($shppgvaldat['cart_prdo_name'], 0,40).'... <span class="sub-count">$'.number_format($get_internal, 2).'</span></li>';
                                                $total_shpping += $get_internal;
                                            }
                                        }else{
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
                                    }
                                    if($countycodeval != ""){
                                        $shpinvaldata = $total_shpping;
                                    }else{
                                        $shpinvaldata = "0";
                                    }
                                    //echo $total_shpping;
                                    if(isset($_SESSION['shppingcountry'])){
                                        //$total_shpping = $_SESSION['shippingShowAmt'];
                                    }else{
                                        $_SESSION['shippingShowAmt']=$shpinvaldata;
                                    }
                                ?>
                                <?php //require_once 'ups_shipping/rate/index.php'; ?>
                                <?php $gettotlavale = $_SESSION['subTotal']; 
                                    $wightvalue = $productWeight; ?>
                                <li class="bor-top"><b>Shipping Fee</b> <span class="sub-count showshing">₹<span id="shippingCharge"> 
                                    <?php 
                                        if($shpinvaldata == "0"){
                                            echo "0.00";
                                        }else{
                                            echo number_format($shpinvaldata, 2);
                                        }
                                    ?></span></span></li>
                               <input type="hidden" value="<?php if(isset($_SESSION["tax_amt"])){echo $_SESSION["tax_amt"]; }else{ echo gettaxvale($customer_id,$_SESSION['GrandTotalsub']); } ?>" id="taxvalet">
                            <?php
                                $grand_vle = str_replace(',', '', $_SESSION['GrandTotalsub'])+$shpinvaldata+$_SESSION["tax_amt"];
                                $_SESSION["grandTotal"]=$grand_vle;
                                $totalval = str_replace(',', '', $_SESSION['GrandTotalsub'])+$shpinvaldata+$_SESSION["tax_amt"];
                            ?>
                            <li><b>Grand Total</b> <span class="grand-total">₹<span id="grntotal"><?php echo number_format($totalval, 2); ?></span></span></li>
                            <input type="hidden" value="<?php echo number_format($totalval, 2); ?>" id="getdtavale">
                        </ul>
                    </div>
                </div>
                <div class="payment ml-30">
                    <h4 class="mb-30">Payment</h4>
                    <?php
                    //unset($_SESSION['processPayment']);
                        if(isset($_SESSION['processPayment'])){
                            $_SESSION['processPayment'];
                        }else{
                            $_SESSION['processPayment']="2";
                        }
                    ?>
                    <div class="payment_option">
                        <!--<div class="custome-radio">-->
                        <!--    <input class="form-check-input PaymentVale" required="" type="radio" name="paymentmoth" id="exampleRadios4" value="1" onclick="show1();" required>-->
                        <!--    <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse" data-target="#checkPayment" aria-controls="checkPayment">Cash on delivery</label>-->
                        <!--</div>-->
                        <div class="custome-radio">
                            <input class="form-check-input PaymentVale" required="" type="radio" name="paymentmoth" id="exampleRadios5" value="2" onclick="show2();" required checked>
                            <label class="form-check-label" for="exampleRadios5" data-bs-toggle="collapse" data-target="#paypal" aria-controls="paypal">Pay Now</label>
                        </div>
                        <div class="custome-radio">
                            <input class="form-check-input PaymentVale" required="" type="radio" name="paymentmoth" id="exampleRadios6" value="1" onclick="show2();" required>
                            <label class="form-check-label" for="exampleRadios6" data-bs-toggle="collapse" data-target="#paypal" aria-controls="paypal">COD</label>
                        </div>
                    </div>
                    <div class="payment-logo d-flex">
                        <img class="mr-15" src="assets/imgs/theme/icons/payment-paypal.svg" alt="">
                        <img class="mr-15" src="assets/imgs/theme/icons/payment-visa.svg" alt="">
                        <img class="mr-15" src="assets/imgs/theme/icons/payment-master.svg" alt="">
                        <img src="assets/imgs/theme/icons/payment-zapper.svg" alt="">
                    </div>
                    <button type="submit" name="processPayment" class="place-order btn btn-fill-out btn-block mt-30">Place Order</button>
                </div>
            </div>
        </div>
        </form>
    </div>
</main>
<?php include 'includes/footer.php'; ?>
<script type="text/javascript">
/*$(window).load(function() {
    $("#loader").fadeOut("slow");
});*/
</script>
<script type="text/javascript">
$(document).ready(function(){
    $("select.countrydffrnt").change(function(){
        var selectedCountry = $(".countrydffrnt option:selected").val();
        $.ajax({
            type: "POST",
            url: "<?php //echo $url; ?>/get_state/",
            data: { country : selectedCountry }
        }).done(function(data){
            $(".dfftstate").html(data);
        });
    });
});

$(document).ready(function(){
    $("select.response").change(function(){
        var selectedstatval = $(".response option:selected").val();
        $.ajax({
            type: "POST",
            url: "<?php echo $url; ?>/get_state/",
            data: { statecode : selectedstatval } 
        }).done(function(data){
            $("#countCod").val(data);
            //alert(data);
        });
    });
});

$(document).ready(function(){
    $(".PaymentVale").click(function(){
        var paymentVl = $(this).val();
        //alert(paymentVl);
        $.ajax({
            type: "POST",
            url: "<?php echo $url; ?>/action/",
            data: { payset : paymentVl } 
        }).done(function(data){

        });
    });
});
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#login").click(function(event){
            event.preventDefault();
            var email = $("#email").val();
            if(email == ''){
                alert('Please enter your Email ID / User Name');
                $('#email').focus();
                return false;
            }
            var password = $("#password").val();
            if(password == ''){
                alert('Please enter your password');
                $('#password').focus();
                return false;
            }

            $.ajax({
                url : "<?php echo $url; ?>/",
                method : "POST",
                data : {loginCustmor:1, passWord:password, eMail:email},
                success : function(data){
                    if(data == 0 ){
                        window.location.href='<?php echo $url; ?>/checkout';
                    }else if( data == 1){
                        alert("Sorry You Enter wrong password");
                    }else if( data == 2 ){
                        alert("Sorry This Email doesn't exists with us. Please enter another.");
                    }
                }
            });
        });

        // email validate to check
        $(".place-order").click(function(e){
            event.preventDefault();
            /*var tax_chk = $('#taxAmnt').html();
            if(tax_chk == "0.00"){
                alert('Please fill shpping address.');
            }else{*/
            var firstName = $('#newCfirstName').val();
            var lastName = $('#newClastName').val();
            var phone = $('#newCphone').val();
            var email = $('#newCemail').val();
            //var passW = $('#newCpass').val();
            var country = $('#newCcountry').val();
            var address = $('#newAddress').val();
            var city = $('#newCcity').val();
            var state = $('#newCstate').val();
            var pcode = $('#newCpcode').val();
            var cuscode = $('#countCod').val();
            var session = '<?php echo $_SESSION['customersessionlogin']; ?>';

            /*if(session == ''){*/
                if(firstName == ''){
                    alert('Complete your billing details first.');
                    return false;
                }else if(phone == ''){
                    alert('Enter your phone Number.');
                    return false;
                }/*else if(email == ''){
                    alert('Enter your Email Address.');
                    return false;
                }else if(passW == ''){
                    alert('Enter your Password.');
                    return false;
                }*/else if(country == ''){
                    alert('Enter your country.');
                    return false;
                }else if(address == ''){
                    alert('Enter your address.');
                    return false;
                }/*else if(city == ''){
                    alert('Enter your City.');
                    return false;
                }*/else if(state == ''){
                    alert('Enter your State.');
                    return false;
                }else if(pcode == ''){
                    alert('Enter your pincode.');
                    return false;
                }else{
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo $url; ?>/action/',
                        data: $('#process').serialize(),
                        success: function (data) {
                            //console.log(data);
                            //alert(data);
                            if( data == 0 ){
                                alert('Your Email Id Already Registered Please Try Again Different Email Id.');
                                return false;
                            }else if( data == 1 ){
                                alert('This User Name Already User Please Try to again different User Name.');
                                return false;
                            }else if( data == 2){
                                window.location.href='<?php echo $url; ?>/process';
                            }
                        }
                    }); 
                }
            /*}else{
                if(state == ''){
                    alert('Enter your state.');
                    return false;
                }else{
                    window.location.href='<?php echo $url; ?>/process';
                }
                
            }*/
        /*}*/
    });
});

$(document).ready(function(){
    $("select.country").change(function(){
        var selectedCountry = $(".country option:selected").val();
        var subTval = $('#newCstate').attr('data-totalAmt');
        var taxamount = $('#taxAmnt').html();
        $.ajax({
            type: "POST",
            url: "<?php echo $url; ?>/action/",
            dataType: "JSON",
            data: { countrychage : selectedCountry, subtotal : subTval, taxvaldat : taxamount, Custyomeval : "<?php echo $_SESSION['customersessionlogin']; ?>" }
        }).done(function(data){
            //console.log(data);
            if(data != ''){
                //alert(data[1]);
                $("#shippingCharge").html(data[0]);
                $("#grntotal").html(data[1]);
                $("#getdtavale").val(data[1]);
            }
            //alert("ok");
            /*$(".response").html(data);
            window.location.href='<?php echo $url; ?>/checkout';*/
        });
    });
});

$(document).ready(function(){
    $("select.country").change(function(){
        var selectedCountry = $(".country option:selected").val();
        $.ajax({
            type: "POST",
            url: "<?php echo $url; ?>/get_state/",
            data: { countrychage : selectedCountry, Custyomeval : "<?php echo $_SESSION['customersessionlogin']; ?>" }
        }).done(function(data){
            $("#newCstate").html(data);
            //alert(data);
            /*$(".response").html(data);
            window.location.href='<?php echo $url; ?>/checkout';*/
        });
    });
});

function stateGst(val){
        var state_tax = val;
        var subT = $('#newCstate').attr('data-totalAmt');
        var wt = $('#newCstate').attr('data-weight');
        var shppingvalold = $("#shippingCharge").text();
        //console.log(wt);
        $.ajax({
            url : "<?php echo $url; ?>/action/",
            method : "POST",
            dataType: "JSON",
            data : {stateGst:1, stateTax:state_tax, subTotal:subT, weight:wt, shppingvl:shppingvalold},
            success : function(data){
                console.log(data);
                if(data != ''){
                    $('#taxAmnt').text(data[1]);
                    //$('#shippingCharge').text(data[2]);
                    $('#grntotal').text(data[0]);
                    $('#taxAmntval').val(data[1]);
                    //$('#shippingChargeval').val(data[2]);
                    $('#grntotalval').val(data[0]);
                }
            }
        });
    }
    function stateGsttoval(val){
        var state_taxdat = val;
        var subTtoadd = $('#newCstatetoadd').attr('data-totalAmt');
        var wttoadd = $('#newCstatetoadd').attr('data-weight');
        var shppingval = $("#shippingCharge").text();
        //alert(shppingval);
        //console.log(wt);
        $.ajax({
            url : "<?php echo $url; ?>/action/",
            method : "POST",
            dataType: "JSON",
            data : {stateGst:1, stateTax:state_taxdat, subTotal:subTtoadd, weight:wttoadd, shppingvl:shppingval},
            success : function(data){
                console.log(data);
                //alert(data[1]);
                if(data != ''){
                    $('#taxAmnt').text(data[1]);
                    //$('#shippingCharge').text(data[2]);
                    $('#grntotal').text(data[0]);
                    $('#taxAmntval').val(data[1]);
                    //$('#shippingChargeval').val(data[2]);
                    $('#grntotalval').val(data[0]);
                }
            }
        });
    }

    $(document).ready(function(){
        $(".text-right").hide();
        $("body").on('click', '.getshipping', function(){
            //var radioValue = $("input[name='shippingprice']:checked").val();
            var radioValue = $(this).val();
            var grandTotal = $('#getdtavale').val();
            var taxvale = $("#taxvalet").text();
            var getcuster = "<?php echo $customer_id; ?>";
            var getdatavale = $(this).data("id");
            var proattr = $(this).attr("pro");
            //alert(radioValue);
            /*$('.getshipping').each(function(){
                var mydata = $(this).val();
                alert(mydata);
            });*/
            $.ajax({
            async: false,
            cache: false,
            url : "<?php echo $url; ?>/action/",
            type : "POST",
            data : {shipping:getcuster, grantotval:grandTotal, shippvale:radioValue, taxvaledata:taxvale},
            dataType: 'JSON',
            success : function(response){
                console.log(response);
                //alert(response);
                var withtotalamut = response.grandtotal;
                var shipipng = response.shippingdata;
                var shinidshow = response.idvaleget;
                var counter = response.clickcount;
                //alert(shinidshow);
                //$('#shippingCharge').text(response);
                $('#shippingCharge').text(shipipng);
                $("#grntotal").text(withtotalamut);
                //document.querySelector('#btn1').click();
                $(".addbtnvale").attr("id", "process");
                $(".text-right").show();
                //alert(getdatavale);

                var btn = document.getElementById(getdatavale);
    
                // Setting new attributes
                btn.setAttribute("pro", counter);

                if(proattr == "1"){
                    //alert("this is blank 1");
                }else{
                    //alert("value 0");
                    var remove = document.getElementById(getdatavale);
                    // Setting new attributes
                    remove.setAttribute("pro", "1");
                    $(".getshipping[data-id='" + shinidshow + "']").click();
                }
                //$(".getshipping[data-id='" + shinidshow + "']").click();
                //alert("Succfully Add");
                //$('#grntotal').text(withtotalamut);
                }
            });
        });
    });

$("#removeadd").click(function(){
    //alert(settoaddress);
    var customidval = $(this).data("id");
    $.ajax({
        type: "POST",
        url: "<?php echo $url; ?>/action/", 
        data : {removeshipto:1, custidshromve:customidval},
        success : function(response){
            //alert('ok');
            window.location.href='<?php echo $url; ?>/checkout/';
        }        
    });
});
</script>
<script type="text/javascript">
function show3(){
  document.getElementById('div1').style.display ='none';
  document.getElementById('div2').style.display ='none';
}
function show1(){
  document.getElementById('div1').style.display ='block';
  document.getElementById('div2').style.display ='none';
}
function show2(){
  document.getElementById('div2').style.display = 'block';
  document.getElementById('div1').style.display ='none';
}
</script>