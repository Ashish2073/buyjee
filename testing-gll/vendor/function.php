<?php
include_once("url.php");
include_once("dang_db.php");
//date time format
date_default_timezone_set('Asia/Kolkata');
$date = date("m/d/Y");
$time = date("h:i A");
$auto_num = mt_rand(99999,999999);
$rand_num = mt_rand(444,4444);

//////////////////////////////////////////////////////////////////////////////
//////////////////////    Make Login Section ////////////////////////////////
////////////////////////////////////////////////////////////////////////////
if(isset($_POST['make_login_btn'])){
	$make_login_user_code = $_POST['login_user_code'];
	$make_login_type = $_POST['login_type'];
	$make_login_name = $_POST['login_name'];
	$make_login_email = $_POST['email_id'];
	$make_login_password = MD5($_POST['password']);
	$show_password = $_POST['password'];
	$make_login_marg_var = $make_login_type.$make_login_name.$make_login_email.$rand_num;
	$shafal_make_login_singl = MD5(str_shuffle($make_login_marg_var));
	///////////// check email ////////////
	$make_login_check_email = mysqli_query($con, "SELECT * FROM login_table WHERE login_email='$make_login_email'");
	if(mysqli_num_rows($make_login_check_email)){
		echo "<script>alert('This Email Id Already Use. Please Enter New Email Id.');window.location.href='$url/make_login/';</script>";
	}else{
		///////////////// check name /////////////
		$make_login_check_name = mysqli_query($con, "SELECT * FROM login_table WHERE login_user_code='$make_login_user_code' AND login_type='Employees'");
		if(mysqli_num_rows($make_login_check_name)){
			echo "<script>alert('This User Code Already Use. Please Make Different Code.');window.location.href='$url/make_login/';</script>";
		}else{
			$insert_make_login = mysqli_query($con, "INSERT INTO login_table(login_name,login_email,login_password,login_show_pass,login_block,login_type,login_date,login_time,login_forget_count,login_single_id,login_already_use,login_user_code,login_delete)VALUES('$make_login_name','$make_login_email','$make_login_password','$show_password','0','$make_login_type','$date','$time','0','$shafal_make_login_singl','0','$make_login_user_code','0')");
			if($insert_make_login == true){
				echo "<script>alert('Successfully Update.');window.location.href='$url/make_login/';</script>";
			}else{
				echo "<script>alert('Please Try Again.');window.location.href='$url/make_login/';</script>";
			}
		}
	}
}

////////////////////////////////////////////////////////////////
////////////////// View Make Login ////////////////////////////
//////////////////////////////////////////////////////////////
function view_make_login(){
	global $con;
	$url = "http://localhost/new_market_research_website";
	$view_make_data = mysqli_query($con, "SELECT * FROM login_table ORDER BY log_ad_id DESC");
	while($row_view_make_login = mysqli_fetch_array($view_make_data)){
		$view_make_login_name = $row_view_make_login['login_name'];
		$view_make_login_email = $row_view_make_login['login_email'];
		$view_make_login_block = $row_view_make_login['login_block'];
		$view_make_login_type = $row_view_make_login['login_type'];
		$view_make_login_date = $row_view_make_login['login_date'];
		$view_make_login_time = $row_view_make_login['login_time'];
		$view_make_login_forgot = $row_view_make_login['login_forget_count'];
		$view_make_login_singl_id = $row_view_make_login['login_single_id'];
		$view_make_login_alredy = $row_view_make_login['login_already_use'];
		$view_make_login_user_code = $row_view_make_login['login_user_code'];
		$view_make_login_delete = $row_view_make_login['login_delete'];
		if($view_make_login_delete == "0"){
		echo "<form role='form' method='post' enctype='multipart/form-data' action='$url/function/'>
			<tr>
			<input type='hidden' name='singl_id' value='$view_make_login_singl_id'>
				<td>$view_make_login_type</td>
				<td>$view_make_login_name</td>
				<td>$view_make_login_email</td>
				<td>$view_make_login_date</td>
				<td>$view_make_login_time</td>";
				if($view_make_login_user_code == ""){
					echo "<td>0</td>";
				}else{
					echo "<td>$view_make_login_user_code</td>";
				}
		echo "<td><span class='count'>$view_make_login_forgot</span></td>";
				if($view_make_login_block == "0"){
				echo "<td>
						<div class='radio_btn green_color'>
							<select name='block_account_make_login' form-control required>
								<option value=''>Select one</option>
								<option value='1,block'>Blocked</option>
								<option value='1,delete'>Delete</option>
							</select>
						</div>
					</td>";
			}else{
				echo "<td>
						<div class='radio_btn red_color'>
							<select name='block_account_make_login' form-control required>
								<option value='0,block'>Un Block</option>
								<option value='1,block' selected>Blocked</option>
								<option value='1,delete'>Delete</option>
							</select>
						</div>
					</td>";

			}
		echo "<td><button type='submit' name='block_btn_make_log' class='form-control'>Update</button></td></tr></form>";
	}else{
	}
	}
}

