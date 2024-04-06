<?php

session_start();

include_once('../config_db/conn_connect.php');

$conn = conndata();

date_default_timezone_get();

$date = date("m/d/Y");

$time = date("h:i A");
if(isset($_SESSION['login-guestchout'])){
	$customerid = $_SESSION['customersessionlogin'];
	$get_cartvaleu = "SELECT * FROM cart_user WHERE cart_status='0' AND cart_userid='$customerid'";
	$queryvaleu = $conn->query($get_cartvaleu);
	if($queryvaleu->num_rows > 0){
		echo "<script>window.location.href='$url/checkout';</script>";
	}else{
		echo "<script>window.location.href='$url/customer/logout/';</script>";
	}
}
if(isset($_SESSION['login-guest-user'])){
	unset($_SESSION['login-guest-user']);
	unset($_SESSION['customersessionlogin']);
    echo "<script>window.location.href='$url/login';</script>";
}

if(isset($_SESSION['customersessionlogin'])){

	$session_data = $_SESSION['customersessionlogin'];

	$cheksession = "SELECT * FROM userlogntable WHERE user_auto='$session_data'";

	$querycehck = mysqli_query($conn, $cheksession);

	if(mysqli_num_rows($querycehck)){

		$ip = $_SERVER['REMOTE_ADDR'];

		$auto_id = rand(888888,9999999);

		$singlvarbl = $ip.$auto_id;

		$shaff_data = str_shuffle($singlvarbl);

		$cehck_active = "SELECT * FROM loginactive WHERE active_userid='$session_data' AND active_status='1'";

		$queryactive = mysqli_query($conn, $cehck_active);

		if(mysqli_num_rows($queryactive)){}else{

			$insert_acctive = "INSERT INTO loginactive(active_type,active_ip,active_status,active_autoid,active_userid,active_date,active_time)VALUES('admin','$ip','1','$shaff_data','$session_data','$date','$time')";

			$insert_data = mysqli_query($conn, $insert_acctive);

		}

	}else{

		unset($_SESSION['customersessionlogin']);

		header("Location: ".$url."/");

	}

}else{

	unset($_SESSION['customersessionlogin']);

	header("Location: ".$url."/");

}

?>