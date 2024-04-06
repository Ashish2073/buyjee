<?php

session_start();

include_once('../config_db/conn_connect.php');

$conn = conndata();

include_once("../directory/url.php");

$url = get_template_directory();

if(isset($_SESSION['checkpassword'])){

	$password_data = $_SESSION['checkpassword'];

	if($_SESSION['checkemail'] == ""){
		$user_name_first = $_SESSION['checkeuser'];
		$checkpassword = "SELECT * FROM userlogntable WHERE user_password='$password_data' AND user_first_name='$user_name_first'";
	}else{
		$user_name_first = $_SESSION['checkemail'];
		$checkpassword = "SELECT * FROM userlogntable WHERE user_password='$password_data' AND user_email='$user_name_first'";
	}

	$passquery = mysqli_query($conn, $checkpassword);

	if(mysqli_num_rows($passquery)){

		if($_SESSION['checkemail'] == ""){
			$user_name = $_SESSION['checkeuser'];
			$get_user_id = "SELECT * FROM userlogntable WHERE user_password='$password_data' AND user_first_name='$user_name' AND user_status='0'";
		}else{
			$user_name = $_SESSION['checkemail'];
			$get_user_id = "SELECT * FROM userlogntable WHERE user_password='$password_data' AND user_email='$user_name' AND user_status='0'";
		}

		$alldataget = mysqli_query($conn, $get_user_id);
		if(mysqli_num_rows($alldataget)){
			while($rowdataget = mysqli_fetch_array($alldataget)){

				$gateauto_num = $rowdataget['user_auto'];

				$get_status = $rowdataget['user_type'];

				if($get_status == "admin"){



					header("Location: ".$url."/admin/dashboard/");

					$_SESSION['adminsessionlogin']=$gateauto_num;



				}elseif($get_status == "vendor"){

					header("Location: ".$url."/vendor/dashboard/");

					$_SESSION['vendorsessionlogin']=$gateauto_num;

				}elseif($get_status == "customer"){

					header("Location: ".$url."/customer/dashboard/");

					$_SESSION['customersessionlogin']=$gateauto_num;

				}

			}
		}else{
			header("Location: ".$url."/login/?msg=2");

			unset($_SESSION['checkemail']);
			unset($_SESSION['checkeuser']);
			unset($_SESSION['checkpassword']);
		}

	}else{

		header("Location: ".$url."/login/?msg=1");

		unset($_SESSION['checkemail']);
		unset($_SESSION['checkeuser']);
		unset($_SESSION['checkpassword']);

	}

}

?>