if(isset($_POST['block_btn_make_log'])){
	$singl_id_make_login = $_POST['singl_id'];
	$make_block_val_update = $_POST['block_account_make_login'];
	$make_login_explod = explode(",", $make_block_val_update);
	$make_first_val = $make_login_explod[0];
	$make_second_val = $make_login_explod[1];
	if($make_second_val == "block"){
		$udate_data_val = mysqli_query($con, "UPDATE login_table SET login_block='$make_first_val' WHERE login_single_id='$singl_id_make_login'");
		if($udate_data_val == true){
			echo "<script>alert('Successfully Block.');window.location.href='$url/make_login_view/';</script>";
		}else{
			echo "<script>alert('Please Try Again');window.location.href='$url/make_login_view/';</script>";
		}
	}elseif($make_second_val == "delete"){
		$udate_data_val = mysqli_query($con, "UPDATE login_table SET login_delete='1' WHERE login_single_id='$singl_id_make_login'");
		if($udate_data_val == true){
			echo "<script>alert('Successfully Delete.');window.location.href='$url/make_login_view/';</script>";
		}else{
			echo "<script>alert('Please Try Again');window.location.href='$url/make_login_view/';</script>";
		}
	}
}

////////////////////////////////////////////////////////////////
////////////////////// login section //////////////////////////
//////////////////////////////////////////////////////////////
if(isset($_POST['login_tab'])){
	$email_check = $_POST['email_check'];
	$passwd_check = MD5($_POST['passwo_check']);
	$checvale = mysqli_query($con,"SELECT * FROM login_table WHERE login_block='1' AND login_email='$email_check' AND login_password='$passwd_check' AND login_type='Vender'");
	if(mysqli_num_rows($checvale)){
		echo "<script>alert('This account is block please contact to admin.');</script>";
	}else{
		$check_pass_query = mysqli_query($con, "SELECT * FROM login_table WHERE login_email='$email_check' AND login_password='$passwd_check' AND login_type='Vender'");
		if(mysqli_num_rows($check_pass_query)){
			session_start();
			echo "<script>window.open('$url/Vendor/index/','_Self');</script>";
			$_SESSION['singl_val']=$passwd_check;
		}else{
			echo "<script>alert('Email ID OR Password not Correct.');</script>";
		}
	}
}


function view_forgot_pass(){
	global $con;
	$forgot_view_query = mysqli_query($con, "SELECT * FROM forgot_pass");
	while($row_forgot_pass = mysqli_fetch_array($forgot_view_query)){
		$view_fore_type = $row_forgot_pass['forgot_pass_type'];
		$view_fore_link = $row_forgot_pass['forgot_pass_link'];
		$view_fore_use = $row_forgot_pass['forgot_pass_use'];
		$view_fore_time = $row_forgot_pass['forgot_pass_time'];
		$view_fore_date = $row_forgot_pass['forgot_pass_date'];
		$view_fore_email = $row_forgot_pass['forgot_pass_email'];
		echo "<tr>
				<td>$view_fore_type</td>
				<td>$view_fore_use</td>
				<td>$view_fore_link</td>
				<td>$view_fore_date</td>
				<td>$view_fore_time</td>
				<td>$view_fore_email</td>
			</tr>";
	}
}

////////////////////////////////////////////////////////////////
///////////////////// view count home page ////////////////////
//////////////////////////////////////////////////////////////
function total_vender_count(){
	global $con;
	$vender_count = "SELECT COUNT(1) FROM login_table WHERE login_type='Vender'";
	$vender_query = mysqli_query($con, $vender_count);
	$vender_row_count = mysqli_fetch_array($vender_query);
	echo $count_final_vender_view = $vender_row_count[0];
}

