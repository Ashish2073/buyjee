<?php

session_start();

include_once('../config_db/conn_connect.php');

$conn = conndata();

date_default_timezone_get();

$date = date("m/d/Y");

$time = date("h:i A");

$full_path = realpath(dirname(__FILE__));
$explode_file_path = explode('/vendor', $full_path);
$file_path = $explode_file_path[0]."/images";

if(isset($_SESSION['vendorsessionlogin'])){

	$session_data = $_SESSION['vendorsessionlogin'];

	$cheksession = "SELECT * FROM userlogntable WHERE user_auto='$session_data'";

	$querycehck = mysqli_query($conn, $cheksession);

	if(mysqli_num_rows($querycehck)){

		$ip = $_SERVER['REMOTE_ADDR'];

		$auto_id = rand(888888,9999999);

		$singlvarbl = $ip.','.$auto_id;

		$shaff_data = shuffle($singlvarbl);

		$cehck_active = "SELECT * FROM loginactive WHERE active_userid='$session_data' AND active_status='1'";

		$queryactive = mysqli_query($conn, $cehck_active);

		if(mysqli_num_rows($queryactive)){}else{

			$insert_acctive = "INSERT INTO loginactive(active_type,active_ip,active_status,active_autoid,active_userid,active_date,active_time)VALUES('vendor','$ip','1','$shaff_data','$session_data','$date','$time')";

			$insert_data = mysqli_query($conn, $insert_acctive);

		}

	}else{

		unset($_SESSION['vendorsessionlogin']);

		header("Location: https://buyjee.com");

	}

}else{

	unset($_SESSION['vendorsessionlogin']);

	header("Location: https://buyjee.com");

}

?>