<?php
include_once("url.php");
include_once("dang_db.php");
if(!isset($_SESSION)){
 session_start();
 }
   if(!isset($_SESSION['singl_val'])){
      header("location: http://localhost/login/");
      exit();
   }
?>