function total_employee_count(){
	global $con;
	$employee_count = "SELECT COUNT(1) FROM login_table WHERE login_type='Employees'";
	$employee_query = mysqli_query($con, $employee_count);
	$employee_row_count = mysqli_fetch_array($employee_query);
	echo $count_final_employee_view = $employee_row_count[0];
}

if(isset($_POST['add_data_clint'])){
	$clint_name = $_POST['clt_name'];
	$clint_loct = $_POST['clt_loction'];
	$clint_wbit = $_POST['clt_websit'];
	$clint_email = $_POST['clt_email'];
	$clint_pass = trim(MD5($_POST['clt_pass']));

	$cehck_email_clint = mysqli_query($con, "SELECT * FROM client_data WHERE client_a_d_email='$clint_email'");
	if(mysqli_num_rows($cehck_email_clint)){
		echo "<script>alert('This ($clint_email) already Use.');window.location.href='$url/add_client/'</script>";
	}else{
		$save_clint = mysqli_query($con, "INSERT INTO client_data(client_a_d_name,client_a_d_location,client_a_d_website,client_a_d_email,client_a_d_password,client_a_d_show_pa,client_a_d_delete,client_a_d_block,client_a_d_singl_id)VALUES('$clint_name','$clint_loct','$clint_wbit','$clint_email','$clint_pass','0','0','0','$auto_num')");
		if($save_clint == true){
			echo "<script>alert('Successfully Update');window.location.href='$url/add_client/'</script>";
		}else{
			echo "<script>alert('Please Try Again');window.location.href='$url/add_client/'</script>";
		}
	}
}

function clint_show_detils(){
	global $con;

	$clint_delts = mysqli_query($con, "SELECT * FROM client_data");
	while($row_clt_detl = mysqli_fetch_array($clint_delts)){
		$clint_name_detl = $row_clt_detl['client_a_d_name'];
		$clint_locat_detl = $row_clt_detl['client_a_d_location'];
		$clint_webit_detl = $row_clt_detl['client_a_d_website'];
		$clint_email_detl = $row_clt_detl['client_a_d_email'];
		$clint_id_auto = $row_clt_detl['client_a_d_id'];
		$clint_id_singl = $row_clt_detl['client_a_d_singl_id'];

		echo "<tr>
                <td>$clint_name_detl</td>
                <td>$clint_email_detl</td>
                <td>$clint_locat_detl</td>
                <td><span class='count'>25</span></td>
                <td><span class='count'>400</span></td>
                <td>$<span class='count'>45</span></td>
                <td>Working</td>
                <td><a href='edit_client/$clint_id_auto/$clint_id_singl/'>Edit</a></td>
            </tr>";
	}
}

function updateclient($update_name,$update_location,$update_email,$update_blockvale,$update_weburl,$clint_id,$clint_singl_id){
	global $con;

	$update_vale = "UPDATE client_data SET client_a_d_name='$update_name',client_a_d_location='$update_location',client_a_d_website='$update_weburl',client_a_d_email='$update_email',client_a_d_block='$update_blockvale' WHERE client_a_d_id='$clint_id' AND client_a_d_singl_id='$clint_singl_id'";
	$queryinsery = mysqli_query($con,$update_vale);
	if($queryinsery == true){
		return true;
	}else{
		return false;
	}
}

function clint_name_select(){
	global $con;

	$clint_n_selt_query = mysqli_query($con, "SELECT * FROM client_data");
	while($row_clt_n_fecth = mysqli_fetch_array($clint_n_selt_query)){
		$clint_name_show = $row_clt_n_fecth['client_a_d_name'];
		$clint_priy_id = $row_clt_n_fecth['client_a_d_id'];
		$clint_auto_id = $row_clt_n_fecth['client_a_d_singl_id'];
		echo "<option value='$clint_name_show|$clint_priy_id|$clint_auto_id'>$clint_name_show</option>";
	}
}

function all_pid(){
	global $con;

	$pid_get = mysqli_query($con, "SELECT * FROM client_proj_detail");
	while($row_pid_fecth = mysqli_fetch_array($pid_get)){
		$pid_name = $row_pid_fecth['client_p_d_pid'];
		$pid_priy_key = $row_pid_fecth['client_p_d_id'];
		echo "<option value='$pid_name|$pid_priy_key'>$pid_name</option>";
	}
}

