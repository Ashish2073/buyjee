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
      $othernoteval = $rowgetcode['customer_otherNote'];

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

$round_figer_total = round($grnad_val).'00';
$jsone_data = json_encode($array_affram);
$success_url=$url.'/success/';
$un_ordr_id = uniqid();
$shppingvaledat = $_SESSION['shippingShowAmt'].'00';
$taxvaledata = $_SESSION["tax_amt"].'00';
?>