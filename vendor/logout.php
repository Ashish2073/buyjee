<?php

session_start();

include_once('../config_db/conn_connect.php');

$conn = conndata();

date_default_timezone_get();

$date = date("m/d/Y");

$time = date("h:i A");

if(isset($_SESSION['vendorsessionlogin'])){

	$session_data = $_SESSION['vendorsessionlogin'];

	$cheksession = "SELECT * FROM userlogntable WHERE user_auto='$session_data'";

	$querycehck = mysqli_query($conn, $cheksession);

	if(mysqli_num_rows($querycehck)){

		$insert_acctive = "UPDATE loginactive SET active_status='0' WHERE active_userid='$session_data'";

		$insert_data = mysqli_query($conn, $insert_acctive);

		session_destroy();

		header("Location: https://buyjee.com/login/");

	}else{

		//session_destroy();
		unset($_SESSION['vendorsessionlogin']);

		header("Location: https://buyjee.com/login/");

	}

}else{

	unset($_SESSION['vendorsessionlogin']);

	header("Location: https://buyjee.com/login/");

}

?>