function country_name_select(){
	global $con;

	$count_name_view = mysqli_query($con, "SELECT * FROM country_name");
	while($row_count_name_fetch = mysqli_fetch_array($count_name_view)){
		$count_name_data = $row_count_name_fetch['count_n_name'];
		$count_code_data = $row_count_name_fetch['count_n_code'];
		echo "<option value='$count_name_data|$count_code_data'>$count_name_data</option>";
	}
}

function vender_email_select(){
	global $con;

	$vend_em_data_query = mysqli_query($con, "SELECT * FROM login_table WHERE login_type='Vender'");
	while($row_vend_fecth = mysqli_fetch_array($vend_em_data_query)){
		$vend_em_name = $row_vend_fecth['login_name'];
		$vend_em_email = $row_vend_fecth['login_email'];
		$get_vendor = "SELECT * FROM vender_data WHERE vender_data_email='$vend_em_email' AND vender_data_name='$vend_em_name'";
		$queryvalev = mysqli_query($con,$get_vendor);
		while($rowvaledata = mysqli_fetch_array($queryvalev)){
			$vend_id = $rowvaledata['vender_data_id'];
			$vend_auto = $rowvaledata['vender_data_singl_id'];
		}

		echo "<option value='$vend_em_name|$vend_em_email|$vend_id|$vend_auto'>$vend_em_name($vend_em_email)</option>";
	}
}

if(isset($_POST['count_butn'])){
	$country_name = $_POST['count_name'];
	$country_code = $_POST['count_code'];

	$inst_count_data = mysqli_query($con, "INSERT INTO country_name(count_n_name,count_n_code,count_n_auto,count_n_date,count_n_time)VALUES('$country_name','$country_code','$auto_num','$date','$time')");
	if($inst_count_data == true){
		echo "<script>alert('Successfully Update');window.location.href='$url/add_country/';</script>";
	}else{
		echo "<script>alert('Please Try Again.');window.location.href='$url/add_country/';</script>";
	}
}

if(isset($_POST['proj_add_clint'])){
	$project_clt_name = $_POST['proj_clt_name'];
	$project_clt_pid = $_POST['proj_clt_pid'];
	$project_cout_name = $_POST['proj_clt_cot_n_c'];
	$project_clt_loi = $_POST['proj_clt_loi'];
	$project_clt_ir = $_POST['proj_clt_ir'];
	$project_clt_quta = $_POST['proj_clt_quta'];
	$project_clt_cpi = $_POST['proj_clt_cpi'];
	$project_clt_link = $_POST['proj_clt_link'];
	$project_clt_status = $_POST['proj_clt_status'];
	$projct_clit_uid = $_POST['proj_clt_uid'];

	$explode_count_data = explode('|', $project_cout_name);
	$count_n_data = $explode_count_data[0];
	$count_c_data = $explode_count_data[1];

	$exlopd_arr_clt_id = explode('|', $project_clt_name);
	$singl_id_clit = $exlopd_arr_clt_id[1];
	$singl_name_clit = $exlopd_arr_clt_id[0];
	$singl_auto_clit = $exlopd_arr_clt_id[2];

	$pid_check_data = mysqli_query($con, "SELECT * FROM client_proj_detail WHERE client_p_d_pid='$project_clt_pid'");
	if(mysqli_num_rows($pid_check_data)){
		echo "<script>alert('Please Try Again. This id already use');window.location.href='$url/$client_add_project/'</script>";
	}else{
	$inset_projct_data = mysqli_query($con, "INSERT INTO client_proj_detail(client_p_d_clint_id,client_p_d_auto_id,client_p_d_clint_name,client_p_d_pid,client_p_d_count_name,client_p_d_count_code,client_p_d_loi,client_p_d_ir,client_p_d_quota,client_p_d_cpi,client_p_d_link,client_p_d_date,client_p_d_time,client_p_d_status,client_p_d_uid)VALUES('$singl_id_clit','$singl_auto_clit','$singl_name_clit','$project_clt_pid','$count_n_data','$count_c_data','$project_clt_loi','$project_clt_ir','$project_clt_quta','$project_clt_cpi','$project_clt_link','$date','$time','$project_clt_status','$projct_clit_uid')");
	if($inset_projct_data == true){
		echo "<script>alert('Successfully add project');window.location.href='$url/client_add_project/';</script>";
	}else{
		echo "<script>alert('Please Try Again');window.location.href='$url/client_add_project/';</script>";
	}
	}
}

