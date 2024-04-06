<?php
//date_default_timezone_get();
date_default_timezone_set('America/New_York');

if(!isset($_SESSION['customersessionlogin'])){
	echo '<script>';
	echo 'window.location.href="'.$url.'/";';
	echo '</script>';
}
?>