<?php
session_start();
include_once('url.php');
session_destroy();
header("location: $url/login/");
?>