if(isset($_POST['finl_id_btn'])){

	$fintl_id_clt_name = $_POST['finl_id_add'];
	$fintl_id_clt_pid = $_POST['fintl_id_pid'];
	$fintl_id_data = $_POST['final_id_val'];

	$explode_cltn_name = explode('|', $fintl_id_clt_name);
	$final_clint_name = $explode_cltn_name[0];
	$final_clint_piry_key = $explode_cltn_name[1];
	$final_clint_id = $explode_cltn_name[2];

	$explode_pid_val = explode('|', $fintl_id_clt_pid);
	$finl_pid_name = $explode_pid_val[0];
	$finl_pid_priy = $explode_pid_val[1];

	//$finl_expo_data_val = explode(',', $fintl_id_data);
	//print_r($finl_expo_data_val);
	//$finl_implo_data_val = implode(',', $finl_expo_data_val);

	$final_data_add = mysqli_query($con, "INSERT INTO client_final_ids(client_final_c_id,client_final_c_key,client_final_c_name,client_final_pid,client_final_c_pid_key,client_final_id_data,client_final_date,client_final_time)VALUES('$final_clint_id','$final_clint_piry_key','$final_clint_name','$finl_pid_name','$finl_pid_priy','$fintl_id_data','$date','$time')");

	if($final_data_add == true){
		echo "<script>alert('Successfully Update Final Id\'s');window.location.href='$url/client_final_id/';</script>";
	}else{
		echo "<script>alert('Please Try Again');window.location.href='$url/client_final_id/';</script>";
	}
}

if(isset($_POST['vend_link_btn'])){
	$vender_email_id = $_POST['vener_name'];
	$vender_website = $_POST['vend_webstie'];

	$exploder_vend_email = explode('|', $vender_email_id);
	$vecnd_name_ex = $exploder_vend_email[0];
	$vecnd_email_ex = $exploder_vend_email[1];

	$vender_inst_link = mysqli_query($con, "INSERT INTO vender_data(vender_data_name,vender_data_singl_id,vender_data_website,vender_data_email,vender_data_date,vender_data_time)VALUES('$vecnd_name_ex','$rand_num','$vender_website','$vecnd_email_ex','$vender_uid_link','$vender_pid_link','$vender_th_link','$vender_ter_link','$vender_quta_link','$date','$time')");
	if($vender_inst_link == true){
		echo "<script>alert('Successfully Add Vender');window.location.href='$url/add_vender/';</script>";
	}else{
		echo "<script>alert('Please Try Again');window.location.href='$url/add_vender/';</script>";
	}
}

