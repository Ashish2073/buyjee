<?php

session_start();

include_once('../config_db/conn_connect.php');
//echo "0";
$conn = conndata();

date_default_timezone_get();

$date = date("m/d/Y");

$time = date("h:i A");

if(isset($_SESSION['customersessionlogin'])){

	$session_data = $_SESSION['customersessionlogin'];

	$cheksession = "SELECT * FROM userlogntable WHERE user_auto='$session_data'";

	$querycehck = mysqli_query($conn, $cheksession);

	if(mysqli_num_rows($querycehck)){

		$insert_acctive = "UPDATE loginactive SET active_status='0' WHERE active_userid='$session_data'";

		$insert_data = mysqli_query($conn, $insert_acctive);

		unset($_SESSION['customersessionlogin']);
		unset($_SESSION['login-guestchout']);
		unset($_SESSION['gust_customer']);

		header("Location: https://buyjee.com/");

	}else{

		unset($_SESSION['customersessionlogin']);
		unset($_SESSION['login-guestchout']);
		unset($_SESSION['gust_customer']);

		header("Location: https://buyjee.com/");

	}

}else{
	unset($_SESSION['customersessionlogin']);
	unset($_SESSION['login-guestchout']);
	unset($_SESSION['gust_customer']);

	header("Location: https://buyjee.com/");
}

?>