<?php
function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
date_default_timezone_set('Asia/Kolkata');
$date = date("m/d/Y");
$time = date("h:i A");
$link = $_SERVER['REQUEST_URI'];
$expload_slah_val = explode('/', $link);
$sid_val_get = $expload_slah_val[3];
$count_sid = strlen($sid_val_get);

if($count_sid == "30"){
include_once("url.php");
include_once("dang_db.php");
	//echo $sid_val_get;
	$cehck_sid_val = mysqli_query($con, "SELECT * FROM vander_alt_project WHERE vander_a_p_vd_sid='$sid_val_get'");
	if(mysqli_num_rows($cehck_sid_val)){
		//echo "0000";
		$ip = getUserIpAddr();
		$get_url_sid = mysqli_query($con, "SELECT * FROM vander_alt_project WHERE vander_a_p_vd_sid='$sid_val_get'");
		while($row_url_go = mysqli_fetch_array($get_url_sid)){
			$clint_link_get_val = $row_url_go['vander_a_p_cl_link'];
			$vend_pid_data = $row_url_go['vander_a_p_vd_pid'];
			$clin_pid_name = $row_url_go['vander_a_p_v_pid_name'];
			$clint_key_name = $row_url_go['vander_a_p_v_pid_key'];
		}
		if(empty($_REQUEST['UID'])){
			header("Location: $url/index.php");
		}else{
			$url_sid_uid = $_REQUEST['UID'];
		}
		$cehck_uid_in_data = mysqli_query($con, "SELECT * FROM final_link_data WHERE f_link_uid='$url_sid_uid' AND f_link_vend_pid='$vend_pid_data' AND f_link_sid='$sid_val_get'");
		if(mysqli_num_rows($cehck_uid_in_data)){
			echo "<script>alert('This UID Already in my database. Please Check your UID and try Again.');window.location.href='$url';</script>";
		}else{
		//$get_country_clint = mysqli_query($con, "SELECT * FROM client_proj_detail WHERE client_p_d_pid='$clin_pid_name' AND client_p_d_id='$clint_key_name' AND client_p_d_count_name='' AND client_p_d_count_code=''");
		$redit_link = $clint_link_get_val.$url_sid_uid;
		$insert_uid_data = mysqli_query($con, "INSERT INTO final_link_data(f_link_s_ip,f_link_uid,f_link_sid,f_link_s_time,f_link_s_date,f_link_vend_pid,f_link_clint_pid,f_link_e_tijme,f_link_e_date,f_link_e_ip,f_link_full_link,f_link_use)VALUES('$ip','$url_sid_uid','$sid_val_get','$time','$date','$vend_pid_data','0','0','0','0','0','0')");
		if($insert_uid_data == true){
			header("Location: $redit_link");
		}else{
			header("Location: $url/index.php");
		}
		}
	}else{
		//echo "<h3>Redirecting to Client after <span id='countdown'>10</span> seconds</h3>";
		echo "Close this Window This url wrong. Please Try To Next Url";
	}

}else{
	header("location: $url/index.php");
}
include_once("dang_db.php");

?>

<!-- JavaScript part -->
<script type="text/javascript">
    
    // Total seconds to wait
    var seconds = 10;
    
    function countdown() {
        seconds = seconds - 1;
        if (seconds < 0) {
            // Chnage your redirection link here
            window.location = "index.php";
        } else {
            // Update remaining seconds
            document.getElementById("countdown").innerHTML = seconds;
            // Count down using javascript
            window.setTimeout("countdown()", 1000);
        }
    }
    
    // Run countdown function
    countdown();
    
</script>