if(isset($_POST['alt_projt_btn'])){
	$alt_p_clnt_data = $_POST['clint_p_l_data'];
	$explod_data_clnt = explode('|', $alt_p_clnt_data);
	$expt_clt_name = $explod_data_clnt[0];
	$expt_clt_key = $explod_data_clnt[1];
	$expt_clt_auto = $explod_data_clnt[2];
	$alt_p_clnt_data = $_POST['pid_p_l'];
	$explode_pid_data = explode('|', $alt_p_clnt_data);
	$explot_pid_name = $explode_pid_data[0];
	$explot_pid_key = $explode_pid_data[1];
	$vend_p_l_data = $_POST['vend_p_l_id'];
	$explode_p_l_vend = explode('|', $vend_p_l_data);
	$exp_ve_p_l_name = $explode_p_l_vend[0];
	$exp_ve_p_l_email = $explode_p_l_vend[1];
	$exp_ve_p_l_id = $explode_p_l_vend[2];
	$exp_ve_p_l_auto = $explode_p_l_vend[3];
	$vend_p_l_pid = trim($_POST['vedn_pid_p_l']);
	$alt_p_quta = $_POST['quta_p_l'];
	$alt_p_cpi = $_POST['cpi_p_l'];
	$alt_p_status = $_POST['statu_data'];
	$newownpid = substr(rand(88888,9999999999),4);
	$singlpid = "WEB".$newownpid;
	$thank_lint = addslashes($_POST['vedn_thank']);
	$ternat_lint = addslashes($_POST['vedn_ternit']);
	$overqta_lint = addslashes($_POST['vedn_overquta']);

	$pr_l_clt_lin_data = mysqli_query($con, "SELECT * FROM client_proj_detail WHERE client_p_d_clint_id='$expt_clt_key' AND client_p_d_auto_id='$expt_clt_auto' AND client_p_d_pid='$explot_pid_name'");
	while($row_p_l_link = mysqli_fetch_array($pr_l_clt_lin_data)){
		$p_l_clnt_link = $row_p_l_link['client_p_d_link'];
	}
	$make_ved_id = $explot_pid_name.$exp_ve_p_l_name.$exp_ve_p_l_email.$expt_clt_auto.$auto_num;
	$rander_val_id = trim(str_shuffle($make_ved_id));
	$ved_id_limit_word = substr($rander_val_id,0,30);
	//die();
	$full_link = "$url/vendor/?$ved_id_limit_word/?$singlpid/?YOUR_USER_ID";

	$insert_alt_projt = mysqli_query($con, "INSERT INTO vander_alt_project(vander_a_p_clint_name,vander_a_p_clint_key,vander_a_p_clint_auto,vander_a_p_v_pid_name,vander_a_p_v_pid_key,vander_a_p_quota,vander_a_p_date,vander_a_p_time,vander_a_p_status,vander_a_p_cpi,vander_a_p_ownpid,vander_a_p_cl_link,vander_a_p_vd_sid,vander_a_p_vd_pid,vander_a_p_full_link,vander_a_p_vd_name,vander_a_p_vd_email,vander_a_p_v_id,vander_a_p_v_auto,vander_a_p_thank,vander_a_p_termint,vander_a_p_overquta)VALUES('$expt_clt_name','$expt_clt_key','$expt_clt_auto','$explot_pid_name','$explot_pid_key','$alt_p_quta','$date','$time','$alt_p_status','$alt_p_cpi','$singlpid','$p_l_clnt_link','$ved_id_limit_word','$vend_p_l_pid','$full_link','$exp_ve_p_l_name','$exp_ve_p_l_email','$exp_ve_p_l_id','$exp_ve_p_l_auto','$thank_lint','$ternat_lint','$overqta_lint')");
	if($insert_alt_projt == true){
		echo "<script>alert('Successfully Alot');window.location.href='$url/lot_project/?vid=$ved_id_limit_word';</script>";
	}else{
		echo "<script>alert('Please Try Again');window.location.href='$url/lot_project/';</script>";
	}
}

function link_vend_show(){
	global $con;
	if(empty($_REQUEST['vid'])){}else{
        $get_data_vid = $_REQUEST['vid'];
        $vend_lnk_data_show = mysqli_query($con, "SELECT * FROM vander_alt_project WHERE vander_a_p_vd_sid='$get_data_vid'");
        while($row_ved_lnk_show = mysqli_fetch_array($vend_lnk_data_show)){
        	$vedn_lnk_show_table = $row_ved_lnk_show['vander_a_p_full_link'];
        }
        echo "<input id='link_data' value='$vedn_lnk_show_table'>";
    }
}

function workingproject(){
	global $con;

	$working_data = "SELECT * FROM client_proj_detail WHERE client_p_d_status='1'";
	$queryval = mysqli_query($con,$working_data);
	while($rowvcal = mysqli_fetch_array($queryval)){
		echo "<tr>
                <td>".$rowvcal['client_p_d_clint_name']."</td>
                <td>".$rowvcal['client_p_d_clint_name']."</td>
                <td>".$rowvcal['client_p_d_clint_name']."</td>
                <td><span class='count'>".$rowvcal['client_p_d_clint_name']."</span></td>
                <td><span class='count'>".$rowvcal['client_p_d_clint_name']."</span></td>
                <td><span class='count'>".$rowvcal['client_p_d_clint_name']."</span></td>
                <td>$<span class='count'>".$rowvcal['client_p_d_clint_name']."</span></td>
                <td><a href='workingfull/'>View</a></td>
            </tr>";
	}
}

if(isset($_POST['make_three_link'])){
	$clintname = $_POST['three_clintname'];
	$clintpid = $_POST['clint_pid'];
}
?>