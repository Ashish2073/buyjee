<?php include_once('../dis-setting/connection.php'); ?>
<?php
if(isset($_SESSION['login-user']) && isset($_SESSION['adminLoginIdSession'])){
}else{
	unset($_SESSION['login-user']);
	unset($_SESSION['adminLoginIdSession']);
	echo "<script>window.location.href='$url/login/';</script>";
}
?>