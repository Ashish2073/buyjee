<?php
session_start();
if(isset($_SESSION['login-user']) && isset($_SESSION['adminLoginIdSession'])){
	unset($_SESSION['login-user']);
	unset($_SESSION['adminLoginIdSession']);
	echo "<script>window.location.href='https://buyjee.com/login/';</script>";
}
?>