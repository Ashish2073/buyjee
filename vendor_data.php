<?php
include_once('dis-setting/connection.php');
date_default_timezone_get();
if(isset($_POST['firstname'])){
	$fname = trim(addslashes($_POST['firstname']));
	$lname = trim(addslashes($_POST['lname']));
	$email = trim(addslashes($_POST['emailid']));
	//die();
	$phone = trim(addslashes($_POST['phoneid']));
	$compny = trim(addslashes($_POST['Comname']));
	$website_url = $_POST['weburl'];
	$singlvednname = $fname.'-'.$lname;
	$lasturlval = makeurl($singlvednname);
	if($compny == ""){
		$singlvedlast = makeurl($singlvednname);
		$sing_val_data = $singlvedlast;
	}else{
		$sing_val_data = makeurl($compny);
	}
	$auto_num = rand(888888,9999999);
	$singlauto = $auto_num.$email;
	$shaffauto = str_shuffle($singlauto);
	$cehck_email = "SELECT * FROM userlogntable WHERE user_email='$email'";
	$cehkquery = mysqli_query($contdb, $cehck_email);
	if(mysqli_num_rows($cehkquery)){
		echo "<span class='red btn btn-danger'>This email address is already registered. Please try another one.</span>";
	}else{
		$checkname = "SELECT * FROM vendor WHERE vendor_uni_name='$lasturlval'";
		$query_namecehck = mysqli_query($contdb,$checkname);
		if(mysqli_num_rows($query_namecehck)){
			echo "<span class='red btn btn-danger'>This First Name and Last Name is already registered. Please try another one.</span>";
		}else{

		$checkname = "SELECT * FROM vendor WHERE vendor_uni_name='$sing_val_data'";
		$query_namecehck = mysqli_query($contdb,$checkname);
		if(mysqli_num_rows($query_namecehck)){
			echo "<span class='red btn btn-danger'>This company name or website is already registered. Please try another one.</span>";
		}else{

	$vendorinsert = "INSERT INTO userlogntable(user_first_name,user_email,user_lastname,user_password,user_session_id,user_cookies,user_type,user_status,user_auto)VALUES('$fname','$email','$lname','0','0','0','vendor','0','$shaffauto')";
	$vendor_login = mysqli_query($contdb, $vendorinsert);

	$vendorall = "INSERT INTO vendor(vendor_f_name,vendor_l_name,vendor_uni_name,vendor_company,vendor_email,vendor_phone,vendor_url,vendor_date,vendor_time,vendor_auto)VALUES('$fname','$lname','$sing_val_data','$compny','$email','$phone','$website_url','$date','$time','$shaffauto')";
	$venderquery = mysqli_query($contdb, $vendorall);
	if($website_url == ""){}else{
		$vendoralldata = "INSERT INTO vendor_productFile(v_id,v_proudctUrl,v_fileUploadDate,v_fileuploadTime)VALUES('$shaffauto','$website_url','$date','$time')";
		$venderquerydata = mysqli_query($contdb, $vendoralldata);
	}

	$venderpermission = "INSERT INTO userpermission(user_p_email_ap,user_p_block,user_p_delete,user_p_id,user_p_auto_id,user_p_type)VALUES('0','0','0','$shaffauto','$auto_num','vendor')";
	$venderquerypermis = mysqli_query($contdb, $venderpermission);
	
	if($venderquerypermis == true){

		/*$shrevarmail = $url."/phpmailer/mail?type=vendor&emailid=$email&nameget=$fname $lname";
		echo "<script>window.open('$shrevarmail','_blank')</script>";*/

		$get_val_form = "vendor";
		$get_name_form = $email;
		$get_name = $fname;

		include('phpmailer/mail.php');

		echo "<span class='green'>Thanks for your inquiry.</span>";
	}
	}
	}
	}
}
?>