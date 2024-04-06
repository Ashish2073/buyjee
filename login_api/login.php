<?php

session_start();

include_once('../config_db/conn_connect.php');

$conn = conndata();

include_once("../directory/url.php");

$url = get_template_directory();

if(isset($_POST['login'])){

	$email_check = $_POST['email'];

	$password = MD5($_POST['password']);

	$check_email = "SELECT * FROM userlogntable WHERE user_email='$email_check'";

	$emailquery = mysqli_query($conn, $check_email);

	if(mysqli_num_rows($emailquery)){

		header("Location: ".$url."/login_api/redirect/");

		$_SESSION['checkemail']=$email_check;

		$_SESSION['checkpassword']=$password;

		//echo "sussfully update";

	}else{

		$check_user_name = "SELECT * FROM userlogntable WHERE user_first_name='$email_check'";

		$cechkuser = mysqli_query($conn, $check_user_name);

		if(mysqli_num_rows($cechkuser)){

			header("Location: ".$url."/login_api/redirect/");

			$_SESSION['checkeuser']=$email_check;

			$_SESSION['checkpassword']=$password;

		}else{

			unset($_SESSION['checkeuser']);
			unset($_SESSION['checkemail']);
			unset($_SESSION['checkpassword']);

			header("Location: ".$url."/login/?msg=0");

		}

	}



}else{

	header("Location: ".$url."/");

}

?>