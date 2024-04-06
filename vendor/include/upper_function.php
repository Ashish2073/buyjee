<?php
require_once("session.php");

include_once('https://buyjee.com/config_db/conn_connect.php');

$conn = conndata();

date_default_timezone_set('Asia/Kolkata');

$session_login = $_SESSION['vendorsessionlogin'];

function fullnameval(){
	global $conn;
	global $session_login;

	$vender_name = "SELECT * FROM vendor WHERE vendor_auto='$session_login' LIMIT 1";
	$quweryname = mysqli_query($conn,$vender_name);
	while($rowname = mysqli_fetch_array($quweryname)){
		$fname_val = $rowname['vendor_f_name'];
		$lname_val = $rowname['vendor_l_name'];
		$full_name = $fname_val.' '.$lname_val;

		return $full_name;
	}
}

function getvendrurl(){
	global $conn;
	global $session_login;

	$venderurl = "SELECT * FROM vendor WHERE vendor_auto='$session_login' LIMIT 1";
	$aueryurl = mysqli_query($conn,$venderurl);
	while($rowurlval = mysqli_fetch_array($aueryurl)){
		$urlnameval = $rowurlval['vendor_uni_name'];
	}
	return $urlnameval;
}
?>