<?php

include_once('dis-setting/connection.php');

date_default_timezone_get();

$date = date("m/d/Y");

$time = date("h:i A");

if(isset($_POST['customer'])){

	$fname = trim($_POST['Firstname']);

	$lname = trim($_POST['lname']);

	$email = trim($_POST['emailid']);

	$password = MD5($_POST['password']);

	if(isset($_POST['page-validate'])){
		$_post_checkout = "checkout";
	}else{
		$_post_checkout = "0";
	}

	if($fname != "" || $lname != "" || $email != "" || $password != ""){

	$compny = $_POST['Comname'];

	$website_url = $_POST['weburl'];

	$singlvednname = str_replace(" ","-", $fname);

	$singlvedlast = str_replace(" ","-", $lname);

	$sing_val_data = $singlvednname.'-'.$singlvedlast;



	$auto_num = uniqid();

	$singlauto = $auto_num.$email;

	$shaffauto = str_shuffle($singlauto);

	$cehck_email = "SELECT * FROM userlogntable WHERE user_email='$email'";

	$cehkquery = mysqli_query($contdb, $cehck_email);

	if(mysqli_num_rows($cehkquery)){
		if($_post_checkout == "checkout"){
			echo "<script>alert('Your Email Id Already Registered Please Try Again Different Email Id.');window.location.href='$url/checkout-login/checkout-login'</script>";
		}else{
			echo "<script>alert('Your Email Id Already Registered Please Try Again Different Email Id.');window.location.href='$url/register/'</script>";
		}
	}else{

		$checkname = "SELECT * FROM customer WHERE customer_name_url='$sing_val_data'";

		$query_namecehck = mysqli_query($contdb,$checkname);

		if(mysqli_num_rows($query_namecehck)){

			/*echo "<span class='red'></span>";*/
			if($_post_checkout == "checkout"){
				echo "<script>alert('This User Name Already Used Please Try to again different User Name.');window.location.href='$url/checkout-login/'</script>";
			}else{
				echo "<script>alert('This User Name Already Used Please Try to again different User Name.');window.location.href='$url/register/'</script>";
			}

		}else{

			$vendorinsert = "INSERT INTO userlogntable(user_first_name,user_email,user_lastname,user_password,user_session_id,user_cookies,user_type,user_status,user_auto)VALUES('$fname','$email','$lname','$password','0','0','customer','0','$shaffauto')";

			$vendor_login = mysqli_query($contdb, $vendorinsert);



			$vendorall = "INSERT INTO customer(customer_fname,customer_lname,customer_name_url,customer_ui_id,customer_img,customer_address,customer_gender,customer_age,customer_phone,customer_auto,customer_date,customer_time,customer_active)VALUES('$fname','$lname','$sing_val_data','$shaffauto','0','0','0','0','0','$auto_num','$date','$time','1')";

			$venderquery = mysqli_query($contdb, $vendorall);

			if($vendor_login == true){

				if($_post_checkout == "checkout"){
					session_start();
					include_once('phpmailer/customer-email.php');
					echo "<script>window.location.href='$url/checkout/';</script>";
					$_SESSION['customersessionlogin']=$shaffauto;
				}else{
					session_start();
					include_once('phpmailer/customer-email.php');
					echo "<script>alert('You are now an official Gallery La La customer. Thank you!.');window.location.href='$url/';</script>";
					$_SESSION['customersessionlogin']=$shaffauto;
				}
			}
		}
	}
	}else{
		if($_post_checkout == "checkout"){
			echo "<script>alert('Please Fill Form Properly.');window.location.href='$url/checkout-login/';</script>";
		}else{
			echo "<script>alert('Please Fill Form Properly.');window.location.href='$url/register/';</script>";
		}
	}
}else{

	header("Location: https://buyjee.com/register/");

}

?>