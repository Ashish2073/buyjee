<?php include_once('../dis-setting/connection.php'); ?>
<?php
if(isset($_SESSION['login-user']) && isset($_SESSION['seouserloginsection'])){
}else{
	unset($_SESSION['login-user']);
	unset($_SESSION['seouserloginsection']);
	echo "<script>window.location.href='$url/login/';</script>";
}
?>