<title>Thank You</title>
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
include_once("url.php");
include_once("dang_db.php");
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

date_default_timezone_set('Asia/Kolkata');

    $link_date = date('d-m-Y');

    $link_time = date('H:i:s');

    $auto_id = rand();

$url = $_SERVER['REQUEST_URI'];

$slesh_url = explode('/', $url);

$secorty_id = substr($slesh_url[3], 1);
$project_id = substr($slesh_url[4], 1);
$uid_id = $_GET['UID'];
if($project_id !== "" && $secorty_id !== "" && $uid_id !== ""){
    
    $gettimeissue = "SELECT * FROM project_status WHERE p_status_own_id='$project_id' AND p_status_uid='$uid_id' AND p_status_url_use='1'";
    $queyer_val = mysqli_query($con,$gettimeissue);
    if(mysqli_num_rows($queyer_val)){
        
        while($rowvale = mysqli_fetch_array($queyer_val)){
            $getip = $rowvale['p_status_security_id'];
            $gettimevale = $rowvale['p_status_s_time'];
        }
       //echo $getip;
        $clintvidd = mysqli_query($con,"SELECT * FROM vander_alt_project WHERE vander_a_p_ownpid='$project_id' AND vander_a_p_vd_sid='$getip'");
        while($rowdataval = mysqli_fetch_array($clintvidd)){
            $getvalue = $rowdataval['vander_a_p_clint_auto'];
            $getvaluetime = $rowdataval['vander_a_p_loi'];
            $thank_url = $rowdataval['vander_a_p_thank'];
        }
        $start_time = strtotime($gettimevale);
        $end_time = strtotime($link_time);
        $finaltime = round(abs($end_time - $start_time) / 3600,0);
        //$getvaluetime;
        if($finaltime < $getvaluetime){
            //echo "ok";
            $insertvale = mysqli_query($con,"UPDATE project_status SET p_status_s_ip='$ip',p_status_e_time='$link_time',p_status_final_st='1',p_status_clint_id='$getvalue',p_status_url_use='0' WHERE p_status_own_id='$project_id' AND p_status_uid='$uid_id' AND p_status_url_use='1'");
            $set_url = $thank_url.$uid_id;
            if($insertvale == true){
                header("Location: $set_url");
            }
        }else{
            //echo "no";
            $insertvale = mysqli_query($con,"UPDATE project_status SET p_status_s_ip='$ip',p_status_e_time='$link_time',p_status_final_st='1',p_status_clint_id='$getvalue',p_status_url_use='2' WHERE p_status_own_id='$project_id' AND p_status_uid='$uid_id' AND p_status_url_use='1'");
            echo "Time Issue.";
        }
    }else{
        echo "<h2>Bad URL or This url use.</h2>";
    }
    
}else{
    header("Location: $url");
}

?>