<?php
include_once('url.php');
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
$full_url = $_SERVER['REQUEST_URI'];
$explode_vale = explode('?', $full_url);

$auto_vid = substr($explode_vale[1], 0,-1);
$own_vid = substr($explode_vale[2], 0,-1);
$vendor_uid = $explode_vale[3];
$ip = getUserIP();
date_default_timezone_set();
$date = date('m/d/Y');
$time = date('H:i:s');

$cechkvid_vale = "SELECT * FROM vander_alt_project WHERE vander_a_p_vd_sid='$auto_vid' AND vander_a_p_ownpid='$own_vid' AND vander_a_p_status='1'";
$query_vale = mysqli_query($con,$cechkvid_vale);
if(mysqli_num_rows($query_vale)){

    $cehck_quta = "SELECT * FROM vander_alt_project WHERE vander_a_p_vd_sid='$auto_vid' AND vander_a_p_ownpid='$own_vid' AND vander_a_p_quota='0'";
    $chk_qutaquery = mysqli_query($con,$cehck_quta);
    if(mysqli_num_rows($chk_qutaquery)){
        echo "Over Quota This Study.";
    }else{
        $chk_Ip_username = "SELECT * FROM project_status WHERE p_status_end_ip='$ip' AND p_status_uid='$vendor_uid' AND p_status_own_id='$own_vid'";
        $vendorquery = mysqli_query($con,$chk_Ip_username);
        if(mysqli_num_rows($vendorquery)){
            echo "This Ip Alreday use. Please Try Again.";
        }else{
            $insert_data = "INSERT INTO project_status(p_status_end_ip,p_status_s_date,p_status_s_time,p_status_security_id,p_status_own_id,p_status_url_use,p_status_uid)VALUES('$ip','$date','$time','$auto_vid','$own_vid','1','$vendor_uid')";
            $insetquery = mysqli_query($con,$insert_data);
            if($insetquery == true){
                //$insert_id = "";
                $vendor_uid = $explode_vale[3];
            	$client_url = "SELECT * FROM vander_alt_project WHERE vander_a_p_vd_sid='$auto_vid' AND vander_a_p_ownpid='$own_vid' AND vander_a_p_status='1'";
            	$clintquery = mysqli_query($con,$client_url);
            	while($row_vale = mysqli_fetch_array($clintquery)){
            		$url_clt = $row_vale['vander_a_p_cl_link'];
                    $single_vale = $url_clt.$vendor_uid;
                    header("Location: $single_vale");
                   // echo "ok";
                }
            }else{
                echo "Try Again.";
            }
        }
    }
}else{
    $check_watappr = "SELECT * FROM vander_alt_project WHERE vander_a_p_vd_sid='$auto_vid' AND vander_a_p_ownpid='$own_vid' AND vander_a_p_status='2'";
    $query_wati = mysqli_query($con,$check_watappr);
    if(mysqli_num_rows($query_wati)){
        echo "Wait For launch Approval.";
    }else{
        $check_pause = "SELECT * FROM vander_alt_project WHERE vander_a_p_vd_sid='$auto_vid' AND vander_a_p_ownpid='$own_vid' AND vander_a_p_status='3'";
        $query_paue = mysqli_query($con,$check_pause);
        if(mysqli_num_rows($query_paue)){
            echo "This Study Has Been Pause. Please Wait For launch Approval";
        }else{
            echo "This is Wrong URL. Please Try to Correct URL.";
        }
    }
}
?>