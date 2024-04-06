<?php 
session_start();
include_once("../directory/url.php");

$url = get_template_directory();

$cus_url = $url."/customer";

if(isset($_SESSION['adminsessionlogin'])){
    $redirect_path = "<script>window.open('$url/admin/dashboard','_self');</script>";
    $myaccountbutton = "<li><a href='$url/admin/dashboard'>My Account</a></li>";
}elseif(isset($_SESSION['vendorsessionlogin'])){
    $redirect_path = "<script>window.open('$url/admin/dashboard','_self');</script>";
    $myaccountbutton = "<li><a href='$url/vendor/deshboard'>My Account</a></li>";
}elseif(isset($_SESSION['customersessionlogin'])){
    $redirect_path = "<script>window.open('$url/admin/dashboard','_self');</script>";
    $myaccountbutton = "<li><a href='$url/customer/dashboard'>My Account</a></li>";
}else{
    $redirect_path = "";
    $myaccountbutton = "<li><a href='login'>My Account</a></li>";
}
////////// footer login part//////////////
if(isset($_SESSION['adminsessionlogin'])){
    $headerlogut = "<li><a href='$url/admin/logout'>Logout</a></li>";
    $footerinsertform = "<li><a href='$url/admin/logout'>Logout</a></li>";
}elseif(isset($_SESSION['vendorsessionlogin'])){
    $headerlogut = "<li><a href='$url/vendor/logout'>Logout</a></li>";
    $footerinsertform = "<li><a href='$url/vendor/logout'>Logout</a></li>";
}elseif(isset($_SESSION['customersessionlogin'])){
    $headerlogut = "<li><a href='$url/customer/logout'>Logout</a></li>";
    $footerinsertform = "<li><a href='$url/customer/logout'>Logout</a></li>";
}else{
    $footerinsertform = "<li><a href='$url/vendor_login'>Signup Creators</a></li>";
}

?>

<!DOCTYPE html>

<html lang="en">

<head> 

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">



    <link rel="icon" href="https://buyjee.com/images/128573733.jpg" sizes="16x16" type="image/x-icon">

    

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">     -->
    <link rel="stylesheet" href="https://buyjee.com/assets/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="<?php echo $url; ?>/old/css/owl.carousel.min.css">

    <!-- <link rel="stylesheet" href="assets/css/owl.theme.default.min.css"> -->

    <link rel="stylesheet" href="<?php echo $url; ?>/old/css/xzoom.css" />

    <link rel="stylesheet" href="<?php echo $url; ?>/old/css/jquery.fancybox.css" />

    <link rel="stylesheet" href="<?php echo $url; ?>/old/css/style.css">    

    <link rel="stylesheet" href="<?php echo $url; ?>/old/css/responsive.css">

    <link rel="stylesheet" href="<?php echo $url; ?>/old/css/custom.css">



    

 