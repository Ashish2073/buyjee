<?php include_once('../dis-setting/connection.php'); ?>
<?php
if(isset($_SESSION['login-user']) && isset($_SESSION['deshboard-login'])){
	$user_login = chaking_user_dashboard($_SESSION['deshboard-login']);
	if($user_login == "0"){
		echo "<script>window.location.href='$url/admin-manager/';</script>";
	}elseif($user_login == "1"){
		
	}else{
		echo "<script>window.location.href='$url/admin-manager/login/';</script>";
	}
}
?>