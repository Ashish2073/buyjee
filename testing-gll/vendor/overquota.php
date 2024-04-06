<style>

footer {

    background: #ffffffdb;

    position: absolute;

    width: 100%;

    bottom: 0px;

    text-align: center;

    box-shadow: 1px 1px 48px -15px;

    font-size: 12px;

}

.show_val {

    background: #ffffffd9;

    text-align: center;

    position: relative;

    width: 66%;

    top: 2em;

    margin: auto;

    padding: 12px 0px;

    box-sizing: border-box;

    box-shadow: 7px 9px 19px -12px;

}

.logo {

    position: absolute;

    z-index: 999999;

    width: 15%;

    overflow: auto;

    margin: auto;

    background: #ffffffc2;

    padding: 10px 11px;

    box-sizing: border-box;

    box-shadow: 1px 1px 27px -12px;

}

.logo img {

    width: 100%;

    overflow: hidden;

}

</style>

<?php

function getUserIP() {

    if( array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER) && !empty($_SERVER['HTTP_X_FORWARDED_FOR']) ) {

        if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',')>0) {

            $addr = explode(",",$_SERVER['HTTP_X_FORWARDED_FOR']);

            return trim($addr[0]);

        } else {

            return $_SERVER['HTTP_X_FORWARDED_FOR'];

        }

    }

    else {

        return $_SERVER['REMOTE_ADDR'];

    }

}

$ip = getUserIP();

$page = "Screen Out";

date_default_timezone_set('Asia/Kolkata');

    $link_date = date('d-m-Y');

    $link_time = date('h:i A');

    $auto_id = rand();

$url = $_SERVER['REQUEST_URI'];

$slesh_url = explode('/', $url);

$project_id = $slesh_url[3];
$secorty_id = $slesh_url[4];
$uid_id = $slesh_url[5];
if($project_id !== "" && $secorty_id !== "" && $uid_id !== ""){
    //echo "ok";
}else{
    //echo "no";
}

?>

<div class="logo">

    <img src="logo.png">

</div>

<div class='show_val'>

			<img src="screenOut.png">

			<h2>We are sorry!!! Please look for future opportunities.</h2>

		</div>

		<footer>

			<h2>© 2018 WPResearch.com. All Rights Reserved</h2>

		</footer>