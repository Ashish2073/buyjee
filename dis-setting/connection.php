<?php
session_start();
error_reporting(0);
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/
// Function to get the client IP address
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
$ip = get_client_ip();
date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)
$date = date('Y-m-d');
$time = date('H:i:s');
$full_path = realpath(dirname(__FILE__));
$explode_file_path = explode('/dis-setting', $full_path);
$file_path = $explode_file_path[0];
$auto_id = uniqid();
$brower = $_SERVER['HTTP_USER_AGENT'].$_SERVER['LOCAL_ADDR'].$_SERVER['LOCAL_PORT'].$_SERVER['REMOTE_ADDR'];
// function main url 
function site_url(){
    
    $url = "http://localhost/well-known";
    return $url;
}
$url = site_url();
include('config-settings/config.php');
include('config-settings/functions-board.php');
include('config-settings/post-method.php');
$rand_version = rand();
$chking_var_on = "yes";
if($chking_var_on == "no"){
    $varsetval = "";
}else{
    $varsetval = "?var=".$rand_version;
}
?>