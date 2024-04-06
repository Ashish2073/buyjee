<?php
session_start();
if(isset($_SESSION['login-user']) && isset($_SESSION['seouserloginsection'])){
	unset($_SESSION['login-user']);
	unset($_SESSION['seouserloginsection']);
	echo "<script>window.location.href='https://www.gallerylala.com/login/';</script>";
}
?>